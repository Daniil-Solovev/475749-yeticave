CREATE TABLE `category` (
`id` int(5000) UNSIGNED NOT NULL AUTO_INCREMENT,
`cat_name` char(100) NOT NULL,
PRIMARY KEY (`id`) ,
UNIQUE INDEX `cat_name` (`cat_name` ASC)
);

CREATE TABLE `lot` (
`id` int(5000) UNSIGNED NOT NULL AUTO_INCREMENT,
`date_publish` date NOT NULL,
`lot_name` char(100) NOT NULL,
`description` text NOT NULL,
`img` char(50) NOT NULL,
`lot_rate` tinyint(20) NOT NULL,
`lot_step` tinyint(20) NOT NULL,
`lot_date` date NOT NULL,
`author` char(50) NOT NULL,
`winner` char(50) NOT NULL,
`category_id` char(10) NOT NULL,
PRIMARY KEY (`id`) ,
UNIQUE INDEX `category_id` (`category_id` ASC),
INDEX `lot_name` (`lot_name` ASC)
);

CREATE TABLE `bet` (
`id` int(5000) UNSIGNED NOT NULL AUTO_INCREMENT,
`date` date NOT NULL,
`sum` tinyint(20) NOT NULL,
`user_id` int(5000) NOT NULL,
`lot_id` bit(5000) NOT NULL,
PRIMARY KEY (`id`) ,
UNIQUE INDEX `user_id` (`user_id` ASC),
UNIQUE INDEX `lot_id` (`lot_id` ASC)
);

CREATE TABLE `user` (
`id` int(5000) UNSIGNED NOT NULL AUTO_INCREMENT,
`register` date NOT NULL,
`email` char(50) NOT NULL,
`name` char(50) NOT NULL,
`password` char(50) NOT NULL,
`avatar` char(50) NULL,
`contacts` text NULL,
`lot_id` int(5000) NOT NULL,
`bets` int(5000) NOT NULL,
PRIMARY KEY (`id`) ,
UNIQUE INDEX `email` (`email` ASC),
UNIQUE INDEX `lot_id` (`lot_id` ASC)
);


ALTER TABLE `lot` ADD CONSTRAINT `fk_lot_user_1` FOREIGN KEY (`winner`) REFERENCES `user` (`id`);
ALTER TABLE `lot` ADD CONSTRAINT `fk_lot_user_2` FOREIGN KEY (`author`) REFERENCES `user` (`id`);
ALTER TABLE `bet` ADD CONSTRAINT `fk_bet_user_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
ALTER TABLE `user` ADD CONSTRAINT `fk_user_lot_1` FOREIGN KEY (`lot_id`) REFERENCES `lot` (`id`);
ALTER TABLE `user` ADD CONSTRAINT `fk_user_bet_1` FOREIGN KEY (`bets`) REFERENCES `bet` (`id`);
ALTER TABLE `lot` ADD CONSTRAINT `fk_lot_category_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
ALTER TABLE `bet` ADD CONSTRAINT `fk_bet_lot_1` FOREIGN KEY (`lot_id`) REFERENCES `lot` (`id`);

