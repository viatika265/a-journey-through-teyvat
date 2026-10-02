@props(['questImages'])
<section id="quests-stories" class="relative w-full min-h-[85vh] md:min-h-[814px] xl:h-screen flex items-end overflow-hidden bg-black">
  {{-- Background image Slider --}}
  <div id="quest-bg-container" class="absolute inset-0 w-full h-full z-0">
        @foreach ($questImages as $index => $image)
            <img 
                src="{{ $image }}" 
                alt="Quest Background" 
                {{-- GIF pertama (index 0) akan tampil (opacity-100), sisanya tersembunyi (opacity-0) --}}
                class="quest-slide absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
            >
        @endforeach
  </div>
  {{-- Top Gradient Overlay (Transisi gelap dari atas ke tengah) --}}
  <div class="absolute inset-x-0 top-0 h-1/3 md:h-2/5 bg-gradient-to-b from-black/100 to-transparent z-10 pointer-events-none"></div>

  {{-- Gradient Overlay: Sesuai Figma (hitam dari bawah ke atas) + sedikit gelap di atas agar seimbang --}}
  <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/40 z-10 pointer-events-none"></div>

  {{-- Content Container --}}
  <div class="relative z-20 px-6 md:px-16 lg:px-24 pb-16 md:pb-32 w-full max-w-screen-2xl mx-auto">
    
    {{-- Heading --}}
    <h2 class="font-display text-4xl md:text-[48px] text-[#F6F6F6] leading-tight drop-shadow-[0_4px_10px_rgba(0,0,0,0.75)] mb-4 md:mb-6">
      Quests & Stories
    </h2>

    {{-- Paragraph --}}
    <p class="font-body text-lg md:text-[30px] leading-snug md:leading-[126%] text-white drop-shadow-[0_4px_10px_rgba(0,0,0,0.75)] max-w-full md:max-w-[546px]">
      Embark on an unforgettable journey across Teyvat to help the citizens of seven nations solve their deepest troubles
    </p>

  </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.quest-slide');
        let currentSlide = 0;
        
        // Cek jika GIF lebih dari 1, baru jalankan animasi
        if(slides.length > 1) {
            setInterval(() => {
                // Sembunyikan GIF saat ini
                slides[currentSlide].classList.remove('opacity-100');
                slides[currentSlide].classList.add('opacity-0');
                
                // Lanjut ke GIF berikutnya (kembali ke 0 jika sudah di akhir)
                currentSlide = (currentSlide + 1) % slides.length;
                
                // Tampilkan GIF baru
                slides[currentSlide].classList.remove('opacity-0');
                slides[currentSlide].classList.add('opacity-100');
            }, 5000); // Waktu ganti GIF: 5000ms = 5 detik (Silakan sesuaikan)
        }
    });
</script>