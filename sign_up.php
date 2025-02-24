<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Pendaftaran - The Ramen House</title>
</head>
<body>
    <div class="signup-container">
        <div class="signup-image" style="background-image: url('gambar/Gambar 2.jpg');">
            <!-- Gambar 2 -->
        </div>
        <div class="signup-form">
            <h2>PENDAFTARAN</h2>
            <form method="POST" action="signup_simpan.php">
                <label for="password">Kata Laluan</label>
                <input type="password" id="password" name="password" placeholder="Kata Laluan" required minlength="6">
                <label for="confirm_password">Sahkan Kata Laluan</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Sahkan Kata Laluan" required minlength="6">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Nama" required>
                <label for="nomhp">Nom. HP</label>
                <input type="text" id="nomhp" name="nomhp" placeholder="Nom. HP" required pattern="\d{10,11}" title="Please enter a valid phone number">
                <label for="email">E-mel</label>
                <input type="email" id="email" name="email" placeholder="E-mel" required>
                <button type="submit" name="hantar">DAFTAR</button>
            </form>
            <p>Sudah mempunyai akaun?</p>
            <a href="index.php"><button>LOG MASUK</button></a>
        </div>
    </div>
    <script>
        // Basic client-side validation for password match
        const password = document.getElementById("password");
        const confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value !== confirm_password.value) {
                confirm_password.setCustomValidity("Passwords do not match");
            } else {
                confirm_password.setCustomValidity("");
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
</body>
</html>