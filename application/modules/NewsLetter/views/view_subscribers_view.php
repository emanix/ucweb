<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2><?php echo $page_title; ?></h2>
      </div>
        <?php if (isset($_SESSION['failed'])) {?>
            <div class="alert alert-warning">
                <?php  echo $_SESSION['failed'];?>
            </div>
        <?php } ?>

        <?php if (isset($_SESSION['successful'])) {?>
            <div class="alert alert-success">
                <?php  echo $_SESSION['successful'];?>
            </div>
        <?php } ?>

        <?php if (validation_errors() !="") {?>
            <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
            </div>
        <?php } ?>
      <div class="body">
      <form action="<?php echo base_url(); ?>Newsletter/sendNewsToCheck" method="post">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <div class="demo-checkbox">
            <thead>
                <tr>
                  <th></th>
                  <th>Serial Number</th>
                  <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($subscription_table !== "" )
                {
                   echo $subscription_table;
                }
                else{
                ?>
                  <tr>
                    <td colspan="3"><center><h4>No subscriber available</h4></center></td>
                  </tr>
                <?php } ?>
            </tbody>
        </div>
        </table><br>
        <button type="submit" class="btn bg-blue waves-effect"><i class='material-icons'>send</i>  Send Newsletter</button>
      </form>
      </div>
    </div>
  </div>
</div>