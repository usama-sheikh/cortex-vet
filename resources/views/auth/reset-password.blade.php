<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('portal/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('portal/assets/img/Fav Icon.png') }}">
    <title>Reset Password | {{config('app.name')}} </title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"/>
    <!-- Nucleo Icons -->
    <link href="{{ asset('portal/assets/css/nucleo-icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('portal/assets/css/nucleo-svg.css') }}" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('portal/assets/css/material-dashboard.css?v=3.0.5') }}" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

</head>

<body class="g-sidenav-show" style="background-color: #FAFAFA;">
<nav class="navbar px-md-7 navbar-expand-lg position-absolute top-0 z-index-3 shadow-none my-3 navbar-transparent mt-4">
    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-md-3 text-white" href="{{ url('/') }}">
        <img src="{{ asset('portal/assets/img/Logo.png') }}" width="140px" alt="Logo"/>
        {{--<div class="position-relative  h-100 m-3  border-radius-lg d-flex flex-column justify-content-start">
            <h2 class="">Hi,</h2>
            <h5>Welcome to Cortex Vet!</h5>
        </div>--}}
    </a>
</nav>
<main class="main-content mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-start flex-column"
                         style="background-color: #EFE6FB;">
                        <img src="{{ asset('portal/assets/img/Images.png') }}" class="img-fluid mx-auto" width="70%" style="margin-top: 28%" alt="side Image">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 d-flex flex-column ms-lg-auto px-1 me-lg-8 mt-5">
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible " role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                            aria-label="Close">
                                    </button>
                                </div>
                            @endif
                            <div class="">
                                <div class="text-center ">
                                    <img src="{{ asset('portal/assets/img/Forgot Password.png') }}" alt="">
                                    <h3 class="font-weight-bolder text-center mt-3">Set New Password</h3>
                                    <p class=" text-center my-3">Your new password must be different to previously used</p>
                                </div>
                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <input type="hidden" name="email" value="{{ old('email', $request->email) }}">

                                <div class="pt-2">
                                    <div class="col-md-12">
                                        <label class="form-label font-weight-bold" style="font-family: 'Poppins', sans-serif !important">Password</label>
                                        <div class="input-group input-group-outline mb-3">
                                            <input style=" border-radius: 0.375rem; " type="password" name="password" placeholder="******" class="form-control w-100 @error('password') is-invalid @enderror" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                                            <div class="input-group-append">
                                                <span class="input-group-text toggle-password">
                                                    <i class="fa fa-eye"  style="cursor: pointer; padding-right: 8px;"></i>
                                                </span>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label font-weight-bold" style="font-family: 'Poppins', sans-serif !important">Confirm Password</label>
                                        <div class="input-group input-group-outline mb-3">
                                            <input style=" border-radius: 0.375rem; " type="password" name="password_confirmation" placeholder="******" class="form-control w-100 @error('password_confirmation') is-invalid @enderror" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                                            <div class="input-group-append">
                                                <span class="input-group-text toggle-password">
                                                    <i class="fa fa-eye" style="cursor: pointer; padding-right: 8px;"></i>
                                                </span>
                                            </div>
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mt-4 w-90 btn-lg py-2 text-white mb-2">
                                    Reset Password
                                </button>
                            </div>
                            <div class="text-center mt-4">
                                <a href="{{ route('login') }}" class="text-start text-decoration-none" style="color: #41A0B0 !important;">
                                    <i class="fa fa-arrow-left"></i>
                                    <span class="mb-0 px-2" style="color: #41A0B0 !important; font-weight: bold">Back to Login</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!--   Core JS Files   -->
<script src="{{ asset('portal/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('portal/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('portal/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('portal/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<!-- Kanban scripts -->
<script src="{{ asset('portal/assets/js/plugins/dragula/dragula.min.js') }}"></script>
<script src="{{ asset('portal/assets/js/plugins/jkanban/jkanban.js') }}"></script>
<script src="{{ asset('portal/assets/js/plugins/chartjs.min.js') }}"></script>
<script src="{{ asset('portal/assets/js/plugins/world.js') }}"></script>
<script src="{{ asset('portal/assets/js/plugins/datatables.js') }}"></script>
<script>
    document.querySelectorAll('.toggle-password').forEach(function (element) {
        element.addEventListener('click', function () {
            const passwordInput = this.parentElement.previousElementSibling;
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                this.innerHTML = '<i class="fas fa-eye-slash" style="cursor: pointer; padding-right: 8px;"></i>';
            } else {
                passwordInput.type = 'password';
                this.innerHTML = '<i class="fas fa-eye" style="cursor: pointer; padding-right: 8px;"></i>';
            }
        });
    });

    // Function to open a specific tab content
    function openCity(evt, cityName) {
        // your existing code to switch tabs
    }

    // Function to set the default active tab
    window.onload = function () {
        // Get the element with id "defaultOpen" (the first tab button)
        var defaultTabButton = document.getElementById("defaultOpen");

        // Trigger a click event on the default tab button
        defaultTabButton.click();
    };

    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('portal/assets/js/material-dashboard.min.js?v=3.0.5') }}"></script>
</body>

</html>