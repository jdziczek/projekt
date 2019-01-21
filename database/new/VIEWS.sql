CREATE VIEW logging AS
SELECT id_user,login, password, position 
FROM users a, employees b
WHERE a.id_user=b.id_employee;

CREATE VIEW kierowcy AS
SELECT id_crew, car, e_name, e_surname
FROM crew a, employees b
WHERE a.id_crew=b.id_employee;

CREATE VIEW archiwum AS
SELECT *
FROM arch_orders;

