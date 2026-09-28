@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @include('components.hero')
    @include('components.story')

    <x-region-map :regions="$regions" />

    @include('components.explore')
    @include('components.trailer')
    @include('components.download')

@endsection