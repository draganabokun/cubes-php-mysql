<?php
session_start();

require_once __DIR__ . '/models/m_products.php';

$page = 1;

if (isset($_GET['page'])) {
	$page = (int) $_GET['page'];
}

$rowsPerPage = 2;

$totalRows = productsOnSaleGetCount();

$totalPages = ceil($totalRows / $rowsPerPage);


$products = productsFetchAllBySaleByPage($page, $rowsPerPage);

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_sale.php';
require_once __DIR__ . '/views/layout/footer.php';