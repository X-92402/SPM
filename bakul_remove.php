<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idProduk = $_POST['idProduk'];
    unset($_SESSION['cart'][$idProduk]);
}
header('Location: bakul.php');
exit();
?>