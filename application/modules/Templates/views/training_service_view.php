<?php $this->load->view($header_view); ?>
<!-- course details -->
	<div class="details-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Translation Certification
				<span class="font-weight-bold">Training Services</span>
			</h3>

			<div class="row inner_sec_info pt-md-4">
				<!-- left side -->
				<div class="col-lg-12 about_right">
					<div class="single-left1">
						<?php echo $service_detail; ?>
					</div>
				</div>
				<!-- //left side -->
				<!-- right side -->
				
			</div>
			
		</div>
	</div>
	<!-- //course details -->
	<script type="text/javascript">
    function view_category(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "<?php echo base_url(); ?>Services/view_stcategory?stcat="+document.getElementById("catey").value, false);
        xmlhttp.send(null);
        document.getElementById("cate").innerHTML=xmlhttp.responseText;
    }

    function choose_rhour(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "<?php echo base_url(); ?>Services/get_rush_hour?hour="+document.getElementById("cat").value, false);
        xmlhttp.send(null);
        document.getElementById("rhour").innerHTML=xmlhttp.responseText;
    }
</script>
	<?php $this->load->view($footer_view); ?>