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
-- Table structure for bet
-- ----------------------------
DROP TABLE IF EXISTS `bet`;
CREATE TABLE `bet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` int(254) NOT NULL,
  `sum` int(254) NOT NULL,
  `user_id` int(254) unsigned NOT NULL,
  `lot_id` int(254) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_user_lot` (`user_id`,`lot_id`),
  KEY `lot_id` (`lot_id`),
  CONSTRAINT `bet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `bet_ibfk_2` FOREIGN KEY (`lot_id`) REFERENCES `lot` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` char(100) NOT NULL,
  `cssClass` char(254) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_cat_name` (`cat_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lot
-- ----------------------------
DROP TABLE IF EXISTS `lot`;
CREATE TABLE `lot` (
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
  CONSTRAINT `lot_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `lot_ibfk_2` FOREIGN KEY (`author`) REFERENCES `user` (`id`),
  CONSTRAINT `lot_ibfk_3` FOREIGN KEY (`winner`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
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
