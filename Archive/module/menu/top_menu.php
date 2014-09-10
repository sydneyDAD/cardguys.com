<?php
session_start();
?>
<? 	if ( !defined('INCLUDED') ) { die("Access Denied"); }
	$row = $menu->lists('child = 0 && (position = \'top\')');
?>
<? 

    if(($_SESSION['home']))
    {
        ?>
        <a href="<?=$sitelink?>">Home</a>
        <? 
    }
    if(($_SESSION['bookmark']))
    {
        ?>
        <a href="javascript:void(addBookmark());">Bookmark</a>
        <? 
    }

/*if ($row){
	foreach ($row as $row){
	   if($row->alow==1)
       {       
    
    //echo "<a title=\"".$row->name."" class=\"FooterLinks\" ".$row->taget." href=\"".$row->link."\">".$row->name."</a>";
	
    else
        {
           echo '<div style="float:left;margin-left: 3px;margin-right: 3px;color: white; font-weight:bold;" >'. $row->name.'</div>';   
    }
    }
}*/
//echo $module;
$menutopx="";
switch(strtolower($module)){
case "card-details":
	$getslogan=$credit_cards->detail("card_slogan",$myxid);
	$menutopx=$getslogan['card_slogan'];
break;
case "credit-cards":
	switch(strtolower($modul['xid'])){
	case "issuer":
		$menutopx=$row_config['s_bank'];
		//$cards_bank->details()
		//print_r($this->db->fetail(""));
		$getslogan=$cards_bank->detail("card_slogan",$myxid);
		$menutopx=$getslogan['card_slogan'];
	break;
	case "type":
		$menutopx=$row_config['s_type'];
		$getslogan=$cards_type->detail("card_slogan",$myxid);
		$menutopx=$getslogan['card_slogan'];
	break;
	/*case "id":
		$menutopx=$row_config['s_type'];
	break;*/
	case "quality":
		$menutopx=$row_config['s_quality'];
		$getslogan=$cards_quality->detail("card_slogan",$myxid);
		$menutopx=$getslogan['card_slogan'];
	break;
	case "int":
		$menutopx=$row_config['s_int'];
		$getslogan=$cards_int->detail("card_slogan",$myxid);
		$menutopx=$getslogan['card_slogan'];
	break;
	case "report":
		$menutopx=$row_config['s_report'];
		$getslogan=$cards_report->detail("card_slogan",$myxid);
		$menutopx=$getslogan['card_slogan'];
	break;
	}
break;
case "glossary":
	$menutopx=$row_config['s_glossary'];
break;
case "faq":
	$menutopx=$row_config['s_faq'];
break;
case "advice-center":
	$menutopx=$row_config['s_advice'];
	$getslogan=$news->detail("card_slogan",$myxid);
	$menutopx=$getslogan['card_slogan'];
break;
case "blog":
	$menutopx=$row_config['s_blog'];
break;
case "contact":
	$menutopx=$row_config['s_contact'];
break;
case "sitemap":
	$menutopx=$row_config['s_sitemap'];
break;
case "news":
	$text_typex=strtolower($text_type);
	if(strpos($test_typex,'about-us')==true){
	$menutopx=$row_config['s_about'];
	}elseif(strpos($test_typex,'privacy-policy')==true){
	$menutopx=$row_config['s_privacy'];
	}elseif(strpos($test_typex,'terms-of-use')==true){
	$menutopx=$row_config['s_terms'];
	}
break;
default: //home
	$menutopx=$row_config['s_home'];
break;
}

if($menutopx){
	echo '<div style="float:left;margin-left: 3px;margin-right: 3px;color: white; font-weight:bold;" >'. $menutopx.'</div>';
}else{
	if($menutopx=$row_config['s_home']){
		echo '<div style="float:left;margin-left: 3px;margin-right: 3px;color: white; font-weight:bold;" >'. $menutopx.'</div>';
	}
}
//$row_config

?>

<div style="float: right; padding-right: 40px;margin-top: 0px;">

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a href="http://www.addthis.com/bookmark.php?v=250&amp;username=sjmple" class="addthis_button_compact">Share</a>
<span class="addthis_separator">|</span>
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=sjmple"></script>
<!-- AddThis Button END -->
</div>
