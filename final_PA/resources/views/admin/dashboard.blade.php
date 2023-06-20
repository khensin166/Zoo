<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <style>
        .kotak {
            border: solid;
        }

        .summary-kategori {
            background-color: #639969;
            border-radius: 5px;
        }

        .summary-hewandanlayananlainnya {
            background-color: #639969;
            border-radius: 5px;
        }

        .nodecoration {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-3">
                        <a class="nav-link" href="/homeAdmin">Beranda</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('kategori.index.admin')}}">Kategori</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('konten.create')}}">Konten Kategori</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('tickets.index')}}">Ticket</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('orders.index')}}">Pesanan</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('admin.berita.index')}}">Berita</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{route('admin.saran.index')}}">Saran</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item me-3">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a class="nav-link" href="#" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home"></i> Beranda
                </li>
            </ol>
        </nav>
        <h3>Selamat datang {{ Auth::user()->name }}</h3><br>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card summary-kategori">
                    <div class="card-body">
                        <i class="fas fa-align-justify fa-7x text-black-50"></i>
                        <h3 class="card-title text-white fs-2">Kategori</h3>
                        <a href="{{ route('kategori.index.admin')}}" class="card-link text-white nodecoration">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card summary-hewandanlayananlainnya">
                    <div class="card-body">
                        <i class="fa fa-box fa-7x text-black-50"></i>
                        <h3 class="card-title text-white fs-2">Konten Kategori</h3>
                        <a href="{{ route('konten.create')}}" class="card-link text-white nodecoration">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card summary-hewandanlayananlainnya">
                    <div class="card-body">
                        <i class="fa fa-ticket-alt fa-7x text-black-50"></i>
                        <h3 class="card-title text-white fs-2">Ticket</h3>
                        <a href="{{ route('tickets.index')}}" class="card-link text-white nodecoration">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card summary-hewandanlayananlainnya">
                    <div class="card-body">
                        <i class="fa fa-shopping-cart fa-7x text-black-50"></i>
                        <h3 class="card-title text-white fs-2">Pesanan</h3>
                        <a href="{{ route('orders.index')}}" class="card-link text-white nodecoration">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card summary-hewandanlayananlainnya">
                    <div class="card-body">
                        <i class="fa fa-newspaper fa-7x text-black-50"></i>
                        <h3 class="card-title text-white fs-2">Berita</h3>
                        <a href="{{ route('admin.berita.index')}}" class="card-link text-white nodecoration">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card summary-hewandanlayananlainnya">
                    <div class="card-body">
                        <i class="fa fa-comment-alt fa-7x text-black-50"></i>
                        <h3 class="card-title text-white fs-2">Saran</h3>
                        <a href="{{route('admin.saran.index')}}" class="card-link text-white nodecoration">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
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