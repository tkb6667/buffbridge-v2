@props([
    'name',
    'options' => [],
    'value' => null,
    'placeholder' => 'SELECT',
    'searchable' => false,
    'searchPlaceholder' => 'Search...',
])

@php
    $normalizedOptions = collect($options)->map(function ($label, $key) {
        if (is_array($label)) {
            return [
                'value' => (string) ($label['value'] ?? $key),
                'label' => (string) ($label['label'] ?? $label['name'] ?? $key),
            ];
        }

        return [
            'value' => (string) $key,
            'label' => (string) $label,
        ];
    })->values();

    $selected = $normalizedOptions->first(
        fn ($option) => (string) $option['value'] === (string) $value
    );

    $selectedLabel = $selected['label'] ?? $placeholder;
@endphp

<div
    {{ $attributes->class(['bb-dropdown']) }}
    data-bb-dropdown
>
    <input
        type="hidden"
        name="{{ $name }}"
        value="{{ $value ?? '' }}"
        data-bb-dropdown-input
    >

    <button
        type="button"
        class="bb-dropdown__trigger"
        data-bb-dropdown-trigger
        aria-haspopup="listbox"
        aria-expanded="false"
    >
        <span class="bb-dropdown__label" data-bb-dropdown-label>
            {{ $selectedLabel }}
        </span>

        <svg
            class="bb-dropdown__arrow"
            viewBox="0 0 24 24"
            aria-hidden="true"
        >
            <path d="m7 9.5 5 5 5-5"/>
        </svg>
    </button>

    <div class="bb-dropdown__menu" data-bb-dropdown-menu>
        @if($searchable)
            <div class="bb-dropdown__search-wrap">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="11" cy="11" r="6"></circle>
                    <path d="m16 16 4 4"></path>
                </svg>

                <input
                    type="text"
                    class="bb-dropdown__search"
                    placeholder="{{ $searchPlaceholder }}"
                    autocomplete="off"
                    data-bb-dropdown-search
                >
            </div>
        @endif

        <div
            class="bb-dropdown__options"
            role="listbox"
            data-bb-dropdown-options
        >
            @foreach($normalizedOptions as $option)
                @php
                    $isSelected = (string) $option['value'] === (string) $value;
                @endphp

                <button
                    type="button"
                    class="bb-dropdown__option {{ $isSelected ? 'is-selected' : '' }}"
                    data-bb-dropdown-option
                    data-value="{{ $option['value'] }}"
                    data-label="{{ $option['label'] }}"
                    role="option"
                    aria-selected="{{ $isSelected ? 'true' : 'false' }}"
                >
                    <span>{{ $option['label'] }}</span>

                    <svg
                        class="bb-dropdown__check"
                        viewBox="0 0 24 24"
                        aria-hidden="true"
                    >
                        <path d="m5 12 4 4L19 6"/>
                    </svg>
                </button>
            @endforeach

            <div
                class="bb-dropdown__empty"
                data-bb-dropdown-empty
                hidden
            >
                NO RESULTS FOUND
            </div>
        </div>
    </div>
</div>