<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if ($_POST['option'] == 'delete'){
	$news->delete();
}
$db->update_status($news->table,$news->key,'special');
$limit = '10'; $option = 'delete';
$select = 'name,news_id,special,image,date_up,hit,ordering';
$where = $news->key.'> 0';
if ($_GET['special']!='')
	$where .= ' && special = '.intval($_GET['special']);
if ($_GET['cha'] > 0)
	$where .= ' && n.cha_id = '.intval($_GET['cha']);
if ($_GET['cat'] > 0)
	$where .= ' && n.cat_id = '.intval($_GET['cat']);
if ($_GET['name'])
	$where .= '&& n.name LIKE \'%'.clear($_GET['name']).'%\'';
if ($_GET['static'] == 1)
	$where = 'n.cha_id = 0 && n.cat_id = 0';
if ($_GET['static'] == '0')
	$where = 'n.cha_id != 0 && n.cat_id != 0';
if ($_GET['id'])
	$where = $news->key.'='.intval($_GET['id']);
$paging = $page->paging($news->table.' as n',$limit,$where,1);
$row = $news->lists($select,$where,'',$page->limit(),'1');
$i = 1;
	include_once($news->module.'/filter.php');
	echo $temp->title_lists_form();
	echo $temp->td('Image','10%');
	echo $temp->td('Subject','30%');
	echo $temp->td('Channel','10%');
	echo $temp->td('Category','10%');
	echo $temp->td('Date','15%');
	echo $temp->td('Order','10%','center');
	echo $temp->td('ID','5%','center');
	echo $temp->td('InHome','5%');
	echo $temp->dot('11');
	if ($row)
	foreach ($row as $row){
		echo $temp->stt($i);
		echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row->news_id.'">','center');
		echo $temp->td('<a href="index.php?module='.$news->module.'&view=form&id='.$row->news_id.'">'.$template->show_image($row->image,$news->pathadm.'resize/','width=60px').'</a>','60px','center');
		echo $temp->td('<a href="index.php?module='.$news->module.'&view=form&id='.$row->news_id.'"><b>'.$row->name.'</b></a>');
		echo $temp->td($row->cha_name);
		echo $temp->td($row->cat_name);
		echo $temp->td($row->date_up);
		echo $temp->td($row->ordering,'','center');
		echo $temp->td('<b>'.$row->news_id.'</b>','','center');
		echo $temp->td($template->show_status($row->special,$row->news_id),'','center');
		echo '</tr>';
		$i++;
	}
		echo $temp->submit_lists($paging,$i);
		?>