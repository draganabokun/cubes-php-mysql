<?php
session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
	header('Location: /login.php');
	die();
}


$user = usersFetchOneById($_SESSION['logged_in_user']['id']);



//ovde se prihvataju vrednosti polja, popisati sve kljuceve i pocetne vrednosti
$formData = array(
	'password' => '',
	'confirm_password' => ''
);

//ovde se smestaju greske koje imaju polja u formi
$formErrors = array();


//uvek se prosledjuje jedno polje koje je indikator da su podaci poslati sa forme
//odnosno da je korisnik pokrenuo neku akciju
if (isset($_POST["task"]) && $_POST["task"] == "save") {
    
    
    	if (isset($_POST["password"]) && $_POST["password"] !== '') {
		//Dodavanje parametara medju podatke u formi
		$formData["password"] = $_POST["password"];

                if (strlen($formData['password']) < 5)
                {
                    $formErrors["password"][] = "Polje password mora sadrzati 5 ili vise karaktera";
                }
		
	} else {//Ovaj else ide samo ako je polje obavezno
		$formErrors["password"][] = "Polje password je obavezno";
	}
    
    	if (isset($_POST["confirm_password"]) && $_POST["confirm_password"] !== '') {
		//Dodavanje parametara medju podatke u formi
		$formData["confirm_password"] = $_POST["confirm_password"];

                if ($formData['confirm_password'] != $formData['password'])
                {
                    $formErrors["confirm_password"][] = "Potvrdi password, nisu isti";
                }
		
	} else {//Ovaj else ide samo ako je polje obavezno
		$formErrors["confirm_password"][] = "Polje confirm_password je obavezno";
	}

	//Ukoliko nema gresaka 
	if (empty($formErrors)) {
		//Uradi akciju koju je korisnik trazio
            
                unset($formData['confirm_password']);
                
		usersUpdateOneById($user['id'], $formData);
                
                $_SESSION['system_message'] = "Uspesno ste promenili lozinku";

			
		header('Location: /profile-preview.php');
		die();
	}
        
}


require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_profile-change-password.php';
require_once __DIR__ . '/views/layout/footer.php';
