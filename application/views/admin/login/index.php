<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url(); ?>dist/img/favicon.png">
  <title>FynTune | Log in</title>
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/login/fonts/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/login/css/main-layout.css">
  <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/toastr/toastr.min.css">

</head>

<body>
    <div class="wrapper">
        <div class="row no-gutters">

            <div class="col-lg-4 col-md-4 col-sm-12 col-12 padding-4">

                <div class="form-container padding-5" id="sign-in-form">
                    <div class="text-center">
                        <div class="text-primary bold-text form-header mt-4 ">
                            Sign in
                        </div>
                    </div>
                    <form class="mt-5" method="post" autocomplete="off" id="signInForm" action="<?php echo base_url('admin/Login'); ?>">
                        <div class="form-group">
                            <label class="bold-text">
                                Email ID
                            </label>
                            <input type="text" name="username"  class="email form-control h50" placeholder="Enter Email ID" required>

                        </div>
                        <div class="form-group">
                            <label class="bold-text">
                                Password
                            </label>
                            <input type="password" name="password" class="password form-control h50 grey-border" placeholder="Enter Password"
                                required>
                           <!--  <span class="float-right"><a class="text-primary cursor-pointer"
                                    onclick="openForm('forgot-password','sign-in-form','signInForm')">Forgot
                                    Password</a></span> -->
                        </div>
                           
                        <button class="btn btn-primary btn-block mt-4 h50" type="button" onclick="validateFields()">Submit</button>
                    </form>


<!--                    <div class="mt-4">
                        <div class="text-center grey-text">
                            Or
                        </div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-primary btn-block mt-3 h50"><span class="float-left"><img
                                    src="assets\images\Group 578.svg" class="align-btn-img"></span><span>Sign In With
                                Google</span></button>

                    </div>-->

                   <!--  <div class="mt-4 text-center">
                        <a class="text-primary cursor-pointer"
                           href="<?php echo base_url('admin/Login/signup'); ?>">Sign Up
                            Instead</a>
                    </div> -->
                  <!--   <div class="text-center"><small> version 1.0.2</small></div> -->
                </div>
                
            </div>

            <div class="col-lg-8 col-md-8 col-sm-12 col-12 bg-grey padding-4">
                <div class="container">
                    <div class="banner-container">
                        <div class="text-center">
                            <!-- <img src="<?php echo base_url(); ?>uploads\login\Group_145@2x.png" class="img-fluid h-60"> -->
                            <div class="mt-5">
                                <div class="banner-text bold-text">FynTune Solutions</div>
                            </div>

                            <div class="padding-5">
                                <img src="<?php echo base_url(); ?>uploads\login\banner-image.png" class="img-fluid">
                                <!-- <div class="mt-3">
                                    <span class="float-left">
                                        <img src="<?php echo base_url(); ?>uploads\login\Group_572.svg" class="icon-height pl-3"> <a
                                            href="mailto:info@theeventapp.in" target="_blank" class="black-href
                                        ">info@theeventapp.in</a>
                                    </span>
                                    <span class="float-right">
                                        <img src="<?php echo base_url(); ?>uploads\login\Group_571.svg" class="icon-height"> <a
                                            href="https://www.theeventapp.in" target="_blank" class="black-href
                                        ">theeventapp.in</a>
                                    </span>
                                </div> -->
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        </div>
    </body>
</html>
<script src="<?php echo base_url(); ?>plugins/toastr/toastr.min.js"></script>
 <?php if ($this->session->flashdata('success')) { ?>
    <script> 
        toastr.success('<?php echo $this->session->flashdata('success'); ?>')
    </script> 
<?php } elseif ($this->session->flashdata('error')) { ?>
    <script> 
        toastr.error('<?php echo $this->session->flashdata('error'); ?>')
    </script>
<?php } ?>
<script>
 base_url = "<?php echo base_url(); ?>";
function validateFields(){
    errFlag = [];
        
        $("#signInForm").find('input[required]').each(function(){
//                console.log($(this).attr('name'));
                var elementVal = $(this).val().trim();
                if(elementVal!=''){
                    $(this).css('border-color','green');
                }
                else{
                    errFlag.push(true);
                    $(this).css('border-color','red');
                }
        });
            
    if(errFlag.length>0){
            return false;
        }else {
//            return true;
            $('#signInForm').submit();
        }
}
</script>