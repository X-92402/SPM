<?php
/**
 * Get all products from the database.
 *
 * @param mysqli $con Database connection
 * @return mysqli_result|false Result set or false on failure
 */
function semuaProduk($con) {
    $sql = "SELECT * FROM produk";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    return $result;
}

/**
 * Get product details by ID.
 *
 * @param mysqli $con Database connection
 * @param int $idProduk Product ID
 * @return array|null Product details or null if not found
 */
function lihatProduk($con, $idProduk) {
    $sql = "SELECT * FROM produk WHERE idProduk = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idProduk);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

/**
 * Update cart quantity.
 *
 * @param int $id Product ID
 * @param int $qty Quantity
 * @return void
 */
function updateCart($id, $qty) {
    if ($qty == 0) {
        unset($_SESSION['cart'][$id]);
    } else {
        $_SESSION['cart'][$id] = $qty;
    }
}

/**
 * Get orders for a specific customer.
 *
 * @param mysqli $con Database connection
 * @param string $nomHp Customer phone number
 * @return mysqli_result|false Result set or false on failure
 */
function dapatPesanan($con, $nomHp) {
    $stmt = mysqli_prepare($con, "SELECT p.*, pr.namaProduk, b.kuantiti 
                              FROM pesanan p 
                              JOIN belian b ON p.bil = b.bil
                              JOIN produk pr ON b.idProduk = pr.idProduk
                              WHERE p.nomHp = ?
                              ORDER BY p.tarikh DESC");
    mysqli_stmt_bind_param($stmt, "s", $nomHp);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
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