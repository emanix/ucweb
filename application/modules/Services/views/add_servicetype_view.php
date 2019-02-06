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
                  <form method="POST" class="form_vertical" action = "<?php echo base_url(); ?>Services/insert_servicetype" enctype="multipart/form-data">
                    <div class="row clearfix">
                        <div class="col-md-4">
                          <p>
                            <b>Select Service group</b>
                          </p>
                          <select class="form-control show-tick" name="service_head" required> 
                            <option>Select Service</option>
                                <?php echo $services; ?>   
                            </select>

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <p>
                            <b>Service Type</b>
                          </p>
                          <div class="form-group">
                            <div class="form-line">
                              <input type="text" class="form-control" name="stname" placeholder="Enter Service Type title" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <p>
                            <b>Select Service category</b>
                          </p>
                          <select class="form-control show-tick" name="category" required> 
                            <option>Select Category</option>
                            <option value="Standard">Standard</option>
                            <option value="Rush Hour">Rush Hour</option>   
                            </select>

                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header">
                                <h2>
                                    Service Type Details
                                </h2>
                            </div>
                            <div class="body">
                              <div class="row clearfix">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <div class="form-line">
                                      <textarea rows="8" class="form-control no-resize" name="stdescription" placeholder="Enter service type description here..." required></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>