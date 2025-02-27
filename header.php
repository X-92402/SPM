<?php
# STANDARDIZED SESSION HANDLING
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

# SAMBUNG P.DATA
require 'database.php';
?>

<!-- UNTUK RESPONSIVE PAGE -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<meta name="description" content="The Ramen House - Best Ramen in Town">
<meta name="keywords" content="Ramen, Japanese Food, Restaurant">
<meta name="author" content="The Ramen House">

<!-- PANGGIL CSS EXTERNAL -->
<link rel="icon" type="image/png" href="gambar/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="style.css">
<title><?php echo $namasys;?></title>