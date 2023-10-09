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
CREATE DATABASE IF NOT EXISTS `tncu_rcu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `tncu_rcu`;

-- Dumping structure for table tncu_rcu.jr_project
CREATE TABLE IF NOT EXISTS `jr_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectdate` date DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_no_of_society` int(11) DEFAULT NULL,
  `total_no_of_work_supply_orders` int(11) DEFAULT NULL,
  `column_no4_civil` varchar(255) DEFAULT NULL,
  `column_no4_machineries` varchar(255) DEFAULT NULL,
  `yet_to_be_started` varchar(255) DEFAULT NULL,
  `foundation_basement` varchar(255) DEFAULT NULL,
  `lintel_level` varchar(255) DEFAULT NULL,
  `roofing_level` varchar(255) DEFAULT NULL,
  `electrical_plastering_painting` varchar(255) DEFAULT NULL,
  `work_completed` varchar(255) DEFAULT NULL,
  `remarks_civil` varchar(255) DEFAULT NULL,
  `machineries_purchased` varchar(255) DEFAULT NULL,
  `machineries_put_into_use` varchar(255) DEFAULT NULL,
  `income_generated` varchar(255) DEFAULT NULL,
  `remarks_machineries` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table tncu_rcu.jr_project: ~1 rows (approximately)
DELETE FROM `jr_project`;
INSERT INTO `jr_project` (`id`, `projectdate`, `region_id`, `user_id`, `total_no_of_society`, `total_no_of_work_supply_orders`, `column_no4_civil`, `column_no4_machineries`, `yet_to_be_started`, `foundation_basement`, `lintel_level`, `roofing_level`, `electrical_plastering_painting`, `work_completed`, `remarks_civil`, `machineries_purchased`, `machineries_put_into_use`, `income_generated`, `remarks_machineries`, `created_at`, `updated_at`) VALUES
	(1, NULL, 37, 39, 0, 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2023-10-09', '2023-10-09');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
