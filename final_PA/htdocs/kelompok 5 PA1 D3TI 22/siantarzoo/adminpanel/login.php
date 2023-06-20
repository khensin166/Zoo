<?php
session_start();
require "../connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<style>
    .main {
        height: 100vh;
    }

    .login-box {
        width: 500px;
        height: 300px;
        box-sizing: border-box;
        border-radius: 10px;
    }
</style>

<body>
    <div class="main d-flex justify-content-center align-items-center">
        <div class="login-box p-5 shadow">
            <form action="" method="post">
                <h3 class="mb-4">Login</h3>
                <form action="" method="post">
                    <div>
                        <label for="username">Nama Pengguna</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div>
                        <label for="password">Kata Sandi</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div>
                        <button class="btn btn-success form-control mt-3" name="loginbtn">Masuk</button>
                    </div>
                </form>
        </div>

        <div class="mt-3">
            <?php
            if (isset($_POST['loginbtn'])) {
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);

                $query = mysqli_query($mysqli, "SELECT * FROM users WHERE
                    username='$username'");
                $countdata = mysqli_num_rows($query);
                $data = mysqli_fetch_array($query);

                if ($countdata > 0) {
                    if (password_verify($password, $data['password'])) {
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['login'] = true;
                        header('location: index.php');
                    } else {
            ?>
                        <div class="alert alert-warning" role="alert">
                            Kata Sandi Salah
                        </div>
            <?php
                    }
                } else {
            ?>
                    <div class="alert alert-warning" role="alert">
                        Akun Tidak Tersedia
                    </div>
            <?php
                }
            }
            ?>
        </div>
</body>

</html>
