<!DOCTYPE html>
<html>
<head>
<title>Cyrilweb Admin Login Page</title>
<!-- metatags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Magnificent login form a Flat Responsive Widget,Login form widgets, Sign up Web 	forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<link href="<?php echo base_url(); ?>asset/cweb/css/style.css" rel="stylesheet" type="text/css" media="all"/><!--stylesheet-css-->
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/cweb/css/font-awesome.css"><!--fontawesome-->
<link href="//fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet"><!--online fonts-->
<link href="//fonts.googleapis.com/css?family=Raleway" rel="stylesheet"><!--online fonts-->
</head>
<body>
	<div class="w3ls-main">
		<div class="wthree-heading">
			<h1>Admin login form</h1>
		</div>
			<div class="wthree-container">
				<div class="wthree-form">
					<div >
				    <?php if (isset($_SESSION['message'])) {?>
				    <div style="color: red; font-size: 17.5px; font-weight: 500;">
				      <?php echo $_SESSION['message']; ?>
				    </div>
				    <?php } ?>
				    </div>
					<div class="agileits-2">
						<h2>login</h2>
					</div>
					<form action="<?php echo base_url(); ?>Login/sign_in" method="post">
						<div class="w3-user">
							<span><i class="fa fa-user-o" aria-hidden="true"></i></span>
							<input type="text" name="Username" placeholder="Username" required="">
						</div>
						<div class="clear"></div>
						<div class="w3-psw">
							<span><i class="fa fa-key" aria-hidden="true"></i></span>
							<input type="password" name="password" placeholder="Password" required="">
						</div>
						<div class="clear"></div>
						<div class="w3l">
							<span><a href="#">forgot password ?</a></span>  
						</div>
						<div class="clear"></div>
						<div class="w3l-submit">
							<input type="submit" value="login">
						</div>
						<div class="clear"></div>
					</form>
				</div>
			</div>
	</div>
		<div class="agileits-footer">
			<p>&copy; Cyrilweb login Form. All Rights Reserved | Design by <a href="<?php echo base_url(); ?>">EmanixWeb Consult</a></p>
		</div>
</body>
</html>