<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if($_POST['option'] == 'delete'){
$blog->delete();
}
$db->update_status($blog->table,$blog->key);
$option = 'delete'; $limit = 10;
$select = '*';
$paging = $page->paging($blog->table,$limit,$where);
$row = $blog->lists($select,$where,'',$page->limit(),'1');
$i = 1;
	//include_once ($faq->module.'/filter.php');
	echo $temp->title_lists_form('');
	echo $temp->td('Title','15%');
    echo $temp->td('Keyword','20%');
    echo $temp->td('Description','30%');
	echo $temp->td('Advice Category','15%');
	echo $temp->td('Status','','center');
	echo $temp->dot('8');
	if ($row)
	foreach ($row as $row){
		echo $temp->stt($i);
		echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row->blog_id.'">','','center');
		echo $temp->td('<a href="index.php?module='.$blog->module.'&view=form&id='.$row->blog_id.'"><b>'.$row->title.'</b></a>');
		echo $temp->td($row->keyword);
        echo $temp->td($row->meta);
        echo $temp->td($row->cat_name);
		echo $temp->td($template->show_status($row->status,$row->blog_id),'','center');
		echo '</tr>';
	$i++;}
	echo $temp->submit_lists($paging,$i);
	
	
	?>
