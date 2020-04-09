@extends('layouts.bootstrap')
@section('title')
    Welcom
@stop
@section('content')
<style>
    body, html{
        overflow: hidden;
        height: 100%;
        margin: 0;
    }
    .back{
        background-image: url('{{ asset('img/backg.jpeg') }}');
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }
</style>
    <div class="back">
        <div class="bg-secondary w-100 h-100" style="opacity: 0.9;">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-lg-12 h-100 d-flex justify-content-center align-items-center">
                        <h1 class="text-white font-weight-bold font-italic text-underline" style="font-size: 70px;">
                            Pengaduan Masyarakat
                            <br>
                            <div class="justify-content-center d-flex w-100">
                                <a href="{{ route('login') }}" class="btn btn-primary m-5">
                                    <h4>Login</h4>
                                </a>
                                <a href="{{ route('register') }}" class="btn btn-primary m-5">
                                    <h4>Register</h4>
                                </a>
                            </div>
                        </h1>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@stop
