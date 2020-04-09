@extends('layouts.templates')
@section('title')
Admin
@stop
@section('menu')
    Laporan
@stop
@section('report')
    active
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Report</div>
                <div class="card-body">
                    <form action="{{ route('report') }}" method="post" class="row justify-content-center">
                        @csrf
                        <div class="col-lg-4">
                            <input type="date" name="date1" id="date1" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <input type="date" name="date2" id="date2" class="form-control">
                        </div>
                        <div class="col-lg-12 justify-content-center d-flex">
                            <input type="submit" value="Simpan" class="btn btn-primary mt-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop