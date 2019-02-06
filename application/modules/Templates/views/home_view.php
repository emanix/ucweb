<?php $this->load->view($header_view); ?>
<!-- about -->
	<div class="about py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Welcome to
				<span class="font-weight-bold">IITAS</span>
			</h3>
			<div class="row pt-md-4">
				<div class="col-lg-6 about_right">
					<?php echo $welcome_message; ?>
					<br>
					<div class="about_left-list">
						<ul class="list-unstyled">
							<?php echo $services_head; ?>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 left-img-agikes mt-lg-0 mt-sm-4 mt-3 text-right">
					<img src="<?php echo base_url(); ?>asset/cweb/images/ab.jpg" alt="" class="img-fluid" />

					
				</div>
			</div>
		</div>
	</div>
	<!-- //about -->

	<!-- what we do -->
	<div class="why-choose-agile py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-white text-center mb-5" style="color: #42a5f5">Our
				<span class="font-weight-bold">Services</span>
			</h3>
			<div class="row agileits-w3layouts-grid pt-md-4">
				<?php echo $services; ?>
			</div>
		</div>
	</div>
	<!-- //what we do -->

<?php $this->load->view($footer_view); ?>