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
    $semakan = mysqli_query($con, "SELECT * FROM pelanggan WHERE nomHp='$nomhp' OR email='$email'");
    $detail = mysqli_num_rows($semakan);

    #PASTIKAN TIADA REKOD
    if ($detail == 0) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
        $id = uniqid(); // Generate a unique ID
        mysqli_query($con, "INSERT INTO pelanggan (id, nomHp, email, password, nama, aras) VALUES ('$id', '$nomhp', '$email', '$hashed_password', '$nama', 'PENGGUNA')");
        echo "<script>alert('Pendaftaran berjaya'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Pendaftaran gagal, Nombor HP atau E-mel anda sudah didaftar'); window.location='sign_up.php';</script>";
    }
}
?>