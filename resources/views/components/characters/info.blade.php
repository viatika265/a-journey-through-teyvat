<div class="mt-8 w-full max-w-[500px] text-center px-4 mx-auto">
    @foreach($characters as $index => $character)
        <!-- Perhatikan bagian x-show di bawah ini -->
        <div x-show="activeIndex == {{ $index }}" class="flex flex-col items-center w-full">
            
            <!-- Nama Karakter & Deskripsi -->
            <div class="mb-6 w-full">
                <h3 class="font-display text-heading-3 text-yellow-normal tracking-wide mb-2">
                    {{ $character['name'] }}
                </h3>
                <p class="font-body text-heading-5 text-white leading-relaxed">
                    {{ $character['description'] }}
                </p>
            </div>

            <!-- Item Card (Elemen, Senjata, Artefak) -->
            <div class="flex flex-row items-center justify-center gap-4 md:gap-[36px] w-fit h-[70px] mx-auto">
                
                <!-- Kotak 1: Elemen -->
                <div title="Element" class="group relative flex flex-col justify-center items-center w-[70px] h-[70px] border-[5px] border-yellow-normal rounded-[10px] bg-black/40 overflow-hidden flex-shrink-0 cursor-pointer hover:scale-105 transition-transform">
                    <div class="w-full h-full flex items-center justify-center p-1">
                        <img src="{{ asset('images/' . $character['element']) }}" alt="Element" class="w-full h-full object-contain">
                    </div>
                </div>

                <!-- Kotak 2: Senjata -->
                <div title="Weapon" class="group relative flex flex-col justify-center items-center w-[70px] h-[70px] border-[5px] border-yellow-normal rounded-[10px] bg-black/40 overflow-hidden flex-shrink-0 cursor-pointer hover:scale-105 transition-transform">
                    <div class="w-full h-full flex items-center justify-center p-1">
                        <img src="{{ asset('images/' . $character['weapon']) }}" alt="Weapon" class="w-full h-full object-contain">
                    </div>
                </div>

                <!-- Kotak 3: Artefak -->
                <div title="Artifact" class="group relative flex flex-col justify-center items-center w-[70px] h-[70px] border-[5px] border-yellow-normal rounded-[10px] bg-black/40 overflow-hidden flex-shrink-0 cursor-pointer hover:scale-105 transition-transform">
                    <div class="w-full h-full flex items-center justify-center p-1">
                        <img src="{{ asset('images/' . $character['artifact']) }}" alt="Artifact" class="w-full h-full object-contain">
                    </div>
                </div>

            </div>

        </div>
    @endforeach
</div>