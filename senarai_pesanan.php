<!-- PANGGIL HEADER -->
<?php include 'header.php'; ?>

<!-- PANGGIL MENU -->
<div id="menu">
    <?php include 'menu.php'; ?>
</div>

<!-- PAPAR DI RUANGAN ISI -->
<div class="row">
    <div id="isi">
        <h3>SENARAI PESANAN PELANGGAN</h3>
        <p>Pilih Status Pesanan</p>
        <form method="post">
            <select name="status" onchange="this.form.submit()">
                <option selected value="">--Pilih--</option>
                <option value="Pending">Pending</option>
                <option value="Diproses">Proses</option>
                <option value="Siap">Siap</option>
                <option value="Bayar">Bayar</option>
            </select>
            <noscript><input type="submit" value="Submit" /></noscript>
        </form>

        <?php 
        if (isset($_POST['status'])) {
            $status = $_POST['status'];
            $sno = 1;
            $sql = "SELECT * FROM pesanan AS t1
                    INNER JOIN pelanggan AS t2
                    ON t1.nomHp = t2.nomHp
                    WHERE status = '$status'
                    ORDER BY status DESC, tarikh DESC";
            $result = mysqli_query($con, $sql);
            $semak = mysqli_num_rows($result);

            if (!empty($semak)) { ?>
                <table>
                    <thead>
                        <tr>
                            <th>Bil</th>
                            <th>Tarikh</th>
                            <th>Status</th>
                            <th>Nom HP</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while ($infoD = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $sno; ?></td>
                                <td><?php echo $infoD['tarikh']; ?></td>
                                <td><?php echo $oda = $infoD['status']; ?></td>
                                <td><?php echo $infoD['nomHp']; ?></td>
                                <td>
                                    <?php 
                                    if ($oda == "PENDING") {
                                        echo "<a href='pesanan_info.php?id=$infoD[bil]'>PAPAR</a>";
                                    } elseif ($oda == "DIPROSES") {
                                        echo "<a href='pesanan_info.php?id=$infoD[bil]'>DIPROSES</a>";
                                    } elseif ($oda == "SIAP") {
                                        echo "<a href='pesanan_info.php?id=$infoD[bil]'>SIAP</a>";
                                    } else {
                                        echo "BAYAR";
                                    } ?>
                                </td>
                            </tr>
                            <?php 
                            $sno++;
                        } ?>
                    </tbody>
                </table>
            <?php 
            } else { ?>
                <p>Tiada rekod ditemui untuk status <?php echo $status; ?>.</p>
            <?php 
            } 
        } ?>
    </div>
</div>