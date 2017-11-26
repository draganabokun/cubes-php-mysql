<?php
session_start();

require_once __DIR__ . '/models/m_products.php';
require_once __DIR__ . '/models/m_categories.php';
require_once __DIR__ . '/models/m_brands.php';


if (!isset($_GET['id'])) {
	die('morate proslediti id brenda');
}

$id = (int) $_GET['id'];

$brand = brandsFetchOneById($id);
if (empty($brand)) {
	die('Izabrani brend ne postoji');
}

$page = 1;

if (isset($_GET['page'])) {
	$page = (int) $_GET['page'];
}

$rowsPerPage = 2;

$totalRows = productsGetCountByBrand($brand['id']);

$totalPages = ceil($totalRows / $rowsPerPage);


$products = productsFetchAllByBrandByPage($brand['id'], $page, $rowsPerPage);

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_brand.php';
require_once __DIR__ . '/views/layout/footer.php';