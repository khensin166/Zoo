<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siantar Zoo | Beranda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('all.konten.wisatwan')}}">Kategori Hewan</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('tickets.showAll')}}">Pesan Tiket</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('orders.show')}}">Riwayat Pesanan</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('berita.index')}}">Berita SZ</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('saran.create')}}">Saran</a>
                    </li>
                </ul>
                @php
                $loggedIn = Auth::check(); // Ganti ini dengan logika autentikasi yang sesuai di backend Anda
                @endphp

                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    @if (!$loggedIn)
                    <li class="nav-item nav-item me-3">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @else
                    <li class="nav-item me-3">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a class="nav-link" href="#" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                        </form>
                    </li>
                    @endif
                </ul>

            </div>
        </div>
    </nav><br>

    <hr>
    <h1 class="text-center"><strong>Daftar Tiket</strong></h1>
    <hr><br>
    <!--konten-->
    <div class="container">
        <div class="row">
            @foreach($tickets as $ticket)
            <div class="col-md-6 col-lg-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $ticket->nama }}</h5>
                        <p class="card-text">Harga: {{ $ticket->harga }}</p>
                        <p class="card-text">Stok Tersedia: {{ $ticket->jumlah_stok }}</p>
                    </div>
                    <div class="card-footer">
                        @if ($ticket->jumlah_stok > 0)
                        <a href="{{ route('orders.create', $ticket->id) }}" class="btn btn-success">
                            <i class="fas fa-shopping-cart"></i> Pesan
                        </a>
                        @else
                        <button class="btn btn-success" disabled>
                            <i class="fas fa-shopping-cart"></i> Pesan
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    </div>


    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js')}}"></script>
</body>

</html>