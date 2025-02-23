<?php
session_start();
include 'database.php';

if (isset($_POST['hantar'])) {
    #POST VALUE KE P/UBAH
    $user = mysqli_real_escape_string($con, $_POST['user']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);

    #LAKSANA SQL
    $stmt = mysqli_prepare($con, "SELECT * FROM pelanggan WHERE nomHp= ? OR email= ?");
    mysqli_stmt_bind_param($stmt, "ss", $user, $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 0 || $pass !== $row['password']) {
        #MSG JIKA GAGAL
        echo "<script>alert('E-mel atau Kata laluan yang salah'); window.location='index.php';</script>";
    } else {
        #CIPTA SESSION
        $_SESSION['user'] = $row['nomHp'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['level'] = $row['aras'];
        #BUKA DASHBOARD
        if ($row['aras'] == 'ADMIN') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: dashboard.php");
        }
    }
}
?>