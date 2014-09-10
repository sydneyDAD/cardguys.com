<head>
<title >Administation</title>
<link rel="stylesheet" href="8xstyles.css" type="text/css" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<center>
<div id="center">
<div>
	<div class="title">
		<a class="title" href="" target="blank">Administation</a><hr>
	</div>
</div>
<form action="" method="post" name="login_form" onsubmit="return checklogin();">
	<table width="100%">
		<tr>
			<td rowspan="5" width="152px"><img width="152px" height="137px" src="images/lock.jpg"></td>
			<td height="25px" width="100px"><b>Username</b></td>
			<td width="100px"><input size="20" type="text" name="log_username"></td>
		</tr>
		<tr>
			<td height="25px" ><b>Password</b></td>
			<td><input size="20" type="password" name="log_password"></td>
		</tr>
		<tr>
			<td height="25px"><b>Security Code</b></td>
			<td><input size="10" type="text" name="confirm"><span id="code_confirm"><? $_SESSION['code_confirm']=rand(1000,9999); echo $_SESSION['code_confirm'];?></span></td>
		</tr>
		<tr>
			<td height="25px"></td>
			<td><input type="submit" name="submit" value="Login"></td>
		</tr>
		<tr>
			<td colspan="2"><i></i></td>
		</tr>
	</table>
</form>
</div>
</center>
<script>
function checklogin(){
	if (document.login_form.log_username.value == ""){
	alert ("Username cannot blank.");
	document.login_form.log_username.focus();
	return false;
	}
	if (document.login_form.log_password.value == ""){
	alert ("Password cannot blank.");
	document.login_form.log_password.focus();
	return false;
	}
	if (document.login_form.confirm.value != <?=$_SESSION['code_confirm']?>){
	alert ("Incorrect security code.");
	document.login_form.confirm.focus();
	return false; 
	}
	document.login_form.submit.disabled = true;
	return true;
}
</script>