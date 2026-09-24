@extends('layouts.app')

@section('title', 'Home')

@section('content')
<head>
    <!-- Tag meta lainnya -->
    @vite(['resources/css/app.css'])
</head>

<!-- Menggunakan bg custom blue-darker dan base font-body -->
<div class="min-h-screen bg-blue-darker text-neutral-light flex items-center justify-center font-body">
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
        <button class="mt-6 rounded-lg bg-blue-normal px-6 py-3 text-body-small font-semibold text-yellow-light hover:bg-blue-normal-hover active:bg-blue-normal-active transition">
            Explore Teyvat
        </button>
        
    </div>
</div>
@endsection