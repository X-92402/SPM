<?php
include 'database.php';
#TERIMA NILAI YANG DI POST
if (isset($_POST['simpan'])) {
    $data1 = $_POST['idProduk'];
    $data2 = $_POST['namaProduk'];
    $data3 = $_POST['harga'];
    $data4 = $_POST['detail'];

    #PROSES KEMASKINI
    $result1 = mysqli_query($con,
    "UPDATE produk
    SET namaProduk = '$data2', harga='$data3', detail='$data4', gambar=gambar
    WHERE idProduk='$data1'");

    #MESEJ JIKA BERJAYA
    echo "<script>alert('Kemaskini rekod berjaya');
    window.location='produk.php'</script>";
}
?>