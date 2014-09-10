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
                            please click to return to cardguys
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

<!-- Business.com Conversion Tracking Code for "Applications" -->
<script language="JavaScript" src="http://roi.business.com/crm/js/conversion.js"></script>
<script language="JavaScript" type="text/javascript">
<!--
var bdc_conversion_value = 1.00;
var bdc_conversion_id = "10261";  // Important - don't change
BDC_RecordConversion(bdc_conversion_value, bdc_conversion_id);
//-->
</script>
<noscript>
<img height=1 width=1 src="http://roi.business.com/crm/images/conversion.gif?bdc_conversion_id=10261&bdc_conversion_value=1.00"/>
</noscript>

<!-- Google Code for application Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1006291557;
var google_conversion_language = "en";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "_B7GCIOE2wIQ5ZTr3wM";
var google_conversion_value = 1;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1006291557/?value=1&amp;label=_B7GCIOE2wIQ5ZTr3wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<script type="text/javascript"> if (!window.mstag) mstag = {loadTag : function(){},time : (new Date()).getTime()};</script> <script id="mstag_tops" type="text/javascript" src="//flex.atdmt.com/mstag/site/9b84abdf-d0b4-478e-b871-89ddf8e78a75/mstag.js"></script> <script type="text/javascript"> mstag.loadTag("analytics", {dedup:"1",domainId:"1716668",type:"1",actionid:"67976"})</script> <noscript> <iframe src="//flex.atdmt.com/mstag/tag/9b84abdf-d0b4-478e-b871-89ddf8e78a75/analytics.html?dedup=1&domainId=1716668&type=1&actionid=67976" frameborder="0" scrolling="no" width="1" height="1" style="visibility:hidden;display:none"> </iframe> </noscript>



</body>
</html>
   


