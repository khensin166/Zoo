<?php
require "session.php";
require "../connect.php";

$id = $_GET['id'];

$queryManageService = mysqli_query($mysqli, "SELECT a.*, b.name AS name_facility, foto FROM `service` a JOIN facility b ON a.facility_id=b.id WHERE a.id='$id'");
if (!$queryManageService) {
    die("Query error: " . mysqli_error($mysqli));
}
$data = mysqli_fetch_array($queryManageService);

$queryFacility = mysqli_query($mysqli, "SELECT * FROM facility WHERE id!='$data[facility_id]'");

if (isset($_POST['simpan'])) {
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $facility = isset($_POST['facility']) ? htmlspecialchars($_POST['facility']) : '';
    $detail = isset($_POST['detail']) ? htmlspecialchars($_POST['detail']) : '';
    $nama_file = '';

    // Cek apakah ada foto baru yang diunggah
    if (isset($_FILES["foto"]["name"]) && !empty($_FILES["foto"]["name"])) {
        $target_dir = "../image/";
        $nama_file = basename($_FILES["foto"]["name"]);
        $target_file = $target_dir . $nama_file;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $image_size = $_FILES["foto"]["size"];
        $random_name = substr(md5(mt_rand()), 0, 20);
        $new_name = $random_name . "." . $imageFileType;

        // Upload foto baru
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name)) {
            // Hapus foto lama
            unlink($target_dir . $data['foto']);
            $nama_file = $new_name;
        } else {
            die("Upload file failed.");
        }
    } else {
        $nama_file = $data['foto'];
    }

    // Cek apakah gambar baru di-upload atau tidak
    if (!empty($_FILES['foto']['tmp_name'])) {
        $file_size = $_FILES['foto']['size']; // Ambil ukuran file gambar
        $max_size = 5 * 1024 * 1024; // Batas ukuran file (5MB)
        if ($file_size > $max_size) {
            die("Error: Ukuran file melebihi batas maksimum (5MB)");
        }

        // Jika ukuran gambar memenuhi syarat, lakukan update data di tabel service
        $queryUpdate = mysqli_query($mysqli, "UPDATE service SET facility_id='$facility', name='$name', detail='$detail', foto='$nama_file' WHERE id=$id");
        if (!$queryUpdate) {
            die("Query error: " . mysqli_error($mysqli));
        }
    } else {
        // Jika gambar tidak di-upload, lakukan update data di tabel service tanpa mengubah foto
        $queryUpdate = mysqli_query($mysqli, "UPDATE service SET facility_id='$facility', name='$name', detail='$detail' WHERE id=$id");
        if (!$queryUpdate) {
            die("Query error: " . mysqli_error($mysqli));
        }
    }

    // Redirect ke halaman detail service
    header("Location: manageservice.php?id=$id");
    exit();
}

if(isset($_POST['deleteBtn'])){
    $queryDelete = mysqli_query($mysqli, "DELETE FROM service WHERE id='$id'");

    if($queryDelete){
        ?>
            <div class="alert alert-primary mt-3" role="alert">
            service successfully removed
            </div>
        <?php
        header("Refresh:0; url=service.php");
    } else {
        echo mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Service</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

</head>

<style>
    form div {
        margin-bottom: 10px;
    }
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <h2 class="text-center">Detail Service</h2>
        <div class="col-12 col-md-6 mx-auto">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $data['name']; ?>" class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <label for="facility">Facility</label>
                    <select name="facility" id="facility" class="form-control" required>
                        <option value="<?php echo $data['facility_id']; ?>"><?php echo $data['name_facility']; ?></option>
                        <?php while ($data2 = mysqli_fetch_array($queryFacility)) { ?>
                            <option value="<?php echo $data2['id']; ?>"><?php echo $data2['name']; ?></option>
                        <?php } ?>
                    </select>

                </div>
                <div>
                    <label for="currentFoto">Current Photo</label>
                    <img src="../image/<?= $data['foto'] ?>" alt="" width="300px">
                </div>
                <div>
                    <label for="foto">Choose Photo</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"> <?php echo $data['detail']; ?>
                    </textarea>
                </div>
                <div> <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    <button type="submit" class="btn btn-danger" name="deleteBtn">Delete</button>
                </div>
            </form>

            <?php
            $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
            $facility = isset($_POST['facility']) ? htmlspecialchars($_POST['facility']) : '';
            $detail = isset($_POST['detail']) ? htmlspecialchars($_POST['detail']) : '';

            $nama_file = '';
            if (isset($_FILES["foto"]["name"]) && !empty($_FILES["foto"]["name"])) {
                $target_dir = "../image/";
                $nama_file = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = $_FILES["foto"]["size"];
                $random_name = substr(md5(mt_rand()), 0, 20);
                $new_name = $random_name . "." . $imageFileType;
            }

            if (empty($name) || empty($facility) || empty($nama_file)) {
                ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        All forms must be filled out
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
            
                    $queryUpdate = mysqli_query($mysqli, "UPDATE service SET foto='$new_name' WHERE id=$id");
            
                    if ($queryUpdate) {
                    ?>
                        <div class="alert alert-primary mt-3" role="alert">
                            Service successfully updated
                        </div>
                        <meta http-equiv="refresh" content="2; url=service.php" />
                    <?php
                    } else {
                        ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            Error updating service: <?php echo mysqli_error($mysqli); ?>
                        </div>
                        <?php
                    }
                }
            }
            
            ?>
            </form>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>