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
                        <a class="nav-link" href="">Beranda</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('kategori.index.admin')}}">Kategori</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="">Konten Kategori</a>
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

    <div class="container">
        <hr>
        <h2 class="text-center">Detail Saran Siantar Zoo</h2>
        <hr><br>
        <div class="row">
            @foreach($saran as $item)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4 p-2">
                            <a href="{{ asset('storage/' . $item->image) }}" data-toggle="modal" data-target="#imageModal{{ $item->id }}">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="Saran Image" width="100%" height="100%">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h6 class="card-title"><strong>{{$item->user->name}}</strong></h6>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($item->isi, 30, '...') }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('saran.showAdmin', $item->id)}}" class="btn btn-warning"><i class="fas fa-eye"></i> Lihat Detail</a>
                                <form action="{{ route('admin.saran.destroy', $item->id) }}" method="POST" class="d-inline">
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
</body>

</html>