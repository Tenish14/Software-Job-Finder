<?php 
session_start();
require ("../models/Post.php");
// session_start();

class AddJobController extends Post{

	public static function create($post){
			//Save Employer Data in Database
				$new_posts = new Post ($post);
				$_SESSION['jobs'] = $new_posts;
				Post::save($new_posts);
				echo "<pre>";
				var_dump($_SESSION['jobs']);	
				echo "</pre>";
				header('Location: /');
	}
}	
?>