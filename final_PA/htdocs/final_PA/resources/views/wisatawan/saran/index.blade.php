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
                    <div class="card-header">
                        <h2 class="text-center"><strong>Buat Saran Baru</strong></h2>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('saran.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="isi">Isi Saran</label>
                                <textarea class="form-control" id="isi" name="isi" rows="3"></textarea>
                                @error('isi')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>

                            <div class="form-group">
                                <label for="image">Gambar:</label><br>
                                <input type="file" class="form-control-file" id="image" name="image">
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="container">
        <hr>
        <h2 class="text-center">Daftar Saran Siantar Zoo</h2>
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
                                <a href="{{route('saran.showWisatawan', $item->id)}}" class="btn btn-warning"><i class="fas fa-eye"></i> Lihat Detail</a>
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