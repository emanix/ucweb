
<!DOCTYPE html>
<html lang="en">
<head>
<title>Unity Chorale Nigeria | <?php echo $header; ?></title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Unity Chorale, Nigeria, Babcock University, Babcock, Chorale Music" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- UCicon-->
<link rel="icon" href="<?php echo base_url(); ?>assets/images/unity_choralelogo.ico" type="image/x-icon">		
<!-- //custom-theme -->
<link href="<?php echo base_url(); ?>assets/dist_web/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/dist_web/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="<?php echo base_url(); ?>assets/dist_web/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
	
<body>
<!-- banner -->
	<div class="main_section_agile">
		<div class="w3_agile_banner_top">
			<div class="agile_phone_mail">
				<ul class="agile_forms">
					<li><a class="active" href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a> </li>
					<li><a href="#" data-toggle="modal" data-target="#myModal3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up</a> </li>
				</ul>
				<ul>
					<li><i class="fa fa-phone" aria-hidden="true"></i><?php echo $phone1; ?>, <?php echo $phone2; ?></li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@unitychoraleng.org"><?php echo $email; ?></a></li>
				</ul>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="agileits_w3layouts_banner_nav">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<img src="<?php echo base_url(); ?>assets/images/unity_chorale_logo.jpg" alt="Unity Chorale logo" />
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="menu--iris">
						<ul class="nav navbar-nav menu__list">
							<li class="menu__item"><a href="<?php echo base_url(); ?>Home" class="menu__link">Home</a></li>
							<li class="menu__item"><a href="<?php echo base_url(); ?>AboutUs" class="menu__link">About Us</a></li>
							<li class="menu__item--current"><a href="<?php echo base_url(); ?>Gallery" class="menu__link">Gallery</a></li>
							<li class="menu__item"><a href="<?php echo base_url(); ?>ContactUs" class="menu__link">Contact Us</a></li>
						</ul>
						<div class="w3_agileits_search">
							<ul class="social_agileinfo">
								<li><a href="<?php echo $facebook; ?>" class="w3_facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="<?php echo $twitter; ?>" class="w3_twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="<?php echo $instagram; ?>" class="w3_instagram"><i class="fa fa-instagram"></i></a></li>
								<li><a href="<?php echo $googleplus; ?>" class="w3_google"><i class="fa fa-google-plus"></i></a></li>
							</ul>
					</nav>
				</div>
			</nav>
		</div>
</div>
	<div class="banner1">
		<div class="w3_agileits_service_banner_info">
			<h2><?php echo $header; ?></h2>
		</div>
	</div>
<!-- //banner -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
	<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div class="signin-form profile">
						<h3 class="agileinfo_sign">Sign In</h3>	
						<div class="login-form">
							<form action="<?php echo base_url(); ?>Login/sign_inUser" method="post">
								<input type="text" name="username" placeholder="Username" required>
								<input type="password" name="password" placeholder="Password" required>
								<div class="tp">
									<input type="submit" value="Sign In">
								</div>
							</form>
						</div>
						<p><a href="#" data-toggle="modal" data-target="#myModal3" > Don't have an account?</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //Modal1 -->	
<!-- Modal2 -->
	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
		<div class="modal-dialog">
<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
																	
					<div class="signin-form profile">
						<h3 class="agileinfo_sign">Sign Up</h3>	
						<div class="login-form">
							<form action="<?php echo base_url(); ?>SignUp/addSignup" method="post">
								<input type="text" name="username" placeholder="Enter your username" required>
								<input type="text" name="fname" placeholder="Enter your first name" required>
								<input type="text" name="lname" placeholder="Enter your Surname" required>
								<input type="email" name="email" placeholder="Email" required="">
								<input type="text" name="phone" placeholder="Phone number" required>
								<select style="width: 100%" name="gender" require>
									<option>Select Gender</option>
									<option>Male</option>
									<option>Female</option>
								</select>
								<label>Musical Quality</label>
								<input type="checkbox" name="vocalist" value="Vocalist"> Vocalist
  								<input type="checkbox" name="instrumentalist" value="Instrumentalist"> Instrumentalist<br> 
								<select style="width: 100%" name="part" require>
									<option>Select Vocal Part</option>
									<option>Soprano</option>
									<option>Alto</option>
									<option>Tenor</option>
									<option>Baritone</option>
									<option>Bass</option>
								</select>
								<select style="width: 100%" name="musical_skill" require>
									<option>Select Musical Skills</option>
									<option>Brass Instruments</option>
									<option>Keyboard</option>
									<option>Percursion Instuments</option>
									<option>String Instruments</option>
									<option>Woodwind Instruments</option>
								</select>
								<input type="text" name="denomination" placeholder="Enter your denomination" required>
								<input type="submit" value="Sign Up">
							</form>
						</div>
						<p><a href="#"> By clicking register, I agree to your terms</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //Modal2 -->	

	<div class="contact">
  	<div class="container">
	<h3 class="w3l_header w3_agileits_header">Our <span>Gallery</span></h3>
			<div class="inner_w3l_agile_grids-gal">
				<?php echo $gallery; ?>
				<div class="clearfix"> </div>
			</div>
		</div>	
	</div>	
	<!--//gallery-->


<!-- footer -->
	<div class="footer">
	<div class="f-bg-w3l">
		<div class="container">
			<div class="col-md-4 w3layouts_footer_grid">
				<h2>Follow <span>Us</span></h2>
				<ul class="social_agileinfo">
					<li><a href="<?php echo $facebook; ?>" id="w3_facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="<?php echo $twitter; ?>" id="w3_twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href="<?php echo $instagram; ?>" id="w3_instagram"><i class="fa fa-instagram"></i></a></li>
					<li><a href="<?php echo $googleplus; ?>" id="w3_google"><i class="fa fa-google-plus"></i></a></li>
				</ul>
			</div>
			<div class="col-md-8 w3layouts_footer_grid">
				<form action="<?php echo base_url(); ?>Users/subscribeNews" method="post">
					<input type="email" name="Email" placeholder="Enter Email to subscribe for our news letters" required="">
					<input type="submit" value="">
				</form>
				<ul class="w3l_footer_nav">
					<li><a href="<?php echo base_url(); ?>Home">Home</a></li>
					<li><a href="<?php echo base_url(); ?>AboutUs">About Us</a></li>
					<li><a class="active" href="<?php echo base_url(); ?>Gallery">Gallery</a></li>
					<li><a href="<?php echo base_url(); ?>ContactUs">Contact Us</a></li>
				</ul>
				<p>© 2017 UnityChorale. All Rights Reserved | Design by <i>emanixWEB Consult.</i></p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //footer -->
<!-- js -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist_web/js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist_web/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist_web/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smooth-scrolling -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist_web/css/swipebox.css">
				<script src="<?php echo base_url(); ?>assets/dist_web/js/jquery.swipebox.min.js"></script> 
					<script type="text/javascript">
						jQuery(function($) {
							$(".swipebox").swipebox();
						});
					</script>


<!-- for bootstrap working -->
	<script src="<?php echo base_url(); ?>assets/dist_web/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>