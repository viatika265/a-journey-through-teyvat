@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- HERO SECTION --}}
<section class="min-h-screen bg-gray-950 text-white flex items-center justify-center">
    <div class="text-center">
        <h1 class="text-4xl font-bold">
            A Journey Through Teyvat
        </h1>

        <p class="mt-4 text-gray-400">
            Welcome, Traveler.
        </p>

        <a
            href="#regions"
            class="inline-block mt-6 rounded-lg bg-blue-500 px-6 py-3 font-semibold hover:bg-blue-600 transition"
        >
            Explore Teyvat
        </a>
    </div>
</section>

{{-- REGION SECTION --}}
<section id="regions" class="min-h-screen bg-gray-900 text-white px-8 py-20">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-4">
            Explore the Regions
        </h2>

        <p class="text-gray-400 text-center mb-12">
            Choose a region and begin your journey.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($regions as $region)
                <a
                    href="{{ route('regions.show', $region->slug) }}"
                    class="block rounded-xl bg-gray-800 p-6 hover:bg-gray-700 transition"
                >
                    <h3 class="text-xl font-semibold">
                        {{ $region->name }}
                    </h3>

                    <p class="mt-2 text-sm text-gray-400">
                        Discover Region →
                    </p>
                </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Teyvara Aetheris | A Journey Through Teyvat</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main>
        <!-- HERO SECTION -->
        <section class="hero">
            <div class="hero-content">
                <p class="eyebrow">A WORLD OF ELEMENTS</p>

                <h1>Teyvara Aetheris</h1>

                <p class="subtitle">
                    A Journey Through Teyvat
                </p>

                <button id="explore-btn">
                    Explore Teyvat
                </button>
            </div>
        </section>

        <!-- INTRO SECTION -->
        <section class="intro" id="intro">
            <div class="intro-content">
                <p class="eyebrow">WELCOME, TRAVELER</p>

                <h2>Your Journey Begins Here</h2>

                <p>
                    Discover the world of Teyvat,
                    a land shaped by seven elements
                    and countless stories waiting to unfold.
                </p>
            </div>
        </section>
    </main>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>
