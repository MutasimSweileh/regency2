 <!-- Main Section Two -->
 <section class="main-slider-two">
     <div class="main-slider-carousel owl-carousel owl-theme">
         <?php

            $sliderpram = array();
            $sliders = $core->getslider($sliderpram);
            $ie = 0;
            foreach ($sliders as $slider) {  ?>
             <div class="slide">
                 <img src="images/<?= $slider["image"] ?>" />
                 <div class="pattern-layer-one" style="background-image: url(images/pattern-15.png);"></div>
                 <div class="pattern-layer-two" style="background-image: url(images/pattern-16.png);"></div>
                 <div class="container">
                     <!-- Content Boxed -->
                     <div class="content-boxed">
                         <div class="inner-box">
                             <h1><?= $alt ?></h1>
                             <div class="text"><?= $slider["title" . $clang] ?></div>
                             <div class="btns-box">
                                 <a href="<?= $slider["link"] ?>" class="theme-btn btn-style-two">
                                     <span class="txt"><?= plang('اقرأ المزيد', 'Read More') ?> <i class="lnr lnr-arrow-<?= plang("left", "right") ?>"></i></span>
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         <? } ?>
     </div>

     <div class="lines">
         <div class="line"></div>
         <div class="line"></div>
         <div class="line"></div>
         <div class="line"></div>
         <div class="line"></div>
         <div class="line"></div>
         <div class="line"></div>
         <div class="line"></div>
         <div class="line"></div>
     </div>
 </section>
 <!-- End Main Section -->