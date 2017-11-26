<?php

session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
    header('Location: /login.php');
    die();
}

require_once __DIR__ . '/models/m_brands.php';

if (empty($_GET['id'])) {
    die('Morate proslediti id');
}

$id = (int) $_GET['id'];


$brand = brandsFetchOneById($id);

if (empty($brand)) {
    die('Trazeni brand ne postoji');
}

require_once __DIR__ . '/models/m_products.php';

if (isset($_POST["task"]) && $_POST["task"] == "delete") {
    
        if (productsGetCountByBrand($brand['id']) == 0) {
        
        brandsDeleteOneById($brand['id']);
        
        $_SESSION['system_message'] = "Uspesno ste obrisali brend " . $brand['title'];

	header('Location: /crud-brand-list.php');
	die();
        
    } else {
        die ('Ne mozete obrisati brend za koje postoje proizvodi');
    }

}

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-brand-delete.php';
require_once __DIR__ . '/views/layout/footer.php';
