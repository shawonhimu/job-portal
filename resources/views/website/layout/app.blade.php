<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title', 'Job Pulse')</title>

    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Raleway:300,400,500,600,700&display=swap"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Gemstones&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('img/logo.svg" type="image/x-icon') }}" />
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('slick/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('slick/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    @yield('style')

    {{-- stylesheet if need --}}

    <link rel="stylesheet" href="{{ asset('css/toastify.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('style.css') }}" />

    <script src="{{ asset('slick/jquery/jquery.min.js') }}"></script>

</head>

<body>
    {{-- Preloader --}}
    <div id="preloader" class="d-none">
        <div id="loader"></div>
    </div>

    {{-- All content --}}

    @yield('content')

    {{-- Main content here --}}



    {{-- Script if need --}}

    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('slick/slick.min.js') }}"></script>
    <script src="{{ asset('slick/slick-custom.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/toastify-js.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>

    @yield('script')


    <script>
        candidateNavbarPhoto();
        async function candidateNavbarPhoto() {
            let candiNavbarPictire = document.getElementById('candiNavbarPictire');
            if (candiNavbarPictire == null) {
                // errorToast('No profile photo found ');
            } else {
                showLoader();
                let res = await axios.get("/profile-photo");
                if (res.status === 200) {
                    candiNavbarPictire.src = res.data.data;
                    // console.log(res.data.data);
                    // console.log(candiNavbarPictire);
                    hideLoader();
                } else {
                    errorToast(res.data.data)
                    hideLoader();
                }

            }

        }
    </script>


</body>

</html>
