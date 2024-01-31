
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12 blog-pull-left">
           
<!---single course item-->


<?php 
  
  print_r($links);


  if(count($courses)==0)
    echo "<center><h3> You haven't created any resources<h3></center>";


foreach ($courses as $lesson){ 



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
                <h4 class="text-theme-color-blue"> 
                Category: <?php echo $lesson->class; ?></h4>
                <p>
                  <?php echo substr($lesson->description,0,430); ?>...
                </p>
                <a class="btn btn-dark btn-theme-color-red btn-sm text-uppercase mt-10 pull-right" <?php echo $link; ?> >View / Edit</a>
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