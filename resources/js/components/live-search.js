const initLiveSearch = root => {
    const input = root.querySelector('[data-bbls-input]');
    const results = root.querySelector('[data-bbls-panel]');
    const list = root.querySelector('[data-bbls-list]');
    const status = root.querySelector('[data-bbls-count]');
    const viewAll = root.querySelector('[data-bbls-all]');

    if (!input || !results || !list) return;

    const endpoint = root.dataset.endpoint || '/search/live';
    const productsUrl = root.dataset.productsUrl || '/products';

    let timer = null;
    let controller = null;
    let currentKeyword = '';

    const escapeHtml = (value = '') =>
        String(value).replace(/[&<>"']/g, char => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;',
        }[char]));

    const closeResults = () => {
        results.classList.remove('bbls-open');
        results.setAttribute('aria-hidden', 'true');
    };

    const openResults = () => {
        results.classList.add('bbls-open');
        results.setAttribute('aria-hidden', 'false');
    };

    const setStatus = message => {
        if (status) status.textContent = message;
    };

    const setViewAll = keyword => {
        if (!viewAll) return;

        viewAll.href =
            `${productsUrl}?search=${encodeURIComponent(keyword)}`;
    };

    const renderProducts = products => {
        if (!products.length) {
            list.innerHTML = `
                <div class="bbls-empty">
                    <strong>NO PRODUCTS FOUND</strong>
                    <span>Try another product name, brand or code.</span>
                </div>
            `;

            return;
        }

        list.innerHTML = products.map(product => {
            const name = escapeHtml(product.name);
            const brand = escapeHtml(product.brand || 'BUFFBRIDGE');
            const category = escapeHtml(product.category || '');
            const price = escapeHtml(product.price || '0.00');
            const url = escapeHtml(product.url || '#');
            const image = product.image
                ? escapeHtml(product.image)
                : '';

            return `
                <a href="${url}" class="bbls-item">
                    <div class="bbls-thumb">
                        ${
                            image
                                ? `<img src="${image}" alt="${name}" loading="lazy"
                                    onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                                   <span style="display:none">NO IMAGE</span>`
                                : `<span>NO IMAGE</span>`
                        }
                    </div>

                    <div class="bbls-info">
                        <div class="bbls-meta">
                            ${brand}${category ? ` · ${category}` : ''}
                        </div>

                        <div class="bbls-name">
                            ${name}
                        </div>
                    </div>

                    <div class="bbls-price">
                        ${price}฿
                    </div>
                </a>
            `;
        }).join('');
    };

    const search = async keyword => {
        controller?.abort();
        controller = new AbortController();

        setStatus('SEARCHING...');
        list.innerHTML = `
            <div class="bbls-loading">
                <i></i>
                SEARCHING PRODUCTS...
            </div>
        `;

        openResults();

        try {
            const response = await fetch(
                `${endpoint}?q=${encodeURIComponent(keyword)}`,
                {
                    headers: {
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    signal: controller.signal,
                }
            );

            if (!response.ok) {
                throw new Error(`HTTP ${response.status}`);
            }

            const data = await response.json();

            if (keyword !== currentKeyword) return;

            const products = Array.isArray(data.products)
                ? data.products
                : [];

            setStatus(
                products.length
                    ? `${products.length} RESULT${products.length === 1 ? '' : 'S'}`
                    : 'NO RESULTS'
            );

            renderProducts(products);
        } catch (error) {
            if (error.name === 'AbortError') return;

            setStatus('SEARCH ERROR');

            list.innerHTML = `
                <div class="bbls-empty">
                    <strong>SEARCH UNAVAILABLE</strong>
                    <span>Please try again.</span>
                </div>
            `;
        }
    };

    input.addEventListener('input', () => {
        clearTimeout(timer);

        const keyword = input.value.trim();
        currentKeyword = keyword;

        if (keyword.length < 2) {
            controller?.abort();
            list.innerHTML = '';
            setStatus('');
            closeResults();
            return;
        }

        setViewAll(keyword);

        timer = setTimeout(() => {
            search(keyword);
        }, 300);
    });

    input.addEventListener('focus', () => {
        if (input.value.trim().length >= 2 && list.innerHTML.trim()) {
            openResults();
        }
    });

    input.addEventListener('keydown', event => {
        if (event.key === 'Escape') {
            closeResults();
            input.blur();
            return;
        }

        if (event.key === 'Enter') {
            const keyword = input.value.trim();

            if (keyword.length < 2) return;

            event.preventDefault();

            window.location.href =
                `${productsUrl}?search=${encodeURIComponent(keyword)}`;
        }
    });

    document.addEventListener('click', event => {
        if (!root.contains(event.target)) {
            closeResults();
        }
    });
};

const initLiveSearches = () => {
    document.querySelectorAll('[data-bbls]').forEach(initLiveSearch);
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initLiveSearches);
} else {
    initLiveSearches();
}
