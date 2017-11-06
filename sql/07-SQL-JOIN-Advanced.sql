-- Kreirati tabelu groups sa poljima id i title i preneti njen primarni kljuc u tabelu categories pod nazivom group_id 

-- Napisati upit koji ispisuje proizvode zajedno sa kategorijom i grupom
SELECT
	p.id,
	g.title AS group_title,
	c.title AS category_title,
	p.title
FROM
	products AS p
JOIN
	categories AS c ON p.category_id = c.id
JOIN
	groups AS g ON c.group_id = g.id;


-- Napisati upit koji ispisuje broj proizvoda u kategoriji
SELECT
	c.title AS naziv_kategorije,
	COUNT(p.id) AS proizvoda_u_kategoriji
FROM
	products AS p
JOIN
	categories AS c ON c.id = p.category_id
GROUP BY
	c.id;

-- Napisati upit koji ispisuje broj proizvoda u grupi
SELECT
	g.title AS naziv_grupe,
	COUNT(p.id) AS broj_proizvoda_u_grupi
FROM
	products AS p
JOIN
	categories AS c ON p.category_id = c.id
JOIN
	groups AS g ON g.id = c.group_id
GROUP BY
	g.id;


-- Napisati upit koji ispisuje broj proizvoda u grupi za proizvode ciji sa brand_id -jem 1
SELECT
	g.title AS naziv_grupe,
	COUNT(p.id) AS broj_proizvoda_u_grupi
FROM
	products AS p
JOIN
	categories AS c ON p.category_id = c.id
JOIN
	groups AS g ON g.id = c.group_id
WHERE
	p.brand_id = 1
GROUP BY
	g.id

-- Napisati upit koji ispisuje broj proizvoda u grupi za proizvode ciji se brend zove 'Samsung'
SELECT
	g.title AS naziv_grupe,
	COUNT(p.id) AS broj_proizvoda_u_grupi
FROM
	products AS p
JOIN
	categories AS c ON p.category_id = c.id
JOIN
	groups AS g ON g.id = c.group_id
JOIN
	brands AS b ON p.brand_id = b.id
WHERE
	b.title = 'Samsung'
GROUP BY
	g.id

-- Napisati upit koji ispisuje broj proizvoda u grupi za proizvode ciji naslov pocinje sa 'a'
SELECT
	g.title AS naziv_grupe,
	COUNT(p.id) AS broj_proizvoda_u_grupi
FROM
	products AS p
JOIN
	categories AS c ON p.category_id = c.id
JOIN
	groups AS g ON g.id = c.group_id
WHERE
	p.title LIKE 'a%'
GROUP BY
	g.id


-- Kreirati tabelu tags sa poljima id i title

-- Napisati upit koji ispisuje sve proivode koji su tagovani tagom sa id-jem recimo 3 (ili neki drugi tag)
SELECT 
	p.* 
FROM
	products AS p
JOIN
	product_tags AS pt ON p.id = pt.product_id
WHERE
	pt.tag_id = 3;


-- Napisati upit koji ispisuje sve tag-ove proizvoda sa id-jem 16 (ili neki drugi id)
SELECT
	t.*
FROM
	tags AS t
JOIN
	product_tags AS pt ON t.id = pt.tag_id
WHERE
	pt.product_id = 22;