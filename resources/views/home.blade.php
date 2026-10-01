@extends('layouts.app')

@section('title')

@section('content')
<head>
    <!-- Tag meta lainnya -->
    @vite(['resources/css/app.css'])
</head>
@section('content')

    @include('components.hero')

    @include('components.story')

    @include('components.region-map')

    @include('gameplay.partials.explore')
    @include('gameplay.partials.combat')
    @include('gameplay.partials.quests')

    @include('components.trailer')

    @include('components.download')

@endsection