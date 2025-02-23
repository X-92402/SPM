<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Log Masuk - The Ramen House</title>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h3>LOG MASUK</h3>
            <p class="detail">Untuk ruangan pelanggan sedia ada</p>
            <form method="post" action="signin_semak.php">
                <label for="user">Nombor HP:</label>
                <input 
                    type="text"
                    id="user"
                    name="user" 
                    placeholder="TAIP DI SINI" 
                    minLength="10" 
                    maxLength="11"
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57' 
                    required 
                    autofocus 
                />
                <label for="pass">Kata Laluan:</label>
                <input 
                    type="password" 
                    id="pass"
                    name="pass"
                    placeholder="******" 
                    minLength="4" 
                    maxLength="4" 
                    required 
                />
                <button name="hantar" type="submit">SIGN IN</button>
                <button name="reset" type="reset">RESET</button>
            </form>
            <br>
            <h3>DAFTAR BARU</h3>
            <p class="detail">Sila daftar sebagai pelanggan baru jika masih tidak mempunyai akaun</p>
            <a href="sign_up.php"><button>SIGN UP</button></a>
        </div>
    </div>
</body>
</html>