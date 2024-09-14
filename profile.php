<?php
// $Id = $_REQUEST['Id'];
include("includes/header.php");
?>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Fill up Profile</h1>
							<form action="./php_action/submit-profile.php" method="post">
								<!-- <input type="hidden" name="Id" value="$Id"> -->

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Enter Name</label>
									<input id="FullName" type="text" class="form-control" name="FullName" placeholder="Enter Full name" required>
								</div>
								
								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Address</label>
									<input id="Address" type="text" class="form-control" name="Address" placeholder="Enter Address" required>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Mobile Number</label>
									<input id="MobileNumber" type="text" class="form-control" name="MobileNumber" placeholder="Enter Mobile Number" required>
								</div>

								<div class="align-items-center d-flex">
									<button type="submit" class="btn btn-primary ms-auto">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

      
<?php

include("./includes/script.php");

include("./includes/footer.php");

?>