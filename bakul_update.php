<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idProduk = $_POST['idProduk'];
    $qty = $_POST['ktt'];
    if ($qty > 0) {
        $_SESSION['cart'][$idProduk] = $qty;
    } else {
        unset($_SESSION['cart'][$idProduk]);
    }
}
header('Location: bakul.php');
exit();
?>