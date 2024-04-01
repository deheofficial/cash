<script type="text/javascript">  
<?php
if($this->uri->segment(3)=="update")
{
	$btn="Update";
	$cssstyle="";
}
else
{
	$btn="Submit";
	$cssstyle="display:none";
}
if($this->session->userdata("uGroup")==2)
{
	$hide="disabled";
}
?>
<script type="text/javascript">
function ShowHide() {
  if (document.getElementById('showpassword').checked) {
      document.getElementById('password').type = 'text';
  } else {
      document.getElementById('password').type = 'password';
  }
}
</script>
<script type="text/javascript">
  setTimeout(function() {
    $('#success').slideUp('slow');
  }, 3000); // <-- time in milliseconds
</script>
<?php echo form_open_multipart(base_url()."index.php/register/save_user/"); ?>
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
                    <label for="name">Name <font color=#ff0000>*<?php echo form_error('name');?></font></label>
                    <input type="text" class="form-control" name="name" id="name" autocomplete="off" required>
                  </div>

                  <div class="form-group">
                    <label for="staff_id">Staff Id <font color=#ff0000>*<?php echo form_error('staff_id');?></font></label>
                    <input type="text" class="form-control" name="staff_id" id="staff_id" autocomplete="off" >
                  </div>

                  <div class="form-group">
                    <label for="email">Email <font color=#ff0000>*<?php echo form_error('email');?></font></label>
                    <input type="text" class="form-control" name="email" id="email" autocomplete="off" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" name="phone" id="phone" autocomplete="off" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="position">Designation</label>
                    <input type="text" class="form-control" name="position" id="position" autocomplete="off" >
                  </div>

                  <div class="form-group">
                    <label for="user_company">Company</label>
                    <?php $options = getData4ListBox("company", array(), array(), array('company_name', 'ASC'), 'company_id', 'company_name');
                          echo form_dropdown('user_company',$options,$this->input->post('user_company')?$this->input->post('user_company'):$result->user_company, 'class="form-control" ');?>
                  </div>

                  <div class="form-group">
                    <label for="user_branch">Branch</label>
                    <?php $options = getData4ListBox("lkp_branch", array(array('branch_status',1)), '', array('branch_name', 'ASC'), 'branch_id', 'branch_name');
                          echo form_dropdown('user_branch',$options,$this->input->post('user_branch')?$this->input->post('user_branch'):$result->user_branch, 'class="form-control select2" ');?>
                  </div>

                  <div class="form-group">
                    <label for="user_department">Division</label>
                    <?php $options = getData4ListBox("lkp_department", array(array('dept_status',1)), '', array('dept_name', 'ASC'), 'dept_id', 'dept_name');
                          echo form_dropdown('user_department',$options,$this->input->post('user_department')?$this->input->post('user_department'):$result->user_department, 'class="form-control select2" ');?>
                  </div>
                  
                  <div class="form-group">
                    <label for="user_group">User Role</label>
                    <?php $options = getData4ListBox("user_group", array(array('grp_status',1)), '', array('grp_name', 'ASC'), 'grp_id', 'grp_name');
                          echo form_dropdown('user_group',$options,$this->input->post('user_group')?$this->input->post('user_group'):$result->user_group, 'class="form-control" onChange="choose(this.value)"');?>
                  </div>

                  
                  
                </div>
             
                <div class="card-footer" align="right">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

          </div>
          </div>

  
<?php echo form_close(); ?>

</div>
<script type="text/javascript">

function choose(vals)
{
  // alert(vals);
  if(vals==2)
  {
    $("#div_warehouse").show();
  }
  else
  {
    $("#div_warehouse").hide();
  }
}
</script>