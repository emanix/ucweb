<?php $this->load->view($header_view); ?>
<!-- course details -->
	<div class="details-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Credential
				<span class="font-weight-bold">Evaluation Pricing</span>
			</h3>

			<div class="row inner_sec_info pt-md-4">
				<!-- left side 
				<div class="col-lg-8 single-left">
					<div class="single-left1">
						<?php echo $service_detail; ?>
					</div>
				</div>
				 //left side -->
				<!-- right side -->
				<div class="col-lg-6 event-right mt-lg-0 mt-sm-5 mt-4">
					<div class="event-right1">
						<div class="categories my-4 p-4 border">
							<h3 class="blog-title text-dark">Course-by-Course Evaluation</h3><br>
							<table class="table table-borderless">
								<?php echo $course_price_table; ?>
							</table>						
						
							<h3 class="blog-title text-dark">Course-by-Course Rush Evaluation</h3><br>
							<table class="table table-borderless">
								<?php echo $rush_course_price_table; ?>
							</table>						
						</div>
					</div>
				</div>
				<div class="col-lg-6 event-right mt-lg-0 mt-sm-5 mt-4">
					<div class="event-right1">
						<div class="categories my-4 p-4 border">
							<h3 class="blog-title text-dark">Document-by-Document Evaluation</h3><br>
							<table class="table table-borderless">
								<?php echo $document_price_table; ?>
							</table>

							<h3 class="blog-title text-dark">Document-by-Document Rush Evaluation</h3><br>
							<table class="table table-borderless">
								<?php echo $rush_document_price_table; ?>
							</table>						
						</div>
					</div>
				</div>
				<!-- //right side 
				<div class="col-lg-8 single-left">
					<div class="single-left1" id="cate">
						
					</div>
				</div>-->
			</div>
			<!--
			<div class="row news-grids-w3l pt-md-4">
				<?php echo $categories; ?>
			</div>-->
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