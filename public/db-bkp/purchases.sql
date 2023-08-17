-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 04:35 AM
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
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `purchasedate` date DEFAULT NULL,
  `govtnoofvarieties` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `govtquantity` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `govtvalues` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coopnoofvarieties` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coopquantity` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coopvalues` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jpcnoofvarieties` varchar(45) CHARACTER SET armscii8 DEFAULT NULL,
  `jpcquantity` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jpcvalues` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privatenoofvarieties` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privatequantity` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privatevalues` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `purchase_id`, `purchasedate`, `govtnoofvarieties`, `govtquantity`, `govtvalues`, `coopnoofvarieties`, `coopquantity`, `coopvalues`, `jpcnoofvarieties`, `jpcquantity`, `jpcvalues`, `privatenoofvarieties`, `privatequantity`, `privatevalues`, `created_at`, `updated_at`) VALUES
(1, '1', 1, '2023-08-17', '22', '22', '22', '22', '22', '22', '22', '22', '22', '22', '22', '22', '2023-08-16 19:41:44', '2023-08-16 19:41:44'),
(2, '1', 4, '2023-08-17', '45', '34', '453', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-16 20:07:09', '2023-08-16 20:07:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
