@extends('layouts.app')

@section('title', 'Home')

@section('content')
<head>
    <!-- Tag meta lainnya -->
    @vite(['resources/css/app.css'])
</head>
@section('content')

    @include('hero')

    @include('story')

    @include('explore')

    @include('trailer')

    @include('download')

@endsection