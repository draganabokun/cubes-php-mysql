<?php
session_start();

require_once __DIR__ . '/models/m_groups.php';

if (empty($_GET['id'])) {
	die('Morate proslediti id');
}

$id = (int) $_GET['id'];


$group = groupsFetchOneById($id);

if (empty($group)) {
	die('Trazena grupa ne postoji');
}

if (isset($_POST["task"]) && $_POST["task"] == "delete") {
	
	groupsDeleteOneById($id);

	header('Location: /crud-group-list.php');
	die();
}

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-group-delete.php';
require_once __DIR__ . '/views/layout/footer.php';