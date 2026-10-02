<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script
    defer
    src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
></script>

<style>
    html,
    body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    .swiper-slide {
        transition: all 0.5s ease;
        opacity: 0.5;
        filter: brightness(0.75);
        transform: scale(0.85);
        cursor: pointer;
    }

    .swiper-slide:hover {
        opacity: 0.8;
        filter: brightness(0.9);
    }

    .swiper-slide-active {
        opacity: 1 !important;
        filter: brightness(1)
            drop-shadow(0 25px 25px rgb(0 0 0 / 0.15)) !important;
        transform: scale(1.5) !important;
        z-index: 10;
    }
    .character-swiper {
        overflow: visible !important;
    }

    .swiper-wrapper {
        overflow: visible !important;
    }


    .swiper-slide-active:hover {
        transform: scale(1.6) !important;
        filter: brightness(1.1)
            drop-shadow(0 25px 25px rgb(0 0 0 / 0.2)) !important;
    }

    .swiper-pagination-bullet {
        background-color: var(--color-yellow-darker) !important;
        opacity: 1 !important;
    }
    
    .swiper-pagination-bullet.swiper-pagination-bullet-active {
        background-color: var(--color-yellow-normal-active) !important;
        opacity: 1 !important;
        transform: scale(1.5) !important;
    }

    .party-background::before {
    content: "";
    position: absolute;
    inset: 0 0 auto 0;
    height: 140px;

    background: linear-gradient(
        to bottom,
        #000 0%,
        rgba(0, 0, 0, 0.65) 35%,
        rgba(0, 0, 0, 0.2) 75%,
        transparent 100%
    );

    pointer-events: none;
    z-index: 2;
    }

    .party-background::after {
        content: "";
        position: absolute;
        inset: auto 0 0 0;
        height: 160px;

        background: linear-gradient(
            to top,
            #000 0%,
            rgba(0, 0, 0, 0.65) 35%,
            rgba(0, 0, 0, 0.2) 75%,
            transparent 100%
        );

        pointer-events: none;
        z-index: 2;
    }

    .party-background .character-swiper {
        position: relative;
        z-index: 3;
    }
</style>


<section id="citizen"  class="overflow-hidden">

    <div
        x-data="{ activeIndex: 1 }"
        @slide-changed.window="activeIndex = $event.detail"
        class="min-h-screen w-full flex flex-col items-center"
    >

        <!-- TITLE -->
        <div class="citizen-title">
    <h2>
        Meet the Citizen
    </h2>
</div>


        <!-- SWIPER -->
        <div class="party-background relative w-full py-6 xl:py-48 bg-cover" style=" background-image: url('{{ $region->party_background }}'); background-position: 100% 90%;">
            <div class="swiper character-swiper w-full max-w-[1319px] mx-auto overflow-visible">
                <div class="swiper-wrapper h-[260px] md:h-[340px] xl:h-[420px]">
                    @foreach($region->characters as $character)
                        <div class="swiper-slide h-full flex justify-center items-center">
                            <div class="w-full h-full flex items-center justify-center">
                                <img
                                    src="{{ $character->character_image }}"
                                    class="max-h-[280px] md:max-h-[350px] xl:max-h-[400px] max-w-full object-contain"
                                    alt="{{ $character->name }}"
                                >
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

            <!-- NAVIGATION -->
            <div class="flex items-center justify-center gap-4 mt-6 xl:mt-8">
                <button class="swiper-btn-prev flex items-center justify-center text-yellow-normal hover:text-yellow-normal-hover transition-colors cursor-pointer z-10">
                    <svg
                        class="w-5 h-5 md:w-6 md:h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>
                </button>

                <div class="swiper-pagination !relative !inset-auto !w-auto !transform-none flex items-center gap-1.5 md:gap-2"></div>

                <button class="swiper-btn-next text-yellow-normal hover:text-yellow-normal-hover transition-colors cursor-pointer z-10">
                    <svg
                        class="w-5 h-5 md:w-6 md:h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"
                        />
                    </svg>
                </button>
            </div>
        

        <!-- CHARACTER INFORMATION -->
        <div class="mt-8 w-full max-w-[500px] text-center px-4">

            @foreach($region->characters as $index => $character)

                <div x-show="activeIndex === {{ $index }}" class="flex flex-col items-center w-full">
                    <div class="mb-6 w-full">
                        <h3 class="font-display text-heading-5 md:text-heading-3 text-yellow-normal tracking-wide mb-2">{{ $character->name }}</h3>
                        <p class="font-body text-body-small md:text-heading-5 text-white leading-relaxed">{{ $character->description }}</p>
                    </div>

                    <!-- ITEM CARDS -->
                    <div class="flex flex-row items-center justify-center gap-4 md:gap-[36px] w-fit h-[70px] mx-auto">

                        <!-- ELEMENT -->
                        <div title="Element" class="flex items-center justify-center w-[50px] h-[50px] border-[4px] md:w-[70px] md:h-[70px] md:border-[5px] border-yellow-normal rounded-[10px] bg-black/40 overflow-hidden flex-shrink-0 cursor-pointer hover:scale-105 transition-transform">
                            <img
                                src="{{ $character->element->icon }}"
                                alt="{{ $character->element->name }}"
                                class="w-full h-full object-contain p-1"
                            >
                        </div>

                        <!-- WEAPON -->

                        <div
                            title="Weapon"
                            class="flex items-center justify-center
                                   w-[50px] h-[50px] border-[4px] md:w-[70px] md:h-[70px] md:border-[5px]
                                   border-yellow-normal
                                   rounded-[10px]
                                   bg-black/40
                                   overflow-hidden
                                   flex-shrink-0
                                   cursor-pointer
                                   hover:scale-105
                                   transition-transform"
                        >

                            <img
                                src="{{ $character->weapon->icon }}"
                                alt="{{ $character->weapon->name }}"
                                class="w-full h-full object-contain p-1"
                            >

                        </div>


                        <!-- ARTIFACT -->

                        <div
                            title="Artifact"
                            class="flex items-center justify-center
                                   w-[50px] h-[50px] border-[4px] md:w-[70px] md:h-[70px] md:border-[5px]
                                   border-yellow-normal
                                   rounded-[10px]
                                   bg-black/40
                                   overflow-hidden
                                   flex-shrink-0
                                   cursor-pointer
                                   hover:scale-105
                                   transition-transform"
                        >

                            <img
                                src="{{ $character->artifact->icon }}"
                                alt="{{ $character->artifact->name }}"
                                class="w-full h-full object-contain p-1"
                            >

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const swiperEl = document.querySelector('.character-swiper');

    if (!swiperEl) {
        return;
    }

    const swiper = new Swiper(swiperEl, {
        initialSlide: 1,
        
        centeredSlides: true,

        spaceBetween: 0,

        grabCursor: true,

        loop: false,

        slideToClickedSlide: true,

        breakpoints: {

            0: {
                slidesPerView: 1
            },

            768: {
                slidesPerView: 2
            },

            1280: {
                slidesPerView: 3
            }

        },

        navigation: {
            nextEl: '.swiper-btn-next',
            prevEl: '.swiper-btn-prev'
        },

        pagination: {

            el: '.swiper-pagination',

            clickable: true,

            renderBullet: function (index, className) {

                return `
                    <button
                        class="${className}
                               w-2.5 h-2.5
                               md:w-3 md:h-3
                               rounded-full
                               bg-[var(--color-yellow-normal)]
                               transition-colors">
                    </button>
                `;

            }

        }

    });


    /*
     * Kirim index karakter yang sedang aktif
     * ke Alpine.js
     */

    swiper.on('slideChange', function () {
        window.dispatchEvent(
            new CustomEvent('slide-changed', {
                detail: swiper.realIndex
            })
        );

    });

});
</script>

<style>
    /* =====================================================
   CITIZEN TITLE
===================================================== */

#citizen .citizen-title {
    position: relative;
    z-index: 2;
    text-align: center;
    margin-bottom: 30px;
    isolation: isolate;
}

#citizen .citizen-title::before {
    content: "";
    position: absolute;
    z-index: -1;
    top: 50%;
    left: 50%;
    width: min(560px, 90%);
    height: 120px;
    transform: translate(-50%, -50%);

    background: radial-gradient(
        ellipse at center,
        rgba(222,183,108,.11) 0%,
        rgba(40,63,121,.055) 38%,
        transparent 72%
    );

    filter: blur(12px);
    pointer-events: none;
}

#citizen .citizen-title h2 {
    position: relative;
    display: inline-block;

    margin: 0;
    padding: 12px 28px 16px;

    color: #fff;
    font-family: var(--font-display);
    font-size: 2.8rem;
    font-weight: 400;
    letter-spacing: 2px;

    animation:
        citizenTitleShine 4s ease-in-out infinite,
        citizenTitleEntrance .8s ease-out both;
}

/* SUBTITLE DI ATAS */
#citizen .citizen-title h2::before {
    content: "SOULS OF THE REGION";

    display: block;
    margin-bottom: 7px;

    color: rgba(222,183,108,.82);
    font-family: var(--font-body);
    font-size: .72rem;
    font-weight: 400;
    letter-spacing: 5px;
    line-height: 1.4;
}

/* GARIS EMAS */
#citizen .citizen-title h2::after {
    content: "";

    display: block;
    width: 145px;
    height: 2px;

    margin: 12px auto 0;

    background: linear-gradient(
        90deg,
        transparent,
        rgba(222,183,108,.9) 25%,
        rgba(252,248,240,.95) 50%,
        rgba(222,183,108,.9) 75%,
        transparent
    );

    box-shadow: 0 0 12px rgba(222,183,108,.35);

    transform-origin: center;

    animation: citizenTitleLineReveal 1s .25s ease-out both;
}

/* SUBTITLE DI BAWAH */
#citizen .citizen-title::after {
    content: "DISCOVER THE PEOPLE OF THIS REGION";

    display: block;
    margin-top: 2px;

    color: rgba(246,246,246,.48);
    font-family: var(--font-body);
    font-size: .78rem;
    letter-spacing: 2.5px;

    animation: citizenSubtitleIn .9s .2s ease-out both;
}


/* =====================================================
   ANIMATION
===================================================== */

@keyframes citizenTitleShine {
    0%, 100% {
        text-shadow: 0 0 0 rgba(222,183,108,0);
    }

    50% {
        text-shadow: 0 0 18px rgba(222,183,108,.22);
    }
}

@keyframes citizenTitleEntrance {
    from {
        opacity: 0;
        transform: translateY(12px);
        filter: blur(5px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
        filter: blur(0);
    }
}

@keyframes citizenTitleLineReveal {
    from {
        transform: scaleX(.15);
        opacity: 0;
    }

    to {
        transform: scaleX(1);
        opacity: 1;
    }
}

@keyframes citizenSubtitleIn {
    from {
        opacity: 0;
        transform: translateY(6px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}


/* =====================================================
   MOBILE
===================================================== */

@media (max-width: 600px) {

    #citizen .citizen-title {
        margin-bottom: 20px;
    }

    #citizen .citizen-title h2 {
        padding: 10px 12px 14px;
        font-size: 2.15rem;
        letter-spacing: 1px;
    }

    #citizen .citizen-title h2::before {
        font-size: .62rem;
        letter-spacing: 3.5px;
    }

    #citizen .citizen-title::after {
        font-size: .65rem;
        letter-spacing: 1.5px;
    }
}


@media (prefers-reduced-motion: reduce) {

    #citizen .citizen-title h2,
    #citizen .citizen-title h2::after,
    #citizen .citizen-title::after {
        animation: none !important;
    }

}
</style>