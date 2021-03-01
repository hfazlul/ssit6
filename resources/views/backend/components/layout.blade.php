<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Porto Ecommerce  @yield ('title') </title>
    <!--favicon-->
    <link rel="icon" href="{{asset('/')}}assets/images/favicon-32x32.png" type="image/png" />
    <!-- Vector CSS -->
    <link href="{{asset('/')}}assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!--plugins-->
    <link href="{{asset('/')}}assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{asset('/')}}assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{asset('/')}}assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('/')}}assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{asset('/')}}assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/')}}assets/css/bootstrap.min.css" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('/')}}assets/css/icons.css" />
    <link rel="stylesheet" href="{{asset('/')}}assets/css/font-awesome.css" />
    <!-- App CSS -->
    @yield('css')
    <link rel="stylesheet" href="{{asset('/')}}assets/css/app.css" />
    <link rel="stylesheet" href="ass{{asset('/')}}assets/css/dark-sidebar.css" />
	<link rel="stylesheet" href="{{asset('/')}}assets/css/dark-theme.css" />

</head>

<body>
<!-- wrapper -->
<div class="wrapper">
    <!--sidebar-wrapper-->
    @include('backend.components.sidebar')
    <!--end sidebar-wrapper-->
    <!--header-->
    @include('backend.components.header')
    <!--end header-->
    <!--page-wrapper-->
    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!--end page-content-wrapper-->
    </div>
    <!--end page-wrapper-->

    <div class="overlay toggle-btn-mobile"></div>
    <!--end overlay-->
    <a href="javaScript:;" class="back-to-top" style="display: inline;">
        <i class="bx bxs-up-arrow-alt"></i></a>

    <!--footer -->
    @include('backend.components.footer')
    <!-- end footer -->
</div>
<!--start switcher-->

<!--end switcher-->
<!-- JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('/')}}assets/js/jquery.min.js"></script>
<script src="{{asset('/')}}assets/js/popper.min.js"></script>
<script src="{{asset('/')}}assets/js/bootstrap.min.js"></script>
<!--plugins-->
<script src="{{asset('/')}}assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{asset('/')}}assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{asset('/')}}assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!-- Vector map JavaScript -->
<script src="{{asset('/')}}assets/js/index2.js"></script>
@yield('js')
@yield('js2')
<!-- App JS -->
<script src="{{asset('/')}}assets/js/app.js"></script>
</body>


<!-- Mirrored from codervent.com/syndash/demo/vertical/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Jan 2021 15:52:00 GMT -->
</html>

