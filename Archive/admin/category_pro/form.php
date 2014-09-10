<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if ($_POST['option'] == 'add'){
	$category_pro->add();
}
if ($_POST['option'] == 'edit'){
	$category_pro->edit();
}
if ($_GET['id']){
	$row = $category_pro->detail();
	$option = 'edit';
}
echo $temp->title('Thêm chủng loại sản phẩm');
echo $temp->input_text('Tên chủng loại','name',$row['name']);//,'40','text','onkeyup="seourl();"');
//echo $temp->input_text('SEO URL','alias',$row['alias']);
echo $temp->input_text('Thứ tự','ordering',$row['ordering'],'20');
echo $temp->select_text('Nhóm chủng loại',$channel_pro->select($row[$channel_pro->key]));
echo $temp->submit();
?>
<script language="javascript">
	function checkinput(){
		<? 	echo $check->check_blank('name','Chưa nhập tên chủng loại');
	//		echo $check->check_blank('alias','Chưa nhập SEO URL');
			echo $check->check_blank('cha','Chưa chọn nhóm chủng loại','0');
			echo $check->check_number('ordering','Chưa nhập thứ tự hoặc thứ tự không phải dạng số');
			echo $check->check_pin();
		?>
	}
</script>