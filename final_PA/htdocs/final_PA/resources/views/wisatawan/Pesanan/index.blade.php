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
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Buat Pesanan</div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                            <input type="hidden" name="harga" value="{{ $ticket->harga }}">
                            <input type="hidden" name="user_id" value="{{ auth()->check() ? auth()->user()->id : '' }}">

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div><br>

                            <div class="form-group">
                                <label for="jumlah">Jumlah Tiket</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                            </div><br>

                            <div class="form-group">
                                <label for="harga">Total Harga</label>
                                <input type="text" name="harga" id="harga" class="form-control" readonly>
                                @error('jumlah')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div class="form-group">
                                <label for="waktu_berkunjung">Waktu Berkunjung</label>
                                <input type="date" name="waktu_berkunjung" id="waktu_berkunjung" class="form-control" required>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="gambar_bukti_pembayaran">Gambar Bukti Pembayaran</label><br>
                                <input type="file" name="gambar_bukti_pembayaran" id="gambar_bukti_pembayaran" class="form-control-file" required>
                            </div><br>

                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const jumlahInput = document.getElementById('jumlah');
            const totalHargaInput = document.getElementById('harga');
            const hargaTiket = document.querySelector('[name="harga"]').value; // Get the value from the hidden input field

            // Listening to changes in the jumlah tiket input

            jumlahInput.addEventListener('input', function() {
                const jumlahTiket = parseInt(jumlahInput.value);
                const totalHarga = jumlahTiket * hargaTiket;
                totalHargaInput.value = totalHarga;
            });
        });
    </script>

    <br>
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