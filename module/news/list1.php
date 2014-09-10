<?php if ( !defined('INCLUDED') ) { die("Access Denied");}
$limit = '8'; $option = 'delete';
$select = 'name,news_id,image,description,alias';
$where = 'n.cha_id > 0';
if ($_GET['special']!='')
	$where .= ' && special = '.intval($_GET['special']);
if ($_GET['cha'] > 0)
	$where .= ' && n.cha_id = '.intval($_GET['cha']);
if ($_GET['cat'] > 0)
	$where .= ' && n.cat_id = '.intval($_GET['cat']);
if ($_GET['name'])
	$where .= '&& n.name LIKE \'%'.clear($_GET['name']).'%\'';
if ($_GET['id'])
	$where = $news->key.'='.intval($_GET['id']);
$paging = $page->paging($news->table.' as n',$limit,$where,1);
$row = $news->lists($select,$where,'',$page->limit(),'1');
$i = 1;
?>
<table id="news" cellpadding="7px">
	<tr>
	<? if ($row){
		foreach ($row as $row){?>
		<td valign="top" style="width: 50%; border-bottom: 1px solid #DDDDDD;">
			<a href="<?=change_url('index.php?module='.$news->module.'&id='.$row->news_id.'&alias='.$row->alias)?>"><?=$template->show_image($row->image,$news->path.'resize/','alt="'.$row->name.'" width="105px" align="left" style="margin-right: 7px; margin-bottom: 5px;"');?></a>
			<a href="<?=change_url('index.php?module='.$news->module.'&id='.$row->news_id.'&alias='.$row->alias)?>"><?=$row->name?></a>
			<br />
			<?=$row->description?>
		</td>
		<? if ($i % 2 == 0) echo '</tr><tr >';
		$i ++;
		}
	}?>
		
	</tr>
	<tr>
		<td colspan="2">
			<?=$paging?>
		</td>
	</tr>
</table>