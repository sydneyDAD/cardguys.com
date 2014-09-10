<?php

if ( !defined('INCLUDED') ) { die("Access Denied"); }

if ($_POST['option'] == 'delete'){
    
	$credit_cards->delete();
}
$db->update_status($credit_cards->table,$credit_cards->key);
$option = 'delete';$i = 1;
$row = $credit_cards->lists();
?>
<a style="color: #CA4102; font-weight: bold; font-size: 14px; text-decoration: underline;" href="<?=$sitelink?>admin/index.php?module=cards&view=add_credit_cards">Add New Creditcard</a>
<?

	echo $temp->title_lists_form();
    	echo $temp->td('Card Name','40%','center');
    echo $temp->td('Card Image','30%','center');
    
    echo $temp->td('Show on home page','12%');
	echo $temp->td('Order','10%','center');
    echo $temp->dot('13');
	if ($row)
	foreach ($row as $row){
		echo $temp->stt($i);
        $img_id = $row->BigCreative;
        if((intval($img_id))!=0)
            {
                $row_img = $advertise->detail1(intval($img_id));
                $img = "../upload/adv/resize/".$row_img['image'];
            }
            else
            {
                $img = $row->BigCreative;
            }
		echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row->tbl_id.'">','','center');
        echo $temp->td('<a href="index.php?module=cards&view=credit_cards&id='.$row->tbl_id.'"><b>'.$row->OfferName.'</b></a>');
		echo $temp->td('<a href="index.php?module=cards&view=credit_cards&id='.$row->tbl_id.'"><img src="'.$img.'" style="border-width: 0px;" width="200x" height="100px" /></a>','60px ','center');	
        echo $temp->td($template->show_status($row->special,$row->tbl_id,'1','','','',''),'','center');
		echo $temp->td($row->ordering,'','center');	

		
		echo '</tr>';
		$i++;} 
		echo $temp->submit_lists(); ?>