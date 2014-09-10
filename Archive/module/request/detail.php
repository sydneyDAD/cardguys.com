<?php
session_start();
define('INCLUDED', 1);
include_once ('config.php');
include_once ('global_site.php');
$card = $credit_cards->detail1("*",$_GET['id']);
$card1 = $credit_cards->detail();
if($_SERVER['REMOTE_ADDR']=='testing_ip_address'){
//echo $card1['RedirectLink']."<br><br>";
}

	$change='&ac='.$row_config['hit'];
	$match='/\&ac\=([0-9]*)/';
if(is_array($card)){
	
	
	
	preg_match($match,$card['RedirectLink'],$ok);	
	if(isset($ok[1]) && $ok[1])
	$card['RedirectLink']=preg_replace($match,$change,$card['RedirectLink']);
    $redirect_link = str_replace('[insert ac]',$row_config['hit'],$card['RedirectLink']);
    
 }
 elseif((is_array($card1))){
	
	preg_match($match,$card1['RedirectLink'],$ok);	
	if(isset($ok[1]) && $ok[1])
	$card1['RedirectLink']=preg_replace($match,$change,$card1['RedirectLink']);
	
    $redirect_link = str_replace('[insert ac]',$row_config['hit'],$card1['RedirectLink']);
 }   
 
 //preg_match($match,$redirect_link,$ok);
 
 //if($_SERVER['REMOTE_ADDR']=='testing_ip_address'){
 //echo $redirect_link."<br>";exit;
 /*
 echo $redirect_link."<br>";
 
 echo "<pre>";
 print_r($ok);
 echo $redirect_link;exit;
 
 //*/
 //}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head id="head1"><title>Just a moment</title>



<base href="<?=$sitelink?>"/>
<meta http-equiv="refresh" content="3;url=<?=$redirect_link?>"/>
<link href="css/request.css" type="text/css" rel="stylesheet" />

<title>

</title></head>
<body>

        <div class="AbsoluteCenter">
               
            <div id="mainPanel" class="PanelStyle" style="height:250px;width:542px;border:none;">
                <div><img src="images/1.jpg" width="542px" height="15px"/></div>
                <div style="padding-left:25px;padding-right:25px;padding-top:10px;text-align:center; background: url('images/2.png') repeat-y; width:542px; height:auto;">

                    <div id="box" BorderPadding="4" style="color:#000000;font-family:Verdana;font-size:12px;text-align:center;">  
                        <div >
                            <img  src="images/khoa.jpg"/> <span style="font-weight: bold;color: #868686;"> All linked applications use Secure SSL Technology.</span>
                        </div>          
	               </div>
                    <div id="imgpanel" >
                    <br /><br /><br />
                    <?
                        if(is_array($card))
                                {
                                    $img_id = $card['BigCreative'];
                                    if(intval($img_id) != 0 )
                                    {
                                        $image = intval($card['BigCreative']);
                                        $row_img = $advertise->detail1($image);
                                        $img = "upload/adv/resize/".$row_img['image'];
                                    }
                                    else {
                                        $img = $card['BigCreative'];
                                    }
                                }
                         elseif(is_array($card1))
                                {
                                    $img_id = $card1['BigCreative'];
                                    if(intval($img_id) != 0 )
                                    {
                                        $image = intval($card1['BigCreative']);
                                        $row_img = $advertise->detail1($image);
                                        $img = "upload/adv/resize/".$row_img['image'];
                                    }
                                    else {
                                        $img = $card1['BigCreative'];
                                    }
                                }       
                        
                                

                    ?>
                        <div style="float:  left;"><img  src="images/creditcard.jpg"/></div>
                        <div style="float:  left;"><img  src="images/chuyen.gif"/></div>
                        <div style="margin-right: 16px;"><img id="cardpic" src="<? echo $img; ?>" style="border-width:0px;"  /></div>
                        
            	   </div>

                    <div style="padding:40px 0px 0px 0px;text-align:  center;">
                        <a href="<?=$sitelink?>">
                            If your application doesn't appear within 25 seconds<br />
                            please click to return to creditcardcity
                        </a>
                    </div>

                </div>
                
            <div><img src="images/3.jpg" width="542" height="15"/></div>  
</div>
               
        </div>
    
        </div>
       
        
        

        <script type="text/javascript">
//<![CDATA[
Sys.WebForms.PageRequestManager._initialize('Scriptmanager1', document.getElementById('form1'));
Sys.WebForms.PageRequestManager.getInstance()._updateControls([], [], [], 90);
//]]>
</script>


    

<script type="text/javascript">
//<![CDATA[
Sys.Application.add_init(function() {
    $create(AjaxControlToolkit.DropShadowBehavior, {"Opacity":0.75,"TrackPosition":true,"id":"DropShadowExtender1"}, null, null, $get("mainPanel"));
});
Sys.Application.initialize();
//]]>
</script>

</form>
</body>
</html>
   


