<?php
#SAMBUNG KE DB
require 'database.php';

#DAPATKAN URL
$id = $_GET['id'];
mysqli_query($con,
"DELETE FROM meja 
WHERE noMeja='$id'");

#PAPAR MESEJ
echo "<script>alert('Meja berjaya dihapuskan');
window.location='meja.php'</script>";
?>