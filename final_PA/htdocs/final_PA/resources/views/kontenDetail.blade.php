<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siantar Zoo | Detail Kategori</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark warna1">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-3">
                        <a class="nav-link" href="">Beranda</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="">Tentang Kami</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="">Kategori Hewan dan Layanan</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-newspaper"></i> Detail Hewan
                </li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4 p-3">
                    <a href="/public/konten/{{ $konten->gambar}}" data-toggle="modal" data-target="#imageModal{{ $konten->id }}">
                        <img src="/public/konten/{{ $konten->gambar}}" alt="Gambar" width="100%" height="100%">
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title"><strong>{{ $konten->name }}</strong></h4>
                        <small>{{$konten->kategori->name}}</small><br>
                        <p class="card-text">{{ $konten->detail }}</p>
                    </div>
                </div>
            </div>
        </div><br>
        <a href="{{ route('all.konten.wisatwan')}}" class="btn btn-secondary" style="float: right;">Kembali</a>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js')}}"></script>
</body>

</html>