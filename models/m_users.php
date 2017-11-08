<?php

/**
 * 
 * @param string $username
 * @param string $password
 * @return boolean TRUE if username and password are ok, FALSE otherwise
 */
function checkCredentials($username, $password) {
	
	if ($username !== 'cubes') {
		return false;
	}
	
	if (md5($password) !== 'd5908e4aa76277878259ed57c19c5f78') {
		return false;
	}
	
	return true;
}

/**
 * @return boolean
 */
function isUserLoggedIn() {
	
	if (empty($_SESSION['user_is_logged_in'])) {
		return false;
	} 
	
	return true;
}