<?

if ( !defined('INCLUDED') ) { die("Access Denied"); }


if ($_POST['option'] == 'edit'){
	$credit_cards->edit();
}
if ($_POST['option'] == 'add'){
	$credit_cards->add();
}
if ($_GET['id']){
	$row = $credit_cards->detail();

    $cards = explode(',',$row['cards_list']);
    $asign_article = explode(',',$row['asign_article']);
    $sapxeps= explode(',',$row['sapxep']);
    
	$option = 'edit';
}
if($row['ordering']!=''){
    
    $order = $row['ordering'];
}
else{
    $order=0;
}
    $list_article = $news->lists("news_id,name");
    echo $temp->title('Edit Credit Cards:');
	echo $temp->input_text('Card Name','name',$row['OfferName'],'40','text','onkeyup="seourl();"');
	echo $temp->input_text('Top Text Slogan','card_slogan',$row['card_slogan']);
	echo $temp->input_text('SEO URL','alias',$row['alias']);
    
    ?>
    <tr>

		<td class="td_left">
			Image		
        </td>
		<td class="td_right">
        <img src="<?
            $img_id = $row['BigCreative'];
            if(intval($img_id)!=0)
            {
                $image = intval($row['BigCreative']);
                $row_img = $advertise->detail1($image);
                echo "../upload/adv/resize/".$row_img['image'];
            }
            else
            {
               echo $row['BigCreative'];
            }
        ?>"  width="200x" height="100px"/>
        </td>
    </tr>
    <?
    $row1 = $advertise->lists();
    $assign_banner='<select name="assign_banner">';
    $assign_banner.='<option value="">No Image</option>';
    if($row1)
    {
        foreach($row1 as $rows)
        {
                $assign_banner.='<option value="'.$rows->adv_id.'"';
                if(($rows->adv_id)==$row['BigCreative'])
                {
                    $assign_banner.= "selected";
                 }   
                $assign_banner.='>'.$rows->name.'</option>';
        }
    }
    $assign_banner.='</select>';
    echo $temp->select_text('',$assign_banner);
    $row_config = $config->detail();
    echo $temp->area_text('Header Text','header_text',$row['header_text'],'cols="60" rows ="3"');
    echo $temp->area_text('Footer Text','footer_text',$row['footer_text'],'cols="60" rows ="3"');
    echo $temp->area_text('Title','title_text',$row['title_text'],'cols="60" rows ="3"');
    echo $temp->area_text('Keywords','keywords_text',$row['keywords_text'],'cols="60" rows ="3"');
    echo $temp->area_text('Description','description_text',$row['description_text'],'cols="60" rows ="3"');
    echo $temp->area_text('Article Display Text','Textdisplay',$row['Textdisplay'],'cols="60" rows ="5"');
	echo $temp->area_text('Details','TextDetails',$row['TextDetails'],'cols="60" rows ="5"');
    echo $temp->input_text('Apply Now Url','RedirectLink',str_replace('[insert ac]',$row_config['hit'],$row['RedirectLink']),'95');
    echo $temp->input_text('Credit Type','CreditType',$row['CreditType']);
    echo $temp->input_text('Purchases Intro Rate','PurchaseIntroRate',$row['PurchaseIntroRate']);
    echo $temp->input_text('Purchases Go To Rate','PurchaseGoToRate',$row['PurchaseGoToRate']);
    echo $temp->input_text('Purchases Intro Period','PurchaseIntroPeriod',$row['PurchaseIntroPeriod']);
    echo $temp->input_text('Transfer Intro Rate','TransferIntroRate',$row['TransferIntroRate']);
    echo $temp->input_text('Transfer Intro Period','TransferIntroPeriod',$row['TransferIntroPeriod']);
    echo $temp->input_text('Transfer Go To Rate','TransferGoToRate',$row['TransferGoToRate']);
    echo $temp->input_text('Late Fee','LateFee',$row['LateFee']);
    echo $temp->input_text('Cash Advanced Fee','CashAdvancedFee',$row['CashAdvancedFee']);
    echo $temp->input_text('Cash Advanced Go To Rate','CashAdvancedGoToRate',$row['CashAdvancedGoToRate']);
    echo $temp->input_text('Annual Fee','AnnualFee',$row['AnnualFee']);
    echo $temp->input_text('Penalty Go To Rate','PenaltyGoToRate',$row['PenaltyGoToRate']);
    echo $temp->input_text('Transfer Fee','TransferFee',$row['TransferFee']);
    echo $temp->input_text('Issuer','Issuer',$row['Issuer']);
    echo $temp->input_text('Private','Private',$row['Private']);
    echo $temp->input_text('Perks','Perks',$row['Perks']);
    echo $temp->input_text('Order','ordering',$row['ordering']);
 ?>
    <tr>
        <td colspan="2" style="padding-left: 300px;color:  #0B9DC8; font-weight:  bold; font-size: 10px;">Assign Articles<span style="padding-left: 180px; ">Article Order</span></td>
    </tr>
    <tr>

		<td class="td_left">
			Select Article	</td>
		<td class="td_right">
            
            <?
                foreach ($list_article as $key => $article) {
            ?>
                <div style="width: 450px;float: left;"><input size="40" type="checkbox" name="asign_article[]" <?
                // kiem tra cac phan tu ton tai trong mang
                if($asign_article) {
                          if(in_array($article->news_id, $asign_article)){
                          echo "checked";
                          }
                }  
         ?> 
                id="<?=$article->news_id?>" value="<?=$article->news_id?>"/><label for="<?=$article->news_id?>"><?=$article->name?></label>
               </div>
               <div >
                <input size="5" type="text" name="sapxep[]" id="<?=$card->news_id?>" value="<?
                    if($sapxeps && $asign_article) {
                         if(in_array($article->news_id, $asign_article)){
                            echo $sapxeps[$key];
                         }
                    }   
                ?>"/>
               
               
               </div>
                <br />

		<? } ?>
		</td>
	</tr>
 <? 
    echo $temp->submit();
 ?>

<script language="javascript">
	function checkinput(){
		<? 	echo $check->check_blank('name','OfferName cannot be blank.');
			echo $check->check_blank('alias','SEO URL cannot be blank.');
			echo $check->check_number('ordering','Order must be a number and cannot be blank.');
		
		?>
	}
</script>