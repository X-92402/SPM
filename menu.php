<div id="menu">
    <?php
    include 'security.php';
    if ($_SESSION['level'] == "ADMIN") {
    ?>
        <!-- ADMIN MENU -->
        <h4>MENU PENTADBIR</h4>
        <ul>
            <li><a href="admin_dashboard.php">UTAMA</a></li>
            <li><a href="senarai_pesanan.php">PESANAN</a></li>
            <li><a href="produk.php">PRODUK</a></li>
            <li><a href="meja.php">MEJA</a></li>  
            <li><a href="laporan.php">LAPORAN</a></li>
            <li><a href="logout.php">KELUAR</a></li>  
        </ul>
    <?php
    } else {
    ?>
        <!-- USER MENU -->
        <h4>MENU PELANGGAN</h4>
        <ul>
            <li><a href="dashboard.php">UTAMA</a></li>
            <li><a href="produk_pilih.php">PRODUK</a></li>
            <li><a href="bakul.php">BAKUL BELIAN</a></li>
            <li><a href="pesanan.php">PESANAN TERDAHULU</a></li>
            <li><?php include 'produk_cari.php'; ?></li>
            <li><a href="logout.php">KELUAR</a></li>
        </ul>
    <?php } ?>
</div>
