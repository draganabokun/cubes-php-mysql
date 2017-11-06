<?php


	if (isset($_POST["fieldName"]) && $_POST["fieldName"] !== '') {
		//Dodavanje parametara medju podatke u formi
		$formData["fieldName"] = $_POST["fieldName"];
		
		//Filtering 1
		$formData["fieldName"] = trim($formData["fieldName"]);
		
		
		$fieldNamePossibleValues = array("value1", "value2", "value3");
		
		//Validation videti da li je prosledjena vrednost medju opcijama
		if (!in_array($formData["fieldName"], $fieldNamePossibleValues)) {
			$formErrors["fieldName"][] = "Izabrali ste neodgovarajucu vrednost za polje fieldName";
		}
		
		//Validation 2
		//Validation 3
		//...
	} else {//Ovaj else ide samo ako je polje obavezno
		$formErrors["fieldName"][] = "Polje fieldName je obavezno";
	}

