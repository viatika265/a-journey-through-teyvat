import { gsap } from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollToPlugin, ScrollTrigger);

console.log("GSAP berhasil dimuat:", gsap.version);


// ==========================================
// HERO ENTRANCE ANIMATION
// ==========================================

const heroTimeline = gsap.timeline({ paused: true });

heroTimeline
    .fromTo(
        ".hero-content h1",
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
    )
    .fromTo(
        ".hero-content .subtitle",
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
    )
    .fromTo(
        "#explore-btn",
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


// Jalankan saat halaman dibuka
heroTimeline.play();


// ==========================================
// REPLAY HERO SAAT SCROLL KEMBALI
// ==========================================

ScrollTrigger.create({
    trigger: ".hero",
    start: "top 80%",

    onEnterBack: () => {
        heroTimeline.restart();
    }
});


// ==========================================
// REGION SECTION ANIMATION
// ==========================================

gsap.fromTo(
    "#regions .max-w-6xl",
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
            trigger: "#regions",
            start: "top 80%",
            toggleActions: "play none none none"
        }
    }
);


// ==========================================
// EXPLORE BUTTON
// ==========================================

const exploreButton = document.querySelector("#explore-btn");

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
// HERO MOUSE PARALLAX
// ==========================================

const hero = document.querySelector(".hero");
const heroContent = document.querySelector(".hero-content");

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
            ease: "power2.out"
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