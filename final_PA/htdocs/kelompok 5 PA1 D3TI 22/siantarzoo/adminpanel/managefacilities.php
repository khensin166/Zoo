<?php
require "session.php";
require "../connect.php";

$id = $_GET['id']; // menangkap nilai id dari URL

$query = mysqli_query($mysqli, "SELECT * FROM facility WHERE id='$id'"); // mengganti nilai id pada query SELECT
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <h2 class="text-center">Detail Kategori</h2>

        <div class="col-12 col-md-6 mx-auto">
            <form action="" method="post">
                <div>
                    <label for="facility">Kategori</label>
                    <input type="text" name="facility" id="facility" class="form-control" value="<?php echo $data['name']; ?>">
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary" name="editBtn">Ubah</button>
                    <button type="submit" class="btn btn-danger" name="deleteBtn">Hapus</button>
                </div>
            </form>

            <?php
            if (isset($_POST['editBtn'])) {
                $kategori = htmlspecialchars($_POST['facility']);

                if ($data['name'] == $kategori) {
                    header("Refresh:0; url=facility.php");
                } else {
                    $query = mysqli_query($mysqli, "SELECT * FROM facility WHERE name='$kategori'");
                    $jumlahData = mysqli_num_rows($query);

                    if ($jumlahData > 0) {
            ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Kategori yang ada
                        </div>
                    <?php
                    } else {
                        $query = mysqli_query($mysqli, "UPDATE facility SET name='$kategori' WHERE id='$id'");

                        if ($query) {
                            $message = "Facility has been updated successfully.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            header("Location: facility.php");
                        } else {
                            echo "Failed to update facility";
                        }
                    }
                }
            }

            if (isset($_POST['deleteBtn'])) {
                $queryCheck = mysqli_query($mysqli, "SELECT * FROM service WHERE facility_id='$id'");
                $dataCount = mysqli_num_rows($queryCheck);

                if ($dataCount > 0) {
                    ?>
                    <div class="alert alert-warning   mt-3" role="alert">
                        Kategori tidak dapat dihapus karena sudah digunakan dalam layanan
                    </div>
                <?php
                    die();
                }

                $queryDelete = mysqli_query($mysqli, "DELETE FROM facility WHERE id='$id'");

                if ($queryDelete) {
                ?>
                    <div class="alert alert-primary mt-3" role="alert">
                        Kategori sukses dihapus
                    </div>
            <?php
                    header("Refresh:0; url=facility.php");
                } else {
                    echo mysqli_error($mysqli);
                }
            }

            ?>

        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>