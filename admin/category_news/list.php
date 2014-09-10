<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if ($_POST['option'] == 'delete'){
	$category_news->delete();
}
$limit = '5'; $option = 'delete';
if (intval($_GET['cha']>0)){
	$where = $channel_news->key .'='.intval($_GET['cha']);
}
$paging = $page->paging($channel_news->table,$limit,$where);
$row = $channel_news->lists($page->limit(),$where);
$i = 1; $j = 1;
	include ($category_news->module.'/filter.php');
	echo $temp->title_lists_form();
	echo $temp->td('Category Name','50%');
	echo $temp->td('Order','20%','center');
	echo $temp->td('ID','20%','center');
	echo $temp->dot('5');
	if ($row)
	foreach ($row as $row){
		echo $temp->stt($i);
		echo $temp->td('<a href="index.php?module='.$channel_news->module.'&view=form&id='.$row->cha_id.'"><b>'.$row->name.'</b></a>','','','3');
		echo $temp->td('<b>'.$row->cha_id.'</b>','','center');		
		echo '</tr>';
			$row_cat = $category_news->lists('*',$channel_news->key .'='. $row->cha_id);
			if ($row_cat){
				foreach ($row_cat as $row_cat){
					echo $temp->stt('-');
					echo $temp->td('<input name="cid[]" id="cb'.($j-1).'" type="checkbox" value="'.$row_cat->cat_id.'">','center');
					echo $temp->td('<a href="index.php?module='.$category_news->module.'&view=form&id='.$row_cat->cat_id.'">'.$row_cat->name.'</a>');
					echo $temp->td($row_cat->ordering,'','center');
					echo $temp->td($row_cat->cat_id,'','center');
					$j ++;
				}
			}
	$i++;} 
	echo $temp->submit_lists($paging,$j); ?>