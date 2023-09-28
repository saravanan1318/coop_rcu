-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
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
CREATE DATABASE IF NOT EXISTS `tncu_rcu` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `tncu_rcu`;

-- Dumping structure for table tncu_rcu.drpds_indcoserve
CREATE TABLE IF NOT EXISTS `drpds_indcoserve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `indcoservedate` date DEFAULT NULL,
  `three` int(11) DEFAULT NULL,
  `six` int(11) DEFAULT NULL,
  `abovesix` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tncu_rcu.drpds_indcoserve: ~2 rows (approximately)
DELETE FROM `drpds_indcoserve`;
INSERT INTO `drpds_indcoserve` (`id`, `region_id`, `user_id`, `indcoservedate`, `three`, `six`, `abovesix`, `created_at`, `updated_at`) VALUES
	(1, 18, 7558, '2023-09-28', 7, 5, 555, '2023-09-28', '2023-09-28'),
	(2, 18, 7558, '2023-09-28', 1, 1, 1, '2023-09-28', '2023-09-28');

-- Dumping structure for table tncu_rcu.drpds_iso
CREATE TABLE IF NOT EXISTS `drpds_iso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `isodate` date DEFAULT NULL,
  `ftfps` int(11) DEFAULT NULL,
  `ftfpsc` int(11) DEFAULT NULL,
  `wc` int(11) DEFAULT NULL,
  `twc` int(11) DEFAULT NULL,
  `percentage` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tncu_rcu.drpds_iso: ~0 rows (approximately)
DELETE FROM `drpds_iso`;
INSERT INTO `drpds_iso` (`id`, `region_id`, `user_id`, `isodate`, `ftfps`, `ftfpsc`, `wc`, `twc`, `percentage`, `created_at`, `updated_at`) VALUES
	(1, 18, 7558, '2023-09-27', 1, 1, 1, 1, 1, '2023-09-27', '2023-09-27');

-- Dumping structure for table tncu_rcu.drpds_salt
CREATE TABLE IF NOT EXISTS `drpds_salt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `saltdate` date DEFAULT NULL,
  `dl` int(11) DEFAULT NULL,
  `purchase` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tncu_rcu.drpds_salt: ~4 rows (approximately)
DELETE FROM `drpds_salt`;
INSERT INTO `drpds_salt` (`id`, `region_id`, `user_id`, `saltdate`, `dl`, `purchase`, `sale`, `created_at`, `updated_at`) VALUES
	(1, 18, 7558, '2023-09-28', 1, 1, 1, '2023-09-28', '2023-09-28'),
	(2, 18, 7558, '2023-09-28', 1, 1, 1, '2023-09-28', '2023-09-28'),
	(3, 18, 7558, '2023-09-28', 1, 1, 1, '2023-09-28', '2023-09-28'),
	(4, 18, 7558, '2023-09-28', 1, 1, 1, '2023-09-28', '2023-09-28');

-- Dumping structure for table tncu_rcu.drpds_tea
CREATE TABLE IF NOT EXISTS `drpds_tea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teadate` date DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fmc` int(11) DEFAULT NULL,
  `nl` int(11) DEFAULT NULL,
  `purchase` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `percentage` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tncu_rcu.drpds_tea: ~2 rows (approximately)
DELETE FROM `drpds_tea`;
INSERT INTO `drpds_tea` (`id`, `teadate`, `region_id`, `user_id`, `fmc`, `nl`, `purchase`, `sale`, `percentage`, `created_at`, `updated_at`) VALUES
	(1, '2023-09-28', 18, 7558, 10, 10, 11, 11, 11, '2023-09-28', '2023-09-28'),
	(2, '2023-09-28', 18, 7558, 1, 1, 1, 1, 1, '2023-09-28', '2023-09-28');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
