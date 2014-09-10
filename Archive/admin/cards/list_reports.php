<?php

if ( !defined('INCLUDED') ) { die("Access Denied"); }

if ($_POST['option'] == 'delete'){
    
	$cards_report->delete();
}
$db->update_status($cards_report->table,$cards_report->key);
$option = 'delete';$i = 1;
$row = $cards_report->lists();



	echo $temp->title('Free Credit Card Report Section:');
	echo $temp->title_lists_form();
	echo $temp->td('Icon','10%','center');
	echo $temp->td('Name','20%','center');
	echo $temp->td('Header Text','35%','center');
    echo $temp->td('Footer Text','35%','center');
    echo $temp->td('Status','5%');
    echo $temp->td('Special','5%');
	echo $temp->td('Order','10%','center');
    echo $temp->dot('13');
    
    $rep_arr=array(
	'@<head[^>]*?>.*?</head>@siu',
	'@<style[^>]*?>.*?</style>@siu',
	'@<script[^>]*?.*?</script>@siu',
	'@<object[^>]*?.*?</object>@siu',
	'@<embed[^>]*?.*?</embed>@siu',
	'@<applet[^>]*?.*?</applet>@siu',
	'@<noframes[^>]*?.*?</noframes>@siu',
	'@<noscript[^>]*?.*?</noscript>@siu',
	'@<noembed[^>]*?.*?</noembed>@siu');
	
	$wit_arr=array(
	' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
	);
    
	if ($row)
	foreach ($row as $row){
		echo $temp->stt($i);
		echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row->tbl_id.'">','','center');
		echo $temp->td($template->show_image($row->image,$cards_report->pathadm.'resize/','width=60px'),'60px','center');
		echo $temp->td('<a href="index.php?module='.$cards_report->module.'&view=reports&id='.$row->tbl_id.'"><b>'.$row->name.'</b></a>');
        //echo $temp->td(substr($row->header_text,0,200).'...');
		//echo $temp->td(substr($row->footer_text,0,200).'...');
		
		echo $temp->td(substr(preg_replace($rep_arr,$wit_arr,$row->header_text),0,200).'...');
		echo $temp->td(substr(preg_replace($rep_arr,$wit_arr,$row->footer_text),0,200).'...');
		
         echo $temp->td($template->show_status($row->status,$row->tbl_id,'','1'),'','center');
        echo $temp->td($template->show_status($row->special,$row->tbl_id,'1'),'','center');
		echo $temp->td($row->ordering);	

		
		echo '</tr>';
		$i++;} 
		echo $temp->submit_lists(); ?>