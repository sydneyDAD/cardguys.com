<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); }
$_SESSION['f'] = "";$listid=0;
//echo $modul['xid'];

if($_GET['type']){

   $type_id = intval($_GET['type']);
   $list_cards = $cards_type->detail('tbl_id,cards_list,header_text,head_name,top_list,footer_text,name,image,top_type_name,sapxep,featured,icon_on,top_type_name2',$type_id);
   $listid=$list_cards['tbl_id'];
   $ca=explode(',',$list_cards['cards_list']);
   $sapxep = explode(',',$list_cards['sapxep']);
   $arr=array();
    foreach($sapxep as $sapxep)
    {
        if($sapxep!='')
        array_push($arr,$sapxep);
    }
    //for($i=0;$i<count($arr)-1;$i++)
    //{
    //    for($j=$i+1;$j<count($arr);$j++)
    //    {
    //        if($arr[$i]>$arr[$j])
    //        {
    //            $tg1=$arr[$i];
    //            $tg2=$ca[$i];
    //            $arr[$i]=$arr[$j];
    //            $ca[$i]=$ca[$j];
    //            $arr[$j]=$tg1;
    //            $ca[$j]=$tg2;
    //        }
    //    }   
    //}
   $image=$list_cards['image'];
   $type_name =$list_cards['name'];
   $top_type_name=$list_cards['top_type_name'];
   $top_type_name2=$list_cards['top_type_name2'];
   $header_text = $list_cards['header_text'];
   $footer_text = $list_cards['footer_text'];
   $featured = $list_cards['featured'];
   $_SESSION['f'] = $list_cards['featured'];
}
elseif($_GET['issuer']){
    $type_id = intval($_GET['issuer']);

   $list_cards = $cards_bank->detail('cards_list,header_text,head_name,top_type_name,top_list,footer_text,name,image,sapxep,featured,icon_on',$type_id);

   $ca=explode(',',$list_cards['cards_list']);
   $sapxep = explode(',',$list_cards['sapxep']);
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
   $image=$list_cards['image'];
   $type_name =$list_cards['name'];
   $header_text = $list_cards['header_text'];
   $footer_text = $list_cards['footer_text'];
   $featured = $list_cards['featured'];
    $_SESSION['f'] = $list_cards['featured'];
}

elseif($_GET['quality']){
    $type_id = intval($_GET['quality']);
   $list_cards = $cards_quality->detail('cards_list,header_text,head_name,top_type_name,top_list,footer_text,name,image,sapxep,featured,icon_on',$type_id);

   $ca=explode(',',$list_cards['cards_list']);
   $sapxep = explode(',',$list_cards['sapxep']);
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
   $image=$list_cards['image'];
   $type_name =$list_cards['name'];
   $header_text = $list_cards['header_text'];
   $footer_text = $list_cards['footer_text'];
   $featured = $list_cards['featured'];
    $_SESSION['f'] = $list_cards['featured'];
}
elseif($_GET['int']){

    $type_id = intval($_GET['int']);

   $list_cards = $cards_int->detail('cards_list,header_text,head_name,top_type_name,top_list,footer_text,name,image,sapxep,featured,icon_on',$type_id);
   $ca=explode(',',$list_cards['cards_list']);
   $sapxep = explode(',',$list_cards['sapxep']);
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
   $image=$list_cards['image'];
   
   $type_name =$list_cards['name'];
   $featured = $list_cards['featured'];
   $_SESSION['f'] = $list_cards['featured'];
   $header_text = $list_cards['header_text'];
   $footer_text = $list_cards['footer_text'];
}elseif($_GET['report']){

    $type_id = intval($_GET['report']);

   $list_cards = $cards_report->detail('cards_list,header_text,head_name,top_type_name,top_list,footer_text,name,image,sapxep,featured,icon_on',$type_id);
   $ca=explode(',',$list_cards['cards_list']);
   $sapxep = explode(',',$list_cards['sapxep']);
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
   $image=$list_cards['image'];
   
   $type_name =$list_cards['name'];
   $featured = $list_cards['featured'];
   $_SESSION['f'] = $list_cards['featured'];
   $header_text = $list_cards['header_text'];
   $footer_text = $list_cards['footer_text'];
}
else {

    header_redirect($sitelink);
}

if(count($ca)>0)
{$top_list_names="";$head_name=($list_cards['head_name'])?$list_cards['head_name']:$type_name;
if($list_cards['top_type_name'] && $list_cards['top_list']){
		$top_list_names=array_combine(explode(",",$list_cards['top_list']),explode("@||@|@",$list_cards['top_type_name']));
	}
?>

<div class=card_pg_contain>
		<div class="content-khongbiet">
				
				<?
				$extraie1=$extraie2=$extraie3="";
				if($matchcase){
				$extraie1="re-mod-brow";
				$extraie2="re-mod-title";
				$extraie3="re-mod-card-top";
				}
				?>
		<div class="border-content-footer-khongbiet <?=$extraie1?>">				
              
                    </div>
				    <div class="namecardText"><?=$head_name?></div>
					<div class="border-text-footer-khongbiet"><?=$header_text?>	</div>
				</div>

			</div>


		<?if($listid==4 && $top_type_name2){?>
			<div style="clear:both"></div>

			<div class="namecard">

				<div class="namecardText2">  <?=$top_type_name2?> </div>
			</div>
           <?
           }
           foreach($ca as $id)
           {
            
                $card = $credit_cards->detail1('*',$id);
                if($card)
                {                      
                    if($card['alias']!=''){
             
                        $alias = $card['alias']; 
                    }
                    else {
                        $alias = seourl($card['OfferName']);
                    }
        ?>
		
            <? 
              $card['OfferName2']=($listid==4 && isset($top_list_names[$card['OfferId']]) && trim($top_list_names[$card['OfferId']]))?$top_list_names[$card['OfferId']]:"";
            if($card['OfferId']==$featured){     

                ?>
                <div class="infocard2">
			
                
		<?if(trim($card['OfferName2'])){?>
                
                <div class="title-content-card-top <?=$extraie2?>" >
                    <span class="text-title-Content-card-top" style="color:#006;font-size:17px;"><?=$card['OfferName2']?></span>
                </div>                
		<div class="title-content-card-top <?=$extraie2?>" style="background-color:#fff;padding-top:5px;">
				
				<?}else{?>
		<div class="title-content-card-top2 single <?=$extraie2?>" style="height:30px !important;">
                <?
                }
                    $imagenow=($type_id!=4)?"<div style=\"clear: both;\"></div> <span  class=topoffimg><img height=27 src=\"images/top_offer.gif\"/></span>":"";
                    if(strlen($card['OfferName'])>200)
                    {
						
                ?>
				<span class="text-title-Content-card-top"><a title="<?=$card['OfferName']?>" href="<?= $sitelink ?>/<?=$alias?>"> <?=substr($card['OfferName'],0,60)?>... </a><?=$imagenow?></span>
                <?
                }
                else
                {
                ?>
                    <span class="text-title-Content-card-top">
                     
                     <a title="<?=$card['OfferName']?>" href="<?= $sitelink ?>/<?=$alias?>"> <?=$card['OfferName']?> </a><?=$imagenow?></span>
                <?
                }
                ?>
				</div>
				<div class="details-card-text-infomation <?=$extraie2?>">
					<div class="content-apply-text">
						<div class="details-card-apply-left">
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
                         <a  href="<?= $sitelink ?>/<?=$alias?>" >
                        <img src="<? echo $img; ?>" title="<?=$card['OfferName']?>" alt="<?=$card['OfferName']?>" style="border-width: 0px;" /></a>


							<a  title="Apply Now"  href="<?=change_url('index.php?module=request&id='.$card['tbl_id'].'&alias='.$alias)?>" target="_blank"><img src="<?= $sitelink ?>/images/apply_now_button.jpg"/></a>
						</div>
						<div class="details-card-text-rigth">
						
                        <? $detailstext = stripslashes($card['TextDetails']); ?>
							<?=$detailstext?>
						

						</div>
					</div>
					
					<div class="footer-details-card">
                    <? if($card['PurchaseIntroRate']!='') { ?>
						<div class="purchaseintroAPR">
							<div class="purchaseintroAPRtitle">	<b>Purchase Intro APR</b></div>
							<div class="purchaseintroAPRtitle"><?php
							//echo $PIR=(trim($card['PurchaseIntroPeriod']) && $card['PurchaseIntroRate']!="N/A*" && $card['PurchaseIntroRate'])?str_replace("*",'',$card['PurchaseIntroRate'])." ".$card['PurchaseIntroPeriod']:$card['PurchaseIntroRate'];
							if(trim($card['PurchaseIntroPeriod']) && trim(strtolower($card['PurchaseIntroRate']))!="n/a*" && $card['PurchaseIntroRate']):
								$PIR=str_replace("*",'',$card['PurchaseIntroRate'])." ".$card['PurchaseIntroPeriod'];
							else:
								$PIR=$card['PurchaseIntroRate'];
							endif;	
							//Replace PIR
							if($PIR=="n/a N/A"):
								$PIR="N/A";
							endif;
							if($PIR=="N/A N/A"):
								$PIR="N/A";
							endif;
							if($PIR=="N/A for N/A"):
								$PIR="N/A";
							endif;
							echo $PIR=str_replace(".00%","%",$PIR);
							?></div>
						</div>
                        <? } ?>
                        <? if($card['TransferIntroPeriod']!='') { ?>
						<div class="balancetransfer">
						<div class="purchaseintroAPRtitle">	<b>Balance Transfer Intro APR</b></div>
							<div class="purchaseintroAPRtitle"><?php
								//echo $TIR=(trim($card['TransferIntroPeriod']) && $card['PurchaseIntroRate']!="N/A*" && $card['PurchaseIntroRate'])?strtolower(str_replace("*",'',$card['PurchaseIntroRate']))." ".$card['TransferIntroPeriod']:$card['TransferIntroPeriod'];
							if(trim($card['TransferIntroPeriod']) && trim(strtolower($card['TransferIntroRate']))!="n/a*" && $card['TransferIntroRate'] != 'see terms' && trim(strtolower($card['TransferIntroPeriod']))!="n/a*" && $card['TransferIntroRate']):
								$TIR=strtolower(str_replace("*",'',$card['TransferIntroRate']))." ".$card['TransferIntroPeriod'];								
							else:
								$TIR=$card['TransferIntroPeriod'];
							endif;
							if($TIR=="n/a N/A"):
								$TIR="N/A";
							endif;
							if($TIR=="n/a for N/A"):
								$TIR="N/A";
							endif;
							
							echo $TIR=str_replace(".00%","%",$TIR);
								?></div>
						</div>
                        <? } ?>
                        <? if($card['PurchaseGoToRate']!='') { ?>
						<div class="regularAPRDetails">
						<div class="purchaseintroAPRtitle">	<b>Regular APR</b></div>
							<div class="purchaseintroAPRtitle"><?=$card['PurchaseGoToRate']?></div>

						</div>
                         <? } ?>
                         <? if($card['AnnualFee']!='') { ?>
						<div class="regularAPRDetails">
						<div class="purchaseintroAPRtitle">	<b>Annual Fee</b></div>
							<div class="purchaseintroAPRtitle"><?=str_replace(".00","",$card['AnnualFee'])?></div>

						</div>
                        <? } ?>
                         <? if($card['CreditType']!='') { ?>
						<div class="createNeeded">
						<div class="purchaseintroAPRtitle">	<b>Credit Needed</b></div>
							<div class="purchaseintroAPRtitle"><?=$card['CreditType']?></div>

						</div>
                        <? } ?>
					</div>
				</div>
                </div>
                <? }}?>

            <?}?>
            <?
           
           foreach($ca as $id)
           {   
            
           $card = $credit_cards->detail1('*',$id);
           if($card)
           {                      
                if($card['alias']!=''){
        
                    $alias = $card['alias'];
                }
                else {
                    $alias = seourl($card['OfferName']);
                }
             $good= intval($card['good']);
             $top= $card['top'];
             
             //echo $alias."<br>";
        ?>
			<!-- bat dau infor card-->
			
            <? 
            if(($card['OfferId']!=$featured)){
            $card['OfferName2']=($listid==4 && isset($top_list_names[$card['OfferId']]) && trim($top_list_names[$card['OfferId']]))?$top_list_names[$card['OfferId']]:"";     
                   
                ?>
                <div class="infocard2">
				
                <?php print_r($card['OfferId']); ?>
                <?if(trim($card['OfferName2'])){?>
                <div class="title-content-card-top2  single<?=$extraie2?>" ><span class="text-title-Content-card-top" style="color:#006;font-size:17px;"><?=$card['OfferName2']?></span></div>                
				<div class="title-content-card-top2 single <?=$extraie2?>" style="background-color:#fff;padding-top:5px;">
				
				<?}else{?>
					<div class="title-content-card-top2 single <?=$extraie2?>">
                <?
                }
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
                <?
                    if(strlen($card['OfferName'])>200)
                    {
                ?>
				<span class="text-title-Content-card-top"><a title="<?=$card['OfferName']?>" href="<?= $sitelink ?>/<?=change_url('index.php?module=card-details&id='.$card['tbl_id'].'&alias='.$alias)?>"> <?=substr($card['OfferName'],0,62)?>... </a></span>
                <?
                }
                else
                {
                ?>
                    <span class="text-title-Content-card-top"><a title="<?=$card['OfferName']?>" href="<?= $sitelink ?>/<?=$alias?>"> <?=$card['OfferName']?> </a></span>
                <?
                }
                ?>
				</div>
				<div class="details-card-text-infomation <?=$extraie2?>">
					<div class="content-apply-text">
						<div class="details-card-apply-left">
                         <a  href="<?= $sitelink ?>/<?=$alias?>" >
                        <img src="<?  echo $img; ?>" title="<?=$card['OfferName']?>" alt="<?=$card['OfferName']?>"  style="border-width: 0px; width: 180px;" /></a>

                            <a target="_blank" href="<?= $sitelink."/". change_url('index.php?module=request&id=' . $card->tbl_id . '&alias=' . $alias) ?>">
                                <button class="applybtn"><span>Apply Now</span> 
                                    <img class="img-arrow" src="<?php echo $sitelink ?>/images/arrowbtn.png"></button>
                            </a>
			
						</div>
                                                
						<div class="details-card-text-rigth">
                                                    <span style="margin-left: -14px;font-family: Lato-Bol;">Key Feature</span>
						
							<? $detailstext = stripslashes($card['TextDetails']); ?>
							<?=$detailstext?>
						

						</div>
					</div>
					<!-- ket thuc content-apply-text-->

					<div class="footer-details-card">
                    <? if($card['PurchaseIntroRate']!='') { ?>
						<div class="purchaseintroAPR">
							<div class="purchaseintroAPRtitle">	<b>Purchase Intro APR</b></div>
							<div class="purchaseintroAPRtitle"><?php
								//echo $PIR=(trim($card['PurchaseIntroPeriod']) && $card['PurchaseIntroRate']!="N/A*" && $card['PurchaseIntroRate'])?str_replace("*",'',$card['PurchaseIntroRate'])." ".$card['PurchaseIntroPeriod']:$card['PurchaseIntroRate'];
								if(trim($card['PurchaseIntroPeriod']) && trim(strtolower($card['PurchaseIntroRate']))!="n/a*" && $card['PurchaseIntroRate']):
								$PIR=str_replace("*",'',$card['PurchaseIntroRate'])." ".$card['PurchaseIntroPeriod'];
							else:
								$PIR=$card['PurchaseIntroRate'];
							endif;	
							//Replace PIR
							if($PIR=="N/A for N/A"):
								$PIR="N/A";
							endif;
							if($PIR=="n/a N/A"):
								$PIR="N/A";
							endif;
							if($PIR=="N/A N/A"):
								$PIR="N/A";
							endif;
							echo $PIR=str_replace(".00%","%",$PIR);
							?></div>
						</div>
                        <? } ?>
                        <? if($card['TransferIntroPeriod']!='') { ?>
						<div class="balancetransfer">
						<div class="purchaseintroAPRtitle">
                                                    <b>Balance Transfer Intro APR</b></div>
							<div class="purchaseintroAPRtitle"><?php
								//echo $TIR=(trim($card['TransferIntroPeriod']) && $card['PurchaseIntroRate']!="N/A*" && $card['PurchaseIntroRate'])?strtolower(str_replace("*",'',$card['PurchaseIntroRate']))." ".$card['TransferIntroPeriod']:$card['TransferIntroPeriod'];
								if(trim($card['TransferIntroPeriod']) && trim(strtolower($card['TransferIntroRate']))!="n/a*" && $card['TransferIntroRate'] != 'See Terms' && trim(strtolower($card['TransferIntroPeriod']))!="n/a*" && $card['TransferIntroRate']):
								$TIR=strtolower(str_replace("*",'',$card['TransferIntroRate']))." ".$card['TransferIntroPeriod'];
							else:
								$TIR=$card['TransferIntroPeriod'];
							endif;
							if($TIR=="n/a N/A"):
								$TIR="N/A";
							endif;
							if($TIR=="n/a for N/A"):
								$TIR="N/A";
							endif;
							echo $TIR=str_replace(".00%","%",$TIR);
							?></div>
						</div>
                        <? } ?>
                        <? if($card['PurchaseGoToRate']!='') { ?>
						<div class="regularAPRDetails">
						<div class="purchaseintroAPRtitle">	<b>Regular APR</b></div>
							<div class="purchaseintroAPRtitle"><?=$card['PurchaseGoToRate']?></div>

						</div>
                         <? } ?>
                         <? if($card['AnnualFee']!='') { ?>
						<div class="regularAPRDetails">
						<div class="purchaseintroAPRtitle">	<b>Annual Fee</b></div>
							<div class="purchaseintroAPRtitle"><?=str_replace(".00","",$card['AnnualFee'])?></div>

						</div>
                        <? } ?>
                         <? if($card['CreditType']!='') { ?>
						<div class="createNeeded">
						<div class="purchaseintroAPRtitle">	<b>Credit Needed</b></div>
							<div class="purchaseintroAPRtitle"><?=$card['CreditType']?></div>

						</div>
                        <? } ?>
					</div>
				</div>
                </div>
                
                <? }}?>
			
		<!-- ket thuc infor card-->

            <?}?>
			
		<!-- ket thuc infor card-->

			<!-- bat dau` phan co 3 dong cuoi dung-->
			<?if(trim($footer_text) && strtolower($footer_text)!="<br />"):?>
			<div class="content-khongbiet">
				
				<div class="border-content-footer-khongbiet">
					<div class="border-text-footer-khongbiet">
					<?=$footer_text?>
					</div>
				</div>

			</div>
		<?endif;?>
		<!-- ket thuc phan co 3 dong cuoi dung-->
	<div style="clear:both"></div>

</div>
<?
}
else {
    ?>
    <div style="background-color: white; text-align: center; height: 100px; line-height: 50px; font-weight: bold;">

        No item.

    </div>
    <?
}?>