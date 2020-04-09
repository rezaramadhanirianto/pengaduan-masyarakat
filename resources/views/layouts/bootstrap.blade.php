<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
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
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
</head>

<body>


    @if ($message = Session::get('success'))
    <div class="success" data-flashdata="{{ $message }}"></div>
    @endif
    @if ($message = Session::get('failed'))
    <div class="failed" data-flashdata="{{ $message }}"></div>
    @endif
    @yield('content')
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