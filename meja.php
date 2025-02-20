<?php include 'header.php'; ?>
<!-- PANGGIL MENU -->
<div id="menu">
    <?php include 'menu.php'; ?>
</div>

<!-- PAPAR DI RUANGAN ISI -->
<div class="row">
    <div id="isi">
        <h3>MAKLUMAT MEJA</h3>
        <a href="meja_baru.php"><button>+ Meja</button></a>
        <a href="import_meja.php"><button>+ Import Meja</button></a>
        <table>
            <thead>
                <tr>
                    <th>Bil</th>
                    <th>Nombor Meja</th>
                    <th>Keterangan</th>
                    <th>Tersedia</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sno = 1;
                $meja = mysqli_query($con, "SELECT * FROM meja");
                while ($data1 = mysqli_fetch_assoc($meja)) {
                ?>
                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $data1['noMeja']; ?></td>
                        <td><?php echo $data1['info']; ?></td>
                        <td><?php echo $data1['tersedia'] == 'Y' ? 'Ada' : 'Tiada'; ?></td>
                        <td>
                            <a href="meja_edit.php?id=<?php echo $data1['noMeja']; ?>"><button>EDIT</button></a>
                            <a href="meja_hapus.php?id=<?php echo $data1['noMeja']; ?>"><button>HAPUS</button></a>
                        </td>
                    </tr>
                <?php
                    $sno++;
                }
                mysqli_close($con);
                ?>
            </tbody>
        </table>
        <hr>
    </div>
</div>