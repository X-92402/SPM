<?php
include 'header.php';
include 'security.php';

if ($_SESSION['level'] !== 'ADMIN') {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><?php echo $namasys1; ?> - Admin Panel</h1>
        </div>
        
        <div id="menu">
            <h4>MENU ADMIN</h4>
            <ul>
                <li><a href="admin_dashboard.php">UTAMA</a></li>
                <li><a href="produk_tambah.php">TAMBAH PRODUK</a></li>
                <li><a href="meja_urus.php">URUS MEJA</a></li>
                <li><a href="laporan.php">LAPORAN</a></li>
                <li><a href="logout.php"><button>LOGOUT</button></a></li>
            </ul>
        </div>

        <div id="isi">
            <h2>Pesanan Terkini</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Tarikh</th>
                        <th>Pelanggan</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = mysqli_query($con, "SELECT p.*, pl.nama FROM pesanan p 
                         JOIN pelanggan pl ON p.nomHp = pl.nomHp 
                         ORDER BY p.tarikh DESC LIMIT 10");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>".$row['bil']."</td>";
                    echo "<td>".$row['tarikh']."</td>";
                    echo "<td>".$row['nama']."</td>";
                    echo "<td>".$row['status']."</td>";
                    echo "<td><a href='pesanan_view.php?id=".$row['bil']."'>Lihat</a></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>