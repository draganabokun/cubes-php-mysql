<?php

require_once __DIR__ . '/m_database.php';

/**
 * 
 * @return array Array of associative arrays that represent rows
 */
function newsFetchAll() {
        $query = "SELECT "
                . "`news`.*, "
                . "`sections`.`title` AS section_title "
                . "FROM `news` "
                . "LEFT JOIN `sections` ON `news`.`section_id` = `sections`.`id`";
	
	return dbFetchAll($query);
}

/**
 * @param scalar $id
 * @return array Associative array that represent one row
 */
function newsFetchOneById($id) {
	
	$query = "SELECT `news`.*, "
                . "`sections`.`title` AS section_title "
		. "FROM `news` "
                . "LEFT JOIN `sections` ON `news`.`section_id` = `sections`.`id` "
                . "WHERE `news`.`id` = '" . dbEscape($id) . "'";
	
	return dbFetchOne($query);
}

/**
 * @param int $id
 * @return int Affected rows
 */
function newsDeleteOneById($id) {
	
	$query = "DELETE FROM `news` "
			. "WHERE `id` = '" . dbEscape($id) . "'";
	
	return dbQuery($query);
}

/**
 * @param array $data Row to insert, associative array
 * @return type
 */
function newsInsertOne(array $data) {
    
        $data['created_at'] = date('Y-m-d H:i:s');
	
	$columnsPart = "(`" . implode('`, `', array_keys($data)) . "`)";
	
	$values = array();
	
	foreach ($data as $value) {
		$values[] = "'" . dbEscape($value) . "'";
	}
	
	$valuesPart = "(" . implode(', ', $values) . ")";
	
	$query = "INSERT INTO `news` " . $columnsPart . " VALUES " . $valuesPart;

	
	dbQuery($query);
	
	return dbLastInsertId();
}
        

function newsUpdateOneById($id, $data) {
	
	$setParts = array();
	
	foreach ($data as $column => $value) {
		$setParts[] = "`" . $column . "` = '" . dbEscape($value) . "'";
	}
	
	$setPart = implode(',', $setParts);
	
	$query = "UPDATE `news` SET " . $setPart . " WHERE `id` = '" . dbEscape($id) . "'";

	return dbQuery($query);
}

/**
 * @return int Count of all rows in table
 */
function newsGetCountBySection($sectionId) {
	$link = dbGetLink();
	
	$query = "SELECT COUNT(`id`) FROM `news` WHERE `section_id`= '" . $sectionId . "'";
	
	return dbFetchColumn($query);
}

/**
 * @return int Count of all rows in table
 */
function newsGetCount() {
	$link = dbGetLink();
	
	$query = "SELECT COUNT(`id`) FROM `news`";
	
	return dbFetchColumn($query);
}


function newsUpdatePhotoFileName($id, $photoFileName) {
	$query = "UPDATE news "
			. "SET photo_filename = '". dbEscape($photoFileName) ."' "
			. "WHERE id = '" . dbEscape($id) . "'";
	
	return dbQuery($query);
}

function newsFetchAllByPage($page, $rowsPerPage) {
    	$query = "SELECT `news`.*, "
			. "`sections`.`title` AS section_title "
			. "FROM `news` "
			. "LEFT JOIN `sections` ON `news`.`section_id` = `sections`.`id` ";
        
        $limit = $rowsPerPage;
        $offset = ($page - 1) * $rowsPerPage;
        
        $query .= " LIMIT " . $limit . " OFFSET " . $offset;
        
        return dbFetchAll($query);
}

function newsFetchAllBySectionByPage ($sectionId, $page, $rowsPerPage)
{
                  $query = "SELECT "
			. "`news`.*, "
			. "`sections`.`title` AS section_title "
			. "FROM `news` "
			. "LEFT JOIN `sections` ON `news`.`section_id` = `sections`.`id` "
                        . "WHERE `news`.`section_id` = '" . dbEscape($sectionId) . "' ";  
                          
        $limit = $rowsPerPage;
        $offset = ($page - 1) * $rowsPerPage;
        
        $query .= " LIMIT " . $limit . " OFFSET " . $offset;
        
        return dbFetchAll($query);
    
}