<? if ( !defined('INCLUDED') ) { die("Access Denied");} ?>
<? if ($_POST['option']=='add'){
	        $contact->add();
}?>

<div class="infocard">
				<div class="border-content-card-top"></div>
				<div class="title-content-card-top" style="height: 30px;"><span class="text-title-Content-card-top" style="display: block; height: 30px; line-height: 15px;"><?=$template->title_content('CreditCardCity.com Sitemap')?></span></div>
				<div class="content-card-text-infomation">
	<div class="content-apply-text">
	<div class="body"><div style="width:600px;white-space:wrap;">

<form method="post" name="contact" onsubmit="return checkcontact();">
	
<!-- BEGIN SITEMAP -->


<div style="margin:5px 10px 0px 15px;">

                
    

<ul style="list-style-type:none;font-family:Arial;font-size:12px;">
    <li><a title="Home Page" href="./">Home Page</a></li><br>
    <?php
    
	$allcards=$cards_type->lists("status=1");$holdall="";
	echo "<ul style=list-style-type:none;>\n";
	echo "<lh>Cards By Type</lh>\n";
	foreach($allcards as $kk=>$vv){
		if($vv->alias){
			$holdall.="<li><A href='".$vv->alias."'>".$vv->name."</a></li>\n";
		}
	}echo $holdall."</ul>\n";
	
	$allcards="";$holdall="";
	$allcards=$cards_bank->lists("status=1");
	echo "<Br><ul style=list-style-type:none;>\n";
	echo "<lh>Cards By Issuer</lh>\n";
	foreach($allcards as $kk=>$vv){
		if($vv->alias){
			$holdall.="<li><A href='".$vv->alias."'>".$vv->name."</a></li>\n";
		}
	}echo $holdall."</ul>\n";
	
	$allcards="";$holdall="";
	$allcards=$cards_quality->lists("status=1");
	echo "<Br><ul style=list-style-type:none;>\n";
	echo "<lh>Cards By Quality</lh>\n";
	foreach($allcards as $kk=>$vv){
		if($vv->alias){
			$holdall.="<li><A href='".$vv->alias."'>".$vv->name."</a></li>\n";
		}
	}echo $holdall."</ul>\n";
	
	$allcards="";$holdall="";
	$allcards=$cards_bank->lists("status=1");
	echo "<Br><ul style=list-style-type:none;>\n";
	echo "<lh>International Cards</lh>\n";
	foreach($allcards as $kk=>$vv){
		if($vv->alias){
			$holdall.="<li><A href='".$vv->alias."'>".$vv->name."</a></li>\n";
		}
	}echo $holdall."</ul>\n";
	
	$allcards="";$holdall="";
	$allcards=$news->lists('*',"cat_id=29");
	echo "<Br><ul style=list-style-type:none;>\n";
	echo "<lh><A href='advice-center'>Advice Center</a></lh>\n";
	foreach($allcards as $kk=>$vv){
		if($vv->alias){
			$holdall.="<li><A href='".$vv->alias."'>".$vv->name."</a></li>\n";
		}
	}echo $holdall."</ul>\n";
	
    ?>
    <br>
    <li><a title="Frequently Asked Questions" href="faq">Frequently Asked Questions</a></li>
    <li><a title="Glossary Of Terms" href="glossary">Glossary Of Terms</a></li>
    <li><a title="Free Credit Reports" href="free-credit-reports">Free Credit Reports</a></li>

    <li><a title="About Us" href="news/209-about-us">About Us</a></li>

    <li><a title="Privacy Policy" href="news/210-privacy-policy">Privacy Policy</a></li>
    <li><a title="Terms Of Use" href="news/211-terms-of-use">Terms Of Use</a></li>
    <li><a title="Contact Us" href="contact">Contact Us</a></li>
    <li><a title="Credit Card Blog" href="blog">Credit Card Blog</a></li>
    <li><a title="Sitemap" href="sitemap">Sitemap</a></li>

</ul>

            </div>




<!-- END SITEMAP -->


	</div>
</div>
            </div>
				</div>
				<div class="border-content-card-bottom"></div>
			</div>