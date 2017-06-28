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
                  <form method="POST" class="form_vertical" action = "<?php echo base_url(); ?>Gallery/updatePhoto" enctype="multipart/form-data">
                    <div class="row clearfix">
                        <div class="body">
                              <h2 class="card-inside-title">Photo Details</h2>
                              <div class="row clearfix">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <div class="form-line">
                                      <textarea rows="8" class="form-control no-resize" name="image_description"><?php echo $image_description; ?></textarea>
                                      <input type="hidden" name="gallery_id" value="<?php echo $gallery_id; ?>">
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <input type="file" name="gallery">
                          <span>
                            <label>File format:(.jpg, .png)</label>
                          </span>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>