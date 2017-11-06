<?php

	if (isset($_POST["fieldName"]) && $_POST["fieldName"] !== '') {
		//Dodavanje parametara medju podatke u formi
		$formData["fieldName"] = $_POST["fieldName"];
		
		//Filtering 1
		$formData["fieldName"] = trim($formData["fieldName"]);
		//Filtering 2
		//Filtering 3
		//Filtering 4
		//...
		
		//Validation 2
		//Validation 3
		//Validation 4
		//...
		
	} else {//Ovaj else ide samo ako je polje obavezno
		$formErrors["fieldName"][] = "Polje fieldName je obavezno";
	}
