<div
    id="region-card"
    class="hidden fixed z-50 w-full sm:w-full sm:max-w-[404px] max-h-[75vh] sm:min-h-[419.25px] overflow-y-auto p-5 sm:p-6 md:p-8 rounded-t-[25px] sm:rounded-[25px] flex flex-col items-start gap-[13px] shadow-2xl transition-opacity"
    style="padding-bottom: calc(1.25rem + env(safe-area-inset-bottom));">
    <!-- Tombol Close -->
    <button onclick="closeCard()" class="absolute top-4 right-5 text-white hover:text-gray-300 font-bold text-xl cursor-pointer">
        &times;
    </button>

    {{-- Region Image --}}
    <img
        id="card-image"
        src=""
        alt="Region Image"
        class="w-full aspect-[340/191.25] object-cover rounded-[15px] bg-black/20"
    >

    {{-- Region Information --}}
    <div class="w-full flex flex-col gap-[13px]">

        {{-- Region Name --}}
        <h2
            id="card-title"
            class="w-full font-display text-[28px] sm:text-[30px] md:text-[32px] leading-tight font-normal text-[#EAECF2]"
        >
        </h2>

        {{-- Description + Info --}}
        <div class="w-full flex flex-col gap-[12px]">

            {{-- Description --}}
            <p
                id="card-desc"
                class="w-full font-body text-[18px] sm:text-[19px] md:text-[20px] leading-[24px] font-normal text-[#EAECF2] line-clamp-2"
            >
            </p>

            {{-- Icon + Button --}}
            <div class="w-full flex flex-row items-center justify-between gap-4 mt-2">

                {{-- Region Icon --}}
                <div class="flex items-center gap-[14px]">
                    <img
                        id="card-icon-1"
                        src=""
                        class="w-10 h-10 object-contain"
                    >
                </div>

                {{-- Element Icon --}}
                <div class="flex items-center gap-[14px]">
                    <img
                        id="card-icon-2"
                        src=""
                        class="w-10 h-10 object-contain"
                    >
                </div>
                {{-- Archon Icon --}}
                <div class="flex items-center gap-[14px]">
                    <img
                        id="card-icon-3"
                        src=""
                        class="w-10 h-10 object-contain object-cover rounded-full"
                    >
                </div>

                {{-- Detail Button --}}
                <x-button 
                    size="medium"
                    id="card-link"
                >
                Discover Region
                </x-button>
               

            </div>
        </div>
    </div>
</div>