<?php
include 'header.php';
#DAPATKAN URL
$idProduk = $_GET['id'];
#SELECT TABLE PRODUK
$edit = mysqli_query($con,
"SELECT * FROM produk
WHERE idProduk='$idProduk'");
$data1=mysqli_fetch_array ($edit);
?>

<!-- PANGGIL MENU -->
<div id="menu">
    <?php include 'menu.php';?>
</div>

<!-- PAPAR DI RUANGAN ISI -->
<div class="row">
    <div id="isi">
        <h3>MAKLUMAT PRODUK - <?php echo $barang;?></h3>
        <a href="produk.php"><button>Senarai Produk</button></a>
        <form action="produk_kemaskini.php" method="POST">
            Kod Produk:<br>
            <input type="text" name="idProduk" value="<?php echo $data1['idProduk'];?>" readonly>
            <br>
            Gambar:<br>
            <img src="gambar\<?php echo $data1['gambar'];?>" class="product-image">
            <br>
            Nama:<br>
            <input type="text" name="namaProduk" size="50%" value="<?php echo $data1['namaProduk'];?>">
            <br>
            Harga<br>
            <input type="text" name="harga" size="50%" value="<?php echo number_format($data1['harga'],2);?>">
            <br>
            Detail:<br>
            <textarea name="detail" rows="5" cols="50%"> <?php echo $data1['detail'];?> </textarea>
            <br>
            <hr>
            Tindakan<br>
            <button name="simpan" type="submit">SIMPAN</button>
        </form>
        <?php mysqli_close($con);?>
        <hr>
    </div>
</div>