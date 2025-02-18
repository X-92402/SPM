<?php
#SEMAK PILIHAN MAKAN
if (isset($_SESSION['cara']) AND isset($_SESSION['meja'])) {
    header("Location: produk_pilih.php");
}
?>

<!-- PAPAR CARA MAKAN -->
<div class="product-card">
    <h2><?php echo "DINE IN";?></h2>
    <p><?php echo "Makan di kedai";?></p>
    <form method="post">
        <input type="hidden" name="cara" value="DINE IN">
        <button name ="hantar" type="submit">PILIH</button>
    </form>
</div>
<div class="product-card">
    <h2><?php echo "TAKE AWAY";?></h2>
    <p><?php echo "Bungkus";?></p>
    <form method="post">
        <input type="hidden" name="cara" value="TAKE-AWAY">
        <button type="submit" name="hantar">PILIH</button>
    </form>
</div>

<!-- PILIHAN DIBUAT -->
<?php
if (isset($_POST['hantar'])) {

    $_SESSION['cara']=$_POST['cara'];
    #JIKA PILIHAN DINE-IN
    if($_SESSION['cara']=='DINE IN') {
        header("Location: meja_pilih.php");
    } else {
        #JIKA PILIHAN TAKE AWAY
        $_SESSION['meja']='TA';
        header("Location: produk_pilih.php");
    }
    exit();
}
?>