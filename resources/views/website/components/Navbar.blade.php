<!--            Navbar Area       -->
<section class="navbarBG sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler nav-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand pcViewOnly" href="#"><img src="{{ asset('img/logo.png') }}"
                        alt="" /></a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('job') }}">Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('blog') }}">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                        </li>
                    </ul>
                    @if (Cookie::get('token'))
                        <div class="dropdown userDropDown">
                            <button class="btn myBtn dropdown-toggle" type="button" id="dropdownMenuButton2"
                                data-bs-toggle="dropdown" aria-expanded="false"><img src="{{ asset('img/user.png') }}"
                                    alt="" id="candiNavbarPictire" /></button>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end"
                                aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item active" href="{{ url('activity') }}">Your Activity</a></li>
                                <li><a class="dropdown-item" href="{{ url('applied-job') }}">Applied Jobs</a></li>
                                <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ url('edit-profile') }}">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="{{ url('setting') }}">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item" href="{{ url('candidate-logout') }}">Logout</a></li>
                            </ul>
                        </div>
                    @else
                        <div>
                            <a href="{{ url('candidate-login') }}" class="btn myBtn">Login</a>
                            <a href="{{ url('candidate-registration') }}" class="btn myBtn">Registration</a>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</section>
