<?php include 'header.php';?>
<!-- PANGGIL MENU -->
<div id="menu">
    <?php include 'menu.php';?>
</div>

<!-- PAPAR DI RUANGAN ISI-->
<div class="row">
    <div id="isi">
        <h3>TAMBAH MEJA BARU</h3>
        <a href="meja.php"><button>Senarai Meja</button></a>
        <form method="POST">
            <p>NOMBOR MEJA</p><br>
            <input type="text" name="noMeja" size="50" autofocus>
            <br>
            <p>KETERANGAN MEJA</p><br>
            <input type="text" name="keterangan" size="50" autofocus>
            <br><br>
            <button name="simpan" type="submit">SIMPAN</button>
        </form>
    </div>
    <?php
    #TERIMA NILAI YANG DI POST
    if (isset($_POST['simpan'])) {
        $data1 = $_POST['noMeja'];
        $data2 = $_POST['keterangan'];
        #PROSES SIMPAN
        mysqli_query($con,"INSERT INTO meja VALUES ('$data1','$data2','Y')");
        echo "<script>alert('Meja berjaya ditambah');
        window.location='meja.php'</script>";
    }
    ?>
</div>