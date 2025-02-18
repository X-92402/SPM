<!-- PAPAR HEADER -->
<?php
include 'header.php';
include 'fungsi.php';
?>

<!-- PAPAR DI RUANGAN MENU =-->
<div id="menu">
    <?php include 'signin.php'; ?>
</div>

<!-- PAPAR DI RUANGAN ISI =-->
<div id="isi">
    <h2><?php echo strtoupper ("SELAMAT DATANG KE  ".$namasys1);?></h2>
    <!-- PAPAR MENU PRODUK -->
    <?php include 'list_produk.php';?>
</div>