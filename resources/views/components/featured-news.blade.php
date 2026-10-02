@props(['version', 'title', 'description', 'date', 'image'])

<div class="flex flex-col xl:flex-row gap-8 items-center xl:items-start cursor-pointer group w-full">
    {{-- Image Container --}}
    <div class="w-full xl:w-2/3 shrink-0 overflow-hidden rounded-lg aspect-video">
        <img 
            src="{{ $image }}" 
            alt="{{ $title }}" 
            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500"
        >
    </div>
    
    {{-- Content --}}
    <div class="w-full xl:w-1/3 flex flex-col justify-between h-full">
        <div>
            <h4 class="font-display text-[24px] md:text-[28px] text-[#FCF8F0]">
                {{ $version }}
            </h4>
            <h3 class="font-display  text-[32px] md:text-[40px] text-[#DEB76C] leading-[1.2] mb-4 group-hover:underline">
                {{ $title }}
            </h3>
            <p class="font-body text-[16px] md:text-[18px] text-[#F6F6F6] leading-[1.4] mb-6">
                {{ $description }}
            </p>
        </div>
        
        {{-- Date --}}
        <p class="font-body text-[16px] md:text-[18px] text-[#7E7E7E] text-left xl:text-right w-full">
            {{ $date }}
        </p>
    </div>
</div>