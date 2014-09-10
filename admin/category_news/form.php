<?php
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if ($_POST['option'] == 'add'){
	$category_news->add();
}
if ($_POST['option'] == 'edit'){
	$category_news->edit();
}
if ($_GET['id']){
	$row = $category_news->detail();
	$option = 'edit';
}
echo $temp->title('Add New Category');
echo $temp->input_text('Name','name',$row['name']);//,'40','text','onkeyup="seourl();"');
//echo $temp->input_text('SEO URL','alias',$row['alias']);
echo $temp->input_text('Order','ordering',$row['ordering'],'20');
echo $temp->select_text('Channel',$channel_news->select($row[$channel_news->key]));
echo $temp->submit();
?>
<script language="javascript">
	function checkinput(){
		<? 	echo $check->check_blank('name','Category name cannot blank.');
	
			echo $check->check_blank('cha','Channel cannot blank.','0');
			echo $check->check_number('ordering','Order must is a number and cannot blank.');
		
		?>
	}
</script>