<div class="flex flex-col items-center w-full max-w-[500px] mx-auto text-center px-4">
    
    <!-- Nama Karakter & Deskripsi -->
    <div class="mb-6 w-full">
        <h3 class="font-display text-heading-3 text-yellow-normal tracking-wide mb-2">Venti</h3>
        <p class="font-body text-heading-5 text-white leading-relaxed">
            A bard that seems to have drifted in from nowhere. Sometimes singing songs as old as the hills, and other times fresh new city tunes.
        </p>
    </div>

    <!-- Item Card (Elemen, Senjata, Artefak) -->
    <div class="flex flex-row items-center justify-center gap-4 md:gap-[36px] w-[282px] h-[70px] mx-auto">
        
        <!-- Kotak 1: Elemen (Anemo) dengan Tooltip -->
        <div title="Element: Anemo" class="group relative flex flex-col justify-center items-center w-[70px] h-[70px] border-[5px] border-[#DEB76C] rounded-[10px] bg-black/40 overflow-hidden flex-shrink-0 cursor-pointer hover:scale-105 transition-transform">
            <div class="w-full h-full flex items-center justify-center p-1">
                <img src="{{ asset('images/anemo.png') }}" alt="Anemo" class="w-full h-full object-contain">
            </div>
        </div>

        <!-- Kotak 2: Senjata (Bow) dengan Tooltip -->
        <div title="Weapon: Bow" class="group relative flex flex-col justify-center items-center w-[70px] h-[67px] border-[5px] border-[#DEB76C] rounded-[10px] bg-black/40 overflow-hidden flex-shrink-0 cursor-pointer hover:scale-105 transition-transform">
            <div class="w-full h-full flex items-center justify-center p-1">
                <img src="{{ asset('images/Bow.png') }}" alt="Bow" class="w-full h-full object-contain">
            </div>
        </div>

        <!-- Kotak 3: Artefak dengan Tooltip -->
        <div title="Artifact: Viridescent Venerer" class="group relative flex flex-col justify-center items-center w-[70px] h-[70px] border-[5px] border-[#DEB76C] rounded-[10px] bg-black/40 overflow-hidden flex-shrink-0 cursor-pointer hover:scale-105 transition-transform">
            <div class="w-full h-full flex items-center justify-center p-1">
                <img src="{{ asset('images/Viridescent Venerer.png') }}" alt="Artifact" class="w-full h-full object-contain">
            </div>
        </div>

    </div>
</div>