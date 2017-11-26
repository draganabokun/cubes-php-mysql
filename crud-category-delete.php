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

require_once __DIR__ . '/models/m_products.php';

if (isset($_POST["task"]) && $_POST["task"] == "delete") {
	
        if (productsGetCountByCategory($category['id']) == 0) {
        
        categoriesDeleteOneById($category['id']);
        
        $_SESSION['system_message'] = "Uspesno ste obrisali kategoriju " . $category['title'];

	header('Location: /crud-category-list.php');
	die();
        
    } else {
        die ('Ne mozete obrisati kategoriju za koje postoje proizvodi');
    }
}


require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-category-delete.php';
require_once __DIR__ . '/views/layout/footer.php';