@extends('website.layout.app')

@section('title', 'Job Pulse || Login Page')

@section('content')
    {{-- Navbar --}}
    @include('website.components.Navbar')

    @include('website.components.RegistrationForm')

    {{-- Footer --}}
    @include('website.components.Footer')


@endsection
