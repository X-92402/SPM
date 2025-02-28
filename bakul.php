<?php
include 'header.php';
include 'fungsi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bakul</title>
</head>
<body>
    <!-- PANGGIL MENU -->
    <div id="menu">
        <?php include 'menu.php'; ?>
    </div>

    <!-- PAPAR ISI -->
    <div class="row">
        <div id="isi">
            <!-- PAPAR UCAPAN -->
            <h3>SELAMAT DATANG <?php echo strtoupper($_SESSION['nama']); ?></h3>
            <hr>
            <?php
            echo "Bilangan jenis " . $barang;
            echo " dalam bakul -> ";
            echo count($_SESSION['cart']);
            ?>
            <hr>
            <!-- PAPAR PAGE -->
            <?php include 'bakul_produk.php'; ?>
        </div>
    </div>
</body>
</html>