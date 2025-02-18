<?php
include 'header.php';
#DAPATKAN URL
$noMeja = $_GET['id'];

#SAMBUNG KE TABLE MEJA
$data1=mysqli_query($con,
"SELECT * FROM meja
WHERE noMeja='$noMeja'");
$meja=mysqli_fetch_array($data1);
?>

<div id="menu">
    <?php include 'menu.php';?>
</div>
<div class="row">
    <div id="isi">
        <h3>KEMASKINI MEJA</h3>
        <a href="meja.php"><button>Senarai Meja</button></a>
        <form method="POST">
            <p>Nombor Meja</p>
            <input type="text" name="noMeja" value="<?php echo $meja['noMeja'];?>" size="10" autofocus>
            <br>
            <p>Keterangan Meja</p>
            <input type="text" name="keterangan" size="30" value="<?php echo $meja['info'];?>">
            <p>Tersedia</p>
            <input type="text" name="tersedia" size="30" value="<?php echo $meja['tersedia'];?>">
            <br>
            <button type="submit" name="simpan">SIMPAN</button>
            <br>
        </form>
    </div>
    <?php
    #TERIMA NILAI YANG DI POST
    if (isset($_POST['simpan'])) {
        $data1 = $_POST['noMeja'];
        $data2 = $_POST['keterangan'];
        $data3 = $_POST['tersedia'];
        #PROSES KEMASKINI
        $result2 = mysqli_query($con,
        "UPDATE meja SET info='$data2', tersedia='$data3'
        WHERE noMeja='$data1'");
        echo "<script>alert('Kemaskini berjaya');
        window location = 'meja.php'</script>";
    }
    ?>
</div>