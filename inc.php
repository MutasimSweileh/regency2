<?php
include_once("classes/core.php");
$core = new core;
define("ABSPATH", 1);
include("inc/inc_formemail.php");
require_once("Minifier/jsmin.php");
require_once("Minifier/cssmin.php");
require_once("Minifier/ao-minify-html.php");
ob_start(function ($buffer) {
    $buffer = ZO_Minify_HTML::minify($buffer, ["keepComments" => false, "jsMinifier" => 'JSMin::minify', "cssMinifier" => 'CssMin::minify']);
    return $buffer;
});
//ob_start('sanitize_output');
$name = pathinfo(basename($_SERVER["PHP_SELF"]))["filename"];
$lang = (strpos($name, "arabic") ? "arabic" : "english");
$plang = ($lang == "arabic" ? $lang : "");
$clang = ($lang == "english" ? "" : "_arabic");
if (strpos($FUr, "php") === false && !isv("id") && !isv("level")) {
    //  header("Location: indexarabic.php");
}
include  "inc/header.php";
if ($pagg == 1)
    include  "inc/slider.php";
