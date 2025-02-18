<div id="menu">
    <?php
    include 'security.php';
    if ($_SESSION['level'] == "ADMIN") {
    ?>
        <!-- ARAS LOGIN - ADMIN -->
        <h4>MENU PENTADBIR</h4>
        <ul>
            <li><a href="dashboard.php">HOME</a></li>
            <li><a href="senarai_pesanan.php">SENARAI PESANAN</a></li>
            <li><a href="produk.php">PRODUK</a></li>
            <li><a href="meja.php">MEJA</a></li>  
            <li><a href="laporan.php">LAPORAN</a></li>
            <li><a href="logout.php">KELUAR</a></li>  
        </ul>
    <?php
    } else {
    ?>

        <!-- ARAS LOGIN - PENGGUNA -->
        <h4>MENU PELANGGAN</h4>
        <ul>
            <li><a href="dashboard.php">HOME</a></li>
            <li><?php include 'produk_cari.php'; ?></li>
            <li><a href="pesanan.php">PESANAN TERDAHULU</a></li>
            <li><a href="logout.php">KELUAR</a></li>
        </ul>
    <?php } ?>
</div>
