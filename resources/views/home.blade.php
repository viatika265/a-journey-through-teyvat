@extends('layouts.app')

@section('title', 'Home')

@section('content')


    {{-- SPLASH SCREEN --}}
    @include('components.splash')



    {{-- HERO --}}
    @include('components.hero')


    {{-- STORY --}}
    @include('components.story')


    {{-- REGION MAP --}}
    @include('components.region-map')



    {{-- GAMEPLAY --}}

    @include('components.gameplay.partials.explore')

    @include('components.gameplay.partials.combat')

    @include('components.gameplay.partials.quests')



    {{-- TRAILER --}}
    @include('components.trailer')


    {{-- DOWNLOAD --}}
    @include('components.download')


@endsection