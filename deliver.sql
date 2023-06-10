-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 08:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deliver`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Admin', 'Admin'),
(2, 'Amelia', 'Amelia'),
(3, 'Seva', 'Seva');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `tanggal_pembelian` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_menu`, `jumlah_barang`, `total_harga`, `id_status`, `tanggal_pembelian`) VALUES
(29, 1, 19, 2, 50000, 2, '2023-06-10 13:29:43'),
(30, 1, 23, 1, 6000, 2, '2023-06-10 13:29:43'),
(31, 1, 24, 1, 10000, 2, '2023-06-10 13:29:43'),
(32, 1, 26, 4, 20000, 2, '2023-06-10 13:29:43'),
(33, 4, 45, 2, 5000, 2, '2023-06-10 13:31:10'),
(34, 4, 43, 1, 10000, 2, '2023-06-10 13:31:10'),
(35, 4, 40, 2, 12000, 2, '2023-06-10 13:31:10'),
(36, 4, 27, 1, 12000, 2, '2023-06-10 13:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `harga`, `kategori`, `gambar`) VALUES
(19, 'Ayam Utuh ', 50000, 'Protein', '64840f28219b5.jpeg'),
(20, 'Paha Ayam', 20000, 'Protein', '64840f632a0a2.jpg'),
(21, 'Telur', 30000, 'Protein', '64840f951e19f.jpg'),
(22, 'Tahu', 8000, 'Protein', '64840fb7f2fda.jpeg'),
(23, 'Tempe', 6000, 'Protein', '648413279817b.jpg'),
(24, 'Kol', 10000, 'Sayuran', '64841346c17a0.jpg'),
(25, 'Sawi', 5000, 'Sayuran', '6484137a1397e.jpg'),
(26, 'kentang', 20000, 'Sayuran', '64841391bb51a.jpg'),
(27, 'Wortel', 12000, 'Sayuran', '648413c4b669e.jpg'),
(28, 'Terong', 5000, 'Sayuran', '648414210babd.jpg'),
(29, 'Jeruk', 25000, 'Buah', '6484147a62932.jpg'),
(30, 'Semangka', 40000, 'Buah', '648414a50ba23.jpg'),
(31, 'Melon', 30000, 'Buah', '648414bd393c2.jpg'),
(32, 'Pisang', 12000, 'Buah', '648414f4955fb.jpg'),
(33, 'Jambu', 15000, 'Buah', '6484152fea66f.jpg'),
(34, 'Cabai', 15000, 'Bumbu', '6484157d610b5.jpeg'),
(35, 'Bawang  Merah', 15000, 'Bumbu', '648415b31ef41.jpg'),
(36, 'Bawang Putih', 15000, 'Bumbu', '648415dd5ed75.jpg'),
(37, 'Serai', 3000, 'Bumbu', '648416010ba55.jpg'),
(38, 'Kunyit', 3000, 'Bumbu', '6484161625041.jpg'),
(39, 'Chitato', 50000, 'Snack', '.jpg'),
(40, 'milkita', 12000, 'Snack', '6484169b8c0fe.jpg'),
(41, 'Wafer Nabati', 20000, 'Snack', '648416ed0e9ec.png'),
(42, 'Good Day', 10000, 'Minuman', '64841725656f7.jpg'),
(43, 'Nutrisari', 10000, 'Minuman', '6484173cd6653.jpg'),
(44, 'Pop Ice', 10000, 'Minuman', '6484175247e86.jpg'),
(45, 'Teh Sari Wangi', 5000, 'Minuman', '6484176eeaaf1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id_rekomendasi` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekomendasi`
--

INSERT INTO `rekomendasi` (`id_rekomendasi`, `id`) VALUES
(1, 9),
(2, 10),
(3, 11),
(4, 12),
(5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `nama`) VALUES
(1, 'Belum Bayar'),
(2, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `waktu_order` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `total_harga`, `id_status`, `waktu_order`) VALUES
(30, 1, 196000, 2, '2023-06-10 13:29:43'),
(31, 4, 56000, 2, '2023-06-10 13:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `no_hp` int(20) DEFAULT NULL,
  `alamat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `no_hp`, `alamat`) VALUES
(1, 'amelia', 'amelia', 'Amelia Kartika Putri', 895330829, 'Jalan Babarsari'),
(4, 'seva123', 'seva123', 'seva', 88827373, 'Jalan Babarsari'),
(5, 'seva', 'seva', 'Seva G. fAREL', 82339237, 'Jl. Seturan Raya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id_rekomendasi`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id_rekomendasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
