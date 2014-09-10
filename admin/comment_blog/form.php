<? if ( !defined('INCLUDED') ) { die("Access Denied");}
if ($_POST['option'] == 'add'){
	$comment_blog->add();
    }

if ($_POST['option'] == 'edit'){
	$comment_blog->edit();
}
if ($_GET['id']){
	$row = $comment_blog->detail();
	$option = 'edit';
}	
	echo $temp->title('Comment blog','');
	echo $temp->input_text('Name','name',$row['name'],'60');
    echo $temp->input_text('Email','email',$row['email'],'60');
	echo $temp->select_text('Blog',$blog->select($row['blog_id'],'onchange = "dochange(\''.$comment_blog->module.'\',this.value)"'));
	echo $temp->input_text('Comments','comments',$row['comments'],'60');
    echo $temp->input_text('Url','url',$row['url'],'60');  
    echo $temp->input_text('','status','1','','checkbox',$row['status']);
	echo $temp->submit();
?>
<script language="javascript">
	function checkinput(){
		<? 	echo $check->check_blank('title','Enter title of blog');
			echo $check->check_blank('body','Enter content of blog');
			echo $check->check_blank('cat_id','Select Category block please, please.');
			echo $check->check_blank('metatag','Enter metatag, please.');
			echo $check->check_pin();
		?>
	}
</script>