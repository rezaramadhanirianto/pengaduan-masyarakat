<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{!! asset('bootstrap/css/bootstrap.min.css') !!}">

    <!-- JS -->
    <script src="{!! asset('js/jquery.min.js') !!}"></script>
    <script src="{!! asset('sweetalert/sweetalert2.all.min.js') !!}"></script>
</head>
<body>
    @if ($message = Session::get('success'))
            <div class="success" data-flashdata="{{ $message }}"></div>
        @endif
        @if ($message = Session::get('failed'))
            <div class="failed" data-flashdata="{{ $message }}"></div>
        @endif
    @yield('content')
    <script src="{!! asset('bootstrap/js/bootstrap.min.js') !!}"></script>
    <script>
    const flashdatas = $('.failed').data('flashdata');
        if(flashdatas){
            swal({
                title: "Failed",
                text: flashdatas,
                type: "error",
            });
        }
        const flashdata = $('.success').data('flashdata');
        if(flashdata){
            swal({
                title: "Success",
                text: flashdata,
                type: "success",
            });
        }
    </script>
</body>
</html>