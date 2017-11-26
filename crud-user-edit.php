<?php
session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
	header('Location: /login.php');
	die();
}

if (empty($_GET['id'])) {
	die('Morate proslediti id');
}

$id = (int) $_GET['id'];

$user = usersFetchOneById($id);

if (empty($user)) {
	die('Trazeni proizvod ne postoji');
}

//ovde se prihvataju vrednosti polja, popisati sve kljuceve i pocetne vrednosti
$formData = array(
	'username' => $user['username'],
	'email' => $user['email'],
	'first_name' => $user['first_name'],
	'last_name' => $user['last_name'],
);

//ovde se smestaju greske koje imaju polja u formi
$formErrors = array();


//uvek se prosledjuje jedno polje koje je indikator da su podaci poslati sa forme
//odnosno da je korisnik pokrenuo neku akciju
if (isset($_POST["task"]) && $_POST["task"] == "save") {
	
	if (isset($_POST["username"]) && $_POST["username"] !== '') {
		//Dodavanje parametara medju podatke u formi
		$formData["username"] = $_POST["username"];
		
		//Filtering 1
		$formData["username"] = trim($formData["username"]);
		
		if (strlen($formData["username"]) < 5) {
			$formErrors["username"][] = "Username mora imati 5 ili vise karaktera";
		}
		
		$testUser = usersFetchOneByUsername($formData["username"]);
		
		if (!empty($testUser) && $testUser['id'] != $user['id']) {
			$formErrors["username"][] = "Username je zauzet";
		}
		
		
	} else {//Ovaj else ide samo ako je polje obavezno
		$formErrors["username"][] = "Polje username je obavezno";
	}
	
	
	/*********** filtriranje i validacija polja ****************/
	if (isset($_POST["email"]) && $_POST["email"] !== '') {
		//Dodavanje parametara medju podatke u formi
		$formData["email"] = $_POST["email"];
		
		//Filtering 1
		$formData["email"] = trim($formData["email"]);
		
		
	}
	
	if (isset($_POST["first_name"]) && $_POST["first_name"] !== '') {
		//Dodavanje parametara medju podatke u formi
		$formData["first_name"] = $_POST["first_name"];
		
		//Filtering 1
		$formData["first_name"] = trim($formData["first_name"]);
	}
	
	if (isset($_POST["last_name"]) && $_POST["last_name"] !== '') {
		//Dodavanje parametara medju podatke u formi
		$formData["last_name"] = $_POST["last_name"];
		
		//Filtering 1
		$formData["last_name"] = trim($formData["last_name"]);
	}
	
	//Ukoliko nema gresaka 
	if (empty($formErrors)) {
		//Uradi akciju koju je korisnik trazio
		
		usersUpdateOneById($user['id'], $formData);
		
		
        $_SESSION['system_message'] = "Uspesno ste izmenili profil korisnika " . $user['username'];
		
		header('Location: /crud-user-list.php');
		
		die();
	}
}

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-user-edit.php';
require_once __DIR__ . '/views/layout/footer.php';