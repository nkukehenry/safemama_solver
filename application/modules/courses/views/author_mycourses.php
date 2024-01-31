
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-9 blog-pull-left">
           
<!---single course item-->

<?php 

foreach ($courses as $lesson){ 

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
                </p>
                <a class="btn btn-dark btn-theme-color-red btn-sm text-uppercase mt-10 pull-right" <?php echo $link; ?> >View details</a>
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


<!---sidebar here-->
 <?php include('courses_sidebar.php'); ?>

        </div>
   
      </div>
    </section>