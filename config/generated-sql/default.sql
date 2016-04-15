
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- Argument
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Argument`;

CREATE TABLE `Argument`
(
    `idArgument` INTEGER NOT NULL AUTO_INCREMENT,
    `Course_idCourse` INTEGER NOT NULL,
    `description` VARCHAR(300) NOT NULL,
    `date` DATETIME NOT NULL,
    PRIMARY KEY (`idArgument`,`Course_idCourse`),
    INDEX `fk_Argument_Course1_idx` (`Course_idCourse`),
    CONSTRAINT `fk_Argument_Course1`
        FOREIGN KEY (`Course_idCourse`)
        REFERENCES `Course` (`idCourse`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Course
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Course`;

CREATE TABLE `Course`
(
    `idCourse` INTEGER NOT NULL AUTO_INCREMENT,
    `dateFrom` DATETIME NOT NULL,
    `dateTo` DATETIME NOT NULL,
    `name` VARCHAR(45) NOT NULL,
    `description` VARCHAR(300) NOT NULL,
    `session` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`idCourse`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- DailyLesson
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `DailyLesson`;

CREATE TABLE `DailyLesson`
(
    `idPoll` INTEGER NOT NULL AUTO_INCREMENT,
    `comment` VARCHAR(300),
    `Argument_idArgument` INTEGER NOT NULL,
    `Argument_Course_idCourse` INTEGER NOT NULL,
    `date` DATETIME NOT NULL,
    PRIMARY KEY (`idPoll`),
    INDEX `fk_DailyLesson_Argument1_idx` (`Argument_idArgument`, `Argument_Course_idCourse`),
    CONSTRAINT `fk_DailyLesson_Argument1`
        FOREIGN KEY (`Argument_idArgument`,`Argument_Course_idCourse`)
        REFERENCES `Argument` (`idArgument`,`Course_idCourse`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- DailyLesson_has_User
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `DailyLesson_has_User`;

CREATE TABLE `DailyLesson_has_User`
(
    `DailyLesson_idPoll` INTEGER NOT NULL,
    `User_idUser` INTEGER NOT NULL,
    `date` DATETIME NOT NULL,
    `comments` VARCHAR(300),
    `Quality_idquality` INTEGER NOT NULL,
    PRIMARY KEY (`DailyLesson_idPoll`,`User_idUser`,`Quality_idquality`),
    INDEX `fk_DailyLesson_has_User_User1_idx` (`User_idUser`),
    INDEX `fk_DailyLesson_has_User_DailyLesson1_idx` (`DailyLesson_idPoll`),
    INDEX `fk_DailyLesson_has_User_Quality1_idx` (`Quality_idquality`),
    CONSTRAINT `fk_DailyLesson_has_User_DailyLesson1`
        FOREIGN KEY (`DailyLesson_idPoll`)
        REFERENCES `DailyLesson` (`idPoll`),
    CONSTRAINT `fk_DailyLesson_has_User_Quality1`
        FOREIGN KEY (`Quality_idquality`)
        REFERENCES `Quality` (`idquality`),
    CONSTRAINT `fk_DailyLesson_has_User_User1`
        FOREIGN KEY (`User_idUser`)
        REFERENCES `User` (`idUser`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Final_vote
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Final_vote`;

CREATE TABLE `Final_vote`
(
    `idFinal_vote` INTEGER NOT NULL AUTO_INCREMENT,
    `comment` VARCHAR(300),
    `tips` VARCHAR(300),
    `slidesPresent` TINYINT(1),
    `Quality_idquality` INTEGER NOT NULL,
    `Course_idCourse` INTEGER NOT NULL,
    `User_idUser` INTEGER NOT NULL,
    PRIMARY KEY (`idFinal_vote`),
    INDEX `fk_Final_vote_quality1_idx` (`Quality_idquality`),
    INDEX `fk_Final_vote_Course1_idx` (`Course_idCourse`),
    INDEX `fk_Final_vote_User1_idx` (`User_idUser`),
    CONSTRAINT `fk_Final_vote_Course1`
        FOREIGN KEY (`Course_idCourse`)
        REFERENCES `Course` (`idCourse`),
    CONSTRAINT `fk_Final_vote_quality1`
        FOREIGN KEY (`Quality_idquality`)
        REFERENCES `Quality` (`idquality`),
    CONSTRAINT `fk_Final_vote_User1`
        FOREIGN KEY (`User_idUser`)
        REFERENCES `User` (`idUser`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Prof_has_Course
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Prof_has_Course`;

CREATE TABLE `Prof_has_Course`
(
    `User_idUser` INTEGER NOT NULL,
    `Course_idCourse` INTEGER NOT NULL,
    `isLab` TINYINT(1) NOT NULL,
    `presence` INTEGER NOT NULL,
    PRIMARY KEY (`User_idUser`,`Course_idCourse`),
    INDEX `fk_User_has_Course_Course1_idx` (`Course_idCourse`),
    INDEX `fk_User_has_Course_User1_idx` (`User_idUser`),
    CONSTRAINT `fk_User_has_Course_Course1`
        FOREIGN KEY (`Course_idCourse`)
        REFERENCES `Course` (`idCourse`),
    CONSTRAINT `fk_User_has_Course_User1`
        FOREIGN KEY (`User_idUser`)
        REFERENCES `User` (`idUser`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Pwd
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Pwd`;

CREATE TABLE `Pwd`
(
    `idPwd` INTEGER NOT NULL AUTO_INCREMENT,
    `pwd` CHAR(64) NOT NULL,
    PRIMARY KEY (`idPwd`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Quality
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Quality`;

CREATE TABLE `Quality`
(
    `idquality` INTEGER NOT NULL AUTO_INCREMENT,
    `vote` DECIMAL NOT NULL,
    `description` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`idquality`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- User
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `User`;

CREATE TABLE `User`
(
    `idUser` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(45) NOT NULL,
    `surname` VARCHAR(45) NOT NULL,
    `matricola` VARCHAR(10),
    `UserType_idUserType` INTEGER NOT NULL,
    `email` VARCHAR(100),
    PRIMARY KEY (`idUser`),
    INDEX `fk_User_UserType_idx` (`UserType_idUserType`),
    CONSTRAINT `fk_User_UserType`
        FOREIGN KEY (`UserType_idUserType`)
        REFERENCES `User_type` (`idUserType`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- User_has_Pwd
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `User_has_Pwd`;

CREATE TABLE `User_has_Pwd`
(
    `User_idUser` INTEGER NOT NULL,
    `Pwd_idPwd` INTEGER NOT NULL,
    `dateFrom` DATETIME NOT NULL,
    `dateTo` DATETIME NOT NULL,
    PRIMARY KEY (`User_idUser`,`Pwd_idPwd`),
    INDEX `fk_User_has_Pwd_Pwd1_idx` (`Pwd_idPwd`),
    INDEX `fk_User_has_Pwd_User1_idx` (`User_idUser`),
    CONSTRAINT `fk_User_has_Pwd_Pwd1`
        FOREIGN KEY (`Pwd_idPwd`)
        REFERENCES `Pwd` (`idPwd`),
    CONSTRAINT `fk_User_has_Pwd_User1`
        FOREIGN KEY (`User_idUser`)
        REFERENCES `User` (`idUser`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- User_type
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `User_type`;

CREATE TABLE `User_type`
(
    `idUserType` INTEGER NOT NULL AUTO_INCREMENT,
    `description` VARCHAR(45) NOT NULL,
    `dateFrom` DATETIME NOT NULL,
    `dateTo` DATETIME NOT NULL,
    PRIMARY KEY (`idUserType`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
