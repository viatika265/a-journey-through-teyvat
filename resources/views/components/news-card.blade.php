@props(['title', 'date', 'image'])

<div class="flex flex-col gap-4 cursor-pointer group w-full">
    {{-- Image Container (dengan efek zoom saat di-hover) --}}
    <div class="overflow-hidden rounded-lg w-full aspect-video">
        <img 
            src="{{ $image }}" 
            alt="{{ $title }}" 
            class="w-full aspect-video object-cover transform group-hover:scale-105 transition-transform duration-500"
        >
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