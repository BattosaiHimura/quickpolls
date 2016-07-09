/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Version : 50542
 Source Host           : localhost
 Source Database       : quickPoll

 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 07/09/2016 09:21:53 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `quality`
-- ----------------------------
DROP TABLE IF EXISTS `quality`;
CREATE TABLE `quality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vote` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `quality`
-- ----------------------------
BEGIN;
INSERT INTO `quality` VALUES ('1', '1', '1 stella'), ('2', '2', '2 stelle'), ('3', '3', '3 stelle'), ('4', '4', '4 stelle'), ('5', '5', '5 stelle');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
