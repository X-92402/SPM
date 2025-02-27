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

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Edit Meja</title>
</head>
<body>
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
            $data1 = mysqli_real_escape_string($con, $_POST['noMeja']);
            $data2 = mysqli_real_escape_string($con, $_POST['keterangan']);
            $data3 = mysqli_real_escape_string($con, $_POST['tersedia']);
            
            $stmt = mysqli_prepare($con, "UPDATE meja SET info=?, tersedia=? WHERE noMeja=?");
            mysqli_stmt_bind_param($stmt, "sss", $data2, $data3, $data1);
            mysqli_stmt_execute($stmt);
            
            echo "<script>alert('Kemaskini berjaya'); window.location='meja.php';</script>";
        }
        ?>
    </div>
</body>
</html>