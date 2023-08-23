-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 04:26 AM
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
-- Table structure for table `mtr_loan`
--

CREATE TABLE `mtr_loan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loantype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mtr_loan`
--

INSERT INTO `mtr_loan` (`id`, `loantype`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Self Help Group Loan', 1, NULL, NULL),
(2, 'Differently Abled Persons Loan', 1, NULL, NULL),
(3, 'Home Loan', 1, NULL, NULL),
(4, 'House Mortgage loan', 1, NULL, NULL),
(5, 'TAMCO Loan', 1, NULL, NULL),
(6, 'THADCO Loan', 1, NULL, NULL),
(7, 'TABCEDCO  Loan', 1, NULL, NULL),
(8, 'Working Women Loan', 1, NULL, NULL),
(9, 'Women Entrepreneurs Loan', 1, NULL, NULL),
(10, 'Maternity Loan', 1, NULL, NULL),
(11, 'Jewel Loan', 1, NULL, NULL),
(12, 'Professional Loan', 1, NULL, NULL),
(13, 'Produce Pledge Loan', 1, NULL, NULL),
(14, 'Personal Loan to Members ', 1, NULL, NULL),
(15, 'Maternity Loan', 1, NULL, NULL),
(16, 'Surety Loan ', 1, NULL, NULL),
(17, 'Staff Loan ', 1, NULL, NULL),
(18, 'Loan on Deposit', 1, NULL, NULL),
(19, 'Non Farm Sector Loan', 1, NULL, NULL),
(20, 'Petty Trader Loan', 1, NULL, NULL),
(21, 'JLG Loan', 1, NULL, NULL),
(22, 'Crop Loan ', 1, NULL, NULL),
(23, 'Animal Husbandary Loan', 1, NULL, NULL),
(24, 'Medium Term Loan', 1, NULL, NULL),
(25, 'Long Term Loan', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtr_loan`
--
ALTER TABLE `mtr_loan`
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
-- AUTO_INCREMENT for table `mtr_loan`
--
ALTER TABLE `mtr_loan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
