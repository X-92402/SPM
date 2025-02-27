<?php
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate inputs
    if (!isset($_POST['idProduk']) || !is_numeric($_POST['idProduk'])) {
        echo "<script>alert('ID Produk tidak sah'); window.location='dashboard.php';</script>";
        exit();
    }
    
    if (!isset($_POST['ktt']) || !is_numeric($_POST['ktt']) || $_POST['ktt'] < 1) {
        echo "<script>alert('Kuantiti tidak sah'); window.location='dashboard.php';</script>";
        exit();
    }
    
    $idProduk = (int)$_POST['idProduk'];
    $qty = (int)$_POST['ktt'];
    
    if (!isset($_SESSION['cart'][$idProduk])) {
        $_SESSION['cart'][$idProduk] = 0;
    }
    
    $_SESSION['cart'][$idProduk] += $qty;
    echo "<script>alert('Produk ditambah ke bakul'); window.location='dashboard.php';</script>";
} else {
    header('Location: dashboard.php');
}
exit();
?>