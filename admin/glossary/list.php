<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if($_POST['option'] == 'delete'){
	$glossary->delete();
}
$option = 'delete'; $limit = 10;
//$db->update_status($glossary->table,$glossaty->key);
//if ($_GET['status'] != '')
$where = '';//.intval($_GET['status']);
$paging = $page->paging($glossary->table,$limit,$where);
$row = $glossary->lists($glossary->key.',subject,cotent',$where,$page->limit());
$i = 1;
	//include_once ($faq->module.'/filter.php');
	echo $temp->title_lists_form('');
	echo $temp->td('ID','15%');
	echo $temp->td('Subject','25%');
    echo $temp->td('Content','35%');
	if ($row)
	foreach ($row as $row){
		echo $temp->stt($i);
		echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row->id.'">','','center');
        echo $temp->td($row->id);
        echo $temp->td('<a href="index.php?module='.$glossary->module.'&view=form&id='.$row->id.'"><b>'.$row->subject.'</b></a>');
		echo $temp->td($row->content);
	//	echo $temp->td($template->show_status($row->status,$row->faq_id),'','center');
		echo '</tr>';
	$i++;}
	echo $temp->submit_lists($paging,$i);
	?>
