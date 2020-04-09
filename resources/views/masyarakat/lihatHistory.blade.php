@extends('layouts.templates')
@section('title')
User
@stop
@section('menu')
    Riwayat
@stop
@section('history')
    active
@stop
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        {{ $pengaduan->tgl_pengaduan }}
                        <a href="#" class="float-right btn btn-@if($pengaduan->status == 'proses')primary @elseif($pengaduan->status == 'selesai')success @else btn-secondary @endif">
                            @if($pengaduan->status == '0')
                                Belum diproses
                            @else
                                {{ $pengaduan->status }}
                            @endif
                        </a>
                    </div>
                    <div class="card-body">
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
                                <textarea name="tanggapan" id="tanggapan" class="form-control" readonly rows="5">
                                    {{ $tanggapan->tanggapan }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop