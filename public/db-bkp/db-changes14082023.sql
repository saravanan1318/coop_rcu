ALTER TABLE `tncu_rcu`.`loan_issues` 
ADD COLUMN `loan_id` VARCHAR(45) NULL DEFAULT NULL AFTER `user_id`;
CREATE TABLE `tncu_rcu`.`loan_onetimeentry` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `loan_id` VARCHAR(45) NOT NULL,
  `overall_outstanding` VARCHAR(45) NULL DEFAULT NULL,
  `current_outstanding` VARCHAR(45) NULL DEFAULT NULL,
  `current_year` VARCHAR(45) NULL DEFAULT NULL,
  `annual_target` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`));
  ALTER TABLE `tncu_rcu`.`loan_onetimeentry` 
ADD COLUMN `user_id` VARCHAR(45) NOT NULL AFTER `id`, RENAME TO  `tncu_rcu`.`loan_issueonetimeentry` ;
ALTER TABLE `tncu_rcu`.`loan_issueonetimeentry` 
RENAME TO  `tncu_rcu`.`loan_onetimeentry` ;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `region_id`, `circle_id`, `society_id`, `role`, `created_at`, `updated_at`) VALUES
(2, 'SuperAdmin', 'superadmin@rcs.com', NULL, '$2y$10$Xhj83E6umEZvVvr8CmY3k.ufhbonHO7ur.s2O7mhfdPEmZshOgM2W', NULL, 0, 0, 0, 2, '2023-08-10 00:32:18', '2023-08-10 00:32:18');
ALTER TABLE `tncu_rcu`.`loan_issues` 
CHANGE COLUMN `scstno` `scstno` VARCHAR(255) NOT NULL DEFAULT 0 ,
CHANGE COLUMN `scstamount` `scstamount` VARCHAR(255) NOT NULL DEFAULT 0 ,
CHANGE COLUMN `othersno` `othersno` VARCHAR(255) NOT NULL DEFAULT 0 ,
CHANGE COLUMN `othersamount` `othersamount` VARCHAR(255) NOT NULL DEFAULT 0 ,
CHANGE COLUMN `totalno` `totalno` VARCHAR(255) NOT NULL DEFAULT 0 ,
CHANGE COLUMN `totalamount` `totalamount` VARCHAR(255) NOT NULL DEFAULT 0 ;


