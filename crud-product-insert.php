<?php
session_start();

require_once __DIR__ . '/models/m_users.php';

if (!isUserLoggedIn()) {
    header('Location: /login.php');
    die();
}


require_once __DIR__ . '/models/m_products.php';
require_once __DIR__ . '/models/m_categories.php';
require_once __DIR__ . '/models/m_brands.php';

//ovde se prihvataju vrednosti polja, popisati sve kljuceve i pocetne vrednosti
$formData = array(
    'category_id' => '',
    'brand_id' => '',
    'title' => '',
    'price' => '',
    'on_sale' => 0,
    'discount' => 0,
    'description' => '',
    'specification' => ''
);

//ovde se smestaju greske koje imaju polja u formi
$formErrors = array();


//uvek se prosledjuje jedno polje koje je indikator da su podaci poslati sa forme
//odnosno da je korisnik pokrenuo neku akciju
if (isset($_POST["task"]) && $_POST["task"] == "insert") {

    /*     * ********* filtriranje i validacija polja *************** */
    if (isset($_POST["title"]) && $_POST["title"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["title"] = $_POST["title"];

        //Filtering 1
        $formData["title"] = trim($formData["title"]);
        //Filtering 2
        //Filtering 3
        //Filtering 4
        //...
        //Validation 2
        //Validation 3
        //Validation 4
        //...
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["title"][] = "Polje title je obavezno";
    }

    if (isset($_POST["price"]) && $_POST["price"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["price"] = $_POST["price"];

        //Filtering 1
        $formData["price"] = trim($formData["price"]);

        $formData["price"] = (float) $formData["price"];

        $formData["price"] = round($formData["price"], 2);

        if ($formData["price"] < 0) {
            $formErrors["price"][] = "Price mora biti veci od nule";
        }
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["price"][] = "Polje price je obavezno";
    }


    if (isset($_POST["discount"]) && $_POST["discount"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["discount"] = $_POST["discount"];

        //Filtering 1
        $formData["discount"] = trim($formData["discount"]);
        //Filtering 2
  
        //...
    }

    if (isset($_POST["description"]) && $_POST["description"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["description"] = $_POST["description"];

        //Filtering 1
        $formData["description"] = trim($formData["description"]);
        //Filtering 2

    }

    if (isset($_POST["specification"]) && $_POST["specification"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["specification"] = $_POST["specification"];

        //Filtering 1
        $formData["specification"] = trim($formData["specification"]);
        //Filtering 2

        //...
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["specification"][] = "Polje specification je obavezno";
    }


    if (isset($_POST["on_sale"]) && $_POST["on_sale"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["on_sale"] = $_POST["on_sale"];

        //Filtering 1
        $formData["on_sale"] = trim($formData["on_sale"]);


        $onSalePossibleValues = array(0, 1);

        //Validation videti da li je prosledjena vrednost medju opcijama
        if (!in_array($formData["on_sale"], $onSalePossibleValues)) {
            $formErrors["on_sale"][] = "Izabrali ste neodgovarajucu vrednost za polje on_sale";
        }

        //Validation 2
        //Validation 3
        //...
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["on_sale"][] = "Polje on_sale je obavezno";
    }
    /*     * ********* filtriranje i validacija polja *************** */


    if (isset($_POST["category_id"]) && $_POST["category_id"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["category_id"] = $_POST["category_id"];

        //Filtering 1
        $formData["category_id"] = trim($formData["category_id"]);

        $testCategory = categoriesFetchOneById($formData["category_id"]);

        if (empty($testCategory)) {
            $formErrors["category_id"][] = "Izabrali ste neodgovarajucu kategoriju.";
        }
        //Validation 2

    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["category_id"][] = "Polje category_id je obavezno";
    }


    if (isset($_POST["brand_id"]) && $_POST["brand_id"] !== '') {
        //Dodavanje parametara medju podatke u formi
        $formData["brand_id"] = $_POST["brand_id"];

        //Filtering 1
        $formData["brand_id"] = trim($formData["brand_id"]);


        $testBrand = brandsFetchOneById($formData["brand_id"]);

        if (empty($testBrand)) {
            $formErrors["brand_id"][] = "Izabrali ste neodgovarajuci brand";
        }

        //Validation 2

    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["brand_id"][] = "Polje brand_id je obavezno";
    }

    if (isset($_FILES["photo"]) && empty($_FILES["photo"]['error'])) {
        //Filtering
        $photoFileTmpPath = $_FILES["photo"]["tmp_name"];
        $photoFileName = basename($_FILES["photo"]["name"]);
        $photoFileMime = mime_content_type($_FILES["photo"]["tmp_name"]);
        $photoFileSize = $_FILES["photo"]["size"];

        //validation
        $photoFileAllowedMime = array("image/jpeg", "image/png", "image/gif");
        $photoFileMaxSize = 5 * 1024 * 1024; // 1 MB

        if (!in_array($photoFileMime, $photoFileAllowedMime)) {
            $formErrors["photo"][] = "Fajl photo je u neispravnom formatu";
        }

        if ($photoFileSize > $photoFileMaxSize) {
            $formErrors["photo"][] = "Fajl photo prelazi maksimalnu dozvoljenu velicinu";
        }
    } else {//Ovaj else ide samo ako je polje obavezno
        $formErrors["photo"][] = "Polje photo je obavezno";
    }

    //Ukoliko nema gresaka 
    if (empty($formErrors)) {
        //Uradi akciju koju je korisnik trazio
//                $formData['created_at'] = date ('Y-m-d H:i:s');

        $newProductId = productsInsertOne($formData);

        $newProductPhotoFileName = $newProductId . '_' . $photoFileName;

        $destinationPath = __DIR__ . '/uploads/products/' . $newProductPhotoFileName;

        if (move_uploaded_file($photoFileTmpPath, $destinationPath)) {

            productsUpdatePhotoFileName($newProductId, $newProductPhotoFileName);

            $_SESSION['system_message'] = "Uspesno ste sacuvali novi proizvod " . $formData['title'];

            header('Location: /crud-product-list.php');
            die();
        } else {
            $formErrors['photo'][] = 'Doslo je do greske prilikom upload-a slike';
        }
    }
}



$brandList = brandsGetList();
$categoryList = categoriesGetListByGroup();

require_once __DIR__ . '/views/layout/header.php';
require_once __DIR__ . '/views/templates/t_crud-product-insert.php';
require_once __DIR__ . '/views/layout/footer.php';
