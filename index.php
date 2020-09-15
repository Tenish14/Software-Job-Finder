<?php 
session_start();
$title = "Home";
require_once('./models/Post.php');
require_once('./models/Applicant.php');
function get_content() {
	?>

	<h3 class="text-center py-3"style="font-family: 'Kite One', sans-serif;">Avaliable Jobs</h3>
	<div class="container my-5" >
		<?php foreach(Post::all() as $key => $post): ?>
			<?php global $id ?>
			<div class="card mb-2 py-5" >
				<div class="row ">
					<div class="col-lg-4 mx-3">
						<img src="<?php echo $post->company_image; ?> "alt="Company Picture" class="img-fluid w-100">
					</div>
					<div class="col-lg-6 ">
						<div class="card-body py-0">
							<h3><?php echo $post->job_title ?></h3>
							<h5 class="text-muted">Company name :<?php echo $post->company ?></h5>
							<h5>Salary : <?php echo $post->salary ?></h5 >
							<h5>Job Description :</h5>
							<p><?php echo '<ul><li class= ml-5>' . implode('</li><li class="ml-5">', explode("\n", $post->description)) . '</li></ul>' ?></p>
							<h5>Job Responsibilties :</h5>
							<p><?php echo '<ul><li class="ml-5">' . implode('</li><li class="ml-5">', explode("\n", $post->respond)) . '</li></ul>' ?></p>
							<h6 class="font-weight-normal">Educational : <?php echo $post->educational ?></h6 >
							<h6 class="font-weight-normal">Skills : <?php echo $post->skills ?></h6 >
							<h6 class="font-weight-normal">Experience : <?php echo $post->experience ?></h6 >
							<h6 class="font-weight-normal">Location : <?php echo $post->location ?></h6 >
							<small>Date Posted : <?php echo $post->datePosted ?></small>
							<?php if(!isset($_SESSION['user'])): ?>
								<?php elseif($_SESSION['user']->isEmployer == false): ?>
									<div class="float-right">
										<button class="btn btn-info" data-toggle="modal" data-target="#hireMe<?php echo $post->id;?>">Hire Me</button>
									</div>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="hireMe<?php echo $post->id;?>" tabindex="-1" aria-labelledby="hireMe" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Insert Resume</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						 <?php echo $post->company; ?>
						<form method="POST" action="/routes/view_applicants.php?id=<?php echo $post->id; ?>"class="py-4" enctype="multipart/form-data">	
							<h4 class="font-weight-normal">Insert the following information in your resume.</h4>
							<ol class="pl-3">
								<small><li>Add a job description to the top half of the first page on your resume</li></small>
								<small><li>Include a suitable amount of relevant experiences</li></small>
								<small><li>Begin each description with essential information about the job and company</li></small>
								<small><li>Emphasize accomplishments over work duties</li></small>
								<small><li>Use action-benefit statements to describe your achievements</li></small>
								<small><li>Quantify your achievements</li></small>
								<small><li>Be honest</li></small>
								<small><li>Tailor your content to the position</li></small>
								<small><li>Make it easily readable</li></small>
							</ol>
							<div class="form-group">
								<label>Upload Your Resume</label>
								<input type="file" name="resume" class="form-control" required=""/>
							</div>
							<div class="form-group d-none">
								<label>Upload Your Resume</label>
								<input type="text" name="companyname" value="<?php echo $_SESSION['employer']['companyname'] ?>" class="form-control" required=""/>
							</div>
							<div class="form-group d-none">
								<label>Upload Your Resume</label>
								<input type="text" name="companyname" value="<?php echo post::all()[$key]->company ?>" class="form-control" required=""/>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-success">Submit Resume</button>
							<button class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
			<?php endforeach ?>	
		</div>
		
			<?php }
	require 'views/layout.php';
	?>

