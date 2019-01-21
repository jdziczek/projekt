CREATE TRIGGER UsuwanieZlecen AFTER DELETE on orders
FOR EACH ROW
BEGIN
DELETE FROM address
    WHERE address.id_address = old.f_address;
DELETE FROM address
    WHERE address.id_address = old.s_address;
DELETE FROM cargo
    WHERE cargo.id_cargo = old.id_cargo;
END