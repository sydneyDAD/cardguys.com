<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if($_POST['option'] == 'delete'){
	$block->delete();
}
$option = 'delete';
$row = $block->lists();
	echo $temp->title_lists_form();
	echo $temp->td('Tên block','40%');
	echo $temp->td('Loại block','15%');
	echo $temp->td('Số tin','10%');
	echo $temp->td('Vị trí','10%');
	echo $temp->td('ID','10%','center');
	echo $temp->td('Thứ tự','','center');
	echo $temp->dot('9');
$i = 1; 
	if ($row)
	foreach ($row as $row){
		echo $temp->stt($i);
		echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row->block_id.'">','center');
		echo $temp->td('<a href="index.php?module='.$block->module.'&view=form&id='.$row->block_id.'"><b>'.$row->name.'</b></a>');
		echo $temp->td($block->type($row->type));
		echo $temp->td('<b>'.$row->limit_item.'</b>','','center');
		echo $temp->td('<b>'.$row->position.'</b>','','center');
		echo $temp->td('<b>'.$row->id.'</b>','','center');
		echo $temp->td('<b>'.$row->ordering.'</b>','','center');
		echo '</tr>';		
	$i++;}
	echo $temp->submit_lists('',$i);