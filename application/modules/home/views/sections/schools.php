
<?php
//only verified schools
 $schools = Modules::run('classes/getVerifiedSchools');

 if(count($schools)>0):

?>

<style type="text/css">
</style>

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.3.8/css/swiper.min.css'>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.3.8/js/swiper.min.js"></script>



        <style class="cp-pen-styles">

    .swiper-container {
        width: 100%;
        min-height: 40%px;
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #edf5ce;
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        padding: 0.5%;
        padding-top:5%;
        padding-bottom:5%;
        color: #474542;
      /*width:90%;*/ 
    }
    @media screen and (max-width: 600px) {

      .swiper-slide {
         width: 100%;
         padding: 0.3%;
         padding-top:1%;
        padding-bottom:1%;
        font-size: 12pt;
      }
      .swiper-slide h4 {
         font-size: 11pt;
      }
      .swiper-container{
        margin-left: 0;
        margin-right: 0;
      }
      .sec{
        margin-left: 0;
        margin-right: 0;
        padding-left:0;
        padding-right: 0;
      }
    }
  </style>

<section  style="background-color: rgba(0,0,0,0.6);">
    <div class="container sec">
      <div class="section-content" >
        <h4><center class="text-white">Partner Schools<br></center></h4>

<!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
          <?php foreach ($schools as $row): ?>
            
            <div class="swiper-slide">
              <a href="<?php echo base_url(); ?>school/<?=$row->school_id?>">
              <h4><?=$row->schoolname?> <br><small><?=$row->schooladdress?></small></h4>
             </a>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
<script >

  var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        spaceBetween: 0,
        loop: true,
        autoplay:true,
        autoplayDisableOnInteraction: false,
        slidesPerView: 4,
        coverflow: {
          rotate: 30,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows : true
        }
    });

//# sourceURL=pen.js
</script>

    </div>
    </div>
  </section>

<?php endif; ?>
  