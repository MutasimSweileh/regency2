<?php
$pagg = 7;
include "inc.php";
?>
<style>
    li.wow.fadeInUp.col-md-3.col-sm-6.mb-2.galley.animated {
        padding: 10px;
    }

    .inter {
        position: relative;
        display: block;
        padding: 5px;
        border: 2px dashed #de9e48;
        background: #5b3230;
    }
</style>
<section class="gallery-one mt-3">
    <div class="gallery-one__container-box clearfix">
        <div class=" container">
            <ul class="list-unstyled gallery2-one-carousel owl3-carousel custom-nav row">
                <?php
                $prodpram = array();
                $products2 = $core->getvideo($prodpram);
                if ($products2 != null)
                    for ($ii = 0; $ii < count($products2); $ii++) {
                ?>

                    <li class="wow fadeInUp col-md-3 col-sm-6 mb-2 galley" data-wow-delay="<?= $ii + 1 ?>00ms">
                        <div class="inter">
                            <iframe width="100%" height="100%" style="margin: auto; margin-right: 0%; border: 0px; min-height: 200px;" src="https://www.youtube.com/embed/<?= $products2[$ii]["video"] ?>" allowfullscreen></iframe>

                        </div>

                    </li>

                <? } ?>
            </ul>
        </div>
    </div>
</section>
<?php
include "inc/footer.php";
?>