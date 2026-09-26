@extends('layouts.app')

@section('title', 'Home')

@section('content')
<head>
    <!-- Tag meta lainnya -->
    @vite(['resources/css/app.css'])
</head>
@section('content')

    @include('components.hero')

    @include('components.story')

    @include('components.region-map')

    @include('components.explore')

    @include('components.trailer')

    @include('components.download')

@endsection