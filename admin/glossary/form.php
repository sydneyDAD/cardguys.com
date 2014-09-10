<? if ( !defined('INCLUDED') ) { die("Access Denied");}
if ($_POST['option'] == 'add'){
	$glossary->add();
    }

if ($_POST['option'] == 'edit'){
	$glossary->edit();
}
if ($_GET['id']){
	$row = $glossary->detail();
	$option = 'edit';
}	
	echo $temp->title('Glossary of Terms','');
	echo $temp->area_text('Subject','subject',$row['subject'],'cols="60" rows ="2"');
	echo $temp->area_text('Content','content',$row['content'],'cols="60" rows ="5"');

	echo $temp->submit();
?>
<script language="javascript">
	function checkinput(){
		<? 	
			echo $check->check_blank('subject','Enter subject of glossary, please.');
			echo $check->check_blank('content','Enter content of glossary, please.');
			echo $check->check_pin();
		?>
	}
</script>