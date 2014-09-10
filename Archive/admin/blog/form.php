<? if ( !defined('INCLUDED') ) { die("Access Denied");}
if ($_POST['option'] == 'add'){
	$blog->add();
    }

if ($_POST['option'] == 'edit'){
	$blog->edit();
}
if ($_GET['id']){
	$row = $blog->detail();
	$option = 'edit';
}
	echo $temp->title('Credit Card Blog','');
	echo $temp->input_text('Title','title',$row['title'],'60');
    echo $temp->area_text('Keyword','keyword',$row['keyword'],'cols="60" rows ="2"');
    echo $temp->area_text('Description','meta',$row['meta'],'cols="60" rows ="2"');
	echo $temp->select_text('Category ',$category_blog->select($row['cat_id'],'onchange = "dochange(\''.$blog->module.'\',this.value)"'));
	echo $temp->input_text('Status','status','1','','checkbox',$row['status']);
	echo $temp->select_text('<b style = "color: red;">Body</b>','');
	$temp->detail('body',$row['body']);
	echo $temp->submit();
?>
<script language="javascript">
	function checkinput(){
		<? 	echo $check->check_blank('title','Enter title of blog');
			echo $check->check_blank('cat_id','Select Category block please, please.');
			echo $check->check_blank('meta','Enter metatag, please.');
            echo $check->check_blank('keyword','Enter Keyword, please.');
			echo $check->check_pin();
		?>
	}
</script>