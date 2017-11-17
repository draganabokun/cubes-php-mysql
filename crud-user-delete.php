<?php
session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
	header('Location: /login.php');
	die();
}

if (empty($_GET['id'])) {
	die('Morate proslediti id');
}

$id = (int) $_GET['id'];

$user = usersFetchOneById($id);

if (empty($user)) {
	die('Izabrali ste nepostojeceg korisnika');
}


if (isset($_POST["task"]) && $_POST["task"] == "delete") {
	
	usersDeleteOneById($user['id']);

	header('Location: /crud-user-list.php');
	die();
}

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-user-delete.php';
require_once __DIR__ . '/views/layout/footer.php';
