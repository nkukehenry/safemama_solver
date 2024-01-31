
<?php

 include('course_styles.php');

   $myschool = Modules::run('classes/getSchools',$this->session->userdata()['school_id']);
   

?>
    <!-- Section: Course gird -->
    <section style="padding-left: 7px; padding-right: 7px;">
      <div class="container">
        <div class="row">

          <center>
           <h4><?=$myschool->schoolname;?></h4>

           <br>
         </center>

   <div class="widget" style="padding-left: 10%;padding-right: 10%;">


         <?php 

         $noresults='';

       
         if(count($courses)==0){

            $noresults= "<h2>Your school has not added courses yet</h2><br> <a class='btn btn-lg btn-default' href='".base_url()."courses'> View all courses</a>";
          }

          else{
          ?>


    <h3>Courses  by <?php echo $myschool->schoolname; ?></h3>

    <?php }  ?>

    
           <div class="search-form" style="background-color: #fff;">
                  <form method='get' action="<?php echo base_url(); ?>courses/searchCourses">
                    <div class="input-group">
                      <input type="text" name="term" placeholder="Search other courses here" class="form-control search-input">
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

             $mycourses =$userdata['mycourses'];

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

       
      <div class='post post3'>
        <a <?php echo $link; ?>>
          <div class='image'  style='background-image: url(<?php echo base_url(); ?>assets/images/course/<?=$image?>)'>
            <div class='time'>
              <div class='date'>
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
                    <?php 
                 if(in_array($lesson->course_id,$mycourses )):
                  echo 'Continue';
                  else:
                    echo 'Start Learning';
                   endif ; 
                   ?>
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

