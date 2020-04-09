@extends('layouts.template')
@section('title')
    Register
@stop
@section('content')
<style>
.my-auto{
    margin-top: auto;
margin-bottom: auto;
}
</style>
<style>
    body{
        background-image: url('{{ asset('img/bak.jpg') }}');
        width: 100%;
        height: 100%;
        background-size: cover;
    }
</style>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Pengaduan Masyarakat
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('regist') }}">{{ __('Register') }}</a>
                                </li>
                            

                    </ul>
                </div>
            </div>
        </nav>
    <div class="container">
        
        <div class="row mt-5 w-100">
            <div class="mx-auto">
                <a href="{{ route('register') }}" class="btn btn-primary">Daftar sebagai User</a>
                <a href="{{ route('register-admin')}}" class="m-5">&nbsp;</a>
                <a href="{{ route('register-petugas') }}" class="btn btn-primary">Daftar sebagai Petugas</a>  
            </div>
        </div>
        
    </div>  

    

    
@endsection