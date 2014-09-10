<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if($_POST['option'] == 'delete'){
	$advertise->delete();
}
$option = 'delete';
$row = $advertise->lists();
$i = 1;
	echo $temp->title_lists_form();
	echo $temp->td('Image','10%','center');
	echo $temp->td('Name','25%');
	echo $temp->td('Link','30%');
	echo $temp->td('Order','15%','center');
	echo $temp->dot('6');
	if ($row)
	foreach ($row as $row){

            echo $temp->stt($i);
    		echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row->adv_id.'">','center');
    		echo $temp->td('<a href="index.php?module='.$advertise->module.'&view=form&id='.$row->adv_id.'">'.$template->show_image($row->image,$advertise->pathadm.'resize/','width="70px" height="70px"').'</a>','','center');
    		echo $temp->td('<b><a href="index.php?module='.$advertise->module.'&view=form&id='.$row->adv_id.'">'.$row->name.'</a></b>');
    		echo $temp->td($row->link);
    		echo $temp->td('<b>'.$row->ordering.'</b>','','center');
		echo '</tr>';
        
	   $i++;
    }
	echo $temp->submit_lists('',$i);
	?>