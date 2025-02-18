<?php
session_start();

#KOSONGKAN SEMUA SESSION
$_SESSION['cart'] = [];
unset($_SESSION['cara'], $_SESSION['meja']);

#MESEJ
echo "<script>alert('Mulakan semula');
window.location='dashboard.php'</script>";
exit();
?>