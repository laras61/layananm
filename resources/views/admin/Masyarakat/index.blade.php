@extends('layouts.admin')

@section('title', 'Halaman Masyarakat')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('header', 'Data Masyarakat')

@section('content')
    <table id="masyarakatTable" class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Telp</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($masyarakat as $k => $v )
                <tr>
                    <td>{{ $k += 1 }}</td>
                    <td>{{ $v->nik }}</td>
                    <td>{{ $v->nama }}</td>
                    <td>{{ $v->username }}</td>
                    <td>{{ $v->telp }}</td>
                    <td>
                        <a href="{{ route('masyarakat.show', $v->nik) }}" class="btn btn-primary bi bi-search"></a>

                        <form action="{{ route('masyarakat.destroy', $v->nik) }}" class="d-inline-block" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('are you sure to delete?')" class="btn btn-danger bi bi-trash" ></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#masyarakatTable').DataTable();
        });
    </script>
@endsection
