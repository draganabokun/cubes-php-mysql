-- Napisati upit koji ispisuje gradove ali sa redom sledecim informacijama: 
-- naziv drzave, naziv regije, naziv grada

SELECT
    cn.name AS country_name,
    s.name AS state_name,
    ct.name AS city_name
FROM
    cities AS ct
JOIN
    states AS s ON ct.state_id = s.id
JOIN
    countries AS cn ON s.country_id = cn.id;


-- Napisati upit koji ispisuje gradove koji imaju populaciju milion ili vise, 
-- sortiranim po populaciji opadajuce, sa sledecim informacijama: 
-- kratki kod zemlje, naziv zemlje, naziv grada, populacija

SELECT
    cn.sortname AS `short_code`,
    cn.name AS `country_name`,
    ct.name AS `city_name`,
    ct.population AS `city_population`
FROM
    cities AS ct
JOIN
    states AS s ON ct.state_id = s.id
JOIN
    countries AS cn ON s.country_id = cn.id
WHERE
    ct.population >= 1000000
ORDER BY
    ct.population DESC;



-- Napisati upit koji prikazuje gradove za koje nije uneta populacija 
-- (tj populacija je 0) sa kolonama: naziv drzave, naziv regije, naziv grada
SELECT
    cn.name AS `country_name`,
    s.name AS `state_name`,
    ct.name AS `city_name`
FROM
    cities AS ct
JOIN
    states AS s ON ct.state_id = s.id
JOIN
    countries AS cn ON s.country_id = cn.id
WHERE
    ct.population = 0;



-- Napisati upit koji prikazuje broj gradova za koje nije uneta populacija
SELECT
    COUNT(c.id) AS `number_of_cities_without_information_of_population`
FROM
    cities AS c
WHERE
    c.population = 0;


-- Napisati upit koji prikazuje regije zajedno sa brojem stanovnika u regiji, 
-- polja koja se prikazuju su: naziv drzave, naziv regije, broj stanovnika u regiji
SELECT
    cn.name AS `country_name`,
    s.name AS `state_name`,
    SUM(ct.population) AS `state_population`
FROM
    cities AS ct
JOIN
    states AS s ON ct.state_id = s.id
JOIN
    countries AS cn ON s.country_id = cn.id
GROUP BY
    s.id;


-- Napisati upit koji pronalazi 10 regija sa najvise stanovnika, 
-- polja koja se prikazuju su: naziv drzave, naziv regije, broj stanovnika u regiji
SELECT
    cn.name AS `country_name`,
    s.name AS `state_name`,
    SUM(ct.population) AS `state_population`
FROM
    cities AS ct
JOIN
    states AS s ON ct.state_id = s.id
JOIN
    countries AS cn ON s.country_id = cn.id
GROUP BY
    s.id
ORDER BY
    SUM(ct.population) DESC
LIMIT 10;

-- Napisati upit koji pronalazi regije sa brojem stanovnika vecim od milion, 
-- polja koja se prikazuju su: naziv drzave, naziv regije, broj stanovnika u regiji
SELECT
    cn.name AS `country_name`,
    s.name AS `state_name`,
    SUM(ct.population) AS `state_population`
FROM
    cities AS ct
JOIN
    states AS s ON ct.state_id = s.id
JOIN
    countries AS cn ON s.country_id = cn.id
GROUP BY
    s.id
HAVING
    SUM(ct.population) > 1000000;



-- Napisati upit koji pronalazi 5 regija sa najvise registrovanih gradova, 
-- polja koja se prikazuju su: naziv drzave, naziv regije, broj gradova u regiji
SELECT
    cn.name AS `country_name`,
    s.name AS `state_name`,
    COUNT(ct.id) AS `number_of_cities`
FROM
    cities AS ct
JOIN
    states AS s ON ct.state_id = s.id
JOIN
    countries AS cn ON s.country_id = cn.id
GROUP BY
    s.id
ORDER BY
    COUNT(ct.id) DESC
LIMIT 5;

-- Napisati upit koji pronalazi regije sa nijednim unetim gradom (broj gradova je 0), 
-- polja koja se prikazuju su: naziv drzave, naziv regije, broj gradova u regiji
SELECT
    cn.name AS `country_name`,
    s.name AS `state_name`,
    COUNT(ct.id) AS `number_of_cities`
FROM
    cities AS ct
JOIN
    states AS s ON ct.state_id = s.id
JOIN
    countries AS cn ON s.country_id = cn.id
GROUP BY
    s.id
HAVING
    COUNT(ct.id) = 0;

-- Napisati upit koji pronalazi 5 regija sa najvise registrovanih gradova ciji 
-- naziv pocinje sa slovom 'r', 
-- polja koja se prikazuju su: naziv drzave, naziv regije, broj gradova u regiji
SELECT
    cn.name AS `country_name`,
    s.name AS `state_name`,
    COUNT(ct.id) AS `number_of_cities`
FROM
    cities AS ct
JOIN
    states AS s ON ct.state_id = s.id
JOIN
    countries AS cn ON s.country_id = cn.id
WHERE
    ct.name LIKE 'r%'
GROUP BY
    s.id
ORDER BY
    COUNT(ct.id) DESC
LIMIT 5;

-- Napisati upit koji pronalazi 5 regija sa najvise milionskih gradova 
-- (broje se gradovi sa populacijom vecom od milion), 
-- polja koja se prikazuju su: naziv drzave, naziv regije, broj gradova u regiji
SELECT
    cn.name AS `country_name`,
    s.name AS `state_name`,
    COUNT(ct.id) AS `number_of_cities`
FROM
    cities AS ct
JOIN
    states AS s ON ct.state_id = s.id
JOIN
    countries AS cn ON s.country_id = cn.id
WHERE
    ct.population > 1000000
GROUP BY
    s.id
ORDER BY
    COUNT(ct.id) DESC
LIMIT 5;



-- Napisati upit koji pronalazi drzave koje imaju vise od 100 regija, 
-- polja koja se prikazuju su id drzave, kratki kod drzave, naziv drzave i broj regija
SELECT
    cn.id AS `country_id`,
    cn.sortname AS `short_code`,
    cn.name AS `county_name`,
    COUNT(s.id) AS `number_of_states`
FROM
    states AS s
JOIN
    countries AS cn ON s.country_id = cn.id
GROUP BY
    cn.id
HAVING
    COUNT(s.id) > 100;


-- Napisati upit koji pronalazi drzave koje imaju vise od 10 regija ciji naziv pocinje sa slovom 'a', 
-- polja koja se prikazuju su id drzave, kratki kod drzave, naziv drzave i broj regija
SELECT
    cn.id AS `country_id`,
    cn.sortname AS `short_code`,
    cn.name AS `country_name`,
    COUNT(s.id) AS `number_of_states`
FROM
    states AS s
JOIN
    countries AS cn ON s.country_id = cn.id
WHERE
    s.name LIKE 'a%'
GROUP BY
    cn.id
HAVING
    COUNT(s.id) > 10;

-- Napisati upit koji prikazuje drzave zajedno sa njihovim brojem stanovnika, 
-- sortiranih po broju stanovnika opadajuce, 
-- polja koja se prikazuju su id drzave, kratki kod drzave, naziv drzave i broj stanovnika
SELECT
    cn.id AS `country_id`,
    cn.sortname AS `short_code`,
    cn.name AS `county_name`,
    SUM(ct.population) AS `country_population`
FROM
    cities AS ct
JOIN
    states AS s ON ct.state_id = s.id
JOIN
    countries AS cn ON s.country_id = cn.id
GROUP BY
    cn.id
ORDER BY
    SUM(ct.population) DESC;


-- Napisati upit koji prolazi drzave koje imaju vise od milion stanovnika, 
-- polja koja se prikazuju su id drzave, kratki kod drzave, naziv drzave i broj stanovnika
SELECT
    cn.id AS `country_id`,
    cn.sortname AS `short_code`,
    cn.name AS `county_name`,
    SUM(ct.population) AS `country_population`
FROM
    cities AS ct
JOIN
    states AS s ON ct.state_id = s.id
JOIN
    countries AS cn ON s.country_id = cn.id
GROUP BY
    cn.id
HAVING
    SUM(ct.population) > 1000000;

-- Napisati upit koji prikazuje prvih 5 drzava sa najvise milionskih gradova
SELECT
    cn.name AS `county_name`,
    COUNT(ct.id) AS `number_of_cities`
FROM
    cities AS ct
JOIN
    states AS s ON ct.state_id = s.id
JOIN
    countries AS cn ON s.country_id = cn.id
WHERE
    ct.population > 1000000
GROUP BY
    cn.id
ORDER BY
    COUNT(ct.id) DESC 
LIMIT 5;

