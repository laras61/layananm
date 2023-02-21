@extends('layouts.admin')

@section('title', 'Halaman Dashboard')

@section('header', 'Dashboard')

@section('content')

    <div class="row">
        <div class="col-lg-3">
            <div class="card border mb-3" style="color: #ABB6C8; max-width: 18rem;">
                <div class="card-header text-white" style="background-color: #ABB6C8;">Petugas</div>
                <div class="card-body">
                    <div class="text-center">
                        {{$petugas}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card border mb-3" style="color: #ABB6C8; max-width: 18rem;">
                <div class="card-header  text-white" style="background-color: #ABB6C8;">Masyarakat</div>
                <div class="card-body">
                    <div class="text-center">
                        {{$masyarakat}}
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
<div class="row">
    <div class="col-lg-3">
        <div class="card border mb-3" style="color: #ABB6C8; max-width: 18rem; ">
            <div class="card-header text-white" style="background-color: #ABB6C8;">Pengaduan Terverifikasi</div>
            <div class="card-body text-center">{{ $pengaduan}}</div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card border mb-3" style="color: #ABB6C8; max-width: 18rem;">
            <div class="card-header  text-white" style="background-color: #ABB6C8;">Pengaduan Proses</div>
            <div class="card-body">
                <div class="text-center">
                    {{$proses}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card border mb-3" style="color: #ABB6C8; max-width: 18rem;">
            <div class="card-header text-white" style="background-color: #ABB6C8;">Pengaduan Selesai</div>
            <div class="card-body">
                <div class="text-center">
                    {{$selesai}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
