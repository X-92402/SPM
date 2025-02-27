<?php
include 'database.php';

#DAPATKAN URL
$bil = $_GET['id'];

#PROSES KEMASKINI
$simpan = mysqli_query($con,
"UPDATE pesanan
SET status = 'SIAP'
WHERE bil='$bil'");

if (!$simpan) {
    echo "<script>alert('Error: " . mysqli_error($con) . "');
    window.location='senarai_pesanan.php'</script>";
    exit;
}

#MESEJ JIKA BERJAYA
echo "<script>alert('Pesanan siap diproses');
window.location='senarai_pesanan.php'</script>";
?>