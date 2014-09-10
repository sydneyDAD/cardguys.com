<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if($_POST['option'] == 'delete'){
	$contact->delete();
}
$option = 'delete'; $limit = 10;
$db->update_status($contact->table,$contact->key);

if ($_GET['status'] != ''){
    
    $where = 'status ='.intval($_GET['status']);
    
    if($_SESSION['permission'.$sitelink]!='administrator'){
    	       
        $where .= ' && ma_nhanvien = '.$_SESSION['user_id'];
    }
}
else {
    
    // loc order cua tung nhan vien
    if($_SESSION['permission'.$sitelink]!='administrator'){
    	       
        $where = 'ma_nhanvien = '.$_SESSION['user_id'];
    }
    
}
$paging = $page->paging($contact->table,$limit,$where);
$row = $contact->lists($where,$page->limit());
$i = 1;
	include_once ($contact->module.'/filter.php');
	echo $temp->title_lists_form('');
	echo $temp->td('Contact Name','20%');
	echo $temp->td('Email','20%');
	echo $temp->td('Subject','20%');
	echo $temp->td('Date','20%');
    
	echo $temp->td('Status','5%','center');
	echo $temp->dot('8');
	if ($row)
	foreach ($row as $row){
		echo $temp->stt($i);
		echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row->contact_id.'">','','center');
		echo $temp->td('<a href="index.php?module='.$contact->module.'&view=form&id='.$row->contact_id.'"><b>'.$row->name.'</b></a>');
		echo $temp->td($row->email);
		echo $temp->td($row->subject);
		echo $temp->td($row->date);
    
		echo $temp->td($template->show_status($row->status,$row->contact_id),'','center');
		echo '</tr>';
	$i++;}
	echo $temp->submit_lists($paging,$i);
	?>
	