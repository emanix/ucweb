<?php $this->load->view($header_view); ?>
<!-- course details -->
	<div class="details-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Document
				<span class="font-weight-bold">Translation Pricing</span>
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
							<h3 class="blog-title text-dark">Per page Translation</h3><br>
							<table class="table table-borderless">
								<?php echo $course_price_table; ?>
							</table>						
						</div>
					</div>
				</div>
				<div class="col-lg-6 event-right mt-lg-0 mt-sm-5 mt-4">
					<div class="event-right1">
						<div class="categories my-4 p-4 border">
							<h3 class="blog-title text-dark">One Page Official Document</h3><br>
							<table class="table table-borderless">
								<thead>
					                <tr>
					                  <th>Time Frame</th>
					                  <th>Pricing</th>
					                  <th>Certification</th>
					                  <th>Notarization</th>
					                </tr>
					            </thead>
					            <tbody>
									<tr>
										<td>5 Working Days</td>
										<td><p style="color: green">$30</p></td>
										<td><p style="color: green">Yes</p></td>
										<td><p style="color: green">+$10</p></td>
									</tr>
									<tr>
										<td>3 Working Days</td>
										<td><p style="color: green">$40</p></td>
										<td><p style="color: green">Yes</p></td>
										<td><p style="color: green">+$10</p></td>
									</tr>
									<tr>
										<td>2 Working Days</td>
										<td><p style="color: green">$50</p></td>
										<td><p style="color: green">Yes</p></td>
										<td><p style="color: green">+$10</p></td>
									</tr>
									<tr>
										<td>1 Working Day</td>
										<td><p style="color: green">$70</p></td>
										<td><p style="color: green">Yes</p></td>
										<td><p style="color: green">+$10</p></td>
									</tr>
								</tbody>
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