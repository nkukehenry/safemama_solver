  <?php

   $userdata=$this->session->userdata;

   $names=explode(" ", $userdata['names']);

   $lastname=$names[0];

   $firstname=$names[1];

   ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/croppie.css">


   <!-- Main content -->
    <section style="padding: 2em; margin-top: 2em;" >


      <div class="col-md-8">
        <div class="col-md-4" style="padding-top: 2em; border-radius: 5px;" data-bg-img="<?php echo base_url(); ?>assets/images/bg/p2.jpg">

          <!-- Profile Image -->
          <div class="box box-danger">
            <div class="box-body box-profile">
              
<center><img onclick="$('#photo').click();" class="profile-user-img img-responsive img-circle userphoto" src="<?php echo base_url(); ?>assets/images/users/<?php echo $userdata['photo']; ?>" data-toggle="tooltip" title="Click to change photo" style="border:8px grey solid; max-width: 130px;"></center>

    <div id="upload-demo" style="width:100%; display:none; margin: 0px; padding: 0px;"></div>

                    <center><button style="display: none;" class="crop btn btn-info">Resize Photo</button></center>
      

              <h3 class="profile-username text-center"><?php echo $userdata['names']; ?></h3>

              <ul class="list-group list-group-unbordered">

                
                    <form action="<?=base_url()?>auth/changePass" method="post">

                  <div class="form-group">
                    <label for="inputName" class="col-sm-12 control-label">Old Password</label>

                    <input type="password" class="form-control" name="oldpass" id="inputName" placeholder="Old Password" required />

                    <input type="hidden" name="uid" value="<?php echo $userdata['user_id']; ?>">

                  </div>


                <div class="form-group">
                    <label for="inputName" class="col-sm-12 control-label">New Password</label>

                    <input type="password" class="form-control" name="newpass" id="inputName" placeholder="New Password" required/>

                    <input type="hidden" name="uid" value="<?php echo $userdata['user_id']; ?>">

                  </div>

            
              <button type="submit"  style="margin-top: 2em;" class="btn btn-warning btn-block"><b>CHANGE PASSWORD</b></button>

              <br>

            </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

      
        </div>
        <!-- /.col -->
        <div class="col-md-8">

          <div class="panel">
            <div class="panel-body">

           
                <form class="form-horizontal" class="profile" method="post" action="<?php echo base_url();?>auth/updateProfile">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">FIRST NAME</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="firstname" id="inputName" placeholder="Name" value="<?php echo $firstname; ?>">
                    </div>

                  </div>

                   <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">LAST NAME</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="lastname" id="inputName" placeholder="Last Name" value="<?php echo $lastname; ?>">
                    </div>

                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">USERNAME</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="username" id="inputName" placeholder="Username" value="<?php echo $userdata['username']; ?>" />
                    </div>

                  </div>

                    <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">PHONE NO.</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="phone" id="inputName" placeholder="Phone Number" value="<?php echo $userdata['phone']; ?>" />
                    </div>

                  </div>


                  <div class="form-group">
                  
                    <input type="hidden" name="user_id" value="<?php echo $userdata['user_id']; ?>">

                    <input type="file"  style="display:none;" id="photo">

                  <input type="text" name="photo"  style="display:none;" id="pic">

                  </div>

                   

                  <div class="form-group" >
                    
                      <button type="submit" class="btn btn-danger pull-right">Save Changes</button>
                    
                  </div>
                </form>

              </div>
              </div>
            
        </div>
        <!-- /.col -->


      </div>
      <!-- /.big col 8 -->


        <!--last col for courses-->

        <div class="col-md-4" >

          <?php 

          $mycourses=Modules::run("courses/getCoursesByAuthor",$userdata['user_id']);

          //print_r($mycourses);


           ?>

           <h3 class="text-center">My Courses</h3>

       
      <ul  id="mycourses" style="scroll-behavior: smooth;">

          <center>
          <?php if(count($mycourses)==0){ echo "<h4>No courses yet</h4>"; } ?>
        </center>

        <?php foreach ($mycourses as $lesson): 

         $link='href="'.base_url().'authoring/editCourse/'.$lesson->course_id.'"';
         ?>



          <a <?php echo $link; ?> >
      
      <div class="row" style="margin-bottom: 0.5em; padding-bottom: 0.5em; border-bottom: grey dotted 1px;">
        <div class="col-md-3">
        
          
          <?php if($lesson->cover_image){ ?>

      <img src="<?php echo base_url(); ?>assets/images/course/<?php echo $lesson->cover_image; ?>" alt="" class="img-thumbnail " style="max-width: 80px; float: left;" >

                  <?php } else {  // if no cover_image?>
                  
        <img src="<?php echo base_url(); ?>assets/images/course/course.png" alt="" class="img-thumbnail"  style="max-width: 80px; float: left;">

                  <?php }  ?>

          </div>

        <div class="col-md-7">
        <h5><?php echo $lesson->title; ?></h5>

        <?php echo Modules::run("utility/truncate",$lesson->description,30); ?>
        
        </div>

      </div>
    

            </a>


    <?php endforeach; ?>

       </ul>





        </div>

    </section>
    <!-- /.content -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/croppie.min.js"></script>



<script type="text/javascript">

$(document).ready(function(){


//changing profile Image

$uploadCrop = $('#upload-demo').croppie({

    enableExif: true,

    viewport: {

        width: 200,

        height: 200,

        type: 'square'

    },

    boundary: {

        width: 300,

        height: 300

    }

});


$('#photo').on('change', function () { 

  $('.userphoto').hide();
  $('#upload-demo').show();
  $('.crop').show();

  var reader = new FileReader();

    reader.onload = function (e) {

      $uploadCrop.croppie('bind', {

        url: e.target.result

      }).then(function(){

        console.log('jQuery bind complete');

      });

      

    }

    reader.readAsDataURL(this.files[0]);

});

$('.crop').on('click', function (ev) {

  $uploadCrop.croppie('result', {

    type: 'canvas',

    size: 'viewport'

  }).then(function (resp) {


 $("#pic").val(resp);

 $('.userphoto').attr('src',resp);

  $('#upload-demo').hide();
  $('.crop').hide();
  $('.userphoto').show();
    

  });

});

//slimscroll for my courses

$('#mycourses').slimscroll({
    height: '450px',
    wheelStep: 6
  });

});
</script>
