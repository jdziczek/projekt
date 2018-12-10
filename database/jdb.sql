CREATE DATABASE jdb;
USE jdb;

CREATE TABLE orders(
        id_order SMALLINT NOT NULL AUTO_INCREMENT,
        order_date DATE NOT NULL,
        order_time TIME NOT NULL,
        car_type VARCHAR(20) NOT NULL,
        people TINYINT NOT NULL,
        f_address SMALLINT NOT NULL,
        s_address SMALLINT NOT NULL, phone SMALLINT NOT NULL,
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
	position VARCHAR(10) NOT NULL,
	PRIMARY KEY (id_employee)

);
 
CREATE TABLE users(
	id_user SMALLINT NOT NULL,
	login VARCHAR(20) NOT NULL,
	password VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_user)
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

