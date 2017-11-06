<?php

if (empty($_GET['id']))
{
    die('Morate proslediti id');
}

$id = (int) $_GET['id'];

$link = mysqli_connect('127.0.0.1', 'cubes', 'cubes', 'cubesphp');

if ($link === false) {
	die('MySQL Error: ' . mysqli_connect_error());
}

$query = "SELECT * FROM brands WHERE id = '" . mysqli_real_escape_string($link, $id) . "'";


$result = mysqli_query($link, $query);

if ($result === false) {
	die('MySQL Error: ' . mysqli_error($link));
}

$brand = mysqli_fetch_assoc($result);

if (empty($brand))
{
    die ('Trazeni brand ne postoji');
}

//ovde se prihvataju vrednosti polja, popisati sve kljuceve i pocetne vrednosti
$formData = array(

        'title' => $brand['title'],
        'website_url'=> $brand['website_url']
);

//ovde se smestaju greske koje imaju polja u formi
$formErrors = array();


//uvek se prosledjuje jedno polje koje je indikator da su podaci poslati sa forme
//odnosno da je korisnik pokrenuo neku akciju
if (isset($_POST["task"]) && $_POST["task"] == "save") {
	
	/*********** filtriranje i validacija polja ****************/
    	if (isset($_POST["title"]) && $_POST["title"] !== '') {
		//Dodavanje parametara medju podatke u formi
		$formData["title"] = $_POST["title"];
		
		$formData["title"] = trim($formData["title"]);

                
		
	} else {//Ovaj else ide samo ako je polje obavezno
		$formErrors["title"][] = "Polje title je obavezno";
	}
	
	/*********** filtriranje i validacija polja ****************/
        	if (isset($_POST["website_url"]) && $_POST["website_url"] !== '') 
                {
		//Dodavanje parametara medju podatke u formi
		$formData["website_url"] = $_POST["website_url"];

		$formData["website_url"] = trim($formData["website_url"]);
                }
	
	
	//Ukoliko nema gresaka 
	if (empty($formErrors)) {
		//Uradi akciju koju je korisnik trazio
            $query = "UPDATE brands SET ";
            $query .= "title = '" . mysqli_real_escape_string($link, $formData['title']) . "',";
            $query .= "website_url = '" . mysqli_real_escape_string($link, $formData['website_url']) . "' ";
            $query .= "WHERE id = '" . mysqli_real_escape_string($link, $brand['id']) . "'";

            
            $result = mysqli_query($link, $query);
            if ($result === false)
            {
                die('MySQL error: ' . mysqli_error($link));
            }
            header('Location: /crud-brand-list.php');
            die;
	}
}


require_once __DIR__ .'/views/layout/header.php';

require_once __DIR__ .'/views/templates/t_crud-brand-edit.php';

require_once __DIR__ .'/views/layout/footer.php';
