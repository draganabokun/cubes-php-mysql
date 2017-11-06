<?php

	if (!empty($_POST["fieldName"]) && is_array($_POST["fieldName"])) {
		//Dodavanje parametara medju podatke u formi
		$formData["fieldName"] = $_POST["fieldName"];
		
		$fieldNamePossibleValues = array("value1", "value2", "value3");
		
		//Validation - validate selected options
		$invalidValues = array_diff($formData["fieldName"], $fieldNamePossibleValues);
		if (!empty($invalidValues)) {
			$formErrors["fieldName"][] = "Izabrali ste neodgovarajuce vrednosti za polje fieldName";
		}
		
		//Validation 2
		//Validation 3
		//...
	} else {//Ovaj else ide samo ako je polje obavezno
		$formErrors["fieldName"][] = "Polje fieldName je obavezno";
	}
