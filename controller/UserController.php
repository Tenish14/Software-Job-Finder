<?php 
require ("../models/User.php");
session_start();

class UserController extends User {
	public static function create($user){

			//Save Job_Hunter Data in Database
		if(strlen($user['username']) < 5){
			echo "<script type='text/javascript'>alert('Username should be more than 5 characters');window.location.href = '/views/forms/register_type/job_hunter.php'</script>";
		}else if($user['password'] != $user['password2']){
			echo "<script type='text/javascript'>alert('Password never match');window.location.href = '/views/forms/register_type/job_hunter.php'</script>";
		}else if(!filter_var($user['email'], FILTER_VALIDATE_EMAIL)){
			echo "<script type='text/javascript'>alert('Invalid Email Format');window.location.href = '/views/forms/register_type/job_hunter.php'</script>";
		}else if(User::check_user($user['username'])){
			echo "<script type='text/javascript'>alert('Username Alrdy Taken');window.location.href = '/views/forms/register_type/job_hunter.php'</script>";
		}else if(User::check_user($user['email'])){
			echo "<script type='text/javascript'>alert('Email Alrdy Taken');window.location.href = '/views/forms/register_type/job_hunter.php'</script>";}
		else{
			$new_user = new User($user);
			User::save($new_user);
			header('Location: /');
		}

	}

	public static function login($user) {
		// var_dump($user);
		$errors = 0;
		$user_details = User::find_user($user['email']);
		if(!User::check_user($user['email'])){
			$errors++;
			echo "<script type='text/javascript'>alert('Check your Email');window.location.href = '/views/forms/login.php'</script>";
			return ;
		}

		if($user_details->password != $user['password']){
			$errors++;
			echo "<script type='text/javascript'>alert('Check your cresentials');window.location.href = '/views/forms/login.php'</script>";
			return ;
		}

		if($errors == 0){
			$_SESSION['user'] = $user_details;
			unset($_SESSION['user']->password);
			var_dump($_SESSION['user']);
			header('Location: /');
		}
	}


	public static function logout($user){
		//that will delete all session variables.
		session_unset();

		//destroy all data registered to a session
		session_destroy();

		header('location: /');

	}

}

?>