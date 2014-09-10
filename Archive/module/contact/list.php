<? if ( !defined('INCLUDED') ) { die("Access Denied");} ?>
<? if ($_POST['option']=='add'){
	        $contact->add();
}?>

<div class="infocard">
				<div class="border-content-card-top"></div>
				<div class="title-content-card-top" style="height: 30px;"><span class="text-title-Content-card-top" style="display: block; height: 30px; line-height: 15px;"><?=$template->title_content('Contact Cardguys.com')?></span></div>
				<div class="content-card-text-infomation">
	<div class="content-apply-text">
	<div class="body"><div style="width:600px;white-space:wrap;">

<form method="post" name="contact" onsubmit="return checkcontact();">
	
    
<br />
		<div style="text-align: center;">
        For questions regarding a credit card you already hold, or the status of a new credit card application, please contact the card issuer or bank directly. Should your questions be related to the use of our website, or any of the offers found on Cardguys.com, please contact us using the form below. 
        </div><br />
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
				<td class="left"><?=SUBJECT?>:</td>
				<td class="right"><input title="<?=SUBJECT?>" name="subject" size="25"></td>
			</tr>
			<tr>
				<td class="left"><?=CONTENT?>:</td>
				<td class="right"><textarea title="<?=CONTENT?>" name="content" rows="7" cols="40"></textarea></td>
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
	</div>
</div>
            </div>
				</div>
				<div class="border-content-card-bottom"></div>
			</div>
	
<script>
function checkcontact(){
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
/*	if (document.contact.phone.value.length < 6 || document.contact.phone.value.length > 15 || rephone.test(document.contact.phone.value)=== false){
	alert ("<?=CHECK_PHONE?>");
	document.contact.phone.focus();
	return false;
	}*/
    if (document.contact.suject.value == ""){
	alert ("<?=CHECK_SUBJECT?>");
	document.contact.subject.focus();
	return false;
	}
	if (document.contact.content.value == ""){
	alert ("<?=CHECK_CONTENT?>");
	document.contact.content.focus();
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