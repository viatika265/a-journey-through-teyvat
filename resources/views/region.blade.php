@extends('layouts.app')

@section('title', $region->name . ' | A Journey Through Teyvat')

@section('content')
    <div class="relative overflow-visible bg-black">

        <div class="relative z-10">
            @include('components.region-intro')
        </div>

        <div class="relative z-20 -mt-[300px] md:-mt-[300px] lg:-mt-[450px]">
            @include('components.region-about')
        </div>

        <div class="relative z-10">
            @include('components.region-citizen')
        </div>

    </div>

@endsection