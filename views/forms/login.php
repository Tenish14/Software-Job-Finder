<?php 
$title = "Login";
function get_content(){
	?>
	<div class="container-fluid" style="font-family: 'Architects Daughter', cursive;">
		<div class="row">
			<div class="col-lg-6 px-5">
				<div class="px-5">	
					<div class="w-100 d-flex justify-content-center">
						<img src="/../assets/img/logo/job_finder.png" style="max-height:6rem; width: auto;" class="img-fluid">
					</div>
					<h5 class="text-center">Welcome back to Job Finder.</h5>
					<form method="POST" action="/routes/login.php">
						<div class="form-group input-container">
							<input type="text" name="email" required=""/>
							<label>Email</label>
						</div>
						<div class="form-group input-container">
							<input type="password" name="password" required=""/>
							<label>Password</label>
						</div>
						<input type="checkbox"> <label>Remember in this device</label>
						<h5 style="font-size:.8rem;">New here? <span><a href="#" data-toggle="modal" data-target="#exampleModalCenter" style="color: #108be4;">Create a new account</a></span></h5>
						<button class="btn btn-lg btn-block text-white" style="background-color: #108be4;">Login</button>
					</form>	
				</div>
			</div>
			<div class="col-lg-6 p-0">
				<img src="/../assets/img/login_page.jpg" class="img-fluid d-none d-lg-block" style="max-height: 113.5%; width: 100%">
			</div>							
		</div>
	</div>

<?php }
require '../layout.php';
?>