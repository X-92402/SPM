<?php
require 'database.php';

if (isset($_POST['simpan'])) {
    // Validate file upload
    if (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] !== UPLOAD_ERR_OK) {
        echo "<script>alert('Muat naik gambar gagal'); window.location='produk_baru.php';</script>";
        exit();
    }
    
    $gambar = $_FILES['gambar']['name'];
    $lokasi = "gambar/" . $gambar;
    
    // Validate product data
    $data1 = mysqli_real_escape_string($con, $_POST['namaProduk']);
    $data2 = mysqli_real_escape_string($con, $_POST['detail']);
    $data3 = mysqli_real_escape_string($con, $_POST['harga']);
    
    if (empty($data1) || empty($data3)) {
        echo "<script>alert('Semua bidang diperlukan'); window.location='produk_baru.php';</script>";
        exit();
    }
    
    // Upload file
    if (!move_uploaded_file($_FILES["gambar"]["tmp_name"], $lokasi)) {
        echo "<script>alert('Gagal muat naik fail'); window.location='produk_baru.php';</script>";
        exit();
    }
    
    // Insert record
    $stmt = mysqli_prepare($con, "INSERT INTO produk VALUES (NULL,?,?,?,?)");
    mysqli_stmt_bind_param($stmt, "ssds", $data1, $data2, $data3, $gambar);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Tambah produk berjaya'); window.location='produk.php';</script>";
    } else {
        echo "<script>alert('Gagal tambah produk: " . mysqli_error($con) . "'); window.location='produk_baru.php';</script>";
    }
}
?>