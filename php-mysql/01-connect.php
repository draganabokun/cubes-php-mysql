<?php

// mysqli - funkcije koje pocinju sa mysqli_
// PDO - OO Biblioteka

$link = mysqli_connect('127.0.0.1', 'cubes', 'cubes', 'cubesphp');

if ($link === false) {
	die('MySQL Error: ' . mysqli_connect_error());
}
