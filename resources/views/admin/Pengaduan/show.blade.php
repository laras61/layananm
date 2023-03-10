@extends('layouts.admin')

@section('title', 'Detail Pengaduan')

@section('css')
    <style>
        .text-primary:hover {
            text-decoration: underline;
        }

        .text-grey {
            color: #6c757d;
        }

        .text-grey:hover {
            color: #6c757d;
        }

        .btn-purple{
            background: #225335;
            border: 1px solid #225335;
            color: #fff;
            width: 100%;
        }
    </style>
@endsection

@section('header')
    <a href="{{ route('pengaduan.index') }}" class="text-primary">Data Pengaduan</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Detail Pengaduan</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header text-white" style="background-color: #8894ac">
                    <div class="text-center">
                        Pengaduan Masyarakat
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>NIK</th>
                                <td>:</td>
                                <td>{{ $pengaduan ->nik}}</td>
                            </tr>
                            <tr>
                                <th>Nama Masyarakat</th>
                                <td>:</td>
                                <td>{{ $masyarakat->nama}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengaduan</th>
                                <td>:</td>
                                <td>{{ $pengaduan->tgl_pengaduan}}</td>
                            </tr>
                            <tr>
                                <th>Foto</th>
                                <td>:</td>
                                <td><img src="{{ Illuminate\Support\Facades\Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan" class='embed-responsive'></td>
                            </tr>
                            <tr>
                                <th>Judul</th>
                                <td>:</td>
                                <td>{{ $pengaduan->judul}}</td>
                            </tr>
                            <tr>
                                <th>Isi Laporan</th>
                                <td>:</td>
                                <td>{{ $pengaduan->isi_laporan}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Kejadian</th>
                                <td>:</td>
                                <td>{{ $pengaduan->tgl_kejadian}}</td>
                            </tr>
                            <tr>
                                <th>Kategori Laporan</th>
                                <td>:</td>
                                <td>
                                    @if ($pengaduan->kategori == 'agama')
                                        <p>Agama</p>
                                    @elseif ($pengaduan->kategori == 'covid')
                                        <p>Corona Virus</p>
                                    @elseif ($pengaduan->kategori == 'kesehatan')
                                        <p>Pelayanan Kesehatan</p>
                                    @elseif ($pengaduan->kategori == 'lalulintas')
                                        <p>Lalu Lintas</p>
                                    @elseif ($pengaduan->kategori == 'lingkungan')
                                        <p>Lingkungan Hidup</p>
                                    @elseif ($pengaduan->kategori == 'dikbud')
                                        <p>Pendidikan dan Kebudayaan</p>
                                    @else
                                        <p>Sosial</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Lokasi Kejadian</th>
                                <td>:</td>
                                <td>{{ $pengaduan->lokasi}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td>
                                    @if ($pengaduan->status == '0')
                                        <a href="#" class="badge badge-danger">Pending</a>
                                    @elseif ($pengaduan->status == 'proses')
                                        <a href="#" class="bagde badge-warning text-white">Proses</a>
                                    @else
                                        <a href="#" class="badge badge-success succes">Selesai</a>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header text-white" style="background-color: #8894ac">
                    <div class="text-center">
                        Tanggapan Petugas
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('tanggapan.createOrUpdate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="input-group mb-3">
                                <select name="status" id="status" class="custom-select">
                                    @if ($pengaduan->status == '0')
                                        <option selected value="0">Pending</option>
                                        <option value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                    @elseif ($pengaduan->status == 'proses')
                                        <option value="0">Pending</option>
                                        <option selected value="proses">Proses</option>
                                        <option value="selesai">Selesai</option>
                                    @else
                                        <option value="0">Pending</option>
                                        <option value="proses">Proses</option>
                                        <option selected value="selesai">Selesai</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggapan">Tanggapan</label>
                            <textarea name="isi_tanggapan" id="isi_tanggapan" rows="4" class="form-control" placeholder="Belum ada tanggapan">{{ $isi_tanggapan->isi_tanggapan ?? '' }}</textarea>
                        </div>
                        <button type="submit" class="btn text-dark" style="background-color: #ddcfb4; width:100%;">KIRIM</button>
                    </form>
                    @if (Illuminate\Support\Facades\Session::has('status'))
                        <div class="alert alert-succes mt-2">
                            {{ Illuminate\Support\Facades\Session::get('status')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
