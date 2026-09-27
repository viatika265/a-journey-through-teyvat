<!-- Pembungkus WAJIB Alpine.js (x-data) -->
<div x-data="{ activeIndex: 0 }" @slide-changed.window="activeIndex = $event.detail" class="w-full flex flex-col items-center">
    
    <!-- Bagian Carousel -->
    @include('components.characters.carousel')

    <!-- Bagian Info Karakter -->
    @include('components.characters.info')

</div>

<!-- Script Penghubung Swiper ke Alpine -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiperEl = document.querySelector('.character-swiper');
        
        const swiper = new Swiper(swiperEl, {
            centeredSlides: true,  
            spaceBetween: 0,
            grabCursor: true,      
            loop: false,            
            slideToClickedSlide: true, 
            breakpoints: {
                0: { slidesPerView: 1.5 },
                768: { slidesPerView: 2 },
                1280: { slidesPerView: 3 }
            },
            navigation: {
                nextEl: '.swiper-btn-next',
                prevEl: '.swiper-btn-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                    return '<button class="' + className + ' w-2.5 h-2.5 md:w-3 md:h-3 rounded-full transition-colors"></button>';
                },
            },
        });

        // Bagian penting: Mengirim indeks yang aktif ke Alpine
        swiper.on('slideChange', function () {
            window.dispatchEvent(new CustomEvent('slide-changed', { 
                detail: swiper.activeIndex 
            }));
        });
    });
</script>