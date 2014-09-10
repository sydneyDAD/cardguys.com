<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if ($_POST['option'] == 'add'){
	$channel_pro->add();
}
if ($_POST['option'] == 'edit'){
	$channel_pro->edit();
}
if ($_GET['id']){
	$row = $channel_pro->detail();
	$option = 'edit';
}
	echo $temp->title('Thêm nhóm chủng loại sản phẩm');
	echo $temp->input_text('Tên nhóm chủng loại','name',$row['name']);//,'40','text','onkeyup="seourl();"');
//	echo $temp->input_text('SEO URL','alias',$row['alias']);
	echo $temp->input_text('Thứ tự','ordering',$row['ordering'],'20');
	echo $temp->submit();
?>
<script language="javascript">
	function checkinput(){
		<? 	echo $check->check_blank('name','Chưa nhập tên nhóm chủng loại');
	//		echo $check->check_blank('alias','Chưa nhập SEO URL');
			echo $check->check_number('ordering','Chưa nhập thứ tự hoặc thứ tự không phải dạng số');
			echo $check->check_pin();
		?>
	}
</script>