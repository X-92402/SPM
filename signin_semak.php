<?php
session_start();
include 'database.php';

if (isset($_POST['hantar'])) {
    #POST VALUE KE P/UBAH
    $user = mysqli_real_escape_string($con, $_POST['user']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);

    #LAKSANA SQL
    $query = mysqli_query($con, "SELECT * FROM pelanggan WHERE nomHp= '$user' OR email='$user'");
    $row = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) == 0 || !password_verify($pass, $row['password'])) {
        #MSG JIKA GAGAL
        echo "<script>alert('Nombor HP, E-mel atau Kata laluan yang salah'); window.location='index.php';</script>";
    } else {
        #CIPTA SESSION
        $_SESSION['user'] = $row['nomHp'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['level'] = $row['aras'];
        #BUKA DASHBOARD
        header("Location: dashboard.php");
    }
}
?>