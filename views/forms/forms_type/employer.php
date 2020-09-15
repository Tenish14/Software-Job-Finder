<?php 
session_start();
$title = "Employer Details";
function get_content() {

	?>

	<div class="container" style="font-family: 'Architects Daughter', cursive;">
		<div class="row">
			<div class="col-md-11 mx-auto px-5">
				<div class="px-5 mx-5">	
					<h5 class="text-center pt-5">Job Details</h5>
					<form method="POST" action="/routes/add_job.php" class="py-4 ">
						<div class="form-group">
							<label>Job Title</label>
							<input type="text" name="job_title" class="form-control" required=""/>
						</div>
						<div class="form-group">
							<label>Expetected Monthly Salary</label>
							<input type="text" name="salary" class="form-control" placeholder="RM 1">
					</div>
					<div class="form-group">
						<label>Work Location</label>
						<input type="text" name="location" class="form-control" placeholder="Ex.Penang,Malaysia" required=""/>
					</div>
					<div class="form-group">
						<label>Job Description</label>
						<textarea type="text" name="description" class="form-control" rows="3" onInput="handleInput(event)" required=""/></textarea>
					</div>
					<div class="form-group">
						<label>Job Responsibilities</label>
						<textarea type="text" name="respond" class="form-control" rows="3"  required=""/></textarea>
					</div>
					<div class="form-group">
						<label>Educational Level</label>
						<input type="text" name="educational" class="form-control" required=""/>
					</div>
					<div class="form-group">
						<label>Years of Experince</label>
						<input type="text" name="experience" class="form-control" required=""/>
					</div>
					<div class="form-group">
						<label>Skills</label>
						<input type="text" name="skills" class="form-control" required=""/>
					</div>
					<button class="btn btn-lg btn-block text-white" style="background-color: #108be4;">Submit</button>
				</form>	
			</div>
		</div>						
	</div>
</div>

<?php } require "../../layout.php" ?> 

