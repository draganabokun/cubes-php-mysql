<?php

if (empty($_GET['id']))
{
    die('Morate proslediti id');
}

$id = (int) $_GET['id'];

$link = mysqli_connect('127.0.0.1', 'cubes', 'cubes', 'cubesphp');

if ($link === false) {
	die('MySQL Error: ' . mysqli_connect_error());
}

$query = "SELECT * FROM brands WHERE id = '" . mysqli_real_escape_string($link, $id) . "'";


$result = mysqli_query($link, $query);

if ($result === false) {
	die('MySQL Error: ' . mysqli_error($link));
}

$brand = mysqli_fetch_assoc($result);

if (empty($brand))
{
    die ('Trazeni brand ne postoji');
}

print_r($brand);
die;

require_once __DIR__ .'/views/layout/header.php';

require_once __DIR__ .'/views/templates/t_crud-brand-delete.php';

require_once __DIR__ .'/views/layout/footer.php';

