@props(['title', 'date', 'image', 'video' => null])

<div class="flex flex-col gap-4 cursor-pointer group w-full">

    {{-- Media Container --}}
    <div class="overflow-hidden rounded-lg w-full aspect-video">
        @if ($video)
            <iframe
                src="{{ $video }}"
                title="{{ $title }}"
                class="w-full h-full"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen>
            </iframe>
        @else
            <img 
                src="{{ $image }}" 
                alt="{{ $title }}" 
                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500"
            >
        @endif
    </div>
    
    {{-- Text Content --}}
    <div class="flex flex-col gap-4 mt-1">
        <h4 class="font-display text-[24px] md:text-[32px] text-[#FCF8F0] leading-snug max-w-[80%] group-hover:text-[#DEB76C] transition-colors duration-300">
            {{ $title }}
        </h4>

        <p class="font-body text-[16px] md:text-[20px] text-[#7E7E7E] text-right">
            {{ $date }}
        </p>
    </div>
</div>