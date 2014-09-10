<?php if ( !defined('INCLUDED') ) { die("Access Denied"); }
$row = $news->detail();

$extraie8=$extraie9=$extraie10=$extraie11="";
				if($matchcase){
				$extraie8="mod-border-content-card-top";
				$extraie9="mod-title-content-card-top";
				$extraie10="mod-content-card-text-infomation";
				$extraie11="mod-border-content-card-bottom";
				}
?>
<div  class=infocard>
<div class="border-content-card-top <?=$extraie8?>"></div>
<div class="title-content-card-top <?=$extraie9?>"><span class="text-title-Content-card-top"><?=$row['name']?></span></div>
<div class="content-card-text-infomation <?=$extraie10?>">
 <? 
 $cards = explode(',',$row['cards_list']);
 if($cards[0]>0)
 { 
 
 ?>
    <div class="content-apply-text1">
            	<div class="detail_news">
                    <?
                        if($row['description']!='')
                        {
                            echo "<p>";
                            echo $row['description'].'</p>';
                        }
                        else
                        echo '';
                    ?>
            		<p >
            		<?=$row['detail']?></p>
            	</div>
    </div>

        <div style="float: left;width: 200px;border:1px solid #999999; margin-left: 20px;margin-top:5px;">
                   <?
                       $holdcards="";$mycount=0;
                       foreach($cards as $card)
                       {    $holdcard="";
                            $details = $credit_cards->detail2('OfferName,RedirectLink,alias,BigCreative,TextDetails',$card);
                                if($details['OfferName']!='')
                                {$mycount++;
                                    $img_id = $details['BigCreative'];
                                    if(intval($img_id) != 0 )
                                    {
                                        $image = intval($details['BigCreative']);
                                        $row_img = $advertise->detail1($image);
                                        $img = "upload/adv/resize/".$row_img['image'];
                                    }
                                    else {
                                        $img = $details['BigCreative'];
                                    }

                                $holdcard.="<div class='text_detail' style='list-style:  none;text-align:center;'>";
                                $holdcard.='<img src="'.$img.'"  style="border-width: 0px;margin: 5px;" >';
                                
                                
                                 $holdcard.="<div class=\"text-title-Content-card-top1\"><a   href=\"$details[alias]\" target=\"_blank\">$details[OfferName]</a></div> 
                                
                                <div style=\"margin-left:6px;margin-bottom:3px;list-style:  none;\">". $details['TextDetails']."</div>
                                
                                <div style=\"margin-left: 26px;margin-bottom: -5px;\"><a  title=\"Apply Now\"  href=\"".change_url('index.php?module=request&id='.$card.'&alias='.seourl($details['OfferName']))."\" target=\"_blank\"><img src=\"images/applynowdetails.gif\" width=\"140px\" height=\"40px\"/></a></div>";
                                
                            }
                            $holdcards.=($holdcards)?"</div><br><hr width='100%' style='margin-left:-0px;'>$holdcard":"$holdcard";
                       }echo ($holdcards)?$holdcards."<br>":$holdcards;
                    ?> 
                </div>
        <? }
        else
        {
         ?>
          <div class="content-apply-text2">
            	<div class="detail_news">
                    <?
                        if($row['description']!='')
                        {
                            echo "<p>";
                            echo $row['description'].'</p>';
                        }
                        else
                        echo '';
                    ?>
            		<p>
            		<?=$row['detail']?></p>
            	</div>
    </div>  
        <?}
         ?>
				</div>
				<div class="border-content-card-bottom <?if($mycount>0):?>mod_bottom<?endif;?>" style=" text-decoration: none; ;"></div>
			</div></div>


