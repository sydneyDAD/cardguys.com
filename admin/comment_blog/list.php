<?php
if($_POST['option'] == 'delete'){
$comment_blog->delete();
}
$db->update_status($comment_blog->table,$comment_blog->key);
$option = 'delete'; $limit = 10;
$select = '*';
$paging = $page->paging($comment_blog->table,$limit,$where);
$row = $comment_blog->lists($select,$where,'',$page->limit(),'1');
$i = 1;
	//include_once ($faq->module.'/filter.php');
	echo $temp->title_lists_form('');
	echo $temp->td('Blog','15%');
	echo $temp->td('Name','15%');
    echo $temp->td('Email','15%');
	echo $temp->td('Url','','center');
    echo $temp->td('Comment','','center');
    echo $temp->td('Comment Date','','center');
    echo $temp->td('Status','','center');
	echo $temp->dot('8');
	if ($row)
	foreach ($row as $row){
		echo $temp->stt($i);
		echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row->comment_id.'">','','center');
		echo $temp->td('<a href="index.php?module='.$comment_blog->module.'&view=form&id='.$row->comment_id.'"><b>'.$row->title.'</b></a>');
        echo $temp->td($row->name);
		echo $temp->td($row->email);
        echo $temp->td($row->url);
		echo $temp->td($row->comments);
		echo $temp->td($row->commentdate);
		echo $temp->td($template->show_status($row->status,$row->comment_id),'','center');
		echo '</tr>';
	$i++;}
	echo $temp->submit_lists($paging,$i);
	?>
