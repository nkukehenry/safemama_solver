
<?php 

include('includes/css_files.php'); 
include('includes/author_header.php');
include('includes/login_modal.php');

 ?>


  <!-- Start main-content -->
  <div class="main-content">

        <center>
              <?php echo $this->session->flashdata('msg'); ?></center>

  	  <?php 

  	      if(!empty($this->session->userdata()['school_id'])){

  	        $myschool = Modules::run('classes/getSchools',$this->session->userdata()['school_id']);
          if(($myschool->isVerified==0 && $this->session->userdata()['school_id']==$myschool->school_id)):
            ?>
            <center>

            <div class="alert alert-danger">
            <p class="text-dark" style="font-size: 13pt;"> Support us so  we can improve this platform</b>  &nbsp;&nbsp;<a href="#support" data-toggle="modal" class="btn btn-lg btn-default">
              <i class="fa fa-money"></i>&nbsp; DONATE VIA MOBILE MONEY
            </a>
            <!-- <small> You're joining partner our schools</small>  -->
            </p>
              </div>


          </center>



<!-- Modal -->
<div id="support" class="modal fade" role="dialog">
  <div class="modal-dialog" >

    <form method="post" action="<?php echo base_url(); ?>contribute">
    <!-- Modal content-->
    <div class="modal-content" data-bg-img="<?php echo base_url(); ?>assets/images/bg/about.jpg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><font size="15pt">&times;</font></button>
        <center><h4 class="modal-title">Donate</h4>
          <b>Collection will be done  through PAYLINE HOLDINGS (AIRTEL) or PEGASUS (MTN)</b>
        </center>
      </div>
      <div class="modal-body" style="padding: 2em;">
        <center>
                <span class="progress text-center" style="display: none;"> 
                  <img src="<?php echo base_url(); ?>assets/images/spinner.gif" width="60px">
                  <h4>Processing...</h4></span>
                  </center>
              <div class="form-group">
                <label class="text-black">Phone Number</label>
                <input type="tel" name="msisdn" class="form-control" required>
              </div>
              <div class="form-group">
                <label class="text-black">Amount (UGX)</label>
                <input type="number"  name="amount" class="form-control">
              </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" onclick="$('.progress').show()">Continue</button>
      </div>
    </div>

  </form>

  </div>
</div>


          <?php endif; } ?>



    <?php

    
    $this->load->view($module."/".$view);

    ?>


  <!-- end main-content -->
  </div>

  <!-- Footer -->
<?php 

include('includes/footer.php');

include('includes/js_files.php'); 

?>