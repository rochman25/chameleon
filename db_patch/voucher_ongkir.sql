CREATE TABLE `voucher_ongkir` ( `id_voucher` INT NOT NULL auto_increment,
                                `code_voucher` VARCHAR ( 30 ) NOT NULL,
                                `discount_voucher` FLOAT NOT NULL,
                                `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                                `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY ( `id_voucher` ),
                                UNIQUE ( `code_voucher` ) ) engine = innodb;