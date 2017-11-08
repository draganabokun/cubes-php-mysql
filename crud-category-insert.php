<?php
session_start();

require_once __DIR__ .'/models/m_categories.php';
require_once __DIR__ .'/models/m_groups.php';


//ovde se prihvataju vrednosti polja, popisati sve kljuceve i pocetne vrednosti
$formData = array(
	'title'=>'',
        'group_id'=>'',
        'description'=>''
);

//ovde se smestaju greske koje imaju polja u formi
$formErrors = array();


//uvek se prosledjuje jedno polje koje je indikator da su podaci poslati sa forme
//odnosno da je korisnik pokrenuo neku akciju
if (isset($_POST["task"]) && $_POST["task"] == "insert") {
	
	/*********** filtriranje i validacija polja ****************/
	
	/*********** filtriranje i validacija polja ****************/
	
	
	//Ukoliko nema gresaka 
	if (empty($formErrors)) {
		//Uradi akciju koju je korisnik trazio
	}
}

$groups = groupsFetchAll();

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-category-insert.php';
require_once __DIR__ . '/views/layout/footer.php';
