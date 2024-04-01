
<script type="text/javascript">
  setTimeout(function() {
    $('#success').slideUp('slow');
  }, 3000); // <-- time in milliseconds
</script>
<?php echo form_open_multipart(base_url()."index.php/lzs/save_update_branch/".$branch_id); ?>
<div class="panel-body">
        <?php if($success==1){ ?>
          <div class="alert alert-danger" id="success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Oh snap!</strong> Change a few things up and try submitting again.
          </div>
        <?php } elseif($success==2){ ?>
          <div class="alert alert-success" id="success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Well done!</strong> Your data have successfully save.
          </div>
        <?php } ?>


  <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
           
          
                <div class="card-body">
                  <div class="form-group">
                    <label for="branch_name">Branch Name </label>
                    <input type="text" class="form-control" name="branch_name" id="branch_name" value="<?=$result->branch_name?>" autocomplete="off" disabled>
                  </div>

                  
                  <div class="form-group">
                    <label for="branch_district">District</label>
                    <?php $options = getData4ListBox("lkp_daerah", array(array('daerah_status',1)), '', array('daerah_name', 'ASC'), 'daerah_id', 'daerah_name');
                          echo form_dropdown('branch_district',$options,$this->input->post('branch_district')?$this->input->post('branch_district'):$result->branch_daerah, 'class="form-control select2" ');?>
                  </div>


                  <div class="form-group">
                    <label for="branch_address">Address</label>
                    <textarea class="form-control" name="branch_address" style="resize: none;"><?=$result->branch_address?></textarea>
                  </div>


                  <div class="form-group">
                    <label for="fax_number">Fax Number </label>
                    <input type="text" class="form-control" name="fax_number" id="fax_number" value="<?=$result->branch_fax?>" autocomplete="off" >
                  </div>


                  <div class="form-group">
                    <label for="gps">GPS Coordinate </label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="gps_latitude" id="gps_latitude" autocomplete="off" value="<?=$result->branch_latitude?>" required >
                        <div class="input-group-append">
                          <span class="input-group-text" >latitude</span>
                        </div>
                      
                        <input type="text" class="form-control" name="gps_longitude" id="gps_longitude" autocomplete="off" value="<?=$result->branch_longitude?>" required >
                        <div class="input-group-append">
                          <span class="input-group-text" >longitude</span>
                        </div>
                      </div>
                  </div>

                  
                </div>
             
                <div class="card-footer" align="right">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>

          </div>
          </div>

  
<?php echo form_close(); ?>

</div>