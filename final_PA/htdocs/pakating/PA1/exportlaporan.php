<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table lapor berdasarkan id secara Descending
$lapor = query("SELECT * FROM lapor ORDER BY id DESC");

// Membuat nama file
$filename = "data laporan kerusakan sarana prasarana-" . date('Ymd') . ".xls";

// Kodingam untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Laporan Kerusakan Sarana & Prasarana IT Del.xls");
?>

<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Lokasi Kerusakan</th>
            <th>Tanggal Lapor</th>
            <th>Detail Kerusakan</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($lapor as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['lokasi']; ?></td>
                <td><?= $row['date']; ?></td>
                <td><?= $row['detail']; ?></td>
                <td><?= $row['email']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>