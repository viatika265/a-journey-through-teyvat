@props(['questImages'])

<section id="quests-stories" class="relative w-full bg-black py-16 md:py-24 overflow-hidden">
  <div class="max-w-screen-2xl mx-auto px-6 md:px-16 lg:px-24 grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16 items-center">

    {{-- Teks --}}
    <div class="order-2 md:order-1">
      <h2 class="font-display text-4xl md:text-[56px] text-[#F6F6F6] leading-tight mb-4 md:mb-6">
        Quests & Stories
      </h2>
      <p class="font-body text-base md:text-[22px] leading-relaxed text-white/90 max-w-[520px]">
        Embark on an unforgettable journey across Teyvat to help the citizens of seven nations solve their deepest troubles
      </p>
    </div>

    {{-- Slider --}}
    <div class="order-1 md:order-2">
      <div id="quest-bg-container"
           class="relative aspect-video overflow-hidden rounded-xl bg-black ring-1 ring-white/10 shadow-[0_0_60px_rgba(222,183,108,0.12)]">

        @foreach ($questImages as $index => $image)
          <img
            src="{{ $image }}"
            alt="Quest preview {{ $index + 1 }}"
            @if($index > 0) loading="lazy" @endif
            class="quest-slide absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
          >
        @endforeach

        {{-- Indikator --}}
        @if(count($questImages) > 1)
          <div class="absolute bottom-3 right-3 z-10 flex gap-2">
            @foreach ($questImages as $index => $image)
              <span class="quest-dot h-2 w-2 rounded-full transition-all duration-500 {{ $index === 0 ? 'bg-[#DEB76C] w-5' : 'bg-white/40' }}"></span>
            @endforeach
          </div>
        @endif
      </div>
    </div>

  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('#quest-bg-container .quest-slide');
    const dots = document.querySelectorAll('#quest-bg-container .quest-dot');
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let current = 0;

    if (slides.length <= 1 || reduceMotion) return;

    setInterval(() => {
      slides[current].classList.replace('opacity-100', 'opacity-0');
      dots[current]?.classList.replace('bg-[#DEB76C]', 'bg-white/40');
      dots[current]?.classList.replace('w-5', 'w-2');

      current = (current + 1) % slides.length;

      slides[current].classList.replace('opacity-0', 'opacity-100');
      dots[current]?.classList.replace('bg-white/40', 'bg-[#DEB76C]');
      dots[current]?.classList.replace('w-2', 'w-5');
    }, 5000);
  });
</script>