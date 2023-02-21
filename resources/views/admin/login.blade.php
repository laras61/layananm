<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <style>
        body {
            background: #feeecd;
        }

        .btn-purple {
            background: #d7b791;
            width: 100%;
            color: #fff;
        }
    </style>

    <title>Halaman Masuk Admin / Petugas</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <h1 class="text-center text-muted mb-0 mt-5">LARAS</h1>
            <h5 class="text-center text-secondary mb-5">Layanan Resmi Aduan Masyarakat</h5>
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="text-center text-secondary mb-5">FORM LOGIN</h2>
                    <form action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Username" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-purple" >MASUK</button>
                    </form>
                </div>
            </div>
            @if (Illuminate\Support\Facades\Session::has('pesan'))
            <div class="alert alert-danger mt-2">
                {{ Illuminate\Support\Facades\Session::get('pesan') }}
            </div>
            @endif
            <a href="{{ route('pekat.index') }}" class="btn text-white mt-3" style="background-color:#2e3d50; width: 100%">Kembali ke Halaman Utama</a>
        </div>
    </div>
</div>

</body>
</html>
