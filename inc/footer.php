<?php if (isset($_POST["subscribe"])) {
    $text =  $_POST["name"] . "<br>" . $_POST["email"];
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
    $mail->Subject = "Subscribe";
    $mail->Body = $text;

    //$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

    $core->addemail(array("email" => $_POST["email"]));
    if ($mail->Send()) {
?>

        <script type="text/javascript">
            alert("Thank you !!");
        </script>

    <?php
    } else { ?>
        <script type="text/javascript">
            alert("<?= trim(htmlspecialchars_decode(str_replace("</p>", " ", str_replace("<p>", " ", $mail->ErrorInfo)))) ?>");
        </script>
<?php  }
} ?>

<!-- Main Footer -->
<footer class="main-footer">
    <div class="auto-container">
        <div class="row">


            <div class="col-md-3 col-xs-12">
                <div class="widgets-section">

                    <div class="footer-logo">
                        <img src="images/logo.png" alt="">
                    </div>



                </div>
            </div>






            <div class="col-md-3 col-xs-12">
                <div class="widgets-section">
                    <h3 class="widget_title"><?= plang('معلومات الاتصال', 'contact info') ?></h3>
                    <ul class="contact-info-list">




                        <li>
                            <span class="icon"><i class="flaticon-map"></i></span>
                            <p><?= plang('العنوان', 'Address') ?></p>
                            <a href="" ttile=""><?= getValue('footer_adress', $lang) ?></a>
                        </li>


                        <li>
                            <span class="icon"><i class="flaticon-envelope"></i></span>
                            <p><?= plang('البريد الالكترونى', 'Mail address') ?></p>
                            <a href="mailto:<?= getValue('email') ?>"><?= getValue('email') ?></a>
                        </li>


                        <li>
                            <span class="icon"><i class="flaticon-headphones-1"></i></span>
                            <p><?= plang('الخط الساخن', 'Hotline') ?></p>
                            <a href="tel:+<?= getValue('header_phone') ?>"><?= getValue('header_phone') ?></a>
                        </li>



                    </ul>







                </div>
            </div>




            <div class="col-md-3 col-xs-12 desk-logo">
                <div class="widgets-section">
                    <h3 class="widget_title"><?= plang('روابط سريعة', 'quick links') ?></h3>
                    <ul class="quick-list">
                        <li><a href="<?= $core->getPageUrl("index" . $plang) ?>"><?= getTitle("index" . $plang) ?></a></li>
                        <li><a href="<?= $core->getPageUrl("about" . $plang) ?>"><?= getTitle("about" . $plang) ?></a></li>
                        <li><a href="<?= $core->getPageUrl("projects" . $plang) ?>"><?= getTitle("projects" . $plang) ?></a></li>
                        <li><a href="<?= $core->getPageUrl("video" . $plang) ?>"><?= getTitle("video" . $plang) ?></a></li>
                        <li><a href="<?= $core->getPageUrl("gallery" . $plang) ?>"><?= getTitle("gallery" . $plang) ?></a></li>
                        <li><a href="<?= $core->getPageUrl("news" . $plang) ?>"><?= getTitle("news" . $plang) ?></a></li>
                        <li><a href="<?= $core->getPageUrl("contact" . $plang) ?>"><?= getTitle("contact" . $plang) ?></a></li>
                    </ul>


                </div>
            </div>






            <div class="col-md-3 col-xs-12">
                <div class="widgets-section">

                    <h3 class="widget_title"><?= plang('النشرة الإخبارية', 'newsletter') ?></h3>

                    <div class="text"><?= plang('اشترك في نشرتنا الإخبارية!', 'Subscribe to our newsletter!') ?></div>

                    <div class="newsletter-form">
                        <form method="post" action="">
                            <div class="form-group">
                                <input type="email" name="email" value="" placeholder="<?= plang("أدخل بريدك الإلكتروني", "Enter your email") ?>" required="" />

                                <button type="submit" name="subscribe" value="subscribe">
                                    <i class="fal fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>



                    <ul class="social-box">
                        <li><a href="<?= getValue("facebook") ?>" target="_blank" class="fab fa-facebook-f"></a></li>
                        <li><a href="<?= getValue("twitter") ?>" target="_blank" class="fab fa-twitter"></a></li>
                        <li><a href="<?= getValue("linkedin") ?>" target="_blank" class="fab fa-linkedin-in"></a></li>
                        <li><a href="<?= getValue("instagram") ?>" target="_blank" class="fab fa-instagram"></a></li>
                    </ul>

                </div>
            </div>






        </div>
    </div>


    <div class="footer-bottom">
        <div class="auto-container">
            <div class="copyright">&copy; 2022 Regency Urban Development All Rights Reserved</div>
        </div>
    </div>


</footer>


</div>





<!-- Search Popup -->
<div class="search-popup">
    <div class="color-layer"></div>
    <button class="close-search"><span class="fal fa-arrow-up"></span></button>
    <form method="post" action="<?= $core->getPageUrl("projects" . $plang) ?>">
        <div class="form-group">
            <input type="search" name="name" value="" placeholder="<?= plang("ابحث هنا", "Search Here") ?>" required="" />
            <button type="submit"><i class="fal fa-search"></i></button>
        </div>
    </form>
</div>
<!-- End Header Search -->








<div class="all-ioc">
    <div class="show-icons">
        <div class="ico-img"></div>
        <div class="sonar-wave"></div>
        <div class="sonar-wave2"></div>
    </div>



    <div class="whats-icon" data-target="html">
        <a href="https://api.whatsapp.com/send?phone=+"><span class="icon fab fa-whatsapp"></span>
        </a>
    </div>



    <div class="messenger-icon" data-target="html">
        <a href="https://m.me/"><span class="icon fab fa-facebook-messenger"></span>
        </a>
    </div>


    <div class="phone-icon" data-target="html">
        <a href="tel:"><span class="icon fal fa-phone"></span>
        </a>
    </div>



</div>

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fal fa-arrow-up"></span></div>

<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/parallax.min.js"></script>
<script src="js/jquery.paroller.min.js"></script>


<script src="js/waypoints.min.js"></script><!-- WAYPOINTS JS -->
<script src="js/counterup.min.js"></script><!-- COUNTERUP JS -->



<script src="js/owl.js"></script>
<script src="js/nav-tool.js"></script>

<script src="js/script.js"></script>
<script src="js/venobox.min.js"></script>
<script>
    jQuery(document).ready(function($) {

        $('.venobox,.image-popup-vertical-fit').venobox({
            bgcolor: '',
            framewidth: '500px', // default: ''
            spinner: 'cube-grid', // default: ''
            frameheight: '400px', // default: ''
            overlayColor: 'rgba(6, 12, 34, 0.85)',
            closeBackground: '',
            closeColor: '#fff',
            titleattr: 'data-title',
            share: ['facebook', 'twitter', 'download'] // default: []
        });
    });
</script>
</body>

</html>