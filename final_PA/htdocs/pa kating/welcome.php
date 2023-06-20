<?php
include_once('navbar.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>
    <?php echo "<h1>Halo " . $_SESSION['username'] . " sekarang kamu sudah bisa mengisi form report ini!</h1>"; ?>
    <br>
    <fieldset>
    <form action="" method="POST" class="">
    </form>
    </fieldset><br>
    <a href="logout.php">Logout</a>
</body>
</html>