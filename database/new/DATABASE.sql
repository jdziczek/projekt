CREATE DATABASE jdb CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE jdb;

CREATE TABLE orders(
        id_order SMALLINT NOT NULL AUTO_INCREMENT,
        order_date DATE NOT NULL,
        order_time TIME NOT NULL,
        car_type VARCHAR(20) NOT NULL,
        people TINYINT NOT NULL,
        f_address SMALLINT NOT NULL,
        s_address SMALLINT NOT NULL,  
		phone INT NOT NULL,
        distance SMALLINT NOT NULL,
        valuation SMALLINT,
        id_cargo SMALLINT NOT NULL,
        id_crew SMALLINT NOT NULL,
        status VARCHAR(30) NOT NULL,
        id_dispatcher SMALLINT NOT NULL,
        comment_disp VARCHAR(150),
        comment_driver VARCHAR(150),
        PRIMARY KEY (id_order)
);

CREATE TABLE address(
	id_address SMALLINT NOT NULL AUTO_INCREMENT,
	street VARCHAR(80),
	b_number SMALLINT NOT NULL,
	a_number SMALLINT,
	zip_code VARCHAR(10),
	city VARCHAR(80) NOT NULL,
	floor TINYINT,
	PRIMARY KEY (id_address)
);


CREATE TABLE cargo(
	id_cargo SMALLINT NOT NULL AUTO_INCREMENT,
	cargo_dsc VARCHAR(200) NOT NULL,
	cargo_weight FLOAT NOT NULL,
	cargo_length FLOAT NOT NULL,
	cargo_width FLOAT NOT NULL, 
	cargo_height FLOAT NOT NULL,
	PRIMARY KEY (id_cargo)
);

CREATE TABLE car(
	car_type VARCHAR(20),
	car_capacity FLOAT NOT NULL,
	cargo_length FLOAT NOT NULL,
	cargo_width FLOAT NOT NULL, 
	cargo_height FLOAT NOT NULL,
	PRIMARY KEY (car_type)
);

CREATE TABLE crew(
	id_crew SMALLINT NOT NULL,
	car VARCHAR (20) NOT NULL,
	PRIMARY KEY (id_crew)
);

CREATE TABLE employees(
	id_employee SMALLINT NOT NULL AUTO_INCREMENT,
	e_name VARCHAR(20) NOT NULL, 
	e_surname VARCHAR(40) NOT NULL,
	position VARCHAR(15) NOT NULL,
	PRIMARY KEY (id_employee)

);
 
CREATE TABLE users(
	id_user SMALLINT NOT NULL,
	login VARCHAR(20) NOT NULL,
	password VARCHAR(255) NOT NULL,
	PRIMARY KEY (id_user)
);

CREATE TABLE arch_orders(
        id_order SMALLINT NOT NULL,
        order_date DATE NOT NULL,
        order_time TIME NOT NULL,
        car_type VARCHAR(20) NOT NULL,
        people TINYINT NOT NULL,
        f_address SMALLINT NOT NULL,
        s_address SMALLINT NOT NULL,  
		phone INT NOT NULL,
        distance SMALLINT NOT NULL,
        valuation SMALLINT,
        id_cargo SMALLINT NOT NULL,
        id_crew SMALLINT NOT NULL,
        status VARCHAR(30) NOT NULL,
        id_dispatcher SMALLINT NOT NULL,
        comment_disp VARCHAR(150),
        comment_driver VARCHAR(150),
        PRIMARY KEY (id_order)
);

CREATE TABLE arch_address(
	id_address SMALLINT NOT NULL,
	street VARCHAR(80),
	b_number SMALLINT NOT NULL,
	a_number SMALLINT,
	zip_code VARCHAR(10),
	city VARCHAR(80) NOT NULL,
	floor TINYINT,
	PRIMARY KEY (id_address)
);


CREATE TABLE arch_cargo(
	id_cargo SMALLINT NOT NULL,
	cargo_dsc VARCHAR(200) NOT NULL,
	cargo_weight FLOAT NOT NULL,
	cargo_length FLOAT NOT NULL,
	cargo_width FLOAT NOT NULL, 
	cargo_height FLOAT NOT NULL,
	PRIMARY KEY (id_cargo)
);

ALTER TABLE orders
ADD FOREIGN KEY (f_address) REFERENCES address(id_address);

ALTER TABLE orders
ADD FOREIGN KEY (s_address) REFERENCES address(id_address);

ALTER TABLE orders
ADD FOREIGN KEY (id_cargo) REFERENCES cargo(id_cargo);

ALTER TABLE orders
ADD FOREIGN KEY (car_type) REFERENCES car(car_type);

ALTER TABLE orders
ADD FOREIGN KEY (id_crew) REFERENCES crew(id_crew);

ALTER TABLE crew
ADD FOREIGN KEY (id_crew) REFERENCES employees(id_employee);

ALTER TABLE crew
ADD FOREIGN KEY (car) REFERENCES car(car_type);

ALTER TABLE employees
ADD FOREIGN KEY (id_employee) REFERENCES users(id_user); 

ALTER TABLE arch_orders
ADD FOREIGN KEY (f_address) REFERENCES arch_address(id_address);

ALTER TABLE arch_orders
ADD FOREIGN KEY (s_address) REFERENCES arch_address(id_address);

ALTER TABLE arch_orders
ADD FOREIGN KEY (id_cargo) REFERENCES arch_cargo(id_cargo);

INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (1, 'Kwiatowa', 14, 25, '81-005', 'Gdynia', 2);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (2, 'Chryzantemowa', 26, 13, '81-002', 'Gdynia', 3);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (3, 'Fiolkowa', 132, 4, '80-326', 'Gdansk', 0);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (4, 'Tulipanowa', 45, 42, '80-364', 'Gdansk', 1);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (5, 'Bratkowa', 178, 8, '01-001', 'Warszawa', 1);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (6, 'Stokrotkowa', 1, 12, '01-006', 'Warszawa', 4);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (7, 'Hiacyntowa', 44, 4, '01-478', 'Warszawa', 2);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (8, 'Koperkowa', 6, 8, '01-452', 'Warszawa', 3);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (9, 'Demptowska', 45, 13, '81-364', 'Gdansk', 0);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (10, 'Hallera', 4, 22, '81-164', 'Gdansk', 1);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (11, 'Miękka', 3, 17, '81-364', 'Gdansk', 2);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (12, 'Twarda', 4, 14, '82-424', 'Gdansk', 1);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (13, 'Hiacyntowa', 6, 15, '80-364', 'Gdansk', 2);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (14, 'Stokrotkowa', 45, 12, '80-44', 'Gdansk', 3);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (15, 'Bławatna', 23, 12, '80-064', 'Gdansk', 0);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (16, 'Rumska', 54, 16, '80-364', 'Gdansk', 2);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (17, 'Pawia', 72, 12, '80-464', 'Gdansk', 1);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (18, 'Sowia', 53, 11, '80-264', 'Gdansk', 3);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (19, 'Chabrowa', 9, 2, '80-664', 'Gdansk', 1);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (20, 'Pusta', 22, 6, '80-334', 'Gdansk', 2);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (21, 'Kartuska', 12, 2, '80-362', 'Gdansk', 3);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (22, 'Helska', 23, 5, '80-369', 'Gdansk', 0);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (23, 'Rdestowa', 62, 4, '80-360', 'Gdansk', 2);
INSERT INTO address (id_address, street, b_number, a_number, zip_code, city, floor) VALUES (24, 'Sępia', 21, 2, '80-064', 'Gdansk', 0);


INSERT INTO car (car_type, car_capacity, cargo_length, cargo_width, cargo_height) VALUES ('bus', 1.5, 3.5, 1.8, 1.8);
INSERT INTO car (car_type, car_capacity, cargo_length, cargo_width, cargo_height) VALUES ('kontener', 2, 4.5, 1.8, 2.3);
INSERT INTO car (car_type, car_capacity, cargo_length, cargo_width, cargo_height) VALUES ('tir', 6, 6, 2, 2.5);

INSERT INTO cargo (id_cargo, cargo_dsc, cargo_weight, cargo_length, cargo_width, cargo_height) VALUES (1, 'lodowka side-by-side', 100, 1, 1, 1.8);
INSERT INTO cargo (id_cargo, cargo_dsc, cargo_weight, cargo_length, cargo_width, cargo_height) VALUES (2, 'szafa i komoda', 80, 1, 2, 1.8);
INSERT INTO cargo (id_cargo, cargo_dsc, cargo_weight, cargo_length, cargo_width, cargo_height) VALUES (3, '8 palet skrzynek z owocami ', 2000, 4, 2, 1.5);
INSERT INTO cargo (id_cargo, cargo_dsc, cargo_weight, cargo_length, cargo_width, cargo_height) VALUES (4, 'paczka', 20, 3, 2, 0.2);
INSERT INTO cargo (id_cargo, cargo_dsc, cargo_weight, cargo_length, cargo_width, cargo_height) VALUES (5, 'paczka', 15, 2, 2, 0.25);
INSERT INTO cargo (id_cargo, cargo_dsc, cargo_weight, cargo_length, cargo_width, cargo_height) VALUES (6, 'paczka', 30, 3, 3, 0.3);
INSERT INTO cargo (id_cargo, cargo_dsc, cargo_weight, cargo_length, cargo_width, cargo_height) VALUES (7, '2 paczki', 20, 3, 4, 0.5);
INSERT INTO cargo (id_cargo, cargo_dsc, cargo_weight, cargo_length, cargo_width, cargo_height) VALUES (8, '2 paczki', 20, 5, 4, 0.4);
INSERT INTO cargo (id_cargo, cargo_dsc, cargo_weight, cargo_length, cargo_width, cargo_height) VALUES (9, '12 palet skrzynek z owocami', 3000, 4, 3, 1.5);
INSERT INTO cargo (id_cargo, cargo_dsc, cargo_weight, cargo_length, cargo_width, cargo_height) VALUES (10, '16 palet skrzynek z owocami', 4000, 4, 2, 3);
INSERT INTO cargo (id_cargo, cargo_dsc, cargo_weight, cargo_length, cargo_width, cargo_height) VALUES (11, '22 palet skrzynek z owocami', 5000, 4, 4, 3);
INSERT INTO cargo (id_cargo, cargo_dsc, cargo_weight, cargo_length, cargo_width, cargo_height) VALUES (12, '26 palet skrzynek z owocami', 6000, 6, 4, 3);

INSERT INTO users (id_user, login, password) VALUES
(1, 'jkowalski', '$2y$10$uJJWXeePFbWxKGhLYR56Wu9qPfTfm4GTvUYVL5oFFYOlftkV1E49O'),
(2, 'tmalinowski', '$2y$10$YIlAJuIQuqbBYPKb03Bywu6dn/yukaybS8wl5In2aUk8dAXy3dhku'),
(3, 'mnowak', '$2y$10$gM.zUR8TX46XVHCG1V/Jo.9ei8kuE6Jzb2DAojSWoyOL8ZpLpSKV.'),
(4, 'rdabek', '$2y$10$LAZiURzNa1V3pVIEG3kHsuA/Wwo85./uKzAZ9seC6wpX9EVrIARma'),
(5, 'kmazurek', '$2y$10$gVs3.envVRd1UaCQwRjG7uNRH9RpXOhpx.8ppxeoPNtGNKG/e0dTG'),
(6, 'test_abc123', '$2y$10$uJJWXeePFbWxKGhLYR56Wu9qPfTfm4GTvUYVL5oFFYOlftkV1E49O'),
(7, 'akowalski', '$2y$10$uJJWXeePFbWxKGhLYR56Wu9qPfTfm4GTvUYVL5oFFYOlftkV1E49O');

INSERT INTO employees (id_employee, e_name, e_surname, position) VALUES (1, 'Jan', 'Kowalski', 'kierowca');
INSERT INTO employees (id_employee, e_name, e_surname, position) VALUES (2, 'Tomasz', 'Malinowski', 'kierowca');
INSERT INTO employees (id_employee, e_name, e_surname, position) VALUES (3, 'Michał', 'Nowak', 'dyspozytor');
INSERT INTO employees (id_employee, e_name, e_surname, position) VALUES (4, 'Robert', 'Dabek', 'dyspozytor');
INSERT INTO employees (id_employee, e_name, e_surname, position) VALUES (5, 'Krzysztof', 'Mazurek', 'kierowca');
INSERT INTO employees (id_employee, e_name, e_surname, position) VALUES (6, 'test', 'test', 'kierowca');
INSERT INTO employees (id_employee, e_name, e_surname, position) VALUES (7, 'Adam', 'Kowalski', 'administrator');


INSERT INTO crew (id_crew, car) VALUES (1, 'bus');
INSERT INTO crew (id_crew, car) VALUES (2, 'kontener');
INSERT INTO crew (id_crew, car) VALUES (5, 'tir');

INSERT INTO orders (id_order, order_date, order_time, car_type, people, f_address, s_address, phone, distance, valuation, id_cargo, id_crew, status, id_dispatcher, comment_disp, comment_driver) VALUES (1, '2018-12-10', '9:00', 'bus', 2, 1, 2, '785965236', 10, 150, 1, 1, 'zrealizowane', 3, 'brak możliwości wjazdu na posesję', 'wjazd już był możliwy');
INSERT INTO orders (id_order, order_date, order_time, car_type, people, f_address, s_address, phone, distance, valuation, id_cargo, id_crew, status, id_dispatcher, comment_disp, comment_driver) VALUES (2, '2018-12-14', '8:00', 'bus', 1, 3, 4, '589652321', 5, 80, 2, 1, 'zrealizowane', 4, NULL, NULL);
INSERT INTO orders (id_order, order_date, order_time, car_type, people, f_address, s_address, phone, distance, valuation, id_cargo, id_crew, status, id_dispatcher, comment_disp, comment_driver) VALUES (3, '2018-12-16', '12:00', 'kontener', 3, 5, 6, '652325521', 50, 3000, 3, 2, 'anulowane', 3, NULL, NULL);
INSERT INTO orders (id_order, order_date, order_time, car_type, people, f_address, s_address, phone, distance, valuation, id_cargo, id_crew, status, id_dispatcher, comment_disp, comment_driver) VALUES (4, '2018-12-22', '14:00', 'bus', 2, 7, 8, '603254789', 3, 100, 4, 1, 'zrealizowane', 4, 'remont drogi, podjechać od Piaskowej', NULL);
INSERT INTO orders (id_order, order_date, order_time, car_type, people, f_address, s_address, phone, distance, valuation, id_cargo, id_crew, status, id_dispatcher, comment_disp, comment_driver) VALUES (5, '2019-01-04', '9:00', 'bus', 1, 9, 10, '782365236', 6, 180, 5, 1, 'zrealizowane', 3, 'brak możliwości wjazdu', NULL);
INSERT INTO orders (id_order, order_date, order_time, car_type, people, f_address, s_address, phone, distance, valuation, id_cargo, id_crew, status, id_dispatcher, comment_disp, comment_driver) VALUES (6, '2018-01-05', '8:00', 'bus', 1, 11, 12, '548965231', 9, 250, 6, 1, 'przyjete', 4, NULL, NULL);
INSERT INTO orders (id_order, order_date, order_time, car_type, people, f_address, s_address, phone, distance, valuation, id_cargo, id_crew, status, id_dispatcher, comment_disp, comment_driver) VALUES (7, '2018-01-07', '12:00', 'bus', 1, 13, 14, '565233421', 15, 320, 7, 1, 'anulowane', 3, NULL, NULL);
INSERT INTO orders (id_order, order_date, order_time, car_type, people, f_address, s_address, phone, distance, valuation, id_cargo, id_crew, status, id_dispatcher, comment_disp, comment_driver) VALUES (8, '2018-01-09', '14:00', 'bus', 1, 15, 16, '572354789', 30, 580, 8, 1, 'przyjete', 4, 'groźny pies', NULL);
INSERT INTO orders (id_order, order_date, order_time, car_type, people, f_address, s_address, phone, distance, valuation, id_cargo, id_crew, status, id_dispatcher, comment_disp, comment_driver) VALUES (9, '2018-01-13', '9:00', 'kontener', 3, 17, 18, '786552366', 10, 1000, 9, 2, 'przyjete', 3, 'remont drogi', NULL);
INSERT INTO orders (id_order, order_date, order_time, car_type, people, f_address, s_address, phone, distance, valuation, id_cargo, id_crew, status, id_dispatcher, comment_disp, comment_driver) VALUES (10, '2018-01-15', '8:00', 'kontener', 4, 19, 20, '452362321', 25, 1800, 10, 2, 'anulowane', 4, NULL, NULL);
INSERT INTO orders (id_order, order_date, order_time, car_type, people, f_address, s_address, phone, distance, valuation, id_cargo, id_crew, status, id_dispatcher, comment_disp, comment_driver) VALUES (11, '2018-01-16', '12:00', 'tir', 5, 21, 22, '652363821', 50, 3400, 11, 5, 'przyjete', 3, NULL, NULL);
INSERT INTO orders (id_order, order_date, order_time, car_type, people, f_address, s_address, phone, distance, valuation, id_cargo, id_crew, status, id_dispatcher, comment_disp, comment_driver) VALUES (12, '2018-01-17', '14:00', 'tir', 6, 23, 24, '605425789', 45, 3700, 12, 5, 'przyjete', 3, 'groźny pies', NULL);