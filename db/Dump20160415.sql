-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: localhost    Database: quickPoll
-- ------------------------------------------------------
-- Server version	5.5.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Argument`
--

DROP TABLE IF EXISTS `Argument`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Argument` (
  `idArgument` int(11) NOT NULL AUTO_INCREMENT,
  `Course_idCourse` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`idArgument`,`Course_idCourse`),
  KEY `fk_Argument_Course1_idx` (`Course_idCourse`),
  CONSTRAINT `fk_Argument_Course1` FOREIGN KEY (`Course_idCourse`) REFERENCES `Course` (`idCourse`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Argument`
--

LOCK TABLES `Argument` WRITE;
/*!40000 ALTER TABLE `Argument` DISABLE KEYS */;
/*!40000 ALTER TABLE `Argument` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Course`
--

DROP TABLE IF EXISTS `Course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Course` (
  `idCourse` int(11) NOT NULL AUTO_INCREMENT,
  `dateFrom` datetime NOT NULL,
  `dateTo` datetime NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(300) NOT NULL,
  `session` varchar(45) NOT NULL COMMENT 'academic year',
  PRIMARY KEY (`idCourse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Course`
--

LOCK TABLES `Course` WRITE;
/*!40000 ALTER TABLE `Course` DISABLE KEYS */;
/*!40000 ALTER TABLE `Course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DailyLesson`
--

DROP TABLE IF EXISTS `DailyLesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DailyLesson` (
  `idPoll` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(300) DEFAULT NULL,
  `Argument_idArgument` int(11) NOT NULL,
  `Argument_Course_idCourse` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`idPoll`),
  KEY `fk_DailyLesson_Argument1_idx` (`Argument_idArgument`,`Argument_Course_idCourse`),
  CONSTRAINT `fk_DailyLesson_Argument1` FOREIGN KEY (`Argument_idArgument`, `Argument_Course_idCourse`) REFERENCES `Argument` (`idArgument`, `Course_idCourse`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DailyLesson`
--

LOCK TABLES `DailyLesson` WRITE;
/*!40000 ALTER TABLE `DailyLesson` DISABLE KEYS */;
/*!40000 ALTER TABLE `DailyLesson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DailyLesson_has_User`
--

DROP TABLE IF EXISTS `DailyLesson_has_User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DailyLesson_has_User` (
  `DailyLesson_idPoll` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `comments` varchar(300) DEFAULT NULL,
  `Quality_idquality` int(11) NOT NULL,
  PRIMARY KEY (`DailyLesson_idPoll`,`User_idUser`,`Quality_idquality`),
  KEY `fk_DailyLesson_has_User_User1_idx` (`User_idUser`),
  KEY `fk_DailyLesson_has_User_DailyLesson1_idx` (`DailyLesson_idPoll`),
  KEY `fk_DailyLesson_has_User_Quality1_idx` (`Quality_idquality`),
  CONSTRAINT `fk_DailyLesson_has_User_DailyLesson1` FOREIGN KEY (`DailyLesson_idPoll`) REFERENCES `DailyLesson` (`idPoll`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DailyLesson_has_User_Quality1` FOREIGN KEY (`Quality_idquality`) REFERENCES `Quality` (`idquality`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DailyLesson_has_User_User1` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DailyLesson_has_User`
--

LOCK TABLES `DailyLesson_has_User` WRITE;
/*!40000 ALTER TABLE `DailyLesson_has_User` DISABLE KEYS */;
/*!40000 ALTER TABLE `DailyLesson_has_User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Final_vote`
--

DROP TABLE IF EXISTS `Final_vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Final_vote` (
  `idFinal_vote` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(300) DEFAULT NULL,
  `tips` varchar(300) DEFAULT NULL,
  `slidesPresent` tinyint(1) DEFAULT NULL,
  `Quality_idquality` int(11) NOT NULL,
  `Course_idCourse` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL,
  PRIMARY KEY (`idFinal_vote`),
  KEY `fk_Final_vote_quality1_idx` (`Quality_idquality`),
  KEY `fk_Final_vote_Course1_idx` (`Course_idCourse`),
  KEY `fk_Final_vote_User1_idx` (`User_idUser`),
  CONSTRAINT `fk_Final_vote_Course1` FOREIGN KEY (`Course_idCourse`) REFERENCES `Course` (`idCourse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Final_vote_quality1` FOREIGN KEY (`Quality_idquality`) REFERENCES `Quality` (`idquality`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Final_vote_User1` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Final_vote`
--

LOCK TABLES `Final_vote` WRITE;
/*!40000 ALTER TABLE `Final_vote` DISABLE KEYS */;
/*!40000 ALTER TABLE `Final_vote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Prof_has_Course`
--

DROP TABLE IF EXISTS `Prof_has_Course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Prof_has_Course` (
  `User_idUser` int(11) NOT NULL,
  `Course_idCourse` int(11) NOT NULL,
  `isLab` tinyint(1) NOT NULL COMMENT 'Indicate if prof. has a part of the corse in object',
  `presence` int(11) NOT NULL COMMENT 'It represents the percentage of participation for the prof. if there are more than one teachers for that course.',
  PRIMARY KEY (`User_idUser`,`Course_idCourse`),
  KEY `fk_User_has_Course_Course1_idx` (`Course_idCourse`),
  KEY `fk_User_has_Course_User1_idx` (`User_idUser`),
  CONSTRAINT `fk_User_has_Course_Course1` FOREIGN KEY (`Course_idCourse`) REFERENCES `Course` (`idCourse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Course_User1` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Prof_has_Course`
--

LOCK TABLES `Prof_has_Course` WRITE;
/*!40000 ALTER TABLE `Prof_has_Course` DISABLE KEYS */;
/*!40000 ALTER TABLE `Prof_has_Course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pwd`
--

DROP TABLE IF EXISTS `Pwd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pwd` (
  `idPwd` int(11) NOT NULL AUTO_INCREMENT,
  `pwd` char(64) NOT NULL COMMENT 'SHA256 is always 256 bits long, equivalent to 32 bytes, or 64 bytes in an hexadecimal string format.',
  PRIMARY KEY (`idPwd`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pwd`
--

LOCK TABLES `Pwd` WRITE;
/*!40000 ALTER TABLE `Pwd` DISABLE KEYS */;
INSERT INTO `Pwd` VALUES (1,'123');
/*!40000 ALTER TABLE `Pwd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Quality`
--

DROP TABLE IF EXISTS `Quality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Quality` (
  `idquality` int(11) NOT NULL AUTO_INCREMENT,
  `vote` decimal(10,0) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`idquality`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Quality`
--

LOCK TABLES `Quality` WRITE;
/*!40000 ALTER TABLE `Quality` DISABLE KEYS */;
/*!40000 ALTER TABLE `Quality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Table User contains all user that should use the Quick-Pool service.',
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `matricola` varchar(10) DEFAULT NULL COMMENT 'If the User it a student, otherwise the field must be void.',
  `UserType_idUserType` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `fk_User_UserType_idx` (`UserType_idUserType`),
  CONSTRAINT `fk_User_UserType` FOREIGN KEY (`UserType_idUserType`) REFERENCES `User_type` (`idUserType`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'Massimiliano','Martella','0000702391',1,'massimilian.martella@studio.unibo.it'),(2,'Fabio','Limardo','0000000000',1,'fabio.limardo@studio.unibo.it'),(3,'Nikolai Zuluaga','Pavlova','0000000000',1,'hollowripper@gmail.com');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User_has_Pwd`
--

DROP TABLE IF EXISTS `User_has_Pwd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User_has_Pwd` (
  `User_idUser` int(11) NOT NULL,
  `Pwd_idPwd` int(11) NOT NULL,
  `dateFrom` datetime NOT NULL,
  `dateTo` datetime NOT NULL,
  PRIMARY KEY (`User_idUser`,`Pwd_idPwd`),
  KEY `fk_User_has_Pwd_Pwd1_idx` (`Pwd_idPwd`),
  KEY `fk_User_has_Pwd_User1_idx` (`User_idUser`),
  CONSTRAINT `fk_User_has_Pwd_Pwd1` FOREIGN KEY (`Pwd_idPwd`) REFERENCES `Pwd` (`idPwd`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Pwd_User1` FOREIGN KEY (`User_idUser`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User_has_Pwd`
--

LOCK TABLES `User_has_Pwd` WRITE;
/*!40000 ALTER TABLE `User_has_Pwd` DISABLE KEYS */;
INSERT INTO `User_has_Pwd` VALUES (1,1,'2012-01-01 00:00:00','2022-01-01 00:00:00');
/*!40000 ALTER TABLE `User_has_Pwd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User_type`
--

DROP TABLE IF EXISTS `User_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User_type` (
  `idUserType` int(11) NOT NULL AUTO_INCREMENT COMMENT 'TypeUser is a table that encloses all type of users that have an access on our service.',
  `description` varchar(45) NOT NULL,
  `dateFrom` datetime NOT NULL,
  `dateTo` datetime NOT NULL,
  PRIMARY KEY (`idUserType`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User_type`
--

LOCK TABLES `User_type` WRITE;
/*!40000 ALTER TABLE `User_type` DISABLE KEYS */;
INSERT INTO `User_type` VALUES (1,'studente','2016-01-01 00:00:00','2026-01-01 00:00:00'),(2,'professore','2016-01-01 00:00:00','2026-01-01 00:00:00');
/*!40000 ALTER TABLE `User_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-15 14:57:40
