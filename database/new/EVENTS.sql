SET GLOBAL event_scheduler = ON; 

USE jdb;
DELIMITER $$
CREATE EVENT `ArchiwizacjaZlecen` ON SCHEDULE EVERY 1 MONTH STARTS '2019-01-01 00:00:00' ON COMPLETION PRESERVE ENABLE DO

    BEGIN
        INSERT INTO arch_orders (
        id_order,
        order_date,
        order_time,
        car_type,
        people,
        f_address,
        s_address,  
	    phone,
        distance,
        valuation,
        id_cargo,
        id_crew,
        status,
        id_dispatcher,
        comment_disp,
        comment_driver
        ) SELECT
        orders.id_order,
        orders.order_date,
        orders.order_time,
        orders.car_type,
        orders.people,
        orders.f_address,
        orders.s_address,  
	    orders.phone,
        orders.distance,
        orders.valuation,
        orders.id_cargo,
        orders.id_crew,
        orders.status,
        orders.id_dispatcher,
        orders.comment_disp,
        orders.comment_driver
        FROM
            orders 
        WHERE
            orders.order_date > DATE_SUB(NOW(),INTERVAL 1 YEAR) ; 

        DELETE
        FROM
            orders
        WHERE
            order_date > DATE_SUB(NOW(),INTERVAL 1 YEAR) ;
        END$$

    DELIMITER ;

USE jdb;
DELIMITER $$
CREATE EVENT `ArchiwizacjaLadunkow` ON SCHEDULE EVERY 1 MONTH STARTS '2019-01-01 01:00:00' ON COMPLETION PRESERVE ENABLE DO

    BEGIN
    INSERT INTO arch_cargo (
	id_cargo,
	cargo_dsc,
	cargo_weight,
	cargo_length,
	cargo_width, 
	cargo_height)
    SELECT 
    cargo.id_cargo,
	cargo.cargo_dsc,
	cargo.cargo_weight,
	cargo.cargo_length,
	cargo.cargo_width, 
	cargo.cargo_heigh
        FROM
            cargo 
        WHERE
            cargo.id_cargo IN (SELECT arch_orders.id_cargo FROM arch_orders);

        DELETE
        FROM
            cargo
        WHERE
            id_cargo IN (SELECT arch_orders.id_cargo FROM arch_orders); 
        END$$

    DELIMITER ;


USE jdb;
DELIMITER $$
CREATE EVENT `ArchiwizacjaAdresow` ON SCHEDULE EVERY 1 MONTH STARTS '2019-01-01 01:00:00' ON COMPLETION PRESERVE ENABLE DO

    BEGIN
    INSERT INTO arch_address (
	id_address,
	street,
	b_number,
	a_number,
	zip_code,
	city,
	floor)
    SELECT 
	address.id_address,
	address.street,
	address.b_number,
	address.a_number,
	address.zip_code,
	address.city,
	address.floor
        FROM
            address 
        WHERE
            address.id_address IN (SELECT arch_orders.id_address FROM arch_orders);

        DELETE
        FROM
            address
        WHERE
            id_address IN (SELECT arch_orders.id_address FROM arch_orders); 
        END$$

    DELIMITER ;