@if (config('tracking.meta_pixel_id'))
    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={{ rawurlencode(config('tracking.meta_pixel_id')) }}&amp;ev=PageView&amp;noscript=1"
            alt="">
    </noscript>
@endif
