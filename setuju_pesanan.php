<?php
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomHp = $_POST['nomHp'];
    $status = 'PENDING';
    $meja = ($_SESSION['cara'] === 'TAKE-AWAY') ? null : $_SESSION['meja'];
    $cara = $_SESSION['cara'];
    
    // Define current date (don't rely on global $tarikh)
    $currentDate = date('Y-m-d H:i:s');
    
    // Add record to `pesanan` table
    $sqlPesanan = "INSERT INTO pesanan (tarikh, status, nomHp, noMeja, cara) VALUES (?, ?, ?, ?, ?)";
    $stmtPesanan = mysqli_prepare($con, $sqlPesanan);
    mysqli_stmt_bind_param($stmtPesanan, "sssss", $currentDate, $status, $nomHp, $meja, $cara);
    
    if (!mysqli_stmt_execute($stmtPesanan)) {
        echo "<script>alert('Error: " . mysqli_stmt_error($stmtPesanan) . "'); window.history.back();</script>";
        exit();
    }
    
    $bil = mysqli_insert_id($con);
    mysqli_stmt_close($stmtPesanan);

    // Add record to `belian` table
    $sqlBelian = "INSERT INTO belian (kuantiti, idProduk, bil) VALUES (?, ?, ?)";
    $stmtBelian = mysqli_prepare($con, $sqlBelian);
    foreach ($_SESSION['cart'] as $idProduk => $quantity) {
        mysqli_stmt_bind_param($stmtBelian, "iii", $quantity, $idProduk, $bil);
        mysqli_stmt_execute($stmtBelian);
    }
    mysqli_stmt_close($stmtBelian);

    // Update table status if `meja` is set
    if ($meja !== null) {
        mysqli_query($con, "UPDATE meja SET tersedia='N' WHERE noMeja='$meja'");
    }

    // Clear cart and session variables
    $_SESSION['cart'] = [];
    unset($_SESSION['meja']);
    unset($_SESSION['cara']);

    echo "<script>alert('PESANAN BERJAYA, TERIMA KASIH'); window.location='pesanan.php';</script>";
    exit();
}
?>
