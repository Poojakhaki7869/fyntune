 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $breadcrumb;?></h1>
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

              <!-- /.card-header -->
              <div class="card-body">
                <center>
                <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                  <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>uploads/admin_users/<?php echo $this->session->userdata('profile_picture');?>" alt="User profile picture">

                    <h3 class="profile-username text-center"> <?php echo $this->session->userdata('user_name');?></h3>


                    <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        <b>Your Score : <a class="pull-right"><?php echo $total_correct; ?> of <?php echo $total_que; ?></a></b>
                      </li>
                    </ul>

                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
              </div>
              </center>
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

  