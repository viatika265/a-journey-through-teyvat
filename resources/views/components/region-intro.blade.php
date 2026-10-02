<section id="region-intro">
  <div class="relative min-h-screen lg:min-h-[140vh] bg-no-repeat bg-cover"
        style=" background-image: url('{{ $region->background_image }}')">

        <div class="absolute inset-0 bg-black/10 z-0"></div>
        <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/100 to-transparent"></div>

        <div class="min-h-screen flex flex-col items-center justify-center space-y-6 relative z-10">
          <div class="w-50 h-50 md:w-70 md:h-70 lg:w-100 lg:h-100 bg-contain bg-no-repeat bg-center"
              style="background-image: url('{{ $region->icon }}');"></div>

          <h1 class="font-display text-heading-1 md:text-heading-1 lg:text-display text-neutral-light">
              {{ $region->name }}
          </h1>

          <svg width="1062" height="35" viewBox="0 0 1062 35" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.8022 6.58266L18.9141 5.38366L19.8212 4.70848L20.7146 5.38251L19.8022 6.58266ZM2.41371 19.5258L1.43867 20.676L-0.000181665 19.4625L1.52561 18.3268L2.41371 19.5258ZM15.1926 30.3026L16.1241 31.4681L15.1561 32.2443L14.2176 31.4528L15.1926 30.3026ZM38.4572 20.6567L37.5448 21.8568L18.8898 7.78281L19.8022 6.58266L20.7146 5.38251L39.3696 19.4565L38.4572 20.6567ZM19.8022 6.58266L20.6903 7.78166L3.30181 20.7248L2.41371 19.5258L1.52561 18.3268L18.9141 5.38366L19.8022 6.58266ZM2.41371 19.5258L3.38875 18.3756L16.1676 29.1525L15.1926 30.3026L14.2176 31.4528L1.43867 20.676L2.41371 19.5258ZM15.1926 30.3026L14.261 29.1372L20.4868 24.1446L21.4184 25.31L22.3499 26.4754L16.1241 31.4681L15.1926 30.3026Z" fill="#DEB76C"/>
            <line y1="-1.5" x2="425.903" y2="-1.5" transform="matrix(-1 0 0 1 471.977 20.0532)" stroke="#DEB76C" stroke-width="3"/>
            <line y1="-1.5" x2="26.6559" y2="-1.5" transform="matrix(-0.803653 -0.595098 -0.705499 0.708711 46.2383 19.8441)" stroke="#DEB76C" stroke-width="3"/>
            <path d="M530.977 0L537.694 11.3128L549.977 17.5L537.694 23.6872L530.977 35L524.259 23.6872L511.977 17.5L524.259 11.3128L530.977 0Z" fill="#DEB76C"/>
            <path d="M1042.15 6.58266L1043.04 5.38366L1042.13 4.70848L1041.24 5.38251L1042.15 6.58266ZM1059.54 19.5258L1060.51 20.676L1061.95 19.4625L1060.43 18.3268L1059.54 19.5258ZM1046.76 30.3026L1045.83 31.4681L1046.8 32.2443L1047.74 31.4528L1046.76 30.3026ZM1023.5 20.6567L1024.41 21.8568L1043.06 7.78281L1042.15 6.58266L1041.24 5.38251L1022.58 19.4565L1023.5 20.6567ZM1042.15 6.58266L1041.26 7.78166L1058.65 20.7248L1059.54 19.5258L1060.43 18.3268L1043.04 5.38366L1042.15 6.58266ZM1059.54 19.5258L1058.56 18.3756L1045.79 29.1525L1046.76 30.3026L1047.74 31.4528L1060.51 20.676L1059.54 19.5258ZM1046.76 30.3026L1047.69 29.1372L1041.47 24.1446L1040.53 25.31L1039.6 26.4754L1045.83 31.4681L1046.76 30.3026Z" fill="#DEB76C"/>
            <line x1="589.977" y1="18.5532" x2="1015.88" y2="18.5532" stroke="#DEB76C" stroke-width="3"/>
            <line y1="-1.5" x2="26.6559" y2="-1.5" transform="matrix(0.803653 -0.595099 0.705499 0.708711 1015.71 19.8441)" stroke="#DEB76C" stroke-width="3"/>
          </svg>

          <p class="font-display text-heading-3 md:text-heading-3 lg:text-heading-2 text-neutral-light">
            {{ $region->title }}
          </p>

        </div>
  </div>
</section>