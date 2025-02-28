<?php
include 'header.php';

#GET ID FROM URL
$jumpa=$_POST['carian'];

#JIKA ID KOSONG
if($jumpa==NULL) {
    #PAPAR MESEJ JIKA NULL
    echo "<script>alert('SILA TAIP');
    window.location='dashboard.php'</script>";
}
?>

<!-- PANGGIL MENU -->
<div id="menu">
    <?php include 'menu.php';?>
</div>

<!-- PANGGIL ISI -->
<div id="isi">
    <h2 style="text-align:center">HASIL CARIAN</h2>
    <div class="wrapper">
        <?php
        $hasil=("SELECT * FROM produk
                 WHERE namaProduk LIKE '%$jumpa%'
                 ORDER BY namaProduk ASC");
        $papar_query = mysqli_query($con,$hasil);
        if(mysqli_num_rows($papar_query) > 0) {
            foreach($papar_query as $row) {
        ?>
                <div class="product-card">
                    <img src="gambar/<?php echo $row['gambar'];?>" class="product-image">
                    <h4><?php echo $row['namaProduk'];?></h4>
                    <p class="price">RM<?php echo $row['detail'];?></p>
                    <p class="price">RM<?php echo $row['harga'];?></p>
                    <form action="masuk_bakul.php" method="post">
                        <input type="hidden" name="idProduk" value="<?php echo $row['idProduk'];?>">
                        <input type="number" name="ktt" value="1" min="1" size="2">
                        <button type="submit">Pilih</button>
                    </form>
                </div>
            <?php
            }
        } else {
            echo "Maaf, Tiada yang sepadan";
        }   ?>
    </div>
</div>