@extends('layouts.app')

@section('title', 'Home')

@section('content')

<head>
    <!-- Tag meta lainnya -->
    @vite(['resources/css/app.css'])
</head>

<!-- Menggunakan bg custom blue-darker dan base font-body -->
<div class="min-h-screen bg-blue-darker text-neutral-light flex flex-col font-body overflow-x-hidden">
    <div class="text-center">
        
        <!-- Menguji font-display, custom text size heading-1, dan warna yellow-normal -->
        <h1 class="font-display text-heading-1 text-yellow-normal font-bold tracking-wide">
            A Journey Through Teyvat
        </h1>

        <!-- Menguji ukuran text-body dan warna neutral-normal -->
        <p class="mt-4 text-body text-neutral-normal">
            Welcome, Traveler.
        </p>

        <!-- Menguji warna button custom (blue-normal) dengan efek hover/active dan teks kuning -->
        <x-button size="medium">
            Explore Teyfat
        </x-button>

        
        
        
    </div>

    <!-- Menguji komponen region-map -->
    <div class="w-full mt-16">
        <x-region-map :regions="$regions" />
    </div>

    <!-- Menguji komponen news-card -->
    <section id="whats-new" class="w-full bg-black py-16 px-6 md:px-16 lg:px-24">
    
        {{-- Section Title --}}
        <div class="w-full flex justify-center mb-12">
            <h2 class="font-display text-[40px] md:text-[64px] leading-tight text-[#F6F6F6]">
                What’s new
            </h2>
        </div>

        <div class="w-full max-w-[1280px] mx-auto flex flex-col gap-12">
            <x-featured-news 
                version="Version 7.0 Out Now" 
                title="Everwinter Without Mercy" 
                description="Dear traveler, new region Snezaa, Tevat's seventh nation is now can be explored alongside wit new caracter, Odette and Alosa will join our journe." 
                date="12 August 2026" 
                image="https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/news-media/news-image-featuredNews.png"
            />
           

            {{-- 2. Secondary News Grid (Berita Pendamping / Bawah) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                
                {{-- Menggunakan komponen x-news-card --}}
                <x-news-card 
                    title="Character Trailer - Vodyanitsa" 
                    date="22 September 2026" 
                    image="https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/news-media/news-image-trailerVodyanista.png" 
                />
                
                <x-news-card 
                    title="Character Trailer - Vesna" 
                    date="21 September 2026" 
                    image="https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/news-media/news-image-trailerVesna.png" 
                />

            </div>
        </div>
    </section>
</div>
@endsection