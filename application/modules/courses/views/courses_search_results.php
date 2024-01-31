

<?php

 include('course_styles.php');
?>
    <!-- Section: Course gird -->
    <section>
      <div class="container">
        <div class="row">

  <?php

   $search_term="";

   $results =count($courses);  //number of results

  if($term){

    $search_term=$term; 
  }


  ?>

   <div class="widget" style="padding-left: 10%;padding-right: 10%;">

    <h3>
      
     Search Results for 
     <b class="text-theme-color-red"><?php echo $search_term; ?></b>

     <b class="text-theme-color-sky" style="font-size: 12pt;">: <?php echo $results; ?> result(s) from search</b>
   </h3>
           <div class="search-form">
                  <form method='get' action="<?php echo base_url(); ?>courses/searchCourses" style="background-color: #fff;">
                    <div class="input-group">
                      <input type="text" placeholder="Search here" name="term" class="form-control search-input" value="<?php echo $search_term; ?>" style="font-size: 15pt;">
                      <span class="input-group-btn">
                      <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
                      </span>
                    </div>
                  </form>
                </div>
    </div>



<div class='container' >
  <div class='blog-posts'>
    <div class='row cf'>
     
  <?php foreach ($courses as $lesson):

//avails or disavails course details page
              
             $userdata=$this->session->userdata();

            if($userdata['user_id']){
            //if loggedin

             $link='href="'.base_url().'courses/courseDetails/'.$lesson->course_id.'"'; 
                }
                else{

              $link='href="#"  data-toggle="modal" data-target="#login"'; //if not loggedin
              
                }
                
                  $link='href="'.base_url().'courses/courseDetails/'.$lesson->course_id.'"'; 
                  
                  $image ="course.png";
                 if($lesson->cover_image){ 

                    $image =$lesson->cover_image;
                 }
             
              ?>  

       
      <div class='post post2'>
        <a <?php echo $link; ?>>
          <div class='image'  style='background-image: url(<?php echo base_url(); ?>assets/images/course/<?=$image?>)'>
            <div class='time'>
              <div class='date' >
                <?php echo $lesson->subject; ?>
              </div>
            </div>
          </div>
          <div class='content' style="padding-bottom: 10px;">
            <h3><?php echo $lesson->title; ?></h3>
            <p><?php echo Modules::run('utility/truncate',trim($lesson->description),80); ?></p>
            <div class='meta'>
              <div class='icon-comment'>
                <a <?php echo $link; ?> class="btn btn-success btn-outline text-white">
                  Start Learning
                </a>
              </div>
            </div>
          </div>
        </a>
      </div>
   

  <?php endforeach; ?>

      </div>
      </div>
      </div>

      <center>   
            <?php 
          echo $links;

          echo $noresults;

           ?>
             
           </center>



      </div>
    </section>

