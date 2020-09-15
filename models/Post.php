<?php 
// session_start();
require_once($_SERVER['DOCUMENT_ROOT']. '../interfaces/Database.php');
require_once('Model.php');

class Post extends Model implements JsonSerializable, Database {
	private $job_title;
	private $description;
	private $location;
	private $experience;
	private $respond;
	private $educational;
	private $skills;
	private $salary;


	public function __construct($post){
		$all_posts = Post::get_db('../assets/db/jobs.json');
		if(count($all_posts) == 0){
			$finalId = 1;
		}else{
			$finalId = (end($all_posts)->id) + 1; 
		}

		$this->id = $finalId;
		$this->job_title = $post['job_title'];
		$this->description = $post['description'];
		$this->location = $post['location'];
		$this->experience = $post['experience'];
		$this->respond = $post['respond'];
		$this->educational = $post['educational'];
		$this->skills = $post['skills'];
		$this->salary = $post['salary'];
		$this->company = $_SESSION['user']->companyname;
		$this->company_image = $_SESSION['user']->image;
		$this->datePosted = date("d-m-Y");
	}

	public function jsonSerialize () {
		return get_object_vars($this);
	}

	public function all(){
		$posts = Model::get_db($_SERVER['DOCUMENT_ROOT']. '../assets/db/jobs.json');
		return $posts;
	}

	public  function delete($post){
		$all_posts = Model::get_db('../assets/db/jobs.json');
		$id = $_GET['id'];

		echo "<pre>";
		var_dump($all_posts);
		echo "</pre>";
		foreach($all_posts as $index => $element){

			if($element->id == $id){
				array_splice($all_posts, $index, 1);
			}
		}
		file_put_contents("../assets/db/jobs.json", json_encode($all_posts,JSON_PRETTY_PRINT));
		header('location:/views/view_posts.php');


	}

	public static function edit_posts($post) {
		$id = $_GET['id'];
		$all_posts = Model::get_db($_SERVER['DOCUMENT_ROOT']. '../assets/db/jobs.json');
		foreach($all_posts as $update){
			if($update->id == $id){
				$update->job_title = $post['job_title'];
				$update->description = $post['description'];
				$update->location = $post['location'];
				$update->experience = $post['experience'];
				$update->respond = $post['respond'];
				$update->educational = $post['educational'];
				$update->skills = $post['skills'];
				$update->salary = $post['salary'];
				$update->datePosted = date("d-m-Y");
				file_put_contents("../assets/db/jobs.json", json_encode($all_posts,JSON_PRETTY_PRINT));
				header('location:/views/view_posts.php');

			}
		}
	}

}
?>