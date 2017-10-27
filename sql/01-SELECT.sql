-- Osnove SELECT upita
--
-- Zadatak: Selektuj sve redove iz tabele `products`
SELECT * FROM products;



-- Zadatak: Selektuj sve redove iz tabele `products` ali prikazati samo kolone `category`, `title` i `price`
SELECT
    category, title, price
FROM 
    products;




-- Zadatak: Selektuj sve redove iz tabele `products` ali prikazati samo kolone `category`, `title` i `price` ali izmeniti nazive kolona da budu na srpskom
SELECT
    category AS kategorija, 
    title AS naziv, 
    price AS cena
FROM 
    products;



-- Pretraga odnosno WHERE deo upita
--
-- Zadatak: Selektuj sve redove iz tabele `products` koji imaju kategoriju 'Mobilni Telefon' (WHERE =)
SELECT
    *
FROM
    products
WHERE
    category = 'Mobilni Telefon';





-- Zadatak: Selektuj sve redove iz tabele `products` koji nisu u kategoriji 'Frizider' (WHERE !=)
SELECT
    *
FROM
    products
WHERE
    category != 'Frizider';

-- Zadatak: Selektuj sve redove iz tabele `products` koji imaju kategoriju 'Mobilni Telefon' i brend 'Samsung' (WHERE AND)
SELECT
    *
FROM
    products
WHERE
    category = 'Mobilni Telefon' AND brand = 'Samsung';

-- Zadatak: Selektuj sve redove iz tabele `products` koji imaju kategoriju 'Mobilni Telefon' ili 'Televizor' (WHERE OR)
SELECT
    *
FROM
    products
WHERE
    category = 'Mobilni Telefon' OR category = 'Televizor';

-- Zadatak: Selektuj sve redove iz tabele `products` koji u kategorijama 'Mobilni Telefon', 'Televizor', 'Frizider' (WHERE IN)
SELECT
    *
FROM
    products
WHERE
    category IN ('Mobilni Telefon', 'Televizor', 'Frizider');

-- Zadatak: Selektuj sve redove iz tabele `products` koji nisu u kategorijama 'Mobilni Telefon', 'Televizor', 'Frizider' (WHERE NOT IN)
SELECT
    *
FROM
    products
WHERE
    category NOT IN ('Mobilni Telefon', 'Televizor', 'Frizider');

-- Zadatak: Selektuj sve redove iz tabele `products` koji su na stanju, tj quantity je veci od 0 (WHERE >)
SELECT
    *
FROM
    products
WHERE
    quantity > 0;





-- Zadatak: Selektuj sve redove iz tabele `products` koji imaju cenu izmedju 30000 i 40000 (WHERE BETWEEN AND)
SELECT
    *
FROM
    products
WHERE
    price BETWEEN 30000 AND 40000;

-- Zadatak: Selektuj sve redove iz tabele `products` koji su kreirani u 2017-oj godini (datum veci ili jednak od '2017-01-01' i manji ili jednak od '2017-12-31')
SELECT
    *
FROM
    products
WHERE
    created_at >= '2017-01-01'
    AND created_at <= '2017-12-31';




-- Zadatak: Selektuj sve redove iz tabele `products` ciji naslov pocinje sa 'Apple' (LIKE %-)
SELECT
    *
FROM
    products
WHERE
    title LIKE 'Apple%';



-- Zadatak: Selektuj sve redove iz tabele `products` ciji naslov se zavrsava sa 'XXH' (LIKE -%)
SELECT
    *
FROM
    products
WHERE
    title LIKE '%XXH';



-- Zadatak: Selektuj sve redove iz tabele `products` ciji naslov sadrzi 'iPhone' (LIKE %-%)
SELECT
    *
FROM
    products
WHERE
    title LIKE '%iPhone%';


-- Komplikovaniji upiti
-- Zadatak: Selektuj sve redove iz tabele `products` koji su na stanju i koji su na raspordaji (on_sale je indikator rasprodaje)
SELECT
    *
FROM
    products
WHERE
    quantity >0 
AND on_sale = 1;

-- Izraz kao kolona u rezultatu
-- Zadatak: Selektuj id, naziv, CENU SA POPUSTOM, iz tabele `products` koji su na stanju i koji su na raspordaji
SELECT
    id,
    title,
    price * (100 - discount)/100 AS `cena sa popustom`,
    discount  
FROM
    products
WHERE
    quantity >0 
AND on_sale = 1;



-- Sortiranje
-- Zadatak: Selektuj sve iz tabele `products` tako da redovi budu sortirani po nazivu (ODER BY)
SELECT
    *
FROM
    `products`
ORDER BY
   title;
    

-- Zadatak: Selektuj sve iz tabele `products` tako da redovi budu sortirani po ceni opadajuce (ODER BY DESC)
SELECT
    *
FROM
    `products`
ORDER BY
   price DESC;




-- Zadatak: Selektuj sve iz tabele `products` tako da redovi budu prvo sortirani po ceni opadajuce pa onda po nazivu rastuce (ORDER BY DESC ASC)
SELECT
    *
FROM
    `products`
ORDER BY
    brand ASC
   price DESC;




-- Limitiranje broja redova u rezultatu
-- Zadatak: Selektuj prvih 5 najskupljih mobilnih telefona (LIMIT)
SELECT
    *
FROM
    `products`
WHERE
    category = 'Mobilni Telefon'
ORDER BY
   price DESC
LIMIT 5;


--Zadatat:
SELECT
    *
FROM
    `products`
WHERE
    category = 'Televizor'
    AND quantity > 0
ORDER BY
   price DESC
LIMIT 3;


-- Zadatak: Selektuj drugih 5 najskupljih mobilnih telefona (LIMIT OFFSET
SELECT
    *
FROM
    `products`
WHERE
    category = 'Mobilni Telefon'
ORDER BY
   price DESC
LIMIT 5
OFFSET 5;


-- Agregatne funkcije
-- Zadatak: Selektuj ukupan broj proizvoda (COUNT)
SELECT
    COUNT(id)
FROM
    products;
-- Zadatak: Selektuj ukupan broj proizvoda koji su mobilni telefoni (COUNT WHERE)
SELECT
    COUNT(id) as ukupno_mobilnih_telefona
FROM
    products
WHERE
    category = 'Mobilni Telefon';
-- Zadatak: Selektuj koliko ima komada mobilnih telefona marke 'Samsung' (SUM)
SELECT
    SUM(quantity)
FROM
    products
WHERE
    category = 'Mobilni Telefon'
    AND brand = 'Samsung';
-- Zadatak: Selektuj sve kategorije koje se pojavljuju (DISTINCT)

SELECT
    DISTINCT category
FROM
    products;

-- Agregatne funkcije sa GROUP BY
-- Prethodni zadatak resen uz koriscenje GROUP BY
SELECT
    category
FROM
    products
GROUP BY
    category;
-- grupisanje po kategoriji i brednu, kombinacija kategorija i brendova koji se pojavljuju
SELECT
    category,
    brand
FROM
    products
GROUP BY
    category,
    brand;
--Selektuj broj proizvoda po kategorijama (COUNT GROUP BY)

SELECT
    category,
    COUNT(id)
FROM
    products
GROUP BY
    category;
-- Zadatak: Selektuj broj komada proizvoda po kategorijama (SUM GROUP BY)
SELECT
    category,
    SUM quantity
FROM
    products
GROUP BY
    category;

--Zadatak ispisati kategorije i broj proiyvoda u kategroji i broj komada u kategroji
SELECT
    category,
    COUNT(id),
    SUM(quantity)
FROM
    products
GROUP BY
     category;
-- Zadatak: Selektuj brendove koji imaju vise od 5 proizvoda (GROUP BY HAVING)
SELECT
    brand,
    COUNT(id) AS broj_proizvoda_u_brendu
FROM
    products
GROUP BY
    brand
HAVING
    COUNT(id) > 5;
-- Zadatak: Selektuj brendove koji imaju vise od 3 proizvoda sortiranih po broju 
--proizvoda opadajuce (GROUP BY HAVING, aggregate function u ORDER BY-u)
SELECT
    brand,
    COUNT(id) AS broj_proizvoda_u_brendu
FROM
    products
GROUP BY
    brand
HAVING
    COUNT(id) > 3
ORDER BY
    COUNT(id) DESC;




-- KONACAN SABLON ZA SELECT UPIT


SELECT
	--column
FROM
	--table_name
WHERE
	--conditions
GROUP BY
	--groupings
HAVING
	--agregate columns conditions
ORDER BY
	--order bu columns
LIMIT 
	--number of rows
OFFSET 
	--paging
