<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>konten</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

</head>

<style>
    .nodecoration {
        text-decoration: none;
    }

    form div {
        margin-bottom: 10px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                        <a class="nav-link" href="{{ route('kategori.index.admin')}}">Kategori</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="">Konten Kategori</a>
                    </li>
                    <li class="nav-item me-3">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-success" type="submit">Logout</button>
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
                    <a href="" class="no-decoration text-muted">
                        <i class="fas fa-home"></i> Beranda
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Konten Kategori
                </li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6">
            <h3>Tambahkan Daftar Konten Kategori</h3>
            <form action="{{ route('konten.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-control" required>
                        <option value="">Pilih Satu</option>
                        @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="gambar">Pilih Foto (JPG, PNG, GIF)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                </div>
                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control ckeditor"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="add">Simpan</button>
            </form>
        </div>

        <div class="mt-3 mb-5"><hr>
            <h2 class="text-center"><strong>List Konten Kategori</strong></h2><hr>
            <div class="row mt-5">
                @foreach ($konten as $item)
                <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4 p-2">
                            <a href="/public/konten/{{ $item->gambar}}" data-toggle="modal" data-target="#imageModal{{ $item->id }}">
                                <img src="/public/konten/{{ $item->gambar}}" alt="Bukti Pembayaran" width="100%" height="100%">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h6 class="card-title"><strong>{{$item->name}}</strong></h6>
                                <small>{{$item->kategori->name}}</small><br><br>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($item->detail, 15, '...') }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('admin.konten.detail', $item->id)}}" class="btn btn-warning"><i class="fas fa-eye"></i> Detail</a>
                                <a href="{{ route('konten.edit', $item->id)}}" class="btn btn-secondary">Edit</a>
                                <form action="" method="POST" class="d-inline">
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

    </div>


    <script src="../fontawesome/js/all.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.ckeditor'))
            .catch(error => {
                console.error(error);
            });
    </script>


</body>

</html>