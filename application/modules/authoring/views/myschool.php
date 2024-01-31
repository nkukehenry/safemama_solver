  <?php

   $myschool = Modules::run('classes/getSchools',$this->session->userdata()['school_id']);
   ?>
   <!-- Main content -->
    <section style="padding: 2em; margin-top: 2em;" >


        <div class="col-md-7">
          

          <div class="panel">
            <div class="panel-body">
           
                <form class="form-horizontal" class="profile" method="post" action="<?php echo base_url();?>authoring/updateSchool">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label"> NAME</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="schoolname" id="inputName" placeholder="Name" value="<?php echo $myschool->schoolname; ?>">
                    </div>

                  </div>

                   <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label"> ADDRESS</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="schooladdress" id="inputName" placeholder="Address" value="<?php echo $myschool->schooladdress; ?>">
                    </div>

                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">EMAIL</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="scholemail" id="inputName" placeholder="Email" value="<?php echo $myschool->schoolemail; ?>" />
                    </div>

                  </div>

                    <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">PHONE NO.</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="schoolphone" id="inputName" placeholder="Phone Number" value="<?php echo $myschool->schoolphone; ?>" />
                    </div>

                  </div>

                  <div class="form-group">
                  
                    <input type="hidden" name="user_id" value="<?php echo $$myschool->school_id; ?>">
                  </div>

                  <div class="form-group" >
                    
                      <button type="submit" class="btn btn-success btn-lg pull-right">Save Changes</button>
                    
                  </div>
                </form>

              </div>
              </div>
            
        </div>
        <!-- /.col -->


      </div>
      <!-- /.big col 8 -->

      <div class="col-md-1" >
      </div>

        <!--last col for courses-->

        <div class="col-md-4" >

          <?php 

          $mystudents=Modules::run("authoring/getSubscribers",$myschool->school_id);

           ?>

           <h3 class="text-center">Subscribers</h3>

       
      <ul  id="mycourses" style="scroll-behavior: smooth;">

          <center>
          <?php if(count($mystudents)==0){ echo "<h4>No subsribers yet</h4>"; } ?>
        </center>

        <?php foreach ($mystudents as $sub): 

         ?>
      
      <div class="row" style="margin-bottom: 0.5em; padding-bottom: 0.5em; border-bottom: grey dotted 1px;">
        <div class="col-md-3">
        
          
          <?php if($sub->photo){ ?>

      <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $sub->photo; ?>" alt="" class="img-circle " style="max-width: 50px; float: left;" >
                  <?php } else {  // if no cover_image?>
                  
        <img src="<?php echo base_url(); ?>assets/images/users/user.jpg" alt="" class="img-thumbnail"  style="max-width: 50px; float: left;">
                  <?php }  ?>
          </div>

        <div class="col-md-7">
        <h5><?php echo $sub->firstname." ".$sub->lastname; ?>
        <br>
          <span style="color:grey;"><?php echo ucwords($sub->role); ?></span>
        </h5>
        </div>


      </div>

      <?php endforeach; ?>

       </ul>

        </div>

    </section>
    <!-- /.content -->

<script type="text/javascript">

$(document).ready(function(){

//slimscroll for my courses

$('#mystudents').slimscroll({
    height: '450px',
    wheelStep: 6
  });

});
</script>
