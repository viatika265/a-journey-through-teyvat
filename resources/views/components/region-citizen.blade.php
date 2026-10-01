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
</style>


<section id="citizen"  class="overflow-hidden">

    <div
        x-data="{ activeIndex: 1 }"
        @slide-changed.window="activeIndex = $event.detail"
        class="min-h-screen w-full flex flex-col items-center"
    >

        <!-- TITLE -->
        <h2 class="font-display text-heading-1 text-neutral-light mb-30">
            Meet the Citizen
        </h2>


        <!-- SWIPER -->
        <div class="relative w-full py-6 xl:py-10">
            <div class="swiper character-swiper w-full max-w-[1319px] mx-auto overflow-visible px-4">
                <div class="swiper-wrapper h-[260px] md:h-[340px] xl:h-[420px]">
                    @foreach($region->characters as $character)
                        <div class="swiper-slide h-full flex justify-center items-center">
                            <div class="w-[250px] md:w-[300px] xl:w-[350px] h-full flex items-center justify-center">
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
        </div>

        <!-- CHARACTER INFORMATION -->
        <div class="mt-8 w-full max-w-[500px] text-center px-4">

            @foreach($region->characters as $index => $character)

                <div x-show="activeIndex === {{ $index }}" x-transition class="flex flex-col items-center w-full">
                    <div class="mb-6 w-full">
                        <h3 class="font-display text-heading-3 text-yellow-normal tracking-wide mb-2">{{ $character->name }}</h3>
                        <p class="font-body text-heading-5 text-white leading-relaxed">{{ $character->description }}</p>
                    </div>

                    <!-- ITEM CARDS -->
                    <div class="flex flex-row items-center justify-center gap-4 md:gap-[36px] w-fit h-[70px] mx-auto">

                        <!-- ELEMENT -->
                        <div title="Element" class="flex items-center justify-center w-[70px] h-[70px] border-[5px] border-yellow-normal rounded-[10px] bg-black/40 overflow-hidden flex-shrink-0 cursor-pointer hover:scale-105 transition-transform">
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
                                   w-[70px] h-[70px]
                                   border-[5px]
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
                                   w-[70px] h-[70px]
                                   border-[5px]
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
                slidesPerView: 1.5
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
