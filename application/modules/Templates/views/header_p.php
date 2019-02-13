<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>International Institute of Translation and Allied Services (IITAS)</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Edulearn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->
	<!-- Icon -->
	<link rel="icon" href="<?php echo base_url(); ?>asset/cweb/images/logo_iitas.ico" type="image/x-icon">
	<!-- Custom-Files -->
	<!-- Bootstrap-Core-Css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/cweb/css/bootstrap.css">
	<!-- Testimonials-Css -->
	<link href="<?php echo base_url(); ?>asset/cweb/css/mislider.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>asset/cweb/css/mislider-custom.css" rel="stylesheet" type="text/css" />
	<!-- Style-Css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/cweb/css/style.css" type="text/css" media="all" />
	<!-- Font-Awesome-Icons-Css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/cweb/css/fontawesome-all.css">
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	 rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- //Web-Fonts -->

</head>

<body>
	<!-- header -->
	<header>
		<!-- top header -->
		<div class="top-head-w3ls py-2 bg-dark">
			<div class="container">
				<div class="row">
					<h1 class="text-capitalize text-white col-7">
						<i class="fas fa-book text-dark bg-white p-2 rounded-circle mr-3"></i>welcome to IITAS</h1>
					<!-- social icons -->
					<div class="social-icons text-right col-5">
						<ul class="list-unstyled">
							<li>
								<a href="<?php echo $facebook; ?>" class="fab fa-facebook-f icon-border facebook rounded-circle"> </a>
							</li>
							<li class="mx-2">
								<a href="<?php echo $twitter; ?>" class="fab fa-twitter icon-border twitter rounded-circle"> </a>
							</li>
							<li>
								<a href="<?php echo $googleplus; ?>" class="fab fa-google-plus-g icon-border googleplus rounded-circle"> </a>
							</li>
							<li class="ml-2">
								<a href="#" class="fas fa-rss icon-border rss rounded-circle"> </a>
							</li>
						</ul>
					</div>
					<!-- //social icons -->
				</div>
			</div>
		</div>
		<!-- //top header -->
		<!-- middle header -->
		<div class="middle-w3ls-nav py-2">
			<div class="container">
				<div class="row">
					<a class="logo font-italic font-weight-bold col-lg-4 text-lg-left text-center" href="<?php echo base_url(); ?>"><img src='<?php echo base_url(); ?>asset/cweb/images/iitas.png' alt='IITAS logo' /></a>
					<div class="col-lg-8 right-info-agiles mt-lg-0 mt-sm-3 mt-1">
						<div class="row">
							<div class="col-sm-4 nav-middle">
								<i class="far fa-envelope-open text-center mr-md-4 mr-sm-2 mr-4"></i>
								<div class="agile-addresmk">
									<p>
										<span class="font-weight-bold text-dark">Mail Us</span>
										<a href="mailto:mail@example.com"><?php echo $email; ?></a>
									</p>
								</div>
							</div>
							<div class="col-sm-4 col-6 nav-middle mt-sm-0 mt-2">
								<i class="fas fa-phone-volume text-center mr-md-4 mr-sm-2 mr-4"></i>
								<div class="agile-addresmk">
									<p>
										<span class="font-weight-bold text-dark">Call Us</span>
										<?php echo $phone1; ?>
									</p>
								</div>
							</div>
							<div class="col-sm-4 col-6 top-login-butt text-right mt-sm-2">
								<a href="<?php echo base_url(); ?>Login" class="button-head-mow3 text-white">Login</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- //middle header -->
	</header>
	<!-- //header -->

	<!-- banner -->
		<!-- navigation -->
		<div class="navigation-w3ls">
			<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-nav">
				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				 aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
					<ul class="navbar-nav justify-content-center">
						<li class="nav-item active">
							<a class="nav-link text-white" href="<?php echo base_url(); ?>">Home
								<?php if($this->session->userdata('evaluation')){?>
								<span class="sr-only">(current)</span>
							<?php } ?>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Credential Evaluation
								<?php if($this->session->userdata('evaluation')){?>
								<span class="sr-only">(current)</span>
							<?php } ?>
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo base_url(); ?>Services/evaluation_services">Services <?php if($this->session->userdata('evaluation')){?>
								<span class="sr-only">(current)</span>
							<?php } ?></a>
								<a class="dropdown-item" href="<?php echo base_url(); ?>Services/display_prices">Pricing</a>
								<a class="dropdown-item" href="<?php echo base_url(); ?>Services/place_order">Steps to Order</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Translation
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo base_url(); ?>Services/translation_services/">Services <?php if($this->session->userdata('translation')){?>
								<span class="sr-only">(current)</span>
							<?php } ?></a>
								<a class="dropdown-item" href="<?php echo base_url(); ?>Services/doc_translation_prices/">Pricing</a>
								<a class="dropdown-item" href="<?php echo base_url(); ?>Services/place_order">Steps to Order</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Translation Certification Training
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo base_url(); ?>Services/training_services/">Services</a>
								<a class="dropdown-item" href="<?php echo base_url(); ?>Services/doc_translation_prices/">Pricing</a>
								<a class="dropdown-item" href="<?php echo base_url(); ?>Services/place_order">Steps to Order</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="contact.html">Contact Us</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<!-- //navigation -->
	<!-- //banner -->