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
                <h2>Rekaman</h2>
                @foreach($pengaduan as $p)
                    <div class="card">
                        <div class="card-header">
                            {{ $p->tgl_pengaduan }}  
                        </div>
                        <div class="card-body">
                        @if($p->status == "proses")
                            <button disabled="disabled" class="btn btn-primary">{{ $p->status }}</button>
                        @elseif($p->status == "selesai")
                            <button disabled="disabled" class="btn btn-success">{{ $p->status }}</button>
                        @else
                            <button disabled="disabled" class="btn btn-disabled">Belum diproses</button>                    
                        @endif
                        <a href="{{ route('history.lihat', ['id' => $p->id]) }}" class="float-right btn btn-dark">Lihat</a>
                        <br>
                            <div class="m-3">
                                {{ $p->isi_laporan }}
                            </div>  
                        </div>
                    </div>
                @endforeach
                <nav class="Page navigation example bg-white">
                    {{$pengaduan->render()}}    
                </nav>
            </div>
        </div>
    </div>
@stop