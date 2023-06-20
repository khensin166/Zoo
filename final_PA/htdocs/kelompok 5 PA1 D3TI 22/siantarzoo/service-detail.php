<?php
require "connect.php";

$name = htmlspecialchars($_GET['name']);
$queryService = mysqli_query($mysqli, "SELECT * FROM service WHERE name='$name'");
$service = mysqli_fetch_array($queryService);
$queryTerkait = mysqli_query($mysqli, "SELECT * FROM service WHERE facility_id='$service[facility_id]' AND id!='$service[id]' LIMIT 4");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siantar Zoo | Detail Kategori</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php"; ?>

    <!-- detail produk -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-5">
                    <img src="image/<?php echo $service['foto']; ?>" class="w-100" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?php echo $service['name']; ?> </h1>
                    <p class="fs-5">
                        <?php echo htmlspecialchars_decode($service['detail']); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- produk terkait -->
    <div class="container-fluid py-5 warna2">
        <div class="container">
            <h2 class="text-center text-white mb-5">Layanan terkait</h2>

            <div class="row">
                <?php while ($data = mysqli_fetch_array($queryTerkait)) { ?>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <a href="service-detail.php?name=<?php echo $data['name'] ?> ">
                            <img src="image/<?php echo $data['foto']; ?>" class="img-fluid img-thumbnail terkait-image" alt="">
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


    <!--footer-->
    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>