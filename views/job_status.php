<?php 
require_once('../models/Applicant.php');
require_once('../models/Post.php');
session_start();
$title = "Job Status";
function get_content(){
	?>
	<h3 class="text-center pt-5">Job Status</h3>
	<div class="container my-5" >

		<div class="container">
			<div class="row">
				<div class="col-md-12">  
					<table class="table text_center">
						<thead class="thead-dark">
							<th>Job Name</th>
							<th>Company Name</th>
							<th>Date Applied</th>
							<th>Job Status</th>
						</thead>
						<tbody>
							<?php 
							foreach(Applicant::all() as $applicant): 
							foreach(Post::all() as $post): 
								if(($applicant->username == $_SESSION['user']->username) && ($post->id == $applicant->applicationId)): ?>
									<tr>
										<td><?php echo $post->job_title; ?></td>
										<td><?php echo $post->company; ?></td>
										<td><?php echo $applicant->datePosted; ?></td>
										<td>Your job application <span class="font-weight-bold"><?php echo $applicant->status; ?></span></td>
									</tr>
								<?php endif ?>
									<?php endforeach ?>
									<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>


			<?php } require 'layout.php'; ?> 