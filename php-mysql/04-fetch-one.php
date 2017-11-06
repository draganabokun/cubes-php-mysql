<?php


$link = mysqli_connect('127.0.0.1', 'cubes', 'cubes', 'cubesphp');

if ($link === false) {
	die('MySQL Error: ' . mysqli_connect_error());
}

$id = 21;

$query = "SELECT * FROM products WHERE id = '" . mysqli_real_escape_string($link, $id) . "'";

$result = mysqli_query($link, $query);

if ($result === false)
{
    die ('MySQL error: ' . mysqli_error($link));
}

//$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
//
//$product = $products[0];
//
//print_r($product);

$product = mysqli_fetch_assoc($result);

print_r($product);