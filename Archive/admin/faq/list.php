<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if($_POST['option'] == 'delete'){
	$faq->delete();
}
$option = 'delete'; $limit = 10;

$db->update_status($faq->table,$faq->key);
if ($_GET['status'] != '')
$where = 'status = '.intval($_GET['status']);
$paging = $page->paging($faq->table,$limit,$where);
$row = $faq->lists($faq->key.',name,phone,email,question,status,date',$where,$page->limit());
$i = 1;
    echo $temp->title('Frequently Asked Questions','');
//	include_once ($faq->module.'/filter.php');
	echo $temp->title_lists_form('');
	echo $temp->td('Contact name','15%');
	echo $temp->td('Email adress','15%');
	echo $temp->td('Subject','15%');
	echo $temp->td('Question','20%');
	echo $temp->td('Date','15%');
    echo $temp->td('Order','','center');
	echo $temp->td('Status','','center');
	echo $temp->dot('8');
	if ($row)
	foreach ($row as $row){
		echo $temp->stt($i);
		echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row->faq_id.'">','','center');
		echo $temp->td('<a href="index.php?module='.$faq->module.'&view=form&id='.$row->faq_id.'"><b>'.$row->name.'</b></a>');
		echo $temp->td($row->email);
		echo $temp->td($row->subject);
		echo $temp->td($row->question);
		echo $temp->td($row->date);
 	    echo $temp->td($row->ordering);
		echo $temp->td($template->show_status($row->status,$row->faq_id),'','center');
		echo '</tr>';
	$i++;}
	echo $temp->submit_lists($paging,$i);
	?>
