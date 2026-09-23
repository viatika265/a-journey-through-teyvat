import { gsap } from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollToPlugin, ScrollTrigger);

console.log("GSAP berhasil dimuat:", gsap.version);


// ====================
// HERO ENTRANCE
// ====================

const heroTimeline = gsap.timeline({ paused: true });

heroTimeline
    .from(".hero-content .eyebrow", {
        opacity: 0,
        y: 30,
        duration: 0.6,
        ease: "power3.out"
    })
    .from(".hero-content h1", {
        opacity: 0,
        y: 50,
        duration: 0.8,
        ease: "power3.out"
    }, "-=0.3")
    .from(".hero-content .subtitle", {
        opacity: 0,
        y: 30,
        duration: 0.6,
        ease: "power3.out"
    }, "-=0.3")
    .from("#explore-btn", {
        opacity: 0,
        y: 20,
        scale: 0.9,
        duration: 0.5,
        ease: "back.out(1.7)"
    }, "-=0.2");


// Jalankan saat pertama kali halaman dibuka
heroTimeline.play();


// Ulangi animasi saat kembali ke Hero
ScrollTrigger.create({
    trigger: ".hero",
    start: "top 80%",
    onEnterBack: () => {
        heroTimeline.restart();
    }
});

// ====================
// INTRO SCROLL ANIMATION
// ====================

gsap.from(".intro-content", {
    opacity: 0,
    y: 80,
    duration: 1,
    ease: "power3.out",
    scrollTrigger: {
        trigger: ".intro",
        start: "top 80%",
        toggleActions: "play none none none"
    }
});


// ====================
// EXPLORE BUTTON
// ====================

const exploreButton = document.querySelector("#explore-btn");

if (exploreButton) {
    exploreButton.addEventListener("click", () => {
        gsap.to(window, {
            scrollTo: "#intro",
            duration: 1.2,
            ease: "power2.inOut"
        });
    });
}


// ====================
// HERO MOUSE PARALLAX
// ====================

const hero = document.querySelector(".hero");
const heroContent = document.querySelector(".hero-content");

if (hero && heroContent) {
    hero.addEventListener("mousemove", (e) => {
        const x = (e.clientX / window.innerWidth - 0.5) * 2;
        const y = (e.clientY / window.innerHeight - 0.5) * 2;

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