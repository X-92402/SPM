<?php include 'header.php';?>
<!-- PANGGIL MENU -->
<div id="menu">
    <?php include 'menu.php';?>
</div>

<!-- PAPAR ISI -->
<div class="row">
    <div id="isi">
        <h2>IMPORT MEJA</h2>
        <label>Pilih lokasi fail CSV:</label>
        <!-- PANGGIL FAIL IMPORT CSV -->
        <form action="import_simpan.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" accept=".csv"><br>
            <button type="submit" name="import" >IMPORT</button>
        </form>
        <u>CONTOH:</u><br>
        D001,MEJA 2 ORANG<br>
        K002,MEJA 6 ORANG
        <p>*Cipta fail dalam notepad++ dan save as import.csv</p>
    </div>
</div>