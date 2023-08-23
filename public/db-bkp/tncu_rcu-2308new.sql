-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 04:32 AM
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
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(12) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `loandate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `user_id`, `loandate`) VALUES
(1, 1, '2023-08-23'),
(2, 1, '2023-08-23'),
(3, 1, '2023-08-23'),
(4, 1, '2023-08-23'),
(5, 1, '2023-08-23'),
(6, 1, '2023-08-23'),
(7, 1, '2023-08-23'),
(8, 1, '2023-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `loan_trans`
--

CREATE TABLE `loan_trans` (
  `id` int(12) NOT NULL,
  `loan_id` int(12) DEFAULT NULL,
  `loantype_id` int(12) DEFAULT NULL,
  `disbursedno` int(12) DEFAULT NULL,
  `disbursedamount` int(12) DEFAULT NULL,
  `collectedno` int(12) DEFAULT NULL,
  `collectedamount` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_trans`
--

INSERT INTO `loan_trans` (`id`, `loan_id`, `loantype_id`, `disbursedno`, `disbursedamount`, `collectedno`, `collectedamount`) VALUES
(1, 4, 13, 2312, 213, 213, 1231),
(2, 4, 17, 213, 213, 123, 123),
(3, 5, 10, 21321, 3213, 123, 123),
(4, 5, 14, 123, 23123, 312, 312),
(5, 5, 5, 213, 312321, 123, 21321),
(6, 6, 14, 324, 234, 234, 234),
(7, 7, 16, 4543, 435, 435, 435),
(8, 8, 9, 324234, 2342, 3423, 423),
(9, 8, 17, 234, 23423, 423, 423),
(10, 8, 14, 234, 32423, 423, 4234),
(11, 8, 8, 423, 324234, 423423, 423),
(12, 8, 12, 324, 234, 234, 234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_trans`
--
ALTER TABLE `loan_trans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loan_trans`
--
ALTER TABLE `loan_trans`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
