-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2025 at 06:19 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin Utamaa', 'admin@matrix.com', '$2y$12$ALy1BWQCMZg8EWHvijOrI.VELYfzNi98TYBeG7d2hHKscgtpk8vFS', '2025-11-03 21:14:19', '2025-11-11 06:04:03', 'admin'),
(2, 'Yoga Dinanta', 'user@matrix.com', '$2y$12$8dt8SAjAPv0wKgGJglHN6O66tcZvVHtjreZdkDNwR.HJ5astTWKzK', '2025-11-03 21:14:19', '2025-11-11 13:42:53', 'user'),
(3, 'Admin Utama', 'admin@gmail.com', '$2y$12$1a/0pUswhbSiDSw27YKj/eTF8LN0NMEV4FnzxiYdsc5Y.yrjK.z.O', '2025-11-03 21:44:44', '2025-11-03 21:44:44', 'admin'),
(4, 'User Baruuuu', 'user@gmail.com', '$2y$12$1a/0pUswhbSiDSw27YKj/eTF8LN0NMEV4FnzxiYdsc5Y.yrjK.z.O', '2025-11-03 21:49:56', '2025-11-11 06:04:59', 'user'),
(6, 'I KOMANG YOGA DINANTA', 'yogadinanta@gmail.com', '$2y$12$abXRq7vNEuWqZUzIYCJ8HerPr73FonWDWcKY3W1Gx6MWGqU6MmMf6', '2025-11-11 06:13:54', '2025-11-11 06:13:54', 'user');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
