<?
$pagg = 2;
include  "inc.php";
?>



<!-- About Us Area -->
<section class="about_us_area row about-home-3">
    <div class="container">
        <div class=" about_row">

            <div class="subtittle">
                <h2><?= $pageTitle ?></h2>
            </div>
            <div class="who_we_area col-md-12 col-sm-12 text che-have">
                <p></p>
                <p><?= getValue("about", $lang) ?></p>

            </div>







        </div>
    </div>
</section>

<section class="counter-area">
    <div class="auto-container">
        <div class="row align-iems-center">

            <div class="col-md-3 col-6">
                <div class="counter-item">
                    <i class="flaticon-medal"></i>
                    <h3>
                        <span class="counter"><?= getValue('experience_count') ?></span>
                    </h3>
                    <p> <?= plang('خبرة <br> سنوات', 'Experience <br> of Years') ?></p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="counter-item">
                    <i class="flaticon-team"></i>
                    <h3>
                        <span class="counter"><?= getValue('Employed') ?></span>
                    </h3>
                    <p><?= plang('فريق الخبرة لدينا', 'Our Experience <br> Team ') ?></p>
                </div>
            </div>


            <div class="col-md-3 col-6">
                <div class="counter-item">
                    <i class="flaticon-pencil-and-ruler"></i>
                    <h3>
                        <span class="counter"><?= getValue('Construction') ?></span>
                    </h3>
                    <p><?= plang('مشاريع <br> تحت الانشاء', 'Building Under <br>
                        Construction') ?></p>
                </div>
            </div>


            <div class="col-md-3 col-6">
                <div class="counter-item">
                    <i class="flaticon-home"></i>
                    <h3>
                        <span class="counter"><?= getValue('Projects') ?></span>
                    </h3>
                    <p><?= plang('مشاريعنا المكتملة', 'Completed <br>
                        Projects') ?></p>
                </div>
            </div>
        </div>
    </div>


</section>

<?php include "inc/footer.php" ?>