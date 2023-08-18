-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 04:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tncu_rcu`
--

-- --------------------------------------------------------

--
-- Table structure for table `mtr_sale`
--

CREATE TABLE `mtr_sale` (
  `id` int(12) NOT NULL,
  `sale_name` varchar(255) DEFAULT NULL,
  `status` int(12) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mtr_sale`
--

INSERT INTO `mtr_sale` (`id`, `sale_name`, `status`) VALUES
(1, 'Fertilizer', 1),
(2, 'Pesticides', 1),
(3, 'Pharmacy', 1),
(4, 'Farm Fresh Outlet', 1),
(5, 'Petrol/Diesel Bunks', 1),
(6, 'Own Products', 1),
(7, 'Gas Agency', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `saledate` date DEFAULT NULL,
  `noofvarieties` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noofoutlets` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noofcustomers` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nooffarmers` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantitykilo` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantitylitres` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salesamountphysical` varchar(45) CHARACTER SET armscii8 DEFAULT NULL,
  `salesamountcoopbazaar` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `sale_id`, `saledate`, `noofvarieties`, `noofoutlets`, `noofcustomers`, `nooffarmers`, `quantitykilo`, `quantitylitres`, `salesamountphysical`, `salesamountcoopbazaar`, `created_at`, `updated_at`) VALUES
(3, '1', 2, '2023-08-18', '33', NULL, NULL, '42', '23', '32', '324', NULL, '2023-08-17 19:53:44', '2023-08-17 19:53:44'),
(4, '1', 4, '2023-08-18', '324', NULL, '2342', NULL, NULL, NULL, '334', NULL, '2023-08-17 19:54:31', '2023-08-17 19:54:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mtr_sale`
--
ALTER TABLE `mtr_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mtr_sale`
--
ALTER TABLE `mtr_sale`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
