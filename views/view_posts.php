<?php 	
require_once('../models/Post.php');
session_start();
$title = "My Posts";
function get_content(){

	?>

	<h2 class="text-center pt-5"><?php echo $_SESSION['user']->companyname; ?>'s Job Post</h2>
	<div class="container my-5" >
		<?php foreach(Post::all() as $post): ?>
			<?php if($post->company == $_SESSION['user']->companyname): ?>
				<div class="card mb-3 py-5" >
					<div class="row ">
						<div class="col-lg-3 mx-3">
							<img src="<?php echo $post->company_image; ?> "alt="Company Picture" class="img-fluid w-100">
						</div>
						<div class="col-lg-7">
							<div class="card-body py-0">
								<small class="float-right">Post Id: <?php echo $post->id ?></small>
								<h3><?php echo $post->job_title ?></h3>
								<h5 class="text-muted">Company name :<?php echo $post->company ?></h5>
								<h5>Salary : <?php echo $post->salary ?></h5 >
								<h5>Job Description :</h5>
								<p><?php echo '<ul><li class= ml-5>' . implode('</li><li class="ml-5">', explode("\n", $post->description)) . '</li></ul>' ?></p>
								<h5>Job Responsibilties :</h5>
								<p><?php echo '<ul><li class="ml-5">' . implode('</li><li class="ml-5">', explode("\n", $post->respond)) . '</li></ul>' ?></p>
								<h6 class="font-weight-normal">Skills : <?php echo $post->skills ?></h6 >
								<h6 class="font-weight-normal">Experience : <?php echo $post->experience ?></h6 >
								<h6 class="font-weight-normal">Location : <?php echo $post->location ?></h6 >
								<h6 class="font-weight-normal">Date Posted : <?php echo $post->datePosted ?></h6>
							</div>
							<div class="float-right">
								<button class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal<?php echo $post->id;?>">Edit Job Details</button>
								<a href="/routes/delete_posts.php?id=<?php echo $post->id;?>" class="btn btn-outline-danger">Delete</a>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="exampleModal<?php echo $post->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Edit Job Details</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form method="POST" action="/routes/edit_posts.php?id=<?php echo $post->id ?>" class="py-4 ">
										<div class="form-group">
											<label>Job Title</label>
											<input type="text" name="job_title" class="form-control" required=""/ value="<?php echo $post->job_title; ?>">
										</div>
										<div class="form-group">
											<label>Expetected Monthly Salary</label>
											<input type="text" name="salary" class="form-control" value="<?php echo $post->salary; ?>">
										</div>
										<div class="form-group">
											<label>Work Location</label>
											<input type="text" name="location" class="form-control" required=""/ value="<?php echo $post->location; ?>">
										</div>
										<div class="form-group">
											<label>Job Description</label>
											<textarea type="text" name="description" class="form-control" rows="3" onInput="handleInput(event)" required=""/ value="<?php echo $post->description; ?>"></textarea>
										</div>
										<div class="form-group">
											<label>Job Responsibilities</label>
											<textarea type="text" name="respond" class="form-control" rows="3"  required=""/ value="<?php echo $post->respond; ?>"></textarea>
										</div>
										<div class="form-group">
											<label>Educational Level</label>
											<input type="text" name="educational" class="form-control" required=""/ value="<?php echo $post->educational; ?>">
										</div>
										<div class="form-group">
											<label>Years of Experince</label>
											<input type="text" name="experience" class="form-control" required=""/ value="<?php echo $post->experience; ?>">
										</div>
										<div class="form-group">
											<label>Skills</label>
											<input type="text" name="skills" class="form-control" required=""/ value="<?php echo $post->skills; ?>">
										</div>
									</div>
									<div class="modal-footer">
										<button  class="btn btn-primary">Save changes</button>
										<button  class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</form>	
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>
		<?php endforeach ?>	
				
				
				



		<?php } require 'layout.php';?>