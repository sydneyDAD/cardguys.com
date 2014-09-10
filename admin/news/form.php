<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
$list_cards = $credit_cards->lists_name();
if ($_POST['option'] == 'add'){
	$news->add();
}
if ($_POST['option'] == 'edit'){
	$news->edit();
}
if ($_GET['id']){
	$row = $news->detail();
    $cards = explode(',',$row['cards_list']);
	$option = 'edit';
}
	echo $temp->title('Add News');
	echo $temp->input_text('Subject','name',$row['name'],'40','text','onkeyup="seourl();"');
	
	if($row['news_id']!=211 && $row['news_id']!=210 && $row['news_id']!=209){
		echo $temp->input_text('Top Text Slogan','card_slogan',$row['card_slogan']);
	}else{
		echo "<input type=hidden name=card_slogan value=''>";
	}
	echo $temp->input_text('SEO URL','alias',$row['alias'],'40','text','onkeyup="seourl();"');
	echo $temp->select_text('Channel',$channel_news->select($row['cha_id'],'onchange = "dochange(\''.$product->module.'\',this.value)"'));
	echo $temp->select_text('Category','<font id="cities"></font>');
	echo $temp->input_text('Special','special','1','','checkbox',$row['special']);
	echo $temp->input_text('Image','file','','40','file');
	echo $temp->input_text('','image',$row['image'],'','hidden');
	echo $temp->area_text('Descripton','description',$row['description'],'cols="40" rows ="3"');
	echo $temp->input_text('Order','ordering',$row['ordering'],'20','text');
	echo $temp->select_text(   'Detail','');
	$temp->detail('detail',$row['detail']);
    ?>
    <br />
    <tr><td colspan="2" style="margin-top: 10px;font-weight: bold;text-decoration:  underline;" >Select Cards</td>
   </tr>
    <tr>

		<td class="td_left">
		&nbsp;	</td>
		<td class="td_right">
        
            <?
                foreach ($list_cards as $card) {
            ?>
                <input size="40" type="checkbox" name="cards[]" <?
                   if($cards) {
                    if(in_array($card->OfferId, $cards)){
                    echo "checked";
                    }
                   }      ?> 
                id="<?=$card->OfferId?>" value="<?=$card->OfferId?>"/><label for="<?=$card->OfferId?>"><?=$card->OfferName?></label><br />
            
            <?
                }
            ?>
				
		</td>
	</tr>
	<? echo $temp->submit();
?>
<script language="javascript">

function checkinput(){
	<?
		echo $check->check_blank('name','Subject cannot be blank.');
		echo $check->check_blank('alias','SEO URL cannot be blank.');

	?>
}
window.onLoad=dochange('<?=$news->module?>','<?=$row['cha_id']?>','<?=$row['cat_id']?>');

</script>