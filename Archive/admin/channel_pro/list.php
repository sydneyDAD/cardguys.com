<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if ($_POST['option'] == 'delete'){
	$channel_pro->delete();
}
$option = 'delete';
$row = $channel_pro->lists();
$i = 1;
	echo $temp->title_lists_form();
	echo $temp->td('Tên nhóm chủng loại','50%');
	echo $temp->td('Thứ tự','20%','center');
	echo $temp->td('ID','20%','center');
	echo $temp->dot('5');
	if ($row)
	foreach ($row as $row){
		echo $temp->stt($i);
		echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row->cha_id.'">','center');
		echo $temp->td('<a href="index.php?module='.$channel_pro->module.'&view=form&id='.$row->cha_id.'"><b>'.$row->name.'</b></a>','');
		echo $temp->td('<b>'.$row->ordering.'</b>','','center');
		echo $temp->td('<b>'.$row->cha_id.'</b>','','center');		
	echo '</tr>';
	$i++;} 
	echo $temp->submit_lists('',$i); ?>
