SET NAMES utf8;

SET time_zone = '+00:00';

SET foreign_key_checks = 0;

SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE TABLE `bet` (
	`id` INT (10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`date_publish` date NOT NULL,
	`sum` INT (254) NOT NULL,
	`user_id` INT (254) UNSIGNED NOT NULL,
	`lot_id` INT (254) UNSIGNED NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `idx_user_lot` (`user_id`, `lot_id`),
	KEY `lot_id` (`lot_id`),
	CONSTRAINT `bet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `bet_ibfk_2` FOREIGN KEY (`lot_id`) REFERENCES `lot` (`id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

CREATE TABLE `category` (
	`id` INT (10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`cat_name` CHAR (100) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `idx_cat_name` (`cat_name`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;


CREATE TABLE `lot` (
	`id` INT (10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`date_publish` date NOT NULL,
	`lot_name` CHAR (100) NOT NULL,
	`description` text NOT NULL,
	`img` CHAR (50) NOT NULL,
	`lot_rate` TINYINT (20) NOT NULL,
	`lot_step` TINYINT (20) NOT NULL,
	`lot_date` date NOT NULL,
	`author` INT (254) UNSIGNED NOT NULL,
	`winner` INT (254) UNSIGNED NOT NULL,
	`category_id` INT (254) UNSIGNED NOT NULL,
	PRIMARY KEY (`id`),
	KEY `idx_category_id` (`category_id`),
	KEY `author` (`author`),
	KEY `winner` (`winner`),
	CONSTRAINT `lot_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
	CONSTRAINT `lot_ibfk_2` FOREIGN KEY (`author`) REFERENCES `user` (`id`),
	CONSTRAINT `lot_ibfk_3` FOREIGN KEY (`winner`) REFERENCES `user` (`id`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;


CREATE TABLE `user` (
	`id` INT (10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`register` date NOT NULL,
	`email` CHAR (50) NOT NULL,
	`name` CHAR (50) NOT NULL,
	`password` CHAR (255) NOT NULL,
	`avatar` CHAR (50) NOT NULL,
	`contacts` CHAR (254) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `idx_email` (`email`)
) ENGINE = INNODB DEFAULT CHARSET = utf8;

