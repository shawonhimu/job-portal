@extends('website.layout.app')

@section('title', 'Job Pulse || Blog Page')

@section('content')
    {{-- Navbar --}}
    @include('website.components.Navbar')
    @include('website.components.PageTopbanner')

    @include('website.components.Blogs')

    {{-- Footer --}}
    @include('website.components.Footer')


@endsection
