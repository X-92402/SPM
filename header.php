<?php
#MULA SESI
session_start();

#SAMBUNG P.DATA
require 'database.php';
?>

<!-- UNTUK RESPONSIVE PAGE -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- PANGGIL CSS EXTERNAL -->
<link rel="icon" type="image/x-icon" href="gambar/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="style.css">
<title><?php echo $namasys;?></title>

<!-- PAPAR NAMA SISTEM DI BANNER -->
<div class="header">
    <br>
        <h1><?php echo $namasys1;?></h1>
        <h3><?php echo $motto;?></h3>
    <!-- PAPAR UTILITI BUTANG ZOOM IN OUT WARNA-->
     <?php include 'utiliti.php'; ?>
</div>