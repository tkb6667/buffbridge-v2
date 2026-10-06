const createElement = (tag, className, text = '') => {
    const element = document.createElement(tag);
    if (className) element.className = className;
    element.textContent = text;
    return element;
};

const initBlogLiveSearch = root => {
    const find = selector => root.querySelector(selector);
    const input = find('[data-blog-live-search-input]');
    const panel = find('[data-blog-live-search-panel]');
    const list = find('[data-blog-live-search-list]');
    const count = find('[data-blog-live-search-count]');
    const footer = find('[data-blog-live-search-footer]');
    const viewAll = find('[data-blog-live-search-all]');
    const { endpoint, resultsUrl } = root.dataset;
    if (!input || !panel || !list || !endpoint || !resultsUrl) return;

    let timer;
    let controller;
    let currentKeyword = '';
    const toggle = open => {
        panel.classList.toggle('is-open', open);
        panel.setAttribute('aria-hidden', String(!open));
    };

    const message = (title, detail = '', loading = false) => {
        const box = createElement('div', 'bb-blog-search-message');
        if (loading) box.append(createElement('span', 'bb-blog-search-spinner'));
        box.append(createElement('strong', '', title));
        if (detail) box.append(createElement('span', '', detail));
        list.replaceChildren(box);
        footer.hidden = true;
    };

    const render = ({ articles = [], has_more: hasMore = false }, keyword) => {
        if (!articles.length) {
            count.textContent = 'No results';
            message('No articles found', 'Try another keyword.');
            return;
        }

        list.replaceChildren(...articles.map(article => {
            const link = createElement('a', 'bb-blog-search-item');
            link.href = article.url || '#';
            const thumb = createElement('div', 'bb-blog-search-thumb');
            if (article.image) {
                const image = createElement('img');
                image.src = article.image;
                image.alt = article.title || '';
                image.loading = 'lazy';
                image.onerror = () => {
                    image.remove();
                    thumb.textContent = 'NO IMAGE';
                };
                thumb.append(image);
            } else {
                thumb.textContent = 'NO IMAGE';
            }

            const info = createElement('div', 'bb-blog-search-info');
            info.append(
                createElement('div', 'bb-blog-search-title', article.title || ''),
                createElement('div', 'bb-blog-search-meta', [article.date, article.excerpt].filter(Boolean).join(' · '))
            );
            link.append(thumb, info);
            return link;
        }));

        count.textContent = `${articles.length} result${articles.length === 1 ? '' : 's'}`;
        footer.hidden = !hasMore;
        viewAll.href = `${resultsUrl}?search=${encodeURIComponent(keyword)}`;
    };

    const search = async keyword => {
        controller?.abort();
        controller = new AbortController();
        count.textContent = 'Searching...';
        message('Searching articles...', '', true);
        toggle(true);

        try {
            const response = await fetch(`${endpoint}?q=${encodeURIComponent(keyword)}`, {
                headers: { Accept: 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
                signal: controller.signal,
            });
            if (!response.ok) throw new Error(`HTTP ${response.status}`);
            const data = await response.json();
            if (keyword === currentKeyword) render(data, keyword);
        } catch (error) {
            if (error.name === 'AbortError') return;
            count.textContent = 'Search error';
            message('Search unavailable', 'Please try again.');
        }
    };

    input.addEventListener('input', () => {
        clearTimeout(timer);
        currentKeyword = input.value.trim();
        if (currentKeyword.length < 2) {
            controller?.abort();
            list.replaceChildren();
            count.textContent = '';
            footer.hidden = true;
            toggle(false);
            return;
        }
        timer = setTimeout(() => search(currentKeyword), 300);
    });
    input.addEventListener('focus', () => toggle(input.value.trim().length >= 2 && list.childElementCount > 0));
    input.addEventListener('keydown', event => {
        if (event.key === 'Escape') {
            toggle(false);
            input.blur();
        }
    });
    document.addEventListener('click', event => {
        if (!root.contains(event.target)) toggle(false);
    });
};

const initBlogLiveSearches = () =>
    document.querySelectorAll('[data-blog-live-search]').forEach(initBlogLiveSearch);

document.readyState === 'loading'
    ? document.addEventListener('DOMContentLoaded', initBlogLiveSearches)
    : initBlogLiveSearches();
