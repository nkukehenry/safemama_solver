
<?php

$categories=Modules::run('categories/getCategories');


?>


   <section class="" style="margin-bottom: 0px!important;padding-bottom: 0px!important;">
      <div class="container pb-70">
      
        <div class="section-content">
     
          <div class="row mt-sm-0 mt-0" >
           
           <?php foreach ($categories as $category): ?>

            <div class="col-sm-6 col-md-4 maxwidth500 mb-sm-10">
              <div class="<?php echo $category->colour; ?> text-center border-1px p-20 pt-0">
                <h3 class="text-white mt-20"><?php echo $category->category; ?></h3>
                <p class="text-white">

                  <?php echo $category->description; ?>

                </p>
                <a href="<?php echo base_url(); ?>courses/categoryCourses/<?php echo $category->category_id; ?>" class="btn btn-default">Go here</a>
              </div>
            </div>

          <?php endforeach; ?>
           

          </div>
       </div>
     </div>
    </section>