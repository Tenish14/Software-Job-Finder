<?php 
require ("../models/Employer.php");
session_start();

class EmployerController extends Employer{

	public static function create($employer){
			//Save Employer Data in Database

		if(strlen($employer['companyname']) < 5){
			echo "<script type='text/javascript'>alert('Company Name should be more than 5 characters');window.location.href = '/views/forms/register_type/employer.php'</script>";
		} else if($employer['password'] != $employer['password2']){
			echo "<script type='text/javascript'>alert('Password never match');window.location.href = '/views/forms/register_type/employer.php'</script>";
		}else if(!filter_var($employer['email'], FILTER_VALIDATE_EMAIL)){
			echo "<script type='text/javascript'>alert('Invalid Email Format');window.location.href = '/views/forms/register_type/employer.php'</script>";
		}else if(Employer::check_user($employer['companyname'])){
			echo "<script type='text/javascript'>alert('Username Alrdy Taken');window.location.href = '/views/forms/register_type/employer.php'</script>";
		}else if(Employer::check_user($employer['email'])){
			echo "<script type='text/javascript'>alert('Email Alrdy Taken');window.location.href = '/views/forms/register_type/employer.php'</script>";}
			else{
				$_SESSION['employer'] = $employer;
				$new_employer = new Employer ($employer);
				var_dump($_SESSION['employer']);
				Employer::save($new_employer);
				header('Location: /');
			}
		}

		
	}
?>