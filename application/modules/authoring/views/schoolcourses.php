
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12 blog-pull-left">
           
<!---single course item-->



<?php 

  $userdata =$this->session->userdata();
  
  if(count($courses)==0)
    echo "<center><h3> Your school has not created any courses yet<h3></center>";

  $link ="href='#'";

foreach ($courses as $lesson){ 


   if($lesson->author_id == $userdata['user_id'])
      $link='href="'.base_url().'authoring/editCourse/'.$lesson->course_id.'"';


              ?>  

<a <?php echo $link; ?> >
            <div class="row mb-15" >
              <div class="col-sm-6 col-md-4">
                <div class="thumb"> 
                  <?php if($lesson->cover_image){ ?>
                  <img alt="Featured Image" src="<?php echo base_url(); ?>assets/images/course/<?php echo $lesson->cover_image; ?>" class="img-fullwidth" style="max-width: 300px;">
                  <?php } else {  // if no cover_image?>

                   <img alt="Featured Image" src="<?php echo base_url(); ?>assets/images/course/course.png" class="img-fullwidth" style="max-width: 300px;">

                   <?php }  ?>

                </div>
              </div>
              <div class="col-sm-6 col-md-8">
                <h3 class="mt-0 mt-sm-20"><?php echo $lesson->title; ?></h3>
                <h4 class="text-theme-color-blue"><span class="text-theme-color-red"><?php echo $lesson->subject; ?></span> Age: <?php echo $lesson->age_range ?> Years, Class: <?php echo $lesson->class; ?></h4>
                <p>
                  <?php echo $lesson->description; ?>
                  <br>By: <b><?php echo $lesson->names; ?></b>
                </p>
                <?php if($lesson->author_id == $userdata['user_id']): ?>
                <a class="btn btn-dark btn-theme-color-red btn-sm text-uppercase mt-10 pull-right" <?php echo $link; ?> >View / Edit</a>
              <?php endif; ?>
              </div>
            </div>

          </a>
<!---single course item ends here-->
            <hr>

          <?php } ?>



<!---pagination-->
     <div class="row">
          <div class="col-sm-12">
            
              <?php echo $links; ?>

          </div>
        </div>

  <!---pagnation ends here-->


          </div>



        </div>
   
      </div>
    </section>