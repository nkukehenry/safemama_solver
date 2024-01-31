


    <?php 

      $course=Modules::run('courses/getCourseById',$course_id);
      $userdata=$this->session->userdata;

    ?>


    <section>


      <div class="modal modal-lg" role="document" id="pdf" style="overflow: hidden!important; min-width:100%!important;">
          <div class=" modal-dialog" style="min-width:70%!important;">
            <div class=" modal-content">
              <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><font size="15pt">&times;</font></button>
              </div>
                <div class=" modal-body">
                  <?php if(!empty($course->attachment)): ?>
                    <object data="<?=base_url()?>assets/pdfs/<?=$course->attachment?>#page=1" type="application/pdf" width="100%" height="100%">
                    <p><b>File failed to load</b>: Your browser does not support PDFs. Please download the PDF below to view it: 
                    <a href="<?=base_url()?>assets/pdfs/<?=$course->attachment?>">Download Course File</a>.</p>
                    </object>
                     <?php
                      else:
                        echo "<center><h4> No attachment</h4></center>";
                      endif; ?>
                    </div>
                </div>
          </div>
        </div>

      <div class="container">
        <div class="row">
          <div class="col-md-9 blog-pull-left">
            <div class="single-service">
          <?php 

           if(!$course->schoolOnly || ($userdata['school_id'] ==$course->school_id) || empty($course->school_id)){ //is schoolonly course?

          if(!empty($course->video_url)):
              
              $video = base_url()."assets/videos/". $course->video_url;
          
            if($course->isYoutube)
             $video="https://www.youtube.com/embed/".$course->video_url."?rel=0&modestbranding=1&showinfo=0";
              
          ?>

          
           <div class="fluid-video-wrapper">
              <iframe width="560" height="315" src="<?=$video?>" frameborder="0" allowfullscreen></iframe>

            </div>


            <?php 
              endif;
              if(!empty($course->attachment) || !empty($course->audio) ){
             ?>

              <div class="content mt-20" >

               <?php if(!empty($course->attachment)): ?>
             
                <a href="#pdf" data-toggle="modal" class="btn btn-default">
                  <i class="fa fa-file-pdf-o"></i> Read Attachment
                </a>
                <?php endif; ?>

                <?php if(!empty($course->audio)): ?>
                  <audio controls>
                    <source src="<?=base_url()?>assets/audios/<?=$course->audio?>" type="audio/ogg">
                    <source src="<?=base_url()?>assets/audios/<?=$course->audio?>" type="audio/mpeg">
                     Your browser does not support this audio.
                     <a href="<?=base_url()?>assets/audios/<?=$course->audio?>">
                        Download Audio
                     </a>
                  </audio>
                    <p class="text-theme-color-green">Listen to the course guide above</p>

                <?php endif; ?>

              </div>

              <?php
                }
               ?>
 
              <h2 class="text-theme-color-red line-bottom"><?php echo $course->title; ?></h2>
             

             <!--rating-->
                <ul class="review_text list-inline">
                  <li>
                    <div class="star-rating" title="Rated 5.00 out of 5"><span data-width="60%">4.00</span></div>
                  </li>
                </ul>


              <h4 class="mt-0">


              Category:  <span class="text-theme-color-red"><?php echo $course->category; ?></span>

               
              Sub-Theme :<span class="text-theme-color-red"><?php echo $course->class; ?></span> 

              
              Theme :<span class="text-theme-color-red"><?php echo $course->subject; ?></span> 

            </h4>
             

              <h4><?php echo $course->description; ?> <br>
                </h4>

            <div class="showmorecontent hideContent">

              <p style="font-size: 15pt; text-align: justify;"><?php echo $course->course_body; ?></p>

            </div>

            <div class="show-more">
        <a href="#" class="btn btn-lg text-theme-color-red" style="font-size: 14pt; text-transform: uppercase;">Show more...</a>
           </div>

              <h3 class="line-bottom mt-20 mb-20 text-theme-color-red">Resource Information</h3>
            

              <table class="table table-bordered"> 
                <tr>
                  <td class="text-center font-16 font-weight-600 bg-theme-color-blue text-white" colspan="4">Details For this Resource</td>
                </tr>
                <tbody> 
                  <tr> <td><i class="fa fa-calendar text-theme-color-red pr-20"></i>
                  Date Published</td> <td><?php echo $course->date; ?></td> </tr> 
                  <tr> <td class="bg-theme-color-yellow text-white"><i class="fa fa-birthday-cake text-theme-color-blue pr-20"></i>
                  Category</td> <td class="bg-theme-color-green text-white"><?php echo $course->category; ?> </td> </tr> 

                  <tr> <td class="bg-theme-color-red text-white"><i class="fa fa-user text-theme-color-yellow pr-20"></i>Author</td> <td class="bg-theme-color-sky text-white"><?php echo $course->names; ?></td> 
                   
                </tbody> 
              </table>

              <h4>Leave a Comment</h4>
            
              <form method="post" action="<?=base_url()?>courses/saveComment/<?=$this->uri->segment(3)?>">
                <textarea id="editor" name="comment" class="form-control" style="min-height:120px;" placeholder="Type your Comment here"></textarea>
                <div class="form-group">
                  <br>
                <button type="submit" class="btn btn-default pull-right">
                  <i class="fa fa-comment-o"></i> Submit Comment
                </button>
                </div>
                
              </form>

                

              <?php
                $comments = Modules::run('courses/getComments',$this->uri->segment(3));

                    $plural =(count($comments)>1)?"s":"";

                  echo "<h4>".count($comments)." Comment".$plural."</h4>";
                foreach($comments as $comment):
              ?>

              
              <blockquote style="padding: 7px;">
                  <h4><?=$comment->firstname." ".$comment->lastname; ?> said:</h4>
                <i><?=$comment->comment?></i>
                <h5><i class="fa fa-clock-o"></i> <?=Modules::run('utility/ellapsedTime',$comment->date)?></h5>
              </blockquote>

            <?php endforeach;


                } //end check restriction

                else { //for only the specific school

                    $owner = Modules::run('classes/getSchools',$course->school_id);

                    echo "<center> <h3>Access to this course is for school members only <br> School: <b style='color:green;'>".$owner->schoolname."<br> <b style='color:black;'>Address:</b> ".$owner->schooladdress."</b></h3>";

                    echo "<br> <br> <a class='btn btn-lg btn-default' href='".base_url()."courses'> View all courses</a></center>";
                }

              ?>
              

            </div>
          </div>
      
      <?php include('courses_sidebar.php'); ?>

      <script type="text/javascript">
        
        window.setTimeout(()=>{
          console.log("Trying.."+$('.ytp-title').html())
          $('.ytp-title').html("HEllo");
        },10000);

      </script>

        </div>
      </div>
     
    </section>

