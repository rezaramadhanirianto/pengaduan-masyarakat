@extends('layouts.templates')
@section('title')
Profile
@stop

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form action="{{ route('profil') }}" method="post" class="container ">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            @if($user->level != 'user')
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ $users->nama_petugas }}" name="nama">
                            @else
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ $users->nama }}" name="nama">
                            @endif
                            @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ $users->username }}" name="username">
                            @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        @if($user->level != "user")
                            <div class="form-group">
                                <label for="telp">Telp</label>
                                <input type="number" class="form-control @error('telp') is-invalid @enderror" value="{{ $users->telp }}" name="telp">
                            </div>
                            @error('telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        @endif
                        <input type="submit" value="Simpan" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
