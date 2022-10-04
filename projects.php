<?php
$pagg = 3;
include "inc.php";
$id =  isv("level");
$name = isv("name");
$prodpram = array();
if ($id)
    $prodpram = array("id" => $id);
if ($name)
    $prodpram = array("name" => $name);
$islevel = false;
$products = $core->getprojects($prodpram);
if ($id && !$products[0]["level"]) {
    $prodpram = array("level" => $products[0]["id"]);
    $lproducts = $core->getprojects($prodpram);
    $p_name = $products[0]["name" . $clang];
    if ($lproducts) {
        $islevel = $products[0]["name" . $clang];
        $products = $lproducts;
    }
}
?>
<style type="text/css">
    .tittle {
        margin-bottom: 60px;
    }

    .services-bl {
        padding: 5px;
    }

    .services-bl img {
        width: 100%;
    }

    .single-service-sidebar .service-pages li a .title h3 {
        color: #131313;

    }

    .single-service-sidebar .service-pages li a .icon span:before {

        color: #131313;

    }

    .single-service-sidebar .service-pages li:hover a .title,
    .single-service-sidebar .service-pages li.active a .title {
        background: #5b3230;
    }

    .single-service-sidebar .service-pages li:hover a .icon,
    .single-service-sidebar .service-pages li.active a .icon {
        background: #131313;
        border-color: #131313;
    }

    .single-service-sidebar .service-pages li.active a .title h3 {
        color: #ffff;
    }

    .single-service-sidebar .single-sidebar .service-title h3 {
        color: #000;
    }

    .single-service-image-box img {
        width: 100%;
        max-height: 500px;
    }

    .single-service-sidebar .service-pack-download li {
        position: relative;
        display: block;
        background: #131313;
        transition: all 500ms ease;
        padding: 23px 40px 23px;
    }

    .single-pricing-box {

        padding: 2px;

    }

    .single-pricing-box .inner {

        padding: 0px;
    }

    .col-md-3.col-sm-6.galley img {
        display: inline-block;
        float: none;
        height: 150px;
        position: relative;
        overflow: hidden;
    }
</style>
<div id="slides" class="services services-style1-area about-home-3">
    <div class="container">

        <div class="subtittle">
            <h2><?= ($name ? ($plang ? "نتيجة البحث عن  ' " . $name . " '" : "Search result for ' " . $name . " '") : ($id ? $p_name : getTitle("services" . $plang))) ?></h2>
        </div>

        <div class="serv_carosele services-area row  pt-0">


            <?php
            if ($products)
                for ($i = 0; $i < count($products); $i++) {
                    if (!$id || $islevel) {
                        if (!$id && !$islevel && $products[$i]["level"])
                            continue;
                        $link = $core->getPageUrl(array($products[$i]['id'], $products[$i]['name' . $clang]), "projects" . $plang);

            ?>
                    <div class="col-md-4 col-sm-6 col-lg-3  mt-3">
                        <div class="iter">
                            <div class="portfolio_c tg_two_cols   portfolio-1 tile scale-anm  all no_filter">
                                <div class="portfolio-img">
                                    <img src="images/Tower-1.jpg" alt="">
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
                    </div>



                <?php } else { ?>
                    <section style="transform: none;">
                        <div class="w-100 pt3-100 pb3-100 position-relative" style="transform: none;">
                            <div class="container" style="transform: none;">
                                <div class="post-detail-wrap w-100" style="transform: none;">
                                    <div class="row" style="transform: none;">
                                        <div class="col-md-12 col-sm-12 col-lg-8">

                                            <div class="theiaStickySidebar">
                                                <div class="post-detail w-100">
                                                    <img class="img-fluid w-100" src="images/<?= $products[$i]["image"] ?>" alt="Blog Detail Image">
                                                    <h4 class="my-3" style="color:#B6985E"><?= $products[$i]["location" . $clang] ?></h4>
                                                    <p class="mb-0"><?= $products[$i]["description" . $clang] ?></p>

                                                    <? $variable = $core->getData('amenities', 'where active = 1 and project_id = ' . $products[0]['id']);
                                                    if ($variable) { ?>
                                                        <hr>
                                                        <h4 class="mb-3" style="color:#B6985E"><?= plang('المزايا', 'Amenities') ?></h4>
                                                        <ul>
                                                            <?
                                                            foreach ($variable as $k => $v) { ?>
                                                                <li><a href="#"><?= $v["name" . $clang] ?></a></li>

                                                            <? } ?>
                                                        </ul>
                                                    <? } ?>
                                                    <hr>
                                                    <h4 class="mb-3" style="color:#B6985E"><?= plang('الموقع', 'Location') ?></h4>
                                                    <p class="mb-3"> <?= $products[$i]["location" . $clang] ?></p>
                                                    <iframe src="<?= $products[$i]["map"] ?>" style="width: 100%" height="450" frameborder="0" allowfullscreen=""></iframe>

                                                    <?php

                                                    if ($pagg == 7) {

                                                        $videospaaaarm = array("product_id" => $products[0]["id"]);

                                                        $videos = $core->getproducts_images($videospaaaarm);
                                                    } else if ($pagg == 6) {

                                                        $videospaaaarm = array("event_id" => $products[0]["id"]);

                                                        $videos = $core->geteventimages($videospaaaarm);
                                                    } else {

                                                        $videospaaaarm = array("services_id" => $products[0]["id"]);

                                                        $videos = $core->getservices_images($videospaaaarm);
                                                    }

                                                    if ($videos) {

                                                    ?>
                                                        <div class="detail-gal w-100">
                                                            <div class="row">
                                                                <?php

                                                                for ($i = 0; $i < count($videos); $i++) { ?>
                                                                    <div class="col-md-6 col-sm-4 col-lg-3">
                                                                        <a href="images/<?= $videos[$i]["image"] ?>" data-fancybox="gallery" title=""><img class="img-fluid" src="images/<?= $videos[$i]["image"] ?>" alt="Blog Detail Gallery Image 1"></a>
                                                                    </div>
                                                                <? } ?>

                                                            </div>
                                                        </div>

                                                    <? } ?>



                                                    <div class="detail-share w-100 mt-2">
                                                        <span><?= plang("شارك:", "Share:") ?></span>
                                                        <a class="facebook-clr" href="https://www.facebook.com/sharer/sharer.php?u=<?= $FUr ?>" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                                        <a class="twitter-clr" href="http://twitter.com/share?text=<?= $products[0]["smoll_description" . $clang] ?>&amp;url=<?= $FUr ?>" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>

                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-lg-4" style="">
                                            <!-- Sidebar Wrap -->
                                            <div class="theiaStickySidebar" style="">
                                                <aside class="sidebar-wrap w-100">
                                                    <?php if ($products[0]["video"]) { ?>
                                                        <div class="widget2 search_widget brd-rd5 w-100">
                                                            <div class="text">

                                                                <p style="text-align: center;">

                                                                    <iframe width="30%" height="100%" style="margin: auto; margin-right: 0%; border: 0px; min-height: 200px;" src="https://www.youtube.com/embed/<? echo $products[0]["video"]; ?>" allowfullscreen></iframe>
                                                                </p>


                                                            </div>
                                                        </div> <?php } ?>
                                                    <? if ($products[0]["file"] != null) { ?>
                                                        <div class="widget2 widget_brochur m-0">
                                                            <div class="widget-content">
                                                                <div class="icon"><img src="images/icon-60.png" alt=""></div>

                                                                <h4><?= plang('تحميل الكتيب', 'Download Brochure') ?></h4>
                                                                <a class="theme-btn btn-style-four mt-3" href="images/<?= $products[0]["file"] ?>"><?= plang('تحميل PDF', 'Download PDF') ?></a>
                                                            </div>
                                                        </div>
                                                    <? } ?>

                                                    <div class="widget2 category_widget brd-rd5 w-100 m-0">
                                                        <h3><?= plang("أبرز النقاط", "Highlights") ?></h3>
                                                        <ul class="mb-0 list-unstyled w-100">

                                                            <li>
                                                                <span><?= plang('الحالة', 'Status') ?>:</span> <?= !$products[0]["status"] ? plang("تحت الانشاء", "Under Construction") : plang("مكتمل", "Completed") ?>
                                                            </li>
                                                            <li>
                                                                <span><?= plang('الموقع', 'Location') ?>:</span> <?= $products[0]["location" . $clang] ?>
                                                            </li>
                                                            <li>
                                                                <span><?= plang('النوع', 'Type') ?>:</span> <?= $products[0]["type" . $clang] ?>
                                                            </li>
                                                            <li>
                                                                <span><?= plang('رقم الطابق', 'Floor NO') ?>:</span> <?= $products[0]["floor" . $clang] ?>
                                                            </li>
                                                            <li>
                                                                <span><?= plang('نطاق المساحات', 'Spaces Area Range') ?>:</span> <?= $products[0]["spaces"] ?>
                                                            </li>



                                                        </ul>
                                                    </div>


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
                                                        $mail->Subject = "Inquiry";
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
                                                    <div class="widget2 blog_widget brd-rd5 w-100">
                                                        <div class="content-column">
                                                            <div class="inner-column">
                                                                <div class="sec-title">

                                                                    <h2><?= plang('استفسار', 'Inquiry') ?> </h2>
                                                                </div>

                                                                <!-- Default Form -->
                                                                <div class="default-form">
                                                                    <form method="post" action="#">
                                                                        <div class="row clearfix">

                                                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                                                <input type="text" name="name" placeholder="<?= plang("الاسم الكامل", "Full Name") ?>" required>
                                                                            </div>

                                                                            <div class="col-lg-12 col-sm-12 form-group">
                                                                                <input type="text" name="phone" placeholder="<?= plang("هاتف", "Phone") ?>" required>
                                                                            </div>



                                                                            <div class="col-lg-12 col-sm-12 form-group">
                                                                                <input type="text" name="mail" placeholder="<?= plang("البريد الإلكتروني", "Email") ?>" required>
                                                                            </div>


                                                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                                                <textarea name="message" placeholder="<?= plang("اكتب رسالتك هنا", "Write Your Message Here") ?>"></textarea>
                                                                            </div>

                                                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">

                                                                                <button class="theme-btn btn-style-four" type="submit" name="submit-form"><span class="txt"> <?= plang('ارسال', 'SEND') ?></span></button>
                                                                            </div>
                                                                            <input type="hidden" name="project_name" value="<?= $products[0]["name" . $clang] ?>">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- End Default Form -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="widget2 blog_widget brd-rd5 w-100">
                                                        <h3><?= plang("اخر الاخبار", "Latest Blog") ?></h3>
                                                        <div class="blog-widget-post-list w-100">
                                                            <?php
                                                            $products = $core->getevents(array("special" => 1));
                                                            if ($products)
                                                                for ($i = 0; $i < count($products); $i++) {
                                                                    if ($products[$i]["level"])
                                                                        continue;
                                                                    $date = getDateTime($products[$i]["date"], $lang);
                                                            ?>
                                                                <div class="blog-mini-post w-100">
                                                                    <a href="news<?= $plang ?>.php?id=<?= $products[$i]["id"] ?>" title=""><img class="img-fluid" src="images/<?= $products[$i]["image"] ?>" alt="<?= $products[$i]["name" . $clang] ?>"></a>
                                                                    <div class="blog-mini-post-info">
                                                                        <h4 class="mb-0"><a href="news<?= $plang ?>.php?id=<?= $products[$i]["id"] ?>" title=""><?= $products[$i]["name" . $clang] ?></a></h4>
                                                                        <span class="d-block mini-post-date"><?= $date[0] ?> - <?= $date[1] ?> - <?= $date[2] ?></span>
                                                                    </div>
                                                                </div>
                                                            <? } ?>

                                                        </div>
                                                    </div>

                                                </aside>

                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Blog Detail Wrap -->
                            </div>
                        </div>
                    </section>

            <?php }
                } ?>





        </div>

    </div>
</div>
<?php
include "inc/footer.php";
?>