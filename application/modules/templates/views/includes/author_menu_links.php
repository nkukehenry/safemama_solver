 <li><a href="<?php echo base_url(); ?>authoring">Dashboard</a></li>
              <li ><a href="<?php echo base_url(); ?>authoring/authorCourses/<?php echo $userdata['user_id']; ?>">My Resources</a></li>
              <!--li ><a href="#">My Courses</a></li-->
              <li ><a href="<?php echo base_url(); ?>authoring/createCourse">Create a resource</a></li>

 <?php 
 /*
	if(empty($userdata['school_id']) && $userdata['role'] == "author"){
 ?>
  <li ><a data-toggle="modal" data-target="#registerschool">Register a School</a></li>
<?php } else {  ?>
  <li ><a href="<?php echo base_url(); ?>authoring/schoolCourses/<?=$userdata['school_id']?>">School Courses</a></li>

		  <?php 
			if($userdata['user_id'] == $myschool->addedBy){
		 ?>
		  <li ><a href="<?php echo base_url(); ?>myschool">My School</a></li>
		<?php }  ?>

<?php } */ ?>

