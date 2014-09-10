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


			<div class="content-khongbiet">
				<div class="border-footer-khongbiet"></div>
				<?
				$extraie1=$extraie2=$extraie3="";
				if($matchcase){
				$extraie1="re-mod-brow";
				$extraie2="re-mod-title";
				$extraie3="re-mod-card-top";
				}
				?>
				<div class="border-content-footer-khongbiet <?=$extraie1?>">				
                    <div class="namecardImage" > <?if(strtolower($modul['xid'])!='type' && $image!='' && !$list_cards['icon_on']){?>
                         <img  title="<?=$type_name?>" src="<?=$sitelink?>upload/product/<?=$image?>" style="border-width:0px;" />
                            <?}?> 
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
                   //echo $alias." $type_id<Br>";
                ?>
                <div class="infocard">
				<div class="border-content-card-top <?=$extraie3?>"></div>
                
				<?if(trim($card['OfferName2'])){?>
                <div class="title-content-card-top <?=$extraie2?>" > <span class="text-title-Content-card-top" style="color:#006;font-size:17px;"><?=$card['OfferName2']?></span></div>                
				<div class="title-content-card-top <?=$extraie2?>" style="background-color:#fff;padding-top:5px;">
				
				<?}else{?>
					<div class="title-content-card-top <?=$extraie2?>">
                <?
                }
                    $imagenow=($type_id!=4)?"<div style=\"clear: both;\"></div> <span  class=topoffimg><img height=27 src=\"images/topoffer.gif\"/></span>":"";
                    if(strlen($card['OfferName'])>200)
                    {
						
                ?>
				<span class="text-title-Content-card-top"><a title="<?=$card['OfferName']?>" href="<?=$alias?>"> <?=substr($card['OfferName'],0,60)?>... </a><?=$imagenow?></span>
                <?
                }
                else
                {
                ?>
                    <span class="text-title-Content-card-top"><a title="<?=$card['OfferName']?>" href="<?=$alias?>"> <?=$card['OfferName']?> </a><?=$imagenow?></span>
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
                         <a  href="<?=$alias?>" >
                        <img src="<? echo $img; ?>" title="<?=$card['OfferName']?>" alt="<?=$card['OfferName']?>" style="border-width: 0px;" /></a>


							<a  title="Apply Now"  href="<?=change_url('index.php?module=request&id='.$card['tbl_id'].'&alias='.$alias)?>" target="_blank"><img src="images/applynow.gif"/></a>
						</div>
						<div class="details-card-text-rigth">
						<ul>
							<?=$card['TextDetails']?>
						</ul>

						</div>
					</div>
					
					<div class="footer-details-card">
                    <? if($card['PurchaseIntroRate']!='') { ?>
						<div class="purchaseintroAPR">
							<div class="purchaseintroAPRtitle">	<b>Purchase Intro APR</b></div>
							<div class="purchaseintroAPRtitle"><?=$card['PurchaseIntroRate']?></div>
						</div>
                        <? } ?>
                        <? if($card['PurchaseIntroPeriod']!='') { ?>
						<div class="balancetransfer">
						<div class="purchaseintroAPRtitle">	<b>Balance Transfer Intro APR</b></div>
							<div class="purchaseintroAPRtitle"><?=$card['PurchaseIntroPeriod']?></div>
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
							<div class="purchaseintroAPRtitle"><?=$card['AnnualFee']?></div>

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
            if(($card['OfferId']!=$featured) ){
            $card['OfferName2']=($listid==4 && isset($top_list_names[$card['OfferId']]) && trim($top_list_names[$card['OfferId']]))?$top_list_names[$card['OfferId']]:"";     
                   
                ?>
                <div class="infocard">
				<div class="border-content-card-top <?=$extraie3?>"></div>
                
                <?if(trim($card['OfferName2'])){?>
                <div class="title-content-card-top <?=$extraie2?>" > <span class="text-title-Content-card-top" style="color:#006;font-size:17px;"><?=$card['OfferName2']?></span></div>                
				<div class="title-content-card-top <?=$extraie2?>" style="background-color:#fff;padding-top:5px;">
				
				<?}else{?>
					<div class="title-content-card-top <?=$extraie2?>">
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
				<span class="text-title-Content-card-top"><a title="<?=$card['OfferName']?>" href="<?=change_url('index.php?module=card-details&id='.$card['tbl_id'].'&alias='.$alias)?>"> <?=substr($card['OfferName'],0,62)?>... </a></span>
                <?
                }
                else
                {
                ?>
                    <span class="text-title-Content-card-top"><a title="<?=$card['OfferName']?>" href="<?=$alias?>"> <?=$card['OfferName']?> </a><!img  src="images/googOffer.gif"/></span>
                <?
                }
                ?>
				</div>
				<div class="details-card-text-infomation <?=$extraie2?>">
					<div class="content-apply-text">
						<div class="details-card-apply-left">
                         <a  href="<?=$alias?>" >
                        <img src="<?  echo $img; ?>" title="<?=$card['OfferName']?>" alt="<?=$card['OfferName']?>"  style="border-width: 0px;" /></a>


							<a  title="Apply Now"  href="<?=change_url('index.php?module=request&id='.$card['tbl_id'].'&alias='.$alias)?>" target="_blank"><img src="images/applynow.gif"/></a>
						</div>
						<div class="details-card-text-rigth">
						<ul>
							<?=$card['TextDetails']?>
						</ul>

						</div>
					</div>
					<!-- ket thuc content-apply-text-->

					<div class="footer-details-card">
                    <? if($card['PurchaseIntroRate']!='') { ?>
						<div class="purchaseintroAPR">
							<div class="purchaseintroAPRtitle">	<b>Purchase Intro APR</b></div>
							<div class="purchaseintroAPRtitle"><?=$card['PurchaseIntroRate']?></div>
						</div>
                        <? } ?>
                        <? if($card['PurchaseIntroPeriod']!='') { ?>
						<div class="balancetransfer">
						<div class="purchaseintroAPRtitle">	<b>Balance Transfer Intro APR</b></div>
							<div class="purchaseintroAPRtitle"><?=$card['PurchaseIntroPeriod']?></div>
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
							<div class="purchaseintroAPRtitle"><?=$card['AnnualFee']?></div>

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
				<div class="border-footer-khongbiet"></div>
				<div class="border-content-footer-khongbiet">
					<div class="border-text-footer-khongbiet">
					<?=$footer_text?>
					</div>
				</div>

			</div>
		<?endif;?>
		<!-- ket thuc phan co 3 dong cuoi dung-->
	<div style="clear:both"></div>


<?
}
else {
    ?>
    <div style="background-color: white; text-align: center; height: 100px; line-height: 50px; font-weight: bold;">

        No item.

    </div>
    <?
}?>