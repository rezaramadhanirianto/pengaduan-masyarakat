<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/metisMenu.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/slicknav.min.css')}}">
    <!-- amchart css -->

    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('templates/typography.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/default-css.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/responsive.css')}}">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- modernizr css -->
    <script src="{{ asset   ('templates/modernizr-2.8.3.min.js')}}"></script>
    <script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">

    <!-- JS -->

    <script src="{!! asset('datatables/datatables.min.js') !!}"></script>
    <script src="{!! asset('datatables/dataTables.bootstrap4.min.js') !!}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <h3 class="text-white">
                        Pengaduan Masyarakat
                    </h3>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            @if(Auth::user()->level == "user")
                            <li class="@yield('home')">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="@yield('history')">
                                <a href="{{ route('history') }}">Riwayat</a>
                            </li>
                            @elseif(Auth::user()->level == "admin")
                            <li class="@yield('admin')">
                                <a href="{{ route('admin') }}">User</a>
                            </li>
                            <li class="@yield('report')">
                                <a href="{{ route('report') }}">Laporan</a>
                            </li>
                            @elseif(Auth::user()->level == "petugas")
                            <li class="@yield('petugas')">
                                <a href="{{ route('petugas') }}">Tanggapan</a>
                            </li>
                            @endif

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">@yield('menu')</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }} > </h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('profil') }}">
                                    {{ __('Ubah Profil') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- overview area start -->
                <div class="row mt-5">
                    @yield('content')
                </div>

            </div>
        </div>
        <!-- main content area end -->

        @if ($message = Session::get('success'))
        <div class="success" data-flashdata="{{ $message }}"></div>
        @endif
        @if ($message = Session::get('failed'))
        <div class="failed" data-flashdata="{{ $message }}"></div>
        @endif

        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.
                </p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- bootstrap 4 js -->
    <script src="{{ asset('templates/popper.min.js')}}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('templates/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('templates/metisMenu.min.js')}}"></script>
    <script src="{{ asset('templates/jquery.slimscroll.min.js')}}"></script>
    <script src="{{ asset('templates/jquery.slicknav.min.js')}}"></script>

    <script src="{{ asset('templates/plugins.js')}}"></script>
    <script src="{{ asset('templates/scripts.js')}}"></script>
    <script>
        $('#table').dataTable();
        const flashdatas = $('.failed').data('flashdata');
        if (flashdatas) {
            swal({
                title: "Failed",
                text: flashdatas,
                icon: "error",
            });
        }
        const flashdata = $('.success').data('flashdata');
        if (flashdata) {
            swal({
                title: "Success",
                text: flashdata,
                icon: "success",
            });
        }
    </script>
</body>

</html>
