<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url(); ?>dist/img/favicon.png">
  <title>FynTune</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/toastr/toastr.min.css">
  <!-- jQuery -->
<!--  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/demo-files/demo.css">-->
  <style>
    .icon {
        font-size: 22px;
        padding-right: 6px;
      }
  </style>
<!--   <style>
    :root {
    --bg-web:url('<?php //echo $webBG; ?>');
    --bg-mobile:url('<?php //echo $mobileBG; ?>');
    }
   </style>-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/demo-files/style.css">

  <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
  <script>var base_url = "<?php echo base_url(); ?>";</script>
 <!--  <script>var s3_url = "<?php //echo ROOT_PATH; ?>"; </script> -->
  <script>
//  $(document).ready(function(){
//                /** add active class and stay opened when selected */
//                var url = window.location;
//                alert(url);
//                // for sidebar menu entirely but not cover treeview
//                $('.nav-sidebar a').filter(function() {
//                     return this.href == url;
//                }).parent().addClass('active');
//
//                // for treeview
////                $('ul.treeview-menu a').filter(function() {
////                     return this.href == url;
////                }).parentsUntil(".nav-sidebar > .treeview-menu").addClass('active');
//            });

$(function () {
//        var currentLocation = window.location;
        var currentLocation1 = document.URL;
        
        $(".nav-sidebar a").each(function (i, l) {
            currentLocation1 = currentLocation1.replace(/\/\//g, "/");
            var url = $(this).attr('href').replace(/\/\//g, "/");
//            console.log(currentLocation1.trim()+" --- "+url);
            if (currentLocation1.trim() == url) {
                $(this).addClass('active');
//               var x = $(this).parent().addClass('mjkjdsjksj');
                var x = $(this).parent().hasClass('menu-active');
                if (x) {
//                   alert('TRUE');
                    $(this).parent().addClass('menu-open');
                } else {
                    $(this).addClass('active2');
                    $(this).closest('ul .treeview-menu').css("display", "block");
//                   $(this).parent().parent().parent('li').css("background-color", "black");
                    $(this).parent().parent().parent('li').addClass('menu-open');
//                   alert('FALSE');
                }
            } else {
//                console.log('<br> Not <br>');
            }
        });
    });
</script>
</head>
<style>
	.sidebar-mini .brand-icon{
		display:none;
	}
	.sidebar-mini.sidebar-collapse .brand-icon{
		display:block;
	}	
	.sidebar-mini.sidebar-collapse .main-sidebar:hover .brand-icon{
		display:none;
	}
    .brand-link .brand-image {
		margin-top: 5px !important;
    }
	.brand-link{
		padding: 0.25rem .5rem;
	}
</style>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
		
        <li class="nav-item">
          <a class="nav-link" title="Logout" href="<?php echo base_url(); ?>admin/login/logout">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>" class="brand-link">
	<span class="brand-icon"> 
      <img src="<?php echo base_url(); ?>uploads/admin_logo/the_event_app_logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
	</span>  
      <span class="brand-text font-weight-light">      
        <img style = "margin-left: 12px;" src="<?php echo base_url(); ?>uploads/admin_logo/banner-image.png" alt="AdminLTE Logo" >
      </span>
    </a>
    
    <!--<div class="text-center"></div>-->
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>uploads/admin_users/<?php echo $this->session->userdata('profile_picture');?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">
                <?php echo $this->session->userdata('user_name');?>
            </a>
        </div>
        
      </div>
      

      
      <?php 
      // $eventCount = checkEventExist($this->session->userdata('organizer_id'));
//      display($eventCount);
      ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <?php if ($this->session->userdata('organizer_type') == "SU") { ?>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/All_results'); ?>" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Results
                  </p>
                </a>
            </li>

          <?php }else{?>
          
              <li class="nav-item">
                  
                  <a href="<?php echo base_url('admin/Mcq_test'); ?>" class="nav-link">
                  
                    <i class="icon-Quiz icon"></i>
                    <p>
                      MCQ Test
                    </p>
                  </a>
              </li>
          <?php }?> -->
            
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      
    </div>
   
    <!-- /.sidebar -->
  </aside>
  
