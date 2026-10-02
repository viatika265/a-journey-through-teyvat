<div id="splash-screen">

    <div class="light-sweep"></div>
    <div class="center-light"></div>

    <div class="splash-content">

        <div class="symbol">
            ✦
        </div>

        <h1>
            A JOURNEY
            <br>
            THROUGH TEYVAT
        </h1>

        <div class="gold-line"></div>

        <p>
            Enter the world of Teyvat
        </p>

    </div>

</div>


<style>

/* =====================================================
   SPLASH SCREEN — A JOURNEY THROUGH TEYVAT
===================================================== */

#splash-screen {
    position: fixed;
    inset: 0;
    z-index: 999999;

    display: flex;
    justify-content: center;
    align-items: center;

    width: 100%;
    height: 100%;
    min-height: 100vh;
    min-height: 100dvh;

    overflow: hidden;

    background: #03070d;
    color: #f5eedc;

    transition:
        opacity .8s ease,
        visibility .8s ease;
}


#splash-screen.hide {
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
}


/* =====================================================
   BACKGROUND ORNAMENT
===================================================== */

#splash-screen::before {
    content: "";

    position: absolute;

    width: min(72vw, 620px);
    height: min(72vw, 620px);

    border: 1px solid rgba(150, 165, 190, .09);
    border-radius: 50%;

    box-shadow:
        0 0 0 35px rgba(150, 165, 190, .016),
        0 0 0 75px rgba(150, 165, 190, .01);

    animation: ornamentRotate 35s linear infinite;
}


#splash-screen::after {
    content: "";

    position: absolute;
    inset: 0;

    background:
        radial-gradient(
            circle at center,
            rgba(120, 145, 185, .07) 0%,
            rgba(120, 145, 185, .025) 25%,
            transparent 58%
        );

    pointer-events: none;
}


@keyframes ornamentRotate {

    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }

}


/* =====================================================
   LIGHT SWEEP
===================================================== */

#splash-screen .light-sweep {
    position: absolute;

    top: 50%;
    left: 50%;

    width: 120%;
    max-width: 1400px;
    height: 1px;

    background: linear-gradient(
        90deg,
        transparent 0%,
        rgba(170, 184, 205, .06) 25%,
        rgba(190, 202, 220, .38) 50%,
        rgba(170, 184, 205, .06) 75%,
        transparent 100%
    );

    box-shadow:
        0 0 8px rgba(170, 184, 205, .18),
        0 0 22px rgba(170, 184, 205, .10);

    transform: translate(-150%, -50%);

    animation: sweep 1.5s ease-in-out .2s forwards;
}


@keyframes sweep {

    0% {
        transform: translate(-150%, -50%);
        opacity: 0;
    }

    20% {
        opacity: 1;
    }

    100% {
        transform: translate(150%, -50%);
        opacity: 0;
    }

}


/* =====================================================
   CENTER LIGHT
===================================================== */

#splash-screen .center-light {
    position: absolute;

    width: 230px;
    height: 230px;

    border-radius: 50%;

    background: radial-gradient(
        circle,
        rgba(130, 155, 195, .10) 0%,
        rgba(130, 155, 195, .04) 35%,
        transparent 72%
    );

    filter: blur(18px);

    animation: breathing 4s ease-in-out infinite;
}


@keyframes breathing {

    0%,
    100% {
        transform: scale(.85);
        opacity: .45;
    }

    50% {
        transform: scale(1.12);
        opacity: .95;
    }

}


/* =====================================================
   CONTENT
===================================================== */

#splash-screen .splash-content {
    position: relative;
    z-index: 5;

    display: flex;
    flex-direction: column;
    align-items: center;

    width: min(90%, 600px);
    padding: 20px;

    color: #f5eedc;
    text-align: center;
}


/* =====================================================
   SYMBOL
===================================================== */

#splash-screen .symbol {
    position: relative;

    display: flex;
    align-items: center;
    justify-content: center;

    width: 42px;
    height: 42px;

    margin-bottom: 12px;

    color: #c8b98f;

    font-size: 1.45rem;
    line-height: 1;

    text-shadow:
        0 0 8px rgba(200, 185, 143, .28),
        0 0 20px rgba(200, 185, 143, .12);

    opacity: 0;

    animation:
        symbolReveal .8s .25s ease forwards,
        symbolGlow 3s 1.1s ease-in-out infinite;
}


@keyframes symbolReveal {

    from {
        opacity: 0;
        transform: translateY(12px) scale(.8);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

}


@keyframes symbolGlow {

    0%,
    100% {
        text-shadow:
            0 0 8px rgba(170, 184, 205, .18),
            0 0 16px rgba(220, 181, 108, .2);
    }

    50% {
        text-shadow:
            0 0 12px rgba(220, 181, 108, .95),
            0 0 28px rgba(170, 184, 205, .18);
    }

}


/* =====================================================
   TITLE
===================================================== */

#splash-screen .splash-content h1 {
    margin: 8px 0 0;
    padding: 0;

    color: #f5eedc;

    font-family: 'Macondo Swash Caps', cursive;

    font-size: 2.15rem;
    font-weight: 400;

    letter-spacing: 4px;
    line-height: 1.35;

    text-align: center;

    text-shadow:
        0 2px 5px rgba(0, 0, 0, .8),
        0 0 15px rgba(150, 165, 190, .09);

    opacity: 0;

    transform: translateY(15px);
    filter: blur(4px);

    animation: titleReveal 1s .55s ease forwards;
}


@keyframes titleReveal {

    to {
        opacity: 1;
        transform: translateY(0);
        filter: blur(0);
    }

}


/* =====================================================
   GOLD LINE
===================================================== */

#splash-screen .gold-line {
    position: relative;

    width: 180px;
    height: 1px;

    margin: 22px auto 18px;

    background: rgba(200, 185, 143, .12);

    overflow: visible;
}


#splash-screen .gold-line::before {
    content: "";

    position: absolute;

    top: 0;
    left: 0;

    width: 0;
    height: 1px;

    background: linear-gradient(
        90deg,
        transparent,
        #c8b98f,
        #e6dfcc,
        #c8b98f,
        transparent
    );

    box-shadow:
        0 0 8px rgba(200, 185, 143, .28);

    animation: lineReveal .9s 1.25s ease forwards;
}


#splash-screen .gold-line::after {
    content: "✦";

    position: absolute;

    top: 50%;
    left: 50%;

    color: #c8b98f;

    font-size: 10px;

    background: #03070d;

    padding: 0 8px;

    transform: translate(-50%, -50%);

    opacity: 0;

    animation: starReveal .5s 1.65s ease forwards;
}


@keyframes lineReveal {

    to {
        width: 100%;
    }

}


@keyframes starReveal {

    to {
        opacity: 1;
    }

}


/* =====================================================
   SUBTITLE
===================================================== */

#splash-screen .splash-content p {
    margin: 0;
    padding: 0;

    color: #a9a39a;

    font-family: 'Itim', cursive;

    font-size: .9rem;
    font-weight: 400;

    letter-spacing: 1.5px;
    line-height: 1.5;

    text-align: center;

    opacity: 0;

    transform: translateY(8px);

    animation: subtitleReveal .8s 1.55s ease forwards;
}


@keyframes subtitleReveal {

    to {
        opacity: 1;
        transform: translateY(0);
    }

}


/* =====================================================
   LIGHT PARTICLE
===================================================== */

#splash-screen .light-sweep::before {
    content: "✦";

    position: absolute;

    top: -7px;
    left: 50%;

    color: #d8dce5;

    font-size: 12px;

    text-shadow:
        0 0 12px #c8b98f;

    opacity: 0;

    animation:
        sweepStar 1.5s ease-in-out .2s forwards;
}


@keyframes sweepStar {

    0% {
        opacity: 0;
        transform: translateX(-50%) scale(.5);
    }

    35% {
        opacity: 1;
        transform: translateX(-50%) scale(1);
    }

    75% {
        opacity: .8;
    }

    100% {
        opacity: 0;
        transform: translateX(-50%) scale(.7);
    }

}


/* =====================================================
   FLOATING STARS
===================================================== */

#splash-screen .splash-content::before,
#splash-screen .splash-content::after {
    content: "✧";

    position: absolute;

    color: rgba(170, 184, 205, .35);

    font-size: 13px;

    opacity: 0;

    animation:
        floatingStar 3.5s ease-in-out infinite;
}


#splash-screen .splash-content::before {
    top: 25%;
    left: 4%;

    animation-delay: .8s;
}


#splash-screen .splash-content::after {
    right: 4%;
    bottom: 24%;

    animation-delay: 1.6s;
}


@keyframes floatingStar {

    0%,
    100% {
        opacity: 0;
        transform: translateY(8px) rotate(0deg);
    }

    50% {
        opacity: .8;
        transform: translateY(-8px) rotate(25deg);
    }

}


/* =====================================================
   TABLET
===================================================== */

@media (max-width: 768px) {

    #splash-screen .center-light {
        width: 190px;
        height: 190px;
    }

    #splash-screen::before {
        width: 75vw;
        height: 75vw;
    }

    #splash-screen .splash-content {
        width: 92%;
        padding: 16px;
    }

    #splash-screen .symbol {
        font-size: 1.3rem;
        margin-bottom: 8px;
    }

    #splash-screen .splash-content h1 {
        font-size: 1.75rem;
        letter-spacing: 3px;
        line-height: 1.35;
    }

    #splash-screen .gold-line {
        width: 155px;
        margin: 18px auto 15px;
    }

    #splash-screen .splash-content p {
        font-size: .82rem;
        letter-spacing: 1px;
    }

}


/* =====================================================
   MOBILE
===================================================== */

@media (max-width: 480px) {

    #splash-screen .center-light {
        width: 145px;
        height: 145px;
    }

    #splash-screen .splash-content {
        width: 94%;
        padding: 12px;
    }

    #splash-screen .symbol {
        width: 34px;
        height: 34px;

        font-size: 1.15rem;

        margin-bottom: 6px;
    }

    #splash-screen .splash-content h1 {
        font-size: 1.35rem;
        letter-spacing: 2px;
        line-height: 1.4;

        margin-top: 5px;
    }

    #splash-screen .gold-line {
        width: 125px;
        margin: 15px auto 12px;
    }

    #splash-screen .gold-line::after {
        font-size: 8px;
    }

    #splash-screen .splash-content p {
        max-width: 100%;

        font-size: .72rem;
        letter-spacing: .6px;
        line-height: 1.45;
    }

    #splash-screen .splash-content::before {
        left: 0;
    }

    #splash-screen .splash-content::after {
        right: 0;
    }

}


/* =====================================================
   EXTRA SMALL PHONE
===================================================== */

@media (max-width: 360px) {

    #splash-screen .splash-content h1 {
        font-size: 1.18rem;
        letter-spacing: 1.5px;
    }

    #splash-screen .splash-content p {
        font-size: .66rem;
        letter-spacing: .4px;
    }

    #splash-screen .gold-line {
        width: 105px;
        margin: 13px auto 10px;
    }

}


/* =====================================================
   REDUCED MOTION
===================================================== */

@media (prefers-reduced-motion: reduce) {

    #splash-screen *,
    #splash-screen::before,
    #splash-screen::after {
        animation: none !important;
        transition: none !important;
    }

    #splash-screen .symbol,
    #splash-screen .splash-content h1,
    #splash-screen .splash-content p {
        opacity: 1;
        transform: none;
        filter: none;
    }

    #splash-screen .gold-line::before {
        width: 100%;
    }

    #splash-screen .gold-line::after {
        opacity: 1;
    }

}

</style>


<script>

document.addEventListener("DOMContentLoaded", () => {

    const splash = document.getElementById("splash-screen");

    if (!splash) return;

    document.body.style.overflow = "hidden";

    setTimeout(() => {

        splash.classList.add("hide");

        document.body.style.overflow = "";

        setTimeout(() => {

            splash.remove();

        }, 900);

    }, 2800);

});

</script>