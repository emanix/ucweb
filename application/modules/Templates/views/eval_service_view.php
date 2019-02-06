<?php $this->load->view($header_view); ?>
<!-- course details -->
	<div class="details-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Credential
				<span class="font-weight-bold">Evaluation</span>
			</h3>

			<div class="row inner_sec_info pt-md-4">
				<!-- left side -->
				<div class="col-lg-6 about_right">
					<div class="single-left1">
						<?php echo $service_detail; ?>
					</div>
				</div>
				<!-- //left side -->
				<!-- right side -->
				<div class="col-lg-6 event-right mt-lg-0 mt-sm-5 mt-4">
					<div class="event-right1">
						<div class="categories my-4 p-4 border">
							<h3 class="blog-title text-dark">Evaluation Categories</h3>
							<ul>
								<?php echo $category; ?>
							</ul>
						</div>
					</div>
				</div>
				<!-- //right side -->
				<div class="col-lg-8 single-left">
					<div class="single-left1" id="cate">
						
					</div>
				</div>
			</div>
			<div class="row news-grids-w3l pt-md-4 about_right">
				<?php echo $categories; ?>
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