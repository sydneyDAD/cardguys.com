<?php

if(substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
ob_start('ob_gzhandler');
else
ob_start();
session_start();
define('INCLUDED', 1);
$sitelink = "http://cardguys.com/";


global $row_config,$cards_type;
//include_once ('../config.php');
$ok_to_run=true;
//include('../global_site.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="verify-v1" content="pn3InnNhYl4fZzCMIoiGYNmEJNk1gSyq92BqyzTiA88=" />
        <meta name="keywords" content="<?=$_SESSION['keyword']?>"/>
        <meta name="description" content="Find helpful information on choosing and using credit cards at CardGuys.com"/>

        <base href="<?=$sitelink?>"/>
        <?php wp_head() ?>

        <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
        <script src="<?= $sitelink ?>/js/jquery.bxslider.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= $sitelink ?>/css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="<?= $sitelink ?>/css/home.css" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?= $sitelink ?>/css/boostrap-modal.css" />

	
	<!--[if IE 7]>
          <link rel="stylesheet" type="text/css" href="<?= $sitelink ?>/css/ie7.css" />
        <![endif]-->
	            <!--[if IE 8]>
                <link rel="stylesheet" type="text/css" href="<?= $sitelink ?>/css/ie8.css" />
            <![endif]-->

	<script type="text/javascript">

                $(document).ready(function() {
                    $('.bxslider').bxSlider();
                    $(window).scroll(function() {
                        if ($(this).scrollTop() > 50) {
                            $('.go-top').fadeIn('slow');
                        } else {
                            $('.go-top').fadeOut('slow');
                        }
                    });
                    $('.go-top').click(function() {
                        $("html, body").animate({scrollTop: 0}, 500);
                        //$("html, 
                        return false;
                    });

                    $(".search_button").click(function(event) {

                        event.preventDefault();
                        //validate



                        if ($('#credit_cat').val() != 0) {
                            $('.error-offer').addClass('hide')
                        }
                        if ($('#credit_type').val() != 0) {
                            $('.error-credit').addClass('hide')
                        }


                        if ($('#credit_type').val() == 0) {
                            $('.error-credit').removeClass('hide')
                        }
                        else if ($('#credit_cat').val() == 0) {
                            $('.error-offer').removeClass('hide')
                        }

                        else {

                            $('#myModal').modal('show');

                            setTimeout(function() {
                                $('#cardfinder').submit();


                            }, 5000);


                        }

                    });
                });
            </script>
	
	
	
        <style type="text/css">
            /*<![CDATA[*/
            td.c28 {font-size: 12px; font-family: Times New Roman; text-align: center; padding: 0px 0px 20px;}
            td.c27 {border: 1px solid black; background-color: rgb(221, 223, 222);}
            div.c26 {padding: 25px 10px 25px 25px;}
            div.c25 {padding: 10px 10px 10px 5px;}
            div.c24 {padding: 10px 5px;}
            div.c23 {margin: 5px 10px 0px 15px;}
            td.c22 {padding-bottom: 20px;}
            td.c21 {border-bottom: 1px solid black; padding: 0px 0px 5px 15px;}
            div.c20 {text-align: left;}
            div.c19 {width: 150px; background-color: White; padding: 0px 10px; margin-left: 50px;}
            div.c18 {width: 550px; padding-bottom: 15px;}
            div.c17 {float: right; width: 375px;}
            div.c16 {float: left; width: 175px;}
            td.c15 {border-left: 1px solid black; border-right: 1px solid black;}
            div.c14 {padding: 20px 45px 0px 30px; text-align: left;}
            table.c13 {border-collapse: collapse;}
            div.c12 {width: 270px;}
            td.c11 {padding-bottom: 10px;}
            td.c10 {border-right: 1px solid black;}
            td.c9 {border-left: 1px solid black;}
            td.c8 {border-bottom: 1px solid black;}
            div.c7 {padding-left: 12px; padding-bottom: 2px;}
            div.c6 {padding: 10px 0px; text-align: center;}
            div.c5 {width: 200px; background-color: White; padding: 0px 10px; margin-left: 50px;}
            div.c4 {padding: 0px 0px 0px 10px;}
            td.c3 {height: 10px;}
            table.c2 {background-color: rgb(255, 255, 255);}
            img.c1 {border-width: 0px;}
            /*]]>*/
        </style>
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-39038536-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

        </script>
    </head>

    <body>
	<?php     include_once("../analyticstracking.php")    ?>
        <div class="home">
	<div class="menu-top-container">
		    <div>
			<a href="./advice-center">Advice Center</a> | <a href="./faq">FAQs</a> | <a href="news/209-About-Us">About Us</a>
		    </div>
		    <hr style="position: relative;top: 113px;height: 2px;color: #f3f3f3;border: none;background-color: #f3f3f3;">
	</div>
            <div class="banner-top">
                <div class="imageBanner">
                    <div class="header_left">
                        <a href="<?= $sitelink ?>" style="position:relative;float: left;margin-bottom:0px;margin-top:5px;"> <img src="<?= $sitelink ?>/images/logov2.jpg" alt="apply for credit card online, credit card online application, compare credit cards"   /> </a>
                    </div>

                        <div class="header-content" style="margin: -10px 120px 0px 730px;color:#000;height:62px;width:550px;width:202px;">


                            <div style="margin:2px 0 0 60px;float:right;position:absolute;top:96px;">

                                <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style ">

                                    <a class="addthis_button_facebook">
                                        <img src="<?= $sitelink ?>/images/social/social_facebook.jpg"></img>
                                    </a>

                                    <a class="addthis_button_twitter">
                                        <img src="<?= $sitelink ?>/images/social/social_twitter.jpg"></img>
                                    </a>

                                    <!--                                    <a class="addthis_button_email"></a>-->


                                    <a class="addthis_button_google">
                                        <img src="<?= $sitelink ?>/images/social/social_googleplus.jpg"></img>
                                    </a>
                                    <!--                                    <a href="http://www.addthis.com/bookmark.php?v=250&amp;username=" class="addthis_button_compact"></a>
                                                                        <a class="addthis_counter addthis_bubble_style"></a>-->
                                </div>
                                <script type="text/javascript">var addthis_config = {"data_track_clickback": true};</script>
                                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username="></script>
                                <!-- AddThis Button END -->

                        </div>
                    </div>
                    <div class="banner-back">
                        <?php $module = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); ?>
			
			<nav>
			  
                            <ul>
                                <li class="first"><a href="<?php echo $sitelink; ?>">Home</a></li>
                                <li class="hasnested">
                                    <a href="<?= $sitelink ?>/calculators">Calculators <span class="caret"></span></a>
                                    <div>
                                        <ul class="nested-list">
                                            <li class="nested">
                                                <a href="<?= $sitelink ?>/calculators/#page=page-1">Repayment</a>

                                            </li>
                                            <li class="nested"><a href="<?= $sitelink ?>/calculators/#page=page-2">Balance Transfer</a></li>
                                            <li class="nested"><a href="<?= $sitelink ?>/calculators/#page=page-3">Cash Back</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="<?= $sitelink ?>/advice-center">Advice Center</a></li>
                                <li><a href="<?= $sitelink ?>/best-credit-card-offers">Best Deals</a></li>
                                <li class="<?php echo $module=="blog" ? 'active' :  "";?>"><a href="<?= $sitelink ?>/blog">Blog</a></li>
                                <li><a href="<?= $sitelink ?>/contact">Contacts</a></li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
            <?
            $extraie4=$extraie5=$extraie6=$extraie7="";
            if($matchcase){
            $extraie4="mod-content-menu";
            $extraie5="mod-textTitlemenu";
            $extraie6="mod-border-menu-top";
            $extraie7="mod-border-menu-bottom";
            }
            ?>