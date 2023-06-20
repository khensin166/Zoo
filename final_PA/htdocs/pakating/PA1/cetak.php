<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table siswa berdasarkan nis secara Descending
$jadwal_kerja = query("SELECT * FROM jadwal_kerja ORDER BY id_jadwal DESC");

?>
<!DOCTYPE html>
<html>
<head>

<style>
    #judul{
        text-align:center;
        font-size:20pt;
        font-weight:bold;
        margin-bottom:20px;
        text-decoration-line: overline;
        text-decoration-color: red;
        font-weight: bold;
    }
    table{
        border-collapse:collapse;
    }
    th{
        padding:5px;
        text-align:center;
        background-color: #FFEBCD;
        color: black;
        font-weight: bold;
    }
    td{
        padding-left:5px;
        padding-right:5px;
    }
</style>
</head>
<body>
    <br>
<div id="judul">LAPORAN JADWAL KERJA</div><br>

<table border="1" align="center">
    <tr>
        <th width="20">No</th>
        <th width="100">Nama Petugas</th>
        <th width="70">Tanggal</th>
        <th width="100">Jam Kerja</th>
        <th width="100">Lokasi Pekerjaan</th>
        <th width="130">Tugas Pekerjaan</th>
</tr>
<?php $no = 1; ?>
<?php foreach ($jadwal_kerja as $row) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['date']; ?></td>
        <td><?= $row['time_start']; ?> - <?= $row['time_end']; ?></td>
        <td><?= $row['lokasi']; ?></td>
        <td><?= $row['tugas']; ?></td>
    </tr>
<?php endforeach; ?>
</table>




