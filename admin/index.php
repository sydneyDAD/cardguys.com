<?php
session_start();
define('INCLUDED', 1);
include_once('../config.php');
if ($_POST['log_username'] and $_POST['log_password']){
		$security->login();
}
$security->access_denied();
include_once ('global.php');
if($_POST['option']=='clearxml'){
    
        
    if($xmlfeed->clearxml()){
        $str = "success";
        echo trim($str);
        exit;
    }
    else {
        echo " Error: Please try again later.";
        exit;
    }
}

if($_POST['option']=='loadxml'){
    
    
    echo $xmlfeed->loadxml();
    exit;
    
}
if($_POST['option']=='removecard'){
    
    $card_id = $_POST['card_id'];
   
    if($xmlfeed->delete_one('OfferId',$card_id)){
        
      $str = "success";
        echo trim($str);
        exit;
    }
    else {
        echo " Error: Please try again later.";
        exit;
    }
    
}
if($_POST['option']=='savecard'){
    
    $card_id = $_POST['card_id'];
   
   //*
    if($xmlfeed->save_one_card($card_id) && $xmlfeed->delete_one('OfferId',$card_id)){
        
      $str = "success";
        echo trim($str);
        exit;
    }
    else {
        echo " Error($card_id): Please try again later.";
        exit;
    }
    //*/
    //echo $xmlfeed->save_one_card($card_id);exit;
}

///$xmlfeed->save_one_card(22034408);//exit;
//$xmlfeed->delete_one('OfferId',22034408);exit;



?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="8xstyles.css" type="text/css" />
		<script type="text/javascript" src="../js/dtree.js"></script>
		<script type="text/javascript" src="../js/admin.js"></script>
        <script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
		<title>Administration</title>
	</head>
	<body>
		<div id="site">
			<?php include_once ('header.php'); ?>
			<div id="left">
				<div class="border">
					<div class="text"><? include_once('menu/adminmenu.php'); ?></div>
				</div>
			</div>
			<div id="right">
				<div class="border">	
					<div class="text">
						
						<? 
							$option = 'add'; $where = '';
							if (!$module || !$view)
								include_once('config/list.php');
							else{
								if (file_exists($module.'/'.$view.'.php'))
									include_once($module.'/'.$view.'.php');
								else
									include_once('../includes/denied.php');
							}
							mysql_close();
						?>
						<input type="hidden" name="option" value="<?=$option?>"/>
						</form>
					</div>
				</div>
			</div>
			<div class="clr"></div>
			<div id="bottom" style="text-align: center; font-weight: bold;">
            <br />
          
            </div>
		</div>
	</body>
</html>