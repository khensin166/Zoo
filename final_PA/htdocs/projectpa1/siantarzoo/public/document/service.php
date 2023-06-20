<?php
require "connect.php";

$queryFacility = mysqli_query($mysqli, "SELECT * FROM facility");

$queryService = null; // inisialisasi variabel

//get service by keyword
if (isset($_GET['keyword'])) {
    $queryService = mysqli_query($mysqli, "SELECT * FROM service WHERE name LIKE '%$_GET[keyword]%'");
}

//get service by facility
else if (isset($_GET['facility'])) {
    $queryGetFacilityId = mysqli_query($mysqli, "SELECT id FROM facility WHERE name='$_GET[facility]'");
    $facilityId = mysqli_fetch_array($queryGetFacilityId);
    $queryService = mysqli_query($mysqli, "SELECT * FROM service WHERE facility_id='$facilityId[id]'");
}

//get service default
else {
    $queryService = mysqli_query($mysqli, "SELECT * FROM service");
}


$countData = mysqli_num_rows($queryService);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siantar Zoo | Service</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php require "navbar.php"; ?>

    <!-- banner-->
    <div class="container-fluid banner2 d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Service</h1>
        </div>
    </div>

    <!-- body -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-5">
                <h3>Facility</h3>
                <ul class="list-group">
                    <?php while ($facility = mysqli_fetch_array($queryFacility)) { ?>
                        <a class="no-decoration" href="service.php?facility=<?php echo $facility['name'] ?>">
                            <li class="list-group-item"> <?php echo $facility['name'] ?> </li>
                        </a>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-9">
                <h3 class="text-center mb-3 ">Service</h3>
                <div class="row">
                    <?php
                    if ($countData < 1) {
                    ?>
                        <h4 class="text-center my-5">The service you are looking for is not available</h4>
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
                                    <a href="service-detail.php?name=<?php echo $service['name']; ?>   " class="btn warna2 text-white"> See Details </a>
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