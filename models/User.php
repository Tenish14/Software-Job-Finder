<?php 
require_once($_SERVER['DOCUMENT_ROOT']. '../interfaces/Database.php');
require_once('Model.php');

class User extends Model implements JsonSerializable, Database {
	private $username;
	private $email;
	private $password;

	public function __construct($user){
		$image_name = $_FILES['image']['name'];
		$image_size = $_FILES['image']['size'];	
		$image_tmpname = $_FILES['image']['tmp_name'];	
		move_uploaded_file($image_tmpname, '../assets/img/user/'.$image_name);


		$this->username = $user['username'];
		$this->email = $user['email'];
		$this->password = $user['password'];
		$this->image = "../assets/img/user/".$image_name;
		$this->isEmployer = false;
	}


	public function jsonSerialize () {
		return get_object_vars($this);
	}

	public static function check_user($email){
		$all_users = Model::get_db('../assets/db/user.json');
		foreach($all_users as $user) {
			if($email == $user->email){
				return true;
			}
		}return false;
	}

	public static function find_user($email){
		$all_users = Model::get_db('../assets/db/user.json');
		foreach($all_users as $user) {
			if($email == $user->email){
				return $user;
			}
		}
	}
}


?>