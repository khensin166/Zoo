<?php
require "session.php";
require "../connect.php";

$queryService = mysqli_query($mysqli, "SELECT a.*, b.name AS name_facility FROM service a JOIN facility b ON a.facility_id=b.id");
$jumlahService = mysqli_num_rows($queryService);
$queryFacility = mysqli_query($mysqli, "SELECT * FROM facility");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">

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
    <?php require "navbar.php"; ?>

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel" class="nodecoration text-muted">
                        <i class="fas fa-home"></i>Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Service
                </li>
            </ol>
        </nav>
        <!--tambah service-->
        <div class="my-5 col-12 col-md-6">
            <h3>Add Service List</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <label for="facility">Facility</label>
                    <select name="facility" id="facility" class="form-control" required>
                        <option value="">Pilih Satu</option>
                        <?php
                        while ($data = mysqli_fetch_array($queryFacility)) {
                        ?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="foto">Choose Photo</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="add">Add Service</button>
            </form>
        </div>
        <?php
        if (isset($_POST['add'])) {
            $name = htmlspecialchars($_POST['name']);
            $facility = htmlspecialchars($_POST['facility']);
            $detail = htmlspecialchars($_POST['detail']);

            $target_dir = "../image/";
            $nama_file = basename($_FILES["foto"]["name"]);
            $target_file = $target_dir . $nama_file;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $image_size = $_FILES["foto"]["size"];
            $random_name = substr(md5(mt_rand()), 0, 20);
            $new_name = $random_name . "." . $imageFileType;

            if (empty($name) || empty($facility) || empty($nama_file)) {
        ?>
                <div class="alert alert-warning mt-3" role="alert">
                    All forms must be filled out
                </div>
                <?php
            } else {
                if ($image_size > 5000000) {
                ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        File must not exceed 5 MB
                    </div>
                    <?php
                } else {
                    if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                    ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            File must be in JPG, PNG, or GIF format
                        </div>
                    <?php
                    } else {
                        move_uploaded_file(
                            $_FILES["foto"]["tmp_name"],
                            $target_dir . $new_name
                        );
                    }
                }
                //query insert to service table
                $querySimpan = mysqli_query($mysqli, "INSERT INTO service (facility_id, name, foto, detail) 
                VALUES ('$facility', '$name', '$new_name', '$detail')");

                if ($querySimpan) {
                    ?>
                    <div class="alert alert-primary mt-3" role="alert">
                        Service berhasil disimpan
                    </div>

                    <meta http-equiv="refresh" content="2" ; url="service.php" />
        <?php
                } else {
                    echo mysqli_error($mysqli);
                }
            }
        }
        ?><div class="mt-3 mb-5">
            <h2>List Service</h2>
            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Facility</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($data = mysqli_fetch_array($queryService)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['name_facility']; ?></td>
                                <td>
                                    <a href="manageservice.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>manage</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="../fontawesome/js/all.min.js"></script>