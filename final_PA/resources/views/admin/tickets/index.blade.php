<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
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
    <br>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa fa-ticket"></i> Ticket
                </li>
            </ol>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Tambah Tiket Baru
                        </div>
                        <div class="card-body">
                            <form action="{{ route('tickets.store') }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="nama">Nama Tiket</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga Tiket</label>
                                    <input type="number" name="harga" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_stok">Jumlah Stok</label>
                                    <input type="number" name="jumlah_stok" class="form-control" required><br>
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <tbody>
                <hr>
                <h2 class="text-center"><strong>Daftar Tiket</strong></h2>
                <hr>
                @foreach ($tickets as $ticket)
                <tr>
                    <td>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $ticket->nama }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Harga: Rp.{{ $ticket->harga }}</h6>
                                <p class="card-text">Jumlah Stok: {{ $ticket->jumlah_stok }}</p>
                                <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tiket ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </td>
                    <br>
                </tr>
                @endforeach
            </tbody>
        </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js')}}"></script>
</body>

</html>