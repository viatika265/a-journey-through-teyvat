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
                y: 0,
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

    const moveHeroX = gsap.quickTo(heroLogo, "x", {
        duration: 0.5,
        ease: "power2.out"
    });

    const moveHeroY = gsap.quickTo(heroLogo, "y", {
        duration: 0.5,
        ease: "power2.out"
    });

    hero.addEventListener("mousemove", (event) => {
        if (!heroLogo) return;

        const x =
            (event.clientX / window.innerWidth - 0.5) * 2;

        const y =
            (event.clientY / window.innerHeight - 0.5) * 2;

        moveHeroX(x * 10);
        moveHeroY(y * 8);
    });

    hero.addEventListener("mouseleave", () => {
        if (!heroLogo) return;

        moveHeroX(0);
        moveHeroY(0);
    });


    // ----------------------------------------------
    // HERO SCROLL EFFECT
    // ----------------------------------------------

    const heroElements = [
        heroLogo,
        heroTitle,
        heroSubtitle,
        exploreButton
    ].filter(Boolean);

    if (heroElements.length > 0) {
        gsap.to(heroElements, {
            y: -70,
            opacity: 0.25,
            scale: 0.96,
            stagger: 0.02,
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
        exploreButton.addEventListener("mousedown", () => {
            gsap.to(exploreButton, {
                scale: 0.95,
                duration: 0.1,
                ease: "power2.out",
                overwrite: "auto"
            });
        });

        exploreButton.addEventListener("mouseup", () => {
            gsap.to(exploreButton, {
                scale: 1.05,
                duration: 0.15,
                ease: "power2.out",
                overwrite: "auto"
            });
        });
    }
}


// ==================================================
// REGION SECTION
// ==================================================

const regionsSection = document.querySelector("#regions");

if (regionsSection) {

    const regionTitle = regionsSection.querySelector("h2");
    const regionSubtitle = regionsSection.querySelector("p");

    const regionCards = regionsSection.querySelectorAll(
        ".grid > a"
    );

    console.log(
        "Jumlah region cards:",
        regionCards.length
    );


    // ----------------------------------------------
    // REGION ENTRANCE
    // ----------------------------------------------

    const regionsTimeline = gsap.timeline({
        scrollTrigger: {
            trigger: regionsSection,
            start: "top 80%",
            once: true
        }
    });

    if (regionTitle) {
        regionsTimeline.fromTo(
            regionTitle,
            {
                opacity: 0,
                y: 45
            },
            {
                opacity: 1,
                y: 0,
                duration: 0.9,
                ease: "power3.out"
            }
        );
    }

    if (regionSubtitle) {
        regionsTimeline.fromTo(
            regionSubtitle,
            {
                opacity: 0,
                y: 25
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

    if (regionCards.length > 0) {
        regionsTimeline.fromTo(
            regionCards,
            {
                opacity: 0,
                y: 35,
                scale: 0.96
            },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.8,
                stagger: 0.12,
                ease: "power3.out"
            },
            "-=0.25"
        );
    }


    // ----------------------------------------------
    // REGION TITLE PARALLAX
    // ----------------------------------------------

    if (regionTitle && regionSubtitle) {

        const moveTitleX = gsap.quickTo(regionTitle, "x", {
            duration: 0.5,
            ease: "power2.out"
        });

        const moveTitleY = gsap.quickTo(regionTitle, "y", {
            duration: 0.5,
            ease: "power2.out"
        });

        const moveSubtitleX = gsap.quickTo(
            regionSubtitle,
            "x",
            {
                duration: 0.5,
                ease: "power2.out"
            }
        );

        const moveSubtitleY = gsap.quickTo(
            regionSubtitle,
            "y",
            {
                duration: 0.5,
                ease: "power2.out"
            }
        );

        regionsSection.addEventListener("mousemove", (event) => {

            const rect =
                regionsSection.getBoundingClientRect();

            const x =
                (event.clientX - rect.left) /
                rect.width -
                0.5;

            const y =
                (event.clientY - rect.top) /
                rect.height -
                0.5;

            moveTitleX(x * 6);
            moveTitleY(y * 4);

            moveSubtitleX(x * 4);
            moveSubtitleY(y * 3);
        });

        regionsSection.addEventListener("mouseleave", () => {

            moveTitleX(0);
            moveTitleY(0);

            moveSubtitleX(0);
            moveSubtitleY(0);
        });
    }


    // ----------------------------------------------
    // REGION CARD INTERACTION
    // ----------------------------------------------

    regionCards.forEach((card) => {

        card.addEventListener("mouseenter", () => {
            gsap.to(card, {
                y: -8,
                scale: 1.03,
                duration: 0.35,
                ease: "power2.out",
                overwrite: "auto"
            });
        });

        card.addEventListener("mousemove", (event) => {

            const rect =
                card.getBoundingClientRect();

            const x =
                (event.clientX - rect.left) /
                rect.width;

            const y =
                (event.clientY - rect.top) /
                rect.height;

            const rotateY = (x - 0.5) * 8;
            const rotateX = (0.5 - y) * 8;

            gsap.to(card, {
                rotateX,
                rotateY,
                transformPerspective: 800,
                duration: 0.35,
                ease: "power2.out",
                overwrite: "auto"
            });
        });

        card.addEventListener("mouseleave", () => {
            gsap.to(card, {
                y: 0,
                scale: 1,
                rotateX: 0,
                rotateY: 0,
                duration: 0.45,
                ease: "power3.out",
                overwrite: "auto"
            });
        });

        card.addEventListener("mousedown", () => {
            gsap.to(card, {
                scale: 0.97,
                duration: 0.1,
                overwrite: "auto"
            });
        });

        card.addEventListener("mouseup", () => {
            gsap.to(card, {
                scale: 1.03,
                duration: 0.15,
                overwrite: "auto"
            });
        });
    });
}


// ==================================================
// REFRESH SCROLLTRIGGER
// ==================================================

window.addEventListener("load", () => {
    ScrollTrigger.refresh();
});

window.addEventListener("resize", () => {
    ScrollTrigger.refresh();
});