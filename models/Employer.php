 <?php 

require_once($_SERVER['DOCUMENT_ROOT']. '../interfaces/Database.php');
require_once('Model.php');

class Employer extends Model implements JsonSerializable, Database {
	private $companyname;
	private $email;
	private $image;
	private $password;


	public function __construct($employer){
		$image_name = $_FILES['image']['name'];
		$image_size = $_FILES['image']['size'];
		$image_tmpname = $_FILES['image']['tmp_name'];
		move_uploaded_file($image_tmpname, '../assets/img/employer/'.$image_name);

		$this->companyname = $employer['companyname'];
		$this->email = $employer['email'];
		$this->image = "../assets/img/employer/".$image_name;
		$this->password = $employer['password'];
		$this->isEmployer = true;
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
}

 ?>