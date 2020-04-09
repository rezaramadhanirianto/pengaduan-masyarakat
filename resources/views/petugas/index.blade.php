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
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered data">
                    <thead class="bg-dark text-white">
                        <tr>
                            <td>NO</td>
                            <td>Tgl</td>
                            <td>NIK</td>
                            <td>Status</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    @php $i = 1 @endphp
                    <tbody>
                        @foreach($pengaduan as $p)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$p->tgl_pengaduan}}</td>
                            <td>{{$p->nik}}</td>
                            <td>
                                @if($p->status == '0')
                                    <button class="btn btn-secondary">
                                        Belum Dilihat
                                    </button>
                                @elseif($p->status == "proses")
                                    <button class="btn btn-primary">
                                        {{$p->status}}
                                    </button>
                                @else
                                    <button class="btn btn-success">
                                        {{ $p->status }}
                                    </button>
                                @endif

                            </td>
                            <td>
                                <a href="{{ route('lihat-pengaduan', ['id' => $p->id    ]) }}" class="btn btn-dark">Lihat</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $('#table').dataTable();
</script>
@stop