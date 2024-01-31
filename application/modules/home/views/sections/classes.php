
<?php

$classes=Modules::run('classes/getClasses');

?>


    <!-- Section: Our Features -->
    <section style="background-image: url(<?php echo base_url();?>assets/images/bg/actbg1.jpg); background-size: cover;">
      <div class="container" style="margin-top: 0px!important; padding-top-top: 0px!important; ">

             <div class="search-form" style="background-color: #fff;">
                  <form method='get' action="<?php echo base_url(); ?>courses/searchCourses">
                    <div class="input-group" >
                      <input type="text" name="term" placeholder="Search here e.g Pregnancy and childbirth advice" class="form-control search-input" style="font-size: 1.5rem;">
                      <span class="input-group-btn" >
                      <button type="submit" class="btn search-button" style="background-color: transparent!important;"><i class="fa fa-search"></i></button>
                      </span>
                    </div>
                  </form>
                </div>

      
        <div class="section-content" >

           <center > <h2 style="color: #fff!important;">Topical Categories</h2> </center>

          <div class="row text-center" >


            <?php foreach($classes as $row): ?>

            <div class="col-xs-12 col-sm-6 col-md-4" style="padding: 5px!important;" >

              <div class="icon-box  <?php echo $row->colour; ?> border-radius-5px media p-10 pr-10 pl-10 mb-5"> <a class="media-left pull-left flip p-10" href="<?php echo base_url(); ?>courses/classCourses/<?php echo $row->class_id; ?>"
              >

                <i class="fa <?php echo $row->icon; ?> text-white font-40"></i>

              </a>
                <div class="media-body">
                <h4 class="media-heading heading text-white">
                  <a href="<?php echo base_url(); ?>courses/classCourses/<?php echo $row->class_id; ?>" class="text-white">
                  <?php echo $row->class; ?>
                   
              </h4>
              <p class="text-white">
                    <?php echo str_truncate($row->details); ?> <br>
                    <span class="badge"><?php echo $row->age_range; ?></span>
                </p>
                </a>
                </div>
              </div>

            </div>
          

          <?php endforeach;


           ?>



          </div>
        </div>


      </div>
    </section>
