<?php

require_once __DIR__ . '/m_database.php';

/**
 * 
 * @return array Aarray of associative arrays that represent rows
 */
function productsFetchAll() {
	$query = "SELECT "
			. "`products`.*, "
			. "`categories`.`title` AS category_title, "
			. "`brands`.`title` AS brand_title "
			. "FROM `products` "
			. "LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` "
			. "LEFT JOIN `brands` ON `products`.`brand_id` = `brands`.`id`";                 
	
	
	return dbFetchAll($query);
}

/**
 * @param scalar $id
 * @return array Associative array that represent one row
 */
function productsFetchOneById($id) {
	$query = "SELECT "
			. "`products`.*, "
			. "`categories`.`title` AS category_title, "
			. "`brands`.`title` AS brand_title "
			. "FROM `products` "
			. "LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` "
			. "LEFT JOIN `brands` ON `products`.`brand_id` = `brands`.`id` "
			. "WHERE `products`.`id` = '" . dbEscape($id) . "'";                 
	
	return dbFetchOne($query);
}

/**
 * @param int $id
 * @return int Affected rows
 */
function productsDeleteOneById($id) {
	
	$query = "DELETE FROM `products` "
			. "WHERE `id` = '" . dbEscape($id) . "'";
	
	return dbQuery($query);
}

/**
 * @param array $data Row to insert, associative array
 * @return type
 */
function productsInsertOne(array $data) {
	
	$columnsPart = "(`" . implode('`, `', array_keys($data)) . "`)";
	
	$values = array();
	
	foreach ($data as $value) {
		$values[] = "'" . dbEscape($value) . "'";
	}
	
	$valuesPart = "(" . implode(', ', $values) . ")";
	
	$query = "INSERT INTO `products` " . $columnsPart . " VALUES " . $valuesPart;

	
	dbQuery($query);
	
	return dbLastInsertId();
}

function productsUpdateOneById($id, $data) {
	
	$setParts = array();
	
	foreach ($data as $column => $value) {
		$setParts[] = "`" . $column . "` = '" . dbEscape($value) . "'";
	}
	
	$setPart = implode(',', $setParts);
	
	$query = "UPDATE `products` SET " . $setPart . " WHERE `id` = '" . dbEscape($id) . "'";

	return dbQuery($query);
}

/**
 * @return int Count of all rows in table
 */
function productsGetCount() {
	$link = dbGetLink();
	
	$query = "SELECT COUNT(`id`) FROM `products`";
	
	return dbFetchColumn($query);
}

function productsUpdatePhotoFileName($id, $photoFileName) {
	$query = "UPDATE products "
			. "SET photo_filename = '". dbEscape($photoFileName) ."' "
			. "WHERE id = '" . dbEscape($id) . "'";
	
	return dbQuery($query);
}