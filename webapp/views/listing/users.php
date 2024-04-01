<script type="text/javascript">
    $(document).ready(function(){
        grabAjax("listUsers","<?= base_url() ?>index.php/listing/getUsers/0/0/0/")
    });
</script>
<?php 

$user_group=getData("user_group","users","user_id",$this->session->userdata("uId"));



?>

<script type="text/javascript">
  setTimeout(function() {
    $('#success').slideUp('slow');
  }, 3000); // <-- time in milliseconds
</script>

<style>
/* Default style for table columns */
@media screen and (orientation: portrait) {
  /* Hide columns other than Bil, Name, and Email when in portrait orientation */
  .table th, .table td {
    display: none;
  }
  .table th:nth-child(1),
  .table td:nth-child(1),
  .table th:nth-child(2),
  .table td:nth-child(2),
  .table th:nth-child(3),
  .table td:nth-child(3) {
    display: table-cell;
  }
}

/* Additional styles for landscape orientation */
@media screen and (orientation: landscape) {
  /* Show all table columns when in landscape orientation */
  .table th, .table td {
    display: table-cell;
  }
}
</style>


<div >
	<table border="0" > 
                
            <tr>    
                <td>Name</td>
                <td width="5%" align="center">:</td>
                <td>
                
                <input type="text" class="form-control" autocomplete="off" onkeyup="grabAjax('listUsers','<?php echo base_url() ?>index.php/listing/getUsers/'+btoa(this.value)+'/name/')" >
                </td>

                <td>&nbsp;&nbsp;&nbsp;</td>
 
        
                
              
           <td>&nbsp;&nbsp;&nbsp;</td> 
                
 
        
                <td>User Role</td>
                <td width="5%" align="center">:</td>
                <td>
                
                <?php 
                $department=getData4Listbox("user_group", array(array('grp_status',1)), '', array('grp_name', 'ASC'),'grp_id', 'grp_name');
                echo form_dropdown('department',$department,'',"class='form-control' onchange=\"grabAjax('listUsers','".base_url()."index.php/listing/getUsers/'+this.value+'/role/')\"") ?> 
                </td>
                
                
                
              
            </tr>
            
                
        </table>
        <br>

        <div class="form-group" align="right" style="<?php //echo @$cssstyle; ?>">

			<?//=$print?>

		</div>


		<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->

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
                    
            <div class="card card-primary">
              <div class="card-header">
              </div>
           
                  <div class="card-body">

                    


		<table class="table table-hover">
			<thead>
				<tr >
					<th style="vertical-align: middle;" width="3%"><center>Bil </center></th>
					<th style="vertical-align: middle;"><center>Name</center></th>
					<th style="vertical-align: middle;"><center>Email</center></th>
					<th style="vertical-align: middle;" ><center>Phone Number</center></th>
					
          <th style="vertical-align: middle;"><center>Company</center></th>
					
          <th style="vertical-align: middle;"><center>User Role</center></th>
					
					<th style="vertical-align: middle;"><center>Active Status</center></th>
				
					<th colspan="3" style="vertical-align: middle;"><center>Action</center></th>
				</tr>
			</thead>
		    <tbody id="listUsers">

		    </tbody>
		</table>
		</div>
		</div>
		</div>
	
</div>
<!-- / Info table -->
