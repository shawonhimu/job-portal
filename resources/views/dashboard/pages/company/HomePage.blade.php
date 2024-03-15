@extends('dashboard.layout.app')

@section('content')
    <div class="mainAdmin">
        {{-- Side navbar --}}
        @include('dashboard.components.company-pages.Sidebar')
        {{-- Contents --}}
        <div class="adminContentBar" id="adminContentBar">
            {{-- Top navbar --}}
            @include('dashboard.components.company-pages.Navbar')
            {{-- Cards --}}

            @include('dashboard.components.company-pages.CompanyHome')
        </div>
    </div>

    @if (session('success'))
        <script>
            swal("Success !", "{{ session('success') }}", "success", {
                button: false,
                // button: "OK",
                timer: 2000,
            })
        </script>
    @endif
@endsection
