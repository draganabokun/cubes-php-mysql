-- Zadatak: Napisati UPDATE upite da se prenesu kljuceve od brenda i kategorija u tabelu products
UPDATE products SET brand_id = 1 WHERE brand = 'Apple';
UPDATE products SET brand_id = 2 WHERE brand = 'Beko';
UPDATE products SET brand_id = 3 WHERE brand = 'Bosch';
UPDATE products SET brand_id = 4 WHERE brand = 'Gorenje';
UPDATE products SET brand_id = 5 WHERE brand = 'HTC';
UPDATE products SET brand_id = 6 WHERE brand = 'Huawei';
UPDATE products SET brand_id = 7 WHERE brand = 'LG';
UPDATE products SET brand_id = 8 WHERE brand = 'Samsung';
UPDATE products SET brand_id = 9 WHERE brand = 'Sony';


UPDATE products SET category_id = 1 WHERE category = 'Mobilni Telefon';
UPDATE products SET category_id = 2 WHERE category = 'Televizor';
UPDATE products SET category_id = 3 WHERE category = 'Frizider';
UPDATE products SET category_id = 4 WHERE category = 'Ves Masina';
UPDATE products SET category_id = 5 WHERE category = 'Sporet';


-- SQL JOIN (INNER JOIN)

-- Zadatak: Selektuj id proizvoda, naziv proizvoda, id kategorije i naziv kategorije
-- Zadatak: Selektuj id proizvoda, naziv proizvoda, id brenda i naziv brenda
-- Zadatak: Selektuj id proizvoda, naziv proizvoda, id kategorije i naziv kategorije, id brenda i naziv brenda



-- Zadatak: Ubaciti proizvod bez kategorije i proizvod bez brenda, ubaciti brendove i kategorije bez proizvoda

-- SQL LEFT JOIN
-- Zadatak: Selektuj id proizvoda, naziv proizvoda, id kategorije i naziv kategorije  ZA SVE PROIZVODE I ONE KOJI NEMAJU KATEGORIJU
-- Zadatak: Selektuj id proizvoda, naziv proizvoda, id brenda i naziv brenda  ZA SVE PROIZVODE I ONE KOJI NEMAJU BREND
-- Zadatak: Selektuj id proizvoda i naziv proizvoda za sve proizvode koji NEMAJU KATEGORIJU

-- SQL RIGHT JOIN

-- Zadatak: Selektuj nazive kategorija koje nemaju proizvode
-- Zadatak: Selektuj nazive brendova koji nemaju proizvode
