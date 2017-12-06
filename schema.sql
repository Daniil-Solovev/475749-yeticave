CREATE TABLE `category` (
	`id` INT (254) UNSIGNED NOT NULL AUTO_INCREMENT,
	`cat_name` CHAR (100) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `idx_cat_name` (`cat_name` ASC)
);

CREATE TABLE `lot` (
	`id` INT (254) UNSIGNED NOT NULL AUTO_INCREMENT,
	`date_publish` date NOT NULL,
	`lot_name` CHAR (100) NOT NULL,
	`description` text NOT NULL,
	`img` CHAR (50) NOT NULL,
	`lot_rate` TINYINT (20) NOT NULL,
	`lot_step` TINYINT (20) NOT NULL,
	`lot_date` date NOT NULL,
	`author` INT (254) NOT NULL,
	`winner` INT (254) NOT NULL,
	`category_id` INT (254) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `idx_category_id` (`category_id` ASC),
	INDEX `idx_lot_id` (`id` ASC),
	FOREIGN KEY (`winner`) REFERENCES `user` (`id`),
	FOREIGN KEY (`author`) REFERENCES `user` (`id`),
	FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
);

CREATE TABLE `bet` (
	`id` INT (254) UNSIGNED NOT NULL AUTO_INCREMENT,
	`date` date NOT NULL,
	`sum` TINYINT (20) NOT NULL,
	`user_id` INT (254) NOT NULL,
	`lot_id` INT (254) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `idx_user_lot` (`user_id` ASC, `lot_id` ASC),
	FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
	FOREIGN KEY (`lot_id`) REFERENCES `lot` (`id`)
);

CREATE TABLE `user` (
	`id` INT (254) UNSIGNED NOT NULL AUTO_INCREMENT,
	`register` date NOT NULL,
	`email` CHAR (50) NOT NULL,
	`name` CHAR (50) NOT NULL,
	`password` CHAR (50) NOT NULL,
	`avatar` CHAR (50) NULL,
	`contacts` text (254) NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `idx_email` (`email` ASC)
);

