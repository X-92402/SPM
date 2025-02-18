<?php
#SAMBUNG KE DB
require 'database.php';

#DAPATKAN URL
$idDel = $_GET['id'];

#HAPUSKAN REKOD + GAMBAR
$res=mysqli_query($con,
"SELECT * FROM produk
WHERE idProduk='$idDel'");
$row=mysqli_fetch_array($res);
$loc="gambar/".$row['gambar'];
unlink($loc);
mysqli_query($con,
"DELETE FROM produk
WHERE idProduk='$idDel'");

#PAPAR MESEJ
echo "<script>alert('Produk berjaya dihapuskan');
window.location='produk.php'</script>";
?>