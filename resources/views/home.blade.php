@extends('layouts.app')

@section('title')

@section('content')

    {{-- SPLASH SCREEN --}}
    @include('components.splash')

    {{-- Hero & Story Sections --}}
    @include('components.hero')
    @include('components.story')

    {{-- CLOUD TRANSITION + MAP --}}
        <div class="relative">
        <x-cloud-divider />

        <div class="relative z-10 w-full">
            <x-region-map :regions="$regions" />
        </div>
    </div>

    @include('components.why-play')

    {{-- GAMEPLAY --}}
    @include('components.gameplay.partials.explore')
    @include('components.gameplay.partials.combat')

    {{-- Quests & Stories Component --}}
    <section id="quests-stories">
        <x-quest :questImages="$questImages" />
    </section>

    {{-- TRAILER --}}
    @include('components.trailer')

    {{-- WHAT'S NEW SECTION --}}
    <section id="update" class="w-full bg-black py-16 px-6 md:px-16 lg:px-24">

        {{-- TITLE --}}
        <div class="w-full flex flex-col items-center justify-center mb-12">
            <h2 class="font-display text-[40px] md:text-[64px] leading-tight text-[#F6F6F6]">
                What’s new
            </h2>

            {{-- GOLD UNDERLINE --}}
            <div class="mt-3 h-px w-36 bg-gradient-to-r from-transparent via-[#c9ad63] to-transparent"></div>
        </div>

        {{-- NEWS CONTENT --}}
        <div class="w-full max-w-[1280px] mx-auto flex flex-col gap-12">

            <x-featured-news
                version="Version 7.0 Out Now"
                title="Everwinter Without Mercy"
                description="Dear Traveler, new region Snezhnaya, Teyvat's seventh nation is now can be explored alongside wit new caracter, Odette and Aloysa will join your journey."
                date="12 August 2026"
                image="https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/news-media/news-image-featuredNews.png"
            />

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <x-news-card
                    title="Character Trailer - Vodyanitsa"
                    date="22 September 2026"
                    image="https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/news-media/news-image-trailerVodyanista.png"
                    video="https://www.youtube.com/embed/8Ty-Btue6OI?si=RvNgWPvUpHVxXJzy"
                />

                <x-news-card
                    title="Character Trailer - Vesna"
                    date="21 September 2026"
                    image="https://grbirqasbpissybggxhq.supabase.co/storage/v1/object/public/news-media/news-image-trailerVesna.png"
                    video="https://www.youtube.com/embed/DBgFuu5Lrww?si=pHXROsT9TvH1lf0K"
                />
            </div>
        </div>
    </section>

    {{-- DOWNLOAD --}}
    @include('components.download')

@endsection
