<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if($_POST['option']=='delete'){
	$support->delete();
}
$option = 'delete';
$row = $support->lists();
$i = 1;
	echo $temp->title_lists_form('');
	echo $temp->td('Công việc','40%');
	echo $temp->td('Nick chat','40%');
	echo $temp->td('Thứ tự','10%');
	echo $temp->dot('5');
	if($row)
	foreach ($row as $row){
		echo $temp->stt($i);
		echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row->sup_id.'">','center');
		echo $temp->td('<a href = "index.php?module='.$support->module.'&view=form&id='.$row->sup_id.'">'.$row->job.'</a>');
		echo $temp->td($row->yahoo);
		echo $temp->td($row->ordering,'','center');
		echo '</tr>';
	$i++;}
	echo $temp->submit_lists('',$i);
	?>