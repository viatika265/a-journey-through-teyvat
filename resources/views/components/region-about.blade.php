<section id="region-about">
  <div class="min-h-screen flex flex row items-center">
    <div class="relative w-[50%]">
      <img src="{{ $region->landmark_image }}" class="w-[90%]"
      style="-webkit-mask-image: linear-gradient(to right, black 0%, black 80%, transparent 100%);
            mask-image: linear-gradient(to right, black 0%, black 55%, transparent 100%);">
    </div>

    <div class="w-[45%] text-right relative z-30">
      <p class="font-body text-heading-4 text-neutral-light">
          {{ $region->long_description }}
      </p>
    </div>

    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/100 to-transparent z-20"></div>
  </div>
</section>