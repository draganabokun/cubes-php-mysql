<?php
session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
	header('Location: /login.php');
	die();
}

require_once __DIR__ . '/models/m_groups.php';

if (empty($_GET['id'])) {
    die('Morate proslediti id');
}

$id = (int) $_GET['id'];


$group = groupsFetchOneById($id);

if (empty($group)) {
    die('Trazena grupa ne postoji');
}

require_once __DIR__ . '/models/m_products.php';


if (isset($_POST["task"]) && $_POST["task"] == "delete") {

        if (productsGetCountByGroup($group['id']) == 0) {
        
        groupsDeleteOneById($group['id']);
        
        $_SESSION['system_message'] = "Uspesno ste obrisali grupu " . $group['title'];

	header('Location: /crud-group-list.php');
	die();
        
    } else {
        die ('Ne mozete obrisati grupu za koje postoje proizvodi');
    }
}

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-group-delete.php';
require_once __DIR__ . '/views/layout/footer.php';
