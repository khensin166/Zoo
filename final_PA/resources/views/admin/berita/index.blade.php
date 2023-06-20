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
                    <i class="fas fa-newspaper"></i> Berita
                </li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <h3 class="text-center"><strong>Tambah Berita</strong>
        </h3>

        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
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
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
            <div class="col-lg-12 mb-3">
                <div class="mb-3">
                    <label class="text-label form-label">Deskripsi*</label>
                    <div class="card-body custom-ekeditor">
                        <div>
                            <textarea cols="30" rows="10" id="deskripsi" class="form-control" name="deskripsi"></textarea>
                        </div>
                    </div>
                </div>
                          
            </div>


            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <div class="container">
        <hr>
        <h3 class="text-center"><strong>Daftar Berita</strong></h3>
        <hr>
        <div class="row">
            @foreach($beritas as $berita)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4 p-2">
                            <a href="/public/berita/{{ $berita->gambar}}" data-toggle="modal" data-target="#imageModal{{ $berita->id }}">
                                <img src="/public/berita/{{ $berita->gambar}}" alt="Bukti Pembayaran" width="100%" height="100%">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h6 class="card-title"><strong>{{ \Illuminate\Support\Str::limit($berita->judul, 50, '...') }}</strong></h6>
                                <p class="card-text">{!! \Illuminate\Support\Str::limit($berita->deskripsi, 150, '...') !!}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('admin.berita.show', $berita->id) }}" class="btn btn-warning"><i class="fas fa-eye"></i> Detail</a>
                                <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-secondary">Edit</a>
                                <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#deskripsi'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>
