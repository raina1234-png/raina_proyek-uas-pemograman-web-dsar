-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2026 at 04:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glowflora_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `skincare_products`
--

CREATE TABLE `skincare_products` (
  `id` int(11) NOT NULL,
  `nama_varian` varchar(150) NOT NULL,
  `kategori` enum('Serum & Ampoule','Moisturizer','Sunscreen','Facial Wash') NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok_gudang` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skincare_products`
--

INSERT INTO `skincare_products` (`id`, `nama_varian`, `kategori`, `harga_jual`, `stok_gudang`, `created_at`) VALUES
(201, 'Glow Centella Brightening Serum', 'Serum & Ampoule', 145000, 25, '2026-06-11 17:06:42'),
(202, 'Ceramide Barrier Deep Moisturizer', 'Moisturizer', 189000, 4, '2026-06-11 17:06:42'),
(203, 'UV Aqua Shield Sunscreen SPF 50', 'Sunscreen', 120000, 0, '2026-06-11 17:06:42'),
(204, 'Gentle Low pH Amino Facial Wash', 'Facial Wash', 85000, 45, '2026-06-11 17:06:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skincare_products`
--
ALTER TABLE `skincare_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skincare_products`
--
ALTER TABLE `skincare_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
