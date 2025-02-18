<?php
require 'database.php';

#TERIMA NILAI YANG DI POST
if (isset($_POST['hantar'])) {
    #TERIMA VALUE YANG DI POST
    $HP = $_POST['nomhp'];
    $NAMA = $_POST['nama'];
    
    #PASSWORD 4 DIGIT DARI KIRI
    $PW = (substr($HP,0,4));

    #SEMAK DULU REKOD SEDIA ADA
    $semakan = mysqli_query($con,
    "SELECT * FROM pelanggan
    WHERE nomHp='$HP'");

    #LAKSANA ATURCARA
    $detail = mysqli_num_rows($semakan);

    #PASTIKAN TIADA REKOD
    if($detail == 0) {
        mysqli_query($con,"INSERT INTO pelanggan VALUE ('$HP','$PW','$NAMA','PENGGUNA')");
        echo "<script>alert('Pendaftaran berjaya \\n Login anda: $HP \\n Katalaluan adalah: $PW');
        window.location='index.php'</script>";
    } else {
        echo "<script>alert('Pendaftaran gagal, Nombor HP anda sudah didaftar');
        window.location='signup.php'</script>";
    }
}
?>