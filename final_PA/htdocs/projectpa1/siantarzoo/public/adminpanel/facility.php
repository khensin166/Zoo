<?php
require "session.php";
require "../connect.php";

$queryFacility = mysqli_query($mysqli, "SELECT * FROM facility");
$jumlahFacility = mysqli_num_rows($queryFacility);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facility</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .nodecoration {
        text-decoration: none;
    }
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel" class="nodecoration text-muted">
                        <i class="fas fa-home"></i>Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Facility
                </li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6">
            <h3>Add Category</h3>
            <form action="" method="post">
                <div>
                    <label for="facility">Facility</label>
                    <input type="text" id="facility" name="facility" placeholder="input facility name" class="form-control">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan_facility">Save</button>
                </div>
            </form>

            <?php
            if (isset($_POST['simpan_facility'])) {
                $facility = htmlspecialchars($_POST['facility']);

                $queryDouble = mysqli_query($mysqli, "SELECT name FROM facility WHERE name='$facility'");
                $jumlahDataKategoriBaru = mysqli_num_rows($queryDouble);

                if ($jumlahDataKategoriBaru > 0) {
            ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Existing Facilities
                    </div>
                    <?php
                } else {
                    $querySimpan = mysqli_query($mysqli, "INSERT INTO facility (name) VALUES ('$facility')");

                    if ($querySimpan) {
                    ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Facility added successfully
                        </div>
            <?php
                        header("Refresh:0; url=facility.php");
                    } else {
                        echo mysqli_error($mysqli);
                    }
                }
            }
            ?>


        </div>

        <div class="mt-3">
            <h2>List Facility</h2>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $number = 1;
                        if ($jumlahFacility == 0) {
                        ?>
                            <tr>
                                <td colspan="3" class="text-center">There is no data facility</td>
                            </tr>
                            <?php
                        } else {
                            while ($data = mysqli_fetch_array($queryFacility)) {
                            ?>
                                <tr>
                                    <td><?php echo $number; ?> </td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td>
                                        <a href="managefacilities.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>manage</a>
                                    </td>
                                </tr>
                        <?php
                                $number++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>