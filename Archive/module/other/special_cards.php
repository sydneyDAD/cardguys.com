<?php if ( !defined('INCLUDED') ) { die("Access Denied"); }
$cards = $credit_cards->lists('special=1','ordering ASC');

?>
<?
$i=1;
foreach ($cards as $card) {
 if($card->alias!=''){

            $alias = $card->alias;
        }
        else {
            $alias = seourl($card->OfferName);
 }
 if($i==3){
    $border='';
 }
 if(intval($card->BigCreative)!=0)
 {
    $image = intval($card->BigCreative);
    $row_img = $advertise->detail1($image);
    $img =  "upload/adv/".$row_img['image'];

 }
 else
 {
    $img = $card->BigCreative;
 }
?>

<div class="card-content-infomation" <?=$border?>>
							<div class="cardname" ><a title="<?=$card->OfferName?>" href="<?=$alias?>"> <?=$card->OfferName?> </a></div>
							<div class="cardthea"><a href="<?=$alias?>"><img src="<? echo $img ?>" /> </a> </div>
							<div class="cardthea"> <a target="_blank" href="<?=change_url('index.php?module=request&id='.$card->tbl_id.'&alias='.$alias)?>"><img src="images/applynow.gif" /> </a> </div>
							<div style="clear: both;"></div><br />
                            <div>
								<table class="table-info" cellpadding="0" cellspacing="0">
									<tr>
										<td>Intro APR</td>
										<td>APR</td>
										<td>Credit Needed</td>
									</tr>
									<tr>
										<td><?=$card->PurchaseIntroRate?></td>
										<td><?=$card->PurchaseGoToRate?></td>
										<td><?=$card->CreditType?></td>
									</tr>
								</table>
							</div>
							<div class="cardinformation">
                            <?

                           $dt = $card->Textdisplay;
                           //$dt = explode('</li>',$card->Textdisplay);
                           //$dt = str_replace('<ul>','',$dt[0]);
                           //$dt = str_replace('<li>','',$dt);
                           //echo word_limiter($dt,25);
                           echo $dt;
                           ?>
                           </div>
                           <div style="clear: both;"></div>
</div>



<?
    $i++;
}
?>