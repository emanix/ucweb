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
                    <div class="row clearfix">
                        <div class="body">
                              <h2 class="card-inside-title">Message</h2>
                              <label>From: <?php echo $name; ?> (<?php echo $email; ?>)</label><br>
                              <label>Subject: <?php echo $subject; ?></label><br>
                              <label>Date Sent: <?php echo $date; ?></label><br><br>
                              <div class="row clearfix">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <div class="form-line">
                                      <textarea rows="8" class="form-control no-resize" readonly><?php echo $message; ?></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                               <div class="row clearfix">
                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <a href="<?php echo base_url(); ?>ContactUs/createMessage">
                                      <i class="material-icons">reply</i>
                                      <span>Reply</span>
                                    </a>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>