<?php
$pagg = 1;
include "inc.php";
/*
$lang : get form  inc.php  = arabic || english;
$plang : get form  inc.php for  php file name  = arabic || "";
$clang : get form  inc.php for column name  =  _arabic || "" ;
*/
?>

<!-- ABOUT COMPANY START -->
<div class="about-welcome section-full mobile-page-padding p-t80 p-b50 bg-gray">
    <div class="auto-container">
        <div class="section-content">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">

                    <div class="about-home-3 m-b30 bg-white">


                        <div class="sec-title">
                            <div class="title"><?= getTitle("about" . $plang) ?></div>
                            <h2><?= $alt ?></h2>
                            <div class="bar"></div>
                        </div>


                        <?= getValue('home_text', $lang) ?>

                        <a href="<?= $core->getPageUrl("about" . $plang) ?>" class="theme-btn btn-style-four"><span class="txt"><?= plang('اقرأ المزيد', 'Read More') ?>
                                <i class="lnr lnr-arrow-<?= plang("left", "right") ?>"></i></span></a>


                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="video-section-full-v2">
                        <div class="video-section-full" data-tilt data-tilt-max="3" style="background-image:url(images/so.jpg)">
                            <div class="overlay-main bg-black opacity-04"></div>
                            <div class="video-section-inner">
                                <div class="video-section-content">

                                    <a href="" class="mfp-video play-now">
                                        <i class="icon fal fa-play"></i>
                                        <span class="ripple"></span>

                                    </a>

                                    <div class="video-section-bottom">
                                        <h3 class="sx-title text-white"><?= plang('تجربتنا <br> تعمل على تطوير مستقبلك', 'Our Experience <br> develops your future') ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- ABOUT COMPANY END -->








<section class="services-area">
    <div class="auto-container">
        <div class="row">


            <div class="col-lg-4 col-sm-6">
                <div class="single-services">
                    <i class="fal fa-eye"></i>
                    <h3><?= plang('رؤيتنا', 'Our Vision') ?></h3>
                    <?= getValue('Vision', $lang) ?>
                    <a href="#" class="read-more">
                        <?= plang('اقرأ المزيد', 'Read More') ?>

                        <span class="flaticon-next"></span>
                    </a>
                    <span class="count">1</span>
                </div>
            </div>


            <div class="col-lg-4 col-sm-6">
                <div class="single-services">
                    <i class="fal fa-cog"></i>
                    <h3><?= plang('مهمتنا', 'Our Mission') ?></h3>
                    <?= getValue('mission', $lang) ?>

                    <a href="#" class="read-more">
                        <?= plang('اقرأ المزيد', 'Read More') ?>

                        <span class="flaticon-next"></span>
                    </a>
                    <span class="count">2</span>
                </div>
            </div>


            <div class="col-lg-4 col-sm-6">
                <div class="single-services">
                    <i class="fal fa-home-alt"></i>
                    <h3><?= plang('قيمنا', 'Our Values') ?></h3>
                    <?= getValue('values', $lang) ?>
                    <a href="#" class="read-more">
                        <?= plang('اقرأ المزيد', 'Read More') ?>

                        <span class="flaticon-next"></span>
                    </a>
                    <span class="count">3</span>
                </div>
            </div>


        </div>
    </div>
</section>













<div class="portfolio-block portfolio-block-5bb35973dede2 popup-gallery">
    <div class="auto-container">

        <div class="sec-title centered">
            <h2><?= getTitle("projects" . $plang) ?></h2>
            <div class="bar"></div>
        </div>



        <div class="all-time-hit-two-bg-shape" style="background-image: url(images/all-time-hit-two-bg-shape.webp);"></div>

        <div class="galvid owl-carousel custom-nav">

            <?php
            $products = $core->getprojects([]);
            if ($products)
                for ($i = 0; $i < count($products); $i++) {
                    if ($products[$i]["level"])
                        continue;
                    $link = $core->getPageUrl(array($products[$i]['id'], $products[$i]['name' . $clang]), "projects" . $plang);

            ?>
                <div class="iter">
                    <div class="portfolio_c tg_two_cols   portfolio-1 tile scale-anm  all no_filter">
                        <div class="portfolio-img">
                            <img src="images/<?= $products[$i]["image"] ?>" alt="">
                            <div class="tyo">
                                <span class="fal fa-arrow-<?= plang("left", "right") ?>"></span>
                                <div class="curl"></div>
                                <a href="<?= $link ?>"></a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="portfolio_classic_content">
                            <h3 class="portfolio_classic_title"><a href="<?= $link ?>"><?= $products[$i]["name" . $clang] ?></a></h3>
                            <div class="portfolio_classic_subtitle"><?= $products[$i]["location" . $clang] ?></div>
                        </div>
                    </div>
                </div>
            <? } ?>


        </div>
    </div>
</div>








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


<?php if (isset($_POST["message"])) {
    $text = "";
    foreach ($_POST as $key => $value) {
        $text .= ($text ? "<br>" : "") . ucfirst($key) . " : " . $value;
    }
    require("class.phpmailer.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "mail.sherktk.net";

    $mail->SMTPAuth = true;
    //$mail->SMTPSecure = "ssl";
    $mail->Port = 587;
    $mail->Username = "mail@sherktk.net";
    $mail->Password = "JCrS%^)qc!eH";

    $mail->From = "mail@sherktk.net";

    $mail->FromName = $name;
    $info_media["code"] = "email";
    $contents = $core->getinfo_media($info_media);
    $emaills = $contents[0]["link"];
    $mail->AddAddress($emaills);
    //$mail->AddReplyTo("mail@mail.com");
    $mail->IsHTML(true);
    $mail->Subject = "Get in touch";
    $mail->Body = $text;

    //$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

    // $core->addemail(array("email" => $_POST["email"]));
    if ($mail->Send()) {
?>

        <script type="text/javascript">
            alert("Thank you, we will contact you very soon !!");
        </script>

    <?php
    } else { ?>
        <script type="text/javascript">
            alert("<?= trim(htmlspecialchars_decode(str_replace("</p>", " ", str_replace("<p>", " ", $mail->ErrorInfo)))) ?>");
        </script>
<?php  }
} ?>


<!-- Faq Section -->
<section class="faq-section">
    <div class="auto-container">
        <div class="row align-items-center clearfix">




            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                </div>
            </div>
            <!-- Accordion Column -->
            <div class="accordion-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">




                    <!-- Content Column -->
                    <div class="content-column">
                        <div class="inner-column">
                            <div class="sec-title">

                                <h2><?= plang('ابقى على تواصل', 'get in touch') ?> </h2>
                                <p><?= plang('تحتاج المزيد من المعلومات؟', 'Need more information?') ?> </p>
                            </div>

                            <!-- Default Form -->
                            <div class="default-form">
                                <form method="post" action="#">
                                    <div class="row clearfix">

                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="firstname" placeholder="<?= plang("الاسم الاول", "First Name") ?>" required>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="lastname" placeholder="<?= plang("الكنية", "Last Name") ?>" required>
                                        </div>



                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="phone" placeholder="<?= plang("هاتف", "Phone") ?>" required>
                                        </div>



                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="mail" placeholder="<?= plang("البريد الإلكتروني", "Email") ?>" required>
                                        </div>


                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea name="message" placeholder="<?= plang("اكتب رسالتك هنا", "Write Your Message Here") ?>"></textarea>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">

                                            <button class="theme-btn btn-style-four" type="submit" name="submit-form"><span class="txt"> <?= plang('ارسال', 'SEND') ?></span></button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <!-- End Default Form -->

                        </div>
                    </div>












                </div>
            </div>


        </div>
    </div>
</section>
<!-- End Faq Section -->






<!-- News Section -->
<section class="news-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2><?= getTitle("news" . $plang) ?></h2>
            <div class="bar"></div>
        </div>
        <!-- End Sec Title -->

        <div class="owl-carousel three-item-carousel custom-nav">
            <?php
            $products = $core->getevents(array("special" => 1));
            if ($products)
                for ($i = 0; $i < count($products); $i++) {
                    if ($products[$i]["level"])
                        continue;
                    $date = getDateTime($products[$i]["date"], $lang);
            ?>
                <!-- News Block -->
                <div class="news-block">
                    <div class="inner-box">
                        <div class="image">
                            <a href=""><img src="images/<?= $products[$i]["image"] ?>" alt="<?= $products[$i]["name" . $clang] ?>" /></a>
                        </div>
                        <div class="lower-content">



                            <h5><a href="news<?= $plang ?>.php?id=<?= $products[$i]["id"] ?>"><?= $products[$i]["name" . $clang] ?></a></h5>




                            <ul class="post-meta">
                                <li><span class="icon flaticon-calendar"></span><?= $date[0] ?>, <?= $date[1] ?> <?= $date[2] ?></li>

                                <a href="news<?= $plang ?>.php?id=<?= $products[$i]["id"] ?>" class="read-more"><span class="txt"><?= plang('اقرأ المزيد', 'Read More') ?>
                                    </span></a>

                            </ul>



                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
</section>
<?php
include "inc/footer.php";
?>