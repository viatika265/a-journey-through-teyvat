@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @include('components.hero')
    @include('components.story')
    @include('components.region-map')
    @include('components.explore')
<<<<<<< HEAD

    {{-- GAMEPLAY --}}

    @include('gameplay.partials.explore')
    @include('gameplay.partials.combat')
    @include('gameplay.partials.quests')

    @include('components.trailer')
    @include('components.download')


=======
    @include('components.trailer')
    @include('components.download')

>>>>>>> origin/develop
@endsection