<?php include 'header.php';?>

<!-- PAPAR MENU -->
<div id="menu">
    <?php include 'menu.php';?>
</div>

<!-- PAPAR DI RUANGAN ISI -->
<div class="row">
    <div id="isi">
        <h3>PESANAN ANDA TERDAHULU</h3>
        <?php
        $sno = 1;
        $sql = "SELECT * FROM pesanan
                WHERE nomHp='$_SESSION[user]'
                ORDER BY tarikh DESC";
        $result = mysqli_query($con,$sql);
        $semak = mysqli_num_rows($result);
        if (!empty($semak)) {
        ?>
 
            <table>
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Tarikh - Masa</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($data1 = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $sno;?></td>
                            <td><?php echo $data1['tarikh'];?></td>
                            <td><?php echo $data1['status'];?></td>
                            <td>
                                <?php $status=$data1['status'];
                                if($status=="PENDING") {
                                ?>
                                    <a href="hapus_pesanan.php?id=<?php echo $data1['bil'];?>"><button>Batal</button></a>
                                    <a href="pesanan_info.php?id=<?php echo $data1['bil'];?>"><button>Belian</button></a>
                                <?php
                                } else {
                                    echo "<a href='pesanan_info.php?id=$data1[bil]'><button>Belian</button></a>";
                                } ?>
                            </td>
                        </tr>
                        <?php $sno++;
                    } ?>
                </tbody>
            </table>
        <?php
        } else { ?>
            <p>Tiada pesanan wujud</p>
        <?php } ?>
    </div>
</div>