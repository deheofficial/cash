<?php 

$userid = get_cookie('_userID');

$department = getData ("user_department", "users", "user_id", $userid);
$user_group = getData ("user_group", "users", "user_id", $userid);
$result = getDataResultSQL("SELECT * FROM petty WHERE petty_user_id = $userid ORDER BY petty_id DESC");
$petty = getData ("petty_id", "petty", "petty_user_id", $petty_id);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher Form</title>
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

        .table td input[type="text"], .table td select {
            max-width: 200px; 
        }

        #addButton {
            margin-top: 10px;
            text-align: center;
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
</head>
<body>

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

            <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <h3 class="card-title">Voucher Form</h3>
              </div>
           
          
              <div class="card-body">
              <div class="row">
                  
                      
                  </div>

                  <div class="form-group">
                    <label for="petty_nature_payment">Nature Of Payment</label>
                    <input type="text" id="petty_nature_payment" class="form-control" name="petty_nature_payment" rows="1" style="resize: none;" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label for="petty_payment_by">Payment by</label>
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
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

          </div>
          </div>
            
            <div class="col-md-12">
            <div class="card card-primary">
            <div class="card-header">
                    
            </div>
           
                  <div class="card-body">

    <?php echo form_open('voucher/submit'); ?>
    <table id="example1" class="table table-bordered table-striped">
                  
        <tr>
            <td>Reference Number</td>
            <td><input type="text" name="petty_reference_number" value="<?php echo $reference_number; ?>"disabled></td>        
        </tr>
        <tr>
            <td>Payment by</td>
            <td>
                <select name="petty_payment_by">
                    <option value="1">Cash</option>
                    <option value="2">Bank Transfer</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nature of payment</td>
            <td>
                <select name="petty_nature_of_payment">
                    <option value="1">Check</option>
                    <option value="2">Cash</option>
                    <option value="3">Credit Card</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Voucher Details</td>
            <td>
                <div id="voucherDetails">
                    <input type="text" name="petty_voucher_details[]">
                </div>
                <button type="button" onclick="addVoucherDetail()">Add another detail</button>
            </td>
        </tr>
        <tr>
            <td>Acc No.</td>
            <td><input type="text" name="petty_acc_no"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="petty_description"></td>
        </tr>
        <tr>
            <td>Tax</td>
            <td><input type="text" name="petty_tax"></td>
        </tr>
        <tr>
            <td>Amount (RM)</td>
            <td><input type="text" name="petty_amount_rm"></td>
        </tr>
        <tr>
            <td>Remarks</td>
            <td><input type="text" name="petty_remarks" maxlength="100"></td>
        </tr>
    </table>
    <div class="card-footer" align="right">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
    <?php echo form_close(); ?>
    <script>
        function addVoucherDetail() {
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'petty_voucher_details[]';
            document.getElementById('voucherDetails').appendChild(input);
        }
    </script>
</body>
</html>
