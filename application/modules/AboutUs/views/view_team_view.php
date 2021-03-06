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
      	<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                  <th>Serial No</th>
                  <th>Office Title</th>
                  <th>Officers Name</th>
                  <th>Officers Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($team_table !== "" )
                {
                   echo $team_table;
                }
                else{
                ?>
                  <tr>
                    <td colspan="4"><center><h4>No Officer to display</h4></center></td>
                  </tr>
               	<?php } ?>
            </tbody>
        </table>
        </div>
    </div>
  </div>
</div>