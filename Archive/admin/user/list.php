<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if($_POST['option'] == 'delete'){
	$user->delete();
}
$db->update_status($user->table,$user->key);
$option = 'delete'; $limit = 10; $i = 1;
$where = $user->key.' > 0';
if ($_GET['permis']){
	if ($_GET['permis'] == 'mod')
		$where .= ' && permission != \''.$user->nomal_user.'\' && permission != \''.$user->admin_user.'\'';
	else 
		$where .= ' && permission =\''.clear($_GET['permis']).'\'';
}
if ($_GET['status'] != ''){
	$where .= ' && status ='.intval($_GET['status']);
}
if ($_GET['name'] != ''){
	$where .= ' && username LIKE \'%'.clear($_GET['name']).'%\'';
}
$paging = $page->paging($user->table,$limit,$where);
$row = $user->lists($where,$page->limit());

	echo $temp->title_lists_form('');
	echo $temp->td('Fullname','30%');
	echo $temp->td('Username','20%');
	echo $temp->td('Email','20%');
	echo $temp->td('Level','20%');
	echo $temp->td('ID','5%','center');
	echo $temp->td('Activate','5%','center');
	echo $temp->dot('8');
	if ($row)
	foreach ($row as $row){
		echo $temp->stt($i);
		echo $temp->td('<input name="cid[]" id="cb'.($i-1).'" type="checkbox" value="'.$row->user_id.'">');
		echo $temp->td('<a href="index.php?module=user&view=form&id='.$row->user_id.'"><b>'.$row->full_name.'</b></a>');
		echo $temp->td('<a href="index.php?module=user&view=form&id='.$row->user_id.'"><b>'.$row->username.'</b></a>');
		echo $temp->td($row->email);
		echo $temp->td($row->permission);
		echo $temp->td('<b>'.$row->user_id.'</b>','','center');
		echo $temp->td('<b>'.$template->show_status($row->status,$row->user_id).'</b>','','center');
		echo '</tr>';
	$i++; }
	echo $temp->submit_lists($paging,$i);