<?php
session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
	header('Location: /login.php');
	die();
}

require_once __DIR__ . '/models/m_tags.php';

if (empty($_GET['id'])) {
	die('Morate proslediti id');
}

$id = (int) $_GET['id'];


$tag = tagsFetchOneById($id);

if (empty($tag)) {
	die('Trazeni tag ne postoji');
}

require_once __DIR__ . '/models/m_products.php';

 
if (isset($_POST["task"]) && $_POST["task"] == "delete") {
	
        if (productsGetCountByTag($tag['id']) == 0) {
        
        tagsDeleteOneById($tag['id']);
        
        $_SESSION['system_message'] = "Uspesno ste obrisali tag " . $tag['title'];

	header('Location: /crud-tag-list.php');
	die();
        
    } else {
        die ('Ne mozete obrisati tag za koje postoje proizvodi');
    }
}

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-tag-delete.php';
require_once __DIR__ . '/views/layout/footer.php';