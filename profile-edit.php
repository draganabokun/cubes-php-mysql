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
    'email' => $user['email'],
    'first_name' => $user['first_name'],
    'last_name' => $user['last_name'],
);

//ovde se smestaju greske koje imaju polja u formi
$formErrors = array();


//uvek se prosledjuje jedno polje koje je indikator da su podaci poslati sa forme
//odnosno da je korisnik pokrenuo neku akciju
if (isset($_POST["task"]) && $_POST["task"] == "save") {

    /*     * ********* filtriranje i validacija polja *************** */

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

        $_SESSION['logged_in_user'] = usersFetchOneById($user['id']);
        //u sesiju se upisuje korisnik sa svojim novim podacima

        $_SESSION['system_message'] = "Uspesno ste promenili profil";

        header('Location: /profile-preview.php');

        die();
    }
}


require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_profile-edit.php';
require_once __DIR__ . '/views/layout/footer.php';
