@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @include('components.hero')
    @include('components.story')
    @include('components.region-map')
    @include('components.explore')
    @include('components.trailer')
    @include('components.download')

@endsection