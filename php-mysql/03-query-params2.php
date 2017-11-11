<?php

$link = mysqli_connect('127.0.0.1', 'cubes', 'cubes', 'cubesphp');

if ($link === false) {
	die('MySQL Error: ' . mysqli_connect_error());
}

//
//$query = "SELECT * FROM categories WHERE title LIKE 't%'";
//
//$result = mysqli_query($link, $query);            
// 
//if ($result === false) {
//	die('MySQL Error: ' . mysqli_error($link));
//}
//
//$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
//
//
//print_r($categories);


$title = 'iPod Nano';

$query = "SELECT * FROM products WHERE title = '" . mysqli_real_escape_string($link, $title) . "'";

$result = mysqli_query($link, $query);            
 
if ($result === false) {
	die('MySQL Error: ' . mysqli_error($link));
}

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);


print_r($products);