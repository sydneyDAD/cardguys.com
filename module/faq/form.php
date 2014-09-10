<? if ( !defined('INCLUDED') ) { die("Access Denied");}
if ($_POST['option']=='add'){
		$faq->add();
}
echo $template->title_content(FAQ);
$limit = 10; $i = 1; $where = ' status = 1 ';
$paging = $page->paging($faq->table,$limit,$where);
$row = $faq->lists($faq->key.',question,answer',$where,$page->limit()); 
echo '<table width="100%" cellpadding="5px" cellspacing="0">';
if ($row){
	foreach ($row as $row){
	?>
    <tr>
    <td colspan="2">
    <b>Danh sách câu hỏi:</b>
    </td>
    </tr>
		<tr>
			<td width="2%">
				<b><?=$i?>.</b>
			</td>
			<td>
				<a class="faq_question" href="<?= $sitelink ?>/<?=change_url('index.php?module=faq&id='.$row->faq_id.'&alias='.seourl($row->question))?>"><?=$row->question?></a>
			</td>
		</tr>
	<? $i ++;}
	echo '</table>';	
}?>


<form method="post" name="contact" onsubmit="return checkfaq();">
	<div style="text-align: center; margin-bottom: 10px; margin-top: 10px;"><?=QUESTION_TITLE?></div>
		<table id="contact" align="center">
			<tr>
				<td class="left"><?=NAME?>:</td>
				<td class="right"><input name="name" size="40" title="<?=NAME?>"></td>
			</tr>
			<tr>
				<td class="left"><?=EMAIL?>:</td>
				<td class="right"><input title="<?=EMAIL?>" name="email" size="25"></td>
			</tr>
			<tr>
				<td class="left"><?=PHONE?>:</td>
				<td class="right"><input title="<?=PHONE?>" name="phone" size="25"></td>
			</tr>
			<tr>
				<td class="left"><?=QUESTION?>:</td>
				<td class="right"><textarea title="<?=CONTENT?>" name="question" rows="4" cols="40"></textarea></td>
			</tr>
			<tr>
				<td class="left"><?=SECURITY_CODE?>:</td>
				<td><? $security->pincode(); ?></td>
			</tr>
			<tr>
				<td class="left"></td>
				<td class="right">
					<input type="submit" title="<?=SEND_CONTACT?>" name="submit" value="<?=SEND_CONTACT?>"/>
					<input type="hidden" name="option" value="add"/>
				</td>
			</tr>
		</table>
	</form>
<script>
function checkfaq(){
	rephone=/^[0-9]+$/;
	reEmail=/^\w+@(\w+\.)+\w+$/;
	if (document.contact.name.value == ""){
	alert ("<?=CHECK_NAME?>");
	document.contact.name.focus();
	return false;
	}
	if (document.contact.email.value == "" || reEmail.test(document.contact.email.value)==false){
	alert ("<?=CHECK_EMAIL?>");
	document.contact.email.focus();
	return false;
	}
	if (document.contact.phone.value.length < 6 || document.contact.phone.value.length > 15 || rephone.test(document.contact.phone.value)=== false){
	alert ("<?=CHECK_PHONE?>");
	document.contact.phone.focus();
	return false;
	}
	if (document.contact.question.value == ""){
	alert ("<?=CHECK_CONTENT?>");
	document.contact.question.focus();
	return false;
	}
	if (document.contact.confirm.value != <?=$_SESSION['code_confirm']?>){
	alert ("<?=CHECK_SECURITY_CODE?>");
	document.contact.confirm.focus();
	return false;
	}
	return true;
}
</script>