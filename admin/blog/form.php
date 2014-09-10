<? if ( !defined('INCLUDED') ) { die("Access Denied");}

include_once ('../class/class_credit_cards.php');
$credit_cards = new credit_cards;
$list_cards = $credit_cards->lists_name();

if ($_POST['option'] == 'add'){
	$blog->add();
    }

if ($_POST['option'] == 'edit'){
	$blog->edit();
}
if ($_GET['id']){
	$row = $blog->detail();
	$cards = explode(',',$row['cards_list']);
	$option = 'edit';
}
	echo $temp->title('Add/Update Advice Form','');
	echo $temp->input_text('Title','title',$row['title'],'80','text','onkeyup="seourl();"');
	$the_alias=(trim($row['alias']))?$row['alias']:str_replace(' ','-',strtolower($row['title']));
	$astrik=(trim($row['alias']))?'':'*';
	echo $temp->input_text('SEO URL'.$astrik,'alias',$the_alias,'80');
    echo $temp->area_text('Keyword','keyword',$row['keyword'],'cols="60" rows ="2"');
    echo $temp->area_text('Meta Description','meta',$row['meta'],'cols="60" rows ="2"');
	echo $temp->select_text('Category ',$category_blog->select($row['cat_id'],'onchange = "dochange(\''.$blog->module.'\',this.value)"'));
	echo $temp->input_text('Status','status','1','','checkbox',$row['status']);
	echo $temp->select_text('<b style = "color: red;">Body</b>','');
	echo $temp->area_text('Short Description','description',$row['description'],'cols="60" rows ="3"');
	$temp->detail('body',$row['body']);
	
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






<?php
	echo $temp->submit();
?>







<script language="javascript">
	function checkinput(){
		<? 	echo $check->check_blank('title','Enter title of blog');
			echo $check->check_blank('cat_id','Select Category block please, please.');
			echo $check->check_blank('meta','Enter metatag, please.');
            echo $check->check_blank('keyword','Enter Keyword, please.');
			echo $check->check_pin();
		?>
	}
</script>