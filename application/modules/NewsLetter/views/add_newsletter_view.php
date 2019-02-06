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
                  <form method="POST" class="form_vertical" action = "<?php echo base_url(); ?>Newsletter/addNewsletter" enctype="multipart/form-data">
                    <div class="row clearfix">
                        <div class="body">
                          <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              <h2 class="card-inside-title">Newsletter Title</h2>
                              <div class="input-group">
                                <div class="form-line">
                                  <input type="text" class="form-control date" name="newsletter_title" placeholder="Enter Newsletter title">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                              <b>Issue Date</b>
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                  <input type="text" class="form-control date" name="date" placeholder="Ex: 30/07/2016">
                                </div>
                              </div>
                            </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <h2 class="card-inside-title">Choose file</h2>
                          <div class="input-group">
                              <input type="file" name="newsletter">
                              <span>
                                <label>File format:(.pdf)</label>
                              </span>
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="input-group">
                            <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect"><i class="material-icons">cloud_upload</i>  Upload</button>
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