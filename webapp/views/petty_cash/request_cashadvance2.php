<style type="text/css">

    table.cn {

        counter-reset: rowCounter;

        border-collapse: collapse;

    }



    .cn tr td:first-child {

        counter-increment: rowCounter;



    }



    .cn td:not(.nocount):first-child::before {

        content: counter(rowCounter)".";

        margin: 0 0.5em 0 0;

        padding: 0 0.5em;

        color: #000;

    }





    .cn td{


        padding: 0.2em 0.4em;

        cursor: pointer;

    }



</style>
<script type="text/javascript">



    var counter = 2;

    function tambah_tr_ca(ids, urls) {

        // alert(ids+" "+urls);

        $(".trparent_ca").first().clone()

                .find("input:text")

                .val("")

                .end()

                .find("input:hidden")

                .val("")

                .end()

                .find("textarea")

                .val("")

                .end()

                .find("#img_add")

                .replaceWith("<a onclick='deleteRow(this);counter--;'  style='cursor:pointer'><span class='fa fa-minus' aria-hidden='true'></span></a>")

                .end()

                .appendTo(".trchild_ca");



        counter++;

    }

</script>
<script type="text/javascript">
  setTimeout(function() {
    $('#success').slideUp('slow');
  }, 3000); // <-- time in milliseconds
</script>
<?php echo form_open_multipart(base_url()."index.php/ca_cash/save_ca/"); ?>
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
                        <label for="user_company">Company</label>
                        <input type="text" class="form-control" name="user_company" id="user_company" value="<?= ucfirst(getData("company_name2", "company ", "company_id", getData("user_company", "users", "user_id", get_cookie('_userID')))) ?>" autocomplete="off" readonly>
                      </div>
              </div>
              <br>
              <div class="row">

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
                      
                </div>
                <br><br>

                <h3><strong>REQUEST DETAILS</strong></h3>


                <div class="row">
                  <div class="col-sm-12"> 
                        <div style="overflow:scroll;overflow-y:hidden;width:auto; ">

                            <table class="table table-bordered cn">

                                <thead>
                                    <tr>
                                          <th style="vertical-align: middle;" width="3%"><center>No</center></th>

                                          <th style="vertical-align: middle;" width="20%" ><center>Description</center></th>

                                          <th style="vertical-align: middle;" width="5%"><center>Amount (RM)</center></th>

                                          <th style="vertical-align: middle;" width="3%"><center>Action</center></th>

                                    </tr>
                                </thead>

                                <tr class="trparent_ca">
                                          <td  style="vertical-align: middle;"id="bil" align="center"></td>

                                          <td style="vertical-align: middle;"><input type="text" class="form-control" autocomplete="off" name="description[]" id="description" required></td>

                                          <td style="vertical-align: middle;"><input type="text" class="form-control" autocomplete="off" name="amount[]" id="amount" required></td>

                                          <td align="center" style="vertical-align: middle;"> <a id="img_add" onclick="tambah_tr_ca('<?php echo base_url(); ?>')" style="cursor:pointer"><span class="fa fa-plus" aria-hidden="true"></span></a></td>

                                </tr>

                                <tbody class="trchild_ca"></tbody>      

                            </table>
                        </div>

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
