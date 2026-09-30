@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @include('components.hero')
    @include('components.story')
    @include('components.region-map')
    @include('components.explore')

    {{-- GAMEPLAY --}}

    @include('gameplay.partials.explore')
    @include('gameplay.partials.combat')
    @include('gameplay.partials.quests')

    @include('components.trailer')
    @include('components.download')


@endsection