<? if ( !defined('INCLUDED') ) { die("Access Denied");}
if ($_POST['option'] == 'add'){
	$category_blog->add();
    }

if ($_POST['option'] == 'edit'){
	$category_blog->edit();
}
if ($_GET['id']){
	$row = $category_blog->detail();
	$option = 'edit';
}	
	if($_GET['id']): echo $temp->title('Edit Advice Center Category','');	else: echo $temp->title('Add New Advice Center Category',''); endif;
	
	echo $temp->area_text('name','name',$row['name'],'cols="60" rows ="1"');
	echo $temp->area_text('Intro','sintro',$row['s_intro'],'cols="60" rows ="4"');

	echo $temp->submit();
?>
<script language="javascript">
	function checkinput(){
		<? 	
			echo $check->check_blank('name','Enter advice category name please.');		
			echo $check->check_pin();
		?>
	}
</script>