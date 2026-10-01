import { gsap } from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollToPlugin, ScrollTrigger);

console.log("GSAP berhasil dimuat:", gsap.version);


// ==================================================
// HERO
// ==================================================

const hero = document.querySelector("#teyvat");

if (hero) {
    const heroLogo = hero.querySelector("svg");
    const heroTitle = hero.querySelector("h1");
    const heroSubtitle = hero.querySelector("p");
    const exploreButton = hero.querySelector("button");

    // ----------------------------------------------
    // HERO ENTRANCE
    // ----------------------------------------------

    const heroTimeline = gsap.timeline();

    if (heroLogo) {
        heroTimeline.fromTo(
            heroLogo,
            {
                opacity: 0,
                y: -40,
                scale: 0.9
            },
            {
                opacity: 1,
                y: 28,
                scale: 1,
                duration: 1,
                ease: "power3.out"
            }
        );
    }

    if (heroTitle) {
        heroTimeline.fromTo(
            heroTitle,
            {
                opacity: 0,
                y: 50
            },
            {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power3.out"
            },
            "-=0.6"
        );
    }

    if (heroSubtitle) {
        heroTimeline.fromTo(
            heroSubtitle,
            {
                opacity: 0,
                y: 30
            },
            {
                opacity: 1,
                y: 0,
                duration: 0.7,
                ease: "power3.out"
            },
            "-=0.45"
        );
    }

    if (exploreButton) {
        heroTimeline.fromTo(
            exploreButton,
            {
                opacity: 0,
                y: 25,
                scale: 0.9
            },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.5,
                ease: "back.out(1.5)"
            },
            "-=0.35"
        );
    }


    // ----------------------------------------------
    // HERO PARALLAX
    // ----------------------------------------------

    const moveHeroX = heroLogo && gsap.quickTo(heroLogo, "x", {
        duration: 0.22,
        ease: "power3.out"
    });
    const tiltHeroX = heroLogo && gsap.quickTo(heroLogo, "rotationX", {
        duration: 0.22,
        ease: "power3.out"
    });
    const tiltHeroY = heroLogo && gsap.quickTo(heroLogo, "rotationY", {
        duration: 0.22,
        ease: "power3.out"
    });

    if (heroLogo && moveHeroX && tiltHeroX && tiltHeroY) {
        gsap.set(heroLogo, {
            transformPerspective: 800,
            transformOrigin: "50% 50%"
        });

        heroLogo.addEventListener("mousemove", (event) => {
            const bounds = heroLogo.getBoundingClientRect();
            const x = (event.clientX - bounds.left) / bounds.width - 0.5;
            const y = (event.clientY - bounds.top) / bounds.height - 0.5;

            moveHeroX(x * 34);
            tiltHeroX(y * -8);
            tiltHeroY(x * 11);
        });

        heroLogo.addEventListener("mouseleave", () => {
            moveHeroX(0);
            tiltHeroX(0);
            tiltHeroY(0);
        });
    }


    // ----------------------------------------------
    // HERO SCROLL EFFECT
    // ----------------------------------------------

    const heroContent = hero.querySelector(".relative.z-10");

    if (heroContent) {
        gsap.to(heroContent, {
            yPercent: -18,
            scrollTrigger: {
                trigger: hero,
                start: "top top",
                end: "bottom top",
                scrub: 1
            }
        });
    }


    // ----------------------------------------------
    // EXPLORE BUTTON
    // ----------------------------------------------

    if (exploreButton) {

        // Hapus behavior inline lama secara aman
        exploreButton.removeAttribute("onclick");

        exploreButton.addEventListener("click", (event) => {
            event.preventDefault();

            const story = document.querySelector("#story");

            if (!story) return;

            gsap.to(window, {
                duration: 1.1,
                scrollTo: {
                    y: story,
                    offsetY: 0
                },
                ease: "power3.inOut"
            });
        });


        // Hover
        exploreButton.addEventListener("mouseenter", () => {
            gsap.to(exploreButton, {
                scale: 1.05,
                duration: 0.25,
                ease: "power2.out",
                overwrite: "auto"
            });
        });

        exploreButton.addEventListener("mouseleave", () => {
            gsap.to(exploreButton, {
                scale: 1,
                duration: 0.25,
                ease: "power2.out",
                overwrite: "auto"
            });
        });


        // Click feedback
        exploreButton.addEventListener("pointerdown", () => {
            gsap.to(exploreButton, {
                scale: 0.95,
                duration: 0.1,
                ease: "power2.out",
                overwrite: "auto"
            });
        });

        const releaseButton = () => {
            gsap.to(exploreButton, {
                scale: 1.05,
                duration: 0.15,
                ease: "power2.out",
                overwrite: "auto"
            });
        };

        exploreButton.addEventListener("pointerup", releaseButton);
        exploreButton.addEventListener("pointercancel", releaseButton);
    }
}


// ==================================================
// REGION SECTION
// ==================================================

const regionsSection = document.querySelector("#region-map");

if (regionsSection) {
    const regionPins = regionsSection.querySelectorAll(".region-pin");

    if (regionPins.length > 0) {
        gsap.fromTo(
            regionPins,
            { autoAlpha: 0, scale: 0.82, y: 12 },
            {
                autoAlpha: 1,
                scale: 1,
                y: 0,
                duration: 0.7,
                stagger: 0.1,
                ease: "back.out(1.4)",
                scrollTrigger: {
                    trigger: regionsSection,
                    start: "top 70%",
                    toggleActions: "play reverse play reverse"
                }
            }
        );
    }

    regionPins.forEach((pin) => {
        const emblem = pin.querySelector(".region-emblem");
        const name = pin.dataset.name || "Teyvat region";

        pin.tabIndex = 0;
        pin.setAttribute("role", "button");
        pin.setAttribute("aria-label", `Open ${name}`);

        pin.addEventListener("mouseenter", () => {
            gsap.to(pin, {
                filter: "drop-shadow(0px 10px 18px rgba(222, 183, 108, 0.95))",
                duration: 0.2,
                overwrite: "auto"
            });

            if (emblem) {
                gsap.to(emblem, {
                    scale: 1.08,
                    rotation: 4,
                    duration: 0.25,
                    ease: "power2.out",
                    overwrite: "auto"
                });
            }
        });

        pin.addEventListener("mouseleave", () => {
            gsap.to(pin, {
                clearProps: "filter",
                duration: 0.2,
                overwrite: "auto"
            });

            if (emblem) {
                gsap.to(emblem, {
                    scale: 1,
                    rotation: 0,
                    duration: 0.3,
                    ease: "power2.out",
                    overwrite: "auto"
                });
            }
        });

        pin.addEventListener("keydown", (event) => {
            if (event.key !== "Enter" && event.key !== " ") return;

            event.preventDefault();
            window.openCard?.(pin);
        });
    });
}


// ==================================================
// SECTION REVEALS
// ==================================================

const revealSections = [
    { section: "#story", targets: "svg, p" },
    { section: "#explore", targets: "p" },
    { section: "#download", targets: "p, a" }
];

revealSections.forEach(({ section, targets }) => {
    const container = document.querySelector(section);
    const elements = container?.querySelectorAll(targets);

    if (!container || !elements?.length) return;

    elements.forEach((element) => {
        const isStoryDecoration =
            section === "#story" && element.tagName === "svg";

        gsap.fromTo(
            element,
            {
                autoAlpha: 0,
                x: isStoryDecoration
                    ? element === elements[0] ? -36 : 36
                    : 0,
                y: isStoryDecoration ? 0 : 32,
                scale: isStoryDecoration ? 0.94 : 1
            },
            {
                autoAlpha: 1,
                x: 0,
                y: 0,
                scale: 1,
                duration: 0.8,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: element,
                    start: "top 88%",
                    toggleActions: "play reverse play reverse"
                }
            }
        );
    });
});


// ==================================================
// REFRESH SCROLLTRIGGER
// ==================================================

window.addEventListener("load", () => {
    ScrollTrigger.refresh();
});

window.addEventListener("resize", () => {
    ScrollTrigger.refresh();
});