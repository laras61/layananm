<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    <title>Laporan Pengaduan</title>
</head>
<body>

    <a href="https://ibb.co/7nTy5BF"><img src="https://i.ibb.co/YcKjMJG/Screenshot-49.png" alt="Screenshot-49" border="0" /></a>
    <div class="text-center">
        <h5>Laporan Pengaduan Masyarakat</h5>
        <h5>Kota Bogor</h5>
    </div>

        <table class="table table-sm">
            <thead style="font-size: 12px">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Judul Laporan</th>
                    <th>Isi Laporan</th>
                    <th>Tanggal Kejadian</th>
                    <th>Lokasi</th>
                    <th>Kategori Laporan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody style="font-size: 12px">
                @foreach ($pengaduan as $k => $v)
                    <tr>
                        <td>{{ $k += 1 }}</td>
                        <td>{{ $v->tgl_pengaduan->format('d-M-Y')}}</td>
                        <td>{{ $v->judul}}</td>
                        <td>{{ $v->isi_laporan }}</td>
                        <td>{{ $v->tgl_kejadian->format('d-M-Y')}}</td>
                        <td>{{ $v->lokasi}}</td>
                        <td>
                            @if ($v->kategori == 'agama')
                            <p>Agama</p>
                            @elseif ($v->kategori == 'covid')
                                <p>Corona Virus</p>
                            @elseif ($v->kategori == 'kesehatan')
                                <p>Pelayanan Kesehatan</p>
                            @elseif ($v->kategori == 'lalulintas')
                                <p>Lalu Lintas</p>
                            @elseif ($v->kategori == 'lingkungan')
                                <p>Lingkungan Hidup</p>
                            @elseif ($v->kategori == 'dikbud')
                                <p>Pendidikan dan Kebudayaan</p>
                            @else
                                <p>Sosial</p>
                            @endif
                        </td>
                        <td>{{ $v->status == '0' ? 'Pending' : ucwords($v->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

</body>
</html>
