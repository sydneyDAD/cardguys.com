<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?> "> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">

        <title><?php
            wp_title('|', true, 'right');
            bloginfo('name');
            ?></title>

        <!-- Mobile viewport optimized: j.mp/bplateviewport -->
        <meta name="viewport" content="width=device-width" />

        <!-- Favicon and Feed -->
        <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

        <!--  iPhone Web App Home Screen Icon -->
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-ipad.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-retina.png" />
        <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon.png" />

        <!-- Enable Startup Image for iOS Home Screen Web App -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/mobile-load.png" />

        <!-- Startup Image iPad Landscape (748x1024) -->
        <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />
        <!-- Startup Image iPad Portrait (768x1004) -->
        <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />
        <!-- Startup Image iPhone (320x460) -->
        <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load.png" media="screen and (max-device-width: 320px)" />

        <?php wp_head(); ?>
        <style type="text/css">

            #site-header {
                width: 960px;
                height: 145px;
                margin: 0 auto;
                position: relative;
                background-position: 0 0;
                background-color: transparent;
                background-size: auto auto;
            }

            #header-logo-wrapper {
                position: absolute;
                top: 0;
                left: 0;
                alt: "";
                z-index: 489;
            }

            #footer-logo img {
                float: left;
                width: 250px;
                height: 40px;
            }

            #header-info {
                right: 0;
            }

            a {
                color: #040707;
            }

            #side-menu span.on {
                border-left-color: #394e54;
            }

            .wss-widget-image-link {
                color: #040707;
            }

            .casu-button span.arrow {
                border-left-color: #040707;
            }

            .wss-form-submit-button,.wss-form-reset-button {
                background: none;
                color: #040707;
                padding-left: 5px;
            }

            .wss-form-submit-button:hover,.wss-form-reset-button:hover {
                background-color: #040707;
                text-decoration: none;
            }

            .nw-button {
                color: #040707;
            }

            .tw-button {
                color: #040707;
            }

            .directionsBox .wss-widget-title {
                background-color: #040707;
                color: #fff;
            }

            #w_button_1 {
                padding-left: 8px;
                color: #040707;
                float: right;
            }

            #w_button_1:hover {
                background-color: #ccc;
            }

            #news_widget_con a,#news_list a,#testimonial a,#tw_button,#testimonial_list a,.casu-wrapper .casu-email,.wss-slider-wrapper a,.cw-wrapper a,.sit-wrapper a,.s3-addr-box a,.s2-contact-info a {
                color: #009!important;
            }

            .hpg-phone {
                font-weight: bold;
            }

            .wss-widget-title,.cta-content-title {
                font-weight: bold;
            }

            #header-layout-wrapper {
                border-bottom: 5px solid #040707;
            }

            #menu_s2 li.current a,#menu_s2 li.current.hover a,#menu_s2 li.current a:hover,#menu_s2 li.current a {
                background: none;
                background-color: #040707;
                background: -moz-linear-gradient(center top,[SELECTED_BG_COLOR_0] 0,#040707 100%) repeat scroll 0 0 transparent;
                background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,[SELECTED_BG_COLOR_0]),color-stop(100%,#040707)) repeat scroll 0 0 transparent;
                background: -webkit-linear-gradient(top,[SELECTED_BG_COLOR_0] 0,#040707 100%) repeat scroll 0 0 transparent;
                background: -o-linear-gradient(top,[SELECTED_BG_COLOR_0] 0,#040707 100%) repeat scroll 0 0 transparent;
                background: -ms-linear-gradient(top,[SELECTED_BG_COLOR_0] 0,#040707 100%) repeat scroll 0 0 transparent;
                background: linear-gradient(top,[SELECTED_BG_COLOR_0] 0,#040707 100%) repeat scroll 0 0 transparent;
                color: #fff;
                background: transparent;
            }

            #menu_s2 li.has-menu.current span.arrow {
                border-color: #fff transparent transparent;
            }

            #menu_s2 li.current li.has-menu span.arrow,#menu_s2.vertical li.has-menu span.arrow {
                border-color: transparent transparent transparent #fff;
            }

            #menu_s2,#menu_s2 li.reg a {
                background: none;
                background-color: #040707;
                background: -moz-linear-gradient(center top,[UNSELECTED_BG_COLOR_0] 0,#040707 100%) repeat scroll 0 0 transparent;
                background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,[UNSELECTED_BG_COLOR_0]),color-stop(100%,#040707));
                background: -webkit-linear-gradient(top,[UNSELECTED_BG_COLOR_0] 0,#040707 100%);
                background: -o-linear-gradient(top,[UNSELECTED_BG_COLOR_0] 0,#040707 100%);
                background: -ms-linear-gradient(top,[UNSELECTED_BG_COLOR_0] 0,#040707 100%);
                background: linear-gradient(top,[UNSELECTED_BG_COLOR_0] 0,#040707 100%);
                background: transparent;
            }

            #menu_s2 li a {
                color: #fff;
            }

            #menu_s2 li.has-menu span.arrow {
                border-color: #fff transparent transparent;
            }

            #menu_s2 li li.has-menu span.arrow,#menu_s2.vertical li.has-menu span.arrow {
                border-color: transparent transparent transparent #fff;
            }

            #menu_s2 li.current a:hover {
                filter: -;
                background: none repeat scroll 0 0 transparent;
                color: [FG_HOVER_COLOR];
            }

            #menu_s2 li.current.has-menu li.hover>a {
                filter: -;
                background: none repeat scroll 0 0 #213a3a;
                color: [FG_HOVER_COLOR];
            }

            #menu_s2 li.reg a:hover {
                filter: -;
                background: none repeat scroll 0 0 transparent;
                color: [FG_HOVER_COLOR];
            }

            #menu_s2 li.reg.has-menu li.hover>a {
                filter: -;
                background: none repeat scroll 0 0 #213a3a;
                color: [FG_HOVER_COLOR];
            }

            #menu_s2 ul {
                background-color: #040707;
            }

            #menu_s2 li.current ul {
                background-color: #040707;
            }

            .wss-cell3 {
                width: 960px;
            }

            .wss-cell1 {
                width: 320px;
            }

            .wss-cell2 {
                width: 640px;
            }

            #page-layout #box1 {
                width: 960px;
            }

            #page-layout #box2 {
                width: 320px;
            }

            #page-layout #box3 {
                width: 640px;
            }

            .side-menu li a.on {
                border-top: none;
                background: #b2d4d7;
                background: -moz-linear-gradient(top,#b2d4d7 0,#94b1b3 100%);
                background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,#94b1b3),color-stop(100%,#94b1b3));
                background: -webkit-linear-gradient(top,#b2d4d7 0,#94b1b3 100%);
                background: -o-linear-gradient(top,#b2d4d7 0,#94b1b3 100%);
                background: -ms-linear-gradient(top,#b2d4d7 0,#94b1b3 100%);
                background: linear-gradient(top,#b2d4d7 0,#94b1b3 100%);
            }

            .sm-kickstart-wrapper {
                background: #394e54;
                background: -moz-linear-gradient(top,#445e65 0,#394e54 100%);
                background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,#445e65),color-stop(100%,#394e54));
                background: -webkit-linear-gradient(top,#445e65 0,#394e54 100%);
                background: -o-linear-gradient(top,#445e65 0,#394e54 100%);
                background: -ms-linear-gradient(top,#445e65 0,#394e54 100%);
                background: linear-gradient(top,#445e65 0,#394e54 100%);
            }

            .side-menu a {
                border-bottom: 1px solid #ccc;
                ;
            }
            .sm-kickstart-wrapper {
                font-size: 15px;
                border-style: solid;
                border-width: 1px;
                border-color: #ccc;
            }

            .side-menu li a.on {
                color: #fff;
            }

            .side-menu a {
                color: #394e54;
            }

            .sm-kickstart-wrapper {
                background: transparent;
            }


        </style>
        
        


    </head>

    <body <?php body_class('antialiased'); ?> style="background-color:#000000;">
        <div id="fb-root">
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                        return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
        </div>

        <div class="row">

            <!-- Starting the Top-Bar -->

            <!-- End of Top-Bar -->


            <div id="head-wrapper">
                <div id="agendlz" class="white">
                    <div class="agendItems gi-white" style="width:960px;">
                        <ul id="nav-one">

                            <li><a alt="Send" title="Send" href="index.htm#" id="a_send_to_friend" class="icononly"><span class="send_icon en"></span>_</a>
                                <div id="dialog_send_to_friend">
                                    <p id="dialog_send_to_friend_message"></p>
                                    <form id="form_send_to_friend" action="index.htm#">
                                        <fieldset>
                                            <input type="hidden" name="merchant_xml_file" value="resources/merchantaddresses.dat" class="unsent"/>
                                            <input type="hidden" name="locId" value="5" class="required"/>
                                            <input type="hidden" name="lang" value="en" class="required"/>
                                            <input type="hidden" name="pageSource" value="YPG" class="required"/>
                                            <label>Your Name<i style="color:red;">*</i></label>
                                            <input type="text" name="name" class="required"/>
                                            <label>Your Email Address<i style="color:red;">*</i></label>
                                            <input type="text" name="email" class="required"/>
                                            <label>Your Friend's Email Address<i style="color:red;">*</i></label>
                                            <input type="text" name="email_friend" class="required"/>
                                            <input type="button" id="submit_send_to_friend" name="saveshare_email_friend" value="Submit"/></fieldset>
                                        <p style="display:none" id="send_to_friend_loaderCircle" class="loaderCircle"/>
                                    </form>
                                </div>
                            </li>
                            <li><a alt="Share" title="Share" href="index.htm#" id="share" class="icononly"><span class="share_icon en"></span>_</a>
                                <div id="dialog_share"><a href="index.htm#" name="saveshare_facebook" class="share_facebook" onclick="fbs_click('../hicksadams.ca/index.htm', '')">Facebook</a><a href="index.htm#" name="saveshare_twitter" class="share_twitter" onclick="twitter_click('You should try http://hicksadams.ca/')">Twitter</a></div></li></ul>
                        <div id="social-network">
                            <div id="sn-wrapper">
                                <div class="tweeter item1"><a href="javascript:if(confirm('https://twitter.com/share\n\nThis file was not retrieved because it was filtered out by your project settings.\n\nWould you like to open it from the server?'))window.location='https://twitter.com/share'" class="twitter-share-button" data-lang="en" data-url="http://hicksadams.ca/">Tweet</a>
                                    <script>!function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//platform.twitter.com/widgets.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, "script", "twitter-wjs");</script>
                                </div>
                                <div class="plusone item2">
                                    <div class="g-plusone" data-href="http://hicksadams.ca/" data-width="71" data-size="medium"></div>
                                </div>
                                <div class="flike item3">
                                    <div class="fb-like" data-href="http://hicksadams.ca/" data-send="false" data-width="90" data-show-faces="true" data-layout="button_count" onclick="uw_mlrUtagByStr('like');"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="header-layout-wrapper" style="background-color: #000000;background-image:url('<?php echo get_site_url() . '/images/bannerimg.png' ?>'); background-position: 0 0;background-repeat:repeat-x;border-bottom:none;">
                    <div id="header-layout" style="padding-top: 0px;height:200px;width: 960px;"><a id="sh_home_url" href="index.htm"></a>
                        <div id="site-header" title="Go to Home Page" style="background-image:url('<?php echo get_site_url() . '/images/headerimg.png' ?>'); background-position: 0 0;background-repeat:no-repeat;height:200px;">
                            <div id="main-menu-wrapper" style="visibility:hidden;" valign="top" halign="right" fontSize="15" borderSize="0" borderColor="#000000">





                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'container' => false,
                                    'depth' => 0,
                                    'items_wrap' => '<ul id="menu_s2" class="main_menu s2-menu">%3$s</ul>',
                                    'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
                                    'walker' => new reverie_walker(array(
                                        'in_top_bar' => true,
                                        'item_type' => 'li',
                                        'menu_type' => 'main-menu'
                                            )),
                                ));
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Start the main container -->
