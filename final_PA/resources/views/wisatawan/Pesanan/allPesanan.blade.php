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
    </nav>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">Daftar Riwayat Pesanan Anda</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jumlah Tiket</th>
                                        <th>Total Harga</th>
                                        <th>Waktu Berkunjung</th>
                                        <th>Gambar Bukti Pembayaran</th>
                                        <th>Status</th>
                                        <th>Nomor Telepon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userOrders as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>{{ $item->waktu_berkunjung }}</td>
                                        <td>
                                            <img src="{{ asset($item->gambar_bukti_pembayaran) }}" alt="Bukti Pembayaran" width="100">
                                        </td>
                                        <td style="word-wrap: break-word;">
                                            @if ($item->status === 'approved')
                                            <span class="badge badge-success" style="background-color: #006400;">Pesanan diterima!<br>Silahkan berkunjung<br>sesuai tanggal<br>pesanan anda!</span>
                                            @elseif ($item->status === 'pending')
                                            <span class="badge badge-warning" style="background-color: orange;">Mohon menunggu</span>
                                            @elseif ($item->status === 'reject')
                                            <span class="badge badge-danger" style="background-color: red;">Pesanan ditolak<br>hubungi kami<br>untuk pengembalian<br>dana!</span>
                                            @else
                                            <span class="badge badge-secondary" style="background-color: gray;">Status tidak valid</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->nomor_telepon }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js')}}"></script>
</body>

</html>