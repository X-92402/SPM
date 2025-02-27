<?php
require 'database.php';
#TERIMA FAIL CSV POST
if(isset($_POST["import"])){
    if(!empty($_FILES['file']['name'])){
        $filename=$_FILES["file"]["tmp_name"];
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE){
            $NM = $getData[0];
            $KT = $getData[1];
            #MASUKKAN DALAM TABLE
            mysqli_query($con,"INSERT INTO meja values ('".$NM."','".$KT."','Y')");
            echo "<script>alert('Import fail CSV berjaya');
            window.location='meja.php'</script>";
        }
        fclose($file);
    }else{
        echo"<script>alert('Import fail CSV gagal');
        window.location='import_meja.php'</script>";
    }
}
?>