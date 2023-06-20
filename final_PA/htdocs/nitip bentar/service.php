<?php
require "connect.php";

$queryKategori = mysqli_query($mysqli, "SELECT * FROM mamalia, melata, unggas");

$queryLayanan = null; // inisialisasi variabel

//get layanan by keyword
if (isset($_GET['keyword'])) {
    $queryLayanan = mysqli_query($mysqli, "SELECT * FROM mamalia, melata, unggas, layanan, event WHERE name LIKE '%$_GET[keyword]%'");
}

//get layanan by Kategori
else if (isset($_GET['kategori'])) {
    $queryGetKategoriId = mysqli_query($mysqli, "SELECT id FROM mamalia, melata, unggas, layanan, event WHERE name='$_GET[kategori]'");
    $kategoriId = mysqli_fetch_array($queryGetKategoriId);
    $queryLayanan = mysqli_query($mysqli, "SELECT * FROM informasi, event WHERE kategori_id='$kategoriId[id]'");
}

//get Layanan default
else {
    $queryLayanan = mysqli_query($mysqli, "SELECT * FROM informasi, event");
}


$countData = mysqli_num_rows($queryService);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siantar Zoo | Kategori</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php require "navbar.php"; ?>

    <!-- banner-->
    <div class="container-fluid banner2 d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Kategori</h1>
        </div>
    </div>

    <!-- body -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-5">
                <h3>Kategori</h3>
                <ul class="list-group">
                    <?php while ($kategori = mysqli_fetch_array($queryKategori)) { ?>
                        <a class="no-decoration" href="service.php?kategori=<?php echo $kategori['name'] ?>">
                            <li class="list-group-item"> <?php echo $kategori['name'] ?> </li>
                        </a>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-9">
                <h3 class="text-center mb-3 ">Kategori</h3>
                <div class="row">
                    <?php
                    if ($countData < 1) {
                    ?>
                        <h4 class="text-center my-5">Layanan yang anda cari tidak tersedia</h4>
                    <?php } ?>
                    <?php while ($service = mysqli_fetch_array($queryService)) { ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="image-box">
                                    <img src="image/<?php echo $service['foto']; ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $service['name']; ?></h5>
                                    <p class="card-text text-truncate"> <?php echo $service['detail']; ?> </p>
                                    <a href="service-detail.php?name=<?php echo $service['name']; ?>   " class="btn warna2 text-white"> Lihat lainnya </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!--footer-->
    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>