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

-- Dumping structure for table tncu_rcu.drpds_bys
CREATE TABLE IF NOT EXISTS `drpds_bys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `starteddate` date DEFAULT NULL,
  `prb` int(11) DEFAULT NULL,
  `fps` int(11) DEFAULT NULL,
  `cas` int(11) DEFAULT NULL,
  `cc` int(11) DEFAULT NULL,
  `cfc` int(11) DEFAULT NULL,
  `cnc` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tncu_rcu.drpds_bys: ~1 rows (approximately)
DELETE FROM `drpds_bys`;
INSERT INTO `drpds_bys` (`id`, `region_id`, `user_id`, `starteddate`, `prb`, `fps`, `cas`, `cc`, `cfc`, `cnc`, `created_at`, `updated_at`) VALUES
	(1, 18, 7558, '2023-09-27', 16, 2, 2, 2, 2, 2, '2023-09-27', '2023-09-27');

-- Dumping structure for table tncu_rcu.drpds_facelifting
CREATE TABLE IF NOT EXISTS `drpds_facelifting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `faceliftingdate` date DEFAULT NULL,
  `fpsb` int(11) DEFAULT NULL,
  `fpsp` int(11) DEFAULT NULL,
  `due` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tncu_rcu.drpds_facelifting: ~0 rows (approximately)
DELETE FROM `drpds_facelifting`;
INSERT INTO `drpds_facelifting` (`id`, `region_id`, `user_id`, `faceliftingdate`, `fpsb`, `fpsp`, `due`, `created_at`, `updated_at`) VALUES
	(1, 18, 7558, '2023-09-27', 18, 10, 10, '2023-09-27', '2023-09-27');


-- Dumping structure for table tncu_rcu.drpds_byi
CREATE TABLE IF NOT EXISTS `drpds_byi` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `region_id` int(11) DEFAULT NULL,
    `user_id` int(11) DEFAULT NULL,
    `prb` int(11) DEFAULT NULL,
    `fps` int(11) DEFAULT NULL,
    `fpsc` int(11) DEFAULT NULL,
    `identifieddate` date DEFAULT NULL,
    `updated_at` date DEFAULT NULL,
    `created_at` date DEFAULT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tncu_rcu.drpds_byi: ~3 rows (approximately)
DELETE FROM `drpds_byi`;
INSERT INTO `drpds_byi` (`id`, `region_id`, `user_id`, `prb`, `fps`, `fpsc`, `identifieddate`, `updated_at`, `created_at`) VALUES
                                                                                                                               (1, 0, NULL, 16, 6, 10, '2023-09-26', NULL, NULL),
                                                                                                                               (2, 18, NULL, 400, 444, 444, '2023-09-26', '2023-09-26', '2023-09-26'),
                                                                                                                               (3, 18, 7558, 400, 44, 44, '2023-09-26', '2023-09-26', '2023-09-26');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
