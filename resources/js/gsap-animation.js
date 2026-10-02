import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

console.log("GSAP berhasil dimuat:", gsap.version);
// ==================================================
// HERO
// ==================================================

const hero = document.querySelector("#teyvat");

const playHeroWiggle = (target) => {
    if (!(target instanceof Element)) return;

    const timers = target.__heroWiggleTimers || [];
    timers.forEach(clearTimeout);

    target.style.transformOrigin = "center center";
    target.style.transform = "rotate(0deg)";

    const steps = [
        { angle: -0.9, delay: 0 },
        { angle: 0.9, delay: 110 },
        { angle: -0.5, delay: 120 },
        { angle: 0, delay: 120 }
    ];

    const nextTimers = [];
    let elapsed = 0;

    steps.forEach(({ angle, delay }) => {
        nextTimers.push(
            setTimeout(() => {
                target.style.transform = `rotate(${angle}deg)`;
            }, elapsed)
        );
        elapsed += delay;
    });

    target.__heroWiggleTimers = nextTimers;
};

const animateHeroLogoGlow = (target, active = true) => {
    if (!(target instanceof Element)) return;

    gsap.to(target, {
        scale: active ? 1.04 : 1,
        filter: active
            ? "drop-shadow(0 0 10px rgba(246, 246, 246, 0.72)) drop-shadow(0 0 18px rgba(222, 183, 108, 0.7))"
            : "none",
        duration: 0.22,
        ease: "power2.out",
        overwrite: "auto"
    });
};

if (hero) {
    gsap.set(hero, { position: "relative" });

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
                y: 50,
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
                y: 28,
                scale: 0.96
            },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.8,
                ease: "power3.out"
            },
            "-=0.7"
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

    if (heroLogo) {
        heroLogo.addEventListener("pointerenter", () => {
            playHeroWiggle(heroLogo);
            animateHeroLogoGlow(heroLogo, true);
        });
        heroLogo.addEventListener("pointerleave", () => {
            animateHeroLogoGlow(heroLogo, false);
        });
    }

    if (heroTitle) {
        heroTitle.addEventListener("pointerenter", () => {
            gsap.killTweensOf(heroTitle, "rotate");
            gsap.timeline()
                .fromTo(
                    heroTitle,
                    { rotate: 0 },
                    { rotate: -1.2, duration: 0.12, ease: "sine.inOut" }
                )
                .to(heroTitle, {
                    rotate: 1.2,
                    duration: 0.16,
                    ease: "sine.inOut"
                })
                .to(heroTitle, {
                    rotate: -0.7,
                    duration: 0.12,
                    ease: "sine.inOut"
                })
                .to(heroTitle, {
                    rotate: 0,
                    duration: 0.16,
                    ease: "sine.out"
                });
        });
    }

    ScrollTrigger.create({
        trigger: hero,
        start: "top top",
        end: "bottom top",
        onEnterBack: () => {
            heroTimeline.restart();
            if (heroLogo) playHeroWiggle(heroLogo);
            if (heroTitle) playHeroWiggle(heroTitle);
        }
    });


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
                scrub: 0.2
            }
        });
    }


    // ----------------------------------------------
    // EXPLORE BUTTON
    // ----------------------------------------------

    if (exploreButton) {
        exploreButton.removeAttribute("onclick");

        exploreButton.addEventListener("click", (event) => {
            event.preventDefault();

            const story = document.querySelector("#story");
            if (!story) return;

            const targetY = Math.max(0, story.getBoundingClientRect().top + window.scrollY - 28);

            gsap.to(window, {
                duration: 1.6,
                scrollTo: { y: targetY },
                ease: "none",
                overwrite: true
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

const story = document.querySelector("#story");

if (story) {
    gsap.set(story, { position: "relative" });
}

const regionsSection = document.querySelector("#region-map");

const regionIntro = document.querySelector("#region-intro");

if (
    regionIntro &&
    !window.matchMedia("(prefers-reduced-motion: reduce)").matches
) {
    const regionLogo = regionIntro.querySelector(".bg-contain");
    const regionName = regionIntro.querySelector("h1");
    const regionDivider = regionIntro.querySelector("svg");
    const regionSubtitle = regionIntro.querySelector("p");
    const introTimeline = gsap.timeline();

    if (regionLogo) {
        introTimeline.fromTo(
            regionLogo,
            { autoAlpha: 0, y: 24, scale: 0.9 },
            { autoAlpha: 1, y: 0, scale: 1, duration: 0.7, ease: "power3.out" }
        );

        regionLogo.addEventListener("pointerenter", () => {
            gsap.to(regionLogo, {
                scale: 1.08,
                filter: "drop-shadow(0 0 10px rgba(222, 183, 108, 0.9)) drop-shadow(0 0 18px rgba(246, 246, 246, 0.65))",
                transformOrigin: "center center",
                duration: 0.22,
                ease: "power2.out",
                overwrite: "auto"
            });
        });

        regionLogo.addEventListener("pointerleave", () => {
            gsap.to(regionLogo, {
                scale: 1,
                filter: "none",
                duration: 0.28,
                ease: "power2.out",
                overwrite: "auto"
            });
        });
    }

    if (regionName) {
        introTimeline.fromTo(
            regionName,
            { autoAlpha: 0, y: 20 },
            { autoAlpha: 1, y: 0, duration: 0.55, ease: "power3.out" },
            "-=0.35"
        );
    }

    if (regionDivider) {
        introTimeline.fromTo(
            regionDivider,
            { autoAlpha: 0, scaleX: 0.85 },
            { autoAlpha: 1, scaleX: 1, duration: 0.5, ease: "power2.out" },
            "-=0.3"
        );
    }

    if (regionSubtitle) {
        introTimeline.fromTo(
            regionSubtitle,
            { autoAlpha: 0, y: 16 },
            { autoAlpha: 1, y: 0, duration: 0.5, ease: "power3.out" },
            "-=0.28"
        );
    }
}

if (regionsSection) {
    const regionPins = regionsSection.querySelectorAll(".region-pin");
    const regionCardIcons = document.querySelectorAll(
        "#card-icon-1, #card-icon-2, #card-icon-3"
    );
    const regionProfileImage = document.querySelector("#card-image");

    if (regionProfileImage) {
        regionProfileImage.addEventListener("pointerenter", () => {
            gsap.to(regionProfileImage, {
                scale: 1.05,
                transformOrigin: "center center",
                duration: 0.25,
                ease: "power2.out",
                overwrite: "auto"
            });
        });

        regionProfileImage.addEventListener("pointerleave", () => {
            gsap.to(regionProfileImage, {
                scale: 1,
                duration: 0.3,
                ease: "power2.out",
                overwrite: "auto"
            });
        });
    }

    regionCardIcons.forEach((icon) => {
        icon.addEventListener("pointerenter", () => {
            gsap.to(icon, {
                scale: 1.16,
                filter: "drop-shadow(0 0 8px rgba(222, 183, 108, 0.95)) drop-shadow(0 0 14px rgba(246, 246, 246, 0.7))",
                transformOrigin: "center center",
                duration: 0.2,
                ease: "power2.out",
                overwrite: "auto"
            });
        });

        icon.addEventListener("pointerleave", () => {
            gsap.to(icon, {
                scale: 1,
                filter: "none",
                duration: 0.24,
                ease: "power2.out",
                overwrite: "auto"
            });
        });
    });

    const discoverRegionButton = document.querySelector("#card-link");

    if (discoverRegionButton) {
        discoverRegionButton.addEventListener("pointerenter", () => {
            gsap.to(discoverRegionButton, {
                scale: 1.06,
                boxShadow: "0 0 12px rgba(222, 183, 108, 0.9), 0 0 22px rgba(246, 246, 246, 0.55)",
                transformOrigin: "center center",
                duration: 0.2,
                ease: "power2.out",
                overwrite: "auto"
            });
        });

        discoverRegionButton.addEventListener("pointerleave", () => {
            gsap.to(discoverRegionButton, {
                scale: 1,
                boxShadow: "none",
                duration: 0.24,
                ease: "power2.out",
                overwrite: "auto"
            });
        });
    }

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
// REGION CHARACTER FLOAT
// ==================================================

const citizenSection = document.querySelector("#citizen");
const regionCharacterPortraits = citizenSection?.querySelectorAll(
    ".character-swiper .swiper-slide img"
);

if (
    citizenSection &&
    regionCharacterPortraits?.length &&
    !window.matchMedia("(prefers-reduced-motion: reduce)").matches
) {
    gsap.set(regionCharacterPortraits, { translate: "0px 0px" });

    const characterFloat = gsap.timeline({ paused: true, repeat: -1, yoyo: true });

    regionCharacterPortraits.forEach((portrait, index) => {
        characterFloat.to(
            portrait,
            {
                translate: "0px -10px",
                duration: 1.15 + (index % 3) * 0.08,
                ease: "sine.inOut"
            },
            index * 0.14
        );
    });

    ScrollTrigger.create({
        trigger: citizenSection,
        start: "top 85%",
        end: "bottom top",
        onEnter: () => characterFloat.play(),
        onEnterBack: () => characterFloat.play(),
        onLeave: () => characterFloat.pause(),
        onLeaveBack: () => characterFloat.pause(0)
    });
}


// ==================================================
// ELEMENTAL ICON FLOAT
// ==================================================

const combatSection = document.querySelector("#elemental-combat");
const combatIcons = combatSection?.querySelectorAll(".combat-element-icon");

if (
    combatSection &&
    combatIcons?.length &&
    !window.matchMedia("(prefers-reduced-motion: reduce)").matches
) {
    gsap.set(combatIcons, { translate: "0px 0px" });

    const combatIconFloat = gsap.timeline({ paused: true, repeat: -1, yoyo: true });

    combatIcons.forEach((icon, index) => {
        combatIconFloat.to(
            icon,
            {
                translate: "0px -10px",
                duration: 1.15 + (index % 3) * 0.08,
                ease: "sine.inOut"
            },
            index * 0.14
        );
    });

    ScrollTrigger.create({
        trigger: combatSection,
        start: "top 85%",
        end: "bottom top",
        onEnter: () => combatIconFloat.play(),
        onEnterBack: () => combatIconFloat.play(),
        onLeave: () => combatIconFloat.pause(),
        onLeaveBack: () => combatIconFloat.pause(0)
    });
}


// ==================================================
// DOWNLOAD PARTY CHARACTERS
// ==================================================

const downloadSection = document.querySelector("#download");
const partyCharacters = downloadSection?.querySelectorAll(".grid > img");

if (
    downloadSection &&
    partyCharacters?.length &&
    !window.matchMedia("(prefers-reduced-motion: reduce)").matches
) {
    const partyFloat = gsap.timeline({ paused: true, repeat: -1, yoyo: true });

    partyCharacters.forEach((character, index) => {
        partyFloat.to(
            character,
            {
                y: -10,
                rotation: index % 2 === 0 ? 0.6 : -0.6,
                duration: 1.5 + index * 0.12,
                ease: "sine.inOut"
            },
            index * 0.12
        );

        character.addEventListener("pointerenter", () => {
            gsap.to(character, {
                scale: 1.045,
                filter: "brightness(1.08) saturate(1.12)",
                duration: 0.24,
                ease: "power2.out",
                overwrite: "auto"
            });

            partyCharacters.forEach((otherCharacter) => {
                if (otherCharacter === character) return;

                gsap.to(otherCharacter, {
                    autoAlpha: 0.58,
                    duration: 0.24,
                    ease: "power2.out",
                    overwrite: "auto"
                });
            });
        });

        character.addEventListener("pointerleave", () => {
            gsap.to(character, {
                scale: 1,
                filter: "none",
                duration: 0.3,
                ease: "power2.out",
                overwrite: "auto"
            });

            gsap.to(partyCharacters, {
                autoAlpha: 1,
                duration: 0.3,
                ease: "power2.out",
                overwrite: "auto"
            });
        });
    });

    gsap.fromTo(
        partyCharacters,
        { autoAlpha: 0, y: 34, scale: 0.97 },
        {
            autoAlpha: 1,
            y: 0,
            scale: 1,
            duration: 0.7,
            stagger: 0.14,
            ease: "power3.out",
            onStart: () => partyFloat.pause(),
            onComplete: () => partyFloat.restart(),
            onReverseComplete: () => partyFloat.pause(0),
            scrollTrigger: {
                trigger: downloadSection,
                start: "top 75%",
                toggleActions: "play reverse play reverse"
            }
        }
    );
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
        const isStoryEnding =
            section === "#story" && element.textContent.trim() === "a World Awaits";
        if (isStoryEnding) return;

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
// NAVIGATION ENTRANCE
// ==================================================

const navLinks = gsap.utils.toArray("#nav-menu .nav-link");
const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

navLinks.forEach((link) => {
    link.addEventListener("click", (event) => {
        if (event.metaKey || event.ctrlKey || event.shiftKey || event.altKey || event.button !== 0) return;

        const destination = new URL(link.href, window.location.href);
        if (
            destination.origin !== window.location.origin ||
            destination.pathname !== window.location.pathname ||
            !destination.hash
        ) {
            return;
        }

        const target = document.getElementById(destination.hash.slice(1));
        if (!target) return;

        event.preventDefault();

        const navHeight = document.querySelector("nav")?.getBoundingClientRect().height || 0;
        const targetY = Math.max(
            0,
            target.getBoundingClientRect().top + window.scrollY - navHeight - 12
        );

        window.history.pushState(null, "", destination.hash);

        if (prefersReducedMotion) {
            window.scrollTo({ top: targetY, behavior: "auto" });
            return;
        }

        gsap.to(window, {
            duration: gsap.utils.clamp(0.8, 2, Math.abs(targetY - window.scrollY) / 1800),
            scrollTo: { y: targetY },
            ease: "power1.inOut",
            overwrite: "auto"
        });
    });
});

if (!prefersReducedMotion) {
    gsap.fromTo(
        navLinks,
        { autoAlpha: 0, y: -14 },
        {
            autoAlpha: 1,
            y: 0,
            duration: 0.45,
            stagger: 0.12,
            delay: 0.15,
            ease: "power3.out"
        }
    );

    navLinks.forEach((link) => {
        const animateLink = (scale, textShadow) => {
            gsap.to(link, {
                scale,
                textShadow,
                duration: 0.16,
                ease: "power2.out",
                overwrite: "auto"
            });
        };

        link.addEventListener("pointerenter", () =>
            animateLink(
                1.08,
                "0 0 8px rgba(246, 246, 246, 0.72), 0 0 14px rgba(222, 183, 108, 0.58)"
            )
        );
        link.addEventListener("pointerleave", () => animateLink(1, "none"));

        link.addEventListener("pointerdown", () => {
            animateLink(
                1.13,
                "0 0 10px rgba(246, 246, 246, 0.8), 0 0 17px rgba(222, 183, 108, 0.7)"
            );
        });

        link.addEventListener("pointerup", () =>
            animateLink(
                1.08,
                "0 0 8px rgba(246, 246, 246, 0.72), 0 0 14px rgba(222, 183, 108, 0.58)"
            )
        );
        link.addEventListener("pointercancel", () => {
            animateLink(
                link.matches(":hover") ? 1.08 : 1,
                link.matches(":hover")
                    ? "0 0 8px rgba(246, 246, 246, 0.72), 0 0 14px rgba(222, 183, 108, 0.58)"
                    : "none"
            );
        });
    });
}


// ==================================================
// INTERACTIVE HEADINGS
// ==================================================

if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    const extraWiggleTitles = [
        ...document.querySelectorAll("#story p, #explore p")
    ].filter((paragraph) =>
        ["Where The Story Begin", "Quests & Stories"].includes(
            paragraph.textContent.trim()
        )
    );
    const heroTitle = document.querySelector("#teyvat h1");
    const heroLogo = document.querySelector("#teyvat svg");
    const versionLabel = [...document.querySelectorAll("#whats-new h4")].find(
        (heading) => heading.textContent.trim() === "Version 7.0 Out Now"
    );
    const cloudDividerImage = document.querySelector(
        'img[src*="/landing-page/Cloud.png"]'
    );

    if (cloudDividerImage) {
        gsap.set(cloudDividerImage, { x: 0, xPercent: -50 });

        gsap.to(cloudDividerImage, {
            x: 8,
            y: 4,
            opacity: 0.96,
            duration: 16,
            ease: "sine.inOut",
            repeat: -1,
            yoyo: true,
            scrollTrigger: {
                trigger: cloudDividerImage.parentElement,
                start: "top bottom",
                end: "bottom top",
                toggleActions: "play pause resume pause"
            }
        });
    }

    const cloudDividerTitle = document.querySelector(".pointer-events-none > h2");
    const combatTitle = document.querySelector("#elemental-combat .combat-title");

    if (combatTitle) {
        combatTitle.addEventListener("pointerenter", () => {
            gsap.to(combatTitle, {
                scale: 1.025,
                filter: "drop-shadow(0 0 8px rgba(222, 183, 108, 0.72)) drop-shadow(0 0 14px rgba(246, 246, 246, 0.48))",
                transformOrigin: "center center",
                duration: 0.22,
                ease: "power2.out",
                overwrite: "auto"
            });
        });

        combatTitle.addEventListener("pointerleave", () => {
            gsap.to(combatTitle, {
                scale: 1,
                filter: "none",
                duration: 0.24,
                ease: "power2.out",
                overwrite: "auto"
            });
        });
    }

    if (cloudDividerTitle) {
        gsap.set(cloudDividerTitle, {
            pointerEvents: "auto",
            top: "50%",
            right: "auto",
            bottom: "auto",
            left: "50%",
            width: "max-content",
            height: "auto",
            xPercent: -50,
            yPercent: -50
        });
    }

    const standaloneTextSpans = [...document.querySelectorAll("span")].filter(
        (span) =>
            span.textContent.trim() &&
            !span.childElementCount &&
            !span.closest("p, h1, h2, h3, h4, h5, h6") &&
            !span.matches(
                ".wg-eyebrow-line, .wg-foot-icon, .wg-caption-star, .wg-card-spark, .wg-top-orbit, .wg-top-ring, .wg-top-star, .wg-top-spark, .wg-branch-dot, .wg-branch-leaf"
            ) &&
            !span.closest('[aria-hidden="true"]')
    );

    const wiggleTargets = [
        ...[...document.querySelectorAll("h1, h2, h3")].filter(
            (heading) => heading !== heroTitle
        ),
        ...extraWiggleTitles,
        ...(versionLabel ? [versionLabel] : [])
    ];

    if (heroLogo) {
        heroLogo.addEventListener("pointerenter", () => playHeroWiggle(heroLogo));
    }

    wiggleTargets.forEach((heading) => {
        heading.addEventListener("pointerenter", () => {
            gsap.killTweensOf(heading, "rotate");

            gsap.timeline()
                .fromTo(
                    heading,
                    { rotate: 0 },
                    { rotate: -1.2, duration: 0.1, ease: "sine.inOut" }
                )
                .to(heading, {
                    rotate: 1.2,
                    duration: 0.14,
                    ease: "sine.inOut"
                })
                .to(heading, {
                    rotate: -0.6,
                    duration: 0.12,
                    ease: "sine.inOut"
                })
                .to(heading, {
                    rotate: 0,
                    duration: 0.14,
                    ease: "sine.out"
                });
        });
    });

    const interactiveText = [
        ...document.querySelectorAll("p, h1, h2, h3, h4, h5, h6"),
        ...standaloneTextSpans,
        ...(cloudDividerTitle ? [cloudDividerTitle] : [])
    ];

    interactiveText.forEach((text) => {
        text.addEventListener("pointerenter", () => {
            gsap.to(text, {
                scale: 1.025,
                textShadow:
                    "0 0 10px rgba(246, 246, 246, 0.72), 0 0 18px rgba(222, 183, 108, 0.58)",
                transformOrigin: "center center",
                duration: 0.22,
                ease: "power2.out",
                overwrite: "auto"
            });
        });

        text.addEventListener("pointerleave", () => {
            gsap.to(text, {
                scale: 1,
                textShadow: "none",
                duration: 0.24,
                ease: "power2.out",
                overwrite: "auto"
            });
        });
    });
}

// ==================================================
// PREMIUM SCROLL REVEAL
// ==================================================

const premiumSections = [
    "#explore",
    "#elemental-combat",
    "#quests-stories",
    "#update",
    "#download"
];


premiumSections.forEach((section)=>{

    const container = document.querySelector(section);

    if(!container) return;


    const items = container.querySelectorAll(
        "img, h1, h2, h3, h4, p, a, .card"
    );


    gsap.fromTo(
        items,

        {
            autoAlpha:0,
            y:45
        },

        {

            autoAlpha:1,
            y:0,

            duration:.8,

            stagger:.08,

            ease:"power3.out",

            scrollTrigger:{

                trigger:container,

                start:"top 80%",

                toggleActions:
                "play none none reverse"

            }

        }

    );

});




// ==================================================
// IMAGE DEPTH EFFECT
// ==================================================

document.querySelectorAll(
    ".image-depth img"
)
.forEach((image)=>{


    gsap.to(image,{

        yPercent:-8,

        ease:"none",

        scrollTrigger:{

            trigger:image,

            start:"top bottom",

            end:"bottom top",

            scrub:1

        }

    });


});




// ==================================================
// CARD PREMIUM HOVER
// ==================================================

document.querySelectorAll(
    ".news-card, .region-card, .quest-card"
)
.forEach(card=>{


    card.addEventListener(
        "mouseenter",
        ()=>{


            gsap.to(card,{

                y:-8,

                scale:1.02,

                duration:.3,

                ease:"power2.out"

            });


        }
    );



    card.addEventListener(
        "mouseleave",
        ()=>{


            gsap.to(card,{

                y:0,

                scale:1,

                duration:.35,

                ease:"power2.out"

            });


        }
    );


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
