<? if ( !defined('INCLUDED') ) { die("Access Denied");}
if ($_POST['option'] == 'add'){
	$faq->add_admin();
    }

if ($_POST['option'] == 'edit'){
	$faq->edit();
}
if ($_GET['id']){
	$row = $faq->detail();
	$option = 'edit';
}
	echo $temp->title('Frequently Asked Questions','');
	echo $temp->input_text('Contact Name','name',$row['name'],'40');
	echo $temp->input_text('Email Adress','email',$row['email'],'30');
	echo $temp->area_text('Subject','subject',$row['subject'],'cols="60" rows ="2"');
	echo $temp->area_text('Question','question',$row['question'],'cols="60" rows ="5"');
    echo $temp->area_text('Keyword','keyword',$row['keyword'],'cols="60" rows ="5"');
    echo $temp->area_text('Description','meta',$row['meta'],'cols="60" rows ="5"');
	echo $temp->area_text('Answer','answer',$row['answer'],'cols="60" rows ="5"');
    echo $temp->input_text('Ordering','ordering',$row['ordering'],'30');
    echo $temp->input_text('Status','status','1','','checkbox',$row['status']);
	echo $temp->submit();
?>
<script language="javascript">
	function checkinput(){
		<? 	echo $check->check_blank('name','Enter contact name');
			echo $check->check_email('email','Invalid Email');
		//	echo $check->check_number('subject','Enter subject for question');
			echo $check->check_blank('question','Enter question, please.');
			echo $check->check_blank('answer','Enter answer, please.');
			echo $check->check_pin();
		?>
	}
</script>