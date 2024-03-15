@extends('website.layout.app')

@section('title', 'Job Pulse || About Page')

@section('content')
    {{-- Navbar --}}
    @include('website.components.Navbar')
    @include('website.components.PageTopbanner')

    @include('website.components.Contact')
    <section class="mainPersonsSection mt-lg-0" id="mainPersons">
        <div>
            <div class="container">
                <div class="personalBanner pb-lg-3 py-2">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class="text-center text-uppercase align-items-center">
                                <h2 class="mt-lg-5 my-2">Companies, We believe in</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('website.components.TopCompany')

    {{-- Footer --}}
    @include('website.components.Footer')


@endsection
