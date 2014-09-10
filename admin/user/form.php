<?
if ( !defined('INCLUDED') ) { die("Access Denied"); }
if ($_POST['option']=='add')
	$user->add();
if ($_POST['option']=='edit')
	$user->edit();
if ($_GET['id']){
	$row = $user->detail();
	$option = 'edit';
}
	echo $temp->title('Add New Member');
	echo $temp->input_text('Fullname','full_name',$row['full_name']);
	echo $temp->input_text('Username','username',$row['username'],'30');
	echo $temp->input_text('Password','password','','20','password');
	echo $temp->input_text('Confirm Password','confirm_password','','20','password');
	echo $temp->input_text('Activate','status','1','','checkbox',$row['status']);
	echo $temp->input_text('Email','email',$row['email'],'40');
			$style = 'none';
			$select = '<select name="getpermission" onchange="setpermission()">';
			$select .= '<option value = "">Level</option>';
			$select .= '<option value="'.$user->nomal_user.'"';
			if ($row['permission']== $user->nomal_user)
			$select .= 'selected';
			$select .= '>Normal</option><option value="mod"';
			if (isset($row['permission']) === true && $row['permission']!= $user->admin_user && $row['permission']!= $user->nomal_user){
			$select .= 'selected'; $style = 'block';
			}
			$select .= '>Mod</option><option value="'.$user->admin_user.'"';
		if ($row['permission']== $user->admin_user)
			$select .= 'selected';	
			$select .=	'>Admin</option></select>';
			$select .= '<input type="text" size="35" name="permission" style="display: '.$style.'; margin-top: 10px;" value="'.$row['permission'].'">';
	echo $temp->select_text('Level',$select);
	echo $temp->submit();
	echo $temp->input_text('','resetpass',$row['password'],'','hidden');
?>
<script language="javascript">
function checkinput(){	
	<? 	echo $check->check_blank('username','Username cannot blank.');
		if ($option == 'add'){
			echo $check->check_blank('password','Password cannot blank.');
		}	
		echo $check->check_pass();
		echo $check->check_email('email','Error: email');
		echo $check->check_blank('permission','Level cannot blank.');
	
	?>
}
function setpermission(){
	val = document.admin_form.getpermission.value;
	switch (val){
		case '<?=$user->admin_user?>':
		{
			document.admin_form.permission.value = val;
			document.admin_form.permission.style.display = 'none';
		
		}
		break;
		case '<?=$user->nomal_user?>':
		document.admin_form.permission.value = val;
		document.admin_form.permission.style.display = 'none';
		
		break;
		case 'mod':
			document.admin_form.permission.style.display = 'block';
			document.admin_form.permission.value = '<?=$row['permission']?>';
		break;
	}
}	
</script>