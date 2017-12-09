/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : Yeticave

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2017-12-09 20:47:00
*/


-- ----------------------------
-- Records of bet
-- ----------------------------
INSERT INTO `bet` VALUES ('1', '1513278436', '12300', '1', '3');
INSERT INTO `bet` VALUES ('2', '1513248436', '10500', '2', '2');
INSERT INTO `bet` VALUES ('3', '1513468436', '15200', '3', '1');
INSERT INTO `bet` VALUES ('15', '1513438436', '124', '1', '16');


-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'Доски и лыжи', 'boards');
INSERT INTO `category` VALUES ('2', 'Крепления', 'attachment');
INSERT INTO `category` VALUES ('3', 'Ботинки', 'boots');
INSERT INTO `category` VALUES ('4', 'Одежда', 'clothing');
INSERT INTO `category` VALUES ('5', 'Инструменты', 'tools');
INSERT INTO `category` VALUES ('6', 'Разное', 'other');


-- ----------------------------
-- Records of lot
-- ----------------------------
INSERT INTO `lot` VALUES ('1', '1512746671', '2014 Rossignol District Snowboard', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, \r\nуложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. \r\nА если к концу катального дня сил совсем не останется, просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.', 'img/lot-1.jpg', '10999', '12000', '1513012836', '1', '2', '1');
INSERT INTO `lot` VALUES ('2', '1512746671', 'DC Ply Mens 2016/2017 Snowboard', 'Легкий маневренный сноуборд', 'img/lot-2.jpg', '159999', '12000', '1513099236', '2', '3', '1');
INSERT INTO `lot` VALUES ('3', '1512746671', 'Крепления Union Contact Pro 2015 года размер L/XL', 'Прикрепляются ко всему', 'img/lot-3.jpg', '8000', '12000', '1513088436', '2', null, '2');
INSERT INTO `lot` VALUES ('4', '1512746671', 'Ботинки для сноуборда DC Mutiny Charocal', 'Тепло ногам', 'img/lot-4.jpg', '10999', '12000', '1513261236', '1', '3', '3');
INSERT INTO `lot` VALUES ('5', '1512746671', 'Куртка для сноуборда DC Mutiny Charocal', 'Теплая и легкая', 'img/lot-5.jpg', '7500', '12000', '1513275636', '3', '1', '4');
INSERT INTO `lot` VALUES ('6', '1512746671', 'Маска Oakley Canopy', 'Весь мир в желтом цвете', 'img/lot-6.jpg', '5400', '12000', '1513336836', '3', '2', '6');
INSERT INTO `lot` VALUES ('16', '20091220', '124', '214', '/img/RWBgZww04G0.jpg', '11', '111', '1513351471', '1', '1', '5');


-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '1510766436', 'ignat.v@gmail.com', 'Игнат', '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka', 'img/user.jpg', 'Тел. 12-14-15; skype - ignat228');
INSERT INTO `user` VALUES ('2', '1512148836', 'kitty_93@li.ru', 'Леночка', '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa', 'img/user.jpg', 'Тел. green; skype - sexygirl19940725');
INSERT INTO `user` VALUES ('3', '1513278436', 'warrior07@mail.ru', 'Руслан', '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW', 'img/user.jpg', 'skype - killer382');

