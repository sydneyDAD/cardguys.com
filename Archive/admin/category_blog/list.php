<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if($_POST['option'] == 'delete'){
	$category_blog->delete();
}
$option = 'delete'; $limit = 10;
//$db->update_status($glossary->table,$glossaty->key);
//if ($_GET['status'] != '')
$where = '';//.intval($_GET['status']);
$paging = $page->paging($category_blog->table,$limit,$where);
$row = $category_blog->lists($category_blog->key.',name',$where,$page->limit());
$i = 1;
	//include_once ($faq->module.'/filter.php');
	echo $temp->title_lists_form('');
	echo $temp->td('ID','15%');
	echo $temp->td('Name','25%');

	if ($row)
	foreach ($row as $row){
		echo $temp->stt($i);
		echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row->id.'">','','center');     
        echo $temp->td('<a href="index.php?module='.$category_blog->module.'&view=form&id='.$row->id.'"><b>'.$row->id.'</b></a>');		
		echo $temp->td($row->name);
	//	echo $temp->td($template->show_status($row->status,$row->faq_id),'','center');
		echo '</tr>';
	$i++;}
	echo $temp->submit_lists($paging,$i);
	?>
	