<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if ($_POST['option']=='add')
	$support->add();
if ($_POST['option']=='edit')
	$support->edit();
if ($_GET['id']){
	$row = $support->detail();
	$option = 'edit';
}
	echo $temp->title('Thêm người hỗ trợ');
	echo $temp->input_text('Họ tên','job',$row['job']);
	echo $temp->input_text('Nick Yahoo','yahoo',$row['yahoo'],'20');
	echo $temp->input_text('Thứ tự','ordering',$row['ordering'],'30');
	echo $temp->submit();
?>
<script language="javascript">
function checkinput(){
	<?	echo $check->check_blank('yahoo','Chưa điền nick yahoo');
		echo $check->check_number('ordering','Thứ tự phải ở dạng số tự nhiên không chứa dấu cách');
		echo $check->check_pin();
	?>
}
</script>