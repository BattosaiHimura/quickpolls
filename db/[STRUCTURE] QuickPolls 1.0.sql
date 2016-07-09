/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Version : 50542
 Source Host           : localhost
 Source Database       : quickPoll

 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 07/09/2016 09:21:25 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

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
--  Table structure for `pwds`
-- ----------------------------
DROP TABLE IF EXISTS `pwds`;
CREATE TABLE `pwds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salt` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

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
--  Table structure for `user_type`
-- ----------------------------
DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
