<?php

session_start();

require_once __DIR__ . '/models/m_categories.php';
require_once __DIR__ . '/models/m_groups.php';

//ovde se prihvataju vrednosti polja, popisati sve kljuceve i pocetne vrednosti
$formData = array(
    'title' => '',
    'group_id' => '',
    'description' => ''
);

//ovde se smestaju greske koje imaju polja u formi
$formErrors = array();

$groups = groupsFetchAll();

//uvek se prosledjuje jedno polje koje je indikator da su podaci poslati sa forme
//odnosno da je korisnik pokrenuo neku akciju
if (isset($_POST["task"]) && $_POST["task"] == "insert") {

    /*     * ********* filtriranje i validacija polja *************** */
    if (isset($_POST["title"]) && $_POST["title"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["title"] = $_POST["title"];

        //Filtering 1
        $formData["title"] = trim($formData["title"]);
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["title"][] = "Polje title je obavezno";
    }

    
    
    if (isset($_POST["group_id"]) && $_POST["group_id"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["group_id"] = $_POST["group_id"];

        //Filtering 1
        $formData["group_id"] = trim($formData["group_id"]);
        $formData["group_id"] = (int) $formData["group_id"];
   		
        
        $groupsPossibleValues = array("1", "2", "3");

        //Validation videti da li je prosledjena vrednost medju opcijama
        if (!in_array($formData["group_id"], $groupsPossibleValues)) {
            $formErrors["group_id"][] = "Izabrali ste neodgovarajucu vrednost za polje group_id";
        }

//        $groupsIdPossibleValues = groupsGetAllIds();
//        
//        print_r($groupsIdPossibleValues);
//        die;
//
//        //Validation videti da li je prosledjena vrednost medju opcijama
//        if (!in_array($formData["group_id"], $groupsIdPossibleValues)) {
//            $formErrors["group_id"][] = "Izabrali ste neodgovarajucu vrednost za polje group_id";
//        }
        
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["group_id"][] = "Polje group_id je obavezno";
    }



    if (isset($_POST["description"]) && $_POST["description"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["description"] = $_POST["description"];

        //Filtering 1
        $formData["description"] = trim($formData["description"]);
    }


    /*     * ********* filtriranje i validacija polja *************** */


    //Ukoliko nema gresaka 
    if (empty($formErrors)) {
        //Uradi akciju koju je korisnik trazio

        $newCategoryId = categoriesInsertOne($formData);

        header('Location: /crud-category-list.php');
        die();
    }
}



require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-category-insert.php';
require_once __DIR__ . '/views/layout/footer.php';
