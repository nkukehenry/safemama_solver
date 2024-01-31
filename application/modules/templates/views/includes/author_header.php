

 <?php

   $userdata=$this->session->userdata;
   $myschool = null;

   if(!empty($userdata['school_id'])){

      //$myschool = Modules::run('classes/getSchools',$userdata['school_id']);
   }

   ?>



<link rel="stylesheet" href="<?php echo base_url(); ?>assets/trumb/dist/plugins/table/ui/trumbowyg.table.min.css">



<style>
/* Custom styles for resizable handles */
.customResizable {
  position: relative;
}

.customResizable .ui-resizable-handle {
  position: absolute;
  width: 8px;
  height: 8px;
  background-color: #fff;
  border: 1px solid #333;
}

.customResizable .ui-resizable-n,
.customResizable .ui-resizable-s {
  top: -4px;
  left: 50%;
  margin-left: -4px;
  cursor: ns-resize;
}

.customResizable .ui-resizable-e,
.customResizable .ui-resizable-w {
  top: 50%;
  left: 100%;
  margin-top: -4px;
  cursor: ew-resize;
}

.customResizable .ui-resizable-ne,
.customResizable .ui-resizable-sw {
  top: -4px;
  left: 100%;
  margin-left: -4px;
  margin-top: -4px;
  cursor: nesw-resize;
}

.customResizable .ui-resizable-se,
.customResizable .ui-resizable-nw {
  bottom: -4px;
  left: 100%;
  margin-left: -4px;
  margin-bottom: -4px;
  cursor: nwse-resize;
}

/* Highlight style for the selected image */
.customSelected {
  border: 2px solid #3498db; /* Change the color to your preferred highlight color */
}

/* Add this CSS to your stylesheet */

/* Style for resizable handles */
.customResizable {
  position: relative;
  display: inline-block;
}

/* Add handles using :after pseudo-elements */
.customResizable:after {
  content: '';
  position: absolute;
  width: 8px;
  height: 8px;
  background-color: #fff;
  border: 1px solid #000;
  cursor: se-resize; /* Set cursor style for resizing */
}

/* Position handles at each corner */
.customResizable:after {
  top: 0;
  left: 0;
}

.customResizable:after:nth-child(2) {
  top: 0;
  right: 0;
  left: auto;
}

.customResizable:after:nth-child(3) {
  bottom: 0;
  left: 0;
  top: auto;
}

.customResizable:after:nth-child(4) {
  bottom: 0;
  right: 0;
  top: auto;
  left: auto;
}

/* Add specific styling for the 'customSelected' class to highlight the selected image */
.customSelected {
  border: 2px solid #ff0000; /* Example border style for highlighting */
  outline: none; /* Remove default outline when the image is selected */
}


/* Add specific styling for the 'customSelected' class to highlight the selected image */
.customSelected {
  border: 2px solid #ff0000; /* Example border style for highlighting */
  outline: none; /* Remove default outline when the image is selected */
}


.ui-resizable{
    min-width:200px!important;
    min-height:150px!important;
}


</style>

<!--<div id="wrapper" class="clearfix">-->
  <!-- preloader -->
<!--  <div id="preloader">-->
<!--    <div id="spinner">-->
<!--      <div class="preloader-dot-loading">-->
<!--        <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>-->
<!--        <h4>Loading...</h4>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>-->
<!--  </div> -->
  


  <!-- Header -->
  <header id="header" class="header" >


    <div class="header-middle xs-text-center">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-5">
            <div class="widget no-border m-0">
              <a class="menuzord-brand pull-left flip xs-pull-center mb-15" href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/<?php echo $config->logo; ?>" alt=""></a>
            </div>
          </div>
            
          <div class="col-xs-12 col-sm-4 col-md-3 pull-right">
            <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
              <ul class="list-inline">
                <li>

                  <a href="<?php echo base_url(); ?>auth/myprofile">
                  <?php if($userdata['photo'])  {  ?>

                    <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $userdata['photo']; ?>" class="img img-circle" width="70px" style="border:4px #0cf solid;">
                
                    <?php }  else { ?>

                         <img src="<?php echo base_url(); ?>assets/images/users/user.jpg" class="img img-circle" width="70px" style="border:4px #0cf solid;">
                

                    <?php  } ?>
                  </a>
                </li>
                <li>
                  <h5 class="font-13 text-theme-color-blue m-0"> 

                    <?php  

                    echo $userdata['names'];

                    echo "<p class='text-center text-black'>".ucwords((!empty($myschool->schoolname))?$myschool->schoolname:'')."</p>";



                    ?>

                  </h5>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-theme-color-red border-bottom-theme-color-sky-2px">
        <div class="container"  >
          

          <nav id="menuzord" class="menuzord bg-theme-colored pull-left flip menuzord-responsive" style="z-index: 2000px;">
           
            <ul class="menuzord-menu">
              
             <?php include('author_menu_links.php'); ?>
             
            </ul>
            
            <ul class="pull-right flip">
              <li>

              <?php  
              //if user is logged in
              if($userdata){  ?>

                <!-- login -->
                <a class="btn btn-colored btn-flat bg-theme-color-sky text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15"  href="<?php echo base_url(); ?>auth/myprofile">My Profile</a>
                <!-- login -->
              
                <!-- signup -->
                <a class="btn btn-colored btn-flat bg-theme-color-lime text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15"  href="<?php echo base_url(); ?>auth/logout">Log Out</a>
                <!-- signup -->
                <?php } else {

                  // if user is isn't signed out
                  ?>


                <!-- login -->
                <a class="btn btn-colored btn-flat bg-theme-color-sky text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15"  data-toggle="modal" data-target="#login">Login Now</a>
                <!-- login -->
              
                <!-- signup -->
                <a class="btn btn-colored btn-flat bg-theme-color-lime text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15"  data-toggle="modal" data-target="#login">Register</a>
                <!-- signup -->



                <?php } ?>

              </li>
            </ul>
          </nav>


        </div>
      </div>
    </div>
  </header>

