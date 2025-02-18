<?php
#MEMANGGIL SEMUA JENIS PRODUK
function semuaProduk($con){
    $sql = "SELECT * FROM produk";
    $result = mysqli_query($con, $sql);
    return $result;
}

#MEMANGGIL PRODUK BERDASARKAN ID PRODUK
function lihatProduk($con, $idProduk){
    $sql = "SELECT * FROM produk WHERE idProduk = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idProduk);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

#KEMASKINI KTT BAHARU DALAM BAKUL
function updateCart($id, $qty){
    if ($qty == 0){
        unset($_SESSION['cart'][$id]);
    } else{
        $_SESSION['cart'][$id] = $qty;
    }
}
?>