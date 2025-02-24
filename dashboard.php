<?php
#PAPAR HEADER
include 'header.php';
include 'security.php';
#PANGGIL FUNGSI
include 'functions.php';
#JIKA BAKUL ADA ISI
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <!-- PAPAR HEADER -->
        <div class="header">
            <h1><?php echo $namasys1; ?></h1>
            <h3>Selamat Datang, <?php echo strtoupper($_SESSION['nama']); ?></h3>
        </div>

        <!-- PAPAR MENU -->
        <div id="menu">
            <h4>MENU PENGGUNA</h4>
            <ul>
                <li><a href="dashboard.php">UTAMA</a></li>
                <li>Makanan:</li>
                <li>Shoyu Ramen</li>
                <li>Miso Ramen</li>
                <li>Tonkotsu Ramen</li>
                <li><a href="produk_pilih.php"><button>PILIH</button></a></li>
                <li><a href="logout.php"><button>LOGOUT</button></a></li>
            </ul>
        </div>

        <!-- PAPAR ISI -->
        <div id="isi">
            <div class="product-list">
                <?php
                $products = semuaProduk($con);
                if ($products) {
                    while ($row = mysqli_fetch_assoc($products)) {
                ?>
                        <div class="product-item">
                            <div class="product-image" style="background-image: url('gambar/<?php echo $row['gambar']; ?>');"></div>
                            <div class="product-details">
                                <h4><?php echo $row['namaProduk']; ?></h4>
                                <p>HARGA RM<?php echo number_format($row['harga'], 2); ?></p>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>Tiada produk tersedia.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>