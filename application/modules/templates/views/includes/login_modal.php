
<?php
  //verified schools
  $schools = Modules::run('classes/getVerifiedSchools');
?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.select').select2({
  theme: "classic",
  width: '100%'
});
});
</script>
<!-- Modal -->
<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog" >

    <form method="post" action="<?php echo base_url(); ?>auth/user_login">

    <!-- Modal content-->
    <div class="modal-content" data-bg-img="<?php echo base_url(); ?>assets/images/bg/p2.jpg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><font size="15pt">&times;</font></button>
        <center><h4 class="modal-title">You need to Login first</h4>

          <br>

          <a data-toggle="modal" data-target="#register">Don't have an account? <span data-dismiss="modal"><b>Click here to register</b></span></a>
        </center>
      </div>
      <div class="modal-body" style="padding: 2em;">
        
    
              <div class="form-group">
                <label class="text-black">Username</label>
                <input type="text" name="username" class="form-control" required>
              </div>

              <div class="form-group">
                <label class="text-black">Password</label>
                <input type="password" name="pass" class="form-control" required>
              </div>

           
       

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Login</button>
      </div>
    </div>

  </form>

  </div>
</div>

<!-- Modal -->
<div id="register" class="modal fade" role="dialog" data-backdrop="false">
  <div class="modal-dialog" >

    <form method="post" action="<?php echo base_url(); ?>auth/userRegistration">

    <!-- Modal content-->
    <div class="modal-content" data-bg-img="<?php echo base_url(); ?>assets/images/bg/about.jpg" style="background-repeat: no-repeat; background-size: cover; overflow-y: auto;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><font size="15pt">&times;</font></button>
        <center><h4 class="modal-title">Please register to continue</h4>
          <a data-toggle="modal" data-target="#login">Already registered? <span data-dismiss="modal"><b>Click here to login</b></span></a>
        </center>
      </div>
      <div class="modal-body" style="padding: 2em;">

            <div class="col-lg-6 col-sm-12">
              <div class="form-group">
                <label class="text-black">First Name</label>
                <input type="text" name="firstname" class="form-control" required placeholder="First Name">
              </div>
              <div class="form-group">
                <label class="text-black">Last Name</label>
                <input type="text" name="lastname" class="form-control" required placeholder="Last Name">
              </div>
              <div class="form-group">
                <label class="text-black">Parent's Name</label>
                <input type="text" name="parent" class="form-control" placeholder="Parent's name">
              </div>
              <div class="form-group">
                <label class="text-black">School Name
                <br>
                <select name="school_id" class="select form-control " required placeholder="Name of your school" style="padding:3px;">

                  <option selected> Select your school from here </option>
                  <option value="0">My school is not here</option>
                  <?php foreach ($schools as $row): ?>
                    <option value="<?=$row->schoolname?>"><?=$row->schoolname?></option>
                  <?php endforeach; ?>

                  </select>
                  </label>

              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <div class="form-group">
                <label class="text-black">Phone number</label>
                <input type="text" name="phone" class="form-control" required placeholder="Yours or your parent's phone number">
              </div>


              <?php $classes=Modules::run('classes/getClasses');?>
              <div class="form-group">
                <label class="text-black">Class</label>
                <select required class="form-control" name="class_id" style="font-size: 14pt;">
                  <option selected>Select class</option>
                  <?php foreach ($classes as $class): ?>
                    <option value="<?=$class->class_id?>"><?=$class->class?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label class="text-black">Username</label>
                <input type="text" name="username" autocomplete="user" class="form-control"  placeholder="Something you can remember" required>
              </div>



              <div class="form-group">
                <label class="text-black">Password</label>
                <input type="password" autocomplete="pass" name="password" class="form-control" placeholder="Use a word/number you can remember" required>
              </div>
            </div>


            <div class="col-lg-12">
              <div class="form-group">
                <label class="text-black">Describe your self</label>
                <textarea  class="form-control" name="about" required placeholder="tell us about yourself"></textarea>
              </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Submit Registration</button>
      </div>
    </div>

  </form>

  </div>
</div>


<!-- Modal -->
<div id="teach" class="modal fade" role="dialog">
  <div class="modal-dialog" >

    <form method="post" action="<?php echo base_url(); ?>auth/authorRegistration">

    <!-- Modal content-->
    <div class="modal-content" data-bg-img="<?php echo base_url(); ?>assets/images/bg/p2.jpg" style="overflow-y: auto;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><font size="15pt">&times;</font></button>
        <center><h4 class="modal-title">Please register to continue</h4>
          <a data-toggle="modal" data-target="#login">Already registered? 
            <span data-dismiss="modal"><b>Click here to login</b></span></a>
        </center>
      </div>
      <div class="modal-body" style="padding: 2em;">
          

                   <h5>Teacher Registration</h5>
                   
               <div class="form-group">
                <label class="text-black">First Name</label>
                <input type="text" name="firstname" class="form-control" required placeholder="First Name">
              </div>
              <div class="form-group">
                <label class="text-black">Last Name</label>
                <input type="text" name="lastname" class="form-control" required placeholder="Last Name" >
              </div>
              <div class="form-group">
                <label class="text-black">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Your email (Optional)" >
              </div>
              <div class="form-group">
                <label class="text-black">Phone number</label>
                <input type="text" name="phone" class="form-control" required placeholder="Your phone number">
              </div>

              <div class="form-group">
                <label class="text-black">School Name</label>
                <select name="school_id" class="form-control" required placeholder="Name of your school">

                  <option selected> Select a School </option>
                  <option value="0">My school is not here</option>
                  <?php foreach ($schools as $row): ?>
                    <option value="<?=$row->schoolname?>"><?=$row->schoolname?></option>
                  <?php endforeach; ?>

                  </select>

              </div>

              <div class="form-group">
                <label class="text-black">Username</label>
                <input type="text" name="username" class="form-control username" required placeholder="Username for later use to login">
              </div>

              <div class="form-group">
                <label class="text-black">Password</label>
                <input type="password" name="password" class="form-control password" required placeholder="Enter password">
              </div>

              <div class="form-group">
                <label class="text-black">Describe your self</label>
                <textarea  class="form-control" name="about" required placeholder="Tell us about yourself"></textarea>
              </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Submit Registration</button>
      </div>
    </div>

  </form>

  </div>
</div>


<!-- Modal -->
<div id="registerschool" class="modal fade" role="dialog">
  <div class="modal-dialog" >

    <form method="post" action="<?php echo base_url(); ?>classes/schoolRegistration">

    <!-- Modal content-->
    <div class="modal-content" data-bg-img="<?php echo base_url(); ?>assets/images/bg/p2.jpg" style="overflow-y: auto;">

    <?php if(empty($userdata['user_id'])): ?>
    <div class="modal-header">
      <center><h4 class="modal-title">Login required</h4>
          </center>
        <button type="button" class="close" data-dismiss="modal"><font size="15pt">&times;</font></button>
      </div>
      <div class="modal-body">

          <center>
            <br>
            <h4 class="modal-title">Your need to login as a teacher to add a school</h4>
          
            <br>
          <a data-toggle="modal" data-target="#login"> 
            <span data-dismiss="modal"><b>Click here to login </b></span></a>
            <br>
            </center>
      </div>
      <div class="modal-footer">
      </div>

    <?php else: ?>

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><font size="15pt">&times;</font></button>
        <center><h4 class="modal-title">Please register a school</h4>
          
                   <h5>Register your School so you can upload content for your students</h5>
        </center>
      </div>
      <div class="modal-body" style="padding: 2em;">
          
                   
               <div class="form-group">
                <label class="text-black">School Name</label>
                <input type="text" name="schoolname" class="form-control" required placeholder="School Name">
              </div>
              <div class="form-group">
                <label class="text-black">Address</label>
                <input type="text" name="schooladdress" class="form-control" required placeholder="Address" >
              </div>
              <div class="form-group">
                <label class="text-black">Email</label>
                <input type="text" name="schoolemail" class="form-control" placeholder="School email (Optional)" >
              </div>
              <div class="form-group">
                <label class="text-black">Phone number</label>
                <input type="text" name="schoolphone" class="form-control" required placeholder="School phone number">
              </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Submit Registration</button>
      </div>
      <?php endif; ?>
    </div>

  </form>

  </div>
</div>






<!-- Modal -->
<div id="about" class="modal fade" role="dialog">
  <div class="modal-dialog" >


    <!-- Modal content-->
    <div class="modal-content" data-bg-img="<?php echo base_url(); ?>assets/images/bg/about.jpg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><font size="15pt">&times;</font></button>
        <center><h4 class="modal-title">About <?php echo "Maternal Health" ?></h4>
        </center>
      </div>
      <div class="modal-body" style="padding: 2em;">
        
        <p>
          <?php

            echo file_get_contents(base_url().'assets/about.txt');

          ?>
        </p>

      </div>
      <div class="modal-footer">
        <button type="button"  data-dismiss="modal" class="btn btn-default">Close</button>
      </div>
    </div>


  </div>
</div>


<script type="text/javascript">
  
   $('.username').val('');
   $('.password').val('');

</script>
