<!-- DataTables -->
 <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
 <style>
     .bootstrap-switch-container{
        width: 94px !important;
     }
 </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php $organizer_breadcrumb;?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
<!--               <div class="card-header col-12">
                <div style="float:right; margin-left: 5px;">
                    <a href="<?php echo base_url('admin/organizer/create_organizer'); ?>"  class="btn btn-primary col start">
                        <i class="fas fa-plus-circle"></i>
                        <span>Create</span>
                    </a>
                </div>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="orgList" class="table table-bordered table-striped" style="width:100%;">
                  <thead>
                   <tr>
                    <th>Profile Pic</th>
                    <th>User Name</th>
                    <th>Score(High to Low)</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  
 
<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<script>

$(function () {
  
$("#orgList").DataTable({
        scrollY:"400px",
        scrollCollapse: true,
        scrollX:        true,
        "processing": true,
        "language": {
            'loadingRecords': '&nbsp;',
            'processing': 'Loading...'
        },  
        "serverSide": true,
        "ajax": "<?php echo base_url('admin/All_results/getData'); ?>",
        'serverMethod': 'post',
        "pageLength": 20,
        "columns": [
            { data: 'profile_pic' } ,
            { data: 'name' } ,
            { data: 'total_score' } ,
            { data: 'created' },
     
        ],
        "aaSorting": [[ 2, "DESC" ]],
        "columnDefs": [
//            { "orderable": false, "targets": "_all" }
             { "orderable": false,"width": "100px", "targets": 0 },
             { "orderable": false,"width": "100px", "targets": 1 },
             { "orderable": false,"width": "100px", "targets": 2 },
             { "orderable": false,"width": "100px", "targets": 3 }
            
        ],
    });
  
});

</script>


