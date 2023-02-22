@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

@endsection

@section('header', 'Data Pengaduan')

@section('content')
    <table id="pengaduanTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Laporan</th>
                <th>Judul Laporan</th>
                <th>Isi Laporan</th>
                <th>Tanggal Kejadian</th>
                <th>Lokasi</th>
                <th>Kategori Laporan</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengaduan as $k => $v )
                <tr>
                    <td>{{ $k += 1 }}</td>
                    <td>{{ $v->judul}}</td>
                    <td>{{ $v->tgl_pengaduan->format('d-M-Y')}}</td>
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
                        @elseif ($v->kategori == 'lingkungan')
                            <p>Lingkungan Hidup</p>
                        @elseif ($v->kategori == 'dikbud')
                            <p>Pendidikan dan Kebudayaan</p>
                        @else
                            <p>Sosial</p>
                        @endif
                    </td>
                    <td>
                        @if ($v->status == '0')
                            <a href="#" class="badge badge-danger">Pending</a>
                        @elseif ($v->status == 'proses')
                            <a href="#" class="badge badge-warning text-white">Proses</a>
                        @else
                            <a href="#" class="badge badge-success">Selesai</a>
                        @endif
                    </td>
                    <td><a href="{{ route('pengaduan.show', $v->id_pengaduan) }}" style="text-decoration: underline">Lihat</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#pengaduanTable').DataTable();
        });
    </script>
@endsection
