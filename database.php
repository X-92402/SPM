<?php
#SET TIME ZONE WAKTU
date_default_timezone_set("Asia/Kuala_Lumpur");
$tarikh=date('Y-m-d H:i:s');


#SETTING DATABASE
$host="localhost";
$user="root";


#NAMA DB, UBAH DI SINI
$db="theramenshop";
$password="";


#SAMBUNGAN PANGKALAN DATA
$con = mysqli_connect($host,$user,$password,$db);


#PAPARAN MSG JIKA SAMBUNGAN GAGAL
if (!$con) {
    die("Database tidak berhubung!:". mysqli_connect_error());
}


#BOLEH UBAH DI SINI
#TETAPAN SISTEM
$namasys = "The Ramen Shop";
$namasys1 = "The Ramen Shop";
$motto = "Best Ramen in the Town";


#BARANGAN YANG DIJUAL
$barang="MAKANAN";
?>