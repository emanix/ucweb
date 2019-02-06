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
                  <form method="POST" class="form_vertical" action = "<?php echo base_url(); ?>AboutUs/editTeam" enctype="multipart/form-data">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <div class="form-group">
                            <div class="form-line">
                              <label>Officers Name</label>
                              <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                              <input type="hidden" class="form-control" name="id" value="<?php echo $teamid; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <div class="form-group">
                            <div class="form-line">
                              <label>Google Account</label>
                              <input type="text" class="form-control" name="google" value="<?php echo $google; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <div class="form-group">
                            <div class="form-line">
                              <label>Facebook Account</label>
                              <input type="text" class="form-control" name="facebook" value="<?php echo $facebook; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <div class="form-group">
                            <div class="form-line">
                              <label>Twitter Account</label>
                              <input type="text" class="form-control" name="twitter" value="<?php echo $twitter; ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <input type="file" name="team">
                          <span>
                            <label>File format:(.jpg, .png), Dimension: 260 x 342</label>
                          </span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>