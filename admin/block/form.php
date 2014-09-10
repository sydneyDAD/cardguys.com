<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if ($_POST['option'] == 'add'){
	$block->add();
}
if ($_POST['option'] == 'edit'){
	$block->edit();
}
if ($_GET['id']){
	$row = $block->detail();
	$option = 'edit';
}
	echo $temp->title('Thêm block');
	echo $temp->input_text('Tên block','name',$row['name']);
			$select_type = '<select name="type">
				<option value="0">Kiểu tin trong block</option>
				<option value="cha"';
			if ($row['type'] == 'cha')
			$select_type .= 'selected';
			$select_type .= '>Nhóm tin</option><option value="cat"';
			if ($row['type'] == 'cat')
			$select_type .= 'selected';
			$select_type .= '>Chủng loại</option></select>';
	echo $temp->select_text('Loại block',$select_type);
	echo $temp->input_text('Số tin trong block','limit_item',$row['limit_item'],'15');
			$select_postion = '<select name="position">';
			//$select_postion .= '<option value="left">Trái</option>';
			$select_postion .= '<option value="center"';
			if ($row['position']== 'center')
			$select_postion .= 'selected'; 
			$select_postion .= '>Giữa</option></select>';
	echo $temp->select_text('Vị trí',$select_postion);
	echo $temp->input_text('ID tin','id',$row['id'],'8');
	echo $temp->input_text('Thứ tự','ordering',$row['ordering'],'20');
	echo $temp->submit();
?>
<script language="javascript">
function checkinput(){
	<?  	echo $check->check_blank('name','Chưa nhập tên block');
			echo $check->check_blank('type','Chưa nhập loại cho block',0);
			echo $check->check_number('limit_item','Số tin phải ở dạng số > 1');
			echo $check->check_number('id','ID của nhóm tin hoặc tin phải ở dạng số > 1');
			echo $check->check_number('ordering','Thứ tự của block phải ở dạng số > 1');
			echo $check->check_pin();
	?>}
</script>