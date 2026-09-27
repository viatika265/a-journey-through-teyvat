@extends('layouts.app')

@section('title', 'Home')

@section('content')

<head>
    @vite(['resources/css/app.css'])
</head>

<div class="min-h-screen bg-blue-darker text-neutral-light flex flex-col font-body overflow-x-hidden">

    <div class="text-center">

        <h1 class="font-display text-heading-1 text-yellow-normal font-bold tracking-wide">
            A Journey Through Teyvat
        </h1>

        <p class="mt-4 text-body text-neutral-normal">
            Welcome, Traveler.
        </p>

        <a href="#regions">
            Explore Teyvat
        </a>

        <x-button size="medium">
            Explore Teyfat
        </x-button>

        {{-- Character Interaction --}}
        @include('components.characters.index')

    </div>

    {{-- Interactive Teyvat Map --}}
    <div class="w-full mt-16">
        <x-region-map :regions="$regions" />
    </div>

</div>

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