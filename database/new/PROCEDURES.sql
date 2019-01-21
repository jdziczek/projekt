USE jdb;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DodajAdres`(

`street` VARCHAR(80),
`b_number` SMALLINT,
`a_number` SMALLINT,
`zip_code` VARCHAR(10),
`city` VARCHAR(80),
`floor` TINYINT)

BEGIN
INSERT INTO address (street, b_number, a_number, zip_code, city, floor)
  VALUES (street, b_number, a_number, zip_code, city, floor);
END$$
DELIMITER ;


USE jdb;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DodajAdres2`(

`street2` VARCHAR(80),
`b_number2` SMALLINT,
`a_number2` SMALLINT,
`zip_code2` VARCHAR(10),
`city2` VARCHAR(80),
`floor2` TINYINT)

BEGIN
INSERT INTO address (street, b_number, a_number, zip_code, city, floor)
  VALUES (street2, b_number2, a_number2, zip_code2, city2, floor2);
END$$
DELIMITER ;


USE jdb;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DodajLadunek`(
`cargo_dsc` VARCHAR(200),
`cargo_weight` FLOAT,
`cargo_length` FLOAT,
`cargo_width` FLOAT,
`cargo_height` FLOAT)

BEGIN
INSERT INTO cargo (cargo_dsc, cargo_weight, cargo_length, cargo_width, cargo_height)
  VALUES (cargo_dsc, cargo_weight, cargo_length, cargo_width, cargo_height);
END$$
DELIMITER ;


USE jdb;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `DodajZlecenie`(
`order_date` DATE,
`order_time` TIME,
`car_type` VARCHAR(20),
`people` TINYINT,
`f_address` SMALLINT,
`s_address` SMALLINT,
`phone` INT(20),
`distance` SMALLINT,
`valuation` SMALLINT,
`id_cargo` SMALLINT,
`id_crew` SMALLINT,
`status` VARCHAR(30),
`id_dispatcher` SMALLINT,
`comment_disp` VARCHAR(150),
`comment_driver` VARCHAR(150))

BEGIN
INSERT INTO orders (order_date, order_time, car_type, people, f_address, s_address, phone, distance, valuation, id_cargo, id_crew, status, id_dispatcher, comment_disp, comment_driver)
  VALUES (order_date, order_time, car_type, people, f_address, s_address, phone, distance, valuation, id_cargo, id_crew, status, id_dispatcher, comment_disp, comment_driver);
END$$
DELIMITER ;

USE jdb;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EdytujZlecenie`(
`orderid` INT(100),
`street` VARCHAR(80),
`b_number` SMALLINT,
`a_number` SMALLINT,
`zip_code` VARCHAR(10),
`city` VARCHAR(80),
`floor` TINYINT,
`street2` VARCHAR(80),
`b_number2` SMALLINT,
`a_number2` SMALLINT,
`zip_code2` VARCHAR(10),
`city2` VARCHAR(80),
`floor2` TINYINT,
`cargo_dsc` VARCHAR(200),
`cargo_weight` FLOAT,
`cargo_length` FLOAT,
`cargo_width` FLOAT,
`cargo_height` FLOAT,
`order_date` DATE,
`order_time` TIME,
`car_type` VARCHAR(20),
`people` TINYINT,
`f_address` SMALLINT,
`s_address` SMALLINT,
`phone` INT,
`distance` SMALLINT,
`valuation` SMALLINT,
`id_crew` SMALLINT,
`status` VARCHAR(30),
`id_dispatcher` SMALLINT,
`comment_disp` VARCHAR(150),
`comment_driver` VARCHAR(150))
BEGIN
UPDATE address SET street = @street, b_number = @b_number, a_number = @a_number, zip_code = @zip_code, city = @city, floor = @floor WHERE id_order = @orderid;

UPDATE address SET street = @street2, b_number = @b_number2, a_number = @a_number2, zip_code2 = @zip_code, city = @city2, floor = @floor2 WHERE id_order = @orderid;

UPDATE cargo SET cargo_dsc = @cargo_dsc, cargo_weight = @cargo_weight, cargo_length = @cargo_length, cargo_width = @cargo_width, cargo_height = @cargo_height WHERE id_order = @orderid;

UPDATE orders SET order_date = @order_date, order_time = @order_time, car_type = @car_type, people = @people, f_address = @f_address, s_address = @s_address, phone = @phone, distance = @distance, valuation = @valuation, id_cargo = @id_cargo, id_crew = @id_crew, status = @status, id_dispatcher = @id_dispatcher, comment_disp = @comment_disp, comment_driver = @comment_driver WHERE id_order = @orderid;

END$$
DELIMITER ;

USE jdb;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UsunZlecenie`(IN `orderid` INT(100))
    MODIFIES SQL DATA
DELETE FROM orders WHERE id_order = orderid$$
DELIMITER ;

USE jdb;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Zaloguj`(IN `arg_login` VARCHAR(20))
SELECT * FROM logging WHERE login = arg_login$$
DELIMITER ;

USE jdb;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `id_adresu`()
BEGIN
SELECT MAX(id_address) FROM address;
END$$
DELIMITER ;

USE jdb;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `id_ladunku`()
BEGIN
SELECT MAX(id_cargo) FROM cargo;
END$$
DELIMITER ;