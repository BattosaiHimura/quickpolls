/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Version : 50542
 Source Host           : localhost
 Source Database       : quickPoll

 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 07/01/2016 22:04:02 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `arguments`
-- ----------------------------
DROP TABLE IF EXISTS `arguments`;
CREATE TABLE `arguments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_arguments_courses1_idx` (`course_id`),
  CONSTRAINT `fk_arguments_courses1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `arguments`
-- ----------------------------
BEGIN;
INSERT INTO `arguments` VALUES ('1', '1', 'Ovetto kinder', '2016-06-03 00:00:00'), ('2', '1', 'Ovetto King', '2016-06-03 00:00:00'), ('3', '1', 'Ovetto maxxi', '2016-06-03 00:00:00'), ('4', '1', 'Fetta al latte', '2016-06-03 00:00:00'), ('5', '1', 'Fetta ai cereali', '2016-06-03 00:00:00'), ('6', '1', 'Kinder Pingui', '2016-06-03 00:00:00'), ('7', '1', 'arg1', '2016-06-06 00:00:00'), ('8', '1', 'arg2', '2016-06-06 00:00:00'), ('9', '1', 'arg3', '2016-06-06 00:00:00'), ('10', '2', 'Di Grande', '2016-06-06 00:00:00'), ('11', '2', 'Qualità', '2016-06-06 00:00:00'), ('12', '2', 'Loacker', '2016-06-06 00:00:00'), ('13', '2', 'merendine', '2016-06-06 00:00:00'), ('14', '2', 'brutte', '2016-06-06 00:00:00'), ('15', '2', 'sono', '2016-06-06 00:00:00'), ('16', '4', '1mo girone', '2016-06-06 00:00:00'), ('17', '4', '2do girone', '2016-06-06 00:00:00'), ('18', '5', 'Aria', '2016-07-01 00:00:00'), ('19', '5', 'Jaws', '2016-07-01 00:00:00'), ('20', '5', 'Voice Over', '2016-07-01 00:00:00'), ('21', '5', 'Compatibilità JavaScript', '2016-07-01 00:00:00'), ('22', '5', 'iFrames letti male', '2016-07-01 00:00:00'), ('23', '5', 'Bottoni che non voglio essere letti', '2016-07-01 00:00:00');
COMMIT;

-- ----------------------------
--  Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vote_id` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_votes1_idx` (`vote_id`),
  CONSTRAINT `fk_comments_votes1` FOREIGN KEY (`vote_id`) REFERENCES `votes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `courses`
-- ----------------------------
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `courses`
-- ----------------------------
BEGIN;
INSERT INTO `courses` VALUES ('1', 'Merendine Kinder', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', 'Loacker', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', 'Merendeiro', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', 'Divina Commedia', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', 'Accessibilità', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
--  Table structure for `final_votes`
-- ----------------------------
DROP TABLE IF EXISTS `final_votes`;
CREATE TABLE `final_votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quality_id` int(11) NOT NULL,
  `courses_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `comment` longtext,
  PRIMARY KEY (`id`),
  KEY `fk_final_votes_quality1_idx` (`quality_id`),
  KEY `fk_final_votes_courses1_idx` (`courses_id`),
  KEY `fk_final_votes_users1_idx` (`users_id`),
  CONSTRAINT `fk_final_votes_courses1` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_final_votes_quality1` FOREIGN KEY (`quality_id`) REFERENCES `quality` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_final_votes_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `polls`
-- ----------------------------
DROP TABLE IF EXISTS `polls`;
CREATE TABLE `polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `title` varchar(90) NOT NULL,
  `date_from` datetime DEFAULT NULL,
  `date_to` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_polls_courses1_idx` (`course_id`),
  CONSTRAINT `fk_polls_courses1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `polls`
-- ----------------------------
BEGIN;
INSERT INTO `polls` VALUES ('1', '1', 'Ovetti', '2016-06-03 00:00:00', null), ('2', '1', 'Fette', '2016-06-03 00:00:00', null), ('3', '1', 'Prova', '2016-06-06 00:00:00', null), ('4', '2', 'Qualità', '2016-06-06 00:00:00', null), ('5', '2', 'Provone', '2016-06-06 00:00:00', null), ('6', '4', 'Inferno', '2016-06-06 00:00:00', null), ('7', '5', 'Screen Readers', '2016-07-01 00:00:00', null), ('8', '5', 'Problemi Accessibilità', '2016-07-01 00:00:00', null);
COMMIT;

-- ----------------------------
--  Table structure for `polls_has_arguments`
-- ----------------------------
DROP TABLE IF EXISTS `polls_has_arguments`;
CREATE TABLE `polls_has_arguments` (
  `polls_id` int(11) NOT NULL,
  `arguments_id` int(11) NOT NULL,
  PRIMARY KEY (`polls_id`,`arguments_id`),
  KEY `fk_polls_has_arguments_arguments1_idx` (`arguments_id`),
  KEY `fk_polls_has_arguments_polls1_idx` (`polls_id`),
  CONSTRAINT `fk_polls_has_arguments_arguments1` FOREIGN KEY (`arguments_id`) REFERENCES `arguments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_polls_has_arguments_polls1` FOREIGN KEY (`polls_id`) REFERENCES `polls` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `polls_has_arguments`
-- ----------------------------
BEGIN;
INSERT INTO `polls_has_arguments` VALUES ('1', '1'), ('1', '2'), ('1', '3'), ('2', '4'), ('2', '5'), ('2', '6'), ('3', '7'), ('3', '8'), ('3', '9'), ('4', '10'), ('4', '11'), ('4', '12'), ('5', '13'), ('5', '14'), ('5', '15'), ('6', '16'), ('6', '17'), ('7', '18'), ('7', '19'), ('7', '20'), ('8', '21'), ('8', '22'), ('8', '23');
COMMIT;

-- ----------------------------
--  Table structure for `prof_has_course`
-- ----------------------------
DROP TABLE IF EXISTS `prof_has_course`;
CREATE TABLE `prof_has_course` (
  `users_id` int(11) NOT NULL,
  `courses_id` int(11) NOT NULL,
  `is_lab` tinyint(1) NOT NULL,
  `presence` int(11) NOT NULL,
  PRIMARY KEY (`users_id`,`courses_id`),
  KEY `fk_users_has_courses_courses1_idx` (`courses_id`),
  KEY `fk_users_has_courses_users1_idx` (`users_id`),
  CONSTRAINT `fk_users_has_courses_courses1` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_courses_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `prof_has_course`
-- ----------------------------
BEGIN;
INSERT INTO `prof_has_course` VALUES ('2', '1', '0', '0'), ('2', '2', '0', '0'), ('2', '3', '0', '0'), ('3', '4', '0', '0'), ('5', '5', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `pwds`
-- ----------------------------
DROP TABLE IF EXISTS `pwds`;
CREATE TABLE `pwds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salt` varchar(8) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pwds`
-- ----------------------------
BEGIN;
INSERT INTO `pwds` VALUES ('1', '', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5'), ('2', '', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5'), ('3', '', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5'), ('4', '', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5'), ('5', '', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5');
COMMIT;

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

-- ----------------------------
--  Table structure for `user_has_pwd`
-- ----------------------------
DROP TABLE IF EXISTS `user_has_pwd`;
CREATE TABLE `user_has_pwd` (
  `user_id` int(11) NOT NULL,
  `pwd_id` int(11) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`pwd_id`),
  KEY `fk_user_has_pwd_pwd1_idx` (`pwd_id`),
  KEY `fk_user_has_pwd_user1_idx` (`user_id`),
  CONSTRAINT `fk_user_has_pwd_pwd1` FOREIGN KEY (`pwd_id`) REFERENCES `pwds` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_pwd_user1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user_has_pwd`
-- ----------------------------
BEGIN;
INSERT INTO `user_has_pwd` VALUES ('1', '1', '2016-06-03 00:00:00', '2016-09-03 00:00:00'), ('2', '2', '2016-06-03 00:00:00', '2016-09-03 00:00:00'), ('3', '3', '2016-06-06 00:00:00', '2016-09-06 00:00:00'), ('4', '4', '2016-07-01 00:00:00', '2016-10-01 00:00:00'), ('5', '5', '2016-07-01 00:00:00', '2016-10-01 00:00:00');
COMMIT;

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

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(90) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_user_type1_idx` (`user_type_id`),
  CONSTRAINT `fk_users_user_type1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', '2', 'Mario', 'Rossi', 'mario.rossi@studio.unibo.it'), ('2', '1', 'Prof. Max', 'Maximus', 'max.maximus@unibo.it'), ('3', '1', 'Dante', 'Alighieri', 'dante@unibo.it'), ('4', '2', 'Tizio', 'Acaso', 'tizio.acaso@studio.unibo.it'), ('5', '1', 'Gennaro', 'D\'Achille', 'g.dachille@unibo.it');
COMMIT;

-- ----------------------------
--  Table structure for `votes`
-- ----------------------------
DROP TABLE IF EXISTS `votes`;
CREATE TABLE `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `quality_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `argument_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_votes_users1_idx` (`users_id`),
  KEY `fk_votes_quality1_idx` (`quality_id`),
  KEY `fk_votes_polls_has_arguments1_idx` (`poll_id`,`argument_id`),
  CONSTRAINT `fk_votes_polls_has_arguments1` FOREIGN KEY (`poll_id`, `argument_id`) REFERENCES `polls_has_arguments` (`polls_id`, `arguments_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_votes_quality1` FOREIGN KEY (`quality_id`) REFERENCES `quality` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_votes_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `votes`
-- ----------------------------
BEGIN;
INSERT INTO `votes` VALUES ('1', '1', '5', '1', '1'), ('2', '1', '5', '1', '2'), ('3', '1', '5', '1', '3'), ('4', '1', '4', '2', '4'), ('5', '1', '4', '2', '5'), ('6', '1', '3', '2', '6'), ('7', '1', '1', '3', '7'), ('8', '1', '2', '3', '8'), ('9', '1', '3', '3', '9'), ('10', '1', '4', '5', '13'), ('11', '1', '4', '5', '14'), ('12', '1', '5', '5', '15'), ('13', '1', '4', '4', '10'), ('14', '1', '3', '4', '11'), ('15', '1', '5', '4', '12'), ('16', '1', '5', '6', '16'), ('17', '1', '3', '6', '17'), ('18', '4', '5', '1', '1'), ('19', '4', '5', '1', '2'), ('20', '4', '5', '1', '3');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
