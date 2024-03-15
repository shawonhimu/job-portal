@extends('website.layout.app')

@section('title', 'Job Pulse || Registration Page')

@section('content')
    {{-- Navbar --}}
    @include('website.components.Navbar')

    @include('website.components.company.CompanyLogin')

    {{-- Footer --}}
    @include('website.components.Footer')


@endsection
