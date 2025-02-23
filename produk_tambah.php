<?php
include 'header.php';
include 'security.php';

if ($_SESSION['level'] !== 'ADMIN') {
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $detail = mysqli_real_escape_string($con, $_POST['detail']);
    $harga = mysqli_real_escape_string($con, $_POST['harga']);
    
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp_name, "gambar/".$gambar);
    
    mysqli_query($con, "INSERT INTO produk (namaProduk, detail, harga, gambar) 
                VALUES ('$nama', '$detail', '$harga', '$gambar')");
                
    header("Location: admin_dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Tambah Produk Baharu</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Tambah Produk Baharu</h1>
        </div>
        
        <div id="isi">
            <form method="POST" enctype="multipart/form-data" class="form">
                <label>Nama Produk:</label>
                <input type="text" name="nama" required>
                
                <label>Detail:</label>
                <textarea name="detail" required></textarea>
                
                <label>Harga (RM):</label>
                <input type="number" step="0.01" name="harga" required>
                
                <label>Gambar:</label>
                <input type="file" name="gambar" accept="image/*" required>
                
                <button type="submit" name="submit">SIMPAN</button>
            </form>
        </div>
    </div>
</body>
</html>