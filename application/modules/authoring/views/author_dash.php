
<?php

$userdata=$this->session->userdata;

?>


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/tiles.css">

<div class="container dynamicTile" style="padding-bottom: 2em; padding-top: 1em;">



<!--row-->

<div class="row">
  
  <div class="col-sm-4 col-xs-8">
    <div id="tile7" class="tile">
       
       <!--tile-->
        <div class="carousel slide bg-theme-color-sky text-white" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <h3 class="tilecaption"><i class="fa fa-user"></i> Welcome  <?php echo $userdata['names']; ?></h3>
            </div>
            <div class="item">
              <h3 class="tilecaption">Your Username is <?php echo $userdata['username']; ?>,right?</h3>
            </div>
            <div class="item">
              <h3 class="tilecaption">Happy to see you here</h3>
            </div>
          </div>
        </div>
         
    </div>
  </div>

  <!--tile-->
  <div class="col-sm-2 col-xs-4">
    <div id="tile8" class="tile">
       
         <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
               <h3 class="tilecaption">You have <?php echo Modules::run("authoring/countMyCourses",$userdata['user_id']); ?> resources</h3>
            </div>
            <div class="item">
              <h3 class="tilecaption">Thank you!</h3>
            </div>
            </div>
         </div>
         
    </div>
  </div>

  <!--tile-->

  <div class="col-sm-4 col-xs-8">
    <div id="tile10" class="tile">
       
           <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <h3 class="tilecaption"><i class="fa fa-graduation-cap fa-4x"></i></h3>
            </div>


            <?php 

          $mycourses=Modules::run("courses/getCoursesByAuthor",$userdata['user_id']);

          //print_r($mycourses);

          $no=1;


           ?>

           <div class="item">
              <h3 class="tilecaption">Your Resources</h3>
            </div>

            <?php foreach ($mycourses as $lesson): ?>


            <div class="item">
              <h3 class="tilecaption"><?php echo $no.". ".Modules::run("utility/truncate",$lesson->title,20);  ?></h3>
            </div>

           <?php 
           $no++;
           endforeach;
            ?>
          
          </div>
        </div>
         
    </div>
  </div>



<!--tile-->
  <div class="col-sm-2 col-xs-4">
    <div id="tile9" class="tile">
       
          <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
             <h3 class="tilecaption">Improvements </h3>
            </div>
            <div class="item">
              <h3 class="tilecaption">Will keeping coming in...</h3>
            </div>
          </div>
        </div>
         
    </div>
  </div>

  
</div>

<!--row-->

<div class="row ">

  <!--tile-->
    <div class="col-sm-2 col-xs-4">
    	<div id="tile1" class="tile">
        
         <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
               <h3 class="tilecaption"><i class="fa fa-home fa-4x"></i></h3>
            </div>
            <div class="item">
               <h3 class="tilecaption">Feel at home</h3>
            </div>
          </div>
        </div>
         
    	</div>
	</div>

<!--tile-->
	<div class="col-sm-2 col-xs-4">
		<div id="tile2" class="tile">

      <?php 

      $dir ="assets/images/course/*.*";

//get the list of all files with .jpg extension in the directory and safe it in an array named $images
      $courseimages = glob( $dir );

      $i=0;

     // print_r($courseimages);
  ?>
    	 
         <div class="carousel slide bg-theme-color-blue text-white" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">



            <div class="item active">
              <h3 class="tilecaption">Resource Cover Images</h3>
            </div>

            <?php 

            // show one by one of the course images

            foreach( $courseimages as $image ):  


              ?>
    
            <div class="item ">
              <img style="vertical-align: middle;" src="<?php echo base_url().$image; ?>" class="img-responsive"/>
            </div>

            <?php 

              

            endforeach;
             ?>


          </div>
        </div>
         
		</div>
	</div>


  <!--tile-->
	<div class="col-sm-2 col-xs-4">
		<div id="tile3" class="tile">
    	 
        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item">
               <h3 class="tilecaption"><i class="fa fa-youtube fa-4x"></i></h3>
            </div>
            <div class="item active">
               <h3 class="tilecaption">Any where you see video ID</h3>
            </div>
            <div class="item">
              <h3 class="tilecaption"> it's a youtube video link</h3>
            </div>
            </div>
         </div>
		</div>
	</div>

  <!--tile-->

	<div class="col-sm-2 col-xs-4">
		<div id="tile4" class="tile">
    	 
        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <h3 class="tilecaption">Contact Admin</h3>
            </div>
            <div class="item">
              <h3 class="tilecaption">For any help</h3>
            </div>
          </div>
        </div>
         
		</div>
	</div>


  <!--tile-->

    <div class="col-sm-2 col-xs-4">
		<div id="tile5" class="tile">
    	 
         <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <h3 class="tilecaption">Click my resources</h3>
            </div>
            <div class="item">
              <h3 class="tilecaption">For a list of your resources</h3>
            </div>
          </div>
        </div>
         
		</div>
	</div>

  <!--tile-->

	<div class="col-sm-2 col-xs-4">
		<div id="tile6" class="tile">
    	 
         <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">

            <div class="item active">
              <h3 class="tilecaption"><i class="fa fa-user fa-4x"></i></h3>
            </div>

            <div class="item">
              <h3 class="tilecaption">Use My profile</h3>
            </div>
            <div class="item">
              <h3 class="tilecaption">To edit your profile info...</h3>
            </div>
          </div>
        </div>
         
		</div>
	</div>

</div>






<script type="text/javascript" src="<?php echo base_url(); ?>assets/tiles.js"></script>