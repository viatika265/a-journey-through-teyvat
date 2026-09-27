<style>
    /* Transisi dasar untuk semua slide */
    .swiper-slide {
        transition: all 0.5s ease;
        opacity: 0.5;
        filter: brightness(0.75);
        transform: scale(0.85);
        cursor: pointer;
    }
    
    /* Efek hover untuk karakter yang di samping (belum aktif) */
    .swiper-slide:hover {
        opacity: 0.8;
        filter: brightness(0.9);
    }

    /* Tampilan untuk karakter yang aktif (di tengah) */
    .swiper-slide-active {
        opacity: 1 !important;
        filter: brightness(1) drop-shadow(0 25px 25px rgb(0 0 0 / 0.15)) !important;
        transform: scale(1) !important;
        z-index: 10;
    }

    /* Efek hover khusus untuk karakter yang sedang aktif (di tengah) */
    .swiper-slide-active:hover {
        transform: scale(1.05) !important;
        filter: brightness(1.1) drop-shadow(0 25px 25px rgb(0 0 0 / 0.2)) !important;
    }
    /* Styling titik indikator aktif */
    .swiper-pagination-bullet-active {
        background-color: var(--color-yellow-normal-active) !important; 
        opacity: 1 !important;
    }
</style>

<div class="relative w-full py-6 xl:py-10">
    
    <!-- Wrapper Swiper -->
    <div class="swiper character-swiper w-full max-w-[1319px] mx-auto overflow-hidden px-4">
        <div class="swiper-wrapper h-[260px] md:h-[340px] xl:h-[420px]">
            @foreach($characters as $character)
                <div class="swiper-slide h-full flex justify-center items-center">
                    <img src="{{ asset('images/' . $character['image']) }}" class="h-[280px] md:h-[350px] xl:h-[400px] w-auto object-contain" alt="{{ $character['name'] }}">
                </div>
            @endforeach

        </div>
    </div>

    <!-- Navigasi Swiper -->
    <div class="flex items-center justify-center gap-4 mt-6 xl:mt-8">
        <button class="swiper-btn-prev text-yellow-normal hover:text-yellow-normal-hover transition-colors cursor-pointer z-10">
            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>

        <!-- Titik Indikator akan digenerate otomatis oleh Swiper -->
        <div class="swiper-pagination !relative !w-auto flex items-center gap-1.5 md:gap-2"></div>

        <button class="swiper-btn-next text-yellow-normal hover:text-yellow-normal-hover transition-colors cursor-pointer z-10">
            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</div>

<!-- Script Inisialisasi Swiper -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.character-swiper', {
            centeredSlides: true,  // Slide aktif selalu di tengah
            spaceBetween: 0,
            grabCursor: true,      // Kursor berubah jadi tangan saat di-hover
            loop: false,            // Bisa digeser terus menerus
            slideToClickedSlide: true, // Klik slide untuk menjadikannya aktif
            
            // Memaksa jumlah karakter yang tampil berdasarkan ukuran layar
            breakpoints: {
                0: {
                    slidesPerView: 1.5, // Layar HP: 1 karakter di tengah, sebagian terlihat di pinggir
                },
                768: {
                    slidesPerView: 2, // Layar Tablet
                },
                1280: {
                    slidesPerView: 3, // Layar Laptop/Desktop: Tampil persis 3 karakter
                }
            },
            
            // Konfigurasi Navigasi Panah
            navigation: {
                nextEl: '.swiper-btn-next',
                prevEl: '.swiper-btn-prev',
            },
            
            // Konfigurasi Titik Indikator
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                    return '<button class="' + className + ' w-2.5 h-2.5 md:w-3 md:h-3 rounded-full bg-[var(--color-yellow-normal)] transition-colors"></button>';
                },
            },
        });
    });
</script>