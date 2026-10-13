<style>
    .bb-auth-page, .bb-auth-page * { box-sizing: border-box; }
    .bb-auth-page { min-height: 540px; padding: 64px 20px; display: flex; justify-content: center; background: #111; font-family: Arial, Helvetica, sans-serif; }
    .bb-auth-card { width: min(560px, 100%); padding: 42px; align-self: flex-start; background: #fff; border-top: 5px solid #f5a000; color: #111; box-shadow: 0 24px 65px rgba(0,0,0,.28); }
    .bb-auth-brand { margin-bottom: 12px; color: #d7aa00; font-size: 10px; font-weight: 900; letter-spacing: 2px; text-transform: uppercase; }
    .bb-auth-title { margin: 0; color: #111; font-size: 30px; font-weight: 900; font-style: italic; line-height: 1; text-transform: uppercase; }
    .bb-auth-copy { margin: 14px 0 24px; color: #666; font-size: 13px; line-height: 1.7; }
    .bb-auth-status, .bb-auth-error { margin: 0 0 20px; padding: 13px 15px; font-size: 12px; line-height: 1.5; }
    .bb-auth-status { border: 1px solid #d7aa00; background: #fff7d1; color: #5c4a00; }
    .bb-auth-error { border-left: 4px solid #f5a000; background: #171717; color: #fff; }
    .bb-auth-field { margin-top: 16px; }
    .bb-auth-field label { display: block; margin-bottom: 8px; font-size: 9px; font-weight: 900; letter-spacing: 1.7px; text-transform: uppercase; }
    .bb-auth-field input { width: 100%; height: 48px; padding: 0 15px; border: 1px solid #dadada; border-radius: 0; background: #fff; color: #111; font-size: 14px; }
    .bb-auth-field input:focus { border-color: #f5a000; outline: none; }
    .bb-auth-actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 24px; }
    .bb-auth-button, .bb-auth-link { min-height: 46px; padding: 0 20px; display: inline-flex; align-items: center; justify-content: center; border: 0; border-radius: 0; font-size: 10px; font-weight: 900; letter-spacing: .5px; text-decoration: none !important; cursor: pointer; }
    .bb-auth-button { background: #f5a000; color: #fff; }
    .bb-auth-button:hover { background: #ffb42b; color: #fff; }
    .bb-auth-link { background: #222; color: #fff !important; }
    .bb-auth-note { margin-top: 20px; color: #888; font-size: 11px; line-height: 1.6; }
    @media (max-width: 600px) { .bb-auth-page { min-height: 460px; padding: 24px 12px; } .bb-auth-card { padding: 30px 22px; } .bb-auth-title { font-size: 26px; } .bb-auth-actions > * { width: 100%; } .bb-auth-field input { font-size: 16px; } }
</style>
