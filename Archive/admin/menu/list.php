<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if($_POST['option'] == 'delete'){
	$menu->delete();
}
include_once ($menu->module.'/filter.php');
echo "<hr />";
include_once($menu->module.'/home.php');
echo "<hr />";
$option = 'delete';
$where ='';
if ($_GET['position']){
	$where = '&& position =\''.clear($_GET['position']).'\'';
}
$row1 = $menu->lists('child = 0 '.$where);
$row = $menu->lists('child != 0 '.$where);
	echo $temp->title_lists_form();
	echo $temp->td('Menu Name','20%');
	echo $temp->td('Link','45%');
	echo $temp->td('Position','10%');
	echo $temp->td('Order','10%','center');
	echo $temp->td('Target','10%','center');
	echo $temp->dot('7');
$i = 1; $j = 1;
if(!$row1){
    
    
    exit;
}
	foreach ($row1 as $row1){
			echo $temp->stt($j);
			echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row1->menu_id.'">','center');
			echo $temp->td('<a href="index.php?module='.$menu->module.'&view=form&id='.$row1->menu_id.'"><font color="red"><b>'.$row1->name.'</b></font></a>');
			echo $temp->td('<b>'.$row1->link.'</b>');
			echo $temp->td($row1->position);
			echo $temp->td($row1->ordering,'','center');
			echo $temp->td($row1->target,'','center');
			echo '</tr>';
			$i ++;
			$row2 = $menu->lists('child ='.$row1->menu_id.$where);
			if ($row2){
				foreach ($row2 as $row2){
					echo $temp->stt('');
					echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row2->menu_id.'">','center');
					echo $temp->td('-  <a href="index.php?module='.$menu->module.'&view=form&id='.$row2->menu_id.'">'.$row2->name.'</a>');
					echo $temp->td($row2->link);
						$position = $row2->position;
						if ($row2->position != $row1->position)
							$position = '<font color="red"><u>'.$position.'</u></font>';
					echo $temp->td($position);
					echo $temp->td($row2->ordering,'','center');
					echo $temp->td($row2->target,'','center');
					echo '</tr>';
				$i ++;
				}
			}
			$j ++;
	}
	echo $temp->submit_lists('',$i);
	?>