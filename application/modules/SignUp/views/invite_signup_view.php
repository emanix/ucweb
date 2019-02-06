<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2><?php echo $page_title; ?></h2>
      </div>
      <form action="<?php echo base_url(); ?>SignUp/sendSignups" method="get">
        <div class="body">
          <div class="demo-masked-input">
            <div class="row clearfix">
              <div class="col-md-4">
                <b>Date</b>
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="material-icons">date_range</i>
                  </span>
                  <div class="form-line">
                    <input type="text" class="form-control date" name="date" placeholder="Ex: 30/07/2016">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <b>Set Time</b>
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="material-icons">access_time</i>
                  </span>
                  <div class="form-line">
                    <input type="time" class="form-control time12" name="time" placeholder="Ex: 11:59 pm">
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <b>Venue</b>
                <div class="input-group">
                    <select class="form-control show-tick" name="venue">
                      <option value="">-- Please select venue--</option>
                      <option value="MIT Lab EAH">MIT Lab EAH</option>
                      <option value="SAT Music Lab">SAT Music Lab</option>
                    </select>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn bg-blue waves-effect"><i class="material-icons">send</i><span> Send Invite</span></button>
        </div>
      </form>
    </div>
  </div>
</div>