<?php
// include("./includes/conn.php");


session_start();

if (isset($_SESSION['UserId']))
{
	if ($_SESSION['UserType'] == 'Transporter') {
		header('Location: Transporter.php');
		exit();
	}
	if ($_SESSION['UserType'] == 'User') {
		header('Location: User.php');
		exit();
	}
}


include("includes/header.php");
?>
<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<!-- <div class="text-center my-5">
						<img src="" width="100">
					</div> -->
					<div class="text-center my-5">
						<!-- <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100"> -->
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
							<!-- <form method="POST" class="needs-validation" novalidate="" autocomplete="off"> -->
                            <form action="php_action/submit-login.php" method="post">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail Address</label>
									<input type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password</label>
									</div>
									<input type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>
								
								<div class="d-flex align-items-center">
									Select User Type : 
									<input type="radio" name="type" value="User" checked />User
									<input type="radio" name="type" value="Transporter" />Transporter
								</div>

								<div class="d-flex align-items-center">
									<button type="submit" class="btn btn-primary ms-auto">
										Login
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Don't have an account? <a href="register.php" class="text-dark">Create One</a>
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