<?php 
require_once($_SERVER['DOCUMENT_ROOT']. '../interfaces/Database.php');

	class Model implements Database {
		public static function get_db($link) {
			$data = file_get_contents($link);
			$all_data = json_decode($data);
			return $all_data;
		}

	//save data	
	public function save($data){
		if($_SERVER['REQUEST_URI'] == '/routes/employer_register.php'){
			$link = "../assets/db/user.json";
		}else if($_SERVER['REQUEST_URI'] == '/routes/add_job.php'){
			$link = '../assets/db/jobs.json';
		}else if($_SERVER['REQUEST_URI'] == '/routes/job_hunter_register.php'){
			$link = "../assets/db/user.json";
		}
		else{
			$link = "../assets/db/view_applicant.json";
		}
		$all_data = Model::get_db($link);
		array_push($all_data, $data);
		file_put_contents($link, json_encode($all_data, JSON_PRETTY_PRINT));
	}

	public static function check_user($email){
		$all_users = Model::get_db('../assets/db/user.json');
		$exist = false;
		foreach($all_users as $user) {
			if($email == ($user->email)){
				$exist  = true;
			}
		}return $exist;
	}
}
 ?>