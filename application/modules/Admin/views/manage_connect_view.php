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
                  <form method="POST" class="form_vertical" action = "<?php echo base_url(); ?>Admin/manageConnects" enctype="multipart/form-data">
                    <div class="row clearfix">
                        <div class="body">
                          <div class="row clearfix">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                              <h2 class="card-inside-title">Phone 1</h2>
                              <div class="input-group">
                                <div class="form-line">
                                  <input type="text" class="form-control date" name="phone1" value="<?php echo $phone1; ?>">
                                </div>
                              </div>
                            </div>
                        
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <h2 class="card-inside-title">Phone 2</h2>
                              <div class="input-group">
                                <div class="form-line">
                                  <input type="text" class="form-control date" name="phone2" value="<?php echo $phone2; ?>">
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <h2 class="card-inside-title">Email</h2>
                              <div class="input-group">
                                <div class="form-line">
                                  <input type="email" class="form-control email" name="email" value="<?php echo $email; ?>">
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <h2 class="card-inside-title">Facebook</h2>
                              <div class="input-group">
                                <div class="form-line">
                                  <input type="text" class="form-control" name="facebook" value="<?php echo $facebook; ?>">
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <h2 class="card-inside-title">Instagram</h2>
                              <div class="input-group">
                                <div class="form-line">
                                  <input type="text" class="form-control" name="instagram" value="<?php echo $instagram; ?>">
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <h2 class="card-inside-title">GooglePlus</h2>
                              <div class="input-group">
                                <div class="form-line">
                                  <input type="text" class="form-control" name="google" value="<?php echo $googleplus; ?>">
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <h2 class="card-inside-title">Twitter</h2>
                              <div class="input-group">
                                <div class="form-line">
                                  <input type="text" class="form-control" name="twitter" value="<?php echo $twitter; ?>">
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="input-group">
                            <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect"><i class="material-icons">update</i>  Update</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>