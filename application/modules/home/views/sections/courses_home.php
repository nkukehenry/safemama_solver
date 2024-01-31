
<?php 

$courses=Modules::run('courses/fetchCourses',6,0);


//6 IS THE LIMIT

?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/flexcards.css">

    <style>
    
    
    .mycard {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
      width: 31.5%;
      float:left;
      margin:5px;
      display:inline-block;
    }
    
    .mycard:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    
    .mycontainer {
      padding: 2px 16px;
      padding-bottom:20px;
    }

    @media (max-width: 768px) {
            .row{
                
                padding:10px;
            }
            
            
            .mycard {
                width:100%;
            }
        }
        

</style>

<!-- Section: Our Courses -->
    <section class="bg-white" data-bg-img="">
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="line-bottom-center mt-0">Latest <span class="text-theme-color-red">Classes</span></h2>
              <div class="title-flaticon">
                <i class="flaticon-charity-alms"></i>
              </div><!-- 
              <h4>Explore a comprehensive list of knowledge rich courses<br> tailored for every child!</h4> -->
            </div>
          </div>
        </div>
        <div class="section-content">
            

          
            <div class="container">
            	<div class="flexcards">
            	    
            	    <?php foreach ($courses as $lesson){ 
             
             $userdata=$this->session->userdata();

                if($userdata['user_id']){
            //if loggedin

             $link='href="courses/courseDetails/'.$lesson->course_id.'"'; 
             
                }
                
                else{

              $link='href="#"  data-toggle="modal" data-target="#login"'; //if not loggedin
              
                }
                
                $img= base_url().'assets/images/course/course.png';
               if($lesson->cover_image)
                  $img= base_url().'assets/images/course/'.$lesson->cover_image;
                  
              ?>  
       
            	    
            		<a <?php echo $link; ?>  class="flexcard" >
            			<span class="flexcard-header" style="background-image: url(<?php echo $img; ?>); background-position:center;">
            				<span class="flexcard-title ">
            					<h3 class="text-white" style="text-transform:capitalize;">
            					    <?php echo $lesson->title; ?>
            					 </h3>
            				</span>
            			</span>
            			<span class="flexcard-summary">
            			    <?php echo $lesson->description; ?>
            			</span>
            		
            		</a>
            		<!---single course item ends here-->
          <?php } ?>
            
            	</div>
            </div>
        


<!---pagination-->
     <div class="row">
          <div class="col-sm-12">
            
              <?php echo $links; ?>

          </div>
        </div>
        
        
          
         
        </div>
      </div>
    </section>


    
