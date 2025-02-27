<?php include 'header.php'; ?>

<!-- PANGGIL MENU -->
<div id="menu">
    <?php include 'menu.php'; ?>
</div>

<!-- CETAKAN -->
<div id="printarea">
    <!-- PAPAR DI RUANGAN ISI -->
    <div class="row">
        <div id="isi">
            <h3>LAPORAN JUALAN PRODUK - <?php echo $barang; ?></h3>
            <hr>
            <div class="form-container">
                <form name="form1" method="post">
                    Bulan:
                    <select name="bulan">
                        <option value="">-- PILIH --</option>
                        <?php
                        $bulan = mysqli_query($con, "SELECT MONTH(tarikh) AS month
                                                     FROM pesanan GROUP BY MONTH(tarikh)
                                                     ORDER BY month ASC");
                        echo "<option>-</option>";
                        while ($pilihBulan = mysqli_fetch_array($bulan)) {
                            echo "<option value='$pilihBulan[month]'>$pilihBulan[month]</option>";
                        }
                        ?>
                    </select>
                    <button name="hantar" type="submit">PAPAR</button>
                </form>
            </div>
            <?php
            if (isset($_POST['hantar'])) {
                $bulan = $_POST['bulan'];
                $sno = 1;
                $total = 0;
                # PANGGIL 3 TABLE UNTUK LAPORAN
                $sql = "SELECT * FROM pesanan AS t1
                        INNER JOIN belian AS t2
                        ON t1.bil = t2.bil
                        INNER JOIN produk AS t3
                        ON t2.idProduk = t3.idProduk
                        WHERE MONTH(tarikh) = '$bulan' AND status = 'BAYAR'
                        ORDER BY tarikh DESC";
                $result = mysqli_query($con, $sql);
                $semak = mysqli_num_rows($result);
                if (!empty($semak)) {
                    ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Tarikh</th>
                                <th>Produk</th>
                                <th>Ktt</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($infoD = mysqli_fetch_array($result)) {
                                $subtotal = $infoD['harga'] * $infoD['kuantiti'];
                                $total += $subtotal;
                                ?>
                                <tr>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php echo $infoD['tarikh']; ?></td>
                                    <td><?php echo $infoD['namaProduk']; ?></td>
                                    <td><?php echo $infoD['kuantiti']; ?></td>
                                    <td><?php echo $infoD['harga']; ?></td>
                                    <td><?php $jum1 = $subtotal; echo number_format($jum1, 2); ?></td>
                                </tr>
                                <?php $sno++;
                            } ?>
                        </tbody>
                    </table>
                    <hr>
                    Jumlah Keuntungan Bulan ini adalah RM<?php echo number_format($total, 2); ?>
                    <br>
                    <button onclick='javascript:window.print()'>CETAK</button>
                    <?php
                } else {
                    ?>
                    <p>Tiada rekod ditemui untuk bulan <?php echo $bulan; ?>.</p>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>