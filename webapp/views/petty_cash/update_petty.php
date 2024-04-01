
<script type="text/javascript">
  setTimeout(function() {
    $('#success').slideUp('slow');
  }, 3000); // <-- time in milliseconds
</script>
<?php echo form_open_multipart(base_url()."index.php/petty_cash/save_update_petty/".$petty_id); ?>
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
              <div class="row">
                  

                      <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?=ucfirst(getData("user_fname","users","user_id",get_cookie('_userID')))?>"  autocomplete="off" readonly>
                      </div>
        
                      <div class="col-md-3">
                        <label for="user_department">Department</label>
                        <input type="text" class="form-control" name="user_department" id="user_department" value="<?= ucfirst(getData("dept_name2", "lkp_department", "dept_id", getData("user_department", "users", "user_id", get_cookie('_userID')))) ?>" autocomplete="off" readonly>
                      </div>

                      <div class="col-md-3">
                        <label for="user_company">Company</label>
                        <input type="text" class="form-control" name="user_company" id="user_company" value="<?= ucfirst(getData("company_name2", "company ", "company_id", getData("user_company", "users", "user_id", get_cookie('_userID')))) ?>" autocomplete="off" readonly>
                      </div>
                      
                  </div>

                  <div class="form-group">
                    <label for="purpose">Purpose</label>
                    <textarea id="purpose" class="form-control" name="purpose" rows="3" style="resize: none;"><?=$result->purpose?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="company">Company</label>
                    <?php $options = getData4ListBox("company", array(), array(), array('company_name', 'ASC'), 'company_id', 'company_name');
                          echo form_dropdown('petty_company',$options,$this->input->post('petty_company')?$this->input->post('petty_company'):$result->company, 'class="form-control" ');?>
                  </div>

                  <div class="form-group">
                    <label for="category">Category</label>
                    <?php $options = getData4ListBox("category", array(), array(), array('project_name', 'ASC'), 'project_id', 'project_name');
                          echo form_dropdown('petty_project',$options,$this->input->post('petty_project')?$this->input->post('petty_project'):$result->category, 'class="form-control" ');?>
                  </div>

                  <div class="form-group">
                    <label for="cash">Cash Amount</label>
                    <input type="text" class="form-control" name="cash" id="cash" value="<?=$result->cash?>" autocomplete="off">
                  </div>
             
                <div class="card-footer" align="right">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>

          </div>
          </div>

  
<?php echo form_close(); ?>

</div>