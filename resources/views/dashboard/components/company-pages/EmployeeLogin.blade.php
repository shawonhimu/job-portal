@extends('dashboard.layout.app')


@section('content')
    <div class="bodyStyle">
        <div class="loginPage">
            <div class="overlay"></div>
            <div class="container-fluid">
                <div class="loginForm">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="loginCard">
                                <h3 class="text-light text-uppercase bg-success p-2 rounded">Job Pulse</h3>
                                <div class="mobileLogo">
                                    <img src="{{ asset('') }}" alt="" srcset="">
                                </div>
                                <div class="loginLogo">
                                    <img src="{{ asset('img/user.png') }}" alt="" srcset="">
                                    <h5 class="text-dark text-uppercase">Login as Employee</h5>
                                </div>
                                {{-- Login Form --}}
                                <div id="adminForm">
                                    <form action="{{ url('/employee-login') }}" class="loginForm" id=""
                                        method="POST">
                                        @csrf
                                        <input type="email" name="email" class="form-control text-center" id=""
                                            placeholder="Enter your phone number" required>
                                        <input type="password" name="password" class="form-control text-center"
                                            id="" placeholder="Enter your password" required>

                                        <input class="btn btn-login" name="submit" type="submit" value="Login">
                                    </form>
                                </div>
                                {{-- End login form --}}
                                {{-- <div>
                                    <p class=" text-light">Don't have account ?</p>
                                    <a class=" btn btn-success" href="{{ url('registration') }}">Create New Account</a>
                                </div> --}}
                            </div>
                        </div>

                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
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
    @elseif (session('error'))
        <script>
            swal("Error !", "{{ session('error') }}", "error", {
                button: false,
                // button: "OK",
                timer: 3000,
            })
        </script>
    @else
        <div></div>
    @endif
@endsection
