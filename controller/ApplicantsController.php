<?php 
session_start();
require ("../models/Applicant.php");

class ApplicantsController extends applicant{

	public static function create($applicant){
			//Save Employer Data in Database
				$new_applicant = new Applicant ($applicant);
				Applicant::save($new_applicant);
				echo "<pre>";
				var_dump($new_applicant);
				echo "</pre>";
				header('Location: /');
	}
}	
?>