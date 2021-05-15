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
                <form id="addQuiz" method="post" action="<?php echo base_url();?>admin/Mcq_test/SubmitQuiz" enctype="multipart/form-data">
               <?php  foreach ($quiz_data as $key => $value) { 
                  $key++;

                  $option_array=$value->incorrect_answers;
                  array_push($option_array,$value->correct_answer);

                ?>

              <div class="alert alert-secondary" style="margin-top: 1rem;margin-left: 10px;margin-right: 10px;">
                   <span style="color: gold;"> <?php echo 'Q.'.$key; ?> </span> <?php echo $value->question; ?>
                   <input type="hidden" name="question[]" class="form-control" value="<?php echo $value->question; ?>">
              </div>
                        
                         <ul class="libox">
                        <?php foreach ($option_array as $opkey => $option) { ?>
                            
                         <!--  <li class="list-group-item d-flex flex-row">  
                             <span class="pmd-list-title"><?php echo $option; ?></span>
                            </li>  -->
                            <input type="hidden" name="correct_answer_<?php echo $key;?>" class="form-control" value="<?php echo $value->correct_answer; ?>">
                            <div class="row">
                                <div class="col-md-1" style="margin-top: 5px;">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="radio_<?php echo $key.'_'.$opkey;?>" value="<?php echo $opkey; ?>" name="radio_<?php echo $key;?>">
                                        <label for="radio_<?php echo $key.'_'.$opkey;?>" class="custom-control-label"></label>
                                    </div>
                                </div>
                                <div class="col-md-11" style="margin-left: -60px;">
                                    <input type="text" name="option_<?php echo $key;?>[]" class="form-control option" data="<?php echo $key.'_'.$opkey;?>" value="<?php echo $option; ?>">
                                    
                                </div>
                            </div>
                            <br>

                         <?php } ?>
                         </ul>



                <?php }?>
                <div class="card-footer">
                    <center>
                      <button type="submit" class="btn btn-dark px-50">Submit</button>
                    </center>
                </div>
              </form>
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

  