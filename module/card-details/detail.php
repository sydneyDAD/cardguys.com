<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }


$card = $credit_cards->detail();

if($card['alias']!=''){

$alias = $card['alias'];
}
else {
$alias = seourl($card['OfferName']);
}
?>
<?
$extraie1=$extraie2=$extraie3="";
if($matchcase){
$extraie1="re-mod-brow";
$extraie2="re-mod-title";
$extraie3="re-mod-card-top";
}
?>
<div class="single-details-card">
    <div class="single-details-card-title-card">
        <?= $card['header_text'] ?>
    </div>
</div>

<!-- bat dau infor card-->
<div class="infocard2 single">
    <div class="border-content-card-top <?= $extraie3 ?>"></div>
    <div class="title-content-card-top2 <?= $extraie2 ?>">
        <?
        $mang_url =  $_SERVER['REQUEST_URI'];
        $mang_url = explode('/',$mang_url);

        if(intval($mang_url[count($mang_url)-1])== $card['OfferId']){ ?>
        <span class="text-title-Content-card-top"> <a title="<?= $card['OfferName'] ?>" href="<?= change_url('index.php?module=request&id=' . $card['tbl_id'] . '&alias=' . $alias) ?>" target="_blank"><?= $card['OfferName'] ?></a> </span>
        <? }
        else
        {
        ?>
        <span class="text-title-Content-card-top"> <a title="<?= $card['OfferName'] ?>" href="<?= change_url('index.php?module=request&id=' . $card['tbl_id'] . '&alias=' . $alias) ?>" target="_blank"><?= $card['OfferName'] ?></a> </span>
        <? } ?>
    </div>
    <?
    $img_id = $card['BigCreative'];
    if(intval($img_id) != 0 )
    {
    $image = intval($card['BigCreative']);
    $row_img = $advertise->detail1($image);
    $img = "upload/adv/resize/".$row_img['image'];
    }
    else {
    $img = $card['BigCreative'];
    }

    ?>
    <div class="details-card-text-infomation <?= $extraie2 ?>">
        <div class="content-apply-text">
            <div class="details-card-apply-left">
                <a href="<?= change_url('index.php?module=request&id=' . $card['tbl_id'] . '&alias=' . $alias) ?>" target="_blank">
                    <img src="<? echo $img; ?> "  alt="<?= $card['OfferName'] ?>" title="<?= $card['OfferName'] ?>"  style="border-width: 0px;" />
	        </a>
                <a target="_blank" href="<?= change_url('index.php?module=request&id=' . $card['tbl_id'] . '&alias=' . $alias) ?>"><img src="<?= $sitelink ?>/images/apply_now_button.jpg"/></a>
            </div>
            <div class="details-card-text-rigth">
             
                    <?= stripslashes($card['TextDetails']) ?>
           

            </div>
        </div>
        <!-- ket thuc content-apply-text-->

        <div class="footer-details-card">
            <? if($card['PurchaseIntroRate']!='') { ?>
            <div class="purchaseintroAPR">
                <div class="purchaseintroAPRtitle">
		      <b>Purchase Intro APR</b></div>
                <div class="purchaseintroAPRtitle">
		    <?php
                    if (trim($card['PurchaseIntroPeriod']) && trim(strtolower($card['PurchaseIntroRate'])) != "n/a*" && $card['PurchaseIntroRate']):
                        $PIR = str_replace("*", '', $card['PurchaseIntroRate']) . " " . $card['PurchaseIntroPeriod'];
                    else:
                        $PIR = $card['PurchaseIntroRate'];
                    endif;
                    if ($PIR == "n/a N/A")
                        $PIR = "N/A";
                    if ($PIR == "N/A N/A")
                        $PIR = "N/A";
                    echo $PIR = str_replace(".00%", "%", $PIR);
                    ?></div>
            </div>
            <? } ?>
            <? if($card['TransferIntroPeriod']!='') { ?>
            <div class="balancetransfer">
                <div class="purchaseintroAPRtitle">	<b>Balance Transfer Intro APR</b></div>
                <div class="purchaseintroAPRtitle"><?
                    if(trim($card['TransferIntroPeriod']) && trim(strtolower($card['TransferIntroRate']))!="n/a*" && trim(strtolower($card['TransferIntroPeriod']))!="n/a*" && $card['TransferIntroRate'] != 'See Terms' && $card['TransferIntroRate']):
                    $TIR=strtolower(str_replace("*",'',$card['TransferIntroRate']))." ".$card['TransferIntroPeriod'];								
                    else:
                    $TIR=$card['TransferIntroPeriod'];
                    endif;
                    if($TIR == "n/a N/A")
                    $TIR = "N/A";
                    echo $TIR=str_replace(".00%","%",$TIR);
                    ?></div>
            </div>
            <? } ?>
            <? if($card['PurchaseGoToRate']!='') { ?>
            <div class="regularAPRDetails">
                <div class="purchaseintroAPRtitle">	<b>Regular APR</b></div>
                <div class="purchaseintroAPRtitle"><?= $card['PurchaseGoToRate'] ?></div>

            </div>
            <? } ?>
            <? if($card['AnnualFee']!='') { ?>
            <div class="regularAPRDetails">
                <div class="purchaseintroAPRtitle">	<b>Annual Fee</b></div>
                <div class="purchaseintroAPRtitle"><?= str_replace(".00", "", $card['AnnualFee']) ?></div>

            </div>
            <? } ?>
            <? if($card['CreditType']!='') { ?>
            <div class="createNeeded">
                <div class="purchaseintroAPRtitle">	<b>Credit Needed</b></div>
                <div class="purchaseintroAPRtitle"><?= $card['CreditType'] ?></div>

            </div>
            <? } ?>
        </div>
    </div>

</div>
<!-- ket thuc infor card-->


<!-- bat dau infor card-->
<div class="infocard2">

    <div class="title-content-card-top2 <?= $extraie2 ?>">

        <span class="text-title-Content-card-top"> Additional  Cards Information</span>

    </div>
    <div class="details-card-text-infomation <?= $extraie2 ?>">
        <div class="content-apply-text-single">
            <table class="table-single-card" cellpadding="0" cellspacing="0">
                <tr class="trle">
                    <td style="width: 30%;">Balance Transfer Intro Rate 		 	</td>
                    <td style="width: 20%;"><?= $card['TransferIntroRate'] ?></td>
                    <td style="width: 30%;">Cash Advance Fee</td>
                    <td style="width: 20%;"><?= $card['CashAdvancedFee'] ?></td>
                </tr>
                <tr class="trchan">
                    <td>Balance Transfer Intro Period</td>
                    <td><?= $card['TransferIntroPeriod'] ?></td>
                    <td>Cash Advance Go To Rate </td>
                    <td><?= $card['CashAdvancedGoToRate'] ?></td>
                </tr>
                <tr class="trle">
                    <td>Balance Transfer Go To Rate </td>
                    <td><?= $card['TransferGoToRate'] ?></td>
                    <td>Penalty Go To Rate</td>
                    <td><?= $card['PenaltyGoToRate'] ?></td>
                </tr>
                <tr class="trchan">
                    <td>Late Fee </td>
                    <td><?= $card['LateFee'] ?> </td>
                    <td>Balance Transfer Fee </td>
                    <td><?= $card['TransferFee'] ?></td>
                </tr>
                <tr class="trle">
                    <td>Regular APR</td>
                    <td><?= $card['TransferGoToRate'] ?></td>
                    <td>Issuer</td>
                    <td><?= $card['Issuer'] ?></td>
                </tr>
                <tr class="trchan">
                    <td>Perks 	</td>
                    <td><?= $card['Perks'] ?></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

            <div class="applyOnline">
                <a target="_blank"  href="<?= $sitelink ?>/<?= change_url('index.php?module=request&id=' . $card['tbl_id'] . '&alias=' . $alias) ?>" style="font-weight:bold;">
                    Apply online for the <?= $card['OfferName'] ?>
                </a>
            </div>

            <?if($card['footer_text']):?>



            <div class="border-text-footer-khongbiet">
                <?= $card['footer_text'] ?>
            </div>
            <?endif;?>

            <div class="border-text-footer-khongbiet"></div>

        </div>

    </div>

    <!-- div class="border-text-footer-khongbiet-single">
    <?= $card['footer_text'] ?>
</div -->
</div>
<!-- ket thuc infor card-->

<?
if($_GET['id']){

$type_id = intval($_GET['id']);
$list = $credit_cards->detail('asign_article,sapxep',$type_id);
$ca=explode(',',$list['asign_article']);
$sapxep = explode(',',$list['sapxep']);
$arr=array();
foreach($sapxep as $sapxep)
{
if($sapxep!='')
array_push($arr,$sapxep);
}
for($i=0;$i<count($arr)-1;$i++)
{
for($j=$i+1;$j<count($arr);$j++)
{
if($arr[$i]>$arr[$j])
{
$tg1=$arr[$i];
$tg2=$ca[$i];
$arr[$i]=$arr[$j];
$ca[$i]=$ca[$j];
$arr[$j]=$tg1;
$ca[$j]=$tg2;
}
}   
}
}
?>
<?
if($skipp_advice==999 && count($ca) > 0 && $ca[0]!="")
{
?>
<div class="infocard">
    <div class="border-content-card-top  <?= $extraie3 ?>"></div>
    <div class="title-content-card-top  <?= $extraie2 ?>"><span class="text-title-Content-card-top"> Advice Center</span></div>
    <div class="content-card-text-infomation  <?= $extraie2 ?>">
        <? 
        foreach($ca as $caa)
        {
        $row1 = $news->detail("*",$caa);
        ?>
        <div class="content-apply-text2">
            <span class="faq_question"><a href="<?= $row1['alias'] ?>" ><?= $row1['name'] ?></a></span><br/>
            <?= substr($row1['description'], 0, 230) ?>...<br />
            <div style=" text-align: right; font-size: 12px; font-weight: bold;"><a href="<?= $row1['alias'] ?>" style="color:#0D0155;"> >> Read More</a></div>
        </div>

        <?

        }

        ?>
        <div style="clear: both;"></div>
        <div  style="text-align: center; text-decoration: underline; color: #0D0155; font-weight: bold;"><a href="advice-center">Click here to see more articles</a></div>	
    </div>            

    <div class="border-content-card-bottom  <?= $extraie3 ?>"></div>
</div>

<? } ?>