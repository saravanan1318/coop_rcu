-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for tncu_rcu
CREATE DATABASE IF NOT EXISTS `tncu_rcu` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `tncu_rcu`;

-- Dumping structure for table tncu_rcu.croploan_cropwise
CREATE TABLE IF NOT EXISTS `croploan_cropwise` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `croploandate` date NOT NULL,
  `croploan_id` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `noofloan` int(11) NOT NULL,
  `noofamount` int(11) NOT NULL,
  `areacovered` int(11) NOT NULL,
  `newmembernoofloan` int(11) NOT NULL,
  `newmembernoofamount` int(11) NOT NULL,
  `scstnoofloan` int(11) NOT NULL,
  `scstnoofamount` int(11) NOT NULL,
  `womennoofloan` int(11) NOT NULL,
  `womennoofamount` int(11) NOT NULL,
  `sfmfnoofloan` int(11) NOT NULL,
  `sfmfnoofamount` int(11) NOT NULL,
  `ofnoofloan` int(11) NOT NULL,
  `ofnoofamount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tncu_rcu.croploan_cropwise: ~3 rows (approximately)
DELETE FROM `croploan_cropwise`;
INSERT INTO `croploan_cropwise` (`id`, `user_id`, `croploandate`, `croploan_id`, `crop_id`, `noofloan`, `noofamount`, `areacovered`, `newmembernoofloan`, `newmembernoofamount`, `scstnoofloan`, `scstnoofamount`, `womennoofloan`, `womennoofamount`, `sfmfnoofloan`, `sfmfnoofamount`, `ofnoofloan`, `ofnoofamount`, `created_at`, `updated_at`) VALUES
	(1, 114, '2023-09-05', 5, 7, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, '2023-09-04 20:35:14', '2023-09-04 20:35:14'),
	(2, 114, '2023-09-05', 5, 8, 13, 14, 155, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, '2023-09-04 20:35:14', '2023-09-04 20:35:14'),
	(3, 114, '2023-09-05', 5, 10, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 501, 502, 503, '2023-09-04 20:35:14', '2023-09-04 20:35:14');

-- Dumping structure for table tncu_rcu.croploan_entry
CREATE TABLE IF NOT EXISTS `croploan_entry` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `croploandate` date NOT NULL,
  `noofappreceived` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noofappsanctioned` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noofapppending` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalcultivatedarea` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cultivatedarealoanissuedto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outstandingno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outstandingamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overdueno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overdueamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tncu_rcu.croploan_entry: ~5 rows (approximately)
DELETE FROM `croploan_entry`;
INSERT INTO `croploan_entry` (`id`, `user_id`, `croploandate`, `noofappreceived`, `noofappsanctioned`, `noofapppending`, `totalcultivatedarea`, `cultivatedarealoanissuedto`, `outstandingno`, `outstandingamount`, `overdueno`, `overdueamount`, `created_at`, `updated_at`) VALUES
	(1, 1, '2023-08-22', '1561', '6516', '564651', '651', '61', '61', '', '651', '61', '2023-08-21 21:10:11', '2023-08-21 21:10:11'),
	(2, 1, '2023-08-22', '1561', '6516', '564651', '651', '61', '61', '', '651', '61', '2023-08-21 21:10:24', '2023-08-21 21:10:24'),
	(3, 114, '2023-09-05', '250', '50', '200', '800000', '450000', '75', '85400', '98', '965000', '2023-09-04 20:34:12', '2023-09-04 20:34:12'),
	(4, 114, '2023-09-05', '250', '50', '200', '800000', '450000', '75', '85400', '98', '965000', '2023-09-04 20:34:49', '2023-09-04 20:34:49'),
	(5, 114, '2023-09-05', '250', '50', '200', '800000', '450000', '75', '85400', '98', '965000', '2023-09-04 20:35:14', '2023-09-04 20:35:14');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
