<?php
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
							<h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
							<form action="./php_action/submit-registration.php" method="post">

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="Email" value="" required>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Password</label>
									<input id="password" type="password" class="form-control" name="Password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="Type">Type</label>
									<select name="Type" >
										<option value="User">User</option>
            							<option value="Transporter">Transporter</option>
									</select>
								</div>

								

								<div class="align-items-center d-flex">
									<button type="submit" class="btn btn-primary ms-auto">
										Register	
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Already have an account? <a href="login.php" class="text-dark">Login</a>
							</div>
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