(() => {
    const clamp = (value, min, max) => Math.min(max, Math.max(min, value));

    const render = image => {
        const frame = image.parentElement;
        const frameWidth = frame.clientWidth;
        const frameHeight = frame.clientHeight;
        const naturalWidth = image.naturalWidth;
        const naturalHeight = image.naturalHeight;
        if (!frameWidth || !frameHeight || !naturalWidth || !naturalHeight) return;

        const x = clamp(Number(image.dataset.cropX), 0, 100);
        const y = clamp(Number(image.dataset.cropY), 0, 100);
        const zoom = clamp(Number(image.dataset.cropZoom), 1, 3);
        const coverScale = Math.max(frameWidth / naturalWidth, frameHeight / naturalHeight);
        const width = naturalWidth * coverScale * zoom;
        const height = naturalHeight * coverScale * zoom;
        const maxPanX = Math.max(0, (width - frameWidth) / 2);
        const maxPanY = Math.max(0, (height - frameHeight) / 2);
        const offsetX = maxPanX ? ((50 - x) / 50) * maxPanX : 0;
        const offsetY = maxPanY ? ((50 - y) / 50) * maxPanY : 0;

        image.style.width = `${width}px`;
        image.style.height = `${height}px`;
        image.style.left = `${frameWidth / 2 + offsetX}px`;
        image.style.top = `${frameHeight / 2 + offsetY}px`;
        image.classList.add('is-crop-ready');
    };

    document.querySelectorAll('img[data-featured-thumbnail]').forEach(image => {
        if (image.complete) render(image);
        image.addEventListener('load', () => render(image));
        new ResizeObserver(() => render(image)).observe(image.parentElement);
    });
})();
