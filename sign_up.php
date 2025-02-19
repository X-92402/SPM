<?php include 'header.php'; ?>
<html>
<head>
    <style>
        .signup-container {
            display: flex;
            height: 100vh;
        }

        .signup-image {
            flex: 1;
            background-color: var(--light-cream);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
        }

        .signup-form {
            flex: 1;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .signup-form h2 {
            margin-bottom: 20px;
        }

        .signup-form form {
            display: flex;
            flex-direction: column;
            width: 80%;
        }

        .signup-form input {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .signup-form button {
            background-color: var(--primary-red);
            color: var(--light-cream);
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .signup-form button:hover {
            background-color: #8B0000;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="signup-image">
            Gambar 2
        </div>
        <div class="signup-form">
            <h2>PENDAFTARAN</h2>
            <form method="POST" action="signup_simpan.php">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" placeholder="ID" required>
                <label for="password">Kata Laluan</label>
                <input type="password" id="password" name="password" placeholder="Kata Laluan" required>
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Nama" required>
                <label for="nomhp">Nom. HP</label>
                <input type="text" id="nomhp" name="nomhp" placeholder="Nom. HP" required>
                <label for="email">E-mel</label>
                <input type="email" id="email" name="email" placeholder="E-mel" required>
                <button type="submit" name="hantar">DAFTAR</button>
            </form>
        </div>
    </div>
</body>
</html>