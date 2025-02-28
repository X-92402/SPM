<?php
#PAPAR HEADER
include 'header.php';
include 'fungsi.php';
?>

<!-- SUSUNAN -->
<div class="row">
    <!-- PANGGIL MENU -->
    <div id="menu">
        <?php include 'menu.php';?>
    </div>

    <!-- RUANGAN PELANGGAN -->
     <div id="isi">
        <hr>
        <h2>BAKUL: <a href="bakul.php"><?php echo count($_SESSION['cart']);?></a></h2>
        <h4>NOMBOR MEJA:<?php echo $_SESSION['meja'];?></h4>
        <h4><?php echo $_SESSION['cara'];?></h4>
        <hr>
        <div class="wrapper">
            <?php
            #PANGGIL FUNGSI
            $produk = semuaProduk($con);
            while($row = mysqli_fetch_assoc($produk)) {
            ?>
                <div class="product-card">
                    <img src="gambar/<?php echo $row['gambar'];?>" class="product-image">
                    <h4><?php echo $row['namaProduk'];?></h4>
                    <p><?php echo $row['detail'];?></p>
                    <p>HARGA RM<?php echo $row['harga'];?></p>
                    <form action="masuk_bakul.php" method="post">
                        <input type="hidden" name="idProduk" value="<?php echo $row['idProduk'];?>">
                        <input type="number" name="ktt" value="1" min="1" style="width: 30%">
                        <button type="submit">Pilih</button>
                    </form>
                </div>
            <?php
            } ?>
        </div>
    </div>
</div>