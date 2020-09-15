<?php 
require_once('../models/Applicant.php');
require_once('../models/Post.php');
session_start();
$title = "View Applicants";
function get_content(){

	?>

	<h3 class="text-center pt-5"><?php echo $_SESSION['user']->companyname; ?>'s View Applicants</h3>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<table class="table text-center">
					<thead class="thead-dark">
						<th class="scope">Email</th>
						<th class="scope">Post Id</th>
						<th class="scope">Download Resume</th>
						<th class="scope">Date</th>
						<th class="scope">Status</th>
					</thead>
					<tbody>
						<?php 
						$applicants = file_get_contents('../assets/db/view_applicant.json');
						$all_applicants = json_decode($applicants, true);
						foreach(Applicant::all() as $applicant): 
							if($applicant->companyname == $_SESSION['user']->companyname): ?>
								<tr>
									<td><?php echo $applicant->email ?></td>
									<td><?php echo $applicant->applicationId ?></td>
									<td><a href="<?php echo $applicant->resume ?>" download = "<?php echo $applicant->username ?>'s Resume"><button class="btn btn-warning">Download Resume <i class="fa fa-download" aria-hidden="true"></i></button></a></td>
									<td><?php echo $applicant->datePosted ?></td>
									<td class="d-flex justify-content-center align-items-center">
									<?php if($applicant->status =="Pending"): ?>
										<form method="POST" action="/routes/accept.php?id=<?php echo $applicant->id?>" enctype="multipart/form-data">
											<button class="btn btn-success ml-5" id="accept">Accept</button>'	
										</form>
										<form method="POST" action="/routes/decline.php?id=<?php echo $applicant->id?> " enctype="multipart/form-data">
											<button class="btn btn-danger mx-3" id="declined">Decline</button>
										</form>
									<?php elseif($applicant->status == "Accept"): ?>
										<h6 class="font-weight-normal text-muted">Accepted</h6>
		
									<?php elseif($applicant->status =="Decline"): ?>
										<h6 class="font-weight-normal text-muted">Declined</h6>
									<?php endif ?>	
									
								</td>
							</tr>
						<?php endif ;endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<?php } require 'layout.php'; ?> 

