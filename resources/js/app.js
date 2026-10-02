const exploreButton = document.getElementById('explore-btn');
const introSection = document.getElementById('intro');

document.addEventListener('DOMContentLoaded', () => {
    const viewport = document.getElementById('map-viewport');
    const canvas = document.getElementById('map-canvas');
    const map = document.getElementById('teyvat-map');

    if (!viewport || !canvas || !map) return;

    let scale = 1;
    let translateX = 0;
    let translateY = 0;
    let isDragging = false;
    let hasMoved = false;
    let startX = 0;
    let startY = 0;
    let activePin = null;
    const DRAG_THRESHOLD = 5;

    function updateMap() {
        canvas.style.transform =
            `translate(${translateX}px, ${translateY}px) scale(${scale})`;
    }

    function calculateScale() {
        const naturalW = map.naturalWidth || map.offsetWidth;
        const naturalH = map.naturalHeight || map.offsetHeight;
        const vw = viewport.clientWidth;
        const vh = viewport.clientHeight;
        // COVER: ambil rasio terbesar supaya map selalu menutupi seluruh viewport
        scale = Math.max(vw / naturalW, vh / naturalH);
    }

    function clampPosition() {
        const vw = viewport.clientWidth;
        const vh = viewport.clientHeight;
        const mw = map.offsetWidth * scale;
        const mh = map.offsetHeight * scale;

        translateX = mw < vw
            ? (vw - mw) / 2
            : Math.min(0, Math.max(translateX, vw - mw));

        translateY = mh < vh
            ? (vh - mh) / 2
            : Math.min(0, Math.max(translateY, vh - mh));
    }

    viewport.addEventListener('pointerdown', (event) => {
        // Jangan mulai drag kalau klik bagian card
        if (event.target.closest('#region-card')) return;

        isDragging = true;
        hasMoved = false;

        startX = event.clientX - translateX;
        startY = event.clientY - translateY;

        activePin = event.target.closest('.region-pin');

        viewport.setPointerCapture(event.pointerId);

        canvas.classList.remove('cursor-grab');
        canvas.classList.add('cursor-grabbing');
    });

    viewport.addEventListener('pointermove', (event) => {
        if (!isDragging) return;

        const newX = event.clientX - startX;
        const newY = event.clientY - startY;

        if (
            Math.abs(newX - translateX) > DRAG_THRESHOLD ||
            Math.abs(newY - translateY) > DRAG_THRESHOLD
        ) {
            hasMoved = true;
        }

        translateX = newX;
        translateY = newY;

        clampPosition();
        updateMap();
    });

    const stopDragging = () => {
        isDragging = false;

        canvas.classList.remove('cursor-grabbing');
        canvas.classList.add('cursor-grab');

        // Kalau cuma klik pin, buka region card
        if (!hasMoved && activePin) {
            openCard(activePin);
        }

        activePin = null;
    };

    viewport.addEventListener('pointerup', stopDragging);

    viewport.addEventListener('pointercancel', () => {
        isDragging = false;
        activePin = null;

        canvas.classList.remove('cursor-grabbing');
        canvas.classList.add('cursor-grab');
    });

    map.addEventListener('dragstart', (e) => e.preventDefault());

    function initializeMap() {
        if (!map.naturalWidth) {
            map.addEventListener('load', initializeMap, { once: true });
            return;
        }
        calculateScale();
        clampPosition();
        updateMap();
    }

    if (map.complete) {
        initializeMap();
    } else {
        map.addEventListener('load', initializeMap, { once: true });
    }

    // Recalculate scale setiap resize — bukan cuma clamp ulang
    window.addEventListener('resize', () => {
        calculateScale();
        clampPosition();
        updateMap();
    });
});