<?php
session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
	header('Location: /login.php');
	die();
}

require_once __DIR__ . '/models/m_products.php';

if (isset($_SESSION['system_message']))
{
    $systemMessage = $_SESSION['system_message'];
    
    unset($_SESSION['system_message']);
}

$products = productsFetchAll();

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-product-list.php';
require_once __DIR__ . '/views/layout/footer.php';
