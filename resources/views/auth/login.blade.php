{{--<x-guest-layout>--}}
    {{--<x-auth-card>--}}
        {{--<x-slot name="logo">--}}
            {{--<a href="/">--}}
                {{--<x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
            {{--</a>--}}
        {{--</x-slot>--}}

        {{--<!-- Session Status -->--}}
        {{--<x-auth-session-status class="mb-4" :status="session('status')" />--}}

        {{--<!-- Validation Errors -->--}}
        {{--<x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

        {{--<form method="POST" action="{{ route('login') }}">--}}
            {{--@csrf--}}

            {{--<!-- Email Address -->--}}
            {{--<div>--}}
                {{--<x-label for="email" :value="__('Email')" />--}}

                {{--<x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
            {{--</div>--}}

            {{--<!-- Password -->--}}
            {{--<div class="mt-4">--}}
                {{--<x-label for="password" :value="__('Password')" />--}}

                {{--<x-input id="password" class="block mt-1 w-full"--}}
                                {{--type="password"--}}
                                {{--name="password"--}}
                                {{--required autocomplete="current-password" />--}}
            {{--</div>--}}

            {{--<!-- Remember Me -->--}}
            {{--<div class="block mt-4">--}}
                {{--<label for="remember_me" class="inline-flex items-center">--}}
                    {{--<input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">--}}
                    {{--<span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
                {{--</label>--}}
            {{--</div>--}}

            {{--<div class="flex items-center justify-end mt-4">--}}
                {{--@if (Route::has('password.request'))--}}
                    {{--<a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
                        {{--{{ __('Forgot your password?') }}--}}
                    {{--</a>--}}
                {{--@endif--}}

                {{--<x-button class="ml-3">--}}
                    {{--{{ __('Log in') }}--}}
                {{--</x-button>--}}
            {{--</div>--}}
        {{--</form>--}}
    {{--</x-auth-card>--}}
{{--</x-guest-layout>--}}


        <!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codervent.com/syndash/demo/vertical/authentication-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Jan 2021 15:52:31 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Syndash - Bootstrap4 Admin Template</title>
    <!--favicon-->
    <link rel="icon" href="{{asset('/')}}assets/images/favicon-32x32.png" type="image/png" />
    <!-- loader-->
    <link href="{{asset('/')}}assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{asset('/')}}assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/')}}assets/css/bootstrap.min.css" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('/')}}assets/css/icons.css" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('/')}}assets/css/app.css" />
</head>

<body class="bg-login">
<!-- wrapper -->
<div class="wrapper">
    <div class="section-authentication-login d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="card radius-15">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5">
                                <form action="{{route('staff.login')}}" method="post">
                                    @csrf
                                <div class="text-center">
                                    <img src="{{asset('/')}}assets/images/logo-icon.png" width="80" alt="">
                                    <h3 class="mt-4 font-weight-bold">Welcome Back</h3>
                                </div>
                                <div class="input-group shadow-sm rounded mt-5">
                                    <div class="input-group-prepend">	<span class="input-group-text bg-transparent border-0 cursor-pointer"><img src="{{asset('/')}}assets/images/icons/search.svg" alt="" width="16"></span>
                                    </div>
                                    <input type="button" class="form-control  border-0" value="Log in with google">
                                </div>
                                <div class="login-separater text-center"> <span>OR LOGIN WITH EMAIL</span>
                                    <hr/>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email address" />
                                    @error('email') <b class="text-danger">{{ $message }}</b> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" />
                                    @error('password')<b>{{$message}}</b> @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                            <label class="custom-control-label" for="customSwitch1">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group col text-right"> <a href=" "><i class='bx bxs-key mr-2'></i>Forget Password?</a>
                                    </div>
                                </div>
                                <div class="btn-group mt-3 w-100">
                                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                                    <button type="submit" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
                                    </button>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <p class="mb-0">Don't have an account? <a href="authentication-register.html">Sign up</a>
                                    </p>
                                </div>

                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <img src="{{asset('/')}}assets/images/login-images/login-frent-img.jpg" class="card-img login-img h-100" alt="...">
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper -->
</body>


<!-- Mirrored from codervent.com/syndash/demo/vertical/authentication-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Jan 2021 15:52:31 GMT -->
</html>


