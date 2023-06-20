<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siantar Zoo | Beranda</title>
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
                        <a class="nav-link" href="">Beranda</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="">Tentang Kami</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('all.konten.wisatwan')}}">Kategori Hewan dan Layanan</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('tickets.showAll')}}">Pesan Tiket</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('orders.show')}}">Pesanan Saya</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('berita.index')}}">Berita SZ</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('saran.create')}}">Saran</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item nav-item me-3">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
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

    <!--banner-->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>Siantar Zoo</h1>
            <div class="ticket-info">
                <p>Tiket umum: Rp. 30.000,-</p>
                <p>Tiket Pelajar: Rp. 20.000,-</p>
                <p>Dibawah 3 tahun: GRATIS</p>
            </div>
            <h6>BUKA SETIAP HARI 09.00 - 17.00 WIB</h6>
            <h3>Jelajahi beragam informasi yang kami sediakan di sini.</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="konten.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Nama Hewan dan Layanan" aria-label="Nama Hewan dan Layanan" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn warna2 text-white">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- highlighted kategori -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Kategori Ter-Ikonik✨</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-mamalia d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="" class="no-decoration">Mamalia</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-melata d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="" class="no-decoration">Melata</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-unggas d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a href="" class="no-decoration">Unggas</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--tentang kami-->
    <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h3>Menjelajahi Dunia Menakjubkan Siantar Zoo: Surga Satwa liar di Sumatera Utara</h3>
            <p class="fs-5 mt-3">Selamat datang di Siantar Zoo, surga satwa liar yang terletak di Sumatera Utara, Indonesia. Di Siantar Zoo, Anda akan diajak untuk menjelajahi dunia menakjubkan yang penuh dengan keajaiban satwa liar.</p>
            <p class="fs-5 mt-3">Dengan luas sekitar 12 hektar, Siantar Zoo menawarkan pengalaman tak terlupakan bagi para pengunjungnya. Di sini, Anda akan menemukan beragam jenis satwa yang menakjubkan, mulai dari gajah yang megah, harimau dan singa yang perkasa, beruang yang menggemaskan, hingga keluarga monyet yang ceria.</p>
            <p class="fs-5 mt-3">Kami memiliki komitmen kuat terhadap kesejahteraan hewan yang kami pelihara. Setiap habitat dirancang dengan teliti untuk menyediakan lingkungan yang mirip dengan habitat alami satwa liar. Dalam kunjungan Anda, Anda akan dapat melihat bagaimana satwa-satwa ini hidup dengan bebas dan nyaman dalam lingkungan yang dirancang khusus untuk mereka.</p>
            <p class="fs-5 mt-3">Selain mengamati satwa liar yang menarik, Siantar Zoo juga menawarkan berbagai fasilitas lain yang akan membuat kunjungan Anda lebih menyenangkan. Anda dapat mengunjungi area bermain anak, di mana anak-anak dapat bermain dan belajar tentang satwa. Kami juga menyediakan area parkir yang luas dan fasilitas restoran untuk memenuhi kebutuhan Anda selama berada di taman.</p>
            <p class="fs-5 mt-3">Selama kunjungan Anda, kami juga menyediakan pemandu yang berpengetahuan luas tentang satwa yang ada di Siantar Zoo. Mereka akan memberikan informasi menarik dan edukatif tentang perilaku satwa, habitat asli, serta upaya konservasi yang kami lakukan.</p>
            <p class="fs-5 mt-3">Kami berharap kunjungan Anda ke Siantar Zoo akan memberikan pengalaman yang mengesankan dan meninggalkan kesan mendalam tentang keindahan dan pentingnya menjaga keanekaragaman hayati. Bergabunglah dengan kami dan jelajahi dunia menakjubkan Siantar Zoo, sebuah surga satwa liar di Sumatera Utara yang tidak akan Anda lupakan.</p>
        </div>
    </div>

    <!--konten-->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Hewan dan Layanan</h3>
            <div class="row mt-5">
                <div class="col-md-4 mb-4">
                    <div class="card h-8">
                        <div class="image-box">
                            <img src="" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text text-truncate">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-outline-warning mt-3 " href="/allkonten">Lihat Lebih Banyak</a>
        </div>
    </div>


    <!-- footer -->

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