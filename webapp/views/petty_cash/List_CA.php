<?php 
$userid = get_cookie('_userID');
$user_group = getData ("user_group", "users", "user_id", $userid);




if ($user_group == 7) {
    $result = getDataResultSQL("SELECT * FROM cashadvance where ca_status = 1"); 
  } 
elseif ($user_group == 8) {
    $result = getDataResultSQL("SELECT * FROM cashadvance where ca_status = 2"); 
} 
elseif ($user_group == 9) {
    $result = getDataResultSQL("SELECT * FROM cashadvance where ca_status = 3"); 
}
  else{
    $result = getDataResultSQL("SELECT * FROM cashadvance WHERE ca_user_id = $userid ORDER BY ca_id DESC");
  }
?>

<div class="col-lg-12">
    <div class="card">
        <?php if(isset($success) && $success == 1): ?>
            <div class="alert alert-danger" id="success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Oh snap!</strong> Change a few things up and try submitting again.
            </div>
        <?php elseif(isset($success) && $success == 2): ?>
            <div class="alert alert-success" id="success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Well done!</strong> Your data have successfully save.
            </div>
        <?php elseif(isset($success) && $success == 3): ?>
            <div class="alert alert-success" id="success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Well done!</strong> Your data have successfully updated.
            </div>
        <?php endif; ?>

        <div align="right">
            <a class="btn btn-dark btn-lg" href="<?= base_url() ?>index.php/cash_advance/request_cashadvance" role="button"><span class="fa fa-edit"></span> Request New Cash Advance</a>
            <br><br>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="3%"><center>No.</center></th>
                        <th>Requester</th>
                        <th>Request Date</th>
                        <th>Category</th>
                        <th>Cash</th>
                        <th>Status</th>  
                        <th>Company</th>                                      
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach ($result as $row):
                        if($row->ca_date == "0000-00-00 00:00:00" || $row->ca_date == null) {
                            $ca_date = "";
                        } else {
                            $ca_date = date("d-m-Y", strtotime($row->ca_date));
                        }

                        $check = "";
                        $edit = "";
                        $createvoucher = "";
                        $detail = "<a href='".base_url()."index.php/cash_advance/view_ca/".base64_encode($row->ca_id)."' class='btn btn-secondary btn-xs'><i class='fa fa-eye' aria-hidden='true'></i></a>";
                        $ca_status = getData ("ca_status", "cashadvance", "ca_id", $row->ca_id);

                        if ($user_group == 2 && $ca_status == '1') {
                            $edit = "<a href='" . base_url() . "index.php/cash_advance/update_ca/" . base64_encode($row->ca_id) . "' class='btn btn-secondary btn-xs'><i class='fa fa-pen' aria-hidden='true'></i></a>";
                        } elseif ($user_group == 7) {
                            $verify = "<a href='".base_url()."index.php/cash_advance/verify_ca/".base64_encode($row->ca_id)."' class='btn btn-secondary btn-xs'><i class='fa fa-receipt' aria-hidden='true'></i></a>";
                        } elseif ($user_group == 8) {
                            $authorise = "<a href='".base_url()."index.php/cash_advance/authorise_ca/".base64_encode($row->ca_id)."' class='btn btn-secondary btn-xs'><i class='fa fa-key' aria-hidden='true'></i></a>";
                        } elseif ($user_group == 9) {
                            $approve = "<a href='".base_url()."index.php/cash_advance/approve_ca/".base64_encode($row->ca_id)."' class='btn btn-secondary btn-xs'><i class='fa fa-check' aria-hidden='true'></i></a>";
                        }
                ?>
                    <tr>
                        <td align="center" style="vertical-align: middle;"><?= $no ?>.</td>
                        <td style="vertical-align: middle;"><?= strtoupper(getData("user_fname", "users", "user_id", $row->ca_user_id)) ?></td>
                        <td style="vertical-align: middle;"><?= $ca_date ?></td>
                        <td style="vertical-align: middle;"><?= strtoupper(getData("project_name", "category", "project_id", $row->ca_category)) ?></td>
                        <td style="vertical-align: middle;"><?= strtoupper($row->ca_cash) ?></td>
                        <td style="vertical-align: middle;"><?= getData("status_desc", "statusca", "statusca_id", $row->ca_status) ?></td>
                        <td style="vertical-align: middle;"><?= strtoupper(getData("company_name2", "company", "company_id", $row->ca_company)) ?></td>
                        <td style="vertical-align: middle;"><?= $detail . " " . $verify. " " . $edit. " " .$authorise. " " .$approve  ?></td>
                    </tr>
                    <?php $no++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
