<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tiki Ticket Booking Application</title>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

    @yield('styles')
    {{-- Custom Styles if needed --}}

    <link rel="stylesheet" href="{{ asset('dashboard-style.css') }}" />
</head>

<body>

    {{-- <div class="mainAdmin"> --}}

    @yield('content')
    {{-- All Content --}}

    {{-- </div> --}}


    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    @yield('scripts')
    {{-- Custom JS if needed --}}


    <script src="{{ asset('js/dashboard-custom.js') }}"></script>

</body>

</html>
