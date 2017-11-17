<?php
session_start();

require_once __DIR__ . '/models/m_products.php';
require_once __DIR__ . '/models/m_tags.php';


if (!isset($_GET['id'])) {
	die('morate proslediti id proizvoda');
}

$id = (int) $_GET['id'];

$product = productsFetchOneById($id);

if (empty($product)) {
    die('Trazeni proizvod ne postoji');
}

$productTags = tagsFetchAllByProduct($product['id']);


require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_product.php';
require_once __DIR__ . '/views/layout/footer.php';