CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `actual_pwd` AS
    SELECT 
        `x`.`idUser` AS `idUser`,
        `x`.`name` AS `name`,
        `x`.`surname` AS `surname`,
        `x`.`matricola` AS `matricola`,
        `x`.`UserType_idUserType` AS `UserType_idUserType`,
        `x`.`email` AS `email`,
        `y`.`User_idUser` AS `User_idUser`,
        `y`.`Pwd_idPwd` AS `Pwd_idPwd`,
        `y`.`dateFrom` AS `dateFrom`,
        `y`.`dateTo` AS `dateTo`,
        `z`.`idPwd` AS `idPwd`,
        `z`.`pwd` AS `pwd`
    FROM
        ((`user` `x`
        JOIN `user_has_pwd` `y` ON ((`x`.`idUser` = `y`.`User_idUser`)))
        JOIN `pwd` `z` ON ((`z`.`idPwd` = `y`.`Pwd_idPwd`)))
    WHERE
        ((1 = 1) AND (`y`.`dateFrom` < SYSDATE())
            AND (`y`.`dateTo` > SYSDATE()))