<?php
class security{
	function login()
	{
		$this->check_pin();
		$db = new database;
		global $sitelink;
		$select = "user_id,username, password, permission";
		$table = "8x_user"; 
		$where = 'status = 1 && username = \''.clear($_POST['log_username']).'\' && password = \''.md5(clear($_POST['log_username'].$_POST['log_password'])).'\'';
		$row = $db->detail($table,$select,$where);
		if (intval($row['user_id']) > 0 && $row['username'] !== '') {
	    	$_SESSION['username'] = $row['username'];
	        $_SESSION['user_id'] = $row['user_id'];
			$_SESSION['permission'.$sitelink] = $row['permission'];
	    }
	header_redirect('');
	}
	function logout(){
		if (eregi('logout',$_GET['option'])) {
	    session_destroy();
	    header_redirect("index.php");
		}
	}
	// kiem tra quyen truy cap cua user
	function access_denied(){
		global $sitelink;
		if (isset($_SESSION['permission'.$sitelink])===false){
			include_once('user/login.php');
			die ('');
		}
		else{
			$permission = $_SESSION['permission'.$sitelink];
			//echo $permission;
			if ($permission == 'administrator')
			return true;
			elseif ($permission == 'user')
			die ('ACCESS DENIED');
			else{
				// kiem tra chuoi permission nhap vao xem co module quan tri ko
				if ($_GET['module'] && strpos($permission,clear_all($_GET['module'])) === false)
				{
				//	include_once('../includes/denied.php');
					die (header_redirect('index.php'));
				}
				return true;
			}
				
		}
	}
	function redirect($module,$view){
		header_redirect('index.php?module='.$module.'&view='.$view);
	}
	function check_pin (){
	   global $sitelink;
	   if($_SESSION['permission'.$sitelink]=='administrator'){
	       
           return true;
	   }
       else {
        
                if (intval($_POST['confirm']) == $_SESSION['code_confirm']){
		          unset($_SESSION['code_confirm']);
		          return true;
		          }
                else 
                die ("Access diened.");
        
       }
	
	}
	function pincode(){
		$_SESSION['code_confirm']=rand(1000,9999);
		echo '<input size="9" type = "text" id="confirm" name="confirm" value="">
				<span id="code_confirm">'.$_SESSION['code_confirm'].'</span>';
				
	}
/*	function url($module='',$view='',$text,$index='index.php'){
			if ($module !='')
				$module = '?module='.$module;
 			if ($view != '')
 				$view = '&view='.$view;
 			
			$url = '<a href="index.php?'.$module.'&view='.$view.'">'.$text.'</a>';
			$url = $index;
	}*/
}