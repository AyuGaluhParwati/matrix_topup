-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2025 at 05:11 AM
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
-- Database: `topup_matrix`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subjek` varchar(200) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('baru','dibaca','dibalas') DEFAULT 'baru',
  `balasan` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `subjek`, `pesan`, `status`, `balasan`, `created_at`, `updated_at`) VALUES
(1, 'galuh', 'agunggaluh16@gmail.com', 'masalah sistem', 'nkkpldsf\';gewo;aledsm aeldo;l/.aef,mhvioplk.weagyowrgklgo;k', 'baru', NULL, '2025-11-29 22:27:45', NULL),
(2, 'tiwi', 'tiwi@gmail.com', 'lag', 'sjskjdnbhaciuhdcnnmndusdgasvscshjcilssvbsnhs', 'baru', NULL, '2025-11-29 22:53:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori`, `harga`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 'RBL', 'TOPUP', 32000.00, 'hemmm', '1763080304_390d93c9661d12343ef0.png', '2025-11-14 08:31:44', '2025-11-14 08:32:05'),
(4, 'MOBILE LEGENDS 20 DM', 'TOPUP', 20000.00, 'BWHJKDHUAOFDBWQJDOIL', '1763080857_dc39991d7cc3932c5030.png', '2025-11-14 08:40:57', '2025-11-14 08:40:57'),
(5, 'MOBILE LEGENDS 30DM', 'TOPUP', 25000.00, 'basudkdvsafk.asl', '1763081338_d692204210b9c88809c1.png', '2025-11-14 08:48:58', '2025-11-14 08:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin Utamaa', 'admin@matrix.com', '$2y$12$ALy1BWQCMZg8EWHvijOrI.VELYfzNi98TYBeG7d2hHKscgtpk8vFS', '2025-11-03 21:14:19', '2025-11-14 11:25:33', 'admin'),
(2, 'Yoga Dinanta', 'user@matrix.com', '$2y$12$8dt8SAjAPv0wKgGJglHN6O66tcZvVHtjreZdkDNwR.HJ5astTWKzK', '2025-11-03 21:14:19', '2025-11-11 13:42:53', 'user'),
(3, 'Admin Utama', 'admin@gmail.com', '$2y$12$1a/0pUswhbSiDSw27YKj/eTF8LN0NMEV4FnzxiYdsc5Y.yrjK.z.O', '2025-11-03 21:44:44', '2025-11-03 21:44:44', 'admin'),
(4, 'User Baruuuu', 'user@gmail.com', '$2y$12$1a/0pUswhbSiDSw27YKj/eTF8LN0NMEV4FnzxiYdsc5Y.yrjK.z.O', '2025-11-03 21:49:56', '2025-11-11 06:04:59', 'user'),
(6, 'I KOMANG YOGA DINANTA', 'yogadinanta@gmail.com', '$2y$12$abXRq7vNEuWqZUzIYCJ8HerPr73FonWDWcKY3W1Gx6MWGqU6MmMf6', '2025-11-11 06:13:54', '2025-11-11 06:13:54', 'user'),
(7, 'Gung Galuh', 'agunggaluh16@gmail.com', '$2y$10$LL4S6DrOsG7TseUCwpCJxubKeCdJz9BblWTf2qF1dOoyHQHbXYQtS', '2025-11-11 06:39:33', '2025-11-11 06:39:33', 'user'),
(8, 'Ayu Sinta', 'sinta@gmail.com', '$2y$10$z7pjR36dpxttXyuKvZis/uBTEfFE.ZYN8bmM87D.laKuEnaL6PyK6', '2025-11-14 00:47:13', '2025-11-14 00:48:27', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
