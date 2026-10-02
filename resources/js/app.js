import "./gsap-animation.js";

const exploreButton = document.getElementById("explore-btn");
const introSection = document.getElementById("intro");

document.addEventListener("DOMContentLoaded", () => {
    const viewport = document.getElementById("map-viewport");
    const canvas = document.getElementById("map-canvas");
    const map = document.getElementById("teyvat-map");

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

        scale = Math.max(vw / naturalW, vh / naturalH);
    }

    function clampPosition() {
        const vw = viewport.clientWidth;
        const vh = viewport.clientHeight;
        const mw = map.offsetWidth * scale;
        const mh = map.offsetHeight * scale;

        translateX =
            mw < vw
                ? (vw - mw) / 2
                : Math.min(0, Math.max(translateX, vw - mw));

        translateY =
            mh < vh
                ? (vh - mh) / 2
                : Math.min(0, Math.max(translateY, vh - mh));
    }

    viewport.addEventListener("pointerdown", (event) => {
        if (event.target.closest("#region-card")) return;

        isDragging = true;
        hasMoved = false;

        startX = event.clientX - translateX;
        startY = event.clientY - translateY;

        activePin = event.target.closest(".region-pin");

        viewport.setPointerCapture(event.pointerId);

        canvas.classList.remove("cursor-grab");
        canvas.classList.add("cursor-grabbing");
    });

    viewport.addEventListener("pointermove", (event) => {
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

        canvas.classList.remove("cursor-grabbing");
        canvas.classList.add("cursor-grab");

        if (!hasMoved && activePin) {
            if (typeof openCard === "function") {
                openCard(activePin);
            }
        }

        activePin = null;
    };

    viewport.addEventListener("pointerup", stopDragging);

    viewport.addEventListener("pointercancel", () => {
        isDragging = false;
        activePin = null;

        canvas.classList.remove("cursor-grabbing");
        canvas.classList.add("cursor-grab");
    });

    map.addEventListener("dragstart", (event) => {
        event.preventDefault();
    });

    function initializeMap() {
        if (!map.naturalWidth) {
            map.addEventListener("load", initializeMap, { once: true });
            return;
        }

        calculateScale();
        clampPosition();
        updateMap();
    }

    if (map.complete) {
        initializeMap();
    } else {
        map.addEventListener("load", initializeMap, { once: true });
    }

    window.addEventListener("resize", () => {
        calculateScale();
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

// EXPLORE CAROUSEL
document.addEventListener("DOMContentLoaded", () => {
    const carousel = document.getElementById("explore-carousel");
    const cards = document.querySelectorAll(".explore-card");
    const buttons = document.querySelectorAll(".explore-indicator button");

    if (!carousel) return;

    function goSlide(index) {
        const card = cards[index];

        if (card) {
            carousel.scrollTo({
                left: card.offsetLeft - carousel.offsetLeft,
                behavior: "smooth",
            });
        }
    }

    buttons.forEach((button, index) => {
        button.onclick = () => {
            goSlide(index);
        };
    });

    function update() {
        let active = 0;
        let distance = Infinity;

        cards.forEach((card, index) => {
            const diff = Math.abs(
                card.offsetLeft - carousel.scrollLeft
            );

            if (diff < distance) {
                distance = diff;
                active = index;
            }
        });

        buttons.forEach((btn, index) => {
            btn.classList.toggle("active", index === active);
        });
    }

    carousel.addEventListener("scroll", update);
    update();
});

// ELEMENTAL COMBAT
document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("combat-elements");
    const items = [...document.querySelectorAll(".combat-element")];
    const dots = [...document.querySelectorAll(".combat-dot")];
    const reactions = [...document.querySelectorAll(".combat-reaction")];
    const next = document.getElementById("combat-next");
    const prev = document.getElementById("combat-prev");
    const elementName = document.getElementById("active-element-name");
    const media = document.getElementById("combat-image");

    if (!container || items.length === 0) return;

    let activeIndex = Math.min(5, items.length - 1);
    let animationFrame = null;

    function updateReaction(elementId) {
        if (animationFrame !== null) {
            cancelAnimationFrame(animationFrame);
        }

        const matchedReactions = [];

        reactions.forEach((reaction) => {
            const name = reaction.dataset.reactionName;
            let show = false;

            if (elementId == 1) {
                show = name === "Swirl";
            } else if (elementId == 2) {
                show = name === "Crystallize";
            } else if (elementId == 3) {
                show =
                    name === "Overloaded" ||
                    name === "Electro-Charged" ||
                    name === "Superconduct" ||
                    name === "Quicken" ||
                    name === "Aggravate";
            } else if (elementId == 4) {
                show =
                    name === "Burning" ||
                    name === "Bloom" ||
                    name === "Quicken" ||
                    name === "Spread";
            } else if (elementId == 5) {
                show =
                    name === "Vaporize" ||
                    name === "Electro-Charged" ||
                    name === "Bloom" ||
                    name === "Frozen";
            } else if (elementId == 6) {
                show =
                    name === "Vaporize" ||
                    name === "Melt" ||
                    name === "Overloaded" ||
                    name === "Burning";
            } else if (elementId == 7) {
                show =
                    name === "Melt" ||
                    name === "Superconduct" ||
                    name === "Frozen";
            }

            reaction.classList.remove("show");

            if (show) {
                matchedReactions.push(reaction);
            }
        });

        animationFrame = requestAnimationFrame(() => {
            matchedReactions.forEach((reaction) => {
                reaction.classList.add("show");
            });

            animationFrame = null;
        });
    }

    function render() {
        const total = items.length;
        const order = [];

        for (let offset = -3; offset <= 3; offset++) {
            const index = (activeIndex + offset + total) % total;

            if (!order.includes(index)) {
                order.push(index);
            }
        }

        container.innerHTML = "";

        order.forEach((index) => {
            const item = items[index];

            item.classList.toggle(
                "active",
                index === activeIndex
            );

            container.appendChild(item);
        });

        dots.forEach((dot, index) => {
            dot.classList.toggle(
                "active",
                index === activeIndex
            );
        });

        const activeElement = items[activeIndex];

        if (!activeElement) return;

        const name = activeElement.dataset.elementName;
        const id = activeElement.dataset.elementId;
        const gif = activeElement.dataset.media;

        if (elementName) {
            elementName.textContent = name;
        }

        if (media && gif) {
            media.src = gif;
            media.alt = name + " Elemental Combat";
        }

        updateReaction(id);
    }

    if (next) {
        next.addEventListener("click", () => {
            activeIndex = (activeIndex + 1) % items.length;
            render();
        });
    }

    if (prev) {
        prev.addEventListener("click", () => {
            activeIndex =
                (activeIndex - 1 + items.length) % items.length;

            render();
        });
    }

    items.forEach((item, index) => {
        item.addEventListener("click", () => {
            activeIndex = index;
            render();
        });
    });

    dots.forEach((dot, index) => {
        dot.addEventListener("click", () => {
            if (index < items.length) {
                activeIndex = index;
                render();
            }
        });
    });

    render();
});