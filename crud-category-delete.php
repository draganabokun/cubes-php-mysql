<?php
session_start();

require_once __DIR__ . '/models/m_categories.php';

if (empty($_GET['id'])) {
	die('Morate proslediti id');
}

$id = (int) $_GET['id'];

$category = categoriesFetchOneById($id);

if (empty($category)) {
	die('Izabrali ste nepostojecu kategoriju');
}

if (isset($_POST["task"]) && $_POST["task"] == "delete") {
    SELECT COUNT(id) FROM brands WHERE category_id = $id;
    
        if (empty($result))
        {
	categoriesDeleteOneById($id);

	header('Location: /crud-category-list.php');
	die();
        }
        else {
            die('Kategorija nije prazna i ne moze se izbrisati');
        }
}

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-category-delete.php';
require_once __DIR__ . '/views/layout/footer.php';
