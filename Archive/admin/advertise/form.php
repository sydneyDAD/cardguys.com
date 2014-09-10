<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if ($_POST['option'] == 'add'){
	$advertise->add();
}
if ($_POST['option'] == 'edit'){
	$advertise->edit();
}
if ($_GET['id']){
	$row = $advertise->detail();
	$option = 'edit';
}
	echo $temp->title('Add new image or banner');
	echo $temp->input_text('Name','name',$row['name']);
    $menu_position = '<select name="position"><option value="banner">Banner</option><option value="image"';
		if ($row['position'] == 'image')
		$menu_position .= 'selected';
		$menu_position .= '>Image</option></select>';
	echo $temp->select_text('Position',$menu_position);
	echo $temp->input_text('Url','link',$row['link'],'35');
    
	echo $temp->input_text('Order','ordering',$row['ordering'],'15');
	echo "<tr><td class=\"td_left\" valign=top>Current Image</td>
	<td class=td_right>
    <img src=../upload/adv/$row[image]><Br></td></tr>";
	echo $temp->input_text('Upload Image','file','','35','file');
	echo $temp->input_text('','image',$row['image'],'','hidden');
	echo $temp->submit('onclick="return checkinput()"','left');

?>
<script language="javascript">
function checkinput(){
	<? 	echo $check->check_blank('name','Enter name, please');
		echo $check->check_blank('link','Enter url, please');
		echo $check->check_number('ordering','Invalid order number');

	?>
}
</script>