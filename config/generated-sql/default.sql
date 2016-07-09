
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- arguments
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `arguments`;

CREATE TABLE `arguments`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `course_id` INTEGER NOT NULL,
    `description` VARCHAR(300) NOT NULL,
    `date` DATETIME NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `fk_arguments_courses1_idx` (`course_id`),
    CONSTRAINT `fk_arguments_courses1`
        FOREIGN KEY (`course_id`)
        REFERENCES `courses` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- comments
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `vote_id` INTEGER NOT NULL,
    `comment` VARCHAR(300) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `fk_comments_votes1_idx` (`vote_id`),
    CONSTRAINT `fk_comments_votes1`
        FOREIGN KEY (`vote_id`)
        REFERENCES `votes` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- courses
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(45) NOT NULL,
    `description` VARCHAR(45) NOT NULL,
    `semester` VARCHAR(45) NOT NULL,
    `date_from` DATETIME NOT NULL,
    `date_to` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- final_votes
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `final_votes`;

CREATE TABLE `final_votes`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `quality_id` INTEGER NOT NULL,
    `courses_id` INTEGER NOT NULL,
    `users_id` INTEGER NOT NULL,
    `comment` LONGTEXT,
    PRIMARY KEY (`id`),
    INDEX `fk_final_votes_quality1_idx` (`quality_id`),
    INDEX `fk_final_votes_courses1_idx` (`courses_id`),
    INDEX `fk_final_votes_users1_idx` (`users_id`),
    CONSTRAINT `fk_final_votes_quality1`
        FOREIGN KEY (`quality_id`)
        REFERENCES `quality` (`id`),
    CONSTRAINT `fk_final_votes_courses1`
        FOREIGN KEY (`courses_id`)
        REFERENCES `courses` (`id`),
    CONSTRAINT `fk_final_votes_users1`
        FOREIGN KEY (`users_id`)
        REFERENCES `users` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- polls
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `polls`;

CREATE TABLE `polls`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `course_id` INTEGER NOT NULL,
    `name` VARCHAR(90),
    `date_from` DATETIME NOT NULL,
    `date_to` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `fk_polls_courses1_idx` (`course_id`),
    CONSTRAINT `fk_polls_courses1`
        FOREIGN KEY (`course_id`)
        REFERENCES `courses` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- polls_has_arguments
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `polls_has_arguments`;

CREATE TABLE `polls_has_arguments`
(
    `polls_id` INTEGER NOT NULL,
    `arguments_id` INTEGER NOT NULL,
    PRIMARY KEY (`polls_id`,`arguments_id`),
    INDEX `fk_polls_has_arguments_arguments1_idx` (`arguments_id`),
    INDEX `fk_polls_has_arguments_polls1_idx` (`polls_id`),
    CONSTRAINT `fk_polls_has_arguments_polls1`
        FOREIGN KEY (`polls_id`)
        REFERENCES `polls` (`id`),
    CONSTRAINT `fk_polls_has_arguments_arguments1`
        FOREIGN KEY (`arguments_id`)
        REFERENCES `arguments` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- prof_has_course
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `prof_has_course`;

CREATE TABLE `prof_has_course`
(
    `users_id` INTEGER NOT NULL,
    `courses_id` INTEGER NOT NULL,
    `is_lab` TINYINT(1) NOT NULL,
    `presence` INTEGER NOT NULL,
    PRIMARY KEY (`users_id`,`courses_id`),
    INDEX `fk_users_has_courses_courses1_idx` (`courses_id`),
    INDEX `fk_users_has_courses_users1_idx` (`users_id`),
    CONSTRAINT `fk_users_has_courses_users1`
        FOREIGN KEY (`users_id`)
        REFERENCES `users` (`id`),
    CONSTRAINT `fk_users_has_courses_courses1`
        FOREIGN KEY (`courses_id`)
        REFERENCES `courses` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- pwds
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pwds`;

CREATE TABLE `pwds`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `salt` VARCHAR(8) NOT NULL,
    `password` VARCHAR(64) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- quality
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `quality`;

CREATE TABLE `quality`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `vote` INTEGER NOT NULL,
    `description` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user_has_pwd
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user_has_pwd`;

CREATE TABLE `user_has_pwd`
(
    `user_id` INTEGER NOT NULL,
    `pwd_id` INTEGER NOT NULL,
    `date_from` DATETIME NOT NULL,
    `date_to` DATETIME NOT NULL,
    PRIMARY KEY (`user_id`,`pwd_id`),
    INDEX `fk_user_has_pwd_pwd1_idx` (`pwd_id`),
    INDEX `fk_user_has_pwd_user1_idx` (`user_id`),
    CONSTRAINT `fk_user_has_pwd_user1`
        FOREIGN KEY (`user_id`)
        REFERENCES `users` (`id`),
    CONSTRAINT `fk_user_has_pwd_pwd1`
        FOREIGN KEY (`pwd_id`)
        REFERENCES `pwds` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user_type
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `description` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- users
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(90) NOT NULL,
    `user_type_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `fk_users_user_type1_idx` (`user_type_id`),
    CONSTRAINT `fk_users_user_type1`
        FOREIGN KEY (`user_type_id`)
        REFERENCES `user_type` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- votes
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `votes`;

CREATE TABLE `votes`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `users_id` INTEGER NOT NULL,
    `quality_id` INTEGER NOT NULL,
    `poll_id` INTEGER NOT NULL,
    `argument_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `fk_votes_users1_idx` (`users_id`),
    INDEX `fk_votes_quality1_idx` (`quality_id`),
    INDEX `fk_votes_polls_has_arguments1_idx` (`poll_id`, `argument_id`),
    CONSTRAINT `fk_votes_users1`
        FOREIGN KEY (`users_id`)
        REFERENCES `users` (`id`),
    CONSTRAINT `fk_votes_quality1`
        FOREIGN KEY (`quality_id`)
        REFERENCES `quality` (`id`),
    CONSTRAINT `fk_votes_polls_has_arguments1`
        FOREIGN KEY (`poll_id`,`argument_id`)
        REFERENCES `polls_has_arguments` (`polls_id`,`arguments_id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
