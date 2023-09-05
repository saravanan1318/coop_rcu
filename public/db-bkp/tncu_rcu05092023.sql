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

-- Dumping structure for table tncu_rcu.dr
CREATE TABLE IF NOT EXISTS `dr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ob` varchar(255) DEFAULT NULL,
  `ordered_this_month` int(11) DEFAULT NULL,
  `total_ob_ordered` int(11) DEFAULT NULL,
  `completed_this_month` int(11) DEFAULT NULL,
  `pending_within_3_months` int(11) DEFAULT NULL,
  `pending_in_3_to_6_months` int(11) DEFAULT NULL,
  `pending_above_6_months` int(11) DEFAULT NULL,
  `total_pending` int(11) DEFAULT NULL,
  `pending_percentage` float DEFAULT NULL,
  `disciplinary_ob` varchar(255) DEFAULT NULL,
  `initiated_during_month` int(11) DEFAULT NULL,
  `disciplinary_total` int(11) DEFAULT NULL,
  `disposed_this_month` int(11) DEFAULT NULL,
  `disciplinary_pending` int(11) DEFAULT NULL,
  `disciplinary_pending_percentage` float DEFAULT NULL,
  `recommended_action` varchar(255) DEFAULT NULL,
  `action_taken` varchar(255) DEFAULT NULL,
  `disposal` varchar(255) DEFAULT NULL,
  `percentage_of_disposal` float DEFAULT NULL,
  `surcharge_order_issued_number` varchar(255) DEFAULT NULL,
  `surcharge_issued_amount` int(11) DEFAULT NULL,
  `numbers_collected_during_month` int(11) DEFAULT NULL,
  `collected_amount` int(11) DEFAULT NULL,
  `balance_numbers` int(11) DEFAULT NULL,
  `balance_amount` int(11) DEFAULT NULL,
  `percentage_of_collection` float DEFAULT NULL,
  `disqualification_36` varchar(255) DEFAULT NULL,
  `ob_36` int(11) DEFAULT NULL,
  `initiated_during_month_36` int(11) DEFAULT NULL,
  `total_36` int(11) DEFAULT NULL,
  `disposed_this_month_36` int(11) DEFAULT NULL,
  `pending_end_of_month_36` int(11) DEFAULT NULL,
  `pending_percentage_36` float DEFAULT NULL,
  `societies_36` int(11) DEFAULT NULL,
  `board_of_directors_36` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tncu_rcu.dr: ~0 rows (approximately)
DELETE FROM `dr`;

-- Dumping structure for table tncu_rcu.jr
CREATE TABLE IF NOT EXISTS `jr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ob` varchar(255) DEFAULT NULL,
  `ordered_this_month` int(11) DEFAULT NULL,
  `total_ob_ordered` int(11) DEFAULT NULL,
  `completed_this_month` int(11) DEFAULT NULL,
  `pending_within_3_months` int(11) DEFAULT NULL,
  `pending_in_3_to_6_months` int(11) DEFAULT NULL,
  `pending_above_6_months` int(11) DEFAULT NULL,
  `total_pending` int(11) DEFAULT NULL,
  `pending_percentage` float DEFAULT NULL,
  `disciplinary_ob` varchar(255) DEFAULT NULL,
  `initiated_during_month` int(11) DEFAULT NULL,
  `disciplinary_total` int(11) DEFAULT NULL,
  `disposed_this_month` int(11) DEFAULT NULL,
  `disciplinary_pending` int(11) DEFAULT NULL,
  `disciplinary_pending_percentage` float DEFAULT NULL,
  `recommended_action` varchar(255) DEFAULT NULL,
  `action_taken` varchar(255) DEFAULT NULL,
  `disposal` varchar(255) DEFAULT NULL,
  `percentage_of_disposal` float DEFAULT NULL,
  `surcharge_order_issued_number` varchar(255) DEFAULT NULL,
  `surcharge_issued_amount` int(11) DEFAULT NULL,
  `numbers_collected_during_month` int(11) DEFAULT NULL,
  `collected_amount` int(11) DEFAULT NULL,
  `balance_numbers` int(11) DEFAULT NULL,
  `balance_amount` int(11) DEFAULT NULL,
  `percentage_of_collection` float DEFAULT NULL,
  `disqualification_36` varchar(255) DEFAULT NULL,
  `ob_36` int(11) DEFAULT NULL,
  `initiated_during_month_36` int(11) DEFAULT NULL,
  `total_36` int(11) DEFAULT NULL,
  `disposed_this_month_36` int(11) DEFAULT NULL,
  `pending_end_of_month_36` int(11) DEFAULT NULL,
  `pending_percentage_36` float DEFAULT NULL,
  `societies_36` int(11) DEFAULT NULL,
  `board_of_directors_36` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tncu_rcu.jr: ~0 rows (approximately)
DELETE FROM `jr`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
