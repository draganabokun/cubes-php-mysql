<?php

session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
    header('Location: /login.php');
    die();
}


require_once __DIR__ . '/models/m_news.php';
require_once __DIR__ . '/models/m_sections.php';

$sectionList = sectionsGetList();


//ovde se prihvataju vrednosti polja, popisati sve kljuceve i pocetne vrednosti
$formData = array(
    'section_id' => '',
    'title' => '',
    'description' => '',
    'content' => ''
);

//ovde se smestaju greske koje imaju polja u formi
$formErrors = array();


//uvek se prosledjuje jedno polje koje je indikator da su podaci poslati sa forme
//odnosno da je korisnik pokrenuo neku akciju
if (isset($_POST["task"]) && $_POST["task"] == "insert") {

    /*     * ********* filtriranje i validacija polja *************** */

    if (isset($_POST["section_id"]) && $_POST["section_id"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["section_id"] = $_POST["section_id"];

        //Filtering 1
        $formData["section_id"] = trim($formData["section_id"]);
        $formData["section_id"] = (int) $formData["section_id"];

        $testSection = sectionsFetchOneById($formData["section_id"]);

        if (empty($testSection)) {
            $formErrors["section_id"][] = "Izabrali ste neodgovarajuci section";
        }
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["section_id"][] = "Polje section_id je obavezno";
    };

    
    if (isset($_POST["title"]) && $_POST["title"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["title"] = $_POST["title"];

        //Filtering 1
        $formData["title"] = trim($formData["title"]);
        
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["title"][] = "Polje title je obavezno";
    };



    if (isset($_POST["description"]) && $_POST["description"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["description"] = $_POST["description"];

        //Filtering 1
        $formData["description"] = trim($formData["description"]);
    };
    
    

    if (isset($_POST["content"]) && $_POST["content"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["content"] = $_POST["content"];

        //Filtering 1
        $formData["content"] = trim($formData["content"]);
    };
    

            
    if (isset($_FILES["photo"]) && empty($_FILES["photo"]['error'])) {
        //Filtering
        $photoFileTmpPath = $_FILES["photo"]["tmp_name"];
        $photoFileName = basename($_FILES["photo"]["name"]);
        $photoFileMime = mime_content_type($_FILES["photo"]["tmp_name"]);
        $photoFileSize = $_FILES["photo"]["size"];

        //validation
        $photoFileAllowedMime = array("image/jpeg", "image/png", "image/gif");
        $photoFileMaxSize = 5 * 1024 * 1024; // 5 MB

        
        if (!in_array($photoFileMime, $photoFileAllowedMime)) {
            $formErrors["photo"][] = "Fajl photo je u neispravnom formatu";
        }

        if ($photoFileSize > $photoFileMaxSize) {
            $formErrors["photo"][] = "Fajl photo prelazi maksimalnu dozvoljenu velicinu";
        }
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["photo"][] = "Polje photo je obavezno";
    }
    
    
        /*     * ********* filtriranje i validacija polja *************** */

    //Ukoliko nema gresaka 
    if (empty($formErrors)) {
        //Uradi akciju koju je korisnik trazio
        
        $formData['created_at'] = date('Y-m-d H:i:s');
         
        $latestNewsId = newsInsertOne($formData);

        $latestNewsPhotoFileName = $latestNewsId . '_' . $photoFileName;

        $destinationPath = __DIR__ . '/uploads/news/' . $latestNewsPhotoFileName;

        if (move_uploaded_file($photoFileTmpPath, $destinationPath)) {

            newsUpdatePhotoFileName($latestNewsId, $latestNewsPhotoFileName);

            header('Location: /crud-news-list.php');
            die();
        } else {
            $formErrors['photo'][] = 'Doslo je do greske prilikom upload-a slike';
        }
    }
}






require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-news-insert.php';
require_once __DIR__ . '/views/layout/footer.php';
