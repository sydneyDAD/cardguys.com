<?php
session_start();
		include_once ('../config.php');
// kiem tra user nhap vao
		if ($_GET['username']){
			$username = replace_blank($_GET['username']);
			if (strlen($username) < 4 OR strlen($username)> 30){?>
				<img src="../images/aff_cross.gif">&nbsp;<font color="#ff0000">Tài khoản của bạn phải ít nhất là 4 ký tự<br> và dưới 30 ký tự</font>
			<?}
			else{ 
			$sql = "SELECT count(user_id) as tong FROM 8x_user WHERE username = '".$username."'";
			$row_username = $db->fetch_assoc($sql);
			if ($row_username['tong'] > 0)
			echo '<img src="../images/aff_cross.gif">&nbsp;<font color="#ff0000">Tài khoản này đã có người sử dụng</font>';
			else
			echo '<img src="../images/aff_tick.gif"> &nbsp;<font color="#39a542">Tài khoản này bạn có thể đăng ký</font>';
			mysql_free_result($result);
			}
		}
// kiem tra email nhap vao
		if ($_GET['email']){
			$sql = "SELECT count(user_id) as tong FROM 8x_user WHERE username = '".$username."'";
			$row = $db->fetch_assoc($sql);
			if ($row['tong'] > 0)
			echo '<img src="../images/aff_cross.gif">&nbsp;<font color="#ff0000">Emal này đã tồn tại</font>';
			else
			echo '<img src="../images/aff_tick.gif"> &nbsp;<font color="#39a542">Email này bạn có thể đăng ký</font>';
			mysql_free_result($result);
		}
?>
		