CREATE TABLE `size_stock_produk` ( `id` INT NOT NULL auto_increment,
                                   `id_produk` VARCHAR ( 36 ) NOT NULL,
                                   `size` VARCHAR ( 5 ) NOT NULL,
                                   `stock` INT NOT NULL,
                                   `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                                   `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                                   PRIMARY KEY ( `id` ) ) engine = innodb;