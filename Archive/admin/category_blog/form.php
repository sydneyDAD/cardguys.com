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
	echo $temp->title('Category Blogs','');	
	echo $temp->area_text('name','name',$row['name'],'cols="60" rows ="2"');

	echo $temp->submit();
?>
<script language="javascript">
	function checkinput(){
		<? 	
			echo $check->check_blank('name','Enter name of Category Blog, please.');		
			echo $check->check_pin();
		?>
	}
</script>