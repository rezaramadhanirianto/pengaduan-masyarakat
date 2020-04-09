@extends('layouts.templates')
@section('title')
Admin
@stop
@section('menu')
    User
@stop
@section('admin')
    active
@stop
@section('content')
<style>
    .hidden {
        display: none;
    }
</style>


<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            User
        </div>
        <div class="card-body table-responsive">
            <table id="table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Username</td>
                        <td>Level</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1;@endphp
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                            {{ $user->username }}
                        </td>
                        <td>
                            {{ $user->level }}
                        </td>
                        <td>
                            <form action="{{ route('admin') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                @if($user->verifikasi == '0')
                                <input type="hidden" name="verifikasi" value="1">
                                <input type="submit" class="btn btn-secondary" value="Belum Verifikasi">

                                @else
                                <input type="hidden" name="verifikasi" value="0">
                                <input type="submit" class="btn btn-success" value="Sudah Verifkasi">
                                @endif
                            </form>
                        </td>
                        <td>
                            <button class="btn btn-primary edit" data-id="{{ $user->id }}">Edit</button>
                            <a class="btn btn-danger hapus text-white" onclick="hapus({{ $user->id }})">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.update') }}" method="post">
                @csrf
                <input type="hidden" name="oldusername" id="oldusername" value="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="telp">TELP</label>
                        <input type="text" class="form-control" name="telp" id="telp">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>

    </div>

    <script>
        $('#table').dataTable();

        function hapus(user, ) {
            console.log(user);

            swal({
                    title: 'Hapus',
                    text: 'Apakah kamu yakin',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.location.href = "/admin/hapus/" + user;
                    } else {

                        swal("Cancelled", "Ok, data aman", "error");

                    }
                });
        }
        $('.edit').click(function () {

            var id = $(this).data('id');
            $.ajax({
                url: "admin/edit/" + id,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    $('#oldusername').val(response.username);
                    if (response.nama == null) {
                        $('#telp').parent().removeClass('hidden');
                        $('#nik').parent().addClass('hidden');
                        $('#nama').val(response.nama_petugas);
                        $('#username').val(response.username);
                        $('#telp').val(response.telp);
                    } else {
                        $('#nik').parent().removeClass('hidden');
                        $('#nik').val(response.nik);
                        $('#telp').parent().addClass('hidden');
                        $('#nama').val(response.nama);
                        $('#username').val(response.username);

                    }
                    $('#modelId').modal(true);
                }
            });
        });
    </script>
    @stop