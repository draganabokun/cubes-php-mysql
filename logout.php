<?php
session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
	header('Location: /login.php');
	die();
}

//$_SESSION['user_is_logged_in'] = false;
session_destroy(); //unistavanje cele esije

header('Location: /index.php');
die;