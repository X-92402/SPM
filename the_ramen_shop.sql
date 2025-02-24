-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2025 at 10:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the ramen shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `belian`
--

CREATE TABLE `belian` (
  `idBelian` int(11) NOT NULL,
  `kuantiti` int(11) DEFAULT NULL,
  `idProduk` int(11) DEFAULT NULL,
  `bil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `noMeja` varchar(10) NOT NULL,
  `info` varchar(20) DEFAULT NULL,
  `tersedia` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`noMeja`, `info`, `tersedia`) VALUES
('A1', 'Window seat', 'Y'),
('A2', 'Corner table', 'Y'),
('A3', 'Near entrance', 'Y'),
('B1', 'Center table', 'Y'),
('B2', 'Near kitchen', 'Y'),
('B3', 'Near restroom', 'Y'),
('C1', 'Quiet corner', 'Y'),
('C2', 'Near bar', 'Y'),
('C3', 'Near window', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` varchar(13) NOT NULL,
  `nomHp` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `aras` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nomHp`, `email`, `password`, `nama`, `aras`) VALUES
('67b70babb56f2', '0177028198', 'TIANYINNNLIM@GMAIL.COM', 'techblitz', 'TEST', 'PENGGUNA'),
('67bae4c0336f2', '0123456789', 'ADMIN', '88888888', 'ADMIN', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `bil` int(11) NOT NULL,
  `tarikh` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `nomHp` varchar(11) DEFAULT NULL,
  `noMeja` varchar(10) DEFAULT NULL,
  `cara` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idProduk` int(11) NOT NULL,
  `namaProduk` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `gambar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `namaProduk`, `detail`, `harga`, `gambar`) VALUES
(1, 'Shoyu Ramen', 'Classic soy sauce based ramen', 10.00, 'shoyu.jpg'),
(2, 'Miso Ramen', 'Rich miso flavored ramen', 11.00, 'miso.jpg'),
(3, 'Tonkotsu Ramen', 'Creamy pork bone soup ramen', 12.00, 'tonkotsu.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belian`
--
ALTER TABLE `belian`
  ADD PRIMARY KEY (`idBelian`),
  ADD KEY `idProduk` (`idProduk`),
  ADD KEY `bil` (`bil`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`noMeja`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomHp` (`nomHp`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`bil`),
  ADD KEY `nomHp` (`nomHp`),
  ADD KEY `noMeja` (`noMeja`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idProduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `belian`
--
ALTER TABLE `belian`
  MODIFY `idBelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `bil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belian`
--
ALTER TABLE `belian`
  ADD CONSTRAINT `belian_ibfk_1` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`idProduk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `belian_ibfk_2` FOREIGN KEY (`bil`) REFERENCES `pesanan` (`bil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`nomHp`) REFERENCES `pelanggan` (`nomHp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`noMeja`) REFERENCES `meja` (`noMeja`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
