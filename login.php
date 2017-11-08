<?php
session_start();

require_once __DIR__ . '/models/m_users.php';

//ovde se prihvataju vrednosti polja, popisati sve kljuceve i pocetne vrednosti
$formData = array(
	'username' => '',
	'password' => ''
);

//ovde se smestaju greske koje imaju polja u formi
$formErrors = array();


//uvek se prosledjuje jedno polje koje je indikator da su podaci poslati sa forme
//odnosno da je korisnik pokrenuo neku akciju
if (isset($_POST["task"]) && $_POST["task"] == "login") {
	
	/*********** filtriranje i validacija polja ****************/
	if (isset($_POST["username"]) && $_POST["username"] !== '') {
		//Dodavanje parametara medju podatke u formi
		$formData["username"] = $_POST["username"];

		$formData["username"] = trim($formData["username"]);
		
	} else {//Ovaj else ide samo ako je polje obavezno
		$formErrors["username"][] = "Polje username je obavezno";
	}
	
	if (isset($_POST["password"]) && $_POST["password"] !== '') {
		//Dodavanje parametara medju podatke u formi
		$formData["password"] = $_POST["password"];
		
		
	} else {//Ovaj else ide samo ako je polje obavezno
		$formErrors["password"][] = "Polje password je obavezno";
	}
	
	
	/*********** filtriranje i validacija polja ****************/
	
	
	//Ukoliko nema gresaka 
	if (empty($formErrors)) {
		//Uradi akciju koju je korisnik trazio
		
		if (checkCredentials($formData['username'], $formData['password'])) {
			
			//uspesno je ulogovan
			
			$_SESSION['user_is_logged_in'] = true;
			
			header('Location: /index.php');
			die;
			
		} else {
			
			$formErrors['username'][] = 'Los username ili password';
			
		}
	}
}

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_login.php';
require_once __DIR__ . '/views/layout/footer.php';