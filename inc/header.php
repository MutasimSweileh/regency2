<?php
ob_start();
session_start();
$issingle = 0;
$engine = array();
$engines = $core->getEngines($engine);
$titlee = $core->getEngines(array("page" => "info" . $plang))[0];
$title = $titlee["title"];
$str = $titlee["title"];
$alt = $titlee["title"];
$alt_ar = "";
$description =  $titlee["description"];
$keywords = $titlee["keywords"];
$name = pathinfo(basename($_SERVER["PHP_SELF"]))["filename"];
$pageName = str_replace("arabic", "", $pageTitle);
$exname = pathinfo(basename($_SERVER["PHP_SELF"]))["extension"];
if (is_array(@$engines)) {
    foreach ($engines as $engine) {
        //if(basename($_SERVER["PHP_SELF"]).($_SERVER["QUERY_STRING"] ? "?" . $_SERVER["QUERY_STRING"] : "" ) == $engine["page"]) {
        if ($name . ".php" == $engine["page"]) {
            $exDescription = $engine["description"];
            $exKeywords = $engine["keywords"];
            $exTitle = $engine["title"];
            $id = isv("id");
            if (!$id)
                $id = isv("level");
            $exTitle = $engine["title"];
            if ($id) {
                $array = array("id" => $id);
                $exTitle = (strpos($name, "news") !== false ? $core->getevents($array)[0]["name" . $clang] : (strpos($name, "services") !== false && $core->getservices($array)[0]["name" . $clang] ? $core->getservices($array)[0]["name" . $clang] : (strpos($name, "products") !== false || $pagg == 3 ? $core->getproducts($array)[0]["name" . $clang] : $core->getprojects($array)[0]["name" . $clang])));
                $exTitle = (strpos($name, "career") !== false ? $core->getData("job_opportunities", $array)[0]["name" . $clang] : $exTitle);
                $exTitle = (strpos($name, "projects") !== false ? $core->getData("projects", $array)[0]["name" . $clang] : $exTitle);
                if (!$exTitle)
                    $exTitle = $engine["title"];
            }
            $pageTitle = $exTitle;
        }
    }
}
if (@$exTitle) $title = $exTitle  . " | $str";
if (@$exDescription) $description = $exDescription . " | $description";
if (@$exKeywords) $keywords = $keywords . "," . $exKeywords;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="Description" content="<?= $description ?>" />
    <title><?= $title ?></title>
    <meta name="keywords" content="<?= $keywords ?>" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/icofont.css" rel="stylesheet" />
    <link href="css/fontawesome-all.css" rel="stylesheet" />
    <link href="css/flaticon.css" rel="stylesheet" />
    <link href="css/flaticon2.css" rel="stylesheet" />
    <link href="css/animate.css" rel="stylesheet" />
    <link href="css/owl.css" rel="stylesheet" />
    <link href="css/linearicons.css" rel="stylesheet" />
    <link href="css/jquery-ui.css" rel="stylesheet" />
    <link href="css/custom-animate.css" rel="stylesheet" />
    <link href="css/jquery.fancybox.min.css" rel="stylesheet" />
    <link href="css/jquery.mCustomScrollbar.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <link rel="icon" href="images/favicon.png" type="image/x-icon" />
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link href="css/venobox.css" rel="stylesheet" />
    <style type="text/css">
        .widget2>form {
            position: relative;
        }

        .widget2 {
            background-color: #f8f8f9;
            padding: 1.875rem;
            overflow: hidden;
        }

        .widget2 ul li span.rate {
            color: var(--color3);
        }

        .blog-mini-post {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .blog-mini-post>a {
            flex: 0 0 3.75rem;
            height: 3.75rem;
            line-height: 3.75rem;
            text-align: center;
            background-color: #eef3f6;
        }

        .blog-mini-post>a+.blog-mini-post-info {
            flex: 0 0 calc(100% - 3.75rem);
            max-width: calc(100% - 3.75rem);
            padding-left: 1.125rem;
        }

        .blog-mini-post-info>h4 {
            font-size: 14px;
            font-weight: 500;
        }

        .blog-mini-post-info>span {
            font-size: 13px;
            margin-top: 2px;
        }

        .twitter-clr,
        .twitter:hover,
        .twitter:focus {
            color: #55acee;
        }

        .detail-share>a {
            display: inline-block;
            font-size: 1.125rem;
            vertical-align: middle;
            margin-left: 0.9375rem;
        }

        .detail-share>span {
            display: inline-block;
            font-family: Poppins;
            color: var(--color1);
        }



        .blog-mini-post-info>span.mini-post-date {
            color: #414042;
        }

        .blog-mini-post-info>span.mini-post-comments {
            color: #777;
        }

        .blog-mini-post-info>span i {
            margin-right: 5px;
        }

        .blog-mini-post:not(:first-child) {
            margin-top: 1.125rem;
        }

        .widget-video-box>a {
            color: #fff;
            position: absolute;
            left: 50%;
            top: 50%;
            text-align: center;
            height: 6.25rem;
            line-height: 6.25rem;
            width: 6.25rem;
            font-size: 2.5rem;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .widget-video-box>a:hover,
        .widget-video-box>a:focus {
            background-color: var(--color1);
        }

        .widget2>form button {
            position: absolute;
            right: 0;
            width: 2.5rem;
            bottom: 0;
            top: 0;
            background-color: transparent;
            outline: 0 !important;
            border: 0;
        }

        .widget2>form input {
            background-color: #fff;
            width: 100%;
            border: 1px solid #e2e2e4;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            font-size: 14px;
            height: 3.4375rem;
            padding: 1rem 2.5rem 1rem 1.875rem;
        }

        .widget2>form button {
            position: absolute;
            right: 0;
            width: 2.5rem;
            bottom: 0;
            top: 0;
            background-color: transparent;
        }

        .widget2 ul {
            margin-top: -.75rem;
        }

        .widget2 ul li {
            width: 100%;
            font-size: 14px;
            position: relative;
        }

        .widget2 ul li a {
            display: inline-block;
            padding-left: 1.5625rem;
        }

        .widget2.category_widget ul li {
            text-align: left;
        }

        .widget2.category_widget ul li a {
            float: left;
        }

        .widget2 ul li a::before,
        .widget2 ul li a::after {
            content: "";
            position: absolute;
            left: 0;
            top: 4px;
            height: .9375rem;
            width: .9375rem;
            -webkit-border-radius: 2px;
            border-radius: 2px;
        }

        .widget2 ul li a::before {
            border: 1px solid #e5f1f3;
            background-color: #fff;
        }

        .widget2 ul li a:after {
            opacity: 0;
            -webkit-transform: scale(0);
            -ms-transform: scale(0);
            -o-transform: scale(0);
            transform: scale(0);
        }

        .widget2 ul li:hover>a::after,
        .widget2 ul li a:focus::after {
            opacity: 1;
            -webkit-transform: scale(.5);
            -ms-transform: scale(.5);
            -o-transform: scale(.5);
            transform: scale(.5);
        }

        .widget2 ul li:not(:first-child) {
            margin-top: .75rem;
        }

        .tagclouds>a {
            color: #fff;
            display: inline-block;
            background-color: var(--color1);
            margin: 0 4px 8px;
            font-size: 14px;
            padding: 5.5px 1.25rem;
            position: relative;
            z-index: 1;
        }

        .breadcrumb-sec {
            margin-top: 36px;
        }

        .widget2>h3 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 1.5625rem;
        }

        @media (min-width: 1200px) {
            nav.main-menu ul.menu>li>a {
                padding: 0 15px;
            }
        }

        .gallery-section {
            position: relative;
            padding: 40px 0px;
            background: #f6f6f6;
        }

        .gallery-item {
            position: relative;
        }

        .gallery-item .image-box {
            position: relative;
            overflow: hidden;
        }

        .widget_categories_two .categories-list li a {

            padding: 14px 10px 13px 42px;
        }

        .gallery-item .image-box .image {
            position: relative;
            margin: 0;
        }

        .gallery-item .image-box .image img {
            display: inline-block;
            width: auto;
            height: auto;
        }

        .gallery-item .image-box .image {
            float: none;
        }

        .gallery-item .overlay-box {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            text-align: center;
            background: #a0010199;
            content: "";
            -webkit-transition: -webkit-transform 0.4s ease;
            transition: -webkit-transform 0.4s ease;
            transition: transform 0.4s ease;
            transition: transform 0.4s ease, -webkit-transform 0.4s ease;
            -webkit-transform: scale(0, 1);
            -ms-transform: scale(0, 1);
            transform: scale(0, 1);
            -webkit-transform-origin: right center;
            -ms-transform-origin: right center;
            transform-origin: right center;
        }

        .gallery-item .image-box:hover .overlay-box {
            -webkit-transform: scale(1, 1);
            -ms-transform: scale(1, 1);
            transform: scale(1, 1);
            -webkit-transform-origin: left center;
            -ms-transform-origin: left center;
            transform-origin: left center;
        }

        .gallery-item .overlay-box a {
            position: absolute;
            left: 50%;
            top: 50%;
            margin-top: -25px;
            margin-left: -25px;
        }

        .gallery-item .overlay-box a span {
            display: block;
            height: 58px;
            width: 58px;
            color: #ffffff;
            border-radius: 50%;
            font-weight: 400;
            line-height: 58px;
            font-size: 30px;
        }

        .gallery-section .owl-nav {
            display: none;
        }

        .styled-icons a {
            color: #333333;
            font-size: 18px;
            height: 32px;
            line-height: 32px;
            width: 32px;
            float: left;
            margin: 5px 7px 5px 0;
            text-align: center;
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .styled-icons a:hover {
            color: #666666;
        }

        .styled-icons.icon-gray a {
            background-color: #eeeeee;
            color: #555555;
            display: block;
            font-size: 18px;
            height: 36px;
            line-height: 36px;
            width: 36px;
        }

        .styled-icons.icon-gray a:hover {
            color: #bbbbbb;
        }

        .styled-icons.icon-gray.icon-bordered a {
            background-color: transparent;
            border: 2px solid #eeeeee;
        }

        .styled-icons.icon-gray.icon-bordered a:hover {
            border: 2px solid #d5d5d5;
        }

        .styled-icons.icon-dark a {
            background-color: #333333;
            color: #eeeeee;
            display: block;
            font-size: 18px;
            height: 36px;
            line-height: 36px;
            width: 36px;
        }

        .styled-icons.icon-dark.icon-bordered a {
            background-color: transparent;
            border: 2px solid #111111;
            color: #111111;
        }

        .styled-icons.icon-dark.icon-bordered a:hover {
            background-color: #111111;
            border-color: #111111;
            color: #fff;
        }

        .styled-icons.icon-bordered a {
            border: 1px solid #777777;
        }

        .styled-icons.icon-bordered a:hover {
            background-color: #777777;
            color: #fff;
        }

        .styled-icons.icon-rounded a {
            border-radius: 3px;
        }

        .styled-icons.icon-circled a {
            border-radius: 50%;
        }

        .styled-icons.icon-sm a {
            font-size: 13px;
            height: 30px;
            line-height: 30px;
            margin: 2px 7px 2px 0;
            width: 30px;
        }

        .styled-icons.icon-md a {
            font-size: 24px;
            height: 50px;
            line-height: 50px;
            width: 50px;
        }

        .styled-icons.icon-lg a {
            font-size: 32px;
            height: 60px;
            line-height: 60px;
            width: 60px;
        }

        .styled-icons.icon-xl a {
            font-size: 60px;
            height: 120px;
            line-height: 120px;
            width: 120px;
        }

        .styled-icons li {
            display: inline-block;
            margin-bottom: 0;
            margin-top: 0;
        }

        .icon-box i {
            display: inline-block;
            font-size: 40px;
        }

        ul.styled-icons.icon-dark.icon-sm.icon-circled i {
            font-size: 17px;
        }

        a.media-left {
            margin-top: 11px;
            margin-right: 13px;
            float: left;
        }

        .media-right,
        .media>.pull-right {
            padding-left: 10px;
        }

        .inner-page-wrapper.blog-wrapper:before {
            background: none;
        }

        .inner-page-wrapper.blog-wrapper {
            background: none;
            padding: 50px 0 90px;
        }

        .inner-page-wrapper.blog-wrapper .post-detail {
            background: #f9f9f9;
        }

        .blog-wrapper {
            background: #fff;
            z-index: 9;
            position: relative;
            padding: 50px 0;
        }

        .blog-wrapper h2 {
            color: #2d2d2d;
        }

        .blog-wrapper .post-img {
            width: 100%;
            position: relative;
            padding: 0px;
            height: 100%;
            overflow: hidden;
        }

        .blog-wrapper .post-img img {
            width: 100%;
            transition: all 0.5s ease-in-out;
            height: 300px;
        }

        .blog_card:hover .post-img img {
            -moz-transform: scale(1.1);
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }

        .blog-wrapper .post-img .posted_on {
            border-radius: 50%;
            position: absolute;
            text-align: center;
            padding: 16px 10px;
            height: 70px;
            width: 70px;
            top: 15px;
            right: 15px;
            bottom: 10px;
            background: #3fb4fb;
        }

        .blog-wrapper .post-img .posted_on span.date {
            font-size: 25px;
            display: block;
            color: #fff;
            font-weight: 700;
            line-height: 20px;
        }

        .blog-wrapper .post-img .posted_on span.month {
            font-size: 14px;
            display: block;
            color: #fff;
            font-weight: 400;
        }

        .blog-wrapper .blog_card {
            display: inline-block;
            margin: 0 0 20px;
        }

        .blog-wrapper .post-detail {
            padding: 20px;
            border: none;
            border-top: 0px;
            width: 100% !important;
            display: inline-block;
        }

        .blog-wrapper .post-detail h5 {
            font-size: 16px;
            font-weight: normal;
            line-height: 21px;
        }

        .blog-wrapper .post-detail .post-status {
            margin: 10px 0 5px;
            width: 100%;
            display: inline-block;
        }

        .blog-wrapper .post-detail .post-status ul {
            list-style: none;
            padding: 0px;
            margin: 0px;
        }

        .blog-wrapper .post-detail .post-status ul li {
            float: left;
            min-width: 50px;
            color: #797979;
            margin-right: 20px;
            font-size: 14px;
        }

        .blog-wrapper .post-status ul li i {
            color: #3fb4fb;
        }

        .theme-button-one {
            line-height: 30px;
            font-size: 14px;
            text-transform: capitalize;
            padding: 0px 15px;
            position: relative;
            z-index: 1;
            color: #fff;
            border-radius: 25px;
            text-align: center;
            background: #4775b7;
            display: inline-block;
            box-shadow: none;
            border: none;
        }

        .bttn>span {
            color: #fff;
        }

        .bttn:hover>span {
            color: #fff;
        }

        .blog-wrapper .post-status ul li span a {
            color: #797979;
        }

        .blog-wrapper .post-detail .post-status ul li:last-child {
            margin-right: 0;
        }

        .blog-wrapper .post-detail .post-status ul li i::before {
            margin-right: 5px;
            font-size: 14px;
        }

        .blog-wrapper .description p {
            margin: 0 0 25px;
        }

        .description a {
            margin-top: 10px;
        }

        .blog-details-wrapper .post-commet {
            border-bottom: 1px solid #e7e4dd;
            border-top: 1px solid #e7e4dd;
            font-size: 14px;
            margin: 60px 0 30px;
            padding: 15px 0;
            text-align: left;
            text-transform: uppercase;
        }

        .blog-details-wrapper .post-commet .social-icons {
            margin-top: 1px;
            font-size: 16px;
            float: right;
            margin-top: 0;
        }

        .arabiccaptcha {
            text-align: left !important;
            float: right !important;
            margin-left: 10px !important;
            margin-top: 8px !important;
        }

        .form-control {
            border-radius: 0;
            box-shadow: none;
            height: 45px;
            border: 1px solid #eeeeee;
            text-align: left;
        }

        .embed-responsive-16by9 iframe {
            max-height: 300px;
            width: 95%;
            margin: unset !important;
            margin-right: auto !important;
        }

        .embed-responsive-16by9 {
            padding-bottom: 0;
            overflow: initial;
        }

        ul.styled-icons.icon-dark.icon-sm.icon-circled {
            display: inline-block;
        }

        .vgpc-post-readmoref {
            float: right;
        }

        <?php if ($id) {
        ?>span.date {
            display: inline-block;
            top: 10px;
            position: absolute;
            right: 13%;
        }

        <?php } ?>.hide {
            display: none !important;
        }

        #text-3>div.footer-contact.address>div.ft-contact.fax>p,
        #text-3>div.footer-contact.address>div:nth-child(4)>p {
            direction: ltr;
            text-align: left;
        }

        .top-contact-info li {
            direction: ltr;
        }

        @media (min-width: 768px) {
            <?php if ($pagg != 1) { ?><?php  }  ?>
        }

        @media (max-width: 767px) {
            .header_aera {
                background: #00578fcc;
            }

            .header_aera .navbar-collapse .navbar-nav.navbar-right li a {
                padding: 3px 16px;
            }

            a.nav_searchFrom {
                color: #f6f8f8;
            }

            .navbar-default .navbar-toggle .icon-bar {
                background-color: #f6f8f8;
            }
        }

        img {
            max-width: 100%;
        }

        .image {
            text-align: center;
        }

        .col-md-2.col-sm-6.galley:hover img {
            -moz-transform: scale(2);
            -webkit-transform: scale(2);
            -o-transform: scale(2);
            -ms-transform: scale(2);
            transform: scale(2);
        }

        .header-nav .nav>li,
        .is-fixed .header-nav .nav>li {}

        .col-md-2.col-sm-6.galley img {
            height: 100%;
            display: block;
            margin: 0;
            width: 100%;
            height: 100%;
            box-shadow: 0 0 0 rgba(0, 0, 0, 0);
            -webkit-box-shadow: 0 0 0 rgba(0, 0, 0, 0);
            -moz-box-shadow: 0 0 0 rgba(0, 0, 0, 0);
            transition: all 0.25s;
            -moz-transition: all 0.25s;
            -webkit-transition: all 0.25s;
            -o-transition: all 0.25s;
        }

        .col-md-2.col-sm-6.galley {
            display: inline-block;
            float: none;
            height: 150px;
            position: relative;
            overflow: hidden;
        }

        ul.styled-icons.icon-dark.icon-sm.icon-circled {
            display: inline-block;
            padding: 0;
            width: 100%;
        }

        .col-md-12.pull-rightt2,
        .col-md-12.pull-rightt {
            background: #ffffff !important;
        }

        .vbox-content {
            margin-top: 30px !important;
        }

        .tit {
            background: #3fb4fb;
            text-align: center;
            color: #fff;
            padding: 5px;
        }

        .col-md-12.pull-rightt {
            background: #f5f5f5;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 1px 1px 16px #c1c1c196;
            margin-bottom: 5px;
        }

        .it-de {
            border-bottom: 0;
        }

        .gallery-item {
            position: relative;
            margin-bottom: 10px;
        }

        body {
            overflow-x: hidden;
        }

        .clear {
            clear: both;
        }

        <?php if ($pagg != 1) { ?>.header_aera {
            position: initial;
        }

        .our_services_area:before {
            background: none;
        }

        .about_us_area {
            background: none;
        }

        .latest_blog_area {
            margin-bottom: 30px;
        }

        .subtittle,
        .tittle {
            position: relative;
            margin-bottom: 20px;
            border-bottom: 1px dashed #237A57;
            padding-bottom: 10px;
            margin-top: 18px !important;
        }

        .boxed_wrapper {
            position: relative;
            z-index: 1;
        }

        <?php } ?><?php if ($pagg  != 1) {
                    ?>.single-shop-product.col-lg-3.col-md-12 {
            padding: 0;
        }

        .testimonial-4:hover .testimonial-detail {
            margin-top: 0px;
        }

        section.about_us_area.row,
        div#slides,
        section.gallery-one {
            margin-bottom: 70px;
        }

        .site-search-btn {
            color: #26a9df !important;
        }

        .site-header,
        .main-bar {
            position: relative;
        }

        .bg-primary {
            background-color: #ededed !important;
        }

        .tittle {

            margin: auto;
        }

        .page-content {
            min-height: 300px;
        }

        .header-nav .nav>li>a {
            color: #0E3046 !important;
        }

        <?php } ?>.grecaptcha-badge {
            display: none !important;
        }

        .is-fixed .extra-nav {
            padding: 29px 0;
        }

        @media only screen and (max-width: 767px) {
            .col-md-3.col-sm-6.footer-t {
                clear: both;
            }

            .is-fixed .extra-nav {
                padding: 15px 0;
            }

            .main-menu .navbar-header .navbar-toggle {
                margin: 2px 20px 10px;
            }

            .outer-search-box {
                left: 2px;
                right: auto;
            }

            iframe {
                width: 90%;
            }

            .extra-nav {
                display: none;
            }

            i.fa.fa-chevron-down {
                display: none;
            }

            .bg-primary .navbar-toggle .icon-bar {
                background-color: #26a9df;
                color: #26a9df !important;
            }

            .widget.widget_services {
                padding-right: 0px !important;
            }

            a.button_all {
                float: none;
            }
        }

        .subtittle h2 {
            margin-bottom: 0px;
        }

        .wt-post-info.p-a30.p-b20.bg-white {
            padding: 30px;
        }

        .wt-img-effect.zoom-slow:hover img {
            -moz-transform: scale(2);
            -webkit-transform: scale(2);
            -o-transform: scale(2);
            -ms-transform: scale(2);
            transform: scale(2);
        }

        .wt-img-effect.zoom-slow img {
            transition: all 10s;
            -moz-transition: all 10s;
            -webkit-transition: all 10s;
            -o-transition: all 10s;
        }

        .wt-img-effect img {
            display: block;
            margin: 0;
            width: 100%;
            height: 300px;
            box-shadow: 0 0 0 rgba(0, 0, 0, 0);
            -webkit-box-shadow: 0 0 0 rgba(0, 0, 0, 0);
            -moz-box-shadow: 0 0 0 rgba(0, 0, 0, 0);
            transition: all 0.25s;
            -moz-transition: all 0.25s;
            -webkit-transition: all 0.25s;
            -o-transition: all 0.25s;
        }

        .wt-img-effect {
            position: relative;
            overflow: hidden;
            display: block;
        }

        .overlay-s3 {
            background: #0000002b;
        }

        .homepage-gri {
            text-align: center;
        }


        .news-section,
        .iq-our-clients,
        .professional_builder,
        .careplus-gallery-full {
            padding: 10px 0;
        }

        .about-company,
        .careplus-gallery-full,
        div#slides,
        section.our_services_area,
        .about_us_area {
            background: #fff;
            padding-top: 1px;
            padding-bottom: 10px;
        }

        .tittle h2 {
            font-size: 30px;
        }

        .subtittle:before,
        .tittle:before {
            position: absolute;
            content: '';
            left: 0;
            bottom: 50%;
            width: 100%;
            height: 4px;
            z-index: 1;
            background: #4f84f9;
            opacity: 1;
        }

        .subtittle h2,
        .tittle h2 {
            display: inline-block;
            padding-right: 5px;
            padding-left: 5px;
            position: relative;
            background: #fff;
            z-index: 9;
            margin-left: 30px;
            font-size: 30px;
            text-transform: capitalize;
            color: #30355d;
            font-weight: bold;
            margin-top: 0;
        }

        .subtittle,
        .tittle {
            border-bottom: none;
            padding-bottom: 0px;
            display: none;
        }

        .navig-img2 img {
            height: 200px;
            width: 100%;
            padding: 5px;
        }

        .navig-img2.row {
            margin-top: 11px;
        }

        .tittle.wow.fadeInUp {
            display: block;
            width: 100%;
            margin-bottom: 30px;
            display: none;
        }

        .button_all {
            display: inline-block;
            border: none;
            font-size: 14px;
            padding: 10px 15px;
            text-transform: uppercase;
            background: #144f3c;
            color: #fff;
            line-height: normal;
            cursor: pointer;
            text-align: center;
            background: #093028;
            background: -webkit-linear-gradient(to right, #237A57, #093028);
            background: linear-gradient(to right, #237A57, #093028);
        }

        #slides>div>div.serv_carosele.row>div>div.row {
            display: block;
        }

        .recent-item {
            transition: all 0.4s cubic-bezier(0.76, 0.1, 0.21, 0.9) 0s;
            width: 100%;
        }

        .recent-item .touching.medium .plus_overlay {
            border-bottom: 50px solid #25622b;
            border-left: 50px solid transparent;
            bottom: 0;
            height: 0;
            opacity: 0.95;
            position: absolute;
            right: 0;
            text-indent: -9999px;
            transition: all 0.2s cubic-bezier(0.63, 0.08, 0.35, 0.92) 0s;
            width: 0;
            z-index: 999;
        }

        .media-body a,
        a.media-left {
            color: #208bf3;
        }

        .recent-item:hover .touching.medium .plus_overlay {
            border-bottom: 500px solid rgba(37, 99, 44, 0.69);
            border-left: none;
            height: 100%;
            width: 100%;
        }

        .recent-item:hover .touching.medium .plus_overlay_icon {
            display: none;
        }

        .recent-item .touching.medium .plus_overlay_icon {
            bottom: 10px;
            color: #fff;
            height: 15px;
            position: absolute;
            right: 8px;
            transition: all 0.2s cubic-bezier(0.63, 0.08, 0.35, 0.92) 0s;
            width: 13px;
            z-index: 999;
        }

        .recent-item:hover .item-description {
            display: block;
            left: 0;
            position: absolute;
            top: 35%;
            left: 0;
            width: 100%;
            z-index: 999;
        }

        .touching.medium {
            position: relative;
            overflow: hidden;
            width: 100%;
        }

        .touching.medium img {
            width: 100%;
            position: relative;
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -ms-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .recent-item .item-description {
            opacity: 0;
            position: absolute;
            top: 0;
            text-align: center;
        }

        .item-description h5 {
            color: #fff;
            font-size: 22px;
            font-weight: 700;
            line-height: 40px;
            margin: 0;
            text-transform: uppercase;
        }

        .recent-item:hover .item-description {
            transform: scale(1);
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            -o-transform: scale(1);
            opacity: 1;
            -webkit-transition: all 0.6s ease-in-out;
            -moz-transition: all 0.6s ease-in-out;
            -o-transition: all 0.6s ease-in-out;
            -ms-transition: all 0.6s ease-in-out;
            transition: all 0.6s ease-in-out;
        }

        .recent-item .item-description span {
            color: #fff;
            font-size: 20px;
            display: block;
            font-weight: 600;
            line-height: 14px;
        }

        .recent-item .option {
            position: absolute;
            text-align: center;
            top: 40%;
            left: 0;
            width: 100%;
            z-index: 9999;
        }

        .recent-item .option a {
            color: #25622b;
            background: #FFF;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            font-size: 21px;
            line-height: 43px;
            text-align: center;
            display: inline-block;
            zoom: 1;
            -moz-opacity: 0;
            opacity: 0;
            filter: alpha(opacity=0);
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
            z-index: 100;
            transform: scale(0, 0) rotateX(360deg);
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            -ms-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .recent-item .option a:hover {
            background: #25622b;
            color: #fff;
        }

        .recent-item:hover .option a {
            zoom: 1;
            -moz-opacity: 1;
            opacity: 1;
            filter: alpha(opacity=100);
            transform: scale(1, 1) rotateX(0deg);
        }

        .recent-item .option a.hover-zoom {
            margin-right: 1%;
        }

        .recent-item .option a.hover-link {
            margin-left: 1%;
        }

        .inner-page-header {
            background: url(images/whole-wheat-flour_AdobeStock_35274452_E.jpg) repeat;
            background-size: 100% 100%;
            padding: 40px 0;
            background-attachment: fixed;
            -webkit-transition: .4s;
            position: relative;
            -o-transition: .4s;
            transition: .4s;
            border-bottom: 3px solid #dcdbd7;
            position: relative;
            margin-bottom: 10px;
        }

        .inner-page-header .container {
            position: relative;
            z-index: 2;
        }

        .inner-page-header:after {
            content: "";
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            background: #3fb4fb8c;
            position: absolute;
            z-index: 1;
        }

        .inner-page-header .header-page-title h2 {
            color: #ffffff;
            margin: 0;
            font-size: 36px;
        }

        .inner-page-header .header-page-locator ul {
            text-align: left;
        }

        .inner-page-header .header-page-locator ul li {
            display: inline-block;
            color: #ffba00;
            color: #643430;
            font-size: 20px;
        }

        .inner-page-header .header-page-locator ul li a {
            color: #ffffff;
            transition: all 0.5s ease 0s;
        }

        .inner-page-header .header-page-locator ul li a:hover {
            color: #ffba00;
        }

        @FONT-FACE {
            font-family: "DroidKufi-Regular";
            src: url("css/DroidKufi-Regular.ttf");
        }
    </style>
    <?php if ($lang == "arabic" && 1 == 1) { ?>
        <style type="text/css">
            @FONT-FACE {

                font-family: "Poppins";
                src: url("css/DroidKufi-Regular.ttf");
            }

            @FONT-FACE {
                font-family: "Open Sans";
                src: url("css/DroidKufi-Regular.ttf");
            }

            /* ol.breadcrumb li.breadcrumb-item:before {
                color: #fff;
                font-family: "Font Awesome 5 Free";
                content: "\f060";
            } */
            .blog-mini-post>a+.blog-mini-post-info {
                flex: 0 0 calc(100% - 3.75rem);
                max-width: calc(100% - 3.75rem);
                padding-left: 0;
                padding-right: 1.125rem;
            }

            .widget2.category_widget ul li {
                text-align: right;
            }

            .widget2.category_widget ul li a {
                float: right;
            }

            ol.breadcrumb li.breadcrumb-item+li.breadcrumb-item {
                margin-right: 0.75rem;
                margin-left: 0;
                padding-right: 1.5625rem;
                padding-left: 0;
            }

            .widget2.category_widget ul li a {
                float: right;
            }

            ol.breadcrumb li.breadcrumb-item+li.breadcrumb-item:before {
                color: #fff;
                content: "\f060";
                right: 0;
                left: auto;
            }

            ul li,
            ol li,
            a,
            body,
            p {
                font-family: "DroidKufi-Regular";

            }

            .post-info-bottom>span i,
            .post-meta>li i {
                margin-right: 0;
                margin-left: 7px;
            }

            .post-box {
                margin-bottom: 1rem;
                background: #fff;
                direction: rtl;
            }

            .flaticon-arrow-pointing-to-right:before {
                content: "\f11b";
            }

            .topbar-links>li:not(:first-child):before {

                right: 0;
                left: auto;
            }

            .footer-top h3.widget-title,
            .widget-title {
                padding-right: 10px;
            }

            .footer-newsletter .form-group input {
                background: #fff;
                border: 1px solid #d5d5d5;
                padding: 0 10px 0 135px;
                height: 53px;
                border-radius: 8px;
                width: 100%;
            }

            .toggle-item>h4 {

                padding: 1.0875rem 2.8125rem 1.0875rem 2.8125rem;

            }

            .toggle-item>h4 span {

                right: 10px;
                left: auto;
            }

            .slick-slider {
                direction: ltr;
            }

            .toggle {
                padding-left: 6.25rem;
                padding-right: 0;
            }

            .banner-inner>p {
                font-size: 1.125rem;
                line-height: 2rem;
                display: inline-block;
                max-width: 100%;
                display: block;
            }

            @media (max-width: 1605px) {
                .slick-slider:not(.feat-caro):not(.shop-detail-nav-caro)>button.slick-prev {
                    left: 15.3%;
                    right: auto;
                }

                .slick-slider:not(.feat-caro):not(.shop-detail-nav-caro)>button.slick-next {
                    left: 10.8%;
                    right: auto;
                }
            }

            .qq-links li {

                padding-right: 25px;
                float: right;
                padding-left: 0;
            }

            .ter-links li:after,
            .qq-links li:after {
                right: 0;
                left: auto;
            }

            .footer-newsletter .form-group .btn {

                left: 4px;
                right: auto;
            }

            .decrepation-sl {

                right: 50px;
                left: auto;
            }

            @media (max-width: 750px) {
                .decrepation-sl {
                    width: 100%;
                    right: 50px;
                    left: auto;
                }

                .toggle {
                    padding-left: 0;
                }
            }

            .ter-links li:after,
            .qq-links li:after {
                content: "\f11b";
            }

            nav>div ul ul {
                position: absolute;
                right: 0;
                left: auto;
                padding-right: 0;
            }

            .header-right-btns>a {

                margin-left: 0;
            }

            .rspn-srch>input {

                padding: 0 5% 0 3.125rem;
                width: 100%;
            }

            .rsnp-mnu>ul li.menu-item-has-children>a::before {
                left: 0;
                right: auto;
            }

            .rspn-srch>button {

                left: 10px;
                right: auto;
            }

            nav {

                padding-right: 0;
                padding: 0;
            }

            nav>div>ul>li {
                color: #fff;
                margin-left: 2.8125rem;
                margin-right: 0;
            }

            .topbar-links>li:not(:first-child) {
                margin-right: 1rem;
                padding-right: 1.0625rem;
                margin-left: 0;
                padding-left: 0;

            }

            .topbar-info-list>li i {
                margin-left: 10px;
            }

            .topbar-info-list>li:not(:first-child) {
                margin-right: 4.0625rem;
            }

            .logo-info-bar-inner .top-info-wrap,
            .logo-info-bar-inner .social-links {
                float: left;

            }

            .footer-top input {
                padding-right: 20px;
            }

            .language-sw img {
                margin-right: 0px;
                margin-left: 10px;
            }

            .single-service-sidebar .service-pack-download li .title-holder {
                padding-left: 0px;
                padding-right: 20px;
            }

            .single-service-sidebar .service-pack-download li .icon-holder {
                width: 65px;
                border-left: 1px solid #272727;
                border-right: 0px solid #272727;
                text-align: right;
            }

            body,
            .header_aera .navbar-collapse .navbar-nav.navbar-right li a,
            .top_header_area .top_nav li a,
            .tittle h2,
            .footer_area .footer_row .footer_about h2,
            .footer_area .footer_row .footer_about .quick_link li a,
            .footer_area .footer_row .footer_about address p,
            .footer_area .footer_row .footer_about p,
            .header_aera .searchForm .form-control,
            .footer_area .copyright_area,
            .latest_blog_area .latest_blog .blog_content .blog_heading,
            .latest_blog_area .latest_blog .blog_content p,
            .latest_blog_area .latest_blog .blog_content h4,
            .subtittle h2,
            .about_us_area .about_row p,
            .button_all,
            body p,
            .our_services_area .portfolio_inner_area .portfolio_filter ul li a,
            .professional_builder .builder_all .builder h4,
            .what_we_area .construction_iner .construction .cns-content a,
            #rev_slider_1014_1_wrapper span.text-uppercase,
            .rev_slider .tp-mask-wrap .tp-caption,
            .wpb_text_column .rev_slider .tp-mask-wrap .tp-caption,
            .wpb_text_column .rev_slider .tp-mask-wrap :last-child,
            .text-uppercase,
            .widget-title,
            .widget-title-two,
            .widget-title-three,
            .wt-post-title .post-title,
            .date-style-3 .post-date,
            .text-white h1,
            .text-white h2,
            .text-white h3,
            .text-white h4,
            .text-white h5,
            .text-white h6,
            .text-white p,
            .text-white .title-small,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            .adress-section .ad span {
                font-family: "DroidKufi-Regular" !important;
            }

            .inner-page-header .header-page-locator ul,
            .home-about-inner {
                text-align: right;
            }

            .header-searchtrigger i {
                border-left: unset;
                border-right: 1px solid;
                padding-right: 15px;
            }

            @media only screen and (max-width: 767px) {
                .header-lower .outer-box .header-lawer-right {
                    left: 0;
                    right: auto;
                }

                .menu-right-content-style2 {
                    left: 90px;
                    right: auto;
                }

                .main-menu .navbar-header .navbar-toggle {
                    float: right;
                }

                .menu-right-content-style2 .search-box.now-visible {
                    left: -40px;
                    right: auto;
                }
            }

            @media (min-width: 768px) {
                .navbar-header {
                    float: right;
                }
            }

            .menu-right-content-style2 .search-box .form-group button,
            .menu-right-content-style2 .search-box .form-group input[type="submit"],
            .search-popup .search-form fieldset input[type="submit"],
            .subscribe-widget .form-group button {
                position: absolute;
                left: 0;
                right: auto;
            }

            .search-popup .search-form fieldset input[type="search"] {
                position: relative;
                height: 70px;
                padding: 20px 20px 20px 220px;
            }

            .main-header .nav-outer .main-menu {
                position: relative;
                float: right;
            }

            .service-block-four .icon-box h4:before {
                right: 0;
                left: auto;
            }

            .service-block-four .icon-box {
                right: 30px;
                left: auto;
            }

            .subscribe-widget .form-group input {
                height: 56px;
                background: #fff;
                width: 100%;
                padding-left: 70px;
                padding-right: 20px;
            }

            .che-have ul li {
                position: relative;
                padding-right: 25px;
                color: #222;
            }

            .main-menu .navigation>li:last-child {
                margin-right: 20px;
            }

            .main-header:after {
                left: auto;
                right: -72%;
            }

            .main-header .nav-outer {
                float: left;
            }

            .main-header.header-style-five .sidemenu-nav-toggler {
                float: left;
            }

            .main-header.header-style-five .navbar-right-info {
                margin: 25px 40px 25px 10px;
                float: left;
            }

            @media only screen and (max-width: 767px) {
                .main-header.header-style-five .navbar-right-info {
                    margin: 12px 0px 12px 48px;
                }
            }

            .main-menu .navigation>li>ul>li>a {
                text-align: right;
            }

            .main-menu .navigation>li.dropdown>a:after {
                left: -15px;
                right: auto;
            }

            .mobile-menu .navigation li.dropdown .dropdown-btn {
                position: absolute;
                left: 6px;
                right: auto;
            }

            .links-widget-two ul li a {
                padding-right: 22px;
                padding-left: 22px;
            }

            .bootstrap-select .dropdown-toggle .filter-option {
                text-align: right;
                right: 0;
                left: auto;
            }

            .bootstrap-select .dropdown-toggle .filter-option:after {
                right: auto;
                left: 25px;
            }

            .project-block-six .inner-box .content-box {
                top: 0;
            }

            .page-title .content-box .bread-crumb li {
                padding-left: 15px;
                padding-right: 0px;
            }

            .page-title .content-box .bread-crumb li:before {
                position: absolute;
                content: "\f104";
                font-family: 'Font Awesome 5 Pro';
                top: -1px;
                left: 0px;
                right: auto;
            }

            .page-title .content-box:before {
                left: auto;
                right: 0;
            }

            .page-title .content-box {
                padding-right: 22px;
                position: relative;
            }

            .links-widget-two ul li a:after {
                position: absolute;
                content: "\f100";
            }

            .links-widget-two ul li a:before {
                position: absolute;
                content: "\f104";
                top: 0;
                right: 0;
                left: auto;
            }

            .main-menu .navigation>li>ul {
                position: absolute;
                right: 0px;
                left: auto;
            }

            .main-header .header-upper .logo-box {
                float: right;
                z-index: 10;
                position: relative;
                margin-top: -35px;
            }

            .che-have ul li:before {
                left: auto;
                right: 0;
            }

            .menu-right-content-style2 .search-box .form-group input[type="search"] {
                padding-right: 15px;
                padding-left: 50px;
            }

            #menu-service-menu li {
                float: right;
            }

            #myCarousel h1,
            #myCarousel h2 {
                text-align: right;
            }

            body {
                direction: rtl;
            }

            .main-menu .navigation>li>ul>li>a:after {}

            #text-3>div.footer-contact.address>div.ft-contact.fax>p,
            #text-3>div.footer-contact.address>div:nth-child(4)>p {
                text-align: right;
            }

            .main-menu .navigation li {
                display: inline-block;
                float: right;
            }

            #menu-service-menu a {
                border-right: 2px solid #fff;
                border-left: unset;
                padding-right: 10px;
            }

            .mainmenu-area .logo,
            .top-contact-info li {
                float: right;
            }

            .top-contact-info li {
                padding-left: 12px !important;
            }

            .call-to-action .call-to-action-text {
                position: relative;
                padding-left: 75px;
                padding-right: 75px;
            }

            .main-menu .navigation>li>ul,
            #myCarousel h1:after,
            .section-title-s2 h2:before,
            .section-title-s3 h2:before,
            .section-title-s4 h2:before,
            .hx-site-footer-top h3:before,
            .service-section ul li:before,
            .call-to-action .call-to-action-text i {}

            .main-menu.dropdown-menus2 .navigation>li>ul>li>a {
                color: #5B3230;
                padding-left: 30px;
                text-align: right;
            }

            .tabs-style-one .tab-buttons .tab-btn {
                float: right;
                margin-left: 45px;
                margin-right: 0px;
            }

            .main-project-area.style2 .single-project-style3 .title-holder .title {
                text-align: right;
            }

            .single-service-sidebar .service-pages li a .title {
                padding-right: 20px;
            }

            .header-upper-style2 .outer-box .header-upper-left {
                float: right;
            }

            .header-upper-style2 .outer-box .header-upper-right {
                float: left;
            }

            .header-contact-info li .single-item .text {
                padding-right: 20px;
                padding-left: 0px;
            }

            .header-style-2 #search-toggle-block {
                right: auto;
                left: 15px;
            }

            .left.wt-small-separator-outer,
            .story-block-two .inner-box .content-column .sec-title .inner-title,
            .story-block-two .inner-box .content-column .sec-title,
            .story-block-two .inner-box .content-column .inner-column .text,
            .story-block-two .inner-box .content-column .inner-column,
            .featured-icon-box.iconalign-before-heading .featured-content .featured-title {
                text-align: right;
            }

            .site-footer .newsletter-widget .submit {
                right: auto;
                left: 20px;
            }

            .header-nav .nav>li .sub-menu li>.sub-menu {
                right: 220px;
                left: auto;
            }

            .header-search-form form .btn,
            .newsletter-section .subscribe-from .submit-btn {
                left: 0;
                right: auto;
            }

            .service-section ul li {
                padding-left: 0px;
                padding-right: 20px;
            }

            .header-style-1 .search-quote,
            .header-style-2 .search-quote {
                left: 15px;
                right: auto;
            }

            @media screen and (min-width: 992px) {
                .site-header #navbar>ul .sub-menu {
                    right: 0px;
                    padding-right: 0;
                    text-align: right;
                    left: auto;
                }
            }

            .accordion .section-title-s2 {
                text-align: right;
            }

            .top-contact-info li a {
                padding-right: 7px;
                direction: ltr;
            }

            .mainmenu-right-box,
            .top-right,
            .footer-bottom-area .footer-social-links {
                float: left;
            }

            .search-box .form-group button,
            .search-box .form-group input[type="submit"],
            .owl-carousel .owl-controls,
            .header-searchbox {
                left: 0;
                right: auto;
            }

            .search-box .form-group input[type="search"] {
                padding-left: 50px;
                padding-right: 15px;
            }

            .has-child .submenu-toogle {
                left: 10px;
                right: auto;

            }

            .about-company {
                direction: rtl;
            }

            .date-style-3 .post-date i {
                float: left;
            }

            li.post-date {
                direction: rtl;
            }

            <?php if ($pagg  != 1) { ?>.page-content {
                text-align: right;
            }

            body>div.about-company.wow.animated>div>div.row.no-gutters>div:nth-child(3)>div>div>div:nth-child(4)>div>p {
                text-align: right;
            }

            .text-white h1,
            .text-white h2,
            .text-white h3,
            .text-white h4,
            .text-white h5,
            .text-white h6,
            .text-white p,
            .text-white .title-small {
                color: #3d474a;
            }

            <?php } ?>.owl-carousel {
                direction: ltr;
            }

            .single-footer-widget-style2 .usefull-links ul.quick-linkes li:before {
                right: 0;
                left: auto;
            }

            .single-footer-widget-style2 .usefull-links ul.quick-linkes li a {
                padding-left: 0px;
                padding-right: 25px;
            }

            .main-menu {
                position: relative;
                float: right;
            }

            .float-left {
                float: right !important;
            }

            .float-right {
                float: left !important;
            }

            .menu-right-content-style2 {
                float: left;
                margin-left: 44px;
            }

            .menu-right-content-style2 .search-box {
                right: auto;
                left: 0%;
            }

            .header-lower .outer-box .header-lawer-right .button a {
                background: #5b3230;
            }

            .main-slider h1:after {
                position: absolute;
                left: auto;
                right: 0px;
            }

            .main-slider .slide .content.alternate {
                float: right;
                text-align: right;
            }

            .subtittle h2:before {
                background: unset;
            }

            .footer-contact .ft-contact i {
                float: right;
            }

            .text-left,
            .howwork,
            .wt-icon-box-wraper,
            .footer-top,
            .rev_slider .caption,
            .rev_slider .tp-caption {}

            .widget.widget_services {
                padding-right: 50px;
            }

            .logo-header {
                float: right;
            }

            .site-search-btn {
                border-right: 1px solid rgba(255, 255, 255, 0.35);
                border-left: unset;
            }

            .is-fixed .site-search-btn {
                color: #0e3046 !important;
                border-left: unset;
                border-right: 1px solid #0e3046;
            }

            .social-bx,
            .login-bx {
                margin: 0px 15px 0 0;
                float: left;
            }

            .social-bx li {
                float: right;
            }

            .widget-title:before,
            .widget_categories ul li:before,
            .widget_archive ul li:before,
            .widget_meta ul li:before,
            .widget_pages ul li:before,
            .widget_recent_comments ul li:before,
            .widget_nav_menu ul li:before,
            .widget_useful_links ul li:before,
            .widget_recent_entries ul li:before,
            .widget_services ul li:before,
            .header-nav .nav>li .sub-menu {
                left: auto;
                right: 0;
            }

            .widget-title:after {
                left: auto;
                right: 18px;
            }

            .logo-footer {
                display: inline-table;
            }

            .site-search,
            .header-style-2 .top-bar .wt-topbar-info li:first-child:before {
                left: 0;
                right: auto;
            }

            @media only screen and (max-width: 480px) {
                .header-style-2 .top-bar .wt-topbar-right .wt-topbar-info-2 li {
                    padding-right: 10px;
                    display: inline-block;
                }
            }

            @media only screen and (min-width: 480px) {

                .header-style-2 .top-bar .wt-topbar-info li,
                .header-style-2 .top-bar .wt-topbar-right .wt-topbar-info-2 li {
                    border-left: 1px solid rgba(255, 255, 255, 0.6);
                    border-right: 0px;
                }

                .header-style-2 .social-icons li {
                    padding-right: 10px;
                    padding-left: 0px;
                }
            }

            .header-nav .nav,
            .extra-nav,
            .wt-topbar-right,
            .filter-wrap.right>.masonry-filter {
                float: left;
            }

            .masonry-filter.outline-style>li,
            .input-group .form-control {
                float: right;
            }

            .input-group-btn button {
                height: 100%;
            }

            .input-group-btn {
                position: absolute;
                float: left;
                height: 100%;
                z-index: 999999;
            }

            .image {}

            .input-group .form-control {
                position: unset;
            }

            .date-style-3 .wt-post-info,
            .header-nav .nav>li .sub-menu li,
            .form-control {
                text-align: right;
            }

            .embed-responsive iframe,
            .embed-responsive object,
            .embed-responsive video {
                position: relative;
                top: 0;
                bottom: 0;
                left: 0;
                height: 100%;
            }

            .embed-responsive {
                position: relative;
                height: auto;
            }

            @media (min-width: 768px) {
                .navbar-nav>li {
                    float: right;
                }

                <?php if ($pagg != 1) { ?>.image {}

                <?php } ?>
            }

            @media only screen and (max-width: 767px) {

                .social-bx,
                .list-unstyled,
                .header-nav .nav,
                .wt-topbar-right,
                .filter-wrap.right>.masonry-filter,
                .social-bx li {
                    float: none;
                }

                .mean-container a.meanmenu-reveal {
                    right: auto !important;
                    top: -78px !important;
                    left: 80px !important;
                }

                .mean-container .mean-nav ul li a {
                    float: right;
                    text-align: right;
                }

                .mean-container .mean-nav ul li a.mean-expand {
                    left: 0;
                    right: auto;
                    border-right: 1px solid rgba(165, 136, 136, 0.4) !important;
                    border-left: 0px solid rgba(165, 136, 136, 0.4) !important;
                }

                .site-logo,
                .mainmenu-area .logo,
                .top-left,
                .top-contact-info li,
                .mainmenu-right-box,
                .top-right,
                .footer-bottom-area .footer-social-links {
                    float: none;
                }

                .owl-carousel .owl-controls {
                    left: 25px;
                    right: auto;
                }

                .main-menu .navbar-collapse>.navigation>li>a,
                .main-menu .navbar-collapse>.navigation>li>ul>li>ul>li>a {
                    text-align: right;
                }

                .main-menu .navbar-collapse>ul li.dropdown .dropdown-btn {
                    left: 10px;
                    right: auto;
                }

                .main-menu .navbar-collapse>.navigation>li>ul>li>a {
                    text-align: right;
                }

                a.media-left {
                    margin-top: 11px;
                    margin-left: 13px;
                }

                iframe {
                    width: 90%;
                }

                h2.text-uppercase {
                    text-align: right;
                }

                .is-fixed .extra-nav {
                    padding: 15px 0;
                }

                .header-nav .nav li {
                    text-align: right;
                }

                .extra-nav {
                    float: right;
                    display: none;
                }

                .bg-primary .navbar-toggle .icon-bar {
                    background-color: #26a9df;
                    color: #26a9df !important;
                }

                .logo-header {
                    float: left;
                }

                .slicknav_nav li,
                .slicknav_nav ul {
                    display: block;
                    text-align: right;
                }
            }

            @media (min-width: 992px) {

                .col-md-1,
                .col-md-10,
                .col-md-11,
                .col-md-12,
                .col-md-2,
                .col-md-3,
                .col-md-4,
                .col-md-5,
                .col-md-6,
                .col-md-7,
                .col-md-8,
                .col-md-9 {}

                .site-nav-menu ul li {
                    display: inline-block;
                    float: right;
                }

                .site-logo {
                    margin-top: -22px;
                    float: right;
                }

                .header-section .fleft {
                    float: left;
                }

                #nr_topStrip {
                    background: linear-gradient(300deg, #fafafa 30%, #144f3c 70%);
                }
            }

            .deal-career h3 {
                text-align: right;
                width: 100%;
            }

            .bg-fa {
                text-align: right;
            }

            .sl-sesc {
                text-align: right;
                display: inline-block;
            }

            .sl-sesc a,
            .video-text a {
                float: left;
            }

            .footer-widget,
            .dropdown-menu,
            .in-navigation .in-dropdown ul li a {
                text-align: right;
            }

            .top-head {
                background: linear-gradient(230deg, #fff 22%, #3fb4fb 0%);
            }

            .rr-right li {
                float: right;
                margin-right: 15px;
                margin-left: 15px;
            }

            .th-social {
                float: left;
            }

            .in-navigation .in-dropdown>a::after {
                padding-right: 10px;
            }

            @media only screen and (min-width: 991px) {
                .navbar-light .dropdown .dropdown-menu .dropdown-menu {
                    right: 100%;
                    top: 0;
                    left: auto;
                }
            }

            .lang-ar {
                padding-left: 0px;
                padding-right: 15px;
                border-left: 0;
                border-right: 1px solid #ddd;
                margin-left: 5px;
            }

            @media only screen and (min-width: 991px) {
                .header-info-text .social-links {
                    list-style-type: none;
                    padding: 0;
                    margin: 0;
                    text-align: left;
                }
            }

            .navbar-light .navbar-nav .nav-link {
                color: rgba(0, 0, 0, 0.5);
                text-transform: uppercase;
                font-size: 18px;
            }

            .footer-widget ul li a:after,
            .dropdown-menu,
            .in-navigation .in-dropdown>ul {
                right: 0;
                left: auto;
            }

            .footer-info-box .fib-icon {
                float: right;
            }

            .footer-widget ul li a {}

            .footer-widget .footer-search input {
                padding-left: 47px;
                padding-right: 22px;
            }

            .header-info-box form input {
                padding: 5px 5px 4px 10px;
            }

            .header-info-box form button,
            .footer-widget .footer-search button {
                top: 0;
                left: 0;
                right: auto;
            }

            body {
                text-align: right;
            }

            .footer_contact .footer_contact_width {
                border-right: 0;
                border-left: 1px solid #535356;
            }

            .footer_textwidget p {
                padding-left: 60px;
                padding-right: 0px;
            }

            .site-nav-menu ul li .sub-menu {
                right: 0;
                left: auto;
            }

            .site-nav-menu ul li .sub-menu li a {
                text-align: right;
            }

            .footer-banner-box p.content-margin {
                margin-right: 78px;
                margin-left: 0px;
            }

            .footer-banner-box::before {
                float: right;
                margin-left: 30px;
                margin-right: 0px;
            }

            .site-button-link:before {
                content: "\f177";
                right: 50%;
                left: auto;
            }

            .site-button-link:hover:before {
                right: 110%;
                left: auto;
            }

            .subtittle h2,
            .tittle h2 {
                margin-left: 0px;
                margin-right: 30px;
                margin-top: 0;
            }

            .serv_carosele.services-area.row {
                text-align: right;
            }

            .site-nav-menu ul li a {
                padding: 0px 18px;
            }
        </style><?php }
            if ($pagg != 1) { ?>
        <style type="text/css">
            .portfolio_itemt {
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-right: -15px;
                margin-left: -15px;
            }

            footer.footer.cmt-textcolor-white.clearfix {
                margin-top: 25px;
            }

            .single-card {
                background: #fff;
                margin-bottom: 10px;
            }

            .single-card .thumb-img img {
                width: 100%;
            }

            .col-md-12.pull-rightt,
            body>div.boxed_wrapper>section.about-company.wow.animated>div>div:nth-child(3) {
                margin-bottom: 30px !important;
            }

            .services .single_service img {
                width: auto;
                height: 200px;
            }

            .ss-img {
                text-align: center;
            }

            a.button_all {
                display: inline-block;
                background: linear-gradient(to right, #208bf3, #4289cd);
            }

            button#btn {
                padding: 5px;
                padding: 5px 17px;
                border-radius: 0;
            }

            .header-style-1 #navbar>ul>li>a,
            .header-style-2 #navbar>ul>li>a {
                color: unset;
            }

            .wow {
                visibility: visible;
            }

            .blog-section {
                background: none;
            }

            span.arabiccaptchaa {
                display: block !important;
                float: none !important;
                text-align: center !important;
            }

            body a {}

            .footer-widget ul li a {
                color: #fff;
            }

            .portfolio_inner_area iframe {
                border: none;
            }
        </style><?php }
            if (!$plang) { ?>
        <style type="text/css">
            @FONT-FACE {
                font-family: "open";
                src: url("css/Roboto-Regular.ttf");
            }

            .serv_carosele.services-area.row,
            .story-block-two .inner-box .content-column .inner-column,
            .story-block-two .inner-box .content-column .sec-title {
                text-align: left;
            }

            #xs-newsletter-email {
                float: left;
                text-align: left;
                width: calc(100% - 115px);
            }

            body {
                direction: ltr;
                text-align: left;
            }

            .widget ul#menu-footer-services li a:before {
                content: "\f105";
                right: auto;
                left: 0;
            }

            .widget ul#menu-footer-services li a {
                padding-left: 18px;
            }

            .newsletter-form button[type="submit"],
            .newsletter-form input[type="submit"] {
                left: auto;
                right: 0;
            }

            .newsletter-form input[type="email"] {
                padding-right: 70px;
                padding-left: 15px;
                text-align: left;
            }

            .widget_info .widget_content {
                text-align: left;
            }

            @media (min-width: 1200px) {
                nav.main-menu ul.menu>li>a.mega-menu-link:after {
                    margin-right: auto;
                    margin-left: 4px;
                    right: 0;
                }

                nav.main-menu li.mega-menu-item ul.mega-submenu li.mega-menu-item>a.mega-menu-link:before {
                    font-family: "Font Awesome\ 5 Pro";
                    float: right;
                    content: "\f105";
                    margin-top: 0;
                }

                nav.main-menu li.mega-menu-item ul.mega-submenu li ul {
                    left: 100%;
                    top: 0;
                    border-top: 0;
                    right: auto;
                }
            }

            .header_search_content button.close-search {
                position: absolute;
                right: 15px;
                left: auto;
            }

            nav.main-menu ul.menu li ul.mega-submenu li a {
                text-align: left;
            }

            .cmt-fid-view-lefticon .cmt-fid-contents,
            .cmt-fid-view-righticon .cmt-fid-icon-wrapper {
                padding-left: 15px;
                text-align: left;
                padding-right: 0;
            }

            .fa-arrow-left:before {
                content: "\f061";
            }

            .cmt-list.cmt-list-style-icon .cmt-list-li-content {
                padding-left: 27px;
                padding-right: 0px;
            }

            .cmt-list li:after {
                left: 0;
                right: auto;
            }

            .widget_info .widget_desc {
                text-align: left;
                direction: ltr;
            }

            .row {
                direction: ltr;
            }

            @media (max-width: 1199px) {
                nav.main-menu ul.menu>li>a {
                    text-align: left;
                }

                nav.main-menu li.mega-menu-item a.mega-menu-link:after {
                    content: "\f105";
                    float: right;
                    font-size: 16px;
                    margin-right: 10px;
                }
            }

            .about-desc,
            .blog-desc>h6,
            .mainmenu-area.style-three .main-menu .navigation>li>ul>li>a,
            .mainmenu-area.style-three .main-menu .navigation li a {
                text-align: left;
                direction: ltr;
            }

            .main-menu .navbar-collapse>ul li.dropdown .dropdown-btn {
                left: auto;
                right: 10px;
            }

            .site-footer .link-widget ul a:after {
                left: 4px;
                right: auto;
            }

            ul.main-menu>li.menu-item-has-children>a:after {
                left: auto;
                right: 5px;
            }

            .menubar.site-nav-inner {
                float: left;
                margin-left: 60px;
                margin-right: 0px;
            }

            .site-footer .link-widget ul a {
                padding-left: 20px;
                padding-right: 0;
            }

            .header-area.style-three .header-contact-info {
                float: right;
            }

            .header-area.style-three .header-contact-info ul li .icon-holder,
            .header-area.style-three .header-contact-info ul li .text-holder {
                margin-right: 20px;
                text-align: left;
                margin-left: 0px;
                float: left;
            }

            .footer-widget .menu li {
                float: left !important;
            }

            .footer-widget .widget-title {
                border-left: 3px solid;
                padding-left: 15px;
                border-right: none;
                padding-right: 0;
            }

            .xs-footer-top-layer .col-md-4.footer-widget {
                float: left;
                text-align: left;
            }

            .search-box .form-group input[type="search"] {
                padding-left: 15px;
                padding-right: 50px;
                text-align: left;
            }

            .search-box .form-group button,
            .search-box .form-group input[type="submit"],
            .search-block,
            .site-navigation .search-block .search-close {
                right: 0;
                left: auto;
            }

            @media (min-width: 767px) {
                .navbar-header {
                    float: left;
                }
            }

            <?php if ($pagg != 1) {
            ?><?php } ?>.footer-top .col-sm-7.col-xs-12.pull-right {
                float: left !important;
            }

            .footer-top .col-sm-5.col-xs-12.pull-left {
                float: right !important;
            }

            ul.main-menu li ul li ul {
                right: auto;
                left: 105%;
            }

            .footer-top .input-box input {
                padding-right: 105px;
                padding-left: 30px;
            }

            ul.main-menu>li>ul.sub-menu>li.menu-item-has-children>a:after {
                float: right;
            }

            .site-navigation .nav-search,
            .footer-top .input-box button {
                right: 0;
                left: auto;
            }

            ul.main-menu li ul,
            .site-footer .widget-title h3:after {
                right: auto;
                left: 0;
            }

            ul.main-menu li ul li a {
                text-align: left;
            }

            .search-box {
                right: 0;
                left: auto;
            }

            .xs-info-list i {
                float: left;
                margin-left: 0px;
                margin-right: 20px;
            }

            @media only screen and (max-width: 767px) {
                .mainmenu-area.style-three .mainmenu-right-box {
                    right: 15px;
                    left: auto;
                }

                .site-navigation.navdown .navbar-toggle {
                    right: auto;
                    left: 15px;
                }

                #responsive-menu ul li span.menu-toggler {
                    left: auto;
                    right: 15px;
                }

                .outer-search-box {
                    left: auto;
                    right: 2px;
                }

                .main-menu .navbar-header {
                    text-align: left;
                }
            }

            .mainmenu-area.style-three .main-menu .navigation li,
            .header-area.style-three .logo,
            .xs-footer-top-layer .col-md-4.footer-widget {
                float: left;
            }

            .main-menu .navigation>li.dropdown>a:after {
                right: -15px;
                left: auto;
            }
        </style>
    <?php }
            if ($pagg != 1) { ?>
        <style type="text/css">
            .page-title {
                position: relative;
                padding: 216px 0px 32px;
            }

            .detail-gal a,
            .detail-gal a img {
                height: 100%;
                margin: 0;
            }

            <style><? } ?><style type="text/css">.gallery-item .overlay-box {
                background: rgb(34 107 172 / 57%);
            }

            a.lang-ui {
                color: #fff;
            }

            @media only screen and (max-width: 767px) {
                .header-style-2 .wt-topbar-right {
                    float: none;
                    text-align: center;
                    width: 100%;
                    display: block !important;
                }

                .rr-right {
                    float: none;
                    text-align: center;
                    display: inline-block;
                    width: 100%;
                }

                .top-head {
                    background: #1273e3;
                    text-align: center;
                }

                .header-style-2 .top-bar .wt-topbar-right .wt-topbar-info-2 li {
                    display: inline-block;
                    padding-right: 10px;
                }
            }

            section.about_us_area.row {
                min-height: 200px;
            }

            section.latest-blog.latest_blog_area.blog-section {
                min-height: 200px;
            }

            .col-xl-3.col-lg-3.col-md-3.animate_line {
                margin-bottom: 10px;
            }

            section.latest-blog.latest_blog_area.blog-section {
                z-index: 1;
            }

            .he-rall img {
                height: 290px;
                margin: 0 auto;
                display: block;
            }

            .breadcrumb-area {
                padding: 120px 0 60px;
            }

            .tabs-style-one .tab p {
                max-width: 360px;
            }
        </style>
</head>

<body class="hidden-bar-wrapper">
    <div class="page-wrapper">
        <!-- Main Header / Header Style Two -->
        <header class="main-header header-style-two">
            <!-- Header Lower -->
            <div class="header-lower">
                <div class="auto-container clearfix">
                    <div class="inner-container clearfix">
                        <div class="pull-left logo-box">
                            <div class="logo">
                                <a class="desk-logo" href="<?= $core->getPageUrl("index" . $plang) ?>"><img src="images/wlogo.png" alt="" title="" /></a>
                                <a class="mob-logo" href="<?= $core->getPageUrl("index" . $plang) ?>"><img src="images/wlogo.png" alt="" title="" /></a>
                            </div>
                        </div>
                        <div class="nav-outer clearfix">
                            <!-- Mobile Navigation Toggler -->
                            <div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>
                            <!-- Main Menu -->
                            <nav class="main-menu show navbar-expand-md">
                                <div class="navbar-header">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="current"><a href="<?= $core->getPageUrl("index" . $plang) ?>"><?= getTitle("index" . $plang) ?></a></li>

                                        <li class=" ">
                                            <a href="<?= $core->getPageUrl("about" . $plang) ?>"><?= getTitle("about" . $plang) ?></a>
                                        </li>


                                        <li class="dropdown">
                                            <a href="javascript:void(0)"><?= getTitle("projects" . $plang) ?> </a>
                                            <ul>
                                                <? $variable = $core->getprojects([]);
                                                foreach ($variable as $k => $v) {
                                                    $link = $core->getPageUrl(array($v['id'], $v['name' . $clang]), "projects" . $plang);
                                                ?>
                                                    <li><a href="<?= $link ?>"><?= $v["name" . $clang] ?></a></li>
                                                <? } ?>


                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="javascript:void(0)"><?= plang('والوسائط', 'Media') ?> </a>
                                            <ul>
                                                <li><a href="<?= $core->getPageUrl("video" . $plang) ?>"><?= getTitle("video" . $plang) ?></a></li>

                                                <li><a href="<?= $core->getPageUrl("gallery" . $plang) ?>"><?= getTitle("gallery" . $plang) ?></a></li>

                                                <li><a href="<?= $core->getPageUrl("news" . $plang) ?>"><?= getTitle("news" . $plang) ?></a></li>

                                            </ul>
                                        </li>


                                        <li><a href="<?= $core->getPageUrl("contact" . $plang) ?>"><?= getTitle("contact" . $plang) ?></a></li>
                                    </ul>
                                </div>
                            </nav>
                            <!-- Main Menu End-->






                            <!-- Outer Box -->
                            <div class="outer-box clearfix">
                                <!--Search Box-->




                                <div class="phone-box">
                                    <a href="tel:<?= getValue('header_phone') ?>" title="" class="lang-bs"><span class="flaticon-headphones-1"></span> <?= getValue('header_phone') ?> </a>
                                </div>



                                <div class="lang-box">
                                    <a href="<?= plang($core->getPageUrl("index"), $core->getPageUrl("indexarabic")) ?>" title="" class="lang-bs"><span class="flaticon-planet-earth"></span> <?= plang('En', 'Ar') ?> </a>
                                </div>

                                <div class="search-box-outer">
                                    <div class="search-box-btn"><span class="fal fa-search"></span></div>
                                </div>






                                <!-- Nav Btn -->
                                <div class="nav-btn navSidebar-button"><span class="icon flaticon-menu-1"></span></div>
                            </div>
                            <!-- End Outer Box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Header Lower -->

            <!-- Sticky Header  -->
            <div class="sticky-header">
                <div class="auto-container clearfix">
                    <!-- Logo -->
                    <div class="logo pull-left">
                        <a href="<?= $core->getPageUrl("index" . $plang) ?>" title=""><img src="images/logo.png" alt="" title="" /></a>
                    </div>

                    <!--Right Col-->
                    <div class="pull-right">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                        <!-- Main Menu End-->




                        <!-- Outer Box -->
                        <div class="outer-box clearfix">
                            <!--Search Box-->
                            <div class="search-box-outer">
                                <div class="search-box-btn"><span class="fal fa-search"></span></div>
                            </div>

                            <!-- Nav Btn -->

                            <div class="nav-btn navSidebar-button"><span class="icon flaticon-menu-1"></span></div>
                        </div>
                        <!-- End Outer Box -->
                    </div>
                </div>
            </div>
            <!-- End Sticky Menu -->

            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

                <nav class="menu-box">
                    <div class="nav-logo">
                        <a href="<?= $core->getPageUrl("index" . $plang) ?>"><img src="images/logo.png" alt="" title="" /></a>
                    </div>
                    <div class="menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>




                    <div class="sidebar__social">
                        <ul>
                            <li>
                                <a href="<?= getValue("facebook") ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="<?= getValue("twitter") ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="<?= getValue("youtube") ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="<?= getValue("linkedin") ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>


                    <div class="copyleft">&copy; 2022 Regency Urban Development All Rights Reserved</div>


                </nav>


            </div>
            <!-- End Mobile Menu -->
        </header>
        <!-- End Main Header -->
        <!-- Sidebar Cart Item -->
        <div class="xs-sidebar-group info-group">
            <div class="xs-overlay xs-bg-black"></div>
            <div class="xs-sidebar-widget">
                <div class="sidebar-widget-container">
                    <div class="widget-heading">
                        <a href="#" class="close-side-widget">
                            <i class="fal fa-times"></i>
                        </a>
                    </div>




                    <div class="sidebar-textwidget">





                        <div class="side-navigation">

                            <div class="side-content">
                                <figure> <img src="images/logo.png" alt="Image"> </figure>
                                <?= getValue('slidebar_text', $lang) ?>
                                <ul class="gallery" style="position: relative; height: 125.2px;">
                                    <li><a href="images/Tower-1.jpg" data-fancybox=""><img src="images/Tower-1.jpg" alt="Image"></a></li>
                                    <li><a href="images/Tower-2.jpg" data-fancybox=""><img src="images/Tower-2.jpg" alt="Image"></a></li>
                                    <li><a href="images/Tower-3.jpg" data-fancybox=""><img src="images/Tower-3.jpg" alt="Image"></a></li>
                                </ul>
                                <address>
                                    <?= getValue('footer_adress', $lang) ?>

                                </address>
                                <h6><?= plang('الخط الساخن', 'Hotline') ?> : <?= getValue('header_phone') ?></h6>
                                <p><a href="mailto:<?= getValue('email') ?>"><?= getValue('email') ?></a></p>
                                <ul class="social-media">
                                    <li><a href="<?= getValue("facebook") ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="<?= getValue("twitter") ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="<?= getValue("linkedin") ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="<?= getValue("instagram") ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="<?= getValue("youtube") ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                                <small> 2022 @ copyright Regency Urban Development</small>
                            </div>
                            <!-- end side-content -->
                        </div>






                    </div>
                </div>
            </div>
        </div>
        <!-- END sidebar widget item -->
        <?php if ($pagg != 1) {
            $news = (strpos($name, "news") !== false && $id);
            $style = "bg-17.jpg";
            if ($news) {
                $news = $core->getevents($array)[0];
                // $style = $news["image"];
                $date = getDateTime($news["date"], $lang);
            }  ?>
            <style>
                .header-style-two {
                    position: relative;
                    background-color: #23252d;
                }

                .page-top-wrap h1 {
                    font-size: 45px;

                }

                .main-header .logo-box .logo img {
                    width: 200px;
                }
            </style>
            <section>
                <div class="breadcrumb-sec w-100 pt-170 pb-150 dark-layer3 opc7 position-relative">
                    <div class="fixed-bg" style="background-image: url(images/pagetop-bg.jpg);"></div>
                    <div class="container">
                        <div class="page-top-wrap w-100">
                            <h1 class="my-3"><?= $pageTitle ?></h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html" title=""><?= getTitle("index" . $plang) ?></a></li>
                                <li class="breadcrumb-item"><a href="blog.html" title=""><?= getTitle($name) ?></a></li>
                                <li class="breadcrumb-item active"><?= $pageTitle ?></li>
                            </ol>
                        </div><!-- Page Top Wrap -->
                    </div>
                </div>
            </section>

        <?php }
        if ($pagg != 1 && 1 == 2) {
            $news = (strpos($name, "news") !== false && $id);
            $style = "";
            if ($news) {
                $news = $core->getevents($array)[0];
                $style = "background: url(images/" . $news["image"] . ") repeat;    padding-bottom: 10px;";
                $date = getDateTime($news["date"], $lang);
            } ?>
            <section class="breadcrumb-area" style="background-image: url(images/<?= $style ?>);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="inner-content text-center clearfix">
                                <div class="title">
                                    <h1><?= $pageTitle ?></h1>
                                </div>
                                <div class="breadcrumb-menu">
                                    <div class="home-icon">
                                        <a href="index<?= $plang ?>.php"><span class="icon-home"></span></a>
                                    </div>
                                    <ul class="clearfix">
                                        <li><a href="#"><?= getTitle($name) ?></a></li>
                                    </ul>
                                </div>
                                <?php if ($news) { ?>
                                    <div style="    text-align: center;
    color: #fff;
    font-size: 24px;"><span style="    display: block;
    font-size: 15px;
    margin-top: 26px;
    color: #ffba00;"><?= $date[0] ?>, <?= $date[1] ?> <?= $date[2] ?></span>
                                        <ul style="width: auto;
    margin: 0;
    margin-top: 10px;" class="styled-icons icon-dark icon-sm icon-circled">
                                            <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $FUr ?>" data-bg-color="#3B5998" style="background: rgb(59, 89, 152) !important;"><i class="fab fa-facebook"></i></a></li>
                                            <li><a target="_blank" href="http://twitter.com/share?text=<?= $products[0]["smoll_description" . $clang] ?>&amp;url=<?= $FUr ?>" data-bg-color="#02B0E8" style="background: rgb(2, 176, 232) !important;"><i class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="inner-page-header" style="<?= $style ?>">
                <div class="container">
                    <div class="row">
                        <!--                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                     <div class="header-page-title">
                         <h2><?= $pageTitle ?></h2>
                     </div>
                 </div>-->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-page-locator">
                                <ul>
                                    <li><a href="index<?= $plang ?>.php"><?= getTitle("index" . $plang) ?></a><?= (isv("level") ||  isv("id") ? " / <a href='" . $name . ".php'>" . getTitle($name) . "</a>" : "") ?> / <?= ($news ? "" : $pageTitle) ?></li>
                                </ul> <?php if ($news) { ?>
                                    <div style="    text-align: center;
    color: #fff;
    font-size: 24px;"><?= $pageTitle ?><span style="    display: block;
    font-size: 15px;
    margin-top: 26px;
    color: #ffba00;"><?= $date[0] ?>, <?= $date[1] ?> <?= $date[2] ?></span>
                                        <ul style="width: auto;
    margin: 0;
    margin-top: 10px;" class="styled-icons icon-dark icon-sm icon-circled">
                                            <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $FUr ?>" data-bg-color="#3B5998" style="background: rgb(59, 89, 152) !important;"><i class="fab fa-facebook"></i></a></li>
                                            <li><a target="_blank" href="http://twitter.com/share?text=<?= $products[0]["smoll_description" . $clang] ?>&amp;url=<?= $FUr ?>" data-bg-color="#02B0E8" style="background: rgb(2, 176, 232) !important;"><i class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>