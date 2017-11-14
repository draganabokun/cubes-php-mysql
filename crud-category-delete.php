<?php
session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
	header('Location: /login.php');
	die();
}


require_once __DIR__ . '/models/m_categories.php';

if (empty($_GET['id'])) {
	die('Morate proslediti id');
}

$id = (int) $_GET['id'];

$category = categoriesFetchOneById($id);

if (empty($category)) {
	die('Izabrali ste nepostojecu kategoriju');
}


require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-category-delete.php';
require_once __DIR__ . '/views/layout/footer.php';