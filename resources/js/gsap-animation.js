import { gsap } from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollToPlugin, ScrollTrigger);

console.log("GSAP berhasil dimuat:", gsap.version);


// ==========================================
// HERO ELEMENTS
// ==========================================

const hero = document.querySelector(".hero");
const heroContent = document.querySelector(".hero-content");
const heroTitle = document.querySelector(".hero-content h1");
const heroSubtitle = document.querySelector(".hero-content .subtitle");
const exploreButton = document.querySelector("#explore-btn");


// ==========================================
// HERO ENTRANCE
// ==========================================

const heroTimeline = gsap.timeline({
    paused: true
});

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
        }
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
        "-=0.35"
    );
}

if (exploreButton) {
    heroTimeline.fromTo(
        exploreButton,
        {
            opacity: 0,
            y: 20,
            scale: 0.9
        },
        {
            opacity: 1,
            y: 0,
            scale: 1,
            duration: 0.4,
            ease: "power2.out"
        },
        "-=0.4"
    );
}

heroTimeline.play();


// ==========================================
// HERO REPLAY
// ==========================================

if (hero) {
    ScrollTrigger.create({
        trigger: hero,
        start: "top 80%",
        end: "bottom 20%",

        onEnter: () => {
            heroTimeline.restart();
        },

        onEnterBack: () => {
            heroTimeline.restart();
        }
    });
}


// ==========================================
// HERO SCROLL TRANSITION
// ==========================================

if (hero && heroContent) {

    gsap.to(heroContent, {
        y: -80,
        scale: 0.94,
        opacity: 0.35,

        scrollTrigger: {
            trigger: hero,
            start: "top top",
            end: "bottom top",
            scrub: 1.2
        }
    });

}


// ==========================================
// HERO MOUSE PARALLAX
// ==========================================

if (hero && heroContent) {

    const moveHero = gsap.quickTo(heroContent, "x", {
        duration: 0.5,
        ease: "power2.out"
    });

    const moveHeroY = gsap.quickTo(heroContent, "y", {
        duration: 0.5,
        ease: "power2.out"
    });

    hero.addEventListener("mousemove", (e) => {

        const x =
            (e.clientX / window.innerWidth - 0.5) * 2;

        const y =
            (e.clientY / window.innerHeight - 0.5) * 2;

        moveHero(x * 15);
        moveHeroY(y * 15);
    });

    hero.addEventListener("mouseleave", () => {

        moveHero(0);
        moveHeroY(0);
    });

}


// ==========================================
// REGION ELEMENTS
// ==========================================

const regionsSection = document.querySelector("#regions");
const regionTitle = document.querySelector("#regions h2");
const regionSubtitle = document.querySelector("#regions p");

const regionCards = document.querySelectorAll(
    "#regions .grid > a"
);

console.log("Jumlah region cards:", regionCards.length);


// ==========================================
// REGION ENTRANCE
// ==========================================

let regionsTimeline = null;

function animateRegions() {

    if (regionsTimeline && regionsTimeline.isActive()) {
        return;
    }

    regionsTimeline = gsap.timeline();

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
                duration: 0.9,
                stagger: 0.12,
                ease: "power3.out"
            },
            "-=0.25"
        );

    }
}


// ==========================================
// REGION SCROLL TRIGGER
// ==========================================

if (regionsSection) {

    ScrollTrigger.create({
        trigger: regionsSection,
        start: "top 80%",
        end: "bottom 20%",

        onEnter: () => {
            animateRegions();
        },

        onEnterBack: () => {
            animateRegions();
        }
    });

}


// ==========================================
// REGION TITLE PARALLAX
// ==========================================

if (regionsSection && regionTitle && regionSubtitle) {

    const moveTitleX = gsap.quickTo(regionTitle, "x", {
        duration: 0.5,
        ease: "power2.out"
    });

    const moveTitleY = gsap.quickTo(regionTitle, "y", {
        duration: 0.5,
        ease: "power2.out"
    });

    const moveSubtitleX = gsap.quickTo(regionSubtitle, "x", {
        duration: 0.5,
        ease: "power2.out"
    });

    const moveSubtitleY = gsap.quickTo(regionSubtitle, "y", {
        duration: 0.5,
        ease: "power2.out"
    });

    regionsSection.addEventListener("mousemove", (e) => {

        const rect = regionsSection.getBoundingClientRect();

        const x =
            (e.clientX - rect.left) / rect.width - 0.5;

        const y =
            (e.clientY - rect.top) / rect.height - 0.5;

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


// ==========================================
// REGION CARD INTERACTION
// ==========================================

if (regionCards.length > 0) {

    regionCards.forEach((card) => {

        // ----------------------------------
        // HOVER
        // ----------------------------------

        card.addEventListener("mouseenter", () => {

            gsap.to(card, {
                y: -8,
                scale: 1.03,
                duration: 0.35,
                ease: "power2.out",
                overwrite: "auto"
            });

        });


        // ----------------------------------
        // MOUSE MOVE / 3D TILT
        // ----------------------------------

        card.addEventListener("mousemove", (e) => {

            const rect = card.getBoundingClientRect();

            const x =
                (e.clientX - rect.left) / rect.width;

            const y =
                (e.clientY - rect.top) / rect.height;

            const rotateY = (x - 0.5) * 8;
            const rotateX = (0.5 - y) * 8;

            gsap.to(card, {
                rotateX: rotateX,
                rotateY: rotateY,
                transformPerspective: 800,
                duration: 0.35,
                ease: "power2.out",
                overwrite: "auto"
            });

        });


        // ----------------------------------
        // MOUSE LEAVE
        // ----------------------------------

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


        // ----------------------------------
        // CLICK FEEDBACK
        // ----------------------------------

        card.addEventListener("mousedown", () => {

            gsap.to(card, {
                scale: 0.97,
                duration: 0.1,
                ease: "power2.out",
                overwrite: "auto"
            });

        });


        card.addEventListener("mouseup", () => {

            gsap.to(card, {
                scale: 1.03,
                duration: 0.15,
                ease: "power2.out",
                overwrite: "auto"
            });

        });

    });

}


// ==========================================
// EXPLORE BUTTON - SMOOTH SCROLL
// ==========================================

if (exploreButton) {

    exploreButton.addEventListener("click", (e) => {

        e.preventDefault();

        gsap.to(window, {
            duration: 1.1,

            scrollTo: {
                y: "#regions",
                autoKill: false
            },

            ease: "power3.inOut"
        });

    });

}


// ==========================================
// EXPLORE BUTTON HOVER
// ==========================================

if (exploreButton) {

    exploreButton.addEventListener("mouseenter", () => {

        gsap.to(exploreButton, {
            scale: 1.05,
            duration: 0.3,
            ease: "power2.out",
            overwrite: "auto"
        });

    });


    exploreButton.addEventListener("mouseleave", () => {

        gsap.to(exploreButton, {
            scale: 1,
            duration: 0.3,
            ease: "power2.out",
            overwrite: "auto"
        });

    });

}


// ==========================================
// EXPLORE BUTTON CLICK FEEDBACK
// ==========================================

if (exploreButton) {

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


// ==========================================
// SCROLLTRIGGER REFRESH
// ==========================================

window.addEventListener("load", () => {

    ScrollTrigger.refresh();

});


window.addEventListener("resize", () => {

    ScrollTrigger.refresh();

});