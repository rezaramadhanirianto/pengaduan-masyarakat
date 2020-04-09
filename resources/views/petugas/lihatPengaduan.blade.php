@extends('layouts.templates')
@section('title')
Petugas
@stop
@section('menu')
    Petugas
@stop
@section('petugas')
    active
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Lihat Pengaduan
                </div>
                <div class="card-body">
                    <form action="{{ route('tanggapan') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $pengaduan->id }}">
                        <div class="float-right ">
                            {{ $pengaduan->tgl_pengaduan }}
                        </div>

                        Pelapor : {{ $pengaduan->nik }}
                        <div>
                            <div class="row d-flex justify-content-center mt-3 mb-3">
                                <div class="col-lg-4">
                                    <select name="status" id="" class="form-control">
                                        @if($pengaduan->status == "0")
                                            <option value="{{$pengaduan->status}}" selected> Belum Selesai </option>
                                            <option value="proses">Proses</option>
                                            <option value="selesai">Selesai</option>
                                        @elseif($pengaduan->status == "proses")
                                            <option value="{{ $pengaduan->status }}" selected>{{$pengaduan->status}}</option>
                                            <option value="0"> Belum Selesai </option>
                                            <option value="selesai">Selesai</option>
                                        @elseif($pengaduan->status == "selesai")
                                            <option value="{{ $pengaduan->status }}" selected>{{$pengaduan->status}}</option>
                                            <option value="0"> Belum Selesai </option>
                                            <option value="proses">Proses</option>
                                            
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('') }}upload/{{$pengaduan->foto}}" width="50%" alt="">
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-2">
                                Isi Laporan :
                            </div>
                            <div class="col-lg-10 p-1 bg-dark text-white rounded">
                                {{ $pengaduan->isi_laporan }}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-2">
                                Tanggapan :
                            </div>
                            <div class="col-lg-10 p-1 bg-dark text-white rounded form-group">
                                <textarea name="tanggapan" id="tanggapan" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <input type="submit" value="Simpan" class="btn btn-primary mt-3 float-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection