CREATE TABLE `pre_release` ( `id` INT NOT NULL auto_increment,
                                                         `id_produk` VARCHAR ( 36 ) NOT NULL,
                                                         `release_date` DATETIME NOT NULL,
                                                         `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                                                         `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                                                         PRIMARY KEY ( `id` ) ) engine = innodb;