-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema jdb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema jdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `jdb` DEFAULT CHARACTER SET latin1 ;
USE `jdb` ;

-- -----------------------------------------------------
-- Table `jdb`.`address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jdb`.`address` (
  `id_address` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `street` VARCHAR(80) NULL DEFAULT NULL,
  `b_number` SMALLINT(6) NOT NULL,
  `a_number` SMALLINT(6) NULL DEFAULT NULL,
  `zip_code` VARCHAR(10) NULL DEFAULT NULL,
  `city` VARCHAR(80) NOT NULL,
  `floor` TINYINT(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id_address`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `jdb`.`car`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jdb`.`car` (
  `car_type` VARCHAR(20) NOT NULL,
  `car_capacity` FLOAT NOT NULL,
  `cargo_length` FLOAT NOT NULL,
  `cargo_width` FLOAT NOT NULL,
  `cargo_height` FLOAT NOT NULL,
  PRIMARY KEY (`car_type`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `jdb`.`cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jdb`.`cargo` (
  `id_cargo` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cargo_dsc` VARCHAR(200) NOT NULL,
  `cargo_weight` FLOAT NOT NULL,
  `cargo_length` FLOAT NOT NULL,
  `cargo_width` FLOAT NOT NULL,
  `cargo_height` FLOAT NOT NULL,
  PRIMARY KEY (`id_cargo`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `jdb`.`crew`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jdb`.`crew` (
  `id_crew` SMALLINT(6) NOT NULL,
  `car` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id_crew`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `car` ON `jdb`.`crew` (`car` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `jdb`.`employees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jdb`.`employees` (
  `id_employee` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `e_name` VARCHAR(20) NOT NULL,
  `e_surname` VARCHAR(40) NOT NULL,
  `position` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id_employee`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `jdb`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jdb`.`orders` (
  `id_order` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_date` DATE NOT NULL,
  `order_time` TIME NOT NULL,
  `car_type` VARCHAR(20) NOT NULL,
  `people` TINYINT(4) NOT NULL,
  `f_address` SMALLINT(6) NOT NULL,
  `s_address` SMALLINT(6) NOT NULL,
  `phone` VARCHAR(15) NOT NULL,
  `distance` SMALLINT(6) NOT NULL,
  `valuation` SMALLINT(6) NULL DEFAULT NULL,
  `id_cargo` SMALLINT(6) NOT NULL,
  `id_crew` SMALLINT(6) NOT NULL,
  `status` VARCHAR(30) NOT NULL,
  `id_dispatcher` SMALLINT(6) NOT NULL,
  `comment_disp` VARCHAR(150) NULL DEFAULT NULL,
  `comment_driver` VARCHAR(150) NULL DEFAULT NULL,
  PRIMARY KEY (`id_order`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;

CREATE INDEX `f_address` ON `jdb`.`orders` (`f_address` ASC) VISIBLE;

CREATE INDEX `s_address` ON `jdb`.`orders` (`s_address` ASC) VISIBLE;

CREATE INDEX `id_cargo` ON `jdb`.`orders` (`id_cargo` ASC) VISIBLE;

CREATE INDEX `car_type` ON `jdb`.`orders` (`car_type` ASC) VISIBLE;

CREATE INDEX `id_crew` ON `jdb`.`orders` (`id_crew` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `jdb`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `jdb`.`users` (
  `id_user` SMALLINT(6) NOT NULL,
  `login` VARCHAR(20) NOT NULL,
  `password` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id_user`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `jdb`.`address`
-- -----------------------------------------------------
START TRANSACTION;
USE `jdb`;
INSERT INTO `jdb`.`address` (`id_address`, `street`, `b_number`, `a_number`, `zip_code`, `city`, `floor`) VALUES (1, 'Kwiatowa', 14, 25, '81-005', 'Gdynia', 2);
INSERT INTO `jdb`.`address` (`id_address`, `street`, `b_number`, `a_number`, `zip_code`, `city`, `floor`) VALUES (2, 'Chryzantemowa', 26, 13, '81-002', 'Gdynia', 3);
INSERT INTO `jdb`.`address` (`id_address`, `street`, `b_number`, `a_number`, `zip_code`, `city`, `floor`) VALUES (3, 'Fiołkowa', 132, 4, '80-326', 'Gdańsk', 0);
INSERT INTO `jdb`.`address` (`id_address`, `street`, `b_number`, `a_number`, `zip_code`, `city`, `floor`) VALUES (4, 'Tulipanowa', 45, 47, '80-364', 'Gdańsk', 1);
INSERT INTO `jdb`.`address` (`id_address`, `street`, `b_number`, `a_number`, `zip_code`, `city`, `floor`) VALUES (5, 'Bratkowa', 178, 8, '01-001', 'Warszawa', 1);
INSERT INTO `jdb`.`address` (`id_address`, `street`, `b_number`, `a_number`, `zip_code`, `city`, `floor`) VALUES (6, 'Stokrotkowa', 1, 12, '01-006', 'Warszawa', 4);
INSERT INTO `jdb`.`address` (`id_address`, `street`, `b_number`, `a_number`, `zip_code`, `city`, `floor`) VALUES (7, 'Hiacyntowa', 44, 4, '01-478', 'Warszawa', 2);
INSERT INTO `jdb`.`address` (`id_address`, `street`, `b_number`, `a_number`, `zip_code`, `city`, `floor`) VALUES (8, 'Koperkowa', 6, 8, '01-452', 'Warszawa', 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `jdb`.`car`
-- -----------------------------------------------------
START TRANSACTION;
USE `jdb`;
INSERT INTO `jdb`.`car` (`car_type`, `car_capacity`, `cargo_length`, `cargo_width`, `cargo_height`) VALUES ('bus', 1,5, 3,5, 1,8, 1,8);
INSERT INTO `jdb`.`car` (`car_type`, `car_capacity`, `cargo_length`, `cargo_width`, `cargo_height`) VALUES ('kontener', 2, 4,5, 1,8, 2,3);
INSERT INTO `jdb`.`car` (`car_type`, `car_capacity`, `cargo_length`, `cargo_width`, `cargo_height`) VALUES ('tir', 6, 6, 2, 2,5);

COMMIT;


-- -----------------------------------------------------
-- Data for table `jdb`.`cargo`
-- -----------------------------------------------------
START TRANSACTION;
USE `jdb`;
INSERT INTO `jdb`.`cargo` (`id_cargo`, `cargo_dsc`, `cargo_weight`, `cargo_length`, `cargo_width`, `cargo_height`) VALUES (1, 'lodówka side-by-side', 100, 1, 1, 1,8);
INSERT INTO `jdb`.`cargo` (`id_cargo`, `cargo_dsc`, `cargo_weight`, `cargo_length`, `cargo_width`, `cargo_height`) VALUES (2, 'szafa i komoda', 80, 1, 2, 1,8);
INSERT INTO `jdb`.`cargo` (`id_cargo`, `cargo_dsc`, `cargo_weight`, `cargo_length`, `cargo_width`, `cargo_height`) VALUES (3, '8 palet skrzynek z owocami ', 2000, 4, 2, 1,5);
INSERT INTO `jdb`.`cargo` (`id_cargo`, `cargo_dsc`, `cargo_weight`, `cargo_length`, `cargo_width`, `cargo_height`) VALUES (4, 'paczka', 20, 3, 2, 0,2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `jdb`.`crew`
-- -----------------------------------------------------
START TRANSACTION;
USE `jdb`;
INSERT INTO `jdb`.`crew` (`id_crew`, `car`) VALUES (1, 'bus');
INSERT INTO `jdb`.`crew` (`id_crew`, `car`) VALUES (2, 'bus');
INSERT INTO `jdb`.`crew` (`id_crew`, `car`) VALUES (5, 'kontener');

COMMIT;


-- -----------------------------------------------------
-- Data for table `jdb`.`employees`
-- -----------------------------------------------------
START TRANSACTION;
USE `jdb`;
INSERT INTO `jdb`.`employees` (`id_employee`, `e_name`, `e_surname`, `position`) VALUES (1, 'Jan', 'Kowalski', 'kierowca');
INSERT INTO `jdb`.`employees` (`id_employee`, `e_name`, `e_surname`, `position`) VALUES (2, 'Tomasz', 'Malinowski', 'kierowca');
INSERT INTO `jdb`.`employees` (`id_employee`, `e_name`, `e_surname`, `position`) VALUES (3, 'Michał', 'Nowak', 'dyspozytor');
INSERT INTO `jdb`.`employees` (`id_employee`, `e_name`, `e_surname`, `position`) VALUES (4, 'Robert', 'Dabek', 'dyspozytor');
INSERT INTO `jdb`.`employees` (`id_employee`, `e_name`, `e_surname`, `position`) VALUES (5, 'Krzysztof', 'Mazurek', 'kierowca');

COMMIT;


-- -----------------------------------------------------
-- Data for table `jdb`.`orders`
-- -----------------------------------------------------
START TRANSACTION;
USE `jdb`;
INSERT INTO `jdb`.`orders` (`id_order`, `order_date`, `order_time`, `car_type`, `people`, `f_address`, `s_address`, `phone`, `distance`, `valuation`, `id_cargo`, `id_crew`, `status`, `id_dispatcher`, `comment_disp`, `comment_driver`) VALUES (1, '2018-12-14', '9:00', 'bus', 2, 1, 2, '785965236', 10, 150, 1, DEFAULT, 'przyjęte', 3, 'brak możliwości wjazdu na posesję', NULL);
INSERT INTO `jdb`.`orders` (`id_order`, `order_date`, `order_time`, `car_type`, `people`, `f_address`, `s_address`, `phone`, `distance`, `valuation`, `id_cargo`, `id_crew`, `status`, `id_dispatcher`, `comment_disp`, `comment_driver`) VALUES (2, '2018-12-16', '8:00', 'bus', 1, 3, 4, '589652321', 5, 80, 2, 1, 'przydzielone', 4, NULL, NULL);
INSERT INTO `jdb`.`orders` (`id_order`, `order_date`, `order_time`, `car_type`, `people`, `f_address`, `s_address`, `phone`, `distance`, `valuation`, `id_cargo`, `id_crew`, `status`, `id_dispatcher`, `comment_disp`, `comment_driver`) VALUES (3, '2018-12-22', '12:00', 'kontener', 3, 5, 6, '652325521', 50, 3000, 3, 5, 'zaakceptowane', 3, NULL, NULL);
INSERT INTO `jdb`.`orders` (`id_order`, `order_date`, `order_time`, `car_type`, `people`, `f_address`, `s_address`, `phone`, `distance`, `valuation`, `id_cargo`, `id_crew`, `status`, `id_dispatcher`, `comment_disp`, `comment_driver`) VALUES (4, '2018-12-10', '14:00', 'bus', 2, 7, 8, '603254789', 3, 100, 4, DEFAULT, 'przyjete', 4, 'remont drogi, podjechać od Piaskowej', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `jdb`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `jdb`;
INSERT INTO `jdb`.`users` (`id_user`, `login`, `password`) VALUES (1, 'jkowalski', 'abc123');
INSERT INTO `jdb`.`users` (`id_user`, `login`, `password`) VALUES (2, 'tmalinowski', 'abc123');
INSERT INTO `jdb`.`users` (`id_user`, `login`, `password`) VALUES (3, 'mnowak', 'abc123');
INSERT INTO `jdb`.`users` (`id_user`, `login`, `password`) VALUES (4, 'rdabek', 'abc123');
INSERT INTO `jdb`.`users` (`id_user`, `login`, `password`) VALUES (5, 'kmazurek', 'abc123');
INSERT INTO `jdb`.`users` (`id_user`, `login`, `password`) VALUES (DEFAULT, DEFAULT, '');

COMMIT;

