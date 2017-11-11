<?php

/**
 * @return resource
 */
function dbGetLink() {
	
	static $link;
	
	if (!isset($link)) {
		
		$link = mysqli_connect('127.0.0.1', 'cubes', 'cubes', 'cubesphp');
		
		if (!$link) {
			die('MySQL Connect Error: ' . mysqli_connect_error());
		}
	}
	
	return $link;
}

/**
 * @param string $value
 * @return string
 */
function dbEscape($value) {
	$link = dbGetLink();
	
	return mysqli_real_escape_string($link, $value);
}

/**
 * 
 * @param string $query
 * @return int|resource If query returns result set than resource is returned, otherwise int is returned
 */
function dbQuery($query) {
	$link = dbGetLink();
	
	$result = mysqli_query($link, $query);
	
	if ($result === false) {
		die('MySQL Error: ' . mysqli_error($link));
	}
	
	return $result;
}

/**
 * @param string $query
 * @return array Array of associative arrays
 */
function dbFetchAll($query) {
	
	$result = dbQuery($query);
	
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

/**
 * @param string $query
 * @return array|NULL An associative array that represents one row, NULL if no rows where found
 */
function dbFetchOne($query) {
	$result = dbQuery($query);
	
	return mysqli_fetch_assoc($result);
}

/**
 * @return int Last inserted auto-increment ID
 */
function dbLastInsertId() {
	
	$link = dbGetLink();
	
	return mysqli_insert_id($link);
}

/**
 * 
 * @param string $query
 * @return mixed Return first column of first row in row set. Useful for COUNT functions
 */
function dbFetchColumn($query) {
	
	$result = dbQuery($query);
	
	return mysqli_fetch_field($result);
}