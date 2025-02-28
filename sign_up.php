<?php include 'header.php'; ?>
<html>
    <head>
        <style>
            .warning-text {
                color: red;
            }
            .small-text {
                font-size: 10px;
                color: red;
            }
        </style>
    </head>
    <body>
        <!-- PANGGIL ISI -->
        <div id="isi">
            <h2>PENDAFTARAN PELANGGAN BARU </h2>
            <form method="POST" action="signup_simpan.php">
                <p class="warning-text">
                    *Pastikan maklumat anda betul sebelum membuat pendaftaran.
                </p>
                <p>
                    Nombor HP<br>
                    <input type="text" 
                           name="nomhp" 
                           placeholder="Nombor HP tanpa tanda -" 
                           minLength="9" 
                           maxLength="11"
                           size="30" 
                           onkeypress='return event.charCode >= 48 && event.charCode <= 57' 
                           required 
                           autofocus><br>
                    <span class="small-text">
                        *Password adalah 4 digit di depan nombor HP anda yang dijana secara automatik.
                    </span>
                </p>
                <p>
                    Nama<br>
                    <input type="text" 
                           name="nama" 
                           placeholder="Nama Anda"
                           size="60" 
                           required>
                </p>
                <br>
                <div>
                    <button name="hantar" type="submit">DAFTAR</button>
                    <a href="index.php"><button type="button">BALIK</button></a>
                </div>
            </form>
        </div>
    </body>
</html>