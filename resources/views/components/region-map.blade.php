@props(['regions'])
<section id="region-map" class="relative w-full overflow-hidden">
    <div
        id="map-viewport"
        class="relative w-full overflow-hidden select-none"
        style="height: 700px;"
    >
        <div
            id="map-canvas"
            class="absolute left-0 top-0 origin-top-left cursor-grab"
        >
            <img
                src="{{ asset('images/teyvat-maps.png') }}"
                alt="Map of Teyvat"
                id="teyvat-map"
                class="pointer-events-none block max-w-none"
            >
            <!-- Overlay awan dengan efek animasi -->
            <div class="absolute inset-0 pointer-events-none animate-clouds" 
                style="background-image: url('{{ asset('images/cloud_maps.png') }}'); background-repeat: repeat; mix-blend-mode: screen; opacity: 0.7; z-index: 5;">
            </div>

            @foreach($regions as $region)
                <div class="region-pin group z-10" style="left: {{ $region['x'] }}px; top: {{ $region['y'] }}px;">
                    
                    <!-- SVG Pin dengan warna dinamis -->
                    <svg viewBox="0 0 100 125" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-full h-full">
                        <path d="M100 50.0006C100 81.2073 65.3812 113.708 53.7562 123.745C52.6733 124.56 51.355 125 50 125C48.645 125 47.3267 124.56 46.2438 123.745C34.6188 113.708 0 81.2073 0 50.0006C0 36.7396 5.26784 24.0218 14.6447 14.6448C24.0215 5.26791 36.7392 0 50 0C63.2608 0 75.9785 5.26791 85.3553 14.6448C94.7322 24.0218 100 36.7396 100 50.0006Z" 
                            fill="{{ $region['color'] }}"/>
                    </svg>

                    <!-- Emblem dinamis -->
                    <img src="{{ asset('images/' . $region['emblem']) }}" class="region-emblem" alt="{{ $region['name'] }} Emblem">
                </div>
            @endforeach
    
        </div>
    </div>

</section>