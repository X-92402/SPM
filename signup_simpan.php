<?php
require 'database.php';

#TERIMA NILAI YANG DI POST
if (isset($_POST['hantar'])) {
    #TERIMA VALUE YANG DI POST
    $nomhp = mysqli_real_escape_string($con, $_POST['nomhp']);
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    #SEMAK JIKA PASSWORD DAN CONFIRM PASSWORD SAMA
    if ($password !== $confirm_password) {
        echo "<script>alert('Kata laluan tidak sepadan'); window.location='sign_up.php';</script>";
        exit();
    }

    #SEMAK DULU REKOD SEDIA ADA
    $stmt = mysqli_prepare($con, "SELECT * FROM pelanggan WHERE nomHp= ? OR email= ?");
    mysqli_stmt_bind_param($stmt, "ss", $nomhp, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $detail = mysqli_num_rows($result);

    #PASTIKAN TIADA REKOD
    if ($detail == 0) {
        $id = uniqid(); // Generate a unique ID
        $stmt = mysqli_prepare($con, "INSERT INTO pelanggan (id, nomHp, email, password, nama, aras) VALUES (?, ?, ?, ?, ?, 'PENGGUNA')");
        mysqli_stmt_bind_param($stmt, "sssss", $id, $nomhp, $email, $password, $nama);
        mysqli_stmt_execute($stmt);
        echo "<script>alert('Pendaftaran berjaya'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Pendaftaran gagal, Nombor HP atau E-mel anda sudah didaftar'); window.location='sign_up.php';</script>";
    }
}
?>