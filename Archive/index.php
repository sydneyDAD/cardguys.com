<?php
echo "hello";
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
    ob_start('ob_gzhandler');
else
    ob_start();
session_start();
define('INCLUDED', 1);
include_once ('config.php');

include_once ('global_site.php');
//include_once ('seotitle.php');
//print_r($_SERVER['QUERY_STRING']);
?>
<?

if ($module != 'request') {
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

    <html xmlns="http://www.w3.org/1999/xhtml">

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="verify-v1" content="pn3InnNhYl4fZzCMIoiGYNmEJNk1gSyq92BqyzTiA88=" />
            <meta name="keywords" content="<?= $_SESSION['keyword'] ?>"/>
            <meta name="description" content="<?= $_SESSION['destination'] ?>"/>
            <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
                <base href="<?= $sitelink ?>"/>
                <a name="top"></a>

                <title><?= $_SESSION['title'] ?></title>
                <link rel="stylesheet" type="text/css" href="css/home.css" />
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
        </head>

        <body>
           
            <div class="home">
                <div class="banner-top">
                    <div class="imageBanner">
                        <div class="header_left">
                            <a href="<?= $sitelink ?>"> <img src="images/logo.gif"   /> </a>

                            <div style=" color:  white; font-weight: bold; margin-left: 20px; float: left; margin-top: 0px;">
    <?= $row_config['header_left'] ?>
                            </div>
                        </div>
                        <div style="margin: 20px 120px 0px 380px;color:  white;">
    <?= $row_config['header_right'] ?>
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
    ?>
                <div class="benner-bottom">
                    <div class="content-banner-bottom">
    <? include('module/menu/top_menu.php') ?>

                    </div>
                </div>


                <div class="content">

                    <div class="menuleft">


                        <div class="creditcardbytype">
                            <div class="border-menu-top <?= $extraie6 ?>"></div>
                            <div class="textTitlemenu <?= $extraie5 ?>">Credit Cards By Type</div>
    <?
    include ('module/menu/types_menu.php');
    ?>


                            <div class="border-menu-bottom <?= $extraie7 ?>"></div>
                        </div>







                        <div class="creditcardbytype">
                            <div class="border-menu-top <?= $extraie6 ?>"></div>
                            <div class="textTitlemenu <?= $extraie5 ?>">
    <?
    if ($module == 'blog') {
        echo "Blog Articles By Date";
    } else {
        echo "Credit Cards By Issuer";
    }
    ?>
                            </div>
                                <?
                                if ($module == 'blog') {
                                    include ('module/menu/blog_date.php');
                                } else {
                                    include ('module/menu/banks_menu.php');
                                }
                                ?>


                            <div class="border-menu-bottom <?= $extraie7 ?>"></div>
                        </div>
                        <div class="creditcardbytype">
                            <div class="border-menu-top <?= $extraie6 ?>"></div>
                            <div class="textTitlemenu <?= $extraie5 ?>">
                            <?
                            if ($module == 'blog') {
                                echo "Blog Articles By Date";
                            } else {
                                echo "Cards by Credit Quality";
                            }
                            ?>
                            </div>
    <?
    if ($module == 'blog') {
        include ('module/menu/blog_date.php');
    } else {
        include ('module/menu/quality.php');
    }
    ?>


                            <div class="border-menu-bottom <?= $extraie7 ?>"></div>
                        </div>





                        <div class="creditcardbytype">
                            <div class="border-menu-top <?= $extraie6 ?>"></div>
                            <div class="textTitlemenu <?= $extraie5 ?>">
                            <?
                            if ($module == 'blog') {
                                echo "Blog Articles By Category";
                            } else {
                                echo "International Cards";
                            }
                            ?>
                            </div>
    <?
    if ($module == 'blog') {
        include ('module/menu/blog_category.php');
    } else {
        include ('module/menu/ints_menu.php');
    }
    ?>


                            <div class="border-menu-bottom <?= $extraie7 ?>"></div>
                        </div>





                        <div class="creditcardbytype">
                            <div class="border-menu-top <?= $extraie6 ?>"></div>
                            <div class="textTitlemenu <?= $extraie5 ?>">Other Resources</div>
                            <div class="content-menu <?= $extraie4 ?>">
                                <div class="link-menu">
                                    <div class="link-menu-img"><img src="<?= $sitelink ?>/images/icon-menu-type.gif"/></div>
                                    <div class="link-menu-text">
                                        <a href="glossary">Glossary Of Terms  </a>
                                    </div>
                                </div>
                                <div class="link-menu">
                                    <div class="link-menu-img"><img src="<?= $sitelink ?>/images/icon-menu-type.gif"/></div>
                                    <div class="link-menu-text">
                                        <a href="faq">FAQ - Get Answers!  </a>
                                    </div>
                                </div>
                                <div class="link-menu">
                                    <div class="link-menu-img"><img src="<?= $sitelink ?>/images/icon-menu-type.gif"/></div>
                                    <div class="link-menu-text">
                                        <a href="advice-center">Advice Center  </a>
                                    </div>
                                </div>
    <?php if ((int) $row_config['blog_stat']) { ?>
                                    <div class="link-menu">
                                        <div class="link-menu-img"><img src="<?= $sitelink ?>/images/icon-menu-type.gif"/></div>
                                        <div class="link-menu-text">
                                            <a href="blog">Credit Card Blog </a>
                                        </div>
                                    </div>
    <?php } ?>
                                <div class="link-menu">
                                    <div class="link-menu-img"><img src="<?= $sitelink ?>/images/icon-menu-type.gif"/></div>
                                    <div class="link-menu-text">
                                        <a href="free-credit-reports">Free Credit Reports </a>
                                    </div>
                                </div>

                            </div>

                            <div class="border-menu-bottom <?= $extraie7 ?>"></div>
                        </div>


                        <div class="imagebottom">
    <?
    if ($module != '') {
        if ($_SESSION['assign_banner'] != '') {
            $bg = $advertise->detail1($_SESSION['assign_banner']);
            ?>
                                    <a  href="<?= $_SERVER['REQUEST_URI'] ?>" target="_blank" >
                                        <img src="upload/adv/<?= $bg['image'] ?>" class="c1" />
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
                                                <img src="<?= $advertise->path ?>/resize/<?= $row_a3['image'] ?>" class="c1" width="125px" height="125px" />
                                            </a>
                    <?
                } else {
                    ?>
                                            <a  href="<?= $row_a2->link ?>" target="_blank" >
                                                <img src="<?= $advertise->path ?>/resize/<?= $row_a2->image ?>" class="c1" width="125px" height="125px" />
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

                                <? if ($row_config['home_header']): ?>
                                <div class="infocard">
                                    <div class="border-content-card-top <?= $extraie8 ?>"></div>				
                                    <div class="title-content-card-top <?= $extraie9 ?>"><span class="text-title-Content-card-top"> Apply for a Credit Card Online</span></div>
                                    <div class="content-card-text-infomation <?= $extraie10 ?>">
                                        <div class="content-apply-text">					

                                    <?= $row_config['home_header'] ?>

                                        </div>
                                    </div>
                                    <div class="border-content-card-bottom <?= $extraie11 ?>"></div>
                                </div>
                                <? endif; ?>

                            <div class="infocard">
                                <div class="border-content-card-top <?= $extraie8 ?>"></div>
                                <div class="title-content-card-top <?= $extraie9 ?>"><span class="text-title-Content-card-top"> Top Credit Card Offers</span></div>
                                <div class="content-card-text-infomation <?= $extraie10 ?>">
                                    <div class="content-apply-text">

                            <? include('module/other/special_cards.php') ?>

                                    </div>
                                </div>
                                <div class="border-content-card-bottom <?= $extraie11 ?>"></div>
                            </div>

                            <div class="infocard">
                                <div class="border-content-card-top <?= $extraie8 ?>"></div>
                                <div class="title-content-card-top <?= $extraie9 ?>"><span class="text-title-Content-card-top"> Most Popular Credit Card Types</span></div>
                                <div class="content-card-text-infomation <?= $extraie10 ?>">
                                    <div class="content-apply-text">
                            <? include('module/menu/special_type.php') ?>



                                    </div>
                                </div>
                                <div class="border-content-card-bottom <?= $extraie11 ?>"></div>
                            </div>

                            <div class="infocard">
                                <div class="border-content-card-top <?= $extraie8 ?>"></div>
                                <div class="title-content-card-top <?= $extraie9 ?>"><span class="text-title-Content-card-top"> Credit Cards By Issuer</span></div>
                                <div class="content-card-text-infomation <?= $extraie10 ?>">

                            <? include('module/other/list_bank_in_home.php') ?>

                                </div>
                                <div class="border-content-card-bottom <?= $extraie11 ?>"></div>
                            </div>



                            <div class="infocard">
                                <div class="border-content-card-top <?= $extraie8 ?>"></div>
        <? include('module/other/advice.php') ?>

                                <div class="border-content-card-bottom <?= $extraie11 ?>"></div>
                            </div>

                            <div class="infocard">
                                <div class="border-content-card-top <?= $extraie8 ?>"></div>
        <? include('module/other/home_news.php') ?>

                                <div class="border-content-card-bottom <?= $extraie11 ?>"></div>
                            </div>





        <? if ($row_config['home_footer']): ?>
                                <div class="content-khongbiet">
                                    <div class="border-footer-khongbiet"></div>
                                    <div class="border-content-footer-khongbiet">
                                        <div class="border-text-footer-khongbiet">
            <?= $row_config['home_footer'] ?>
                                        </div>
                                    </div>

                                </div>
        <? endif; ?>


                            <div style="clear:both"></div>
        <?
    }
    elseif ($module == 'blog' && intval($_GET['id'] != 0)) {
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
                    <div style="clear: both;"></div>

                </div>
                <div style="clear:both"></div>

                <div class="footter">

                    <div class="footterContent">
                        <div class="footterTopContent">
    <? include('module/menu/bottom_list_cards_type.php') ?>
                        </div>






                        <div style="clear: both;"></div>

                        <div class="footerCopyright">
                            <div class="contact">

                                Important Notices and Disclosures:* See the credit card application for details about terms and conditions. Reasonable efforts are made to maintain accurate information. However all credit card information is presented without warranty. When you click on the “Apply Now" button, you can review the credit card terms and conditions on the credit card issuer's website.

                            </div>
                        </div>  
                        <div class="footerCopyright">
                            Copyright © 2002 - <?= date("Y") ?>. All Rights Reserved. <span style="margin-left: 4px;">
                        <? include('module/menu/bottom_menu.php') ?>
                                <div>
                                    <img src="images/khoa2.jpg" />Security Note: All applications linked to from this site feature Secure SSL Technology.
                                </div>
                        </div>
                    </div>




                </div>




            </div>


            <script language="JavaScript1.2" type="text/javascript">
                function addBookmark(url, title)
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
    echo $_SESSION['trackerx'];
    ?>
            </script -->
        </body>
    </html>
<?
} elseif (file_exists('module/' . $module . '/' . $view . '.php')) {
    include_once('module/' . $module . '/' . $view . '.php');
} else {
    include_once('includes/denied.php');
}
?>