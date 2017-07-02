<!DOCTYPE html>
<html lang="en">
<head>
<title>Unity Chorale Nigeria |</title>
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
<link href="<?php echo base_url(); ?>assets/dist_web/css/JiSlider.css" rel="stylesheet"> 
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist_web/css/flexslider.css" type="text/css" media="screen" property="" />

<link href="<?php echo base_url(); ?>assets/dist_web/css/style.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist_web/css/flexslider.css" type="text/css" media="screen" property="" />
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
					<li><i class="fa fa-phone" aria-hidden="true"></i>+234 706 463 7363, +234 703 084 6612</li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@unitychoraleng.org">info@unitychoraleng.org</a></li>
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
							<li class="menu__item menu__item--current"><a href="<?php echo base_url(); ?>Home" class="menu__link">Home</a></li>
							<li class="menu__item"><a href="<?php echo base_url(); ?>AboutUs" class="menu__link">About Us</a></li>
							<li class="menu__item"><a href="<?php echo base_url(); ?>Gallery" class="menu__link">Gallery</a></li>
							<li class="menu__item"><a href="<?php echo base_url(); ?>ContactUs" class="menu__link">Contact Us</a></li>
						</ul>
						<div class="w3_agileits_search">
							<ul class="social_agileinfo">
								<li><a href="#" class="w3_facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="w3_twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="w3_instagram"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#" class="w3_google"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</nav>
				</div>
			</nav>
		</div>
</div>
<!-- banner -->
	<div class="banner-silder">
	<!--Slider delay time is set at 6 seconds-->
		<div id="JiSlider" class="jislider">
			<ul>
				<?php echo $bannerSlider; ?>
			</ul>
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
							<form action="<?php echo base_url(); ?>SignIn/addSignin" method="post">
								<input type="text" name="email" placeholder="E-mail" required="">
								<input type="password" name="password" placeholder="Password" required="">
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
								<input type="text" name="fname" placeholder="Enter your first name" required>
								<input type="text" name="lname" placeholder="Enter your Surname" required>
								<input type="email" name="email" placeholder="Email" required="">
								<input type="text" name="phone" placeholder="Phone number" required>
								<select style="width: 100%" name="gender" require>
									<option>Select Gender</option>
									<option>Male</option>
									<option>Female</option>
								</select>
								<select style="width: 100%" name="part" require>
									<option>Select Part</option>
									<option>Soprano</option>
									<option>Alto</option>
									<option>Tenor</option>
									<option>Baritone</option>
									<option>Bass</option>
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

<!-- banner-bottom -->
	<div class="blog" id="blog">
		<div class="container">
		
		<h3 class="w3l_header w3_agileits_header">Welcome</h3>
			<div class="agile_inner_w3ls-grids">
	
				<div class="w3-agile-post-grids">
					<div class="col-sm-7 w3-agile-post-info">
						<?php echo $welcome_message; ?>
					</div>
					<div class="col-sm-5 w3-agile-post-img w3-agile-post-img1" style="/*background: url(<?php echo base_url(); ?>assets/dist_web/images/ucoregun.jpg);*/">
						<iframe width="420" height="315" src="https://www.youtube.com/embed/t_iPSXNtX6M" frameborder="0" allowfullscreen></iframe>
						<br><br><br><br>
						<div class="eventtb">
							<h2 class="w3l_header w3_agileits_header">Upcoming Events</h2><br>
							<table class="table">
								<tbody>
									<?php echo $events_table; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //banner-bottom -->

	<!-- services -->
	<div class="services" id="services">
		<div class="container">
		<h3 class="w3l_header w3_agileits_header two">Our <span>Services</span></h3>
			<div class="agile_inner_w3ls-grids two">
				<?php echo $services; ?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //services -->
<!-- 		
	<div class="testimonials">
		<div class="col-md-6 w3layouts_event_left">
			<img src="<?php echo base_url(); ?>assets/dist_web/images/ghana.jpg" alt="UnityChorale" class="img-responsive" />
		</div>
		<div class="col-md-6 w3layouts_event_right">
			<h2 class="w3l_header w3_agileits_header">Upcoming Events</h2><br>
			<table class="table">
				<tbody>
					<?php echo $events_table; ?>
				</tbody>
			</table>
		</div>
		<div class="clearfix"> </div>
	</div>
  -->	

<!-- footer -->
	<div class="footer">
	<div class="f-bg-w3l">
		<div class="container">
			<div class="col-md-4 w3layouts_footer_grid">
				<h2>Follow <span>Us</span></h2>
				<ul class="social_agileinfo">
					<li><a href="#" id="w3_facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#" id="w3_twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#" id="w3_instagram"><i class="fa fa-instagram"></i></a></li>
					<li><a href="#" id="w3_google"><i class="fa fa-google-plus"></i></a></li>
				</ul>
			</div>
			<div class="col-md-8 w3layouts_footer_grid">
				<form action="#" method="post">
					<input type="email" name="Email" placeholder="Email..." required="">
					<input type="submit" value="">
				</form>
				<ul class="w3l_footer_nav">
					<li><a href="<?php echo base_url(); ?>Home" class="active">Home</a></li>
					<li><a href="<?php echo base_url(); ?>AboutUs">About Us</a></li>
					<li><a href="<?php echo base_url(); ?>Gallery">Gallery</a></li>
					<li><a href="<?php echo base_url(); ?>ContactUs">Contact Us</a></li>
				</ul>
				<p>© 2017 UnityChorale. All Rights Reserved | Design by <i>emanixWEB Consult.</i></p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //footer -->
<!-- start-smoth-scrolling -->
<!-- js -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dist_web/js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="<?php echo base_url(); ?>assets/dist_web/js/JiSlider.js"></script>
<script>
			$(window).load(function () {
				$('#JiSlider').JiSlider({color: '#fff', start: 3, reverse: true}).addClass('ff')
			})
		</script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- stats -->
	<script src="<?php echo base_url(); ?>assets/dist_web/js/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/dist_web/js/jquery.countup.js"></script>
		<script>
			$('.counter').countUp();
		</script>
<!-- //stats -->
<!-- //footer -->
<!-- flexSlider -->
	<script defer src="<?php echo base_url(); ?>assets/dist_web/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
  </script>
<!-- //flexSlider -->


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
<!-- start-smoth-scrolling -->
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