<?php
	// kod za proveru polja
	if (isset($_FILES["fieldName"]) && empty($_FILES["fieldName"]['error'])) {
		//Filtering
		$fieldNameFileTmpPath = $_FILES["fieldName"]["tmp_name"];
		$fieldNameFileName = basename($_FILES["fieldName"]["name"]);
		$fieldNameFileMime = mime_content_type($_FILES["fieldName"]["tmp_name"]);
		$fieldNameFileSize = $_FILES["fieldName"]["size"];

		//validation
		$fieldNameFileAllowedMime = array("image/jpeg", "image/png", "image/gif");
		$fieldNameFileMaxSize = 1 * 1024 * 1024;// 1 MB

		if (!in_array($fieldNameFileMime, $fieldNameFileAllowedMime)) {
			$formErrors["fieldName"][] = "Fajl fieldName je u neispravnom formatu";
		}

		if ($fieldNameFileSize > $fieldNameFileMaxSize) {
			$formErrors["fieldName"][] = "Fajl fieldName prelazi maksimalnu dozvoljenu velicinu";
		}
		
	} else {//Ovaj else ide samo ako je polje obavezno
		$formErrors["fieldName"][] = "Polje fieldName je obavezno";
	}
	
	
	
	
	//kasnije prilikom provere da li ima gresaka u formi
	if (empty($formErrors)) {
		
		//ovde treba da se setuje konacna putanja do fajla.
		
		$destinationPath = $uploadsDirectory . DIRECTORY_SEPARATOR . $fieldNameFileName;
		
		if (!move_uploaded_file($fieldNameFileTmpPath, $destinationPath)) {
			$formErrors["fieldName"][] = "Doslo je do greske prilikom snimanja fajla fieldName";
		} else {
			//akcija
		}
	}
