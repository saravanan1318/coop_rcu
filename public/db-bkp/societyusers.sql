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

-- Dumping structure for table tncu_rcu.circlenew
CREATE TABLE IF NOT EXISTS `circlenew` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.croploan_categorywise
CREATE TABLE IF NOT EXISTS `croploan_categorywise` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `croploandate` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.croploan_cropwise
CREATE TABLE IF NOT EXISTS `croploan_cropwise` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `croploandate` int(11) NOT NULL,
  `crop_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.croploan_entry
CREATE TABLE IF NOT EXISTS `croploan_entry` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.croploan_target
CREATE TABLE IF NOT EXISTS `croploan_target` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `month` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `target` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.deposit
CREATE TABLE IF NOT EXISTS `deposit` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) DEFAULT NULL,
  `depositdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.deposits
CREATE TABLE IF NOT EXISTS `deposits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_id` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depositdate` date DEFAULT NULL,
  `recievedno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recievedamount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closedno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closedamount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.deposit_onetimeentry
CREATE TABLE IF NOT EXISTS `deposit_onetimeentry` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(45) NOT NULL,
  `deposit_id` varchar(45) NOT NULL,
  `overall_outstanding` varchar(45) DEFAULT NULL,
  `current_outstanding` varchar(45) DEFAULT NULL,
  `current_year` varchar(45) DEFAULT NULL,
  `annual_target` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.deposit_outstandings
CREATE TABLE IF NOT EXISTS `deposit_outstandings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.deposit_trans
CREATE TABLE IF NOT EXISTS `deposit_trans` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `deposit_id` int(12) DEFAULT NULL,
  `deposittype_id` int(12) DEFAULT NULL,
  `recievedno` int(12) DEFAULT NULL,
  `recievedamount` int(12) DEFAULT NULL,
  `closedno` int(12) DEFAULT NULL,
  `closedamount` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.godowns
CREATE TABLE IF NOT EXISTS `godowns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `godowndate` date DEFAULT NULL,
  `count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilized` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentageutilized` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.loan
CREATE TABLE IF NOT EXISTS `loan` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) DEFAULT NULL,
  `loandate` date DEFAULT NULL,
  `loantype_id` int(12) DEFAULT NULL,
  `disbursedno` int(12) DEFAULT NULL,
  `disbursedamount` int(12) DEFAULT NULL,
  `collectedno` int(12) DEFAULT NULL,
  `collectedamount` int(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.loan_annual
CREATE TABLE IF NOT EXISTS `loan_annual` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.loan_onetimeentry
CREATE TABLE IF NOT EXISTS `loan_onetimeentry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(45) NOT NULL,
  `loan_id` varchar(45) NOT NULL,
  `overall_outstanding` varchar(45) DEFAULT NULL,
  `current_outstanding` varchar(45) DEFAULT NULL,
  `current_year` varchar(45) DEFAULT NULL,
  `annual_target` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.loan_overallot
CREATE TABLE IF NOT EXISTS `loan_overallot` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.localhost2
CREATE TABLE IF NOT EXISTS `localhost2` (
  `COL 1` varchar(9) DEFAULT NULL,
  `COL 2` varchar(9) DEFAULT NULL,
  `COL 3` varchar(14) DEFAULT NULL,
  `COL 4` varchar(250) DEFAULT NULL,
  `COL 5` varchar(30) DEFAULT NULL,
  `COL 6` varchar(52) DEFAULT NULL,
  `COL 7` varchar(60) DEFAULT NULL,
  `COL 8` varchar(11) DEFAULT NULL,
  `COL 9` varchar(250) DEFAULT NULL,
  `COL 10` varchar(7) DEFAULT NULL,
  `COL 11` varchar(78) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.mtr_circle
CREATE TABLE IF NOT EXISTS `mtr_circle` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` bigint(20) unsigned NOT NULL,
  `circle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `circle_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6501 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.mtr_deposits
CREATE TABLE IF NOT EXISTS `mtr_deposits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deposit_name` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.mtr_loan
CREATE TABLE IF NOT EXISTS `mtr_loan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `loantype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.mtr_purchase
CREATE TABLE IF NOT EXISTS `mtr_purchase` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `purchase_name` varchar(255) DEFAULT NULL,
  `status` int(12) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.mtr_region
CREATE TABLE IF NOT EXISTS `mtr_region` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `region_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=341 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.mtr_role
CREATE TABLE IF NOT EXISTS `mtr_role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.mtr_sale
CREATE TABLE IF NOT EXISTS `mtr_sale` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `sale_name` varchar(255) DEFAULT NULL,
  `status` int(12) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.mtr_society
CREATE TABLE IF NOT EXISTS `mtr_society` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` bigint(20) unsigned NOT NULL,
  `circle_id` bigint(20) unsigned NOT NULL,
  `societytype_id` bigint(20) unsigned NOT NULL,
  `society_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7427 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.mtr_societytype
CREATE TABLE IF NOT EXISTS `mtr_societytype` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `societytype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `societycode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `societyname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.mtr_society_copy
CREATE TABLE IF NOT EXISTS `mtr_society_copy` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` bigint(20) unsigned NOT NULL,
  `circle_id` bigint(20) unsigned NOT NULL,
  `societytype_id` bigint(20) unsigned NOT NULL,
  `society_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for view tncu_rcu.newsociety
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `newsociety` (
	`region_id` TINYINT(4) NULL,
	`circle_id` TINYINT(4) NULL,
	`societytype_id` TINYINT(4) NULL,
	`society_name` VARCHAR(250) NULL COLLATE 'utf8mb4_general_ci',
	`registration_no` VARCHAR(250) NULL COLLATE 'utf8mb4_general_ci',
	`staff_name` VARCHAR(250) NULL COLLATE 'utf8mb4_general_ci',
	`designation` VARCHAR(250) NULL COLLATE 'utf8mb4_general_ci',
	`mobile_no` BIGINT(20) NULL,
	`address` VARCHAR(250) NULL COLLATE 'utf8mb4_general_ci',
	`pincode` MEDIUMINT(9) NULL,
	`email` VARCHAR(250) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for table tncu_rcu.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.purchases
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.regonnew
CREATE TABLE IF NOT EXISTS `regonnew` (
  `id` tinyint(4) NOT NULL,
  `regionname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.services_agris
CREATE TABLE IF NOT EXISTS `services_agris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.services_cscs
CREATE TABLE IF NOT EXISTS `services_cscs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.services_drys
CREATE TABLE IF NOT EXISTS `services_drys` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_farmers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.services_lodgings
CREATE TABLE IF NOT EXISTS `services_lodgings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_customers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_physcial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.services_pss
CREATE TABLE IF NOT EXISTS `services_pss` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_varieties` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_farmers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualitymt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualitylts` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_physical` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.services_psss
CREATE TABLE IF NOT EXISTS `services_psss` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_centres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_farmers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualitymt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualitylts` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.societytypenew
CREATE TABLE IF NOT EXISTS `societytypenew` (
  `id` tinyint(4) NOT NULL,
  `society` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for view tncu_rcu.society_new
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `society_new` (
	`region_id` TINYINT(4) NULL,
	`circle_id` TINYINT(4) NULL,
	`societytype_id` TINYINT(4) NULL,
	`society_name` VARCHAR(250) NULL COLLATE 'utf8mb4_general_ci',
	`registration_no` VARCHAR(250) NULL COLLATE 'utf8mb4_general_ci',
	`staff_name` VARCHAR(250) NULL COLLATE 'utf8mb4_general_ci',
	`designation` VARCHAR(250) NULL COLLATE 'utf8mb4_general_ci',
	`mobile_no` BIGINT(20) NULL,
	`address` VARCHAR(250) NULL COLLATE 'utf8mb4_general_ci',
	`pincode` MEDIUMINT(9) NULL,
	`email` VARCHAR(250) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for table tncu_rcu.student_params
CREATE TABLE IF NOT EXISTS `student_params` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_params_user_id_unique` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.table
CREATE TABLE IF NOT EXISTS `table` (
  `regionname` varchar(250) DEFAULT NULL,
  `circlename` varchar(250) DEFAULT NULL,
  `SocietyRegistrationNumber` varchar(250) DEFAULT NULL,
  `SocietyNameinEnglish` varchar(250) DEFAULT NULL,
  `SocietyNameinTamil` varchar(250) DEFAULT NULL,
  `Type of Society` varchar(250) DEFAULT NULL,
  `Society staff Name` varchar(250) DEFAULT NULL,
  `Society Staff Designation` varchar(250) DEFAULT NULL,
  `Society Staff Mobile Number` bigint(20) DEFAULT NULL,
  `Society Address` varchar(250) DEFAULT NULL,
  `Pincode` mediumint(9) DEFAULT NULL,
  `Society Email id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_id` int(12) DEFAULT NULL,
  `circle_id` int(12) DEFAULT NULL,
  `society_id` int(12) DEFAULT NULL,
  `role` int(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8919 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table tncu_rcu.users_copy
CREATE TABLE IF NOT EXISTS `users_copy` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_id` int(12) DEFAULT NULL,
  `circle_id` int(12) DEFAULT NULL,
  `society_id` int(12) DEFAULT NULL,
  `role` int(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3524 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for view tncu_rcu.view_regionwise_credit_and_deopsit
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_regionwise_credit_and_deopsit` (
	`Region Name` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`Deposit Target(2023-24)` DOUBLE NULL,
	`Deposit Achivement During the Week` DECIMAL(33,0) NULL,
	`Deposit Achivement upto the Week` DECIMAL(33,0) NULL,
	`% of Deposit Acheivement` VARCHAR(20) NULL COLLATE 'utf8mb4_general_ci',
	`Credit Target(2023-24)` DOUBLE NULL,
	`Credit Achivement During the Week` DECIMAL(33,0) NULL,
	`Credit Achivement upto the Week` DECIMAL(33,0) NULL,
	`% of Credit Acheivement` VARCHAR(20) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view tncu_rcu.newsociety
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `newsociety`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `newsociety` AS SELECT c.id as region_id, b.id as circle_id, d.id AS  societytype_id, a.SocietyNameinEnglish as society_name,
a.SocietyRegistrationNumber as registration_no, a.`Society staff Name` as staff_name,
a.`Society Staff Designation` as designation, a.`Society Staff Mobile Number` AS  mobile_no,
a.`Society Address` AS  address, a.Pincode AS  pincode, a.`Society Email id` AS email FROM `table` AS a
LEFT JOIN `circlenew` AS b ON b.name = a.circlename
LEFT JOIN `regonnew` AS c ON a.regionname = c.regionname
LEFT JOIN `societytypenew` AS d ON a.`Type of Society` = d.society ;

-- Dumping structure for view tncu_rcu.society_new
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `society_new`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `society_new` AS SELECT (SELECT id FROM regonnew WHERE regionname = a.regionname LIMIT 1) as region_id,
(SELECT id FROM circlenew WHERE name = a.circlename LIMIT 1) as circle_id,
(SELECT id FROM societytypenew WHERE society = a.`Type of Society` LIMIT 1) AS  societytype_id, a.SocietyNameinEnglish as society_name,
a.SocietyRegistrationNumber as registration_no, a.`Society staff Name` as staff_name,
a.`Society Staff Designation` as designation, a.`Society Staff Mobile Number` AS  mobile_no,
a.`Society Address` AS  address, a.Pincode AS  pincode, a.`Society Email id` AS email
FROM `table` AS a ;

-- Dumping structure for view tncu_rcu.view_regionwise_credit_and_deopsit
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_regionwise_credit_and_deopsit`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_regionwise_credit_and_deopsit` AS SELECT a.region_name AS `Region Name`, (SELECT IFNULL(SUM(annual_target), 0) FROM deposit_onetimeentry WHERE user_id in (SELECT id from users where region_id = a.id )) as 'Deposit Target(2023-24)', (SELECT IFNULL(SUM(disbursedamount), 0) from loan where loandate >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND loandate < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY AND user_id in (SELECT id from users where region_id = a.id ))  as 'Deposit Achivement During the Week', (SELECT IFNULL(SUM(disbursedamount),0) from loan where user_id in (SELECT id from users where region_id = a.id ))  as 'Deposit Achivement upto the Week',  (SELECT concat(IFNULL(round(( SUM(disbursedamount)/`Deposit Target(2023-24)` * 100 ),2),0),'%') from loan where user_id in (SELECT id from users where region_id = a.id )) as '% of Deposit Acheivement', (SELECT  IFNULL(SUM(annual_target),0) FROM loan_onetimeentry WHERE user_id in (SELECT id from users where region_id = a.id )) as 'Credit Target(2023-24)', (SELECT IFNULL(SUM(collectedamount),0) from loan where loandate >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND loandate < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY AND user_id in (SELECT id from users where region_id = a.id ))  as 'Credit Achivement During the Week', (SELECT IFNULL(SUM(collectedamount),0) from loan where user_id in (SELECT id from users where region_id = a.id ))  as 'Credit Achivement upto the Week',   (SELECT concat(IFNULL(round(( SUM(collectedamount)/`Credit Target(2023-24)` * 100 ),2),0),'%') from loan where user_id in (SELECT id from users where region_id = a.id )) as '% of Credit Acheivement' from mtr_region as a ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
