<?php 

$result = getDataResultSQL("select * from lkp_branch");

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
                <a class="btn btn-dark btn-lg" href="<?= base_url() ?>index.php/lzs/register_branch" role="button"><span class="fa fa-edit"></span> Register New Branch</a>
                <br><br></div>


                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="3%" ><center>Bil</center></th>
                    <th>Branch Name</th>
                    <th>District</th>
                    <th>Address</th>
                    <th width="9%"><center>GPS Coordinate</center></th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 

                    $no=1;
                    foreach ($result as $row) { 


                        $view = "<a href='".base_url()."index.php/lzs/update_branch/".base64_encode($row->branch_id)."' class='btn btn-secondary btn-xs'><i class='fa fa-pen' aria-hidden='true'></i></a>";


                      ?>

                      <tr>
                        <td align="center" style="vertical-align: middle;"><?=$no?>.</td>
                        <td style="vertical-align: middle;"><?=strtoupper($row->branch_name)?></td>
                        <td style="vertical-align: middle;"><?=strtoupper(getData("daerah_name","lkp_daerah","daerah_id",$row->branch_daerah))?></td>
                        <td style="vertical-align: middle;"><?=strtoupper($row->branch_address)?></td>
                        <td style="vertical-align: middle; text-align:center;">
                        	<a target="_blank" href="https://www.google.com/maps/dir/Current+Location/<?=$row->branch_latitude.",".$row->branch_longitude?>"><?=$row->branch_latitude.", ".$row->branch_longitude?></a></td>
                        <td style="vertical-align: middle;"><?=$view?></td>
                        
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