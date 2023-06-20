<?php
    include_once('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/gallery.css">
    <link rel="stylesheet" href="css/slider.css">
    <script src="js/gallery3.js"></script>
    <title>Gallery</title>
</head>
<body>
    <h1>Gallery</h1>
    <br><br><br><br>
    <div class="main-carousel">
        <div class="cell"><img src="img-1.jpg"></div>
        <div class="cell"><img src="img-2.jpg"></div>
        <div class="cell"><img src="img-1.jpg"></div>
        <div class="cell"><img src="img-2.jpg"></div>
      </div>
    <script src="js/gallery.js"></script>
    <script type="text/javascript">
        $('.main-carousel').flickity({
        cellAlign: 'left',
        wrapAround: true,
        freeScroll: true
        });
    </script>
</body>
</html>