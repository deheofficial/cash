
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

<?php 

          $user_id = get_cookie('_userID');
          $user_group = get_cookie('_uGroup');

     

  ?>


<?php echo form_open_multipart(base_url()."index.php/mainpage/update_profile/".$result->user_id); ?>
<div class="panel-body">
  <div class="row">
          <!-- left column -->
          <div class="col-md-8">
        <?php if($success==1){ ?>
          <div class="alert alert-danger" id="success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Oh snap!</strong> Change a few things up and try submitting again.
          </div>
        <?php } elseif($success==2){ ?>
          <div class="alert alert-success" id="success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Well done!</strong> Your data have successfully update.
          </div>
        <?php } elseif($this->uri->segment(5)==4){ ?>
          <div class="alert alert-warning" id="warning">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Please change your password.</strong> 
          </div>
        <?php } ?>
      </div>
    </div>

          <div class="row">
          <!-- left column -->
          <div class="col-md-8">

        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
           
          
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name </label>
                    <input type="text" class="form-control" id="name" value="<?=$result->user_fname?>" autocomplete="off" placeholder="Enter Name" disabled>
                    <input type="hidden" class="form-control" name="name" id="name" value="<?=$result->user_fname?>" >
                  </div>
                  
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="<?=$result->user_phone?>" autocomplete="off" placeholder="Enter Phone Number">
                  </div>
                  <div class="form-group">
                    <label for="email">Email </label>
                    <input type="text" class="form-control" id="email" value="<?=$result->user_email?>" autocomplete="off" placeholder="Enter Email" disabled>
                    <input type="hidden" class="form-control" name="email" id="email" value="<?=$result->user_email?>" >
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="<?=$this->encrypt->decode($result->user_pass)?>" autocomplete="off" placeholder="Enter Password">
                    <input type="checkbox" id="showpassword" name="showpassword" value="on" onChange="ShowHide();">
                    <label for="showpassword"><span></span>show password</label>  
                  </div>

                    <div class="form-group">
                        <label for="user_department">Department</label>
                        <input type="text" class="form-control" name="user_department" id="user_department" value="<?= ucfirst(getData("dept_name2", "lkp_department", "dept_id", getData("user_department", "users", "user_id", get_cookie('_userID')))) ?>" autocomplete="off" readonly>
                      </div>

                      <div class="form-group">
                        <label for="user_company">Company</label>
                        <input type="text" class="form-control" name="user_company" id="user_company" value="<?= ucfirst(getData("company_name2", "company ", "company_id", getData("user_company", "users", "user_id", get_cookie('_userID')))) ?>" autocomplete="off" readonly>
                      </div>

                  <div class="form-group">
                    <label for="user_group">User Role</label>
                    <?php $options = getData4ListBox("user_group", array(array('grp_status',1)), '', array('grp_name', 'ASC'), 'grp_id', 'grp_name');
                          echo form_dropdown('user_group2',$options,$this->input->post('user_group')?$this->input->post('user_group'):$result->user_group, 'class="form-control " disabled  ');?>
                          <input type="hidden" name="user_group" value="<?=$result->user_group?>">
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

<script>
function openPrompt(urls) {
  // alert(urls);
  var r = confirm("Are you sure?");
  if (r == true) {
    window.location.replace(urls);
  } else {
    return false;
  }
}
</script>