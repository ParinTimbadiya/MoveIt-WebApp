<?php
// include("./includes/conn.php");


session_start();

if (isset($_SESSION['UserId'])) {
	header('Location: ./index.php');
	exit();
}

// include("../includes/header.php");
// include("../includes/header.php");
include('./includes/header.php');
// include('../includes/header.php');
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
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
							<!-- <form method="POST" class="needs-validation" novalidate="" autocomplete="off"> -->
							<form action="submit-login.php" method="post">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Username</label>
									<input type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Username is invalid
									</div>
								</div>
								
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Password</label>
									<input type="password" class="form-control" name="password" required>
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>

								<div class="d-flex align-items-center">
									<button type="submit" class="btn btn-primary ms-auto">
										Login
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php


	include('./includes/footer.php');

	?>