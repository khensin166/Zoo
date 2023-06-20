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
                        <i class="fa fa-box"></i>Konten
                    </a>
                </li>
            </ol>
        </nav>



        <div class="container mt-5">
            <!-- breadcrumb -->
            <div class="my-5 col-12 col-md-6">
                <h3>Edit Konten Kategori</h3>
                <form action="{{ route('konten.update', $konten) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" class="form-control" autocomplete="off" value="{{ $konten->name }}" required>
                    </div>
                    <div>
                        <label for="kategori_id">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-control" required>
                            <option value="">Pilih Satu</option>
                            @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ $kategori->id == $konten->kategori_id ? 'selected' : '' }}>
                                {{ $kategori->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="gambar">Pilih Foto (JPG, PNG, GIF)</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                    <div>
                        <label for="detail">Detail</label>
                        <textarea name="detail" id="detail" cols="30" rows="10" class="form-control ckeditor">{{ $konten->detail }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                </form>
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