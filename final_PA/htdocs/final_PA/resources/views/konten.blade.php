<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siantar Zoo | Kategori</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <style>
        .active-link {
            color: #AA8B56;
        }
    </style>
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

    <!-- banner-->
    <div class="container-fluid banner2 d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Kategori Hewan dan Layanan</h1>
        </div>
    </div>

    <!-- body -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-5">
                <h3>Pilih Kategori</h3>
                <ul class="list-group">
                    @foreach ($kategori as $item)
                    <a class="no-decoration" href="">
                        <li class="list-group-item">{{ $item->name }}</li>
                    </a>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-9"><hr>
                <h2 class="text-center"><strong>Daftar Hewan</strong></h2><hr>
                <div class="row">
                    <!-- Menampilkan semua konten -->
                    @foreach ($konten as $item)
                    <div class="col-md-6 mb-4">
                        <div class="card h-8">
                        <div class="image-box p-2">
                            <a href="/public/konten/{{ $item->gambar}}" data-toggle="modal" data-target="#imageModal{{ $item->id }}">
                                <img src="/public/konten/{{ $item->gambar}}" alt="Bukti Pembayaran" width="100%" height="100%">
                            </a>
                        </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <small>{{$item->kategori->name}}</small><br><br>
                                <p class="card-text text-truncate">{{ \Illuminate\Support\Str::limit($item->detail, 50, '...') }}</p>
                                <a href="{{ route('konten.detail', $item->id)}}" class="btn warna2 text-white">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Akhir tampilan konten -->
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-1 content-subscribe text-light">
        <div class="container">
            <h5 class="text-center mb-4">Temukan kami</h5>
            <div class="row justify-content-center">
                <div class="col-sm-1 d-flex justify-content-center">
                    <a href="https://web.facebook.com/tamanhewansiantar/?_rdc=1&_rdr">
                        <i class="fab fa-facebook fs-4"></i> </a>
                </div>
                <div class="col-sm-1 d-flex justify-content-center">
                    <a href="https://www.instagram.com/siantar_zoo/?hl=id">
                        <i class="fab fa-instagram fs-4"></i></a>
                </div>
                <div class="col-sm-1 d-flex justify-content-center">
                    <a href="https://api.whatsapp.com/send?phone=628116717172">
                        <i class="fab fa-whatsapp fs-4"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-1 bg-dark text-light">
        <div class="container d-flex justify-content-between">
            <label>&copy; Siantar Zoo</label>
            <label>Dibuat Oleh Kelompok 5 PA1 D3TI 22</label>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js')}}"></script>
</body>

</html>