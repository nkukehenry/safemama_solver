


  <footer id="footer" class="footer divider layer-overlay overlay-dark-9" data-bg-img="images/bg/bg8.jpg">
    <div class="container">
      <div class="row border-bottom">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <!--<img class="mt-5 mb-20" alt="" src="<?php echo base_url();?>assets/images/<?php echo $config->footer_logo; ?>">-->
            <h3 class="text-white"><?php echo $config->system_name; ?></h3>
            <ul class="list-inline mt-5">
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-color-red mr-5"></i> <a class="text-gray" href="#"><?php echo $config->phone_number; ?></a> </li>
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-color-lemon mr-5"></i> <a class="text-gray" href="#"><?php echo $config->system_email; ?></a> </li>
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-color-orange mr-5"></i> <a class="text-gray" href="#"><?php echo $config->website; ?></a> </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h4 class="widget-title">Useful Links</h4>
            <ul class="list angle-double-right list-border">

              <?php include('menu_links.php'); ?>

            </ul>
          </div>
        </div>
        
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h4 class="widget-title">&nbsp</h4>
            <ul class="list angle-double-right list-border">

              <li ><a data-toggle="modal" data-target="#about" class="nav-bar-items">Training Courses</a></li>
              <li ><a data-toggle="modal" data-target="#about" class="nav-bar-items">IHRIS In-service Training</a></li>
              <li ><a data-toggle="modal" data-target="<?php echo base_url('privacy'); ?>" class="nav-bar-items">Privacy Policy</a></li>
              <li ><a data-toggle="modal" data-target="#about" class="nav-bar-items">FAQs</a></li>

            </ul>
          </div>
        </div>
  
      </div>
   
    </div>
    <div class="footer-bottom bg-black-333">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-md-6">
            <p class="font-11 text-black-777 m-0">Copyright &copy;<?php echo $config->copy_year; ?> <?php echo $config->system_name; ?>. All Rights Reserved</p>
          </div>
          <div class="col-md-6 text-right">
            <div class="widget no-border m-0">
              <ul class="list-inline sm-text-center mt-5 font-12">
               <!--  <li>
                  <a href="#">FAQ</a>
                </li>
                <li>|</li> -->
                
                <li>
                  <a href="#"><?php //echo $config->credit; ?></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->