<?php 
session_start();

$title = "Job_Hunter Sign Up";
function get_content(){
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 px-5">
				<div class="px-5">	
					<div class="w-100 d-flex justify-content-center">
						<img src="/../assets/img/logo/job_finder.png" style="max-height:6rem; width: auto;" class="img-fluid">
					</div>
					<h5 class="text-center">Sign Up as Job Seeker.</h5>
					<form method="POST" action="/routes/job_hunter_register.php" enctype="multipart/form-data" name="users">
						<div class="form-group input-container">
							<input type="text" name="username" required=""/>
							<label>Username</label>
						</div>
						<div class="form-group input-container">
							<input type="text" name="email" required=""/>
							<label>Email</label>
						</div>
						<div class="form-group ">
							<label>Job Hunter Profile Picture</label>
							<input type="file" name="image" class="form-control-file" required=""/>
							<hr style="background-color:#000; margin-top:2px;">
						</div>
						<div class="form-group input-container">
							<input type="password" name="password" required=""/>
							<label>Password</label>
						</div>
						<div class="form-group input-container">
							<input type="password" name="password2" required=""/>
							<label>Confirm Password</label>
						</div>
						<h5 style="font-size:.8rem;">Already a member? <span><a href="/views/forms/login.php" style="color: #108be4;">Sign In</a></span></h5>
						<button class="btn btn-lg btn-block text-white" style="background-color: #108be4;">Sign Up</button>
					</form>	
				</div>
			</div>
			<div class="col-lg-6 p-0">
				<img src="/../assets/img/sign_up1.jpg" class="img-fluid d-none d-lg-block" style="max-height: 113.5%; width: auto">
			</div>							
		</div>
	</div>

<?php }
require '../../layout.php';
?>

