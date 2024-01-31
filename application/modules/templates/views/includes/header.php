
<?php $userdata=$this->session->userdata;

   $myschool = null;

   if(!empty($userdata['school_id'])){

      $myschool = Modules::run('classes/getSchools',$userdata['school_id']);
   }

   ?>



<!--<div id="wrapper" class="clearfix">-->
  <!-- preloader -->
<!--  <div id="preloader">-->
<!--    <div id="spinner">-->
<!--      <div class="preloader-dot-loading">-->
<!--        <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>-->
<!--        <h4>Loading...</h4>-->
<!--      </div>-->
<!--    </div>-->
<!--    <div id="disable-preloader" class="btn btn-default btn-sm">Hide this</div>-->
<!--  </div>-->
  
  
  <style>
    .header-nav-background{
        background: black !important;
    }
    
    .header-top-background{
        background: white !important;
    }
    
    .nav-bar-items{
        color: #ffffff !important;
    }
    
    .nav-bar-items:hover{
        background: #ffffff !important;
        color: #000000 !important;
    }
    
    .nav-border-bottom{
        border-bottom: solid #FFD700 2px !important;
    }
    
    /*.nav-content:hover{*/
    /*    border-bottom: solid #ffffff 2px !important;*/
    /*    color: #000000 !important;*/
    /*}*/
    
    .nav-content:hover{
        background: #ffffff !important;
        color: #000000 !important;
    }
    
    .item-margin{
        margin-top: 2px;
    }
    
    .my-item{
        background: #ffffff !important;
        color: #000000 !important;
        margin-top: 2px;
        border-radius: 5px;
    }
    
    .my-item:hover{
        background: #ffffff !important;
        color: #000000 !important;
    }
    
</style>


  <!-- Header -->
  <header id="header" class="header" >


    <div class="header-middle p-0 bg-lightest xs-text-center header-top-background">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="widget no-border m-0">
              <a class="menuzord-brand pull-left flip xs-pull-center mb-5" href="javascript:void(0)"><img src="<?php echo base_url(); ?>assets/images/<?php echo $config->logo; ?>" alt=""></a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-6 hidden-xs">
            <div class="widget no-border pull-right sm-pull-none sm-text-center mt-10 mb-10 m-0">
              <ul class="list-inline">
                <li>
                    <i class="fa fa-medkit text-theme-color-red font-30 mt-5 sm-display-block"></i>
                </li>
                <li>
                  <!--<a href="<?php //echo $config->phone_number; ?>#!" class="font-12 text-black text-uppercase">Call us today!</a> -->
                  <h5 class="font-14 text-theme-color-black m-0"> 
                    <?php echo $config->phone_number; ?>
                  </h5>
                </li>
              </ul>
            </div>
          </div>  
          <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="widget no-border pull-right sm-pull-none sm-text-center mt-5 mb-5 m-0">
              <ul class="list-inline">

                 <li>

                  <?php 

                  if($userdata['user_id']){

                    ?>

                    <a href="<?php echo base_url(); ?>account">
                    <?php
                  if($userdata['photo'])  {  ?>


                    <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $userdata['photo']; ?>" class="img img-circle" width="70px" style="border:4px #0cf solid;">
                
                    <?php }  else { ?>

                         <img src="<?php echo base_url(); ?>assets/images/users/student.jpg" class="img img-circle" width="70px" style="border:4px #0cf solid;">
                

                    <?php  } ?>

                  </a>
                </li>
                <li>
                   <a href="<?php echo base_url(); ?>account">
                  <h5 class="font-13 text-theme-color-blue m-0"> 

                    <?php  

                    echo $userdata['names'];

                    echo "<p class='text-center text-black'>".ucwords($myschool->schoolname)."</p>";

                    ?>

                  </h5>
                </a>
                </li>

                <?php }  else{ ?>

                <li  style="padding-top:15px;padding-bottom:15px;">
                  <!--<a href="#" class="font-12 text-black text-uppercase">Quick Support</a>-->
                  <!--<h5 class="font-13 text-theme-color-blue m-0"> 24 / 7</h5>-->
                  <a href="https://www.positivessl.com" target="_blank">
                      <img src="<?php echo base_url(); ?>assets/images/positivessl_trust_seal_md_167x42.png">
                    </a>
                </li>

                <?php } ?>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-theme-color-red border-bottom-theme-color-sky-2px header-nav-background nav-border-bottom">
        <div class="container">
          

          <nav id="menuzord" class="menuzord bg-theme-colored pull-left flip menuzord-responsive header-nav-background" style="z-index: 2000px;">
           
            <ul class="menuzord-menu">
              
             <?php include('menu_links.php'); ?>
             
            </ul>
            
            <ul class="pull-right flip">
              <li>

                <?php if(!$userdata['user_id']) {  ?>
                <!-- login -->
                <a class="btn b btn-flat  text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15 nav-bar-items"  data-toggle="modal" data-target="#login">Login Now</a>
                <!-- login -->
                 <a class="btn b btn-flat  text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15 nav-bar-items"  data-toggle="modal" data-target="#register">Register</a>

                <?php } else {?>

                <a class="btn  btn-flat  text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15 nav-bar-items" href="<?php echo base_url(); ?>mycourses">My Courses</a>

                 <a class="btn btn-colored btn-flat  text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15 nav-bar-items" href="<?php echo base_url(); ?>account">My Account</a>
                <!-- login -->
                <a class="btn btn-flat  text-white font-14 bs-modal-ajax-load mt-0 p-25 pr-15 pl-15 nav-bar-items" href="<?php echo base_url(); ?>auth/user_logout">Logout</a>
                <!-- login -->

                <?php  } ?>


              </li>
              

            </ul>
          </nav>


        </div>
      </div>
     
    </div>
  </header>

  <?php echo $this->session->flashdata('msg'); ?>

