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
// HERO ENTRANCE ANIMATION
// ==========================================

const heroTimeline = gsap.timeline({
    paused: true
});


// H1
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
            duration: 0.8,
            ease: "power3.out"
        }
    );
}


// Subtitle
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
            duration: 0.6,
            ease: "power3.out"
        },
        "-=0.3"
    );
}


// Explore Button
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
            duration: 0.5,
            ease: "back.out(1.7)"
        },
        "-=0.2"
    );
}


// Jalankan animasi hero
heroTimeline.play();


// ==========================================
// HERO REPLAY SAAT SCROLL KEMBALI
// ==========================================

if (hero) {
    ScrollTrigger.create({
        trigger: hero,
        start: "top 80%",

        onEnterBack: () => {
            heroTimeline.restart();
        }
    });
}


// ==========================================
// REGION SECTION
// ==========================================

const regionsSection = document.querySelector("#regions");
const regionsContainer = document.querySelector(
    "#regions .max-w-6xl"
);
const regionGrid = document.querySelector(
    "#regions .grid"
);
const regionCards = document.querySelectorAll(
    "#regions .grid > a"
);


// ==========================================
// REGION SECTION ENTRANCE
// ==========================================

if (regionsContainer && regionsSection) {

    gsap.fromTo(
        regionsContainer,
        {
            opacity: 0,
            y: 80
        },
        {
            opacity: 1,
            y: 0,
            duration: 1,
            ease: "power3.out",

            scrollTrigger: {
                trigger: regionsSection,
                start: "top 80%",
                toggleActions: "play none none none"
            }
        }
    );

}


// ==========================================
// REGION CARD STAGGER ANIMATION
// ==========================================

if (regionGrid && regionCards.length > 0) {

    gsap.fromTo(
        regionCards,
        {
            opacity: 0,
            y: 50,
            scale: 0.95
        },
        {
            opacity: 1,
            y: 0,
            scale: 1,
            duration: 0.6,
            stagger: 0.15,
            ease: "power3.out",

            scrollTrigger: {
                trigger: regionGrid,
                start: "top 80%",
                toggleActions: "play none none none"
            }
        }
    );

}


// ==========================================
// REGION CARD HOVER ANIMATION
// ==========================================

if (regionCards.length > 0) {

    regionCards.forEach((card) => {

        card.addEventListener("mouseenter", () => {

            gsap.to(card, {
                y: -8,
                scale: 1.03,
                duration: 0.25,
                ease: "power2.out",
                overwrite: true
            });

        });


        card.addEventListener("mouseleave", () => {

            gsap.to(card, {
                y: 0,
                scale: 1,
                duration: 0.25,
                ease: "power2.out",
                overwrite: true
            });

        });

    });

}


// ==========================================
// REGION CARD CLICK FEEDBACK
// ==========================================

if (regionCards.length > 0) {

    regionCards.forEach((card) => {

        card.addEventListener("mousedown", () => {

            gsap.to(card, {
                scale: 0.97,
                duration: 0.1,
                ease: "power2.out"
            });

        });


        card.addEventListener("mouseup", () => {

            gsap.to(card, {
                scale: 1.03,
                duration: 0.15,
                ease: "power2.out"
            });

        });

    });

}


// ==========================================
// EXPLORE BUTTON
// ==========================================

if (exploreButton) {

    exploreButton.addEventListener("click", (e) => {

        e.preventDefault();

        gsap.to(window, {
            duration: 0.25,

            scrollTo: {
                y: "#regions",
                autoKill: false
            },

            ease: "power2.out",
            overwrite: true
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
            duration: 0.2,
            ease: "power2.out",
            overwrite: true
        });

    });


    exploreButton.addEventListener("mouseleave", () => {

        gsap.to(exploreButton, {
            scale: 1,
            duration: 0.2,
            ease: "power2.out",
            overwrite: true
        });

    });

}


// ==========================================
// EXPLORE BUTTON CLICK ANIMATION
// ==========================================

if (exploreButton) {

    exploreButton.addEventListener("mousedown", () => {

        gsap.to(exploreButton, {
            scale: 0.95,
            duration: 0.1,
            ease: "power2.out"
        });

    });


    exploreButton.addEventListener("mouseup", () => {

        gsap.to(exploreButton, {
            scale: 1,
            duration: 0.15,
            ease: "power2.out"
        });

    });

}


// ==========================================
// HERO MOUSE PARALLAX
// ==========================================

if (hero && heroContent) {

    hero.addEventListener("mousemove", (e) => {

        const x =
            (e.clientX / window.innerWidth - 0.5) * 2;

        const y =
            (e.clientY / window.innerHeight - 0.5) * 2;


        gsap.to(heroContent, {
            x: x * 10,
            y: y * 10,
            duration: 0.6,
            ease: "power2.out",
            overwrite: true
        });

    });


    hero.addEventListener("mouseleave", () => {

        gsap.to(heroContent, {
            x: 0,
            y: 0,
            duration: 0.8,
            ease: "power3.out"
        });

    });

}


// ==========================================
// HERO CONTENT RESET
// ==========================================

if (hero) {

    hero.addEventListener("mouseleave", () => {

        gsap.to(heroContent, {
            x: 0,
            y: 0,
            duration: 0.8,
            ease: "power3.out"
        });

    });

}


// ==========================================
// SCROLL PROGRESS EFFECT
// ==========================================

if (hero) {

    gsap.to(heroContent, {
        y: -30,

        scrollTrigger: {
            trigger: hero,
            start: "top top",
            end: "bottom top",
            scrub: 1
        }
    });

}


// ==========================================
// REFRESH SCROLLTRIGGER
// ==========================================

window.addEventListener("load", () => {

    ScrollTrigger.refresh();

});


// ==========================================
// RESPONSIVE REFRESH
// ==========================================

window.addEventListener("resize", () => {

    ScrollTrigger.refresh();

});


// ==========================================
// CLEANUP HELPER
// ==========================================

window.addEventListener("beforeunload", () => {

    ScrollTrigger.getAll().forEach((trigger) => {
        trigger.kill();
    });

});