<?php 
require_once($_SERVER['DOCUMENT_ROOT']. '../interfaces/Database.php');
require_once('Model.php');
global $id;

class Applicant extends Model implements JsonSerializable, Database {
	private $resume;



	public function __construct($applicant){
		$all_applicants = Applicant::get_db('../assets/db/view_applicant.json');
		if(count($all_applicants) == 0){
			$finalId = 1;
		}else{
			$finalId = (end($all_applicants)->id) + 1; 
		}
		
		$file_name = $_FILES['resume']['name'];
		$file_size = $_FILES['resume']['size'];	
		$file_tmpname = $_FILES['resume']['tmp_name'];	
		move_uploaded_file($file_tmpname, '../assets/resume/'.$file_name);
		
		$this->id = $finalId;
		$this->resume = "../assets/resume/".$file_name;;
		$this->username = $_SESSION['user']->username;
		$this->email = $_SESSION['user']->email;
		$this->applicationId = $_GET['id'];
		$this->companyname =  $applicant['companyname'];
		$this->status = "Pending";
		$this->datePosted = date("d-m-Y");
	}

	public function jsonSerialize () {
		return get_object_vars($this);
	}

	public function all(){
		$posts = Model::get_db($_SERVER['DOCUMENT_ROOT']. '../assets/db/view_applicant.json');
		return $posts;
	}

	public function decline($applicant){
		$id = $_GET['id'];
		$all_applicants = Model::get_db($_SERVER['DOCUMENT_ROOT']. '../assets/db/view_applicant.json');

		echo "<pre>";
		var_dump($all_applicants);
		echo "</pre>";

		foreach($all_applicants as $update){
			if($update->id == $id){
				$update->status = "Decline" ;
				echo "----------------------------------------------------";	
				echo "<pre>";
				var_dump($update);
				echo "</pre>";
				file_put_contents('../assets/db/view_applicant.json', json_encode($all_applicants,JSON_PRETTY_PRINT));
				header('location: /views/view_applicants.php');

			}
		}

	}

	public function accept($applicant){
		$id = $_GET['id'];
		$all_applicants = Model::get_db($_SERVER['DOCUMENT_ROOT']. '../assets/db/view_applicant.json');

		echo "<pre>";
		var_dump($all_applicants);
		echo "</pre>";

		foreach($all_applicants as $update){
			if($update->id == $id){
				$update->status = "Accept" ;
				echo "----------------------------------------------------";	
				echo "<pre>";
				var_dump($update);
				echo "</pre>";
				file_put_contents('../assets/db/view_applicant.json', json_encode($all_applicants,JSON_PRETTY_PRINT));
				header('location: /views/view_applicants.php');

			}
		}

	}
}

?>