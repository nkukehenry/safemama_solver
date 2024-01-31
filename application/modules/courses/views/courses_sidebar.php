          <div class="col-md-3">

            <div class="sidebar sidebar-left mt-sm-30">
              <div class="widget">
                <h3 class="widget-title line-bottom">Search <span class="text-theme-color-red">Resources</span></h3>
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
              <div class="widget">

                <h3 class="widget-title line-bottom">
                  <?php if(!empty($this->session->userdata()['class_id'])):
                      echo 'Recommended';
                    else:
                      'Other';
                    endif;
                   ?>
                  

                  <span class="text-theme-color-red">Resources</span></h3>
                <div class="latest-posts">

                  <?php 

$latestcourses=Modules::run('courses/featuredCourses',10,0);

//print_r($latestcourses);
//10 IS THE LIMIT

foreach ($latestcourses as $lesson) {


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

              ?>  


                  <a <?php echo $link; ?> >
                  <!---single latest course item-->
                  <article class="post media-post clearfix pb-0 mb-10" style="border-bottom: grey 1px dotted;">
                    <a class="post-thumb" <?php echo $link; ?> >

                      <?php if($lesson->cover_image){ ?>
                      <img src="<?php echo base_url(); ?>assets/images/course/<?php echo $lesson->cover_image; ?>" alt="" style="max-width: 50px;">

                      <?php } elseif(!$lesson->cover_image){ ?>
                      <img src="<?php echo base_url(); ?>assets/images/course/course.png" style="max-width: 50px;" alt="">

                      <?php } ?>

                    </a>
                    <div class="post-right">
                      <h3 class="post-title mt-0" style="font-size: 12pt;"><a <?php echo $link; ?> ><?php echo $lesson->title; ?></a></h3>
                      <p><?php echo substr($lesson->description, 0,90); ?>...</p>
                    </div>
                  </article>
                </a>
                  <!---single latest course item-->

                  <?php 

                } ?>
                  
                </div>
              </div>
             
           
            </div>
          </div>
<!---sidebar ends here-->
