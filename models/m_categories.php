<?php

require_once __DIR__ . '/m_database.php';

/**
 * 
 * @return array Aarray of associative arrays that represent rows
 */
function categoriesFetchAll() {
	$query = "SELECT `categories`.*, `groups`.`title` AS group_title "
			. "FROM `categories` "
			. "LEFT JOIN `groups` ON `categories`.`group_id` = `groups`.`id`";
	
	
	return dbFetchAll($query);
}

/**
 * @param scalar $id
 * @return array Associative array that represent one row
 */
function categoriesFetchOneById($id) {
	
	$query = "SELECT `categories`.* "
			. "FROM `categories` "
			. "WHERE `id` = '" . dbEscape($id) . "'";
	
	return dbFetchOne($query);
}

/**
 * @param int $id
 * @return int Affected rows
 */
function categoriesDeleteOneById($id) {
	
	$query = "DELETE FROM `categories` "
			. "WHERE `id` = '" . dbEscape($id) . "'";
	
	return dbQuery($query);
}

/**
 * @param array $data Row to insert, associative array
 * @return type
 */
function categoriesInsertOne(array $data) {
	
	$columnsPart = "(`" . implode('`, `', array_keys($data)) . "`)";
	
	$values = array();
	
	foreach ($data as $value) {
		$values[] = "'" . dbEscape($value) . "'";
	}
	
	$valuesPart = "(" . implode(', ', $values) . ")";
	
	$query = "INSERT INTO `categories` " . $columnsPart . " VALUES " . $valuesPart;

	
	dbQuery($query);
	
	return dbLastInsertId();
}

function categoriesUpdateOneById($id, $data) {
	
	$setParts = array();
	
	foreach ($data as $column => $value) {
		$setParts[] = "`" . $column . "` = '" . dbEscape($value) . "'";
	}
	
	$setPart = implode(',', $setParts);
	
	$query = "UPDATE `categories` SET " . $setPart . " WHERE `id` = '" . dbEscape($id) . "'";

	return dbQuery($query);
}

/**
 * @return int Count of all rows in table
 */
function categoriesGetCount() {
	$link = dbGetLink();
	
	$query = "SELECT COUNT(`id`) FROM `categories`";
	
	return dbFetchColumn($query);
}


function categoriesGetListByGroup() {
	
	$query = "SELECT `categories`.*, `groups`.`title` AS group_title "
			. "FROM `categories` "
			. "LEFT JOIN `groups` ON `categories`.`group_id` = `groups`.`id` "
			. "ORDER BY `groups`.`title`, `categories`.`title`";
	
	$categories = dbFetchAll($query);
	
	$categoryList = [];
	
	foreach ($categories as $category) {
		
		$categoryList[$category['id']] = $category['group_title'] . ' / ' . $category['title'];
	}
	
	
	return $categoryList;
}