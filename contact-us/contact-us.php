<?php
 session_start();
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Contact Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../fontawesome/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="css/style.css">

	<style>
		.btn-brand {
    background-color: rgb(0, 48, 73);
    color: #fff;
		}

		.btn-brand:hover {
				color: #fff;
				background-color: #092032;
		}

		.btn {
				padding: 9px 24px;
				font-weight: 500;
		}
	</style>
	</head>
	<body>
	<div class="container-main container-fluid position-relative p-0">
		<header class="navigation fixed-top">
			<div class="contact-info d-md-flex d-none flex-row container mx-auto py-2 justify-content-between">
					<div class="left d-flex flex-row col-auto ">
							<p class="mx-2 my-0">
									<i class="fa-solid fa-envelope"></i>
									<span>info@studentInn.co.za</span>
							</p>
							<p class="mx-2 my-0">
									<i class="fa-solid fa-phone"></i>
									<span>0634348671</span>
							</p>
					</div>
					<div class="right col-auto">
							<div class="social-links">
									<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
									<a href="#"><i class="fa-brands fa-twitter"></i></a>
									<a href="#"><i class="fa-brands fa-linkedin"></i></a>
							</div>
					</div>
			</div>
			<nav class="navbar navbar-expand-lg navbar-light bg-white ">
					<div class="container mh-50 overflow-auto">
							<a class="navbar-brand" href="../index.php">
									<img src="../img/Studentinn.png" alt="logo" width="60px" height="60px" />
							</a>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
									aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarNav">
									<ul class="navbar-nav ms-auto">

											<li class="nav-item">
													<a class="nav-link" href="../index.php">Home</a>
											</li>
											<li class="nav-item">
													<a class="nav-link" href="admin.php">About</a>
											</li>
											<li class="nav-item">
													<a class="nav-link" href="student-profile.php">Recruiter</a>
											</li>
											<li class="nav-item">
													<a class="nav-link" href="">Rooms</a>
											</li>
											<li class="nav-item">
													<a class="nav-link" href="">Contact Us</a>
											</li>
											<?php

													if(isset($_SESSION['email'])){

															?>

																	 <li class="nav-item">
																			<a class="nav-link" href="../login.php"><i class="fa-solid fa-user-large"></i>My Account</a>
																	</li>

																	 <a href="../server/logout.php" class="btn btn-brand ms-lg-3">Logout</a>
																	</ul>
															<?php
													}else{
															?>

																	<a href="../login.php" class="btn btn-brand ms-lg-3">Login</a>
																	</ul>
															<?php
													}
											?>
										 
							</div>
					</div>
			</nav>
	</header>
	</div>
	<section class="ftco-section img bg-hero" style="background-image: url(images/bg-6.jpg);">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-11">
					<div class="wrapper">
						<div class="row no-gutters justify-content-between">
							<div class="col-lg-6 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-5">
									<h3 class="mb-4">Contact us</h3>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p><span>Website</span> <a href="#">yoursite.com</a></p>
					          </div>
				          </div>
			          </div>
							</div>
							<div class="col-lg-5">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Get in touch</h3>
									<div id="form-message-warning" class="mb-4"></div> 
				      		<div id="form-message-success" class="mb-4">
				            Your message was sent, thank you!
				      		</div>
									<form method="POST" id="contactForm" name="contactForm">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="name" id="name" placeholder="Name">
												</div>
											</div>
											<div class="col-md-12"> 
												<div class="form-group">
													<input type="email" class="form-control" name="email" id="email" placeholder="Email">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="message" class="form-control" id="message" cols="30" rows="5" placeholder="Message"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Send Message" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  <script src="./js/jquery.validate.min.js"></script>
  <script src="./js/main.js"></script>

	</body>
</html>

