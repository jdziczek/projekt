CREATE VIEW logging AS
SELECT id_user,login, password, position 
FROM users a, employees b
WHERE a.id_user=b.id_employee;

CREATE VIEW kierowcy AS
SELECT id_crew, car, e_name, e_surname
FROM crew a, employees b
WHERE a.id_crew=b.id_employee;

CREATE VIEW archiwum AS
SELECT id_order, order_date, car_type, f_address, s_address, id_cargo, id_crew, status
FROM arch_orders;

