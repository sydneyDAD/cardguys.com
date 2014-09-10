<?php
if ($_GET['lang']){
	$_SESSION['lang'] = intval($_GET['lang']);
}
if (!$_SESSION['lang']){
	$_SESSION['lang'] = 1;
}
if ($_SESSION['lang'] > 3){
	$_SESSION['lang'] = 1;
}
?>
<div class="border" style="margin-bottom: 10px;">
	<table>
		<tr>
			<td height="80px" width="240px">
				<b>You are Login as: <font color="red"><?=$_SESSION['username']?></font></b><br/>
				<a href="index.php?option=logout"><b>Logout</b></a><br />
				
			</td>
			<td width="750px" align="center" >
			
                <br /><br />
                <span style="font-size: 14px;">
              
                </span>
                <br />
                
			</td>
            
		</tr>
	</table>
</div>
