@extends('layouts.templates')
@section('title')
User
@stop
@section('menu')
    Home
@stop
@section('home')
    active
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pengaduan Masyarakat</div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data" >
                    @csrf
                        <div class="form-group">
                            <label for="laporan">Laporan</label>
                            <textarea name="laporan" id="laporan" class="form-control @error('laporan') is-invalid @enderror" rows="5"></textarea>
                            @error('laporan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control @error('laporan') is-invalid @enderror">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
