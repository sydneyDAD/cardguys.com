<?php
class checkform{
	function check_blank($name,$text,$value='',$form = 'admin_form'){
			return 'if (document.'.$form.'.'.$name.'.value == "'.$value.'"){
			alert ("'.$text.'");
			document.'.$form.'.'.$name.'.focus();
			return false;}
			';
	}
	function check_number($name,$text,$form = 'admin_form'){
			return 'rephone=/^[0-9]+$/;
			if (document.'.$form.'.'.$name.'.value.length < 1 || document.'.$form.'.'.$name.'.value.length > 20 || rephone.test(document.'.$form.'.'.$name.'.value)==false){
			alert ("'.$text.'");
			document.'.$form.'.'.$name.'.focus();
			return false;}';
	}
	function check_email($name = 'email',$text = 'KhÃ´ng Ä‘Ãºng Ä‘á»‹nh dáº¡ng email',$form = 'admin_form'){
			return 'reEmail=/^\w+@(\w+\.)+\w+$/;
			if (document.'.$form.'.'.$name.'.value == "" || reEmail.test(document.'.$form.'.'.$name.'.value)==false){
			alert ("'.$text.'");
			document.'.$form.'.'.$name.'.focus();
			return false;}';
	}
	function check_pass($form = 'admin_form'){
		return 'if(document.admin_form.password.value!=document.admin_form.confirm_password.value){
		alert("Mật khẩu nhập lại sai");
		document.admin_form.confirm_password.focus();
		return false;}';
	}
	function check_pin($form = 'admin_form'){
		return 'if (document.'.$form.'.confirm.value != '.$_SESSION['code_confirm'].'){
			alert ("Mã xác nhận không dúng");
			document.'.$form.'.confirm.focus();
			return false;}';
	}
}