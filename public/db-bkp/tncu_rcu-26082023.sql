-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2023 at 04:52 AM
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
-- Table structure for table `croploan_categorywise`
--

CREATE TABLE `croploan_categorywise` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `croploandate` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `croploan_cropwise`
--

CREATE TABLE `croploan_cropwise` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `croploandate` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `croploan_entry`
--

CREATE TABLE `croploan_entry` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `croploandate` date NOT NULL,
  `applicationsreceived` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicationssanctioned` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicationspending` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalcultivatedarea` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loanissuedarea` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outstandingno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outstandingamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overdueno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overdueamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `croploan_entry`
--

INSERT INTO `croploan_entry` (`id`, `user_id`, `croploandate`, `applicationsreceived`, `applicationssanctioned`, `applicationspending`, `totalcultivatedarea`, `loanissuedarea`, `outstandingno`, `outstandingamount`, `overdueno`, `overdueamount`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-08-22', '1561', '6516', '564651', '651', '651', '61', '61', '651', '61', '2023-08-21 21:10:11', '2023-08-21 21:10:11'),
(2, 1, '2023-08-22', '1561', '6516', '564651', '651', '651', '61', '61', '651', '61', '2023-08-21 21:10:24', '2023-08-21 21:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `croploan_target`
--

CREATE TABLE `croploan_target` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(12) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `depositdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id`, `user_id`, `depositdate`) VALUES
(1, 1, '2023-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_id` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depositdate` date DEFAULT NULL,
  `recievedno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recievedamount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closedno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closedamount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `deposit_id`, `depositdate`, `recievedno`, `recievedamount`, `closedno`, `closedamount`, `created_at`, `updated_at`) VALUES
(2, '1', '1', '2023-08-24', '35345', '43543', '543', '543543', NULL, NULL),
(3, '1', '3', '2023-08-24', '435', '34534', '543', '5435', NULL, NULL),
(4, '1', '3', '2023-08-17', '43543', '5345435435', '435345', '435435', NULL, NULL),
(5, '1', '5', '2023-08-17', '435', '34543', '543', '5345', NULL, NULL),
(6, '1', '3', '2023-08-17', '435', '435435', '435435', '435435', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deposit_onetimeentry`
--

CREATE TABLE `deposit_onetimeentry` (
  `id` int(1) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `deposit_id` varchar(45) NOT NULL,
  `overall_outstanding` varchar(45) DEFAULT NULL,
  `current_outstanding` varchar(45) DEFAULT NULL,
  `current_year` varchar(45) DEFAULT NULL,
  `annual_target` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit_onetimeentry`
--

INSERT INTO `deposit_onetimeentry` (`id`, `user_id`, `deposit_id`, `overall_outstanding`, `current_outstanding`, `current_year`, `annual_target`) VALUES
(1, '1', '4', '34534534', '345345', '2023-04', '34543534'),
(2, '1', '13', '435345', '34534', '2023-08', '534534'),
(3, '1', '11', '200', '33', '2023-04-01', '15000000'),
(4, '1', '3', '75000000', '12500000', '2023-04-01', '120000000'),
(5, '1', '12', '500000', '150000', '2023-04-01', '700000'),
(6, '1', '2', '30000', '15000', '2023-04-01', '45000');

-- --------------------------------------------------------

--
-- Table structure for table `deposit_outstandings`
--

CREATE TABLE `deposit_outstandings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recieveddate` date NOT NULL,
  `recievedothersno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recievedothersamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recievedtotalno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recievedtotalamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closeddate` date NOT NULL,
  `closedothersno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closedothersamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closedtotalno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closedtotalamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposit_trans`
--

CREATE TABLE `deposit_trans` (
  `id` int(12) NOT NULL,
  `deposit_id` int(12) DEFAULT NULL,
  `deposittype_id` int(12) DEFAULT NULL,
  `recievedno` int(12) DEFAULT NULL,
  `recievedamount` int(12) DEFAULT NULL,
  `closedno` int(12) DEFAULT NULL,
  `closedamount` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit_trans`
--

INSERT INTO `deposit_trans` (`id`, `deposit_id`, `deposittype_id`, `recievedno`, `recievedamount`, `closedno`, `closedamount`) VALUES
(1, 1, 1, 23432, 234, 234, 234),
(2, 1, 2, 234, 234234, 23423, 4),
(3, 1, 3, 234, 455, 465, 54334),
(4, 1, 5, 34, 543, 654, 65324),
(5, 1, 6, 54643, 45435, 634534, 53453);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `godowns`
--

CREATE TABLE `godowns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `godowndate` date DEFAULT NULL,
  `count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilized` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentageutilized` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `godowns`
--

INSERT INTO `godowns` (`id`, `user_id`, `godowndate`, `count`, `capacity`, `utilized`, `percentageutilized`, `income`, `created_at`, `updated_at`) VALUES
(1, '1', '2023-08-21', '44', '233', '32423', '13915', '23432', '2023-08-21 18:52:27', '2023-08-21 18:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(12) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `loandate` date DEFAULT NULL,
  `loantype_id` int(12) DEFAULT NULL,
  `disbursedno` int(12) DEFAULT NULL,
  `disbursedamount` int(12) DEFAULT NULL,
  `collectedno` int(12) DEFAULT NULL,
  `collectedamount` int(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `user_id`, `loandate`, `loantype_id`, `disbursedno`, `disbursedamount`, `collectedno`, `collectedamount`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, 13, 2312, 213, 213, 1231, NULL, NULL),
(2, 4, NULL, 17, 213, 213, 123, 123, NULL, NULL),
(3, 5, NULL, 10, 21321, 3213, 123, 123, NULL, NULL),
(4, 5, NULL, 14, 123, 23123, 312, 312, NULL, NULL),
(5, 5, NULL, 5, 213, 312321, 123, 21321, NULL, NULL),
(6, 6, NULL, 14, 324, 234, 234, 234, NULL, NULL),
(7, 7, NULL, 16, 4543, 435, 435, 435, NULL, NULL),
(8, 8, NULL, 9, 324234, 2342, 3423, 423, NULL, NULL),
(9, 8, NULL, 17, 234, 23423, 423, 423, NULL, NULL),
(10, 8, NULL, 14, 234, 32423, 423, 4234, NULL, NULL),
(11, 8, NULL, 8, 423, 324234, 423423, 423, NULL, NULL),
(12, 8, NULL, 12, 324, 234, 234, 234, NULL, NULL),
(13, 1, '2023-08-26', 10, 3432, 234234, 234, 2342, '2023-08-25 20:03:58', '2023-08-25 20:03:58'),
(14, 1, '2023-08-26', 7, 234, 2344, 53, 2324324, '2023-08-25 20:03:58', '2023-08-25 20:03:58'),
(15, 1, '2023-08-26', 14, 234, 234, 234, 23423, '2023-08-25 20:03:58', '2023-08-25 20:03:58'),
(16, 1, '2023-08-26', 5, 234, 234, 2342, 4, '2023-08-25 20:03:58', '2023-08-25 20:03:58'),
(17, 1, '2023-08-25', 7, 5345, 34543543, 43, 33534, '2023-08-25 20:59:54', '2023-08-25 20:59:54'),
(18, 1, '2023-08-25', 12, 4435, 345, 345, 4353453, '2023-08-25 20:59:54', '2023-08-25 20:59:54'),
(19, 1, '2023-08-25', 16, 345, 3453, 453, 45345345, '2023-08-25 20:59:54', '2023-08-25 20:59:54'),
(20, 1, '2023-08-25', 18, 43543, 534, 534, 5345, '2023-08-25 20:59:54', '2023-08-25 20:59:54'),
(21, 1, '2023-08-26', 17, 433534, 534, 534, 534, '2023-08-25 21:01:39', '2023-08-25 21:01:39'),
(22, 1, '2023-08-26', 2, 3453, 4534, 53453, 45345, '2023-08-25 21:01:39', '2023-08-25 21:01:39'),
(23, 1, '2023-08-26', 12, 435, 345, 345345, 435345, '2023-08-25 21:17:52', '2023-08-25 21:17:52'),
(24, 1, '2023-08-26', 16, 43, 534, 435, 453453, '2023-08-25 21:17:52', '2023-08-25 21:17:52'),
(25, 1, '2023-08-26', 17, 546, 546, 546, 54645, '2023-08-25 21:17:52', '2023-08-25 21:17:52'),
(26, 1, '2023-08-26', 11, 567, 567, 567, 56756, '2023-08-25 21:17:52', '2023-08-25 21:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `loan_annual`
--

CREATE TABLE `loan_annual` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loantype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issuedate` date NOT NULL,
  `scstno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scstamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othersno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othersamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_onetimeentry`
--

CREATE TABLE `loan_onetimeentry` (
  `id` int(11) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `loan_id` varchar(45) NOT NULL,
  `overall_outstanding` varchar(45) DEFAULT NULL,
  `current_outstanding` varchar(45) DEFAULT NULL,
  `current_year` varchar(45) DEFAULT NULL,
  `annual_target` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_onetimeentry`
--

INSERT INTO `loan_onetimeentry` (`id`, `user_id`, `loan_id`, `overall_outstanding`, `current_outstanding`, `current_year`, `annual_target`) VALUES
(1, '1', '4', '34534534', '345345', '2023-04', '34543534'),
(2, '1', '13', '435345', '34534', '2023-08', '534534'),
(3, '1', '11', '200', '33', '2023-04-01', '15000000'),
(4, '1', '3', '75000000', '12500000', '2023-04-01', '120000000'),
(5, '1', '12', '500000', '150000', '2023-04-01', '700000'),
(6, '1', '1', 'fdgfd', 'gfdg', '2023-04-01', 'fdg');

-- --------------------------------------------------------

--
-- Table structure for table `loan_overallot`
--

CREATE TABLE `loan_overallot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loantype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issuedate` date NOT NULL,
  `scstno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scstamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othersno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othersamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(12, '2014_10_12_000000_create_users_table', 3),
(13, '2014_10_12_100000_create_password_resets_table', 3),
(14, '2019_08_19_000000_create_failed_jobs_table', 3),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(16, '2023_08_01_010622_create_student_params', 3),
(17, '2023_08_09_002254_create_mtr_region_table', 3),
(18, '2023_08_09_002706_create_mtr_circle_table', 3),
(19, '2023_08_09_002827_create_mtr_role_table', 3),
(20, '2023_08_09_002919_create_mtr_societytype_table', 3),
(21, '2023_08_09_003125_create_mtr_society_table', 3),
(22, '2023_08_10_012102_create_issues_table', 4),
(23, '2023_08_09_002827_create_mtr_loan_table', 5),
(24, '2023_08_10_012102_create_deposit_table', 6),
(25, '2023_08_10_012102_create_Collection_table', 7),
(26, '2023_08_10_012102_create_annual_table', 8),
(27, '2023_08_10_012102_create_overallot_table', 9),
(28, '2023_08_10_012102_create_fertilizer_table', 10),
(29, '2023_08_10_012102_create_pharmacy_table', 11),
(30, '2023_08_10_012102_create_ffo_table', 12),
(31, '2023_08_10_012102_create_pdbunk_table', 13),
(32, '2023_08_10_012102_create_deposit_currents_table', 14),
(33, '2023_08_10_012102_create_deposit_fdgovts_table', 14),
(34, '2023_08_10_012102_create_deposit_fdinds_table', 14),
(35, '2023_08_10_012102_create_deposit_fdists_table', 14),
(36, '2023_08_10_012102_create_deposit_outstandings_table', 14),
(37, '2023_08_10_012102_create_deposit_rds_table', 14),
(38, '2023_08_10_012102_create_deposit_sbs_table', 14),
(39, '2023_08_10_012102_create_godowns_table', 14),
(40, '2023_08_10_012102_create_services_agris_table', 14),
(41, '2023_08_10_012102_create_services_cscs_table', 14),
(42, '2023_08_10_012102_create_services_drys_table', 14),
(43, '2023_08_10_012102_create_services_lodgings_table', 14),
(44, '2023_08_10_012102_create_services_pss._table', 14),
(45, '2023_08_10_012102_create_services_psss._table', 14),
(46, '2023_08_10_012102_create_ncc_table', 15),
(47, '2023_08_10_012102_create_fertilizersales_table', 16),
(48, '2023_08_10_012102_create_ffosales_table', 16),
(49, '2023_08_10_012102_create_nccsales_table', 16),
(50, '2023_08_10_012102_create_pdbunksales_table', 16),
(51, '2023_08_10_012102_create_pharmacysales_table', 16),
(52, '2023_08_22_011734_create_croploan_target_table', 17),
(53, '2023_08_22_012050_create_croploan_entry_table', 17),
(54, '2023_08_22_013538_create_croploan_categorywise_table', 17),
(55, '2023_08_22_013827_create_croploan_cropwise_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `mtr_circle`
--

CREATE TABLE `mtr_circle` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `circle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mtr_circle`
--

INSERT INTO `mtr_circle` (`id`, `region_id`, `circle_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ariyalur', 1, NULL, NULL),
(2, 2, 'Chengalpattu', 1, NULL, NULL),
(3, 2, 'Madurantakam', 1, NULL, NULL),
(4, 3, 'Credit', 1, NULL, NULL),
(5, 3, 'Non-credit', 1, NULL, NULL),
(6, 4, 'Coimbatore', 1, NULL, NULL),
(7, 4, 'Pollachi', 1, NULL, NULL),
(8, 5, 'Cuddalore', 1, NULL, NULL),
(9, 5, 'Chidambaram', 1, NULL, NULL),
(10, 5, 'Virudhachalam', 1, NULL, NULL),
(11, 6, 'Dharmapuri', 1, NULL, NULL),
(12, 7, 'Dindigul', 1, NULL, NULL),
(13, 7, 'Palani', 1, NULL, NULL),
(14, 8, 'Erode', 1, NULL, NULL),
(15, 8, 'Gobichettipalayam', 1, NULL, NULL),
(16, 9, 'Kallakurichi', 1, NULL, NULL),
(17, 9, 'Tirukoilur', 1, NULL, NULL),
(18, 10, 'Kancheepuram', 1, NULL, NULL),
(19, 11, 'Nagercoil', 1, NULL, NULL),
(20, 11, 'Thuckalay', 1, NULL, NULL),
(21, 12, 'Kulithalai', 1, NULL, NULL),
(22, 12, 'Karur', 1, NULL, NULL),
(23, 13, 'Krishnagiri', 1, NULL, NULL),
(24, 13, 'Hosur', 1, NULL, NULL),
(25, 14, 'Madurai', 1, NULL, NULL),
(26, 14, 'Usilampatti', 1, NULL, NULL),
(27, 15, 'Mayiladuthurai', 1, NULL, NULL),
(28, 16, 'Nagapattinam', 1, NULL, NULL),
(29, 17, 'Tiruchengode', 1, NULL, NULL),
(30, 17, 'Namakkal', 1, NULL, NULL),
(31, 18, 'Udhagamandalam', 1, NULL, NULL),
(32, 19, 'Pudukkottai', 1, NULL, NULL),
(33, 19, 'Aranthangi', 1, NULL, NULL),
(34, 20, 'Perambalur', 1, NULL, NULL),
(35, 21, 'Ramanathapuram', 1, NULL, NULL),
(36, 21, 'Paramakudi', 1, NULL, NULL),
(37, 22, 'Ranipet', 1, NULL, NULL),
(38, 23, 'Salem', 1, NULL, NULL),
(39, 23, 'Attur', 1, NULL, NULL),
(40, 23, 'Omalur', 1, NULL, NULL),
(41, 23, 'Sankagiri', 1, NULL, NULL),
(42, 24, 'Sivagangai', 1, NULL, NULL),
(43, 24, 'Karaikudi', 1, NULL, NULL),
(44, 25, 'Sankarankovil', 1, NULL, NULL),
(45, 25, 'Tenkasi', 1, NULL, NULL),
(46, 26, 'Pattukkottai', 1, NULL, NULL),
(47, 26, 'Thanjavur', 1, NULL, NULL),
(48, 26, 'Kumbakonam', 1, NULL, NULL),
(49, 27, 'Uthamapalayam', 1, NULL, NULL),
(50, 27, 'Periyakulam', 1, NULL, NULL),
(51, 28, 'Thiruvarur', 1, NULL, NULL),
(52, 28, 'Mannargudi', 1, NULL, NULL),
(53, 29, 'Tiruchirapalli', 1, NULL, NULL),
(54, 29, 'Musiri', 1, NULL, NULL),
(55, 29, 'Lalgudi', 1, NULL, NULL),
(56, 30, 'Tirunelveli', 0, NULL, NULL),
(57, 30, 'Cheranmahadevi', 1, NULL, NULL),
(58, 31, 'Tirupathur', 1, NULL, NULL),
(59, 32, 'Tiruppur', 1, NULL, NULL),
(60, 32, 'Dharapuram', 1, NULL, NULL),
(61, 33, 'Tiruvallur', 1, NULL, NULL),
(62, 33, 'Ponneri', 1, NULL, NULL),
(63, 33, 'Tiruthani', 1, NULL, NULL),
(64, 34, 'Kovilpatti', 1, NULL, NULL),
(65, 34, 'Thoothukudi', 1, NULL, NULL),
(66, 34, 'Tiruchendur', 1, NULL, NULL),
(67, 35, 'Cheyyar', 1, NULL, NULL),
(68, 35, 'Tiruvannamalai', 1, NULL, NULL),
(69, 36, 'Vellore', 1, NULL, NULL),
(70, 37, 'Tindivanam', 1, NULL, NULL),
(71, 37, 'Villupuram', 1, NULL, NULL),
(72, 38, 'Aruppukottai', 1, NULL, NULL),
(73, 38, 'Srivilliputhur', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mtr_deposits`
--

CREATE TABLE `mtr_deposits` (
  `id` int(11) NOT NULL,
  `deposit_name` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mtr_deposits`
--

INSERT INTO `mtr_deposits` (`id`, `deposit_name`, `status`) VALUES
(1, 'FD - Government', '1'),
(2, 'FD - Individuals', '1'),
(3, 'FD - Institutions', '1'),
(4, 'RD', '1'),
(5, 'SB A/C', '1'),
(6, 'Current A/C', '1');

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

-- --------------------------------------------------------

--
-- Table structure for table `mtr_region`
--

CREATE TABLE `mtr_region` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mtr_region`
--

INSERT INTO `mtr_region` (`id`, `region_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ariyalur', 1, NULL, NULL),
(2, 'Chengalpattu', 1, NULL, NULL),
(3, 'Chennai', 1, NULL, NULL),
(4, 'Coimbatore', 1, NULL, NULL),
(5, 'Cuddalore', 1, NULL, NULL),
(6, 'Dharmapuri', 1, NULL, NULL),
(7, 'Dindigul', 1, NULL, NULL),
(8, 'Erode', 1, NULL, NULL),
(9, 'Kallakurichi', 1, NULL, NULL),
(10, 'Kancheepuram', 1, NULL, NULL),
(11, 'Kanyakumari', 1, NULL, NULL),
(12, 'Karur', 1, NULL, NULL),
(13, 'Krishnagiri', 1, NULL, NULL),
(14, 'Madurai', 1, NULL, NULL),
(15, 'Mayiladuthurai', 1, NULL, NULL),
(16, 'Nagapattinam', 1, NULL, NULL),
(17, 'Namakkal', 1, NULL, NULL),
(18, 'Nilgiris', 1, NULL, NULL),
(19, 'Pudukottai', 1, NULL, NULL),
(20, 'Perambalur', 1, NULL, NULL),
(21, 'Ramanathapuram', 1, NULL, NULL),
(22, 'Ranipet', 1, NULL, NULL),
(23, 'Salem', 1, NULL, NULL),
(24, 'Sivagangai', 1, NULL, NULL),
(25, 'Tenkasi', 1, NULL, NULL),
(26, 'Thanjavur', 1, NULL, NULL),
(27, 'Theni', 1, NULL, NULL),
(28, 'Thiruvarur', 1, NULL, NULL),
(29, 'Tiruchirappalli', 1, NULL, NULL),
(30, 'Tirunelveli', 1, NULL, NULL),
(31, 'Tirupathur', 1, NULL, NULL),
(32, 'Tiruppur', 1, NULL, NULL),
(33, 'Tiruvallur', 1, NULL, NULL),
(34, 'Tuticorin', 1, NULL, NULL),
(35, 'Tiruvannamalai', 1, NULL, NULL),
(36, 'Vellore', 1, NULL, NULL),
(37, 'Villupuram', 1, NULL, NULL),
(38, 'Virudhunagar', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mtr_role`
--

CREATE TABLE `mtr_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mtr_role`
--

INSERT INTO `mtr_role` (`id`, `role_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'RCS (MD Login)', 1, NULL, NULL),
(2, 'SuperAdmin (Office Login)', 1, NULL, NULL),
(3, 'JR (DistrictLevel)', 1, NULL, NULL),
(4, 'DR', 1, NULL, NULL),
(5, 'PACCS', 1, NULL, NULL),
(6, 'UCCS', 1, NULL, NULL),
(7, 'PCARDB', 1, NULL, NULL),
(8, 'TNSCARDB', 1, NULL, NULL),
(9, 'LAMPS', 1, NULL, NULL),
(10, 'UCB', 1, NULL, NULL),
(11, 'ECS', 1, NULL, NULL),
(12, 'DCCB', 1, NULL, NULL),
(13, 'TNSACB', 1, NULL, NULL);

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
-- Table structure for table `mtr_society`
--

CREATE TABLE `mtr_society` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `circle_id` bigint(20) UNSIGNED NOT NULL,
  `societytype_id` bigint(20) UNSIGNED NOT NULL,
  `society_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mtr_society`
--

INSERT INTO `mtr_society` (`id`, `region_id`, `circle_id`, `societytype_id`, `society_name`, `registration_no`, `staff_name`, `designation`, `mobile_no`, `address`, `pincode`, `status`, `created_at`, `updated_at`) VALUES
(1, 37, 70, 1, '70 Agricultural Producers Cooperative Marketing Society Ltd.,', 'E1442', 'Sankar ', 'Secretary', '9791448967', '14 Muslim street roshanai 70', '604001', 1, NULL, NULL),
(2, 37, 70, 1, 'GINGE Agricultural Producers Cooperative Marketing Society Ltd.,', 'E.1564', 'S.Ravi', 'Secretary', '9345424446', 'NO.1 s14bu street, sirukadambur, Gingee ', '604202', 1, NULL, NULL),
(3, 37, 70, 5, 'Vallam Panchayat Union Teachers Co.op Thrift and Credit Society', 'F.V.72', 'G.MURALI', 'Secretary', '9444506959', 'Nattarmangalam,Vallam Post,', '604206', 1, NULL, NULL),
(4, 37, 70, 5, 'Olakkur Panchayat Union Teachers Cooperative Thrift and Credit Society Ltd.,', 'F.V.73', 'A.D.SARAVANAN', 'Secretary', '99526 18248', 'No.23A,Mariyamman Kovil Street, 70-', '604 001', 1, NULL, NULL),
(5, 37, 70, 5, 'Merkanam Panchayat Union Teachers Cooperative Thrift and Credit Society', 'F.V.74', 'A.DASS', 'Secretary', '97915 63915', 'Pondy Road,        ( OPP:BDO Office ) Merkanam ', '604 303', 1, NULL, NULL),
(6, 37, 70, 5, 'Melmalaiyanur panchayat Union school and aided school Teachers coop Thrift and Credit Society', 'F.V.82', 'S.LAKSHMI\nNARAYANAN', 'Secretary', '9486150120', 'vallalar Nagar, melmaliyanoor &post, Melmaliyanoor taluk- ', '604204', 1, NULL, NULL),
(7, 37, 70, 5, ' Gingee panchayat Union Teachers Co.op Thrift and Credit Society', 'F.V. 84', 'R.RAJENDIRAN', 'Secretary', '9443048160', 'No.207/C, R.K.G.Complex,T.V.Malai Road, Gingee ', '604202', 1, NULL, NULL),
(8, 37, 70, 5, ' Mailam panchayat Union Teachers Co.op Thrift and Credit Society', 'F.V.92', 'P.KARUNAGARAN', 'Secretary\nIncharge', '9486789681', 'NO.73.GST Road, Kutteripattu, ', '604 302', 1, NULL, NULL),
(9, 37, 70, 5, ' 70 Edu.District Teachers and Employee T&C Society', 'F.V.95', 'P.ARUL', 'Secretary', '9443045292', 'No.11,Sundaram street, Gindangal -1, 70, ', ' 604 001', 1, NULL, NULL),
(10, 37, 70, 5, ' 70 Educational District Aided School Teachers, Teacher Training School, Industrial School and Municipal School Teachers and Employees Cooperative Thrift and Credit Society Ltd.,', 'F.V.96', 'K.KATHIRAVAN', 'Secretary\nIncharge', '94432 89897', 'No.9, Hospital Road,70 ', '604 001', 1, NULL, NULL),
(11, 37, 70, 5, 'F.V.120 71 & 70 Revenue Division Anganwadi Employees Cooperative Thrift and Credit Society Ltd.,', 'F.V.120', 'M.BOOPATHI', 'Secretary', '99944 33074', 'No.9, Hospital Road, 70', '604 001', 1, NULL, NULL),
(12, 37, 70, 7, 'MERKANAM  Primary Cooperative Agricultural & Rural Development Bank', 'DRL (N) 5', 'P.SANTHANAM', 'SECRETARY', '9443034747', 'PONDY ROAD, Marakkanam&(P.O.),MARAKANAM TALUK,71 DISTRICT.', '604303', 1, NULL, NULL),
(13, 37, 70, 7, '70   Primary Cooperative Agricultural & Rural Development Bank', 'E.1390', 'Baskaran.J', 'SECRETARY', '9443439159', '10,KEERAKARA STREET,70', '604001', 1, NULL, NULL),
(14, 37, 70, 7, ' GINGEE  Primary Cooperative Agricultural & Rural Development Bank', 'F.V.71', 'S.SOUNDER', 'Assistant', '9788266602', ' 3RD KAVEI STREET BUS STAND BACK SIDE GINGEE', '604202', 1, NULL, NULL),
(15, 37, 70, 11, 'Marakkanam Salt Society', 'E.1368', 'R.SRIDHARAN', 'SECRETARY INCHAGE', '9443034910', 'PONDY ROAD, Marakkanam.', '604303', 1, NULL, NULL),
(16, 37, 70, 14, '70 COOPERATIVE URBAN BANK', 'E.46', 'Vijayakumar ', 'General manager', '9944721392', 'No.1 Marikula street, 70 ', '604001', 1, NULL, NULL),
(17, 37, 70, 6, 'Alampoondi Primary Agricultural Cooperative Credit Society', 'Cl.Spl.144', 'Jothiswaran', 'Asst. Secretary', '7788890721', 'Vinayagar kovil, Street ,Alampoondi', '605201', 1, NULL, NULL),
(18, 37, 70, 6, 'Ananthapuram Primary Agricultural Cooperative Credit Society', 'C.Spl.76', 'S.Vishwanathan', 'secratry', '9943461579', 'Kizhmalai Ananthapuram & Post', '604151', 1, NULL, NULL),
(19, 37, 70, 6, 'Devathanampettai Primary Agricultural Cooperative Credit Society', 'Cl.Spl.132', 'P.Srinivasan', 'secretary', '9677429046', 'Savadi Street Devathampettai &Post', '604151', 1, NULL, NULL),
(20, 37, 70, 6, 'G.Semmedu Primary Agricultural Cooperative Credit Society', 'Cl.Spl.150', 'N.Logananthan', 'Secretary', '9487141265', 'THIRUVANNAMALAI MAIN ROAD SEMMEDU VIL & POST GINGEE TK', '604151', 1, NULL, NULL),
(21, 37, 70, 6, 'Gingee Primary Agricultural Cooperative Credit Society', 'Ii.95', 'P.sankar', 'clerk', '9442482835', 'GANDHI BAZAAR GINGEE', '605701', 1, NULL, NULL),
(22, 37, 70, 6, 'Kanakkankuppam Primary Agricultural Cooperative Credit Society', 'Cl.Spl.74', 'Karthikeyan', 'Asst.Secretary', '8940341713', 'Ananthapuram Salai Kanakkankuppam &Poat ', '605201', 1, NULL, NULL),
(23, 37, 70, 6, 'Konai Primary Agricultural Cooperative Credit Society', 'Cl.Spl.78', 'K.SARAVANAN', 'SENIOR CLERK', '9952592003', 'Bank Street, Konai & Post  Gingee TK 71 Dt', '604152', 1, NULL, NULL),
(24, 37, 70, 6, 'Mazhavanthangal Primary Agricultural Cooperative Credit Society', 'Cl.Spl.164', 'R.Thilagavathi', 'secratry', '9486168057', 'Alampoondi Salai Mazhavanthangal &Post', '604202', 1, NULL, NULL),
(25, 37, 70, 6, 'Melarungunam Primary Agricultural Cooperative Credit Society', 'Cl.Spl.131', 'S.Nagappan', 'clerk', '8838133354', 'Main Road Melarungunam Aniyeri Post', '604153', 1, NULL, NULL),
(26, 37, 70, 6, 'Nallapillaipetral Primary Agricultural Cooperative Credit Society', 'F.V.115', 'murugan', 'secretary', '9944328584', 'Kattusitamoor salai,Nallan pillai petral V/P ', '604205', 1, NULL, NULL),
(27, 37, 70, 6, 'Sathyamangalam Primary Agricultural Cooperative Credit Society', 'Cl.Spl.61', 'murugan', 'secretary', '9944328584', 'Raja Street Sathiyamangalam &Post', '604205', 1, NULL, NULL),
(28, 37, 70, 6, 'Thenpudhupattu Primary Agricultural Cooperative Credit Society', 'Cl.Spl.116', 'R.VISWANATHAN', 'SECRETRY', '9843480234', 'CLSPL 116,THENPUDUPPATTU 6, THENPUDUPPATTU, PALAPPATTU PO, GINGEE, 71 ', '604153', 1, NULL, NULL),
(29, 37, 70, 6, 'Alagrammam Primary Agricultural Cooperative Credit Society', 'Fv.118', 'J.HARIDASS', 'CLERK (ic)', '9080992079', '182/1, ALAKKARAI STREET, ALAGRAM, 70 TK, 71 DT-604302', '604302', 1, NULL, NULL),
(30, 37, 70, 6, 'Kallakolathur Primary Agricultural Cooperative Credit Society', 'Clspl 261', 'B.SRIDHAR', 'SECRATRY', '9786388905', 'MAIN ROAD.NADUVANANDAL AND POST,70 TK.71 DT-604207', '604207', 1, NULL, NULL),
(31, 37, 70, 6, 'Kollar Primary Agricultural Cooperative Credit Society', 'Clspl.120', 'V.S14aramaniyan', 'Secretary', '9994348832', 'Main road,Kollar &post,70 Tk,71 Dt,604302', '604206', 1, NULL, NULL),
(32, 37, 70, 6, 'Kooteripatu Primary Agricultural Cooperative Credit Society', 'Clspl.162', 'K. K14ENDRAN', 'Clerk', '7397008967', '88, Mailam Road, Kootteripattu , KOOTTERIPATTU POST, 70 TK, 71 DT604302', '604302', 1, NULL, NULL),
(33, 37, 70, 6, 'Naduvananthal Primary Agricultural Cooperative Credit Society', 'Fv.15', 'V. VELLIYANGIRI', 'SECRATRAY', '9786625199', 'ponniyamman kovil street, kallakolathur village veliyanur post, tindivannam taluk, 71 dist604304', '604304', 1, NULL, NULL),
(34, 37, 70, 6, 'Pallapattu Primary Agricultural Cooperative Credit Society', 'Clspl.153', 'R. JAYSANKAR', 'SECRATRAY', '9444709755', 'Mariyamman koil street ,Pallapattu,sendur post,70 TK,71 Dist, 604 302', '604302', 1, NULL, NULL),
(35, 37, 70, 6, 'Pathirapuliyur Primary Agricultural Cooperative Credit Society', 'Clspl.160', 'K.SANTHI', 'Junior clerk', '9894030776', 'PATTI STREET,PATHIRAPULIYUR & POST,70 TK,71 DT,604304', '604304', 1, NULL, NULL),
(36, 37, 70, 6, 'Periyatatchur Primary Agricultural Cooperative Credit Society', 'Clspl.196', 'K.TAMILARASI', 'SECRATRAY', '91594 73558', 'ADHIYAMAN STREET, PERIYATHACHUR 605651', '605651', 1, NULL, NULL),
(37, 37, 70, 6, 'Peramandur Primary Agricultural Cooperative Credit Society', 'Fv.81', 'G.SEKAR', 'SECRATRAY', '9790179265', 'MAIN ROAD, PERAMANDUR, 70 TK, 71 DT, 604302', '604302', 1, NULL, NULL),
(38, 37, 70, 6, 'Rettanai Primary Agricultural Cooperative Credit Society', 'Clspl.93', 'S.TAMILSELVI', 'clerk ', '7200757294', 'BAZZAR STREET ,RETTANAI & PO 70 TK 71 DIST ,604306', '604306', 1, NULL, NULL),
(39, 37, 70, 6, 'Veedur Primary Agricultural Cooperative Credit Society', 'Clspl.108', 'M.SARANGABANI', 'Secretary', '9787095112', 'Main road ,veedur&post,70 Tk,71 DT,605652', '605652', 1, NULL, NULL),
(40, 37, 70, 6, 'Vilangampaadi Primary Agricultural Cooperative Credit Society', 'Clspl.145', 'R.IYAPPAN', 'Secretary', '9840806615', 'SCHOOL STREET, MOZHIYANUR, MOZHIYANUR POST, 70 TK, VILLUPRAM DT,604306', '604306', 1, NULL, NULL),
(41, 37, 70, 6, 'Vizhukkam Primary Agricultural Cooperative Credit Society', 'Clspl.89', 'T THATCHAYANI', 'CLERK', '9791379255', 'Selliamman koil Street,Vizhukkam & Post 70 - tk 71 dt.', '604206', 1, NULL, NULL),
(42, 37, 70, 6, 'Anumantyhai Primary Agricultural Cooperative Credit Society', 'Clspl.158', 'Selvan .D', 'Secretary ', '9944415788', 'Anumanthai & PO        Marakkanam TK. 71 Dt.', '604303', 1, NULL, NULL),
(43, 37, 70, 6, 'Alankuppam Primary Agricultural Cooperative Credit Society', 'Ii 123', 'Murugesn R', 'Secretary ', '9790455146', 'Munnur  PO        Marakkanam TK. 71 Dt.', '604303', 1, NULL, NULL),
(44, 37, 70, 6, 'T Brammadesam Primary Agricultural Cooperative Credit Society', 'Clspl 154', 'Purushothaman  E', 'Secretary ', '9443535660', 'Brammadesam& PO        Marakkanam TK. 71 Dt.', '604303', 1, NULL, NULL),
(45, 37, 70, 6, 'Endiyur Primary Agricultural Cooperative Credit Society', 'Clspl 136', 'Ramamurthy K', 'Secretary ', '9486430246', 'Endiyur & po     70 Tk.    71 Dt.', '604001', 1, NULL, NULL),
(46, 37, 70, 6, 'Guruvammapettai Primary Agricultural Cooperative Credit Society', 'Clspl 255', 'Sampath V', 'Secretary ', '9443667720', 'Guruvammapettai.                  Endiyur & po  70 Tk. 71 Dt.', '604001', 1, NULL, NULL),
(47, 37, 70, 6, 'Jakkampettai Primary Agricultural Cooperative Credit Society', 'Clspl 121', 'Nirmala ', 'clerk ', '9489841338', 'Jagampettai.    Thenpazar & po  70 Tk. 71 Dt.', '604001', 1, NULL, NULL),
(48, 37, 70, 6, 'Kanthadu Primary Agricultural Cooperative Credit Society', 'Clspl 146', 'Santhanam', 'clerk ', '8148093825', 'Kanthdu & PO        Marakkanam TK. 71 Dt.', '604303', 1, NULL, NULL),
(49, 37, 70, 6, 'Kiledayalam Primary Agricultural Cooperative Credit Society', 'Clspl 105', 'Ananthasayanan.TMP', 'Secretary ', '9894369443', 'Kiledayalam & Po       70 Tk. 71 Dt', '604001', 1, NULL, NULL),
(50, 37, 70, 6, 'Marakkanam Primary Agricultural Cooperative Credit Society', 'Clspl 106', 'Vengatesan V', 'Secretary ', '9443292619', 'Marakkanam  & PO        Marakkanam TK. 71 Dt.', '604303', 1, NULL, NULL),
(51, 37, 70, 6, 'Omandur Primary Agricultural Cooperative Credit Society', 'Clspl 117', 'Balavelayutham K', 'Secretary ', '9789694225', 'Omanthur & Po       70 Tk. 71 Dt', '604001', 1, NULL, NULL),
(52, 37, 70, 6, 'Omippair Primary Agricultural Cooperative Credit Society', 'Clspl 123', 'Babu K', 'Secretary ', '9952532450', 'Omippair& PO        Marakkanam TK. 71 Dt.', '604303', 1, NULL, NULL),
(53, 37, 70, 6, 'Vadaalapakkam Primary Agricultural Cooperative Credit Society', 'Clspl 154', 'Gobisankar ', 'clerk ', '9791981751', 'Vadaalapakam.   Vittalapurampo     70 Tk. 71 Dt', '604001', 1, NULL, NULL),
(54, 37, 70, 6, 'Vadakodipakkam Primary Agricultural Cooperative Credit Society', 'Clspl 111', 'Purushothaman  E', 'Secretary ', '9443535660', 'Vadakodippakkam     Alaththur& PO             Marakkanam TK.         71 Dt.', '604001', 1, NULL, NULL),
(55, 37, 70, 6, 'Vepperi Primary Agricultural Cooperative Credit Society', 'Clspl 157', 'S. RAVICHANDRAN', 'Secretary', '7708739229', 'Veppery                           Siruvadi  & PO                  Marakkanam TK.          71 Dt.', '604303', 1, NULL, NULL),
(56, 37, 70, 6, 'Athipattu Primary Agricultural Cooperative Credit Society', 'Clspl 62', 'R.Sambath', 'Secretary', '9443308433', 'ATHIPATTUVill&PO),MELMALAYANUR(TK),\n71(D.T) ', '604 152', 1, NULL, NULL),
(57, 37, 70, 6, 'Eyyil Primary Agricultural Cooperative Credit Society', 'Clspl 103', 'Baskaran', 'Secretary', '9443217657', 'MELSEVALAMBADI ROAD, EYYIL VILLAGE & POST, MELMALAIYANUR TK, 71 DISTRICT ', '604204', 1, NULL, NULL),
(58, 37, 70, 6, 'Kannalam Primary Agricultural Cooperative Credit Society', 'Clspl 139', 'Jayabal', 'Clerk', '9597271178', 'Main Road,Kannalam Village,valathi post,', '604208', 1, NULL, NULL),
(59, 37, 70, 6, 'Mananthal Primary Agricultural Cooperative Credit Society', 'Clspl 126', 'Sampath', 'Secretary', '9443308433', 'MANANTAL(VILL&PO),MELMALAYANUR(TK),\n71(D.T)  ', '604 204', 1, NULL, NULL),
(60, 37, 70, 6, 'Melvailamoor Primary Agricultural Cooperative Credit Society', 'Clspl 125', 'M.Bavani ', 'Secretary ', '9486281436', 'Melmalayanur Road, Avalurpet (Vill&Post), Melmalayanur (TK), 71 (DT)', '604201', 1, NULL, NULL),
(61, 37, 70, 6, 'Sathampadi Primary Agricultural Cooperative Credit Society', 'Ii 96', 'Ravichandran', 'Secretary ', '9597870915', 'Kaplambadi Road, Sathambadi Village And Post  ', '604204', 1, NULL, NULL),
(62, 37, 70, 6, 'Peruvaloor Primary Agricultural Cooperative Credit Society', 'Clspl 112', 'Jaganathan', 'Secretary ', '9486515419', 'SAVADI STREET PERUVALUR V&POST', '604208', 1, NULL, NULL),
(63, 37, 70, 6, 'Unnamananthal Primary Agricultural Cooperative Credit Society', 'Clspl 75', 'Ganansekaran', 'Secretary ', '9894589960', 'Unnamananthal 6 (at)melsevalambadi village & post, melmalayanur (TK),Villuppuram (DT)', '604204', 1, NULL, NULL),
(64, 37, 70, 6, 'Vadapalai Primary Agricultural Cooperative Credit Society', 'Clspl 66', 'Govintharaj', 'Secretary ', '9994347718', 'Gingee Main road, Vadapalai (village & post), Melmalaiyanur(TK), 71 (DT).', '604204', 1, NULL, NULL),
(65, 37, 70, 6, 'Avanipur Primary Agricultural Cooperative Credit Society', 'Clspl 137', 'PADMAVATHI', 'SECRETARY', '9597241333', 'AVANIPUR VILLAGE & POST ', '604101', 1, NULL, NULL),
(66, 37, 70, 6, 'Kunnappakkam Primary Agricultural Cooperative Credit Society', 'Clspl 107', 'Kumar', 'Clerk', '9150755960', 'Kunnapakkam  Village  & Post ', '604101', 1, NULL, NULL),
(67, 37, 70, 6, 'Nolambur Primary Agricultural Cooperative Credit Society', 'Clspl 156', 'K. ARUMUGAM', 'SECRETARY', '8754057917', 'Nolambur & post 70 TK ', '604307', 1, NULL, NULL),
(68, 37, 70, 6, 'Melpakkam Primary Agricultural Cooperative Credit Society', 'Clspl 148', 'MUTHUKUMAR', 'CLERK', '8056965796', 'MELPAKKAMVILLEGE IYYANTHOPPU POST 70', '604307', 1, NULL, NULL),
(69, 37, 70, 6, 'Nallathur Primary Agricultural Cooperative Credit Society', 'Clspl 88', 'T. MURTHY', 'SECRETARY', '9566942333', 'Nallathur Village  & Post ', '604305', 1, NULL, NULL),
(70, 37, 70, 6, 'Ongur Primary Agricultural Cooperative Credit Society', 'Clspl 99', ' K.ARUMUGAM', 'Secretary  I/C', '8754057917', 'ONGUR VILLAGE & POST', '604305', 1, NULL, NULL),
(71, 37, 70, 6, 'Saram Primary Agricultural Cooperative Credit Society', 'Clspl 104', 'G.ARASU', 'SECRETARY', '9790141038', 'SARAM VILLAGE & POST', '604307', 1, NULL, NULL),
(72, 37, 70, 6, 'T. Athipakkam Primary Agricultural Cooperative Credit Society', 'Clspl 122', 'Ananthan', 'secretary', '9367731161', 'T.ATHIPAKKAM VILLAGE & POST', '604207', 1, NULL, NULL),
(73, 37, 70, 6, 'Dhadhapuram Primary Agricultural Cooperative Credit Society', 'Clspl 46', 'anbazhagan', 'secretary ', '9943491409', 'DhadhaPuram village &POST', '604207', 1, NULL, NULL),
(74, 37, 70, 6, 'Puthanadal Primary Agricultural Cooperative Credit Society', 'Clspl 100', 'A.THANGARAJ', 'SECRETARY', '9843096365', 'Vellimedupettai & post 70 TK', '604207', 1, NULL, NULL),
(75, 37, 70, 6, 'Perapperi Primary Agricultural Cooperative Credit Society', 'Clspl 58', 'R.PREMKUMAR', 'CLERK', '8608285069', 'PERAPPERY VILLAGE KARUVAMBAKKAM POST', '604207', 1, NULL, NULL),
(76, 37, 70, 6, 'Kalalipattu Primary Agricultural Cooperative Credit Society', 'Clspl - 267', 'R.Ramasamy', 'CLERK', '9787360281', 'BANK STREET, KALALIPATTU', '604206', 1, NULL, NULL),
(77, 37, 70, 6, 'Kaliyur Primary Agricultural Cooperative Credit Society', 'Clspl - 101', 'G.RAVI', 'SECRETARY IC', '9150136969', 'KALAIYUR AND POST, GINGEE TK.', '604205', 1, NULL, NULL),
(78, 37, 70, 6, 'Kizhumampattu Primary Agricultural Cooperative Credit Society', 'Clspl - 84', 'A.Kannan', 'Cashier', '9442103589', 'AMMACHARAMMAN KOVIL STREET, KEEZHUMAMPATTU', '605651', 1, NULL, NULL),
(79, 37, 70, 6, 'Kongarapattu Primary Agricultural Cooperative Credit Society', 'Clspl -59', 'G.RAVI', 'SECRETARY', '9150136969', 'MAIN ROAD, KONGARAPATTU', '604306', 1, NULL, NULL),
(80, 37, 70, 6, 'Melolakkur Primary Agricultural Cooperative Credit Society', 'Clspl -143', 'V.Elangovan', 'SECRETARY', '9944903911', 'NEAR BY MELOLAKKUR PHC, MELOLAKKUR', '604203', 1, NULL, NULL),
(81, 37, 70, 6, 'Melsevoor Primary Agricultural Cooperative Credit Society', 'E - 229', 'B. Jayakumar', 'Cashier', '9344110996', 'ESWARAN KOVIL NEAR, MELSEVOOR', '604306', 1, NULL, NULL),
(82, 37, 70, 6, 'Melsithamoor Primary Agricultural Cooperative Credit Society', 'Clspl -161', 'V.TAMILMANI', 'SECRETARY', '8838539362', 'NEAR BY JAIN KOVIL, MELSITHAMOOR', '604206', 1, NULL, NULL),
(83, 37, 70, 6, 'Modaiyur Primary Agricultural Cooperative Credit Society', 'Clspl -95', 'M.Jayasankaran', 'SECRETARY', '77089170231', 'KEELMAMPATTU MAIN ROAD, MODAIYUR', '604206', 1, NULL, NULL),
(84, 37, 70, 6, 'Nagandur Primary Agricultural Cooperative Credit Society', 'Clspl -130', 'S.BALARAMAN', 'Secreatry', '9150105280', 'MAIN ROAD, NAGANDUR VILLAGE AND POST, GINGEE TK., 71 DT.,', '605651', 1, NULL, NULL),
(85, 37, 70, 6, 'Neganur Primary Agricultural Cooperative Credit Society', 'Clspl -67', 'P.Moorthi', 'Clerk', '9442719043', 'MAIN ROAD, NEGANUR', '604202', 1, NULL, NULL),
(86, 37, 70, 6, 'Pennagar Primary Agricultural Cooperative Credit Society', 'Clspl -97', 'J. Sivakumar', 'Secreatry', '9087119695', 'NEAR BY EB OFFICE, PENNAGAR', '604210', 1, NULL, NULL),
(87, 37, 70, 6, 'Thaiyur Primary Agricultural Cooperative Credit Society', 'Clspl-49', 'E.SARAVANAN', 'Secreatry', '9578995543', 'COLONY STREET, THAIYUR', '604205', 1, NULL, NULL),
(88, 37, 71, 3, 'The 71 District Consumer Co-op Wholesale Store Ltd', 'CL.SPL.32', 'K.Thilshath', 'Assistant', '8526862921', 'No.14, Ranganathan Road, 71', '605602', 1, NULL, NULL),
(89, 37, 71, 4, '71 District Co-Operative Union Ltd.,', 'F.V.110', 'T.Sudhar', 'Assistant', '9894870093', '64, VAO Nagar, Vazhudhareddy, 71', '605 401', 1, NULL, NULL),
(90, 37, 71, 6, ' Kanai Primary AgricultureCooperative Credit Society', 'Cl.SPl. 135 ', 'D.Murthy', 'Secretary', '6380573998', 'Thirukovilur Main Road ,Kanai &  Post 71 Tk&Dt Pin:605301', '605301', 1, NULL, NULL),
(91, 37, 71, 6, ' Kalpattu Primary Agriculture Cooperative  Credit Society', 'Cl.SPl. 60  ', 'S.Arumugam', 'Clerk', '9943788643', 'Agragara Street ,Kalpattu &  Post 71 Tk&Dt Pin:605302', '605302', 1, NULL, NULL),
(92, 37, 71, 6, ' Mambalapattu  Primary Agriculture Cooperative  Credit Society', 'Cl.SPl. 56  ', 'D.Ravi', 'Secretary', '9943266545', 'Thirukovilur Main Road ,Mambalapattu &  Post 71 Tk&Dt Pin:605301', '605301', 1, NULL, NULL),
(93, 37, 71, 6, 'Perumpakkam Primary AgricultureCooperative  Credit Society', 'E 2136 ', 'P.Velu,', 'Secretary', '9585609775', 'Thirukovilur Main Road ,Perumbakkam &  Post 71 Tk&Dt Pin:605301', '605301', 1, NULL, NULL),
(94, 37, 71, 6, 'Kedar Primary AgricultureCooperative  Credit Society', 'Cl.Spl. 166 ', 'L.Moorthy    ', 'Secretary', '9443534700', 'Thiruvana Malai Main Road &  Kedar Post 71 Tk&Dt Pin:605402', '605402', 1, NULL, NULL),
(95, 37, 71, 6, 'Nallapalayam Primary Agriculture Cooperative  Credit Society', 'Cl.Spl. 70 ', 'S.Manohar', 'Secretary', '9500992090', 'School St,Nallapalayam   Post Vikaravandi Tk, 71 Dt Pin:605701', '605701', 1, NULL, NULL),
(96, 37, 71, 6, 'Ariyalur Thirukkai Primary AgricultureCooperative  Credit Society', 'Cl.Spl. 50 ', 'R.Elumalai ', 'Secretary', '9952738531', ' Main Road Ariyalur Thirukkai  &  Post 71 Tk&Dt Pin:605402', '605402', 1, NULL, NULL),
(97, 37, 71, 6, 'Siruvalai Primary AgricultureCooperative  Credit Society', 'Cl.Spl. 263 ', 'E.Sangar', 'Secretary', '9865832303', 'Siruvalai & post, Vikkravandi Taluk, 71 DistrIncharge t - 605402 ', '605402', 1, NULL, NULL),
(98, 37, 71, 6, 'Anniyur Primary Agriculture Cooperative  Credit Society', 'E.2025', 'Valavarasan.P', 'Secretary', '6382631408', 'Kamaraj Street ,Anniyur &  Post,Vikkiravandi Tk, 71 Dt Pin:605202', '605202', 1, NULL, NULL),
(99, 37, 71, 6, 'Keelperumpakkam  Primary Agriculture Cooperative  Credit Society', 'FV.17', 'V.Ravichandran', 'Secretary', '9442124838', 'No.25.Devara Street,Keelperumpakkam,71.605602', '605602', 1, NULL, NULL),
(100, 37, 71, 6, 'V.Anangur  Primary Agriculture Cooperative  Credit Society', 'CL.SPL.68', 'R.Kumar', 'Secretary', '9786228000', 'No.7.Agrahara Street , Anangur, 71', '605103', 1, NULL, NULL),
(101, 37, 71, 6, ' Arasamangalam  Primary Agriculture Cooperative  Credit Society', 'CL.SPL.43', 'T.Kaliyamoorthy ', 'Clerk', '9842107090', 'No.217. Tharmarajar Kovil Street ,Arasamangalam, Sernthanur( Post,)71 (Dist)', '605103', 1, NULL, NULL),
(102, 37, 71, 6, ' Valavanur   Primary Agriculture Cooperative  Credit Society', 'E.2026', 'T.Anbazhagan', 'Senior Clerk', '9894805670', ' No, 746 Eswaran Kovil Street  Valavanur,71', '605108', 1, NULL, NULL),
(103, 37, 71, 6, 'Salaiagaram  Primary Agriculture Cooperative  Credit Society', 'C.L.SPL 147', 'K.Manibalan', 'Secretary', '9443877785', 'Mariyamman Kovil Oppsite ,Near By Gh Hospital ,Koliyanur(Post),71(Tk)', '605103', 1, NULL, NULL),
(104, 37, 71, 6, 'Nannadu  Primary Agriculture Cooperative  Credit Society', 'CL.SPL.85', 'G.Raguraman', 'Secretary', '8220873583', 'Kaaliyamman Kovil Street,Nannadu & Post,71', '605301', 1, NULL, NULL),
(105, 37, 71, 6, 'Thiruvamathur  Primary Agriculture Cooperative  Credit Society', 'CL.SPL.52', 'M. Jeevananatham', 'Secretary', '7550312337', 'Thiruvamathur Mani Road, Thiruvamathur& Post 71 Tk & Dt.', '605402', 1, NULL, NULL),
(106, 37, 71, 6, 'Vedampattu  Primary Agriculture Cooperative  Credit Society', 'C.L.SPL-138', 'A.Kuppusamy', 'Secretary', '8838270848', 'Pillaiyar Kovil Street,Kondangi,Kondangi (Post),71 605301', '605301', 1, NULL, NULL),
(107, 37, 71, 6, ' Kandamanadi  Primary Agriculture Cooperative  Credit Society', 'E-2028', 'N.Kurinchi Selvan', 'Asst.Secretary', '9994426384', 'Pillaiyar Kovil Street', '605602', 1, NULL, NULL),
(108, 37, 71, 6, 'Ayyur Agaram Primary Agriculture Cooperative  Credit Society', 'CLSPL140', 'V.Kumragur14aran', 'Secretary', '9843277492', 'Ayyur Agaram & Post, Vikaravandi Taluk. Villupurm Dist', '605 601', 1, NULL, NULL),
(109, 37, 71, 6, 'V.Brammadesam Primary Agriculture Cooperative  Credit Society', 'CLSPL90', 'K.Soundhar Rajan', 'Secretary', '9655724356', 'V.Brammadesam & Post, Kanjanur (Way) Vikaravandi Taluk. Villupurm Dist', '605 203', 1, NULL, NULL),
(110, 37, 71, 6, 'Chinnathachur Primary Agriculture Cooperative  Credit Society', 'CLSPL71', 'V.Kumragur14aran', 'Secretary Incharge ', '9843277492', 'Chinnathacur, T.Pudupalayam Post, Vikaravandi Taluk. 605652', ' 605 652', 1, NULL, NULL),
(111, 37, 71, 6, 'Kaspakaranai Primary Agriculture Cooperative  Credit Society', 'CLSPL 44', 'V.Parthiban Babu', 'Secretary', '9787188931', 'Kaspakaranai, Asokapuri & Post, Vikaravandi Taluk.Villupurm Dist', '605 203', 1, NULL, NULL),
(112, 37, 71, 6, 'Nemur Primary Agriculture Cooperative  Credit Society', 'E.2196', 'S.Malathi', 'Secretary', '9543375407', 'Nemur & Post, Vikaravandi Taluk. Villupurm Dist', '605 203', 1, NULL, NULL),
(113, 37, 71, 6, 'Vembi  Primary Agriculture Cooperative  Credit Society', 'CLSPL48', 'R.Sharmila', 'Secretary', '9789378236', 'Vempi & Post, Vikaravandi Taluk.Villupurm Dist', '605 203', 1, NULL, NULL),
(114, 37, 71, 6, 'Mundiyambakkam Primary Agriculture Cooperative  Credit Society', 'CLSPL53', 'K.Sundaramoorthy', 'Secretary', '9994355265', 'Mundiyampakkam & Post, Vikaravandi Taluk.Villupurm Dist', '605 601', 1, NULL, NULL),
(115, 37, 71, 6, 'Vikravandi Primary Agriculture Cooperative  Credit Society', 'E.2044', 'V.Parthiban Babu', 'Secretary Incharge ', '9787188931', 'Vikravandi & Post, Vikaravandi Taluk.Villupurm Dist', '605 652', 1, NULL, NULL),
(116, 37, 71, 6, 'Mathurapakkam Primary Agriculture Cooperative  Credit Society', 'E.2105', ' A.Sandhanam ', 'Secretary', '9626742345', 'Madurapakkam& Post, Vikaravandi Taluk.Villupurm Dist', '605 501', 1, NULL, NULL),
(117, 37, 71, 6, 'Panayapuram Primary Agriculture Cooperative  Credit Society', 'CLSPL57', 'A.Muthukumaran', 'Secretary', '9245308190', 'Main Road, Panaiyapuram & Post, Vikaravandi Taluk.Villupurm Dist', '605 601', 1, NULL, NULL),
(118, 37, 71, 6, 'Rathapuram Primary Agriculture Cooperative  Credit Society', 'E.2213', 'R.Sharmila', 'Secretary Incharge ', '9789378236', 'Radhapuram & Post, Vikaravandi Taluk.Villupurm Dist', '605 601', 1, NULL, NULL),
(119, 37, 71, 6, 'Thennavarayanpattu Primary Agriculture Cooperative  Credit Society', 'CLSPL72', 'K.Sundaramoorthy', 'Secretary Incharge ', '9994355265', 'Thenvarayanpattu, Vakkur Post , Vikaravandi Taluk.Villupurm Dist', '605 601', 1, NULL, NULL),
(120, 37, 71, 6, 'Vakkur Primary Agriculture Cooperative  Credit Society', 'E.2287', 'A.Muthukumaran', 'Secretary Incharge ', '9245308190', 'Vakkur & Post, Vikaravandi Taluk. Villupurm Dist', '605 601', 1, NULL, NULL),
(121, 37, 71, 6, 'Chinnababusamuthiram Primary Agriculture Cooperative  Credit Society', 'CLSPL51', 'P.Purushothaman', 'Secretary', '9843714272', 'Perumal Kovil Stree,Chinnababusamuthiram & Post , Vikkiravani Tk ,71 Distrincharge T ', ' 605102', 1, NULL, NULL),
(122, 37, 71, 6, 'Kandamangalam Primary Agriculture  Cooperative  Credit Society', 'CL SPL 114', 'K.Manikkavel', 'Secretary Incharge', '9442891443', 'Mariyamman Kovil Street , Kandamangalam & Post 71 Distrincharge T ', '605102', 1, NULL, NULL),
(123, 37, 71, 6, 'Mutrampattu Primary Agriculture Cooperative  Credit Society', 'E2481', 'B.Chandiran', 'Secretary Incharge', '9894623571', 'Pondi Main Road ,Mutrampattu & Post Vikkiravandi Tk,71 Distrincharge T ', '605501', 1, NULL, NULL),
(124, 37, 71, 6, 'Pudhukuppam Primary Agriculture Cooperative  Credit Society', 'CL SPL 81', 'B.Chandiran', 'Secretary', '9894623571', 'Thirumangalam Road, Pidhukuppam ,Thirumangalam Post ,Vikkiravandi Tk,71 Distrincharge T ,', '605501', 1, NULL, NULL),
(125, 37, 71, 6, 'Pallithennal Primary Agriculture Cooperative  Credit Society', 'E 2011', 'P.Purushothaman', 'Secretary Incharge', '9843714272', 'Pondi Main Road,Pallithennel & Post ,71 Tk & Distrincharge T ', '605102', 1, NULL, NULL),
(126, 37, 71, 6, 'Vathanur Primary Agriculture Cooperative  Credit Society', 'CL SPL 102', 'R.Radhakrishnan', 'Secretary', '9677993757', 'Thirukanur Main Road , Puranasingupalayam, Vikkaravandi Tk ,71 Distrincharge T,', '605107', 1, NULL, NULL),
(127, 37, 71, 6, 'Vazhuthavur Primary Agriculture Cooperative  Credit Society', 'CL SPL 113', 'A.Santhanam', 'Secretary Incharge', '9626742345', 'Agarakaram Street,Vazhuthavur & Post ,Vikkaravandi Tk ,71 Distrincharge T ,', '605502', 1, NULL, NULL),
(128, 37, 71, 6, 'Kongampattu Primary Agriculture Cooperative  Credit Society', 'E.747/7852', 'P.Palani', 'Secretary', '9655385131', 'Cuddalore Main Road,Kongampattu', '605105', 1, NULL, NULL),
(129, 37, 71, 6, 'Rampakkam Primary AgricultureCooperative  Credit Society', 'E1213', 'A.Parthasarathy', 'Secretary', '7845397459', 'Rampakkam & Post, 71 Taluk', '605105', 1, NULL, NULL),
(130, 37, 71, 6, 'Sornavur Melpathy Primary Agriculture Cooperative  Credit Society', 'E2138', 'P.Rajarajan', 'Secretary', '9025369171', 'Sornavurmelpathy & Post', '607104', 1, NULL, NULL),
(131, 37, 71, 6, ' Siruvanthadu Primary Agriculture Cooperative  Credit Society', 'E1495', 'Pk Devaraj', 'Secretary', '9487061183', 'Madukarai Main Road, Siruvanthadu', '605105', 1, NULL, NULL),
(132, 37, 71, 6, 'Mittamandagapattu Primary Agriculture Cooperative  Credit Society', 'E1891', 'A.Parthasarathy', 'Secretary Incharge', '9751533701', 'Midile Street  Mittamandagapattu  &Post  (Via) Nettapakkam .71 T.K&Dist', '605106', 1, NULL, NULL),
(133, 37, 71, 6, 'V.Agaram Primary Agriculture Cooperative  Credit Society', 'E38', 'Sm Seenuvasan', 'Secretary', '9894218360', '176, Perumal Kovil Street, Vagaram & Post ,71 Tk & Distrincharge T ', '605105', 1, NULL, NULL),
(134, 37, 71, 6, 'Vadavambalam Primary Agriculture Cooperative  Credit Society ', 'E1089', 'V.Dhulasiraman', 'Secretary', '9443879122', 'Main Road Vadavambalam Kallippattu Post 71 Tk &Distrincharge T', '605105', 1, NULL, NULL),
(135, 37, 71, 6, 'Eraiyur Primary Agriculture Cooperative  Credit Society', 'CLSPL.266', 'R.Devakannu', 'Clerk', '9566367578', 'Eraiyur &Post,Vanur Taluk,', '0.604304', 1, NULL, NULL),
(136, 37, 71, 6, 'Ottaivanur Primary Agriculture Cooperative  Credit Society', 'CLSPL.167', 'N. Eazhumalai', 'Secretary', '9500677299', 'Mailam Main Road, Vanur& Post', '605109', 1, NULL, NULL),
(137, 37, 71, 6, 'Pombur Primary Agriculture Cooperative  Credit Society', 'CLSPL 164', 'S. Baskaran', 'Clerk', '9488811992', 'Pombur & Post,Vanur Taluk', '605652', 1, NULL, NULL),
(138, 37, 71, 6, 'Thennagaram Primary Agriculture Cooperative  Credit Society', 'FV.16', 'K. Sarala', 'Clerk', '9655758117', 'Keezhkoothapakkam.Kiliyanur Post.Vanur Taluk', '604102', 1, NULL, NULL),
(139, 37, 71, 6, 'Thenkodipakkam Primary Agriculture Cooperative  Credit Society', 'CLSPL134', 'P. Parthiban', 'Clerk', '9786081969', 'Thenkodipakkam & Post.Vanur Taluk', '604102', 1, NULL, NULL),
(140, 37, 71, 6, 'Thiruchitrambalam Primary Agriculture Cooperative  Credit Society', 'CLSPL.119', 'M Rajanbabu', 'Secretary', '9486534890', '70-Pondy Main Road, Thiruchitrambalam& Post, Vanur Taluk', '605111', 1, NULL, NULL),
(141, 37, 71, 6, 'V.Parangini Primary Agriculture Cooperative Credit Soceity', 'CLSP.149', 'B Ravichandran', 'Secretary', '9445219396', 'Mailam Main Road, V.Parangini & Post,Vanur Taluk', '605109', 1, NULL, NULL),
(142, 37, 71, 6, 'Irumbai Primary Agriculture Cooperative  Credit Society', 'CLSPL124', 'R Vengatesan', 'Asst. Secretary', '9791475175', 'Irumbai&Post.Vanur Taluk', '605111', 1, NULL, NULL),
(143, 37, 71, 6, 'Kodur Primary Agriculture Cooperative Credit Soceity', 'CLSPL118', 'V.Gunaseelan', 'Secretary', '8056706802', 'Kodur& Post,Vanur Taluk', '605109', 1, NULL, NULL),
(144, 37, 71, 6, 'Nallavur Primary Agriculture Cooperative  Credit Society', 'ClSPL112', 'P. Jayakrishnan', 'Clerk', '8344641575', 'Nallavur & Post,Vanur Taluk', '604154', 1, NULL, NULL),
(145, 37, 71, 6, 'Thollamur Primary Agriculture Cooperative Credit Soceity', 'FV.9', 'K.Dhanasekaran', 'Secretary ', '9445181978', ' Thollamur, Eraiyur Post,Vanur Taluk', '604304', 1, NULL, NULL),
(146, 37, 71, 6, 'Kiliyanur Primary Agriculture Cooperative Credit Soceity', 'CLSPL83', 'V Kanagarajan', 'Asst. Secretary', '9843696888', 'Kiliyanur& Post, Vanur Taluk', '604102', 1, NULL, NULL),
(147, 37, 71, 6, 'Katrampakkam Primary Agriculture Cooperative Credit Soceity', 'CLSPL165', 'Thulasidoss', 'Secretary', '9842408132', 'Katrampakkam &Post.Vanur Taluk', '605109', 1, NULL, NULL),
(148, 37, 71, 6, 'Thiruvennainallur Primary Agriculture Cooperative Credit Soceity', 'II 600 ', 'Saravanan M', 'Clerk', '9943482809', 'Ulundurpet Road Thiruvennainallur And Taluk 71 Dt ', '607203', 1, NULL, NULL),
(149, 37, 71, 6, 'Anathur Primary Agriculture Cooperative Credit Soceity', 'II 90', 'Ganesan', 'Clerk', '9786902402', 'Kambatham Street Anathur(Po), Anathur  Thiruvennainallur Taluk 71 Dt ', '607107', 1, NULL, NULL),
(150, 37, 71, 6, 'T.Edaiyar Primary Agriculture Cooperative Credit Soceity', 'II 706', 'K.Muthusamy', 'Secretary', '9786004714', 'Main Road T.Edaiyar & Post Thiruvennainallur (Tk)Villupurm (Dt)-607203', '607203', 1, NULL, NULL),
(151, 37, 71, 6, 'Arasur Primary Agriculture Cooperative Credit Soceity', 'II 606', 'K.Vanistri', 'Secretary', '7010359263', 'Trincharge Hy Main Road,Arasur & (Po), Thiruvennainallur (Tk), 71 (Dt).', '607107', 1, NULL, NULL),
(152, 37, 71, 6, 'Perangiyur Primary Agriculture Cooperative Credit Soceity', 'II 540', 'N.Swaminathan', 'Secretary', '9943426392', 'Iyyar Street,Perangiyur & Post,Tthiruvennainallur(T.K),71(D.T)-607107', '607107', 1, NULL, NULL),
(153, 37, 71, 6, 'Emappur Primary Agriculture Cooperative Credit Soceity', 'II630', 'J.Kalaivani', 'Fertilizer Salesman,Clerk', '6380453959', 'Perumal Kovil Street,Emappur Post,Thiruvennainallur Tk,71 Dist,Pincode-607203', '607203', 1, NULL, NULL),
(154, 37, 71, 6, 'Sithanangur Primary Agriculture Cooperative Credit Soceity', 'II705', 'B.Shaikmoosa ', 'Secretary', '9994540186', 'Reddiyar Street, Mamandur Arumpattu Post, Thiruvennainallur(T.K), 71(D.T)-607107', '607107', 1, NULL, NULL),
(155, 37, 71, 6, 'Periyasevalai Primary Agriculture Cooperative Credit Soceity', 'II 597', 'Tamilselvi.K', 'Asst .Secretary', '9360868150', 'Chetty Street Periyasevalai And Post T.V Nalur Tk 71 Dt', '607209', 1, NULL, NULL),
(156, 37, 71, 6, 'Amoor Primary Agriculture Cooperative Credit Soceity', 'II 713', 'A. Annadurai', 'Secretary', '9943426161', 'Kulakarai Street, Amoorkuppam, Amoor Post, Thiruvennainallur Tk, 71 Dt.', '607209', 1, NULL, NULL),
(157, 37, 71, 6, 'Pavanthur Primary Agriculture Cooperative Credit Soceity', 'II 670', 'J.Iyanar', 'Secratory', '7339614974', 'Mariyamman Koil Street Pavanthur Post Thiruvennainallur Tk 71 Dt 607209', '607209', 1, NULL, NULL),
(158, 37, 71, 6, 'Sithalingamadam Primary Agriculture Cooperative Credit Soceity', 'II 65', 'A,K Jaisankar', 'Secretary', '9751222547', 'North Street Sithalingamadam And Post , Thiruvennainallur T.K , 71 Dt', '605803', 1, NULL, NULL),
(159, 37, 71, 6, 'Semmar Primary Agriculture Cooperative Credit Soceity', 'II 561', 'A. Raveendar', 'Fertilizer Salesman', '7094105414', 'Main Road, Semmar, Thiruvennainallur(TK), 71(DT)', '607107', 1, NULL, NULL),
(160, 37, 71, 6, 'Mugaiyur Primary Agriculture Cooperative Credit Soceity', 'II.633', 'S.Balaguru ', 'Secretary', '9445730714', 'Kandachipuram Road,Mugaiyur Post Kandachipuram Tk, 71 Dt ', '605755', 1, NULL, NULL),
(161, 37, 71, 6, 'Sithathur Primary Agriculture Cooperative Credit Soceity', 'II.601', 'S.Sekar ', 'Secretary', '9965327842', 'Thirukovilur Main Road, Sithathur Post, Kandachipuram Tk,71', '605701', 1, NULL, NULL),
(162, 37, 71, 6, ' Kadaganur Primary Agriculture Cooperative Credit Soceity', 'II.297', 'Arumugam', 'Clerk', '9585976229', 'Mettu Street, Kadaganur Post, Kandachipuram Tk,71 Dt', '605755', 1, NULL, NULL),
(163, 37, 71, 6, ' Paiyur Primary Agriculture Cooperative Credit Soceity', 'II.651', ' R.Murugan', 'Secretary', '9865691984', '8,North Street, Paiyur Post, Thiruvennainallur Tk, 71 Dt ', '607203', 1, NULL, NULL),
(164, 37, 71, 6, 'T.Devanur Primary Agriculture Cooperative Credit Soceity', 'II.653', 'N.Ravi ', 'Secretary', '8344624797', 'Vaniyar Street,T Devanur Post, Kandachipuram Tk, 71 Dt', '605752', 1, NULL, NULL),
(165, 37, 71, 6, ' Veerapandi Primary Agriculture Cooperative Credit Soceity', 'II.520', 'R.Radhakrishnan', 'Secretary', '9789354456', 'Ottampattu Main Road, Veerapondy Post, Kandachipuram Tk, 71 Dt', '605758', 1, NULL, NULL),
(166, 37, 71, 6, ' Kandachipuram Primary Agriculture Cooperative Credit Soceity', 'II.637', 'G Visithra', 'Secretary   Incharge ', '8300793145', 'Thiruvannamalai Main Road, Kandachipuram Post, Kandachipuram Tk,71 Dt', '605701', 1, NULL, NULL),
(167, 37, 71, 6, ' Arakandanallur Primary Agriculture Cooperative Credit Soceity', 'E.1503', ' P.Murugan', 'Secretary', '7845475325', 'Kamarajar Road,71 Main Road, Arakandanallur Post,71 Dt', '605752', 1, NULL, NULL),
(168, 37, 71, 6, ' Aa.Gudalore Primary Agriculture Cooperative Credit Soceity', 'II.518', 'P.Balaji', 'Secretary', '9566273209', 'Arcadu Main Road, Ayandoor Post,  Kandachipuram Tk,71 Dt,', '605755', 1, NULL, NULL),
(169, 37, 71, 6, ' Arcadu Primary Agriculture Cooperative Credit Soceity', 'II.576', 'Arunachalam', 'Assistant Secretary', '9942204325', 'Kulathu Street, Arcadu Post,  Kandachipuram Tk,71 Dt', '605755', 1, NULL, NULL),
(170, 37, 71, 6, 'Thiruvennainallur Primary Agriculture Cooperative Credit Soceity -II', 'II.55', 'M.Saravanan', 'Secretary   Incharge ', '9943482809', 'West Street, Thiruvennainallur Taluk, 71 Dt.', '607203', 1, NULL, NULL),
(171, 37, 71, 9, '71 District Co-Operative Printing 9 Ltd.,', 'F.V. 111', 'A. Chandrasekaran', 'Clerk / Manager I/c', '8675942542', 'No. 389, Trichy Main Road, Vazhudhareddy, 71.', '605401', 1, NULL, NULL),
(172, 37, 71, 10, 'F.V.22 Panamalaipettai Co-op Store Ltd., Panamalaipettai', 'F.V.22', 'P.Dharmarajan', 'Manager', '9786243578', 'Gingee Main Road, Panamalai Post, Vikkiravandi Taluk, 71 ', ' 605 201', 1, NULL, NULL),
(173, 37, 71, 15, 'V Marudur Urban Cooperative  Credit Society ', 'CLSPL82 ', 'V.Sugumar', 'Secretary', '9363319871', 'No.49 Kuppusamy Muthaliyar Street,V Marudhur 71', '605602', 1, NULL, NULL),
(174, 37, 71, 12, ' Government 71 Medical College Staff\'S And12  Ltd., Mundiyambakkam, 71 - 605601', 'VPM - I', 'N Sivakumar', 'Manager(Incharge)', '8838311371', 'Mundiyampakkam, 71', '605601', 1, NULL, NULL),
(175, 37, 71, 1, 'Thiruvennainallur Agricultural Producer Cooperative Society', 'E 1181', 'M.Saravanan', 'Secretary Incharge', '9943482808', 'East Street, Thiruvennainallur & Taluk 71', '607203', 1, NULL, NULL),
(176, 37, 71, 1, '71 Agricultural Producer Cooperative Society', 'E 1429', 'R.Saraswathi', 'Clerk', '8870097100', '1 A, East Shanmugapuram Colony 71', '605602', 1, NULL, NULL),
(177, 37, 71, 0, '71 District Central Cooperative Bank', 'F V 101', 'R.Ravichandran', 'General Manager', '7598758671', 'No2 Hospital Road, 71 ', '605602', 1, NULL, NULL),
(178, 37, 71, 5, '71, Cuddalore & Kallakurichi District P14lic Works Department Employees Cooperative Thrift And Credit Society Limited.,', 'F.V.25', 'Mohan. P', 'Secretary', '9443996927', 'Plot No 64, Sudhagar Nagar Main Road, 71.', '605602', 1, NULL, NULL),
(179, 37, 71, 5, '71 And Kallakurichi District Non Agri Credit Cooperative Sicieties Employees Cooperative Thrift And Credit Society Ltd.,', 'F.T.101', 'Babu. K', 'Secretary', '9443350915', '28,Saibaba Street, Sudhagar Nagar, 71. ', '605602', 1, NULL, NULL),
(180, 37, 71, 5, 'Kanai Panchayat Union Teachers Co-Operative Thrift And Credit Society', 'FT13', 'Egambaram ', 'Secretary ', '9486518015', 'No 6, Chairman S14rayar Street, Shanmugapuram West, Near Bharani Hospital, 71 ', '605602', 1, NULL, NULL),
(181, 37, 71, 5, '71 And Kallakurichi District Highways Department Employees Co Operative Society Ltd ', 'F.V.122', 'Suresh Babu.P', 'Secretary ', '9677898467', 'Divisional Engineering Highways Office Campus Trichy Main Road 71 ', '605401', 1, NULL, NULL),
(182, 37, 71, 5, 'Rajshree Sugars Employees Co-Op. Thrift & Credit Society Ltd', 'FV13', 'Getha', 'Secretary  Incharge', '9962736209', 'Rajsrhee Sugars, Mundiyampakkam', '605601', 1, NULL, NULL),
(183, 37, 71, 5, ' Chengalrayan Co.Op Sugar Mills Employees Co.Op Thrift And Credit Society', 'F.T87', 'N.Ramamoorthy', 'Secretary', '9626083515', 'Chengalrayan Sugar Mill Campus,Ccsm Nagar , Periyasevalai', '607209', 1, NULL, NULL),
(184, 37, 71, 5, 'Mugaiyur Panchayat Union And Aided School Teacher And Employees Co-Operative Thrift And Credit Society Ltd.', 'F.T.93.', 'V.Dhandapani.', 'Secretary Incharge', '9486182056', 'No.243.Gandhistreet.Manampoondi.Kandachipuram.Taluk.71 District.', '605759', 1, NULL, NULL),
(185, 37, 71, 5, '71 And Kallakuruchi District P14lic Health Employees Cooperative Thirft And Credit Society .,', 'FV.112', 'Vasudevan.E', 'Secretary ', '9952328987', '60 Kandasamy Layout , 71 ', '605602', 1, NULL, NULL),
(186, 37, 71, 5, '71 And Kallakurichi District Agriculture Department Employees Co-Operative Thrift&Credit Society Ltd.,', 'F.V.113', 'K.Santhappan', 'Secretary', '9894640230', 'Join Director Of Agriculture Office Building', '605 602', 1, NULL, NULL),
(187, 37, 71, 5, '71 District Nutrition Scheme Employees Cooperative Thrift And Credit Society Ltd.', 'F.V.121', 'R.Mallika', 'Secretary', '8098897999', 'No.19 ,Narayanan Nagar Midle St,', '605 602', 1, NULL, NULL),
(188, 37, 71, 5, ' Kandamangalam Panchayat Union Teachers Coop. Thrift And Credit Society', 'F.T.66', 'D. Krishnamoorthy', 'Secretary', '9344810004', 'Bdo Office Campaus, Pudhucherry Main Road, Kandamangalam.- ', '605102', 1, NULL, NULL),
(189, 37, 71, 5, 'Vikiravandi Panchayat Union Teachers Coop. Thrift And Credit Society Ltd.,', 'F.T.73', 'A. Geetha,', ' Secretary ', '9445727915', 'No:28,Saibaba Street, Sudhagar Nagar, 71. -', '605602', 1, NULL, NULL),
(190, 37, 71, 5, 'Koliyanur Panchayat Union Teachers Coop. Thrift And Credit Society', 'F.T.88', 'P. Sampath, ', 'Secretary, ', '9791557609', 'No:117, East Pondy Road, Koliyanur. ', '605103', 1, NULL, NULL),
(191, 37, 71, 5, ' 71 Taluk Aided School Teachers Co0Op. Thrift And Credit Society Ltd.,', 'F.T.89', 'D. Srinivasan,', 'Secretary, ', '97902 16545', 'No.10.Kamal Nagar, Trichi Main Road, 71 ', '605 602', 1, NULL, NULL),
(192, 37, 71, 5, '71 District. Milk Producers Employees Co0Op. Thrift And Credit Society Ltd.,', 'F.T.90', 'V.Sankaran ', 'Secratary.', '9994324220', 'Trichy Main Road\nVazhuthareddy\nVilluuram', '605602', 1, NULL, NULL),
(193, 37, 71, 5, '71 & 70 Govt. College Employees Coop. Thrift And Credit Society Ltd.,', 'F.T.92', 'E. Vasudevan, ', 'Secretary Incharge', '99523 28987', 'Arignar Anna Govt Arts College Premises, Keelperumpakkam, 71', '. 605 602', 1, NULL, NULL),
(194, 37, 71, 5, ' 71 Dist. Police Dept. Emp. Coop. Thrift And Credit Society Ltd.,', 'F.T.94', 'M. Inbavalli,', ' Secretary', '98429 56583', 'The Superintendent Of Police Office Campus 71 \n. Pin . ', '605 602', 1, NULL, NULL),
(195, 37, 71, 5, '71 Taluk Adi Dravida Welfare Dept. Employees Co0Op. Thrift And Credit Society Ltd.,', 'F.T.98', 'G.Kanagaraj', ' Secretary', '9994252353', 'Rahamath Complex \nFirst Floor \nTrichy Main Road\nE.S.Hospital Near \n71\n', '605 602', 1, NULL, NULL),
(196, 37, 71, 5, '71 Municipal School Teachers Coop. Thrift And Credit Society Ltd.,', 'F.T.99,', 'D.Vaitheesvaran. ', 'Seceratary', '997697959', '60/3E.Kandhasamy Layout, 71', '605103', 1, NULL, NULL),
(197, 37, 71, 5, '71 Dist. Vao\'S Employees Co0Op. Thrift And Credit Society Ltd.,', 'F.T.100', 'Annadurai', '\nSecretary\n', '9443988894', 'No.3,S14athra Complex ,\nKamal Nagar,\n71 \n', '605602', 1, NULL, NULL),
(198, 37, 71, 5, '71 Dist. Medical Dept. Emp. Coop. Thrift And Credit Society Ltd.,', 'F.V.103', 'V.Chitra.', '\nSecratary.\n', '9994270743', 'Govt Hospital Campus\nVilluuram', '605602', 1, NULL, NULL),
(199, 37, 71, 5, '71 Dist. Pacb Employees Co0Op. Thrift And Credit Society Ltd.,', 'F.V.104', '.Kumaravel.A.', 'Secaratary', '9443095319', '12.Ranganathan Road.Krishna 71', '605108', 1, NULL, NULL),
(200, 37, 71, 5, ' 71 Education Dist. School Education Dept. Employees Co0Op. Thrift And Credit Society Ltd.,', 'F.V. 107', 'P.Sampath. ', 'Seceratary ', '9344487052', '2/1023,Vgp Nagar West,Valudhareddy, 71.', '605401', 1, NULL, NULL),
(201, 37, 71, 5, '71 Dist. Revenue Dept. Emp. Coop. Thrift And Credit Society Ltd.,', 'F.V.108,', 'J. Thirugnanasambandam', '\nSecretary\n', '9842389583', 'No 6,1St Floor,\nCollector Office\n71\n', '605602', 1, NULL, NULL),
(202, 37, 71, 5, '71 Dist. Rural Development Dept. Employees Coop. Thrift And Credit Society Ltd.,', 'F.V.109', 'Chandramoulishvaran.', '\nSecratary\n', '9894873912', 'No.26 ,\n2Nd Floor ,\nCollectorate Campus.\n71', '605602', 1, NULL, NULL),
(203, 37, 71, 5, '71 Dist. Agricultural Dept. Employees Co0Op. Thrift And Credit Society Ltd.,', 'F.V.113', 'K.Santhappan ', 'Secretary. ', '9894640230', 'Join Director Of Agriculture Office Building 71', '605602', 1, NULL, NULL),
(204, 37, 71, 5, ' 71 Dist. Coop. Department And Coop. Audit Department Employees Co0Op. Thrift And Credit Society Ltd.,', 'F.V.114', 'R.Ragupathi', ' Secretary ', '9362761628', 'No.102A,\nAdl Nagar\nTrichy Main Road \n71', '605602', 1, NULL, NULL),
(205, 37, 71, 5, '71 Dist. Judicial Dept. Emp. Coop. Thrift And Credit Society Ltd.,', 'F.V.116', 'Mohan. P', 'Secretary(incharge)', '9443996927', 'Court Campus,. 71 District Court ,. 71.', '605602', 1, NULL, NULL),
(206, 37, 71, 5, ' 71 & 70 Rev. Division Village Assistant Employees Co0Op. Thrift And Credit Society Ltd.,', 'F.V.119', 'E.Rajasekaran ', 'Secretary ', '9790071839', 'No:29,Saibaba Street, Sudhagar Nagar, 71. -605602.', '605602', 1, NULL, NULL),
(207, 37, 71, 5, ' 71 Dist. Nutritious Dept. Emp. Coop. Thrift And Credit Society Ltd.,', 'F.V.121', 'R.Maliga', '\nSecretary\n', '8098897999', '19, Narayanan Nagar,\nNedundtheru, Near Ramakrishna \nHr Sec School, \n71- 605602', '605602', 1, NULL, NULL),
(208, 37, 71, 5, '\\71 Municipal Employees Coop. Thrift And Credit Society Ltd.,', 'E.1441', 'E Pughazhendi ', 'Secretary ', '9245275313', 'Municipal Office Old Building, 71', '605602', 1, NULL, NULL),
(209, 37, 71, 5, ' 71 District Government Transport Corporation Employees Cooperative Thrift And Credit Society', 'VPM 3', 'E.Ramalingam.', 'Secretary ', '9443076483', 'No.5 Vallalarnagar, Salamedu, 71 ', '605403', 1, NULL, NULL),
(210, 37, 71, 5, 'Tvnallur 5', 'F.T.96', 'M.Devendiran', 'Secretary ', '9842490264', '57/14,Cuddalore Main Road , T.Vnallur', ' 607 203', 1, NULL, NULL),
(211, 37, 71, 5, 'Vanur Panchayat Union T.C.Society', 'I.I.455', 'E. Ramalingam', '\nSecretary\n', '9443076483', 'T. C Kootroad,\nVanur Taluk\n71\n', '605111', 1, NULL, NULL),
(212, 37, 71, 5, 'Vanur Taluk Nutrician Meals & Vpm District Municipality Town Panchayt Vanur', 'FV 98', 'R. Gowri', '\nSecretary\n', '9842381820', 'T. C Kootroad,\nVanur Taluk\n71\n', '605111', 1, NULL, NULL),
(213, 37, 71, 8, '71 Primary Cooperative Agricultural & Rural Development Bank', 'E -1344', 'R.Thirumalai', 'Secretary', '9943515753', '1,East shanmugapuram colony,east pondy road,71', '605602', 1, NULL, NULL),
(214, 37, 71, 8, 'Vikiravandi Primary Cooperative Agricultural & Rural Development Bank', 'D.R.L(N)10', 'K.Nagarajan', 'Secretary', '9003925431', '1,Singaramudali sandhu,Vikkiravandi taluk,71', '605652', 1, NULL, NULL),
(215, 37, 71, 8, 'Vanur Primary Cooperative Agricultural & Rural Development Bank', 'D.R.L(N)4', 'V.R.Elumalai', 'Secretary', '9500062605', 'Pondy to 70 main road,Thiruchitrambalam post,Vanur taluk,71', '605111', 1, NULL, NULL),
(216, 37, 71, 10, 'Valavanur Cooperative store ', 'E1519', 'Kannan M', 'Manager', '9789257076', 'No. 86,S14ramaniyar kovil street, Valavanur ', '605108', 1, NULL, NULL),
(217, 37, 71, 10, 'Rajsrhee Sugars Employees Co-Operative Stores Ltd', 'CLSPL79', 'Getha', 'Secretary  Incharge', '9962736209', 'Rajshree Sugars and Chemicals ltd., Unit 2, mundiyampakkam', '605601', 1, NULL, NULL),
(218, 37, 71, 12, ' Government Arts College 12 71', 'FV 23', 'S Mohan', 'Secretary', '9894815857', 'Arignar Anna Arts College Campus, 71', '605602', 1, NULL, NULL),
(219, 37, 71, 14, '71 Urban Cooperative Bank', 'E 34', 'A.Kumar', 'General Manager', '7550371387', 'No.149, Thiru.Vi.ka Street, 71 ', '605602', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mtr_societytype`
--

CREATE TABLE `mtr_societytype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `societytype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mtr_societytype`
--

INSERT INTO `mtr_societytype` (`id`, `societytype`, `status`, `created_at`, `updated_at`) VALUES
(1, 'APCMS', 1, NULL, NULL),
(2, 'DCCB', 1, NULL, NULL),
(3, 'DCCWS', 1, NULL, NULL),
(4, 'DCU', 1, NULL, NULL),
(5, 'ECS', 1, NULL, NULL),
(6, 'PACCS', 1, NULL, NULL),
(7, 'PACRDB', 1, NULL, NULL),
(8, 'PCARDB', 1, NULL, NULL),
(9, 'Press', 1, NULL, NULL),
(10, 'Primary \nstore', 1, NULL, NULL),
(11, 'Salt Society', 1, NULL, NULL),
(12, 'Student\'s Co-Operavite Store', 1, NULL, NULL),
(13, 'Type of Society', 1, NULL, NULL),
(14, 'UB', 1, NULL, NULL),
(15, 'UCCS', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '1', 4, '2023-08-17', '45', '34', '453', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-16 20:07:09', '2023-08-16 20:07:09'),
(3, '1', 1, '2023-08-23', '3423', '665', '6565', '165', '165', '1', NULL, NULL, NULL, '615', '56', '6', '2023-08-23 20:48:51', '2023-08-23 20:48:51'),
(4, '1', 2, '2023-08-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '65', '16', NULL, '6515', '61', '2023-08-23 20:48:51', '2023-08-23 20:48:51'),
(5, '1', 4, '2023-08-23', '515', '15', '156', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-23 20:48:51', '2023-08-23 20:48:51'),
(6, '1', 5, '2023-08-23', '6565', NULL, '651', '65', NULL, '15', '1', NULL, '51', '56', NULL, '6', '2023-08-23 20:48:51', '2023-08-23 20:48:51');

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

-- --------------------------------------------------------

--
-- Table structure for table `services_agris`
--

CREATE TABLE `services_agris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_cscs`
--

CREATE TABLE `services_cscs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_drys`
--

CREATE TABLE `services_drys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_farmers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_lodgings`
--

CREATE TABLE `services_lodgings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_customers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_physcial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_pss`
--

CREATE TABLE `services_pss` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_varieties` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_farmers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualitymt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualitylts` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_physical` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_psss`
--

CREATE TABLE `services_psss` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_centres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_farmers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualitymt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualitylts` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_params`
--

CREATE TABLE `student_params` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadhar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otherreligion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plotno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `streetname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pplotno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pstreetname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdistrict` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pstate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ppincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `community` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcaste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Communityfile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isdifferentlyabled` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeofd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iswidow` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isserviceman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tccertificatefile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slmedium` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slnameinst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slYOP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asltotalmark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aslsecumark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aslpercentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slgrade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsmedium` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsnameinst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsYOP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ahstotalmark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ahssecumark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ahspercentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsgrade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ugmedium` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ugnameinst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ugYOP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ugtotalmark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ugsecumark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ugpercentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uggrade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgmedium` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgnameinst` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgYOP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgtotalmark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgsecumark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bgpercentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bggrade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UploadImg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcsign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_id` int(12) DEFAULT NULL,
  `circle_id` int(12) DEFAULT NULL,
  `society_id` int(12) DEFAULT NULL,
  `role` int(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `region_id`, `circle_id`, `society_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'alampoondipaccs144', 'Alampoondi Primary Agricultural Cooperative Credit Society', 'alampoondipaccs144@gmail.com', '2023-08-10 05:41:04', '$2y$10$xY4dzFMF8K4jrQd/ox1Pe.Bc5aCIQPDSlgW1NCdLYu5nMh70Z/rJW', NULL, 71, 70, 6, 5, '2023-08-10 00:32:18', '2023-08-10 00:32:18'),
(2, 'SuperAdmin', 'SuperAdmin', 'superadmin@rcs.com', NULL, '$2y$10$xY4dzFMF8K4jrQd/ox1Pe.Bc5aCIQPDSlgW1NCdLYu5nMh70Z/rJW', NULL, 0, 0, 0, 2, '2023-08-09 19:02:18', '2023-08-09 19:02:18'),
(3, 'E1442', '70 Agricultural Producers Cooperative Marketing Society Ltd.,', 'test@gmail.com', NULL, '$2y$10$xY4dzFMF8K4jrQd/ox1Pe.Bc5aCIQPDSlgW1NCdLYu5nMh70Z/rJW', NULL, 37, 70, 1, 6, '2023-08-20 21:08:02', '2023-08-20 21:08:02'),
(4, 'ECS', 'ECS', 'ecs@gmail.com', NULL, '$2y$10$OlrpoB7uYb2IY.KZ4Xv2WuIMs090w2F5eWZG38KJwhc7Ub.LG6NbS', NULL, 37, 71, 91, 11, '2023-08-22 20:49:41', '2023-08-22 20:49:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `croploan_categorywise`
--
ALTER TABLE `croploan_categorywise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `croploan_cropwise`
--
ALTER TABLE `croploan_cropwise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `croploan_entry`
--
ALTER TABLE `croploan_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `croploan_target`
--
ALTER TABLE `croploan_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_onetimeentry`
--
ALTER TABLE `deposit_onetimeentry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_outstandings`
--
ALTER TABLE `deposit_outstandings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_trans`
--
ALTER TABLE `deposit_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `godowns`
--
ALTER TABLE `godowns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_annual`
--
ALTER TABLE `loan_annual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_onetimeentry`
--
ALTER TABLE `loan_onetimeentry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_overallot`
--
ALTER TABLE `loan_overallot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtr_circle`
--
ALTER TABLE `mtr_circle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtr_deposits`
--
ALTER TABLE `mtr_deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtr_loan`
--
ALTER TABLE `mtr_loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtr_purchase`
--
ALTER TABLE `mtr_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtr_region`
--
ALTER TABLE `mtr_region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtr_role`
--
ALTER TABLE `mtr_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtr_sale`
--
ALTER TABLE `mtr_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtr_society`
--
ALTER TABLE `mtr_society`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtr_societytype`
--
ALTER TABLE `mtr_societytype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_agris`
--
ALTER TABLE `services_agris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_cscs`
--
ALTER TABLE `services_cscs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_drys`
--
ALTER TABLE `services_drys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_lodgings`
--
ALTER TABLE `services_lodgings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_pss`
--
ALTER TABLE `services_pss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_psss`
--
ALTER TABLE `services_psss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_params`
--
ALTER TABLE `student_params`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_params_user_id_unique` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `croploan_categorywise`
--
ALTER TABLE `croploan_categorywise`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `croploan_cropwise`
--
ALTER TABLE `croploan_cropwise`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `croploan_entry`
--
ALTER TABLE `croploan_entry`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `croploan_target`
--
ALTER TABLE `croploan_target`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deposit_onetimeentry`
--
ALTER TABLE `deposit_onetimeentry`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deposit_outstandings`
--
ALTER TABLE `deposit_outstandings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit_trans`
--
ALTER TABLE `deposit_trans`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `godowns`
--
ALTER TABLE `godowns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `loan_annual`
--
ALTER TABLE `loan_annual`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_onetimeentry`
--
ALTER TABLE `loan_onetimeentry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loan_overallot`
--
ALTER TABLE `loan_overallot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `mtr_circle`
--
ALTER TABLE `mtr_circle`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `mtr_deposits`
--
ALTER TABLE `mtr_deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mtr_loan`
--
ALTER TABLE `mtr_loan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mtr_purchase`
--
ALTER TABLE `mtr_purchase`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mtr_region`
--
ALTER TABLE `mtr_region`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `mtr_role`
--
ALTER TABLE `mtr_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mtr_sale`
--
ALTER TABLE `mtr_sale`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mtr_society`
--
ALTER TABLE `mtr_society`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `mtr_societytype`
--
ALTER TABLE `mtr_societytype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services_agris`
--
ALTER TABLE `services_agris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services_cscs`
--
ALTER TABLE `services_cscs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services_drys`
--
ALTER TABLE `services_drys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services_lodgings`
--
ALTER TABLE `services_lodgings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services_pss`
--
ALTER TABLE `services_pss`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services_psss`
--
ALTER TABLE `services_psss`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_params`
--
ALTER TABLE `student_params`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
