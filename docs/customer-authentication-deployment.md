# Customer authentication deployment

## Database

Run the pending migrations during the normal production deployment window:

```shell
php artisan migrate --force
```

The customer verification migration adds only a nullable `email_verified_at` column. It does not update existing customer records. Existing customers remain unverified until they follow a verification link.

## Storefront URL and HTTPS

Set `APP_URL` to the public HTTPS storefront origin. Laravel uses this value when generating verification and password-reset links outside an HTTP request. Production requests force HTTPS URL generation.

If the application is behind a proxy or load balancer, set `TRUSTED_PROXIES` to a comma-separated list of the proxy IP addresses or CIDR ranges so Laravel receives the original scheme securely. Do not use a wildcard unless every direct connection to the application is controlled by that proxy.

## Transactional email

Local development can retain `MAIL_MAILER=log`. Production must configure a real transactional provider using SMTP or one of Laravel's supported transports.

Required SMTP variables:

```dotenv
MAIL_MAILER=smtp
MAIL_SCHEME=tls
MAIL_HOST=smtp.provider.example
MAIL_PORT=587
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_ADDRESS=no-reply@your-verified-domain.example
MAIL_FROM_NAME="BuffBridge"
MAIL_EHLO_DOMAIN=your-verified-domain.example
```

Keep credentials in the production environment or secret manager, never in source control. After configuration changes, clear/rebuild Laravel's configuration cache.

Before enabling live customer registration, authenticate the sending domain with the provider:

- Publish the provider's SPF record.
- Publish all provider DKIM records.
- Publish a DMARC record and monitor reports before moving to an enforcement policy.
- Confirm that the visible From domain aligns with SPF or DKIM.
- Configure bounce and complaint handling with the provider.

Live delivery is not considered verified until registration and password-reset messages have been delivered through the selected provider to external test inboxes.

For queued production delivery, set `QUEUE_CONNECTION` to the deployed queue backend and run a supervised queue worker. The current `sync` option sends notifications during the web request.

## Google OAuth

Set `GOOGLE_CLIENT_ID`, `GOOGLE_CLIENT_SECRET`, and `GOOGLE_REDIRECT_URI`. Register the exact HTTPS callback URL with Google. The callback accepts an email only when Google explicitly returns a verified-email claim.

## Deployment checks

1. Back up the production database.
2. Deploy the application code.
3. Run `php artisan migrate --force` against the production database.
4. Rebuild cached configuration and routes.
5. Confirm `APP_URL`, HTTPS, mail sender, and Google callback settings.
6. Send controlled registration, verification, and reset messages to external test inboxes.
7. Confirm signed links open on the storefront and expire as configured.
