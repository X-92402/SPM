<?php
#DECLARE NILAI MULA
$totalAmount = 0;
$totalPrice = 0;
$bil = 1;
?>

<!-- PAPAR PESANAN YANG DIBUAT -->
<?php if (!empty($_SESSION['cart'])){ ?>
    <table>
        <thead>
            <tr>
                <th>Bil.</th>
                <th>Gambar</th>
                <th>Nama Item</th>
                <th>Ktt</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <!-- KIRA HARGA * KUANTITI -->
            <?php 
            foreach ($_SESSION['cart'] as $idProduk => $qty) {
                $produk = lihatProduk($con, $idProduk);
                
                if (!$produk) {
                    // Product no longer exists
                    unset($_SESSION['cart'][$idProduk]);
                    continue;
                }
                
                $totalPrice += $produk['harga'] * $qty;
                $totalAmount += $qty;
            ?>
                <tr>
                    <td><?php echo $bil;?></td>
                    <td><img src="gambar/<?php echo $produk['gambar'];?>" class="product-image"></td>
                    <td><?php echo $produk['namaProduk'];?></td>
                    <td><?php echo $qty;?></td>
                    <td><?php echo $produk['harga'];?></td>
                    <td><?php echo number_format(($produk['harga'] * $qty), 2);?></td>
                    <td>
                        <!--KIRA SEMULA JIKA PERUBAHAN KTT -->
                        <form action="bakul_update.php" method="post">
                            <input type="hidden" name="idProduk" value="<?php echo $idProduk;?>">
                            <input type="number" name="ktt" value="<?php echo $qty;?>" min="1" style="width: 40%">
                            <br>
                            <!-- BUTANG UPDATE -->
                            <button type="submit">UPDATE &check;</button>
                        </form>

                        <!-- BUTANG REMOVE -->
                        <form action="bakul_remove.php" method="post">
                            <input type="hidden" name="idProduk" value="<?php echo $idProduk;?>">
                            <button type="submit">REMOVE &#10005;</button>
                        </form>
                    </td>
                </tr>
            <?php $bil++;
            } ?>
        </tbody>
    </table>

    <!-- PENGESAHAN PESANAN -->
    <h3>Pengesahan Pesanan</h3>
    <p>Jumlah Item:<?php echo $totalAmount;?></p>
    <p>Jumlah Harga:RM<?php echo number_format ($totalPrice, 2);?></p>

    <!-- BUTANG SETUJU BUAT PESANAN -->
    <form action="setuju_pesanan.php" method="post">
        <input type="hidden" name="nomHp" value="<?php echo ($_SESSION['user']);?>">
        <hr>
        <button type="submit">Pesan Sekarang</button>
    </form>
    <a href="produk_pilih.php"><button>Tambah Belian</button></a>
    <a href="reset.php"><button>Reset</button></a>
    <?php
} else { ?>
    <!-- JIKA TIADA PESANAN WUJUD LAGI -->
    <p> Tiada pesanan wujud. Sila pilih dari menu</p><br>
    <a href="dashboard.php"><button>Pilih Item</button></a>
<?php
} ?>