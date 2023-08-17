INSERT INTO `tncu_rcu`.`mtr_purchase` (`purchase_name`) VALUES ('Fertilizer');
INSERT INTO `tncu_rcu`.`mtr_purchase` (`purchase_name`) VALUES ('Pharmacy');
INSERT INTO `tncu_rcu`.`mtr_purchase` (`purchase_name`) VALUES ('Farm Fresh Outlet');
INSERT INTO `tncu_rcu`.`mtr_purchase` (`purchase_name`) VALUES ('Petrol/Diesel Bunks');
INSERT INTO `tncu_rcu`.`mtr_purchase` (`purchase_name`) VALUES ('Non controlled commodities');
ALTER TABLE `tncu_rcu`.`purchase_fertilizer` 
DROP COLUMN `totalamount`,
DROP COLUMN `amount`,
DROP COLUMN `qty`,
ADD COLUMN `purchase_id` INT NULL AFTER `user_id`,
ADD COLUMN `govtnoofvrieties` VARCHAR(45) NULL DEFAULT NULL AFTER `purchase_id`,
ADD COLUMN `govtvalues` VARCHAR(45) NULL DEFAULT NULL AFTER `govtnoofvrieties`,
ADD COLUMN `coopnoofvrieties` VARCHAR(45) NULL DEFAULT NULL AFTER `govtvalues`,
ADD COLUMN `coopquantity` VARCHAR(45) NULL DEFAULT NULL AFTER `coopnoofvrieties`,
ADD COLUMN `coopvalues` VARCHAR(45) NULL DEFAULT NULL AFTER `coopquantity`,
ADD COLUMN `jpcnoofvrieties` VARCHAR(45) CHARACTER SET 'armscii8' NULL DEFAULT NULL AFTER `coopvalues`,
ADD COLUMN `jpcquantity` VARCHAR(45) NULL DEFAULT NULL AFTER `jpcnoofvrieties`,
ADD COLUMN `jpcvalues` VARCHAR(45) NULL DEFAULT NULL AFTER `jpcquantity`,
ADD COLUMN `privatenoofvrieties` VARCHAR(45) NULL DEFAULT NULL AFTER `jpcvalues`,
ADD COLUMN `privatequantity` VARCHAR(45) NULL DEFAULT NULL AFTER `privatenoofvrieties`,
ADD COLUMN `privatevalues` VARCHAR(45) NULL DEFAULT NULL AFTER `privatequantity`, RENAME TO  `tncu_rcu`.`purchases` ;
ALTER TABLE `tncu_rcu`.`purchases` 
ADD COLUMN `purchasedate` DATE NULL AFTER `purchase_id`,
ADD COLUMN `govtquantity` VARCHAR(45) NULL AFTER `govtnoofvarieties`,
CHANGE COLUMN `govtnoofvrieties` `govtnoofvarieties` VARCHAR(45) NULL DEFAULT NULL ;
ALTER TABLE `tncu_rcu`.`purchases` 
CHANGE COLUMN `coopnoofvrieties` `coopnoofvarieties` VARCHAR(45) NULL DEFAULT NULL ,
CHANGE COLUMN `jpcnoofvrieties` `jpcnoofvarieties` VARCHAR(45) CHARACTER SET 'armscii8' NULL DEFAULT NULL ,
CHANGE COLUMN `privatenoofvrieties` `privatenoofvarieties` VARCHAR(45) NULL DEFAULT NULL ;
