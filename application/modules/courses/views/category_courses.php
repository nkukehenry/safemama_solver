


    <!-- Section: Course gird -->
    <section>
      <div class="container">
        <div class="row">

  

   <div class="widget" style="padding-left: 10%;padding-right: 10%;">


         <?php 

         $noresults='';

         if(count($courses)==0){

            $noresults= "<h2>No Courses in this Category</h2>";
          }

          else{
          ?>


    <h3>Category:  <?php echo $courses[0]->category; ?></h3>

    <?php }  ?>

    
           <div class="search-form">
                  <form method='get' action="<?php echo base_url(); ?>courses/searchCourses">
                    <div class="input-group">
                      <input type="text" placeholder="Search here" name="term" class="form-control search-input">
                      <span class="input-group-btn">
                      <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
                      </span>
                    </div>
                  </form>
                </div>
    </div>



      <?php foreach ($courses as $lesson){ 

     //avails or disavails course details page
              
             $userdata=$this->session->userdata();

                if($userdata['user_id']){
            //if loggedin

             $link='href="courses/courseDetails/'.$lesson->course_id.'"'; 
             
                }
                
                else{

              $link='href="#"  data-toggle="modal" data-target="#login"'; //if not loggedin
              
                }

              ?>  

         <a <?php echo $link; ?> >
          <div class="col-sm-6 col-md-4">
            <div class="item">
              <div class="campaign bg-white maxwidth500 mb-30">
                <div class="thumb">

                  <?php if($lesson->cover_image){ ?>

                  <center><img src="<?php echo base_url(); ?>assets/images/course/<?php echo $lesson->cover_image; ?>" alt="" class="img-fullwidth"></center>

                  <?php } else {  // if no cover_image?>
                  
                  <img src="<?php echo base_url(); ?>assets/images/course/course.png" alt="" class="img-fullwidth" style="max-width: 200px;">

                  <?php }  ?>

                  <div class="campaign-overlay"></div>
                </div>
                <div class="course-details clearfix p-20 pt-15">
                  <h3 class="mt-0"><a class="text-theme-color-red" <?php echo $link; ?> ><?php echo $lesson->title; ?></a></h3>
                  <ul class="review_text list-inline">
                    <li>
                      <div class="star-rating" title="Rated 5.00 out of 5"><span data-width="100%">5.00</span></div>
                    </li>
                  </ul>
                  </center>
                  <p><?php echo $lesson->description; ?><a class="text-theme-colored ml-5" href="courses/courseDetails/<?php echo $lesson->course_id; ?>"> →</a></p>
                  <div class="course-details-bottom mt-15">
                    <ul class="list-inline">
                     <li><?php echo $lesson->subject; ?></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
</a>

             <?php } ?>

        </div>


          <center>   
            <?php 
          echo $links;

          echo $noresults;

           ?>
             
           </center>

         




      </div>
    </section>

