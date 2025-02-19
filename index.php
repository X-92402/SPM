<!-- PAPAR HEADER -->
<?php
include 'header.php';
include 'fungsi.php';
?>

<div class="login-container">
    <div class="login-image">
        Gambar 1
    </div>
    <div class="login-form">
        <h2>LOG MASUK</h2>
        <form method="post" action="signin_semak.php">
            <label for="user">ID</label>
            <input type="text" id="user" name="user" placeholder="ID" required>
            <label for="pass">Kata Laluan</label>
            <input type="password" id="pass" name="pass" placeholder="Kata Laluan" required>
            <button type="submit" name="hantar">LOGIN</button>
        </form>
        <p>Pengguna Baru?</p>
        <a href="sign_up.php"><button>DAFTAR</button></a>
    </div>
</div>