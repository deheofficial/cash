<script type="text/javascript">
  setTimeout(function() {
    $('#success').slideUp('slow');
  }, 3000); // <-- time in milliseconds
</script>
<?php echo form_open_multipart(base_url()."index.php/cash_advance/save_ca/"); ?>
<div class="panel-body">
        <?php if($success==1){ ?>
          <div class="alert alert-danger" id="success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Oh snap!</strong> Change a few things up and try submitting again.
          </div>
        <?php } elseif($success==2){ ?>
          <div class="alert alert-success" id="success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Well done!</strong> Your data have successfully saved.
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
                        <label for="company_ca">Company</label>
                        <input type="text" class="form-control" name="company_ca" id="user_company" value="<?= ucfirst(getData("company_name2", "company ", "company_id", getData("user_company", "users", "user_id", get_cookie('_userID')))) ?>" autocomplete="off" readonly>
                      </div>
                      
                  </div>

                  <div class="form-group">
                    <label for="purpose_ca">Purpose</label>
                    <textarea id="purpose_ca" class="form-control" name="purpose_ca" rows="3" style="resize: none;"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="company">Company</label>
                    <?php $options = getData4ListBox("company", array(), array(), array('company_name', 'ASC'), 'company_id', 'company_name');
                          echo form_dropdown('company_ca',$options,$this->input->post('company_ca')?$this->input->post('company_ca'):$result->company_ca, 'class="form-control" ');?>
                  </div>

                  <div class="form-group">
                    <label for="category">Category</label>
                    <?php $options = getData4ListBox("category", array(), array(), array('project_name', 'ASC'), 'project_id', 'project_name');
                          echo form_dropdown('project_ca',$options,$this->input->post('project_ca')?$this->input->post('project_ca'):$result->category, 'class="form-control" ');?>
                  </div>

                  <div class="form-group">
                    <label for="cash_ca">Cash Amount</label>
                    <input type="text" class="form-control" name="cash_ca" id="cash_ca" value="<?=$result->cash_ca?>" autocomplete="off">
                  </div>
                  
                
             
                <div class="card-footer" align="right">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

          </div>
          </div>

  
<?php echo form_close(); ?>

</div>
