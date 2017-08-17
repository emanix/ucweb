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
                  <form method="POST" class="form_vertical" action = "<?php echo base_url(); ?>Repertoire/addRepertoire" enctype="multipart/form-data">
                    <div class="row clearfix">
                        <div class="body">
                          <div class="row clearfix">
                            <div class="col-sm-6">
                              <h2 class="card-inside-title">Song Title</h2>
                              <div class="input-group">
                                <div class="form-line">
                                  <input type="text" class="form-control date" name="song_title" placeholder="Enter song title">
                                </div>
                              </div>
                            </div>
                        
                          <div class="col-sm-6">
                            <h2 class="card-inside-title">Genre</h2>
                          <div class="input-group">
                            <div class="form-line">
                              <select class="form-control show-tick" name="genre">
                                <option value="">-- Please select Genre--</option>
                                <option value="Afro Cultural">Afro Cultural</option>
                                <option value="Classical">Classical</option>
                                <option value="Gospel">Gospel</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <h2 class="card-inside-title">Choose file</h2>
                          <div class="input-group">
                              <input type="file" name="music">
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