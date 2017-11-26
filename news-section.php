<?php
session_start();

require_once __DIR__ . '/models/m_news.php';
require_once __DIR__ . '/models/m_sections.php';

if (!isset($_GET['id'])) {
	die('morate proslediti id kategorije/section');
}

$id = (int) $_GET['id'];

$section = sectionsFetchOneById($id);
if (empty($section)) {
	die('Izabrana kategorija/section ne postoji');
}

$page = 1;

if (isset($_GET['page'])) {
	$page = (int) $_GET['page'];
}

$rowsPerPage = 5;

$totalRows = newsGetCountBySection($section['id']);

$totalPages = ceil($totalRows / $rowsPerPage);


$news = newsFetchAllBySectionByPage($section['id'], $page, $rowsPerPage);

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_news-section.php';
require_once __DIR__ . '/views/layout/footer.php';