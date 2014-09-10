<?php
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
    ob_start('ob_gzhandler');
else
    ob_start();
session_start();
define('INCLUDED', 1);

include_once ('config.php');
$ok_to_run = false;
include_once ('global_site.php');
$_SESSION['lang'] = 1;

require_once(__DIR__ . '/PhpConsole/__autoload.php');

$handler = PhpConsole\Handler::getInstance();
$handler->start(); // start handling PHP errors & exceptions
$handler->getConnector()->setSourcesBasePath($_SERVER['DOCUMENT_ROOT']); // so files paths on client will be shorter (optional)
?>
<?
if ($module != 'request') {
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

    <html xmlns="http://www.w3.org/1999/xhtml">

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title><?= $_SESSION['title'] ?></title>
            <meta name="verify-v1" content="pn3InnNhYl4fZzCMIoiGYNmEJNk1gSyq92BqyzTiA88=" />
            <meta name="keywords" content="<?= $_SESSION['keyword'] ?>"/>
            <meta name="description" content="<?= $_SESSION['destination'] ?>"/>

            <base href="<?= $sitelink ?>"/>
            <a name="top"></a>


            <link rel="stylesheet" type="text/css" href="<?= $sitelink ?>/css/home.css" />
            <link rel="stylesheet" type="text/css" href="<?= $sitelink ?>/css/jquery.bxslider.css" />
            <link rel="stylesheet" type="text/css" href="<?= $sitelink ?>/css/slider.css" />
            <link rel="stylesheet" type="text/css" href="<?= $sitelink ?>/css/boostrap-modal.css" />
            <link href="<?= $sitelink ?>/css/tabs.css" rel="stylesheet" type="text/css" />
    <!--            <script src="<?= $sitelink ?>/js/libs/jquery-1.6.2.min.js"></script>-->
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
            <script src="<?= $sitelink ?>/js/jquery.bxslider.js"></script>
            <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>


                                                                                <!--            <script src="<?= $sitelink ?>/js/basic-jquery-slider.js"></script>-->

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
                })();</script>
        </head>

        <body>

            <div class="home">

                <div class="menu-top-container">
                    <div>
                        <a href="<?php echo $sitelink; ?>/advice-center">Advice Center</a> | <a href="<?php echo $sitelink; ?>/faq">FAQs</a> | <a href="news/209-About-Us">About Us</a>
                    </div>
                </div>

                <div class="banner-top">
                    <div class="imageBanner">

                        <div class="header_left">
                            <a href="<?= $sitelink ?>" style="position:relative;float: left;margin-bottom:0px;margin-top:5px;"> <img src="<?= $sitelink ?>/images/logov2.jpg" alt="apply for credit card online, credit card online application, compare credit cards"   /> </a>

                            <div style=" color:  #000; font-weight: bold; margin-left: 35px; float: left; margin-top: -5px;position:relative;">
                                <?php $row_config['header_left'] ?>
                            </div>
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

                                    <a class="addthis_button_pinterest_share">
                                        <img src="<?= $sitelink ?>/images/social/social_pininterst.jpg"></img>
                                    </a>

                                    <a class="addthis_button_instagram" href="">
                                        <img src="<?= $sitelink ?>/images/social/social_instagram.jpg"></img>
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
                            <nav>
                                <ul>
                                    <li class="first"><a href="<?php echo $sitelink; ?>">Home</a></li>
                                    <li class="hasnested">
                                        <a href="<?php echo $sitelink; ?>/calculators">Calculators <span class="caret"></span></a>
                                        <div>
                                            <ul class="nested-list">
                                                <li class="nested">
                                                    <a href="<?php echo $sitelink; ?>/calculators/#page=page-1">Repayment</a>

                                                </li>
                                                <li class="nested"><a href="<?php echo $sitelink; ?>/calculators/#page=page-2">Balance Transfer</a></li>
                                                <li class="nested"><a href="<?php echo $sitelink; ?>/calculators/#page=page-3">Cash Back</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="<?php echo $sitelink; ?>/advice-center">Advice Center</a></li>
                                    <li><a href="<?php echo $sitelink; ?>/best-credit-card-offers">Best Deals</a></li>
                                    <li><a href="<?php echo $sitelink; ?>/blog">Blog</a></li>
                                    <li><a href="<?php echo $sitelink; ?>/contact">Contacts</a></li>
                                </ul>
                            </nav>

                        </div>

                    </div>
                </div>
                <?
                $extraie4 = $extraie5 = $extraie6 = $extraie7 = "";
                if ($matchcase) {
                    $extraie4 = "mod-content-menu";
                    $extraie5 = "mod-textTitlemenu";
                    $extraie6 = "mod-border-menu-top";
                    $extraie7 = "mod-border-menu-bottom";
                }


                if ($module == '') {
                    ?>


                    <div class="middle-container">



                        <div class="middle-content">
                            <div class="slider-holder">
                                <ul class="bxslider">
                                    <li>
                                        <img src="<?= $sitelink ?>/images/slider/slider-image1.jpg" />
                                    </li>
                                    <li>
                                        <img src="<?= $sitelink ?>/images/slider/slider-image2.jpg" />
                                    </li>
                                    <li>
                                        <img src="<?= $sitelink ?>/images/slider/slider-image3.jpg" />
                                    </li>
                                    <li><img src="<?= $sitelink ?>/images/slider/slider-image1.jpg" /></li>
                                </ul>
                            </div>

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
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


                <div class="modal-body">
                 <img src="<?php echo $sitelink;?>/images/ajax-loader.gif" >
                 <div>Loading Credit Card</div>
                </div>

          </div>
            
                            <form id="cardfinder" method=get action="<?= $sitelink ?>/search" />
                            <div class="card_finder">
                                <div class="creditcardfinder">

                                    <div class=finder_steps> 
                                        <div class=steps_head>Credit Card Finder</div>
                                        <div class=the_steps> 

                                            <span class=steps_info>
                                                <div class="styled-select">
                                                    <img src="<?php echo $sitelink;?>/images/down-arrow.png"/>
                                                    <select name=credit_as>
                                                       
                                                        <option value=1">Consumer use </option>
                                                        <option value=2>Student use  </option>
                                                        <option value=3>Business use </option>

                                                    </select>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    <div class=finder_steps> 

                                        <div class=the_steps> 

                                            <div class=steps_info>
                                                <span class="error-credit hide">This field is requried</span>
                                                <div class="styled-select">
                                                    <img src="<?php echo $sitelink;?>/images/down-arrow.png"/>
                                                    <select name=credit_type id="credit_type">
                                                        <option value=0>What is your credit like?</option>
                                                        <option value=1>Poor</option>
                                                        <option value=2>Fair </option>
                                                        <option value=3>Good</option>
                                                        <option value=4>Excellent </option>
                                                        <option value=5>Not sure</option>

                                                    </select>


                                                </div>
                                            </div>
                                        </div>



                                        <div class=finder_steps> 
                                            <div class=the_steps> 

                                                <span class=steps_info>
                                                    <span class="error-offer hide">This field is requried</span>
                                                    <div class="styled-select type-card">
                                                        <img src="<?php echo $sitelink;?>/images/down-arrow.png"/>
                                                        <select name=credit_cat id="credit_cat">

                                                            <option value=0>Best Credit Card Offers</option>
                                                            <?php
                                                            include ('module/card-details/type_cards.php');
                                                            echo $hold_typesx;
                                                            ?>
                                                        </select>
                                                    </div>
                                                </span>


                                            </div>


                                            <div class=finder_steps> 
                                                <div class=steps_search>
                                                    <button class="search_button">Search</button>
                                              
                                                    <!--input type="submit" class="search_button" value="Search">-->

                                                </div>

                                            </div>
                                        </div>





                                    </div>
                                    </form>

                                    </div>
                                </div>
                                <br class="clear" />
                        </div>

                    </div>
                <? } ?>
            </div>
            <div class="home bottom-home">
                <div class="content">

                    <div class="menuleft">


                        <?php if ($module != "blog"): ?>

                            <div class="creditcardbytype">

                                <div class="textTitlemenu <?= $extraie5 ?>">
                                    <span class=text_span>Credit Cards By Type</span>
                                </div>
                                <?
                                include ('module/menu/types_menu.php');
                                ?>



                            </div>
                        <? endif; ?>





                        <?php if ($module != 'blog'): ?>
                            <div class="creditcardbytype issuer">

                                <div class="textTitlemenu cardissuer <?= $extraie5 ?>"><span class=text_span>
                                        <?
                                        if ($module == 'blog') {
                                            echo "Advice By Date";
                                        } else {
                                            echo "Credit Cards By Issuer";
                                        }
                                        ?></span>
                                </div>
                                <?
                                if ($module == 'blog') {

                                    include ('module/menu/blog_date.php');
                                } else {
                                    include ('module/menu/banks_menu.php');
                                }
                                ?>



                            </div>
                        <?php endif; ?>
                        <?php if ($module != 'blog'): ?>
                            <div class="creditcardbytype issuer">

                                <div class="textTitlemenu cardissuer <?= $extraie5 ?>"><span class=text_span>
                                        <?
                                        if ($module == 'blog') {
                                            echo "Advice By Date";
                                        } else {
                                            echo "Cards by Credit Quality";
                                        }
                                        ?></span>
                                </div>
                                <?
                                if ($module == 'blog') {
                                    include ('module/menu/blog_date.php');
                                } else {
                                    include ('module/menu/quality.php');
                                }
                                ?>



                            </div>
                        <? endif; ?>



                        <?php if ($module == 'blog'): ?>
                            <div class="creditcardbytype issuer">

                                <div class="textTitlemenu cardissuer <?= $extraie5 ?>">
                                    <span class=text_span>
                                        <?
                                        if ($module == 'blog') {
                                            echo "Advice By Category";
                                        } else {
                                            echo "International Cards";
                                        }
                                        ?></span>
                                </div>
                                <?
                                if ($module == 'blog') {
                                    include ('module/menu/blog_category.php');
                                } else {
                                    include ('module/menu/ints_menu.php');
                                }
                                ?>



                            </div>
                        <?php endif; ?>


                        <div class="creditcardbytype issuer last ">

                            <div class="textTitlemenu cardissuer <?= $extraie5 ?>"><span class="text_span" >Other Resources</span></div>
                            <div class="content-menu <?= $extraie4 ?>">
                                <div class="link-menu">

                                    <div class="link-menu-text">
                                        <a href="glossary">Glossary Of Terms  </a>
                                    </div>
                                </div>
                                <div class="link-menu">

                                    <div class="link-menu-text">
                                        <a href="faq">FAQ - Get Answers!  </a>
                                    </div>
                                </div>
                                <div class="link-menu">

                                    <div class="link-menu-text">
                                        <a href="advice-center">Advice Center  </a>
                                    </div>
                                </div>

                                <div class="link-menu">

                                    <div class="link-menu-text">
                                        <a href="blog">Credit Card Blog </a>
                                    </div>
                                </div>

                                <div class="link-menu">

                                    <div class="link-menu-text">
                                        <a href="free-credit-reports">Free Credit Reports </a>
                                    </div>
                                </div>

                            </div>


                        </div>




                        <div class="imagebottom">
                            <?
                            if ($module != '') {
                                if ($_SESSION['assign_banner'] != '') {
                                    $bg = $advertise->detail1($_SESSION['assign_banner']);
                                    ?>
                                    <a  href="<?= $_SERVER['REQUEST_URI'] ?>" target="_blank" >
                                        <img src="upload/adv/<?= $bg['image'] ?>" class="c1" alt="apply for credit card online, credit card online application, compare credit cards" />
                                    </a>
                                    <?
                                } else {
                                    
                                }
                            } else {

                                $row_adv2 = $advertise->lists(' position = "' . 'image' . '"', '1');
                                if ($row_adv2) {
                                    foreach ($row_adv2 as $row_a2) {
                                        $id = $row_a2->assign;
                                        if ($id != 0) {
                                            $row_a3 = $advertise->detail1($id);
                                            ?>
                                            <a  href="<?= $row_a2->link ?>" target="_blank" >
                                                <img src="<?= $advertise->path ?>/resize/<?= $row_a3['image'] ?>" class="c1" width="125px" height="125px" alt="apply for credit card online, credit card online application, compare credit cards" />
                                            </a>
                                            <?
                                        } else {
                                            ?>
                                            <a  href="<?= $row_a2->link ?>" target="_blank" >
                                                <img src="<?= $advertise->path ?>/resize/<?= $row_a2->image ?>" class="c1" width="125px" height="125px" alt="apply for credit card online, credit card online application, compare credit cards" />
                                            </a>
                                            <?
                                        }
                                    }
                                }
                            }
                            ?>

                        </div>

                    </div>



                    <div class="noidung-card">
                        <?
                        if ($module == '') {
                            $extraie8 = $extraie9 = $extraie10 = $extraie11 = "";
                            if ($matchcase) {
                                $extraie8 = "mod-border-content-card-top";
                                $extraie9 = "mod-title-content-card-top";
                                $extraie10 = "mod-content-card-text-infomation";
                                $extraie11 = "mod-border-content-card-bottom";
                            }
                            ?>





                            <?
                            if ($row_config['home_header']):
                                ?>			
                                <div id=apply_for class="title-content-card-top <?= $extraie9 ?>">
                                    <h1>
                                        Apply for a Credit Card Online
                                    </h1>
                                </div>
                                <div class="content-card-text-infomation <?= $extraie10 ?>">
                                    <div class="content-apply-text">					

                                        <?= $row_config['home_header'] ?>

                                    </div>
                                </div>
                            <? endif; ?>	

                            <div id=top_credit class="title-content-card-top <?= $extraie9 ?>"><span class="text-title-Content-card-top front-top-title"> Top Credit Card Offers</span></div>			
                            <div class="content-card-text-infomation  <?= $extraie10 ?>">
                                <div class="content-apply-text">
                                    <? include('module/other/special_cards.php') ?>

                                </div>
                            </div>





                                                                                                                                                                                                                                                                                                                                                                        <!-- div class="title-content-card-top <?= $extraie9 ?>"><span class="text-title-Content-card-top"> Most Popular Credit Card Types</span></div>
                                                                                                                                                                                                                                                                                                                                                                        <div class="content-card-text-infomation <?= $extraie10 ?>">
                                                                                                                                                                                                                                                                                                                                                                                <div class="content-apply-text">
                            <?
                            //include('module/menu/special_type.php')
                            ?>



                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                        </div -->



                            <div id=issuer_credit class="title-content-card-top <?= $extraie9 ?>"><span class="front-top-title text-title-Content-card-top"> Credit Cards By Issuer</span></div>
                            <div class="content-card-text-infomation mainissuer  <?= $extraie10 ?>">

                                <? include('module/other/list_bank_in_home.php') ?>
                                <br class="clear"/>     
                            </div>


                                                                                                                                                                                                                                                                                                                                                                                <!-- div class="content-card-text-infomation <?= $extraie10 ?>">
                                                                                                                                                                                                                                                                                                                                                                                        <div class="content-apply-text">					
                                                                                                                                                                                                                
                                                                                                                                                                                                                                                                                                                                                                                                CardGuys.com is more than just a place to compare credit cards or fill out a credit card online application. It is a site that allows you to learn about credit cards, find out how they work, and get know how they can impact your life. We offer a number of resources to help you choose your next credit card with confidence.
                                                                                                                                                                                                                                                                                                                                                                        <a href="http://cardguys.com/advice-center">The Advice Center</a> – Chances are good that if you have a question about credit cards that you will find the answeusiness credit card. 
                                                                                                                                                                                                                                                                                                                                                                        <a href="http://cardguys.com/blog/">Our Blog</a> – Looking for the latest tips on what to look for in a credit card? Or maybe you’re interested in what is going on in the world of credit cards? It’s also possible that you want a more in depth look at some of the cards featured on our site? If the answer to ar in our Advice Center. It offers a variety of articles ranging from how to use a credit card to raise your credit score to the benefits of a bny of these is yes, then you should check out our blog. It offers great updated information that you should know before you fill out a credit card online application.
                                                                                                                                                                                                                                                                                                                                                                        <a href="http://cardguys.com/calculators#page=page-1">Calculators</a> – Just in case math isn’t your strong suit, we offer three different calculators to help you get a better grasp of what you would be walking into if you go with a particular card. You can see how long pay off a card, figure out how much you would save if you transfer a balance, or get a better idea of what cash back really means. All of this allows you to better compare credit cards.


                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                </div-->               


                            <?
                            require( 'blog/wp-load.php' );
                            include('module/other/latest_articles.php')
                            ?>


                            <? if ($row_config['home_footer']): ?>

                            <? endif; ?>





                            <div style="clear:both"></div>
                            <?
                        }
                        elseif ($module == 'blog') {
                            include_once('module/blog/detail.php');
                        } elseif ($module == 'blog' || ( $module == 'blog' && (intval($_GET['type']) > 0 || intval($_GET['date']) > 0))) {
                            include_once('module/blog/list.php');
                        } elseif (file_exists('module/' . $module . '/' . $view . '.php')) {
                            include_once('module/' . $module . '/' . $view . '.php');
                        } else {
                            include_once('includes/denied.php');
                        }
                        ?>

                    </div>

                    <!-- footer content -->
                    <div style="clear:both"></div>
                </div>

                <div class="footter">

                    <div class="footterContent">
                        <div class="footterTopContent">
                            <? include('module/menu/bottom_list_cards_type.php') ?>

                        </div>
                        <div style="clear: both;"></div>














                    </div>
                    <div class="copyright-container">
                        <div class="inner-copyright-container">
                            <div class="left">
                                Copyright © 2014 <b class="bold">CardGuys</b>  |  All Rights Reserved

                            </div>
                            <div class="right">

                                <div class="addthis_toolbox addthis_default_style ">

                                    <div class="keep">Keep in touch </div> 
                                    <a class="addthis_button_facebook">
                                        <img src="<?= $sitelink ?>/images/social/social_footer_facebook.png"></img>
                                    </a>

                                    <a class="addthis_button_twitter">
                                        <img src="<?= $sitelink ?>/images/social/social_footer_twitter.png"></img>
                                    </a>

                                    <a class="addthis_button_pinterest_share">
                                        <img src="<?= $sitelink ?>/images/social/social_footer_pinterest.png"></img>
                                    </a>

                                    <a class="addthis_button_instagram" href="">
                                        <img src="<?= $sitelink ?>/images/social/social_footer_instagram.png"></img>
                                    </a>
                                    <!--                                    <a class="addthis_button_email"></a>-->


                                    <a class="addthis_button_google">
                                        <img src="<?= $sitelink ?>/images/social/social_footer_googleplus.png"></img>
                                    </a>
                                    <!--                                    <a href="http://www.addthis.com/bookmark.php?v=250&amp;username=" class="addthis_button_compact"></a>
                                                                        <a class="addthis_counter addthis_bubble_style"></a>-->
                                </div>
                                <script type="text/javascript">var addthis_config = {"data_track_clickback": true};</script>
                                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username="></script>
                                <!-- AddThis Button END -->

                            </div>
                        </div>
                    </div>
                </div>




            </div>


            <!-- end footer content -->

            </div>







            </div>


            <script language="JavaScript1.2" type="text/javascript">
                                    function addbookmark(url, title)
                                    {
                                        if (!url)
                                            url = location.href;
                                        if (!title)
                                            title = document.title;
                                        //Gecko
                                        if ((typeof window.sidebar == "object") && (typeof window.sidebar.addPanel == "function"))
                                            window.sidebar.addPanel("Home Page", "http://www.cardguys.com/", "");
                                        //IE4+
                                        else if (typeof window.external == "object")
                                            window.external.AddFavorite("http://www.cardguys.com/", "Home Page");
                                        //Opera7+
                                        else if (window.opera && document.createElement)
                                        {
                                            var a = document.createElement('A');
                                            if (!a)
                                                return false; //IF Opera 6
                                            a.setAttribute('rel', 'sidebar');
                                            a.setAttribute('href', url);
                                            a.setAttribute('title', title);
                                            a.click();
                                        }
                                        else
                                            return false;
                                        return true;
                                    }
            </script>
            <?php
            //echo $_SESSION['trackerx'];
            ?>
            </script >


        </body>
    </html>
    <?
} elseif (file_exists('module/' . $module . '/' . $view . '.php')) {
    include_once('module/' . $module . '/' . $view . '.php');
} else {
    include_once('includes/denied.php');
}
?>