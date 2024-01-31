 
              <li ><a href="<?php echo base_url(); ?>" class="nav-bar-items">Home</a></li>
              <li ><a href="<?php echo base_url(); ?>courses" class="nav-bar-items">Resources</a></li>
              <li ><a href="#" class="nav-bar-items">Forums</a></li>
              <li ><a href="#" class="nav-bar-items">Webinars</a></li>
              <li ><a href="#" class="nav-bar-items">MCH Incident Reporting</a></li>
              <li class="nav-content menuzord-menu"><a data-toggle="modal" data-target="#about" class="nav-bar-items">Courses & Trainnings</a>
              
                <ul class="dropdown menuzord-menu my-item item-marging">
                    <li class="dropdown-item my-item"> <a href="" class="dropdown-item my-item">Training Courses</a> </li>
                    <div class="dropdown-divider"></div>
                    <li class="dropdown-item my-item"> <a href="" class="dropdown-item my-item">IHRIS In-service Training</a> </li>
                </ul>
                
              </li>
             <!--  <li ><a href="#">Contact us</a></li>
 -->

<?php 
  if(empty($userdata['user_id'])):
  ?>
  <!--<li ><a data-toggle="modal" data-target="#register" class="nav-bar-items">Register</a></li>-->
  <!--<li ><a data-toggle="modal" data-target="#teach" class="nav-bar-items">I want to teach</a></li>-->
  <!--<li ><a data-toggle="modal" data-target="#registerschool" class="nav-bar-items">Register a School</a></li>-->
<?php 
  else:

	if(empty($userdata['school_id']) && $userdata['role'] == "author"){
 ?>
  <!--<li ><a data-toggle="modal" data-target="#registerschool" class="nav-bar-items">Register a School</a></li>-->
  <?php }else if(!empty($userdata['school_id']) && $userdata['role'] !== "author"){  ?>

       <!--<li ><a href="<?php echo base_url(); ?>courses/mySchool/<?=$userdata['school_id']?>" class="nav-bar-items">My School</a></li>-->

    <?php  } endif; ?>

   <!--<li ><a href="https://solverclasses.com/enterprise/public/" class="nav-bar-items">Enterprise LMS</a></li>           -->