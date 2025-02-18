<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idProduk = $_POST['idProduk'];
    $qty = $_POST['ktt'];
    if(!isset($_SESSION['cart'][$idProduk])) {
        $_SESSION['cart'][$idProduk] = 0;
    }
    $_SESSION['cart'][$idProduk] += $qty;
}
header('Location: dashboard.php');
exit();
?>