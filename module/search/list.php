<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); }
$_SESSION['f'] = "";$listid=0;
//echo $modul['xid'];
if($_GET['credit_cat']){




   $type_id = intval($_GET['credit_cat']);
   $list_cards = $cards_type->detail('tbl_id,cards_list,bmo_card_id,header_text,head_name,top_list,footer_text,name,image,top_type_name,sapxep,featured,icon_on,top_type_name2',$type_id);
   $listid=$list_cards['tbl_id'];
   
   
   
   if($country=='CA'){
   
   $list_cards = $cards_type->detail('tbl_id,cards_list,bmo_card_id,header_text,head_name,top_list,footer_text,name,image,top_type_name,sapxep,featured,icon_on,top_type_name2',$type_id);
   
   
      if($list_cards['bmo_card_id']==""){
	 $ca=explode(',',$list_cards['cards_list']);
     
      }
      else{
	 $ca=explode(',',$list_cards['bmo_card_id']);
       
      }
   }
   else{
      $list_cards = $cards_type->detail('tbl_id,cards_list,header_text,head_name,top_list,footer_text,name,image,top_type_name,sapxep,featured,icon_on,top_type_name2',$type_id);

      $ca=explode(',',$list_cards['cards_list']);
   }
  
   
   $sapxep = explode(',',$list_cards['sapxep']);
   $arr=array();
    foreach($sapxep as $sapxep)
    {
        if($sapxep!='')
        array_push($arr,$sapxep);
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

else {

    //header_redirect($sitelink);
}


switch(intval($_GET['credit_type'])){
    
   case 1: $type_args=" AND CreditType LIKE '%Bad%' "; break;
   case 2: $type_args=" AND CreditType LIKE '%Fair%' "; break;
   case 3: $type_args=" AND CreditType LIKE '%Good%' "; break;
   case 4: $type_args=" AND CreditType LIKE '%Excellent%' "; break;
   case 5: $type_args=""; break;


}

switch(intval($_GET['credit_as'])){
    
   case 1: $type_args.=" AND (OfferName NOT LIKE '%Student%' AND OfferName NOT LIKE '%Business%') "; break;
   case 2: $type_args.=" AND (OfferName LIKE '%Student%' OR TextDetails LIKE '%school%')"; break;
   case 3: $type_args.=" AND OfferName LIKE '%Business%' "; break;

}


$creditas=intval($_GET['credit_as']);


   if(count($ca)>0)
   {
      $top_list_names="";$head_name=($list_cards['head_name'])?$list_cards['head_name']:$type_name;
      
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
                    <div class="namecardImage" > <?if(strtolower($modul['xid'])!='type' && $image!='' && !$list_cards['icon_on']){?>
                         <!--<img  title="<?=$type_name?>" src="<?=$sitelink?>/upload/product/<?=$image?>" style="border-width:0px;" />-->
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
            
	   echo $counter2++;
           $card = $credit_cards->detail1('*',$id,$type_args);
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
                <div class="infocard2 card-details">
				
                
                <?if(trim($card['OfferName2'])){?>
                <div class="title-content-card-top2 <?=$extraie2?>" ><span class="text-title-Content-card-top" style="color:#006;font-size:17px;"><?=$card['OfferName2']?></span></div>                
				<div class="title-content-card-top2 <?=$extraie2?>" style="background-color:#fff;padding-top:5px;">
				
				<?}else{?>
					<div class="title-content-card-top2 <?=$extraie2?>">
                <?
                }
                            $img_id = $card['BigCreative'];
                            if(intval($img_id) != 0 )
                            {
                                $image = intval($card['BigCreative']);
                                $row_img = $advertise->detail1($image);
                                $img = "/upload/adv/resize/".$row_img['image'];
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
                    <span class="text-title-Content-card-top"><a title="<?=$card['OfferName']?>" href="<?=$alias?>"> <?=$card['OfferName']?> </a></span>
                <?
                }
                ?>
				</div>
				<div class="details-card-text-infomation <?=$extraie2?>">
					<div class="content-apply-text">
						<div class="details-card-apply-left">
						   <a  href="<?php echo $sitelink; ?>/<?=$alias?>" >
   						   <img src="<?  echo $img; ?>" title="<?=$card['OfferName']?>" alt="<?=$card['OfferName']?>"  style="border-width: 0px;" /></a>
						   <a target="_blank" href="<?= $sitelink."/". change_url('index.php?module=request&id='.$card['tbl_id'].'&alias='.$alias) ?>">
						      <button class="applybtn"><span>Apply Now</span> 
						      <img class="img-arrow" src="<?php echo $sitelink ?>/images/arrowbtn.png"></button>
						   </a>
						
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
		
		<div class="infocard2">
				
				<div class="title-content-card-top2 <?=$extraie2?>">

				<span class="text-title-Content-card-top"> Additional  Cards Information</span>

				</div>
				<div class="details-card-text-infomation <?=$extraie2?>">
					<div class="content-apply-text-single">
					    <table class="table-single-card" cellpadding="0" cellspacing="0">
						<tr class="trle">
							<td style="width: 30%;">Balance Transfer Intro Rate 		 	</td>
							<td style="width: 20%;"><?=$card['TransferIntroRate']?></td>
							<td style="width: 30%;">Cash Advance Fee</td>
							<td style="width: 20%;"><?=$card['CashAdvancedFee']?></td>
						</tr>
						<tr class="trchan">
							<td>Balance Transfer Intro Period</td>
							<td><?=$card['TransferIntroPeriod']?></td>
							<td>Cash Advance Go To Rate </td>
							<td><?=$card['CashAdvancedGoToRate']?></td>
						</tr>
						<tr class="trle">
							<td>Balance Transfer Go To Rate </td>
							<td><?=$card['TransferGoToRate']?></td>
							<td>Penalty Go To Rate</td>
							<td><?=$card['PenaltyGoToRate']?></td>
						</tr>
						<tr class="trchan">
							<td>Late Fee </td>
							<td><?=$card['LateFee']?> </td>
							<td>Balance Transfer Fee </td>
							<td><?=$card['TransferFee']?></td>
						</tr>
						<tr class="trle">
							<td>Regular APR</td>
							<td><?=$card['TransferGoToRate']?></td>
							<td>Issuer</td>
							<td><?=$card['Issuer']?></td>
						</tr>
						<tr class="trchan">
							<td>Perks 	</td>
							<td><?=$card['Perks']?></td>
							<td></td>
							<td></td>
						</tr>
						</table>

						<div class="applyOnline">
						       <a target="_blank"  href="<?= $sitelink ?>/<?=change_url('index.php?module=request&id='.$card['tbl_id'].'&alias='.$alias)?>" style="font-weight:bold;">
								  Apply online for the <?=$card['OfferName']?>
						       </a>
						</div>

					    <?if($card['footer_text']):?>
			
				
				
					<div class="border-text-footer-khongbiet">
						<?=$card['footer_text']?>
					</div>
					    <?endif;?>
						
					    <div class="border-text-footer-khongbiet"></div>

					</div>

				</div>
		</div>
		
                <? }}?>
			
		<!-- ket thuc infor card-->

		
	       <?php break; ?>
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