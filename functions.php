<?php
/**
 * Get all products from the database.
 *
 * @param mysqli $con Database connection
 * @return mysqli_result|false Result set or false on failure
 */
function semuaProduk($con) {
    $result = mysqli_query($con, "SELECT * FROM produk");
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    return $result;
}

/**
 * Get orders for a specific customer.
 *
 * @param mysqli $con Database connection
 * @param string $nomHp Customer phone number
 * @return mysqli_result|false Result set or false on failure
 */
function dapatPesanan($con, $nomHp) {
    $result = mysqli_query($con, "SELECT p.*, pr.namaProduk, b.kuantiti 
                              FROM pesanan p 
                              JOIN belian b ON p.bil = b.bil
                              JOIN produk pr ON b.idProduk = pr.idProduk
                              WHERE p.nomHp = '$nomHp'
                              ORDER BY p.tarikh DESC");
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    return $result;
}

/**
 * Get total sales amount.
 *
 * @param mysqli $con Database connection
 * @return float Total sales amount
 */
function totalJualan($con) {
    $result = mysqli_query($con, "SELECT SUM(b.kuantiti * p.harga) as total 
                                 FROM belian b 
                                 JOIN produk p ON b.idProduk = p.idProduk");
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total'] ?? 0;
}

/**
 * Get the number of orders placed today.
 *
 * @param mysqli $con Database connection
 * @return int Number of orders
 */
function jumlahPesananHariIni($con) {
    $today = date('Y-m-d');
    $result = mysqli_query($con, "SELECT COUNT(*) as total 
                                 FROM pesanan 
                                 WHERE DATE(tarikh) = '$today'");
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}
?>