<?php

require_once __DIR__ . '/m_database.php';

/**
 * 
 * @return array Aarray of associative arrays that represent rows
 */
function usersFetchAll() {
	$query = "SELECT `users`.* FROM `users`";
	
	
	return dbFetchAll($query);
}

/**
 * @param scalar $id
 * @return array Associative array that represent one row
 */
function usersFetchOneById($id) {
	
	$query = "SELECT `users`.* "
			. "FROM `users` "
			. "WHERE `id` = '" . dbEscape($id) . "'";
	
	return dbFetchOne($query);
}

function usersFetchOneByUsername($username) {
	
	$query = "SELECT `users`.* "
			. "FROM `users` "
			. "WHERE `username` = '" . dbEscape($username) . "'";
	
	return dbFetchOne($query);
}
/**
 * @param int $id
 * @return int Affected rows
 */
function usersDeleteOneById($id) {
	
	$query = "DELETE FROM `users` "
			. "WHERE `id` = '" . dbEscape($id) . "'";
	
	return dbQuery($query);
}

/**
 * @param array $data Row to insert, associative array
 * @return type
 */
function usersInsertOne(array $data) {
    
        $data['created_at'] = date('Y-m-d H:i:s');
        
        $data['password'] = md5($data['password']);
	
	$columnsPart = "(`" . implode('`, `', array_keys($data)) . "`)";
	
	$values = array();
	
	foreach ($data as $value) {
		$values[] = "'" . dbEscape($value) . "'";
	}
	
	$valuesPart = "(" . implode(', ', $values) . ")";
	
	$query = "INSERT INTO `users` " . $columnsPart . " VALUES " . $valuesPart;

	
	dbQuery($query);
	
	return dbLastInsertId();
}

function usersUpdateOneById($id, $data) {
	
	$setParts = array();
	
	foreach ($data as $column => $value) {
		$setParts[] = "`" . $column . "` = '" . dbEscape($value) . "'";
	}
	
	$setPart = implode(',', $setParts);
	
	$query = "UPDATE `users` SET " . $setPart . " WHERE `id` = '" . dbEscape($id) . "'";

	return dbQuery($query);
}

/**
 * @return int Count of all rows in table
 */
function usersGetCount() {
	$link = dbGetLink();
	
	$query = "SELECT COUNT(`id`) FROM `users`";
	
	return dbFetchColumn($query);
}





/**
 * 
 * @param string $username
 * @param string $password
 * @return array User row if username and password are ok, FALSE otherwise
 */
function checkCredentials($username, $password) {
    
    $user = usersFetchOneByUsername($username);
    
    if (!empty($user))
    {
        if (md5($password) == $user['password'])
        {
            return $user;
        }
    }
    
    return false;

}

/**
 * @return boolean
 */
function isUserLoggedIn() {
	
	if (empty($_SESSION['logged_in_user'])) {
		return false;
	} 
	
	return true;
}