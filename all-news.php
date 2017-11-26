<?php
session_start();

require_once __DIR__ . '/models/m_news.php';

$page = 1;

if (isset($_GET['page'])) {
	$page = (int) $_GET['page'];
}

$rowsPerPage = 5;

$totalRows = newsGetCount();

$totalPages = ceil($totalRows / $rowsPerPage);

$news = newsFetchAllByPage($page, $rowsPerPage);


require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_all-news.php';
require_once __DIR__ . '/views/layout/footer.php';
