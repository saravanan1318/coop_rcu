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
-- Table structure for table `mtr_purchase`
--

CREATE TABLE `mtr_purchase` (
  `id` int(12) NOT NULL,
  `purchase_name` varchar(255) DEFAULT NULL,
  `status` int(12) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mtr_purchase`
--

INSERT INTO `mtr_purchase` (`id`, `purchase_name`, `status`) VALUES
(1, 'Fertilizer', 1),
(2, 'Pharmacy', 1),
(3, 'Farm Fresh Outlet', 1),
(4, 'Petrol/Diesel Bunks', 1),
(5, 'Non controlled commodities', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mtr_purchase`
--
ALTER TABLE `mtr_purchase`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mtr_purchase`
--
ALTER TABLE `mtr_purchase`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
