<?php
session_start();

$id = $_SESSION['id'];
$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header("Location: loginadmin.php");
}

// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika dataSiswa diklik maka
if (isset($_POST['dataLapor'])) {
    $output = '';

 // mengambil data siswa dari nis yang berasal dari dataSiswa
    $detail = "SELECT * FROM lapor WHERE id = '" . $_POST['dataLapor'] . "'";
    $result = mysqli_query($con, $detail);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                            <td colspan="2"><img src="image/' . $row['gambar'] . '" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Lokasi Kerusakan dan Tanggal </th>
                            <td width="60%">' . $row['lokasi'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Tanggal Kerusakan</th>
                            <td width="60%">'. date("d M Y", strtotime($row['date'])) . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Deskripsi Kerusakan</th>
                            <td width="60%">' . $row['detail'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">E-Mail</th>
                            <td width="60%">' . $row['email'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
?>