
<?php 

include('includes/css_files.php'); 
include('includes/header.php');
include('includes/login_modal.php');

 ?>


  <!-- Start main-content -->
  <div class="main-content">


    <?php

    
    $this->load->view($module."/".$view);

    ?>


  <!-- end main-content -->
  </div>

  <!-- Footer -->
<?php 

include('includes/footer.php');

include('includes/js_files.php'); 

// include('includes/home_js.php'); 

?>