<section id="region-about">
  <div class="min-h-screen flex flex row items-center">
    <div class="relative w-1/2">
      <img src="{{ $region->landmark_image }}" style="
            -webkit-mask-image: linear-gradient(to right, black 0%, black 55%, transparent 100%);
            mask-image: linear-gradient(to right, black 0%, black 55%, transparent 100%);">
    </div>

    <div class="w-1/2 space-y-6 text-right relative z-10 -ml-20">
      <p class="font-display text-heading-4 text-neutral-light">
          {{ $region->long_description }}
      </p>
    </div>

    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/100 to-transparent z-20"></div>
  </div>
</section>