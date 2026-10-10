@props([
    'mode' => 'readonly',
    'title' => 'SHOP AVAILABILITY',
    'description' => '',
])

<section
    {{ $attributes->class(['bb-availability-panel']) }}
    data-booking-calendar
    data-calendar-mode="{{ $mode }}"
    aria-label="{{ $title }}"
>
    <div class="bb-availability-heading">
        <div>
            <h3>{{ $title }}</h3>
            @if($description)
                <p>{{ $description }}</p>
            @endif
        </div>
        <span class="bb-calendar-context" data-calendar-context>
            {{ $mode === 'selectable' ? 'SELECT AN OPEN DAY' : 'VIEW ONLY' }}
        </span>
    </div>

    <div class="bb-shop-calendar">
        <div class="bb-shop-calendar-head">
            <button type="button" class="bb-shop-calendar-nav" data-calendar-prev aria-label="Previous month">&#8249;</button>
            <span class="bb-shop-calendar-title" data-calendar-month aria-live="polite"></span>
            <button type="button" class="bb-shop-calendar-nav" data-calendar-next aria-label="Next month">&#8250;</button>
        </div>

        <div class="bb-shop-calendar-days" aria-hidden="true">
            <span>MON</span><span>TUE</span><span>WED</span><span>THU</span><span>FRI</span><span>SAT</span><span>SUN</span>
        </div>

        <div class="bb-shop-calendar-grid" data-calendar-days role="grid" aria-label="Monthly appointment availability">
            <div class="bb-calendar-feedback">Loading calendar...</div>
        </div>

        <div class="bb-shop-calendar-legend" aria-label="Calendar status legend">
            <span><i class="open"></i>OPEN</span>
            <span><i class="closed"></i>CLOSED</span>
            <span><i class="full"></i>FULL</span>
        </div>

        <p class="bb-calendar-message" data-calendar-message role="status"></p>
    </div>
</section>
