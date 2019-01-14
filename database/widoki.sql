CREATE VIEW logging AS
SELECT id_user,login, password, position 
FROM users a, employees b
WHERE a.id_user=b.id_employee

