<?php



// Memanggil atau membutuhkan file function.php
require 'function.php';
// Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data Jadwal Kerja berhasil ditambahkan!');
                document.location.href = 'datajadwal.php';
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data Jadwal Kerja gagal ditambahkan!');
            </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title>Data Jadwal Kerja Maintenance Sarana & Prasarana IT Del</title>
</head>
<body>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="admin.php">Admin Sarana dan Prasarana | IT Del</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin.php">Data Lapor Kerusakan</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Data Jadwal
                         </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="datajadwal.php">Data Jadwal Kerja</a></li>
                            <li><a class="dropdown-item" href="addJadwalPemeliharaan.php">Data Jadwal Pemeliharaan</a></li>
                            <li><a class="dropdown-item" href="addSOP.php">Data SOP</a></li>
                            <!-- <li><a class="dropdown-item" href=".php">Something else here</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->

    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Data Jadwal Kerja</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nama Petugas</label>
                        <input type="text" class="form-control w-50" name="nama" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" class="form-control w-50" id="date"  name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="aksi" class="form-label">Waktu Mulai</label>
                        <input type="time" class="form-control w-50"  name="time_start" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="aksi" class="form-label">Waktu Selesai</label>
                        <input type="time" class="form-control w-50"  name="time_end" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lokasi Kerja</label>
                        <input type="text" class="form-control w-50"  name="lokasi" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tugas Pekerjaan</label>
                        <input type="text" class="form-control w-50" name="tugas" autocomplete="off" required>
                    </div>
                    <hr>
                    <a href="datajadwal.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning" name="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>