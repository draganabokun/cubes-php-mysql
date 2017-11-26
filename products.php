<?php
session_start();

require_once __DIR__ . '/models/m_products.php';
require_once __DIR__ . '/models/m_brands.php';


$page = 1;

if (isset($_GET['page'])) {
	$page = (int) $_GET['page'];
}

$rowsPerPage = 12;

$totalRows = productsGetCount();

$totalPages = ceil($totalRows / $rowsPerPage);


$products = productsFetchAllByPage($page, $rowsPerPage);


require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_products.php';
require_once __DIR__ . '/views/layout/footer.php';