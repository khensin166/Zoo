<?php
    require "connect.php";
    $queryMamalia = mysqli_query($mysqli, "SELECT id_mamalia, nama, deskripsi, gambar FROM mamalia LIMIT 3");
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Siantar Zoo | Home</title>
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="fontawesome/css/all.min.css">
     <link rel="stylesheet" href="css/style.css">
 </head>

 <body>
     <?php require "navbar.php"; ?>

     <!--banner-->
     <div class="container-fluid banner d-flex align-items-center">
         <div class="container text-center text-white">
             <h1>Siantar Zoo</h1>
             <h3>Find the information you want to find here</h3>
             <div class="col-md-8 offset-md-2">
                 <form method="get" action="service.php">
                     <div class="input-group input-group-lg my-4">
                         <input type="text" class="form-control" placeholder="Service Name" aria-label="Service Name" aria-describedby="basic-addon2" name="keyword">
                         <button type="submit" class="btn warna2 text-white">Search</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>

     <!-- highlighted kategori -->
     <div class="container-fluid py-5">
         <div class="container text-center">
             <h3>Favorite Service</h3>

             <div class="row mt-5">
                 <div class="col-md-4 mb-3">
                     <div class="highlighted-kategori kategori-mamalia d-flex justify-content-center align-items-center">
                         <h4 class="text-white"><a href="service.php?facility=ANIMAL GROUP - MAMMALS" class="no-decoration">Mammals</a></h4>
                     </div>
                 </div>
                 <div class="col-md-4 mb-3">
                     <div class="highlighted-kategori kategori-melata d-flex justify-content-center align-items-center">
                         <h4 class="text-white"><a href="service.php?facility=ANIMAL GROUP - CRAWL" class="no-decoration">Crawl</a></h4>
                     </div>
                 </div>
                 <div class="col-md-4 mb-3">
                     <div class="highlighted-kategori kategori-unggas d-flex justify-content-center align-items-center">
                         <h4 class="text-white"><a href="service.php?facility=ANIMAL GROUP - POULTRY" class="no-decoration">Poultry</a></h4>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!--tentang kami-->
     <div class="container-fluid warna3 py-5">
         <div class="container text-center">
             <h3>About Us</h3>
             <p class="fs-5 mt-3">
                 Siantar Zoo merupakan sebuah kebun binatang yang memiliki luas sekitar 12 hektar dan terletak di kota Pematang Siantar, Sumatera Utara, Indonesia.
                 Siantar Zoo menampung berbagai jenis hewan, seperti gajah, harimau, singa, beruang, monyet, dan lain sebagainya.
                 Siantar Zoo menawarkan layanan kunjungan wisatawan yang ingin melihat berbagai jenis hewan di kebun binatang tersebut.
                 Selain itu, Siantar Zoo juga memiliki fasilitas seperti area bermain anak, area parkir, dan restoran untuk memenuhi kebutuhan wisatawan selama berkunjung
             </p>
         </div>
     </div>

     <!--service-->
     <div class="container-fluid py-5">
         <div class="container text-center">
             <h3>Service</h3>
             <div class="row mt-5">
                 <?php while ($mamalia = mysqli_fetch_array($queryMamalia)) { ?>
                     <div class="col-sm-12 col-md-4 mb-3">
                         <div class="card h-100">
                             <div class="image-box">
                                 <img src="image/<?php echo $mamalia['gambar']; ?>" class="card-img-top" alt="...">
                             </div>
                             <div class="card-body">
                                 <h5 class="card-title"><?php echo $mamalia['nama']; ?></h5>
                                 <p class="card-text text-truncate"><?php echo $mamalia['deskripsi']; ?></p>
                                 <a href="service-detail.php?name=<?php echo $mamalia['nama']; ?>   " class="btn warna2 text-white"> See Details </a>
                             </div>
                         </div>
                     </div>
                 <?php } ?>
             </div>
             <a class="btn btn-outline-warning mt-3 " href="mamalia.php"> See More</a>
         </div>
     </div>


     <!-- footer -->

     <?php require "footer.php"; ?>

     <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="fontawesome/js/all.min.js"></script>
 </body>
 </html>