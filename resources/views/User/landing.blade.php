@extends('layouts.user')

@section('css')
<link rel="stylesheet" href="{{ asset('css/landing.css') }}">
@endsection

@section('title', 'Laras - Laporan Resmi Aduan Masyarakat')

@section('content')
{{-- Section Header --}}
<section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        {{-- <div class="container"> --}}
            <div class="container-fluid mb-2">
                <a class="navbar-brand " href="#">
                    <div class="d-flex">
                        <img src="images/kota.png" style="width: 5%; height: 10%" alt="icon">
                        <div >
                            <h4 class="semi-bold mb-0 text-white" style="font-size: 20px">LARAS
                            <p class="italic mt-0 text-white">Layanan Resmi Aduan Masyarakat</p>
                        </div>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    @if(Illuminate\Support\Facades\Auth::guard('masyarakat')->check())
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="{{ route('pekat.laporan') }}">{{ Illuminate\Support\Facades\Auth::guard('masyarakat')->user()->nama }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-3 text-white" href="{{ route('pekat.logout') }}"
                                style="text-decoration: underline" onclick="return confirm('Logout Now?')">Logout</a>
                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <button class="btn text-white" type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#loginModal">Masuk</button>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pekat.formRegister') }}" class="btn btn-outline-purple">Daftar</a>
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        {{-- </div> --}}
    </nav>

    <div class="text-center">
        <h2 class=" text-white mt-3">Layanan Pengaduan Masyarakat</h2>
        <h4 class=" text-white">Kota Bogor</h4>
        <p class="italic text-white mb-5">Sampaikan laporan Anda langsung kepada yang pemerintah berwenang</p>
    </div>

    <div class="wave wave1"></div>
    <div class="wave wave2"></div>
    <div class="wave wave3"></div>
    <div class="wave wave4"></div>
</section>
{{-- Section Card Pengaduan --}}
<div class="row justify-content-center">
    <div class="col-lg-6 col-10 col">
        <div class="content shadow">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            @if (Illuminate\Support\Facades\Session::has('pengaduan'))
                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
            @endif

            <form action="{{ route('pekat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group ">
                    <div class="card mb-3">Tulis Laporan Disini</div>
                    <input name="judul" class="form-control mb-2" placeholder="Masukkan Judul Laporan" rows="2">
                    <textarea name="isi_laporan" placeholder="Masukkan Isi Laporan" class="form-control"
                        rows="4">{{ old('isi_laporan') }}</textarea>
                    </div>
                    <input name="tgl_kejadian" type="date" placeholder="Pilih Tanggal Kejadian" class="form-control mt-2"
                        rows="1" onfocusin="(this.type='date')" onfocusout="(this.type='text')">
                    <input name="lokasi" type="text" placeholder="Ketik Lokasi Kejadian" class="form-control mt-2">
                    <div class="input-group mb-3">
                        <select name="kategori" class="custom-select mt-2">
                            <option selected>Pilih Kategori Laporan</option>
                            <option value="agama">Agama</option>
                            <option value="covid">Corona Virus</option>
                            <option value="kesehatan">Pelayanan Kesehatan</option>
                            <option value="lalulintas">Lalu Lintas</option>
                            <option value="lingkungan">Lingkungan Hidup</option>
                            <option value="dikbud">Pendidikan dan Kebudayaan</option>
                            <option value="sosial">Sosial</option>
                        </select>
                    </div>
                <div class="form-group">

                </div>

                <div class="form-group">
                    <input type="file" name="foto" class="form-control">
                </div>
                <button type="submit" class="btn btn-custom mt-2">Kirim</button>
            </form>
        </div>
    </div>
</div>
{{-- Section Hitung Pengaduan --}}
<div class="pengaduan mt-5">
    <div class="bg-purple">
        <div class="text-center">
            <h5 class="medium text-white mt-3">JUMLAH LAPORAN SEKARANG</h5>
            <h2 class="medium text-white">{{$pengaduan}}</h2>
        </div>
    </div>
</div>
{{-- Footer --}}
<div class="mt-3">

    <div class="text-center">
        <p class="italic text-secondary">?? 2023 Larasmlt ??? Aplikasi Pengaduan Masyarakat</p>
    </div>
</div>
{{-- Modal --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="mt-3">Masuk terlebih dahulu</h3>
                <p>Silahkan masuk menggunakan akun yang sudah didaftarkan.</p>
                <form action="{{ route('pekat.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-purple text-white mt-3" style="width: 100%">MASUK</button>
                </form>
                @if (Illuminate\Support\Facades\Session::has('pesan'))
                <div class="alert alert-danger mt-2">
                    {{ Illuminate\Support\Facades\Session::get('pesan') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    @if (Illuminate\Support\Facades\Session::has('pesan'))
    <script>
        $('#loginModal').modal('show');

    </script>
    @endif
@endsection
