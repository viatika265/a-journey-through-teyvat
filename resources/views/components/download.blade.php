@props(['characters'])

<section id="download">
  <div class="relative min-h-screen bg-black relative z-10">
      <div class="flex items-end justify-center gap-6 w-full">
        @foreach ($characters as $character)
            <img
                src="{{ $character->additional_image }}"
                class="flex-1 min-w-0 h-auto object-contain"
            >
        @endforeach
      </div>

      <div class="absolute inset-x-0 bottom-0 h-3/4 bg-gradient-to-t from-black/100 to-transparent"></div>

      <div class="absolute bottom-10 left-10 z-20">
        <p class="font-display text-display text-neutral-light">Form your party <br>and begin <span class="text-yellow-normal">your</span> journey</p>
      </div>
    </div>
  </div>
</section>