<?php
  require "session.php";
  require "../connect.php";

  $queryFacility = mysqli_query($mysqli, "SELECT * FROM facility");
  $jumlahFacility = mysqli_num_rows($queryFacility);

  $queryService = mysqli_query($mysqli, "SELECT * FROM service");
  $jumlahService = mysqli_num_rows($queryService);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
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
  <?php require "navbar.php"; ?>
  <div class="container mt-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <i class="fas fa-home"></i>Home
        </li>
      </ol>
    </nav>
    <h2>Halo <?php echo $_SESSION['username']; ?></h2>

    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col">
        <div class="card summary-kategori">
          <div class="card-body">
            <i class="fas fa-align-justify fa-7x text-black-50"></i>
            <h3 class="card-title text-white fs-2">Facitily</h3>
            <p class="card-text text-white fs-4"><?php echo $jumlahFacility; ?> Kategori</p>
            <a href="facility.php" class="card-link text-white nodecoration">Lihat Detail</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card summary-hewandanlayananlainnya">
          <div class="card-body">
            <i class="fa fa-box fa-7x text-black-50"></i>
            <h3 class="card-title text-white fs-2">Service</h3>
            <p class="card-text text-white fs-4">Jumlah: <?php echo $jumlahService; ?></p>
            <a href="service.php" class="card-link text-white nodecoration">Lihat Detail</a>
          </div>
        </div>
      </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>