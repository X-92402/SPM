<h3>LOG MASUK</h3>
<p class="detail">Untuk ruangan pelanggan sedia ada</p>

<form method="post" action="signin_semak.php">
    Nombor HP:<br>
    <input 
        type="text"
        name="user" 
        placeholder="TAIP DI SINI" 
        size="11%"
        minLength="10" 
        maxLength="11"
        onkeypress='return event.charCode >= 48 && event.charCode <= 57' 
        required 
        autofocus 
    />
    <br>
    Kata Laluan:<br>
    <input 
        type="password" 
        name="pass"
        placeholder="******" 
        size="11%" 
        minLength="4" 
        maxLength="4" 
        required 
    />
    <br><br>
    <button name="hantar" type="submit">SIGN IN</button>
    <button name="reset" type="reset">RESET</button>
</form>

<br>
<h3>DAFTAR BARU</h3>
<p class="detail">Sila daftar sebagai pelanggan baru jika masih tidak mempunyai akaun</p>
<a href="sign_up.php"><button>SIGN UP</button></a>