/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : Yeticave

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2017-12-09 20:45:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bets
-- ----------------------------
DROP TABLE IF EXISTS `bets`;
CREATE TABLE `bets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` int(254) NOT NULL,
  `sum` int(254) NOT NULL,
  `user_id` int(254) unsigned NOT NULL,
  `lot_id` int(254) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_user_lot` (`user_id`,`lot_id`),
  KEY `lot_id` (`lot_id`),
  CONSTRAINT `bets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `bets_ibfk_2` FOREIGN KEY (`lot_id`) REFERENCES `lots` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` char(100) NOT NULL,
  `cssClass` char(254) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_cat_name` (`cat_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lots
-- ----------------------------
DROP TABLE IF EXISTS `lots`;
CREATE TABLE `lots` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_publish` int(254) NOT NULL,
  `lot_name` char(100) NOT NULL,
  `description` text NOT NULL,
  `img` char(50) NOT NULL,
  `lot_rate` int(255) DEFAULT NULL,
  `lot_step` int(255) DEFAULT NULL,
  `lot_date` int(254) NOT NULL,
  `author` int(254) unsigned NOT NULL,
  `winner` int(254) unsigned DEFAULT NULL,
  `category_id` int(254) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_category_id` (`category_id`),
  KEY `author` (`author`),
  KEY `winner` (`winner`),
  CONSTRAINT `lots_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `lots_ibfk_2` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  CONSTRAINT `lots_ibfk_3` FOREIGN KEY (`winner`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `register` int(254) NOT NULL,
  `email` char(50) NOT NULL,
  `name` char(50) NOT NULL,
  `password` char(254) NOT NULL,
  `avatar` char(100) DEFAULT NULL,
  `contacts` char(254) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
SET FOREIGN_KEY_CHECKS=1;
