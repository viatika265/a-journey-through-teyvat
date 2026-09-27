import "./gsap-animation.js";

document.addEventListener("DOMContentLoaded", () => {
    const viewport = document.getElementById("map-viewport");
    const canvas = document.getElementById("map-canvas");
    const map = document.getElementById("teyvat-map");

    if (!viewport || !canvas || !map) return;

    let scale = 0.3;

    let translateX = 0;
    let translateY = 0;
    let isDragging = false;
    let startX = 0;
    let startY = 0;

    function updateMap() {
        canvas.style.transform = `translate(${translateX}px, ${translateY}px) scale(${scale})`;
    }

    function clampPosition() {
        const vw = viewport.clientWidth;
        const vh = viewport.clientHeight;
        const mw = map.offsetWidth * scale;
        const mh = map.offsetHeight * scale;

        if (mw < vw) {
            translateX = (vw - mw) / 2;
        } else {
            translateX = Math.min(0, Math.max(translateX, vw - mw));
        }

        if (mh < vh) {
            translateY = (vh - mh) / 2;
        } else {
            translateY = Math.min(0, Math.max(translateY, vh - mh));
        }
    }

    viewport.addEventListener("pointerdown", (event) => {
        isDragging = true;

        startX = event.clientX - translateX;
        startY = event.clientY - translateY;

        viewport.setPointerCapture(event.pointerId);

        canvas.classList.remove("cursor-grab");
        canvas.classList.add("cursor-grabbing");
    });

    viewport.addEventListener("pointermove", (event) => {
        if (!isDragging) return;

        translateX = event.clientX - startX;
        translateY = event.clientY - startY;

        clampPosition();
        updateMap();
    });

    const stopDragging = () => {
        isDragging = false;

        canvas.classList.remove("cursor-grabbing");
        canvas.classList.add("cursor-grab");
    };

    viewport.addEventListener("pointerup", stopDragging);
    viewport.addEventListener("pointercancel", stopDragging);

    map.addEventListener("dragstart", (event) => {
        event.preventDefault();
    });

    function initializeMap() {
        clampPosition();
        updateMap();
    }

    if (map.complete) {
        initializeMap();
    } else {
        map.addEventListener("load", initializeMap);
    }

    window.addEventListener("resize", () => {
        clampPosition();
        updateMap();
    });

    viewport.addEventListener("dblclick", (event) => {
        const rect = canvas.getBoundingClientRect();

        const currentScale = rect.width / canvas.offsetWidth;

        const originalX =
            (event.clientX - rect.left) / currentScale;

        const originalY =
            (event.clientY - rect.top) / currentScale;

        console.log(
            `left: ${Math.round(originalX)}px; top: ${Math.round(originalY)}px;`
        );
    });
});