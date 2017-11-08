<?php

require_once __DIR__ . '/m_database.php';

/**
 * 
 * @return array Aarray of associative arrays that represent rows
 */
function groupsFetchAll() {
	$query = "SELECT `groups`.* FROM `groups`";
	
	
	return dbFetchAll($query);
}

/**
 * @param scalar $id
 * @return array Associative array that represent one row
 */
function groupsFetchOneById($id) {
	
	$query = "SELECT `groups`.* "
			. "FROM `groups` "
			. "WHERE `id` = '" . dbEscape($id) . "'";
	
	return dbFetchOne($query);
}

/**
 * @param int $id
 * @return int Affected rows
 */
function groupsDeleteOneById($id) {
	
	$query = "DELETE FROM `groups` "
			. "WHERE `id` = '" . dbEscape($id) . "'";
	
	return dbQuery($query);
}

/**
 * @param array $data Row to insert, associative array
 * @return type
 */
function groupsInsertOne(array $data) {
	
	$columnsPart = "(`" . implode('`, `', array_keys($data)) . "`)";
	
	$values = array();
	
	foreach ($data as $value) {
		$values[] = "'" . dbEscape($value) . "'";
	}
	
	$valuesPart = "(" . implode(', ', $values) . ")";
	
	$query = "INSERT INTO `groups` " . $columnsPart . " VALUES " . $valuesPart;

	
	dbQuery($query);
	
	return dbLastInsertId();
}

function groupsUpdateOneById($id, $data) {
	
	$setParts = array();
	
	foreach ($data as $column => $value) {
		$setParts[] = "`" . $column . "` = '" . dbEscape($value) . "'";
	}
	
	$setPart = implode(',', $setParts);
	
	$query = "UPDATE `groups` SET " . $setPart . " WHERE `id` = '" . dbEscape($id) . "'";

	return dbQuery($query);
}

/**
 * @return int Count of all rows in table
 */
function groupsGetCount() {
	$link = dbGetLink();
	
	$query = "SELECT COUNT(`id`) FROM `groups`";
	
	return dbFetchColumn($query);
}