CREATE TABLE `tncu_rcu`.`mtr_deposits` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `deposit_name` VARCHAR(45) NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));
ALTER TABLE `tncu_rcu`.`deposit_currents` 
DROP COLUMN `closeddate`,
ADD COLUMN `deposit_id` VARCHAR(45) NULL DEFAULT NULL AFTER `user_id`,
CHANGE COLUMN `user_id` `user_id` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `recieveddate` `depositdate` DATE NULL DEFAULT NULL ,
CHANGE COLUMN `recievedothersno` `recievedno` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `recievedothersamount` `recievedamount` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `recievedtotalno` `recievedtotalno` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `recievedtotalamount` `recievedtotalamount` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `closedothersno` `closedno` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `closedothersamount` `closedamount` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `closedtotalno` `closedtotalno` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `closedtotalamount` `closedtotalamount` VARCHAR(255) NULL DEFAULT NULL , RENAME TO  `tncu_rcu`.`deposits` ;
ALTER TABLE `tncu_rcu`.`deposits` 
DROP COLUMN `closedtotalamount`,
DROP COLUMN `closedtotalno`,
DROP COLUMN `recievedtotalamount`,
DROP COLUMN `recievedtotalno`;
INSERT INTO `tncu_rcu`.`mtr_deposits` (`deposit_name`, `status`) VALUES ('FD - Government', '1');
INSERT INTO `tncu_rcu`.`mtr_deposits` (`deposit_name`, `status`) VALUES ('FD - Individuals', '1');
INSERT INTO `tncu_rcu`.`mtr_deposits` (`deposit_name`, `status`) VALUES ('FD - Institutions', '1');
INSERT INTO `tncu_rcu`.`mtr_deposits` (`deposit_name`, `status`) VALUES ('RD', '1');
INSERT INTO `tncu_rcu`.`mtr_deposits` (`deposit_name`, `status`) VALUES ('SB A/C', '1');
INSERT INTO `tncu_rcu`.`mtr_deposits` (`deposit_name`, `status`) VALUES ('Current A/C', '1');
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 03:34 AM
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
-- Table structure for table `deposit_onetimeentry`
--

CREATE TABLE `deposit_onetimeentry` (
  `id` int(11) NOT NULL,
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
(5, '1', '12', '500000', '150000', '2023-04-01', '700000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deposit_onetimeentry`
--
ALTER TABLE `deposit_onetimeentry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deposit_onetimeentry`
--
ALTER TABLE `deposit_onetimeentry`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
