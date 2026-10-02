@extends('layouts.app')

@section('title', 'Region')

@section('content')
<head>
    <!-- Tag meta lainnya -->
    @vite(['resources/css/app.css'])
</head>
@section('content')

    <div class="relative overflow-visible bg-black">

    <div class="relative z-10">
        @include('components.region-intro')
    </div>

    <div class="relative z-20 -mt-[300px] md:-mt-[400px] lg:-mt-[450px]">
        @include('components.region-about')
    </div>

    <div class="relative z-10">
        @include('components.region-citizen')
    </div>

</div>

@endsection