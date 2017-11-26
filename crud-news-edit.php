<?php
session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
    header('Location: /login.php');
    die();
}


require_once __DIR__ . '/models/m_news.php';
require_once __DIR__ . '/models/m_sections.php';



if (empty($_GET['id'])) {
    die('Morate proslediti id');
}

$id = (int) $_GET['id'];

$oneNews = newsFetchOneById($id);

if (empty($oneNews)) {
    die('Trazena vest ne postoji');
}

//ovde se prihvataju vrednosti polja, popisati sve kljuceve i pocetne vrednosti
$formData = array(
    'section_id' => $oneNews['section_id'],
    'title' => $oneNews['title'],
    'description' => $oneNews['description'],
    'content' => $oneNews['content']
);

//ovde se smestaju greske koje imaju polja u formi
$formErrors = array();

if (isset($_FILES['photo'])) {
    echo "setovana je slika";

    echo "Greska je " . $_FILES['photo']['error'];

    print_r(($_FILES['photo']));
}


//uvek se prosledjuje jedno polje koje je indikator da su podaci poslati sa forme
//odnosno da je korisnik pokrenuo neku akciju
if (isset($_POST["task"]) && $_POST["task"] == "save") {

    /*     * ********* filtriranje i validacija polja *************** */
    if (isset($_POST["title"]) && $_POST["title"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["title"] = $_POST["title"];

        //Filtering 1
        $formData["title"] = trim($formData["title"]);
        //Filtering 2
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["title"][] = "Polje title je obavezno";
    }


    if (isset($_POST["description"]) && $_POST["description"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["description"] = $_POST["description"];

        //Filtering 1
        $formData["description"] = trim($formData["description"]);
        //Filtering 2
        //	
    }

    if (isset($_POST["content"]) && $_POST["content"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["content"] = $_POST["content"];

        //Filtering 1
        $formData["content"] = trim($formData["content"]);
        //Filtering 2
    }

    /*     * ********* filtriranje i validacija polja *************** */


    if (isset($_POST["section_id"]) && $_POST["section_id"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["section_id"] = $_POST["section_id"];

        //Filtering 1
        $formData["section_id"] = trim($formData["section_id"]);

        $testSection = sectionsFetchOneById($formData["section_id"]);

        if (empty($testSection)) {
            $formErrors["section_id"][] = "Izabrali ste neodgovarajucu kategoriju.";
        }
        //Validation 2
        //Validation 3
        //...
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["section_id"][] = "Polje section_id je obavezno";
    }


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
    }

    //Ukoliko nema gresaka 
    if (empty($formErrors) && isset($_FILES['photo']) && $_FILES['photo']['size'] != 0) {
        //Provera da li postoji slika za upload i da li je uploadovanje uspesno
        //Staru sliku ne brisemo, vec je premestamo u temporary folder dok se ne uverimo da je upload uspesan
 
        $oldPhotoPath = __DIR__ . '/uploads/news/' . $oneNews['photo_filename'];

        $oldPhotoTempPath = __DIR__ . '/uploads/news/temporary/' . $oneNews['photo_filename'];

        if (is_file($oldPhotoPath)) {
            rename($oldPhotoPath, $oldPhotoTempPath);    
        }
        
        //ubacimo novu sliku
        $newPhotoFileName = $oneNews['id'] . '_' . $photoFileName;

        $destinationPath = __DIR__ . '/uploads/news/' . $newPhotoFileName;
        
       
        if (!move_uploaded_file($photoFileTmpPath, $destinationPath)) {
                                 
            if (is_file($oldPhotoTempPath)){
            rename($oldPhotoTempPath, $oldPhotoPath); //staru sliku vracamo u folder products
            }
            
            $formErrors['photo'][] = 'Doslo je do greske prilikom uploada fajla';
        }
    }

    
    if (empty($formErrors)) {
        //tek ako nema gresaka ni prilikom uploada, vrsi se upis podataka u bazu

        newsUpdateOneById($oneNews['id'], $formData);

        newsUpdatePhotoFileName($oneNews['id'], $newPhotoFileName);
        
        if (is_file($oldPhotoTempPath)) {
            unlink($oldPhotoTempPath); //staru sliku brisemo iz temporary foldera
        }

        $_SESSION['system_message'] = "Uspesno ste izmenili vest " . $oneNews['title'];

        header('Location: /crud-news-list.php');
        die();
    }
}



$sectionList = sectionsGetList();

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-news-edit.php';
require_once __DIR__ . '/views/layout/footer.php';
