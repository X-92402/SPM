<div class="wrapper">
    <?php
    $products = semuaProduk($con);
    while($row = mysqli_fetch_assoc($products)){
    ?>
        <div class="product-card">
            <img src="gambar/<?php echo $row['gambar'];?>" class="product-image">
            <h4><?php echo $row['namaProduk'];?></h4>
            <p><?php echo $row['detail'];?></p>
            <p>HARGA RM<?php echo number_format($row['harga'], 2);?></p>
        </div>
    <?php } 
    ?>
</div>