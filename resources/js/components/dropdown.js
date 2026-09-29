const BB_DROPDOWN_SELECTOR = '[data-bb-dropdown]';

function closeDropdown(dropdown) {
    if (!dropdown) return;

    dropdown.classList.remove('is-open');

    const trigger = dropdown.querySelector('[data-bb-dropdown-trigger]');
    const search = dropdown.querySelector('[data-bb-dropdown-search]');

    trigger?.setAttribute('aria-expanded', 'false');

    if (search) {
        search.value = '';
        filterOptions(dropdown, '');
    }

    clearFocusedOptions(dropdown);
}

function closeAllDropdowns(except = null) {
    document.querySelectorAll(BB_DROPDOWN_SELECTOR).forEach(dropdown => {
        if (dropdown !== except) {
            closeDropdown(dropdown);
        }
    });
}

function openDropdown(dropdown) {
    if (!dropdown || dropdown.classList.contains('is-disabled')) return;

    closeAllDropdowns(dropdown);

    dropdown.classList.add('is-open');

    const trigger = dropdown.querySelector('[data-bb-dropdown-trigger]');
    const search = dropdown.querySelector('[data-bb-dropdown-search]');

    trigger?.setAttribute('aria-expanded', 'true');

    if (search) {
        requestAnimationFrame(() => search.focus());
    }
}

function toggleDropdown(dropdown) {
    if (dropdown.classList.contains('is-open')) {
        closeDropdown(dropdown);
    } else {
        openDropdown(dropdown);
    }
}

function filterOptions(dropdown, query) {
    const options = [
        ...dropdown.querySelectorAll('[data-bb-dropdown-option]')
    ];

    const empty = dropdown.querySelector('[data-bb-dropdown-empty]');
    const optionsContainer = dropdown.querySelector('[data-bb-dropdown-options]');
    const keyword = query.trim().toLowerCase();

    options.forEach((option, index) => {
        if (option.dataset.bbDropdownOrder === undefined) {
            option.dataset.bbDropdownOrder = String(index);
        }
    });

    const rankedOptions = options.map(option => {
        const label = (option.dataset.label || option.textContent)
            .trim()
            .toLowerCase();

        const matches = !keyword || label.includes(keyword);
        const rank = !keyword
            ? 0
            : label.startsWith(keyword)
                ? 0
                : matches
                    ? 1
                    : 2;

        return {
            option,
            matches,
            rank,
            order: Number(option.dataset.bbDropdownOrder),
        };
    }).sort((a, b) => a.rank - b.rank || a.order - b.order);

    rankedOptions.forEach(({ option, matches }) => {
        option.hidden = !matches;
        optionsContainer?.append(option);
    });

    const visibleCount = rankedOptions.filter(item => item.matches).length;

    if (optionsContainer) {
        optionsContainer.scrollTop = 0;
    }

    if (empty) {
        empty.hidden = visibleCount !== 0;
    }
}

function selectOption(dropdown, option) {
    const input = dropdown.querySelector('[data-bb-dropdown-input]');
    const label = dropdown.querySelector('[data-bb-dropdown-label]');
    const options = dropdown.querySelectorAll('[data-bb-dropdown-option]');

    const value = option.dataset.value ?? '';
    const text = option.dataset.label ?? option.textContent.trim();

    if (input) {
        input.value = value;

        input.dispatchEvent(new Event('input', {
            bubbles: true
        }));

        input.dispatchEvent(new Event('change', {
            bubbles: true
        }));
    }

    if (label) {
        label.textContent = text;
    }

    options.forEach(item => {
        const selected = item === option;

        item.classList.toggle('is-selected', selected);
        item.setAttribute(
            'aria-selected',
            selected ? 'true' : 'false'
        );
    });

    dropdown.dispatchEvent(new CustomEvent('bb-dropdown:change', {
        bubbles: true,
        detail: {
            name: input?.name ?? '',
            value,
            label: text
        }
    }));

    closeDropdown(dropdown);
}

function getVisibleOptions(dropdown) {
    return [
        ...dropdown.querySelectorAll('[data-bb-dropdown-option]')
    ].filter(option => !option.hidden);
}

function clearFocusedOptions(dropdown) {
    dropdown
        .querySelectorAll('.is-focused')
        .forEach(option => option.classList.remove('is-focused'));
}

function moveFocus(dropdown, direction) {
    const options = getVisibleOptions(dropdown);

    if (!options.length) return;

    let index = options.findIndex(option =>
        option.classList.contains('is-focused')
    );

    clearFocusedOptions(dropdown);

    if (index === -1) {
        index = direction > 0 ? 0 : options.length - 1;
    } else {
        index += direction;

        if (index >= options.length) index = 0;
        if (index < 0) index = options.length - 1;
    }

    const option = options[index];

    option.classList.add('is-focused');
    option.scrollIntoView({
        block: 'nearest'
    });
}

function selectFocused(dropdown) {
    const focused = dropdown.querySelector(
        '[data-bb-dropdown-option].is-focused'
    );

    if (focused) {
        selectOption(dropdown, focused);
        return true;
    }

    return false;
}

function initDropdown(dropdown) {
    if (dropdown.dataset.bbDropdownReady === 'true') return;

    dropdown.dataset.bbDropdownReady = 'true';

    const trigger = dropdown.querySelector('[data-bb-dropdown-trigger]');
    const search = dropdown.querySelector('[data-bb-dropdown-search]');

    trigger?.addEventListener('click', event => {
        event.preventDefault();
        event.stopPropagation();

        toggleDropdown(dropdown);
    });

    search?.addEventListener('input', event => {
        filterOptions(dropdown, event.target.value);
        clearFocusedOptions(dropdown);
    });

    search?.addEventListener('click', event => {
        event.stopPropagation();
    });

    dropdown.addEventListener('click', event => {
        const option = event.target.closest('[data-bb-dropdown-option]');

        if (!option || !dropdown.contains(option)) return;

        event.preventDefault();
        event.stopPropagation();

        selectOption(dropdown, option);
    });

    dropdown.addEventListener('keydown', event => {
        switch (event.key) {
            case 'ArrowDown':
                event.preventDefault();

                if (!dropdown.classList.contains('is-open')) {
                    openDropdown(dropdown);
                }

                moveFocus(dropdown, 1);
                break;

            case 'ArrowUp':
                event.preventDefault();

                if (!dropdown.classList.contains('is-open')) {
                    openDropdown(dropdown);
                }

                moveFocus(dropdown, -1);
                break;

            case 'Enter':
                if (!dropdown.classList.contains('is-open')) {
                    event.preventDefault();
                    openDropdown(dropdown);
                    break;
                }

                if (selectFocused(dropdown)) {
                    event.preventDefault();
                }
                break;

            case 'Escape':
                if (dropdown.classList.contains('is-open')) {
                    event.preventDefault();
                    closeDropdown(dropdown);
                    trigger?.focus();
                }
                break;

            case 'Tab':
                closeDropdown(dropdown);
                break;
        }
    });
}

function initAllDropdowns() {
    document
        .querySelectorAll(BB_DROPDOWN_SELECTOR)
        .forEach(initDropdown);
}

document.addEventListener('click', event => {
    const dropdown = event.target.closest(BB_DROPDOWN_SELECTOR);

    if (!dropdown) {
        closeAllDropdowns();
    }
});

document.addEventListener('DOMContentLoaded', initAllDropdowns);

/*
|--------------------------------------------------------------------------
| รองรับกรณี Blade/HTML ถูกเพิ่มภายหลัง
|--------------------------------------------------------------------------
*/

const bbDropdownObserver = new MutationObserver(() => {
    initAllDropdowns();
});

bbDropdownObserver.observe(document.documentElement, {
    childList: true,
    subtree: true
});

window.BBDropdown = {
    init: initAllDropdowns,
    closeAll: closeAllDropdowns
};
