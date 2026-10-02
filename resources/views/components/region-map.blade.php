@props(['regions'])
<section id="region-map" class="relative w-full overflow-hidden pt-[5vw] bg-[#1F5A67]">
    <div
        id="map-viewport"
        class="relative w-full overflow-hidden select-none touch-none"
        style="height: 100vh;"
    >

        <div
            id="map-canvas"
            class="absolute left-0 top-0 origin-top-left cursor-grab"
        >

            <img
                src="https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/landing-page/teyfat-maps.png"
                alt="Map of Teyvat"
                id="teyvat-map"
                class="pointer-events-none block max-w-none"
            >

            {{-- Overlay awan dengan efek animasi --}}
            <div
                class="absolute inset-0 pointer-events-none animate-clouds"
                style="
                    background-image: url('https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/landing-page/cloud_maps.png');
                    background-repeat: repeat;
                    mix-blend-mode: screen;
                    opacity: 0.7;
                    z-index: 5;
                "
            ></div>

            @foreach($regions as $region)

                <div
                    class="region-pin group z-10 cursor-pointer"
                    style="left: {{ $region['x'] }}px; top: {{$region['y'] }}px;"
                    style="left: {{ $region['x'] }}px; top: {{ $region['y'] }}px;"
                    
                    data-name="{{ $region['name'] }}"
                    data-slug="{{ $region['slug'] }}"
                    data-desc="{{ $region['short_description'] }}"
                    data-image="{{ $region['card_image'] }}"
                    data-icon1="{{ $region['icon'] }}"
                    data-gradients="{{ $region['gradients'] }}"
                    data-element-name="{{ $region['element_name'] }}"
                    data-element-icon="{{ $region['element_icon'] }}"
                    data-archon-icon="{{ $region['archon_icon'] }}"
                    onclick="openCard(this)"
                >

                    {{-- SVG Pin dengan warna dinamis --}}
                    <svg
                        viewBox="0 0 100 125"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="absolute inset-0 w-full h-full"
                    >
                        <path
                            d="M100 50.0006C100 81.2073 65.3812 113.708 53.7562 123.745C52.6733 124.56 51.355 125 50 125C48.645 125 47.3267 124.56 46.2438 123.745C34.6188 113.708 0 81.2073 0 50.0006C0 36.7396 5.26784 24.0218 14.6447 14.6448C24.0215 5.26791 36.7392 0 50 0C63.2608 0 75.9785 5.26791 85.3553 14.6448C94.7322 24.0218 100 36.7396 100 50.0006Z"
                            fill="{{ $region['color'] }}"
                        />
                    </svg>

                    {{-- Emblem dinamis --}}
                    <img
                        src="{{ $region['emblem'] }}"
                        class="region-emblem"
                        alt="{{ $region['name'] }} Emblem"
                    >

                </div>

            @endforeach

        </div>

        <x-region-card />

    </div>

</section>

<script>
    function openCard(element) {
        const card = document.getElementById('region-card');

        const slug = element.getAttribute('data-slug');
        document.getElementById('card-link').onclick = function () {
            window.location.href = `/regions/${slug}`;
        };

        document.getElementById('card-title').innerText = element.getAttribute('data-name');
        document.getElementById('card-desc').innerText = element.getAttribute('data-desc');
        document.getElementById('card-image').src = element.getAttribute('data-image');
        document.getElementById('card-icon-1').src = element.getAttribute('data-icon1');
        card.style.background = element.getAttribute('data-gradients');
        
        const cardLink = document.getElementById('card-link');

        if (cardLink) {
            cardLink.href = `/regions/${encodeURIComponent(slug)}`;
        }



        const elementIcon = document.getElementById('card-icon-2');
        const elementIconUrl = element.getAttribute('data-element-icon');
        if (elementIconUrl && elementIconUrl !== 'null') {
            elementIcon.src = elementIconUrl;
            elementIcon.alt = element.getAttribute('data-element-name');
            elementIcon.style.display = '';
        } else {
            elementIcon.style.display = 'none'; // sembunyikan kalau region tidak punya element
        }
        
        const archonIcon = document.getElementById('card-icon-3');
        const archonIconUrl = element.getAttribute('data-archon-icon');
        if (archonIconUrl && archonIconUrl !== 'null' && archonIconUrl !== '') {
            archonIcon.src = archonIconUrl;
            archonIcon.style.display = '';
        } else {
            archonIcon.style.display = 'none';
        }
        const screenWidth = window.innerWidth;

        if (screenWidth < 768) {
            card.style.position = 'fixed';
            card.style.top = 'auto';
            card.style.bottom = '0';
            card.style.left = '0';
            card.style.right = '0';
            card.style.transform = 'none';
            card.style.zIndex = '9999';
        } else {
            card.style.position = 'fixed';
            card.style.top = '50%';
            card.style.left = '50%';
            card.style.right = 'auto';
            card.style.bottom = 'auto';
            card.style.transform = 'translate(-50%, -50%)';
            card.style.zIndex = '9999';
        }

        card.classList.remove('hidden');
    }

    function closeCard() {
        document.getElementById('region-card').classList.add('hidden');
    }
</script>