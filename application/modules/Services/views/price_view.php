<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <?php echo $page_title; ?>
                </h2>         
            </div>
            
            <?php if (isset($_SESSION['failed'])) {?>
                <div class="alert alert-warning">
                  <?php  echo $_SESSION['failed'];?>
                </div>
                <?php } ?>

                <?php if (isset($_SESSION['success'])) {?>
                <div class="alert alert-success">
                  <?php  echo $_SESSION['success'];?>
                </div>
                <?php } ?>

                <?php if (validation_errors() !="") {?>
                <div class="alert alert-danger">
                  <?php echo validation_errors(); ?>
                </div>
              <?php } ?>
            <div class="body">
                  <form method="POST" class="form_vertical" action = "<?php echo base_url(); ?>Services/insert_service_price" enctype="multipart/form-data">
                    <div class="row clearfix">
                        <div class="col-md-4">
                          <p>
                            <b>Select Service Type</b>
                          </p>
                          <select class="form-control show-tick" id="catey" name="stname" onchange="choose_category()" required> 
                            <option>Select Service Type</option>
                                <?php echo $service_type; ?>   
                          </select>

                        </div>
                        <div class="col-md-3" id="stypes">

                        </div>
                        <div class="col-md-4" id="rhour">

                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <p>
                            <b>Enter Sercive Price</b>
                          </p>
                          <div class="form-group">
                            <div class="form-line">
                              <input type="text" class="form-control" name="price" placeholder="Enter Service Price" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <p>
                            <b>Select Currency</b>
                          </p>
                          <select class="form-control show-tick" name="currency" required> 
                            <option>Select Currency</option>
                            <option value="Naira">Naira</option>
                            <option value="CFA">CFA</option>
                            <option value="Dollar">Dollar</option>   
                          </select>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function choose_category(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "<?php echo base_url(); ?>Services/get_stcategory?stype="+document.getElementById("catey").value, false);
        xmlhttp.send(null);
        document.getElementById("stypes").innerHTML=xmlhttp.responseText;
    }

    function choose_rhour(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "<?php echo base_url(); ?>Services/get_rush_hour?hour="+document.getElementById("cat").value, false);
        xmlhttp.send(null);
        document.getElementById("rhour").innerHTML=xmlhttp.responseText;
    }
</script>