USE pub;
DROP TABLE IF EXISTs beer;

CREATE TABLE beer (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL,
    alcohol DECIMAL(3,1) NOT NULL
);

INSERT INTO beer
(name, alcohol)
values
('Stout', 6.7),
('Porter', 5.8),
('Blonde Ale', 4.3),
('Blonde Ale 2', 4.3),
('IPA', 10.2),
('IPA', 4.2);

SELECT * FROM beer;
SELECT name as nombre, alcohol, 1 as a FROM beer;
-- where
SELECT * FROM beer WHERE id=1;
SELECT * FROM beer WHERE id IN(1, 3);
SELECT * FROM beer WHERE name LIKE 'i%';
SELECT * FROM beer WHERE name LIKE '%A';
SELECT * FROM beer WHERE name LIKE 'B%E';
-- order by
SELECT * FROM beer ORDER BY name;
SELECT * FROM beer ORDER BY name DESC;
SELECT * FROM beer ORDER BY alcohol;
SELECT * FROM beer ORDER BY alcohol, name;
-- group by
SELECT alcohol FROM beer GROUP BY alcohol;
SELECT alcohol, COUNT(*) FROM beer GROUP BY alcohol;
SELECT name, COUNT(*) FROM beer GROUP BY name;
SELECT name, SUM(alcohol) FROM beer GROUP BY name;
SELECT name, MAX(alcohol) FROM beer GROUP BY name;
SELECT name, MIN(alcohol) FROM beer GROUP BY name;
-- updating
UPDATE beer SET alcohol = 7.7 WHERE id=1;
UPDATE beer SET alcohol = alcohol + 1.1 WHERE id IN(1,2,3);
UPDATE beer SET alcohol = 11, name = 'Imperial' WHERE id=4;
-- deleting
DELETE FROM beer WHERE id = 4;
DELETE FROM beer WHERE name = 'Stout';

SELECT * FROM beer;
-- Creating another table
CREATE TABLE brand (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);
-- Inserting data
INSERT INTO brand(name)
VALUES
('Minerva'), ('Fuller');
-- New column for the table beer
ALTER TABLE beer
ADD COLUMN idBrand INT;
-- Add a foreign key
ALTER TABLE beer
ADD CONSTRAINT fk_brand
FOREIGN KEY (idBrand)
REFERENCES brand(id);

UPDATE beer
SET idBrand = 1;