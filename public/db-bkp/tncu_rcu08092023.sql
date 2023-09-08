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

-- Dumping structure for table tncu_rcu.jr_dai
CREATE TABLE IF NOT EXISTS `jr_dai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `daidate` date DEFAULT NULL,
  `ob` int(11) DEFAULT NULL,
  `recommended_action` varchar(255) NOT NULL,
  `action_taken` varchar(255) NOT NULL,
  `disposal` varchar(255) NOT NULL,
  `percentage_of_disposal` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tncu_rcu.jr_dai: ~2 rows (approximately)
DELETE FROM `jr_dai`;
INSERT INTO `jr_dai` (`id`, `daidate`, `ob`, `recommended_action`, `action_taken`, `disposal`, `percentage_of_disposal`) VALUES
	(1, '2023-09-08', 10, '12', '10', '5', 50.00),
	(2, '2023-09-08', 10, '12', '10', '5', 50.00);

-- Dumping structure for table tncu_rcu.jr_disqualify
CREATE TABLE IF NOT EXISTS `jr_disqualify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disqualifydate` date DEFAULT NULL,
  `societies_ob` int(11) NOT NULL,
  `board_of_directors_ob` int(11) NOT NULL,
  `societies_im` int(11) NOT NULL,
  `board_of_directors_im` int(11) NOT NULL,
  `societies_total` int(11) NOT NULL,
  `board_of_directors_total` int(11) NOT NULL,
  `societies_dam` int(11) NOT NULL,
  `board_of_directors_dam` int(11) NOT NULL,
  `societies_pam` int(11) NOT NULL,
  `board_of_directors_pam` int(11) NOT NULL,
  `societies_pp` int(11) NOT NULL,
  `board_of_directors_pp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tncu_rcu.jr_disqualify: ~1 rows (approximately)
DELETE FROM `jr_disqualify`;
INSERT INTO `jr_disqualify` (`id`, `disqualifydate`, `societies_ob`, `board_of_directors_ob`, `societies_im`, `board_of_directors_im`, `societies_total`, `board_of_directors_total`, `societies_dam`, `board_of_directors_dam`, `societies_pam`, `board_of_directors_pam`, `societies_pp`, `board_of_directors_pp`) VALUES
	(1, '2023-09-08', 80, 10, 90, 12, 170, 22, 12, 22, 34, 22, 12, 35);

-- Dumping structure for table tncu_rcu.jr_eightyone
CREATE TABLE IF NOT EXISTS `jr_eightyone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eightyonedate` date DEFAULT NULL,
  `ob_eighty_one` int(11) NOT NULL,
  `ordered_this_month_eighty_one` int(11) NOT NULL,
  `total_ob_ordered_eighty_one` int(11) NOT NULL,
  `completed_this_month_eighty_one` int(11) NOT NULL,
  `pending_within_3_months_eighty_one` int(11) NOT NULL,
  `pending_in_3_to_6_months_eighty_one` int(11) NOT NULL,
  `pending_above_6_months_eighty_one` int(11) NOT NULL,
  `total_pending_eighty_one` int(11) NOT NULL,
  `pending_percentage_eighty_one` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tncu_rcu.jr_eightyone: ~1 rows (approximately)
DELETE FROM `jr_eightyone`;
INSERT INTO `jr_eightyone` (`id`, `eightyonedate`, `ob_eighty_one`, `ordered_this_month_eighty_one`, `total_ob_ordered_eighty_one`, `completed_this_month_eighty_one`, `pending_within_3_months_eighty_one`, `pending_in_3_to_6_months_eighty_one`, `pending_above_6_months_eighty_one`, `total_pending_eighty_one`, `pending_percentage_eighty_one`) VALUES
	(1, '2023-09-08', 15, 5, 20, 5, 5, 5, 5, 15, 75.00);

-- Dumping structure for table tncu_rcu.jr_eightytwo
CREATE TABLE IF NOT EXISTS `jr_eightytwo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eightytwodate` date DEFAULT NULL,
  `ob_eighty_two` int(11) NOT NULL,
  `ordered_this_month_eighty_two` int(11) NOT NULL,
  `total_ob_ordered_eighty_two` int(11) NOT NULL,
  `completed_this_month_eighty_two` int(11) NOT NULL,
  `pending_within_3_months_eighty_two` int(11) NOT NULL,
  `pending_in_3_to_6_months_eighty_two` int(11) NOT NULL,
  `pending_above_6_months_eighty_two` int(11) NOT NULL,
  `total_pending_eighty_two` int(11) NOT NULL,
  `pending_percentage_eighty_two` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tncu_rcu.jr_eightytwo: ~1 rows (approximately)
DELETE FROM `jr_eightytwo`;
INSERT INTO `jr_eightytwo` (`id`, `eightytwodate`, `ob_eighty_two`, `ordered_this_month_eighty_two`, `total_ob_ordered_eighty_two`, `completed_this_month_eighty_two`, `pending_within_3_months_eighty_two`, `pending_in_3_to_6_months_eighty_two`, `pending_above_6_months_eighty_two`, `total_pending_eighty_two`, `pending_percentage_eighty_two`) VALUES
	(1, '2023-09-08', 15, 5, 20, 5, 5, 5, 5, 15, 75.00);

-- Dumping structure for table tncu_rcu.jr_seventeena
CREATE TABLE IF NOT EXISTS `jr_seventeena` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seventeenadate` date DEFAULT NULL,
  `disciplinary_ob_seventeena` int(11) NOT NULL,
  `initiated_during_month_seventeena` int(11) NOT NULL,
  `disciplinary_total_seventeena` int(11) NOT NULL,
  `disposed_this_month_seventeena` int(11) NOT NULL,
  `disciplinary_pending_seventeena` int(11) NOT NULL,
  `disciplinary_pending_percentage_seventeena` decimal(5,2) NOT NULL,
  `disciplinary_ob_seventeenb` int(11) NOT NULL,
  `initiated_during_month_seventeenb` int(11) NOT NULL,
  `disciplinary_total_seventeenb` int(11) NOT NULL,
  `disposed_this_month_seventeenb` int(11) NOT NULL,
  `disciplinary_pending_seventeenb` int(11) NOT NULL,
  `disciplinary_pending_percentage_seventeenb` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tncu_rcu.jr_seventeena: ~1 rows (approximately)
DELETE FROM `jr_seventeena`;
INSERT INTO `jr_seventeena` (`id`, `seventeenadate`, `disciplinary_ob_seventeena`, `initiated_during_month_seventeena`, `disciplinary_total_seventeena`, `disposed_this_month_seventeena`, `disciplinary_pending_seventeena`, `disciplinary_pending_percentage_seventeena`, `disciplinary_ob_seventeenb`, `initiated_during_month_seventeenb`, `disciplinary_total_seventeenb`, `disposed_this_month_seventeenb`, `disciplinary_pending_seventeenb`, `disciplinary_pending_percentage_seventeenb`) VALUES
	(1, '2023-09-08', 80, 10, 90, 12, 78, 86.67, 12, 22, 34, 22, 12, 35.29);

-- Dumping structure for table tncu_rcu.jr_surcharge
CREATE TABLE IF NOT EXISTS `jr_surcharge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surchargedate` date DEFAULT NULL,
  `surcharge_order_issued_number` varchar(255) NOT NULL,
  `surcharge_issued_amount` decimal(10,2) NOT NULL,
  `numbers_collected_during_month` int(11) NOT NULL,
  `collected_amount` decimal(10,2) NOT NULL,
  `balance_numbers` int(11) NOT NULL,
  `balance_amount` decimal(10,2) NOT NULL,
  `percentage_of_collection` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table tncu_rcu.jr_surcharge: ~2 rows (approximately)
DELETE FROM `jr_surcharge`;
INSERT INTO `jr_surcharge` (`id`, `surchargedate`, `surcharge_order_issued_number`, `surcharge_issued_amount`, `numbers_collected_during_month`, `collected_amount`, `balance_numbers`, `balance_amount`, `percentage_of_collection`) VALUES
	(1, '2023-09-08', '100', 33.00, 50, 50.00, 33, 33.00, 50.00),
	(2, '2023-09-08', '100', 33.00, 50, 50.00, 33, 33.00, 50.00);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
