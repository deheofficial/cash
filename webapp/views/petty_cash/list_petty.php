<?php 

$userid = get_cookie('_userID');

$department = getData ("user_department", "users", "user_id", $userid);
$user_group = getData ("user_group", "users", "user_id", $userid);

// echo $department;exit;


if ($user_group == 3) {
  $result = getDataResultSQL("
  (SELECT * FROM petty WHERE petty_department = $department AND status = 1) 
  UNION 
  (SELECT * FROM petty WHERE petty_user_id = $userid) 
  ORDER BY petty_id DESC");
} 
elseif ($user_group == 4 ) {
  $result = getDataResultSQL("
  (SELECT * FROM petty WHERE status = 2) 
  UNION 
  (SELECT * FROM petty WHERE petty_user_id = $userid) 
  ORDER BY petty_id DESC");
} 
else {
  $result = getDataResultSQL("SELECT * FROM petty WHERE petty_user_id = $userid ORDER BY petty_id DESC");
}



?>

<div class="col-lg-12">

<div class="card">

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
  <?php } elseif($success==3){ ?>
    <div class="alert alert-success" id="success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Well done!</strong> Your data have successfully update.
    </div>
  <?php } ?>


              
              <!-- /.card-header -->
              <div class="card-body">

                <div align="right">
                <a class="btn btn-dark btn-lg" href="<?= base_url() ?>index.php/petty_cash/request_petty" role="button"><span class="fa fa-edit"></span> Request New Petty Cash</a>
                <br><br></div>


                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="3%" ><center>Ref-No.</center></th>
                    <th>requester</th>
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

                    $no=1;
                    foreach ($result as $row) { 

                      if($row->date == "0000-00-00 00:00:00 " || $row->date == null)
                      {
                        $date = "";
                      }
                      else
                      {
                        $date = date("d-m-Y ", strtotime($row->date));
                      }
                    
                      $edit = "";
                      $check = "";
                      $createvoucher = "";
                      $detail = "";
                      $detail = "<a href='".base_url()."index.php/petty_cash/view_petty/".base64_encode($row->petty_id)."' class='btn btn-secondary btn-xs'><i class='fa fa-eye' aria-hidden='true'></i></a>";

                      if($user_group == 2 && $row->status == '1') {
                          $edit = "<a href='".base_url()."index.php/petty_cash/update_petty/".base64_encode($row->petty_id)."' class='btn btn-secondary btn-xs'><i class='fa fa-pen' aria-hidden='true'></i></a>";
                      }
                       elseif ($user_group == 3) {
                          $check = "<a href='".base_url()."index.php/petty_cash/check_petty/".base64_encode($row->petty_id)."' class='btn btn-secondary btn-xs'><i class='fa fa-check' aria-hidden='true'></i></a>";
                      }  elseif ($user_group == 4) {
                        $createvoucher = "<a href='" . base_url() . "index.php/petty_cash/create_pettyvoucher/" . base64_encode($row->petty_id) . "' class='btn btn-secondary btn-xs'><i class='fa fa-plus' aria-hidden='true'></i> voucher</a>";
                      }
                    
                      ?>


                      <tr>
                        <td align="center" style="vertical-align: middle;"><?=$no?>.</td>
                        <td style="vertical-align: middle;"><?=strtoupper(getData("user_fname","users","user_id",$row->petty_user_id))?></td>
                        <td style="vertical-align: middle;"><?=$date?></td>
                        <td style="vertical-align: middle;"><?=strtoupper(getData("project_name","category","project_id",$row->category))?></td>
                        <td style="vertical-align: middle;"><?=strtoupper($row->cash)?></td>
                        <td style="vertical-align: middle;"><?=(getData("status_desc","statuspc","status_id",$row->status))?></td>
                        <td style="vertical-align: middle;"><?=strtoupper(getData("company_name2","company","company_id",$row->company))?></td>
                        <td style="vertical-align: middle;"><?=$detail . " " . $check. " " . $edit. " " .$createvoucher  ?></td>
                        
                      </tr>

                    <?php $no++; } ?>
                  
                  
                </table>
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