<?php
#SAMBUNG KE P/DATA
require 'database.php';

#TERIMA NILAI YANG DI POST
if (isset($_POST['simpan'])) {
    $gambar=$_FILES['gambar']['name'];
    $data4=$gambar;
    $lokasi="gambar/".$data4;
    $isUploaded=move_uploaded_file($_FILES["gambar"]["tmp_name"],$lokasi);
    $data1 = $_POST['namaProduk'];
    $data2 = $_POST['detail'];
    $data3 = $_POST['harga'];
    #MASUK REKOD KE DALAM TABLE
    $baharu = "INSERT INTO produk
                VALUES (NULL,'$data1','$data2','$data3','$data4')";
    #LAKSANA ARAHAN SQL
    $barangan = mysqli_query($con, $baharu);
    #MESEJ JIKA BERJAYA
    if ($barangan) {
        echo "<script>alert('Tambah produk berjaya');
        window.location='produk.php'</script>";
    }else{
        echo "<script>alert('Gagal tambah produk');
        window.location='produk_baru.php'</script>";
    }
}
?>