<?php
if (!defined('INCLUDED')) {
    die("Access Denied");
}
$cards = $credit_cards->lists('special=1', 'ordering ASC');
?>
<?
$i = 1;
foreach ($cards as $card) {
    if ($card->alias != '') {

        $alias = $card->alias;
    } else {
        $alias = seourl($card->OfferName);
    }
    if ($i == 3) {
        $border = '';
    }
    if (intval($card->BigCreative) != 0) {
        $image = intval($card->BigCreative);
        $row_img = $advertise->detail1($image);
        $img = "upload/adv/" . $row_img['image'];
    } else {
        $img = $card->BigCreative;
    }

    $dt = ($card->Textdisplay) ? $card->Textdisplay : "visit credit card website for complete details";
    /* start word limiter */ //comment out entire word limiter for all text
    //*
    $dt = explode('</li>', $dt);
    $dt = str_replace('<ul>', '', $dt[0]);
    $dt = str_replace('<li>', '', $dt);
    $dt = word_limiter($dt, 33);
    //*/
    /* word limited */
    $offerName = str_replace('', '', $card->OfferName);
    $offerName = str_replace('Â', '', $offerName);
    $alias = str_replace('Â', '', $alias);
    ?>

    <div class="card-content-infomation" <?= $border ?>>
        <div class=table-info>
            <div class="cardname">
                <a title="<?= $card->OfferName ?>" href="<?= $alias ?>"> 
                    <?= $offerName ?> 
                </a>
            </div>
            <div class="cardthea card_info">
                <a href="<?= $sitelink."/". $alias ?>">
                    <img class="card-img" src="<? echo $img ?>" /> 
                </a> 
            </div>
            <div class="cardthea info-bottom"> 
                <a target="_blank" href="<?= $sitelink."/". change_url('index.php?module=request&id=' . $card->tbl_id . '&alias=' . $alias) ?>">
                    <button class="applybtn"><span>Apply Now</span> 
                        <img class="img-arrow" src="<?php echo $sitelink ?>/images/arrowbtn.png"></button>
                </a>
            </div>   
            <div style="clear: both;"></div>

            <div class="info-left shade">
                Intro APR
            </div>
            <div class="info-right shade">
                <?php
                $PIR = $card->PurchaseIntroRate;
                echo $PIR = str_replace(".00%", "%", $PIR);
                ?>
            </div>
            <div style="clear: both;"></div>
            <div class="info-left novborder">
                APR
            </div>
            <div class="info-right novborder">
                <?= $card->PurchaseGoToRate ?>
            </div>
            <div style="clear: both;"></div>
            <div class="info-left shade">
                Credit Needed
            </div>
            <div class="info-right shade">
                <?= $card->CreditType ?>
            </div>

            <?php $cleandesc = str_replace('Â', '', $dt); ?>
            <div style="clear: both;"></div>
            <div class=info-descx><?= $cleandesc; ?></div>


            <div style="clear: both;"></div>


        </div>

        <div class="cardinformation">




        </div>
        <div style="clear: both;"></div>
    </div>



    <?
    $i++;
}
?>