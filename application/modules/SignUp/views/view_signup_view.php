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
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Gender</th>
                  <th>Music Quality</th>
                  <th>Part</th>
                  <th>Instrument</th>
                  <th>Denomination</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($signup_table !== "" )
                {
                   echo $signup_table;
                }
                else{
                ?>
                  <tr>
                    <td colspan="11"><center><h4>No Sign up available</h4></center></td>
                  </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="<?php echo base_url(); ?>SignUp/processSignups"><button type="button" class="btn bg-blue waves-effect">Process Signups</button></a>
        <a href="<?php echo base_url(); ?>SignUp/processSignups"><button type="button" class="btn bg-blue waves-effect">Print</button></a>
      </div>
    </div>
  </div>
</div>