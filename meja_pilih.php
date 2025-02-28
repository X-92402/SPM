<?php
#PAPAR HEADER
include 'header.php';

#MEJA DIPILIH
if (isset($_POST['semak'])) {
    $_SESSION['meja']=$_POST['meja'];
    header ("location:produk_pilih.php");
}
?>

<div class="row">
    <div id="menu">
        <?php include 'menu.php';?>
    </div>
    <div id="isi">
        <hr>
        <h2>PILIH NOMBOR MEJA</h2>
        <hr>
        <div class="wrapper">
            <?php
            $meja=mysqli_query($con,"SELECT * FROM meja");
            while($row = mysqli_fetch_assoc($meja)) {
            ?>
                <div class="product-card">
                    <h2><?php echo $row['noMeja'];?></h2>
                    <p><?php echo $row['info'];?></p>
                    <?php
                    if ($row['tersedia'] == 1) {
                    ?>
                        <form method="post">
                            <input type="hidden" name="meja" value="<?php echo $row['noMeja'];?>">
                            <button name="semak" type="submit">PILIH</button>
                        </form>
                        <?php
                    } else {
                        echo "Sedang Makan";
                    }
                        ?>
                </div>
            <?php 
            } ?>
        </div>
    </div>
</div>