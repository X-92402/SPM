<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Log Masuk - The Ramen House</title>
</head>
<body>
    <div class="login-container">
        <div class="login-image" style="background-image: url('gambar/Gambar 1.jpg');">
            <!-- Gambar 1 -->
        </div>
        <div class="login-form">
            <h2>LOG MASUK</h2>
            <form method="post" action="signin_semak.php">
                <label for="user">E-mel</label>
                <input type="text" id="user" name="user" placeholder="E-mel" required>
                <label for="pass">Kata Laluan</label>
                <input type="password" id="pass" name="pass" placeholder="Kata Laluan" required>
                <button type="submit" name="hantar">LOGIN</button>
            </form>
            <p>Pengguna Baru?</p>
            <a href="sign_up.php"><button>DAFTAR</button></a>
        </div>
    </div>
</body>
</html>