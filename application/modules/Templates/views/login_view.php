<?php $this->load->view($header_view); ?>
<!-- breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?php echo base_url(); ?>Home">Home</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Login Form</li>
    </ol>
  </nav>
  <!-- breadcrumb -->
  <!-- //banner -->

  <!-- login -->
  <div class="login-w3ls py-5">
    <div class="container py-xl-5 py-lg-3">
      <h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Login
        <span class="font-weight-bold">now</span>
      </h3>
      <!-- content -->
      <div class="sub-main-w3 pt-md-4">
        <form action="<?php echo base_url(); ?>Login/sign_in" method="post">
          <div class="form-style-agile form-group">
            <label>
              Username
              <i class="fas fa-user"></i>
            </label>
            <input placeholder="Username" class="form-control" name="user" type="text" required="">
          </div>
          <div class="form-style-agile form-group">
            <label>
              Password
              <i class="fas fa-unlock-alt"></i>
            </label>
            <input placeholder="Password" class="form-control" name="password" type="password" required="">
          </div>
          <!-- switch -->
          <ul class="list-unstyled list-login">
            <li class="switch-agileits float-left">
              <label class="switch  text-capitalize">
                <input type="checkbox">
                <span class="slider-switch round"></span>
                keep me signed in
              </label>
            </li>
            <li class="float-right">
              <a href="#" class="text-right text-white text-capitalize">forgot password?</a>
            </li>
          </ul>
          <!-- //switch -->
          <input type="submit" value="Log In">
          <p class="text-center dont-do mt-4 text-white">Don't have an account?
            <a href="register.html" class="text-white  font-weight-bold">
              Register Now</a>
          </p>
        </form>
      </div>
      <!-- //content -->
    </div>
  </div>
  <!-- //login -->

  <!-- brands -->
  <div class="brands-w3ls py-md-5 py-4">
    <div class="container py-xl-3">
      <ul class="list-unstyled">
        <li>
          <i class="fab fa-supple"></i>
        </li>
        <li>
          <i class="fab fa-angrycreative"></i>
        </li>
        <li>
          <i class="fab fa-aviato"></i>
        </li>
        <li>
          <i class="fab fa-aws"></i>
        </li>
        <li>
          <i class="fab fa-cpanel"></i>
        </li>
        <li>
          <i class="fab fa-hooli"></i>
        </li>
        <li>
          <i class="fab fa-node"></i>
        </li>
      </ul>
    </div>
  </div>
  <!-- //brands -->
  <?php $this->load->view($footer_view); ?>