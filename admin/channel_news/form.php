<?

if ( !defined('INCLUDED') ) { die("Access Denied"); }
if ($_POST['option'] == 'add'){
	$channel_news->add();
}
if ($_POST['option'] == 'edit'){
	$channel_news->edit();
}
if ($_GET['id']){
	$row = $channel_news->detail();
	$option = 'edit';
}
	echo $temp->title('Add New Channel');
	echo $temp->input_text('Name','name',$row['name']);
	echo $temp->input_text('Order','ordering',$row['ordering'],'20');
	echo $temp->submit();
?>
<script language="javascript">
	function checkinput(){
		<?    echo $check->check_blank('name','Channel name cannot be blank.');
			
			echo $check->check_number('ordering','Order must be a number and cannot be blank.');
		?>
	}
</script>