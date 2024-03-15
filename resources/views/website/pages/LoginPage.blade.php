@extends('website.layout.app')

@section('title', 'Job Pulse || Login Page')

@section('content')
    {{-- Navbar --}}
    @include('website.components.Navbar')

    @include('website.components.LoginForm')

    {{-- Footer --}}
    @include('website.components.Footer')


@endsection
