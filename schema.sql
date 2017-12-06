CREATE TABLE `category` (
`id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT,
`cat_name` char(100) NOT NULL,
PRIMARY KEY (`id`) ,
UNIQUE INDEX `idx_cat_name` (`cat_name` ASC)
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
`author` int(5000) NOT NULL,
`winner` int(5000) NOT NULL,
`category_id` int(50) NOT NULL,
PRIMARY KEY (`id`) ,
INDEX `idx_category_id` (`category_id` ASC),
INDEX `idx_lot_id` (`id` ASC),
FOREIGN KEY (`winner`) REFERENCES `user` (`id`),
FOREIGN KEY (`author`) REFERENCES `user` (`id`),
FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
);

CREATE TABLE `bet` (
`id` int(5000) UNSIGNED NOT NULL AUTO_INCREMENT,
`date` date NOT NULL,
`sum` tinyint(20) NOT NULL,
`user_id` int(5000) NOT NULL,
`lot_id` bit(5000) NOT NULL,
PRIMARY KEY (`id`) ,
UNIQUE INDEX `idx_user_lot` (`user_id` ASC, `lot_id` ASC),
FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
FOREIGN KEY (`lot_id`) REFERENCES `lot` (`id`)
);

CREATE TABLE `users` (
`id` int(5000) UNSIGNED NOT NULL AUTO_INCREMENT,
`register` date NOT NULL,
`email` char(50) NOT NULL,
`name` char(50) NOT NULL,
`password` char(50) NOT NULL,
`avatar` char(50) NULL,
`contacts` text NULL,
PRIMARY KEY (`id`) ,
UNIQUE INDEX `idx_email` (`email` ASC)
);


