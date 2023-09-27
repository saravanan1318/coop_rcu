CREATE TABLE `gunny_dues` (
                              `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                              `user_id` BIGINT(12) UNSIGNED NULL DEFAULT NULL,
                              `region_id` BIGINT(20) NULL DEFAULT NULL,
                              `fin_month` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
                              `consumer_goods` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                              `amount_received` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                              `due_on` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                              `consumer_goods_sync_date` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                              `created_at` TIMESTAMP NULL DEFAULT NULL,
                              `updated_at` TIMESTAMP NULL DEFAULT NULL,
                              PRIMARY KEY (`id`) USING BTREE
)
    COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=2
;

CREATE TABLE `gunny_sales` (
                               `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                               `user_id` BIGINT(12) UNSIGNED NULL DEFAULT NULL,
                               `region_id` BIGINT(20) NULL DEFAULT NULL,
                               `fin_month` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
                               `initial_balance` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                               `curr_month_income` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                               `total` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                               `cms_tncsc` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                               `cms_mstc` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                               `cms_ncdfi` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                               `cms_total` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                               `final_balance` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                               `created_at` TIMESTAMP NULL DEFAULT NULL,
                               `updated_at` TIMESTAMP NULL DEFAULT NULL,
                               PRIMARY KEY (`id`) USING BTREE
)
    COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=3
;

CREATE TABLE `margin_money` (
                                `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                                `user_id` BIGINT(12) UNSIGNED NULL DEFAULT NULL,
                                `region_id` BIGINT(20) NULL DEFAULT NULL,
                                `fin_month` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
                                `price_diff_due_amount` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                                `margin_supp_free_cost` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                                `margin_pmgkay_scheme_a` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                                `margin_amt_due_cashew` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                                `margin_pmgkay_scheme_b` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                                `diff_to_be_paid` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                                `additional` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                                `consumer_goods_sync_date` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                                `created_at` TIMESTAMP NULL DEFAULT NULL,
                                `updated_at` TIMESTAMP NULL DEFAULT NULL,
                                PRIMARY KEY (`id`) USING BTREE
)
    COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=2
;

CREATE TABLE `mino_millet` (
                               `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                               `user_id` BIGINT(12) UNSIGNED NULL DEFAULT NULL,
                               `region_id` BIGINT(20) NULL DEFAULT NULL,
                               `fin_month` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
                               `fps_name` VARCHAR(255) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                               `purchase_company_name` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                               `small_grain_type` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                               `quantity_purchased` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                               `quantity_sold` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                               `sales_amount` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                               `created_at` TIMESTAMP NULL DEFAULT NULL,
                               `updated_at` TIMESTAMP NULL DEFAULT NULL,
                               PRIMARY KEY (`id`) USING BTREE
)
    COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=8
;

CREATE TABLE `palm_jaggery` (
                                `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                                `user_id` BIGINT(12) UNSIGNED NULL DEFAULT NULL,
                                `region_id` BIGINT(20) NULL DEFAULT NULL,
                                `fin_month` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
                                `target` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
                                `achievement` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
                                `pending_target` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
                                `created_at` TIMESTAMP NULL DEFAULT NULL,
                                `updated_at` TIMESTAMP NULL DEFAULT NULL,
                                PRIMARY KEY (`id`) USING BTREE
)
    COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=4
;

CREATE TABLE `remittance_to_govt_ac` (
                                         `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                                         `user_id` BIGINT(12) UNSIGNED NULL DEFAULT NULL,
                                         `region_id` BIGINT(20) NULL DEFAULT NULL,
                                         `fin_month` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
                                         `balance_amt` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
                                         `created_at` TIMESTAMP NULL DEFAULT NULL,
                                         `updated_at` TIMESTAMP NULL DEFAULT NULL,
                                         PRIMARY KEY (`id`) USING BTREE
)
    COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=2
;

CREATE TABLE `upi_fps` (
                           `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                           `user_id` BIGINT(12) UNSIGNED NULL DEFAULT NULL,
                           `region_id` BIGINT(20) NULL DEFAULT NULL,
                           `fin_month` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
                           `fps_fulltime` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                           `fps_parttime` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                           `fps_total` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                           `upi_introduced` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                           `upi_tobe_introduced` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                           `upi_introduced_per` VARCHAR(50) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
                           `created_at` TIMESTAMP NULL DEFAULT NULL,
                           `updated_at` TIMESTAMP NULL DEFAULT NULL,
                           PRIMARY KEY (`id`) USING BTREE
)
    COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=2
;
