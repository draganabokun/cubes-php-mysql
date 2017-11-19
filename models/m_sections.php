<?php

require_once __DIR__ . '/m_database.php';

/**
 * 
 * @return array Aarray of associative arrays that represent rows
 */
function sectionsFetchAll() {
	$query = "SELECT `sections`.* FROM `sections`";
	
	
	return dbFetchAll($query);
}

/**
 * @param scalar $id
 * @return array Associative array that represent one row
 */
function sectionsFetchOneById($id) {
	
	$query = "SELECT `sections`.* "
			. "FROM `sections` "
			. "WHERE `id` = '" . dbEscape($id) . "'";
	
	return dbFetchOne($query);
}

/**
 * @param int $id
 * @return int Affected rows
 */
function sectionsDeleteOneById($id) {
	
	$query = "DELETE FROM `sections` "
			. "WHERE `id` = '" . dbEscape($id) . "'";
	
	return dbQuery($query);
}

/**
 * @param array $data Row to insert, associative array
 * @return type
 */
function sectionsInsertOne(array $data) {
	
	$columnsPart = "(`" . implode('`, `', array_keys($data)) . "`)";
	
	$values = array();
	
	foreach ($data as $value) {
		$values[] = "'" . dbEscape($value) . "'";
	}
	
	$valuesPart = "(" . implode(', ', $values) . ")";
	
	$query = "INSERT INTO `sections` " . $columnsPart . " VALUES " . $valuesPart;

	
	dbQuery($query);
	
	return dbLastInsertId();
}

function sectionsUpdateOneById($id, $data) {
	
	$setParts = array();
	
	foreach ($data as $column => $value) {
		$setParts[] = "`" . $column . "` = '" . dbEscape($value) . "'";
	}
	
	$setPart = implode(',', $setParts);
	
	$query = "UPDATE `sections` SET " . $setPart . " WHERE `id` = '" . dbEscape($id) . "'";

	return dbQuery($query);
}

/**
 * @return int Count of all rows in table
 */
function sectionsGetCount() {
	$link = dbGetLink();
	
	$query = "SELECT COUNT(`id`) FROM `sections`";
	
	return dbFetchColumn($query);
}

function sectionsGetList() {
	
	$query = "SELECT `sections`.* FROM `sections` ORDER BY `sections`.`title`";
	
	$sections = dbFetchAll($query);

	$sectionList = [];
	
	foreach ($sections as $section) {
		
//		$key = $section['id'];
//		$value = $section['title'];
//		
//		$sectionList[$key] = $value;
		
		
		$sectionList[$section['id']] = $section['title'];
	}
	
	return $sectionList;
}



