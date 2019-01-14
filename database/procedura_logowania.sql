DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Zaloguj`(IN `arg_login` VARCHAR(20))
SELECT * FROM logging WHERE login = arg_login$$
DELIMITER ;