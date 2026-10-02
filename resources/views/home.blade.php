@extends('layouts.app')

@section('title')

@section('content')

    {{-- Hero & Story Sections --}}
    @include('components.hero')
    @include('components.story')

    {{-- Region Map Component --}}
    <div class="w-full">
        <x-region-map :regions="$regions" />
    </div>

    {{-- Quests & Stories Component --}}
    <section id="quests-stories">
        <x-quest :questImages="$questImages" />
    </section>

    @include('components.trailer')

    {{-- What's New Section --}}
    <section id="update" class="w-full bg-black py-16 px-6 md:px-16 lg:px-24">
    
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
                description="Dear Traveler, new region Snezhnaya, Teyvat's seventh nation is now can be explored alongside wit new caracter, Odette and Aloysa will join your journey." 
                date="12 August 2026" 
                image="https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/news-media/news-image-featuredNews.png"
            />
            
            {{-- Secondary News Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
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

    {{-- Other Sections --}}
    @include('components.download')

@endsection