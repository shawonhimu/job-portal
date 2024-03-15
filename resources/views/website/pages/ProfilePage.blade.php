@extends('website.layout.app')

@section('title', 'Job Pulse || About Page')

@section('content')
    {{-- Navbar --}}
    @include('website.components.Navbar')

    @include('website.components.candidate-logged.Profile')

    {{-- Footer --}}
    @include('website.components.Footer')
@endsection
