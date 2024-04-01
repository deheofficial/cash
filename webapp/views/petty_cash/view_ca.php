<?php 
$userid = get_cookie('_userID');
$user_group = getData ("user_group", "users", "user_id", $userid);
?>

<script type="text/javascript">
  setTimeout(function() {
    $('#success').slideUp('slow');
  }, 3000); // <-- time in milliseconds
</script>
<?php echo form_open_multipart(base_url()."index.php/cash_advance/save_update_ca/".$ca_id); 
?>
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
          
        <?php } 
        
        
        ?>


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
                        <input type="text" class="form-control" name="name" id="name" value="<?=ucfirst(getData("user_fname", "users", "user_id", getData("ca_user_id", "cashadvance", "ca_id", "$ca_id")))?>"  autocomplete="off" readonly>
                      </div>
        
                      <div class="col-md-3">
                        <label for="user_department">Department</label>
                        <input type="text" class="form-control" name="user_department" id="user_department" value="<?= ucfirst(getData("dept_name2", "lkp_department", "dept_id", getData("user_department", "users", "user_id", getData("ca_user_id", "cashadvance", "ca_id", "$ca_id")))) ?>" autocomplete="off" readonly>
                      </div>


                      <div class="col-md-3">
                        <label for="user_company">Company</label>
                        <input type="text" class="form-control" name="user_company" id="user_company" value="<?= ucfirst(getData("company_name2", "company", "company_id", getData("user_company", "users", "user_id", getData("ca_user_id", "cashadvance", "ca_id", "$ca_id")))) ?>" autocomplete="off" readonly>
                      </div>
                      
                  </div>

                  <div class="form-group">
                    <label for="ca_purpose">Purpose</label>
                    <textarea id="ca_purpose" class="form-control" name="ca_purpose" rows="3" style="resize: none;" readonly><?=$result->ca_purpose?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="company">Company</label>
                    <?php 
                    $company_name = getData("company_name2", "company ", "company_id", $result->ca_company);
                    echo '<input type="text" class="form-control" value="' . ucfirst($company_name) . '" readonly>'; ?>
                    <input type="hidden" name="companyname" value="<?= $result->company?>">
                    </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <?php 
                    $category_name = getData("project_name", "category", "project_id", $result->ca_category);
                    echo '<input type="text" class="form-control" value="' . ucfirst($category_name) . '" readonly>';?>
                    <input type="hidden" name="project" value="<?= $result->category ?>">
                </div>


                  <div class="form-group">
                    <label for="ca_cash">Cash Amount</label>
                    <input type="text" class="form-control" name="ca_cash" id="ca_cash" value="<?=$result->ca_cash?>" autocomplete="off" readonly> <!-- Added 'readonly' attribute -->
                  </div>
                  
                  <div class="form-group">
                    <label for="ca_remarks">Remarks</label>
                    <textarea id="ca_remarks" class="form-control" name="ca_remarks" rows="3" style="resize: none;" readonly><?=$result->ca_remarks?></textarea>
                  </div>


          </div>
          </div>

  
<?php echo form_close(); ?>

</div>
