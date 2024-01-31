
<?php

$sliders=Modules::run('utility/getSliders','home'); //get sliders for the page home

$i=1;

foreach ($sliders as $slider) {

  if($i==1){
  
$slider_image1=$slider->image;
$slider_title1=$slider->title;
$slider_subtitle1=$slider->subtitle;
$slider_text1=$slider->text;
$slider_link1=$slider->link;
}

if($i==2){
  
$slider_image2=$slider->image;
$slider_title2=$slider->title;
$slider_subtitle2=$slider->subtitle;
$slider_text2=$slider->text;
$slider_link2=$slider->link;
}

if($i==3){
  
$slider_image3=$slider->image;
$slider_title3=$slider->title;
$slider_subtitle3=$slider->subtitle;
$slider_text3=$slider->text;
$slider_link3=$slider->link;
}

$i++;
}

?>



<!-- Section: home -->
    <section id="home">
      <div class="container-fluid p-0">
        
        <!-- Slider Revolution Start -->
        <div class="rev_slider_wrapper" style="max-height: 500px!important; overflow-y: hidden;">
          <div class="rev_slider rev_slider_default" data-version="5.0" >
            <ul >

              <!-- SLIDE 1 -->
              <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="<?php echo base_url(); ?>assets/images/bg/<?php echo $slider_image1; ?>" data-rotate="0"  data-fstransition="fade" data-saveperformance="off" data-title="DAS" data-description="">
               

                <!-- MAIN IMAGE -->
                <img src="<?php echo base_url(); ?>assets/images/bg/<?php echo $slider_image1; ?>"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" 
                  id="slide-1-layer-1" 
                  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                  data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                  data-width="full"
                  data-height="full"
                  data-whitespace="normal"
                  data-transform_idle="o:1;"
                  data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                  data-start="1000" 
                  data-basealign="slide" 
                  data-responsive_offset="on" 
                  style="z-index: 5;background-color:rgba(0, 0, 0, 0.05);border-color:rgba(0, 0, 0, 1.00);"> 
                </div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme sft font-Lobster font-weight-700 text-theme-color-blue" 
                  id="rs-1-layer-2"

                  data-x="['left']"
                  data-hoffset="['0']"
                  data-y="['middle']"
                  data-voffset="['0']"
                  data-fontsize="['28']"
                  data-lineheight="['48']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="600"
                  data-splitin="none"
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  style="z-index: 5; white-space: nowrap; margin-bottom: 30%;"><?php echo $slider_subtitle1; ?>
                </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme sft text-theme-color-blue font-Lobster font-weight-700 m-0" 
                  id="rs-1-layer-3"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['-50']"
                  data-fontsize="['78']"
                  data-lineheight="['96']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="800"
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  style="z-index: 5; white-space: nowrap;"><?php echo $slider_title1; ?></span>
                </div>

                <!-- LAYER NR. 4 -->
                <div class="tp-caption tp-resizeme sft text-white" 
                  id="rs-1-layer-4"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['20']"
                  data-fontsize="['16','18',24']"
                  data-lineheight="['28']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="1200"
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; font-weight:500;">
                  <?php echo $slider_text1; ?>
                </div>

                <!-- LAYER NR. 5 -->
                <div class="tp-caption sft" 
                  id="rs-1-layer-5"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['90','100','110']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="1400"
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; letter-spacing:1px;">
                  <?php if($slider_link1) { ?>
                  <a class="btn btn-colored btn-theme-color-blue btn-lg btn-flat font-weight-600 pl-30 pr-30" href="#">Contact Us</a>

                  <?php } ?>
                </div>
              </li>

              <!-- SLIDE 2 -->
              <li data-index="rs-2" data-transition="fade" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="<?php echo base_url(); ?>assets/images/bg/<?php echo $slider_image2; ?>" data-rotate="0"  data-fstransition="fade" data-saveperformance="off" data-title="Web Show" data-description="">
                <!-- MAIN IMAGE -->
                <img src="<?php echo base_url(); ?>assets/images/bg/<?php echo $slider_image2; ?>"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" 
                  id="slide-2-layer-1" 
                  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                  data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                  data-width="full"
                  data-height="full"
                  data-whitespace="normal"
                  data-transform_idle="o:1;"
                  data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                  data-start="1000" 
                  data-basealign="slide" 
                  data-responsive_offset="on" 
                  style="z-index: 5;background-color:rgba(0, 0, 0, 0.05);border-color:rgba(0, 0, 0, 1.00);"> 
                </div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme sft font-Lobster font-weight-700 text-theme-color-green" 
                  id="rs-2-layer-2"

                  data-x="['right']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['-115']"
                  data-fontsize="['28']"
                  data-lineheight="['48']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="600"
                  data-splitin="none"
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  style="z-index: 5; white-space: nowrap;"><?php echo $slider_subtitle2; ?>
                </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme sft text-theme-color-sky font-Lobster font-weight-700 m-0" 
                  id="rs-2-layer-3"

                  data-x="['right']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['-50']"
                  data-fontsize="['78']"
                  data-lineheight="['96']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="800"
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  style="z-index: 5; white-space: nowrap;"><?php echo $slider_title2; ?></span>
                </div>

                <!-- LAYER NR. 4 -->
                <div class="tp-caption tp-resizeme sft text-white" 
                  id="rs-2-layer-4"

                  data-x="['right']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['20']"
                  data-fontsize="['16','18',24']"
                  data-lineheight="['28']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="1200"
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; font-weight:500; font-size: 10%;">
                  <?php echo $slider_text2; ?>
                </div>

                <!-- LAYER NR. 5 -->
                <div class="tp-caption sft" 
                  id="rs-2-layer-5"

                  data-x="['right']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['90','100','110']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="1400"
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; letter-spacing:1px;">

                  <?php if($slider_link2){ ?>
                  <a class="btn btn-colored btn-theme-color-blue btn-lg btn-flat font-weight-600 pl-30 pr-30" href="#">Contact Us</a>

                  <?php } ?>
                </div>
              </li>

              <!-- SLIDE 3 -->
              <li data-index="rs-3" data-transition="fade" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="<?php echo base_url(); ?>assets/images/bg/<?php echo $slider_image3; ?>" data-rotate="0"  data-fstransition="fade" data-saveperformance="off" data-title="Web Show" data-description="">
                <!-- MAIN IMAGE -->
                <img src="<?php echo base_url(); ?>assets/images/bg/<?php echo $slider_image3; ?>"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" 
                  id="slide-3-layer-1" 
                  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                  data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                  data-width="full"
                  data-height="full"
                  data-whitespace="normal"
                  data-transform_idle="o:1;"
                  data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                  data-start="1000" 
                  data-basealign="slide" 
                  data-responsive_offset="on" 
                  style="z-index: 5;background-color:rgba(0, 0, 0, 0.05);border-color:rgba(0, 0, 0, 1.00);"> 
                </div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme sft font-Lobster font-weight-700 text-theme-color-green" 
                  id="rs-3-layer-2"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['-115']"
                  data-fontsize="['28']"
                  data-lineheight="['48']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="600"
                  data-splitin="none"
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  style="z-index: 5; white-space: nowrap;"><?php echo $slider_subtitle3; ?>
                </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme sft text-theme-color-lemon font-Lobster font-weight-700 m-0" 
                  id="rs-3-layer-3"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['-50']"
                  data-fontsize="['78']"
                  data-lineheight="['96']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="800"
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  style="z-index: 5; white-space: nowrap;">
                  <?php echo $slider_title3; ?>
                </span>
                </div>

                <!-- LAYER NR. 4 -->
                <div class="tp-caption tp-resizeme sft text-black" 
                  id="rs-3-layer-4"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['20']"
                  data-fontsize="['16','18',24']"
                  data-lineheight="['28']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="1200"
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; font-weight:500;">
                  <font color="white">
                    <?php echo $slider_text3; ?>
                  </font>
                </div>

                <!-- LAYER NR. 5 -->
                <div class="tp-caption sft" 
                  id="rs-3-layer-5"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['90','100','110']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="1400"
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; letter-spacing:1px;">
                  <?php if($slider_link3){ ?>
                  <a class="btn btn-colored btn-theme-color-blue btn-lg btn-flat font-weight-600 pl-30 pr-30" href="#">Contact Us</a>

                  <?php } ?>
                </div>
              </li>

            </ul>
          </div>
          <!-- end .rev_slider -->
        </div>
        <!-- end .rev_slider_wrapper -->
        <script>
          $(document).ready(function(e) {
            $(".rev_slider_default").revolution({
              sliderType:"standard",
              sliderLayout: "auto",
              dottedOverlay: "none",
              delay: 5000,
              navigation: {
                  keyboardNavigation: "off",
                  keyboard_direction: "horizontal",
                  mouseScrollNavigation: "off",
                  onHoverStop: "off",
                  touch: {
                      touchenabled: "on",
                      swipe_threshold: 75,
                      swipe_min_touches: 1,
                      swipe_direction: "horizontal",
                      drag_block_vertical: false
                  },
                arrows: {
                  style: "gyges",
                  enable: true,
                  hide_onmobile: false,
                  hide_onleave: true,
                  hide_delay: 200,
                  hide_delay_mobile: 1200,
                  tmp: '',
                  left: {
                      h_align: "left",
                      v_align: "center",
                      h_offset: 0,
                      v_offset: 0
                  },
                  right: {
                      h_align: "right",
                      v_align: "center",
                      h_offset: 0,
                      v_offset: 0
                  }
                },
                bullets: {
                  enable: true,
                  hide_onmobile: true,
                  hide_under: 800,
                  style: "hebe",
                  hide_onleave: false,
                  direction: "horizontal",
                  h_align: "center",
                  v_align: "bottom",
                  h_offset: 0,
                  v_offset: 30,
                  space: 5,
                  tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-imageoverlay"></span><span class="tp-bullet-title"></span>'
                }
              },
              responsiveLevels: [1240, 1024, 778],
              visibilityLevels: [1240, 1024, 778],
              gridwidth: [1170, 1024, 778, 480],
              gridheight: [840, 768, 960, 720],
              lazyType: "none",
              parallax: {
                  origo: "slidercenter",
                  speed: 1000,
                  levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
                  type: "scroll"
              },
              shadow: 0,
              spinner: "off",
              stopLoop: "on",
              stopAfterLoops: 0,
              stopAtSlide: -1,
              shuffle: "off",
              autoHeight: "off",
              fullScreenAutoWidth: "off",
              fullScreenAlignForce: "off",
              fullScreenOffsetContainer: "",
              fullScreenOffset: "0",
              hideThumbsOnMobile: "off",
              hideSliderAtLimit: 0,
              hideCaptionAtLimit: 0,
              hideAllCaptionAtLilmit: 0,
              debugMode: false,
              fallbacks: {
                  simplifyAll: "off",
                  nextSlideOnWindowFocus: "off",
                  disableFocusListener: false,
              }
            });
          });
        </script>
        <!-- Slider Revolution Ends -->
      </div>
    </section>
