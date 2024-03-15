@extends('website.layout.app')

@section('title', 'Job Pulse || Login Page')

@section('content')
    {{-- Navbar --}}
    @include('website.components.Navbar')

    @include('website.components.candidate-logged.Setting')

    {{-- Footer --}}
    @include('website.components.Footer')

@endsection

@section('script')

    <script src="{{ asset('js/settings.js') }}"></script>

@endsection
