<?php
include 'header.php';
include 'security.php';

if (isset($_POST['pesan'])) {
    $idProduk = $_POST['idProduk'];
    $kuantiti = $_POST['kuantiti'];
    $cara = $_POST['cara'];
    $noMeja = ($cara == 'DI') ? $_POST['noMeja'] : null;
    
    mysqli_begin_transaction($con);
    
    try {
        $sql = "INSERT INTO pesanan (tarikh, status, nomHp, noMeja, cara) 
                VALUES (NOW(), 'BARU', ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $_SESSION['user'], $noMeja, $cara);
        mysqli_stmt_execute($stmt);
        $pesananId = mysqli_insert_id($con);
        
        $sql = "INSERT INTO belian (kuantiti, idProduk, bil) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "iii", $kuantiti, $idProduk, $pesananId);
        mysqli_stmt_execute($stmt);
        
        if ($noMeja) {
            mysqli_query($con, "UPDATE meja SET tersedia='T' WHERE noMeja='$noMeja'");
        }
        
        mysqli_commit($con);
        echo "<script>alert('Pesanan berjaya!'); window.location='dashboard.php';</script>";
    } catch (Exception $e) {
        mysqli_rollback($con);
        echo "<script>alert('Ralat!'); window.location='produk_pilih.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Pilih Produk</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Pilih Produk</h1>
        </div>
        
        <div id="isi">
            <div class="product-list">
                <?php
                $query = mysqli_query($con, "SELECT * FROM produk");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<div class='product-item'>";
                    echo "<img src='gambar/".$row['gambar']."' width='200'>";
                    echo "<h3>".$row['namaProduk']."</h3>";
                    echo "<p>".$row['detail']."</p>";
                    echo "<p>RM ".$row['harga']."</p>";
                    
                    echo "<form method='POST'>";
                    echo "<input type='hidden' name='idProduk' value='".$row['idProduk']."'>";
                    echo "<input type='number' name='kuantiti' min='1' value='1' required>";
                    echo "<select name='cara' required onchange='toggleMeja(this)'>";
                    echo "<option value='TA'>Bungkus</option>";
                    echo "<option value='DI'>Makan di kedai</option>";
                    echo "</select>";
                    
                    echo "<select name='noMeja' style='display:none;'>";
                    $meja_query = mysqli_query($con, "SELECT * FROM meja WHERE tersedia='Y'");
                    while ($meja = mysqli_fetch_assoc($meja_query)) {
                        echo "<option value='".$meja['noMeja']."'>".$meja['noMeja']." - ".$meja['info']."</option>";
                    }
                    echo "</select>";
                    
                    echo "<button type='submit' name='pesan'>PESAN</button>";
                    echo "</form>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
    
    <script>
    function toggleMeja(select) {
        var mejaSelect = select.form.noMeja;
        mejaSelect.style.display = select.value === 'DI' ? 'block' : 'none';
        mejaSelect.required = select.value === 'DI';
    }
    </script>
</body>
</html>