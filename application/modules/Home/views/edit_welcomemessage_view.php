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
                  <form method="POST" class="form_vertical" action = "<?php echo base_url(); ?>Home/updatewelcomeMessage" enctype="multipart/form-data">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header">
                                <h2>
                                    Home Page Welcome Message
                                </h2>
                            </div>
                            <div class="body">
                              <textarea id="ckeditor" name="welcome">
                                <?php echo $home_message; ?>
                              </textarea>
                              <input type="hidden" name="homeid" value="<?php echo $homeid; ?>">
                            </div>
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