<?php
#PAPAR HEADER
include 'header.php';
include 'security.php';
#PANGGIL FUNGSI
include 'fungsi.php';
#JIKA BAKUL ADA ISI
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>

<!-- SUSUNAN -->
<div class="row">
    <!-- PANGGIL MENU -->
    <div id="menu">
        <?php include 'menu.php'; ?>
    </div>
    <!-- RUANGAN PELANGGAN -->
    <div id="isi">
        <?php
        if ($_SESSION['level'] == "PENGGUNA") {
        ?>
            <h3>SELAMAT DATANG <?php echo strtoupper ($_SESSION['nama']);?></h3>
            <hr>
            <!-- PILIH CARA MAKAN -->
            <hr>
            <div class="wrapper">
                <?php include 'pilih_cara.php'; ?>
            </div>
        <?php
        } else {
            #RUANGAN UNTUK ADMIN
            echo "<h3>Selamat Datang Pentadbir Sistem</h3>";
            include 'list_produk.php';
        }
        ?>
    </div>
</div>