<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laporan</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <table class="table table-bordered" border="1">
            <thead>
                <tr>
                    <td>
                        Tanggal
                    </td>
                    <td>
                        NIK
                    </td>
                    <td>
                        Nama
                    </td>
                    <td>
                        Username
                    </td>
                    <td>
                        Laporan
                    </td>
                    <td>
                        Tanggapan
                    </td>
                    <td>
                        Petugas
                    </td>
                    <td>
                        Tanggal Tanggapan
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach($pengaduans as $pengaduan)
                    <tr>
                        <td>
                            {{ $pengaduan->tgl_pengaduan }}
                        </td>
                        <td>
                            {{ $pengaduan->nik }}
                        </td>
                        <td>
                            {{ $pengaduan->user->nama }}
                        </td>
                        <td>
                            {{ $pengaduan->user->username }}
                        </td>
                        <td>
                            {{ $pengaduan->isi_laporan }}
                        </td>
                        <td>
                            {{ $pengaduan->tanggapan->tanggapan }}
                        </td>
                        <td>
                            {{ $pengaduan->tanggapan->petugas->nama_petugas }}
                        </td>
                        <td>
                            {{ $pengaduan->tanggapan->tgl_tanggapan }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</body>
</html>