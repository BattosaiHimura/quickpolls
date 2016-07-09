/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Version : 50542
 Source Host           : localhost
 Source Database       : quickPoll

 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 07/09/2016 09:21:46 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `user_type`
-- ----------------------------
DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user_type`
-- ----------------------------
BEGIN;
INSERT INTO `user_type` VALUES ('1', 'Professore'), ('2', 'Studente');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
