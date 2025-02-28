<?php
include 'header.php';
include 'security.php';

$message = '';

if (isset($_POST['tambah'])) {
    $noMeja = mysqli_real_escape_string($con, $_POST['noMeja']);
    $info = mysqli_real_escape_string($con, $_POST['info']);
    if (mysqli_query($con, "INSERT INTO meja (noMeja, info, tersedia) VALUES ('$noMeja', '$info', 'Y')")) {
        $message = 'Meja berjaya ditambah.';
    } else {
        $message = 'Gagal menambah meja.';
    }
}

if (isset($_POST['update'])) {
    $noMeja = mysqli_real_escape_string($con, $_POST['noMeja']);
    $tersedia = mysqli_real_escape_string($con, $_POST['tersedia']);
    if (mysqli_query($con, "UPDATE meja SET tersedia='$tersedia' WHERE noMeja='$noMeja'")) {
        $message = 'Status meja berjaya dikemaskini.';
    } else {
        $message = 'Gagal mengemaskini status meja.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Urus Meja</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Urus Meja</h1>
        </div>
        
        <div id="isi">
            <?php if ($message): ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>

            <form method="POST" class="form">
                <h3>Tambah Meja</h3>
                <input type="text" name="noMeja" placeholder="No Meja" required>
                <input type="text" name="info" placeholder="Info Meja" required>
                <button type="submit" name="tambah">TAMBAH</button>
            </form>

            <h3>Senarai Meja</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>No Meja</th>
                        <th>Info</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = mysqli_query($con, "SELECT * FROM meja");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>".$row['noMeja']."</td>";
                    echo "<td>".$row['info']."</td>";
                    echo "<td>".$row['tersedia']."</td>";
                    echo "<td>
                        <form method='POST' action='meja_urus.php' style='display:inline;'>
                            <input type='hidden' name='noMeja' value='".$row['noMeja']."'>
                            <select name='tersedia'>
                                <option value='Y' ".($row['tersedia'] == 'Y' ? 'selected' : '').">Tersedia</option>
                                <option value='T' ".($row['tersedia'] == 'T' ? 'selected' : '').">Tidak Tersedia</option>
                            </select>
                            <button type='submit' name='update'>Update</button>
                        </form>
                    </td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>