<?php
session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
    header('Location: /login.php');
    die();
}


require_once __DIR__ . '/models/m_news.php';

if (empty($_GET['id'])) {
    die('Morate proslediti id');
}

$id = (int) $_GET['id'];

$oneNews = newsFetchOneById($id);

if (empty($oneNews)) {
    die('Izabrali ste nepostojecu vest');
}


if (isset($_POST["task"]) && $_POST["task"] == "delete") {

    $photoFilePath = __DIR__ . "/uploads/news/" . $oneNews['photo_filename'];

    if (is_file($photoFilePath)) {
        unlink($photoFilePath);
    }

    newsDeleteOneById($oneNews['id']);

    $_SESSION['system_message'] = "Uspesno ste obrisali vest " . $oneNews['title'];


    header('Location: /crud-news-list.php');
    die();
}

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-news-delete.php';
require_once __DIR__ . '/views/layout/footer.php';
