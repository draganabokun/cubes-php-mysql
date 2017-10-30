-- Obnavljanje
-- Zadatak: Selektuj sve kategorije bez ponavljanja (DISTINCT)
SELECT
    
DISTINCT category

FROM
    products;
    
-- Zadatak: Selektuj sve kategorije bez ponavljanja (GROUP BY)
SELECT
    category
FROM
    products
GROUP BY
    category;

-- Zadatak: Selektuj koja kategorija koliko proizvoda ima
SELECT
    category, 
    COUNT(id) as `broj_proizvoda_po_kategoriji`
FROM
    products
GROUP BY
    category;

-- Zadatak: Selektuj koja kategorija koliko proizvoda ima i sortiraj opadajuce po broju proizvoda
SELECT
    category, 
    COUNT(id) as `broj_proizvoda_po_kategoriji`
FROM
    products
GROUP BY
    category
ORDER BY
    COUNT(id) DESC;


-- Zadatak: Selektuj koja kategorija ima najvise proizvoda (LIMIT)
SELECT
    category, 
    COUNT(id) as `broj_proizvoda_po_kategoriji`
FROM
    products
GROUP BY
    category
ORDER BY
    COUNT(id) DESC
LIMIT 1;


-- Zadatak: Selektuj sve kategorije osim one koja ima najvise proizvoda
SELECT
    category, 
    COUNT(id) as `broj_proizvoda_po_kategoriji`
FROM
    products
GROUP BY
    category
ORDER BY
    COUNT(id) DESC
LIMIT 100000
OFFSET 1;

-- Zadatak: Selektuj samo drugu kategoriju koja ima najvise proizvoda
SELECT
    category, 
    COUNT(id) as `broj_proizvoda_po_kategoriji`
FROM
    products
GROUP BY
    category
ORDER BY
    COUNT(id) DESC
LIMIT 1
OFFSET 1;

-- Zadatak: Selektuj kategorije koji imaju vise od 5 proizvoda (GROUP BY HAVING)
SELECT
    category, 
    COUNT(id)
FROM
    products
GROUP BY
    category
HAVING
    COUNT(id) > 5;

-- Vise agregatnih funckxija

-- Zadatak: Selektuj kategorije i njihov broj proizvoda, njihovu prosecnu cenu proizvoda i ukupno komada

SELECT
    category, 
    COUNT(id),
    AVG(price), 
    SUM(quantity)
FROM
    products
GROUP BY
    category;

-- Zadatak: Selektuj 5 nasumicnih proizvoda
SELECT
    *
FROM
    products
ORDER BY
    RAND()
LIMIT 5;

-- Zadatak: Selektuj brendove i broj kategorija u brendu, broj proizvoda u brendu i prosecnu cenu proizvoda u brendu
SELECT
    brand,
    COUNT(DISTINCT category), 
    COUNT(id),
    AVG(price)
FROM
    products
GROUP BY
    brand;


-- Upit u upitu
-- Zadatak: Selektuj sve proizvode iz kategorija koje imaju vise od 5 proizvoda
SELECT
*
FROM
    products
WHERE 
    category IN (SELECT category FROM products GROUP BY category HAVING COUNT(id) > 5);
-- Zadatak: Selektuj sve proizvode iz brenda koji imaju vise od 5 proizvoda

SELECT
*
FROM
    products
WHERE 
    brand IN (SELECT brand FROM products GROUP BY brand HAVING COUNT(id) > 5);

--Zadatak: Selektuj proizvode iz kategorije sa najvise proizvoda

SELECT category FROM products GROUP BY category ORDER BY COUNT(id) DESC LIMIT 1;

--LIMIT ne moze da se koristi u podupitu, mora da se pronadje neko drugo resenje
