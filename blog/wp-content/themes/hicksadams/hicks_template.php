
<?php
/*
  Template Name: Hicks Template
 */
?>



<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/jquery_1.7.2_min.js' ?>"></script>
<!--<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/css/main_2.css' ?>" />-->
<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/main_2.js' ?>"></script>
<script type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=6.3&mkt=en-US"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/main_6.js' ?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/wssanchor.js' ?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() . "/../../../tag/utag.loader.js" ?>"></script>





<script type="text/javascript">

    $(document).ready(function() {
        $("#w_submenu_1 .side-menu").dcAccordion({})
        $(".iw-image.htm").click(function() {
            $(this).colorbox()
        });
        $(".rolloverImg.htm").hover(function() {
            rmi_hover(this)
        }, function() {
            rmi_hover(this)
        });
        function rmi_hover(e) {
            var t = $(e).attr("rl");
            $(e).attr("rl", $(e).attr("src"));
            $(e).attr("src", t)
        }
        $(".cta_rolloverimg.htm").hover(function() {
            cta_rmi_hover(this)
        }, function() {
            cta_rmi_hover(this)
        });
        function cta_rmi_hover(e) {
            var t = $(e).attr("rl");
            $(e).attr("rl", $(e).css("background-image").replace(/^url\(["']?/, "").replace(/["']?\)$/, ""));
            $(e).css("background-image", 'url("' + t + '")')
        }
        $("index.htm#header-layout").click(function() {
            $(location).attr("href", $("#sh_home_url").attr("href"))
        });
        $("#header-layout").mouseover(function() {
            $(this).css("cursor", "pointer")
        })

        $("a").live("click", function() {
            uw_tracker(this)
        });
        $("input").click(function() {
            uw_tracker(this)
        });
        uw_detectClickForm()

        $("#nav-one").dropmenu();
        resetEmailUs();
        resetSendToFriend();
        $("#submit_send_to_friend").click(function() {
            $("#send_to_friend_loaderCircle").show();
            setTimeout("sendSendToFriendForm()", 200)
        });
        $("#submit_email_us").click(function() {
            $("#email_us_loaderCircle").show();
            setTimeout("sendEmailUsForm()", 200)
        })
        $("a[name=dummyLink]").click(function(e) {
            if (!e) {
                var e = window.event
            }
            e.cancelBubble = true;
            if (e.stopPropagation) {
                e.stopPropagation()
            }
            return false
        });
        $("a[name=external_links]").click(function(e) {
            if (!e) {
                var e = window.event
            }
            e.cancelBubble = true;
            if (e.stopPropagation) {
                e.stopPropagation()
            }
            return true
        });

        (function() {
            var po = document.createElement("script");
            po.type = "text/javascript/index.htm";
            po.async = true;
            po.src = "https://apis.google.com/js/plusone.js";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(po, s)
        })();
        menu_init()


    });

    var utag_data = {page: "Home", section: "7605859/1-2167694215/ISDE/chiro_1/d2/index.htm", cobrand: "", language: "en", heading: "", directory: "", mlr: "7605859_wss", search_page: "", search_refine: "", position_address: "", position_number: "", headdir_link: "", listing_link: "", listing_id: "", photo: "", video_pct: "", video_menu: "", link_name: "", link_attr: "", widget: "form-widget,gallery-widget,image-widget,text-widget"};
    if (!/[?&amp;]fb_xd_fragment/.test(window.location.search)) {
        try {
            utag.view(utag_data)
        } catch (e) {
        }
    }

    $(document).ready(function() {
        $(".iw-image.htm").click(function() {
            $(this).colorbox()
        });
        $(".rolloverImg.htm").hover(function() {
            rmi_hover(this)
        }, function() {
            rmi_hover(this)
        });
        function rmi_hover(e) {
            var t = $(e).attr("rl");
            $(e).attr("rl", $(e).attr("src"));
            $(e).attr("src", t)
        }
        $(".cta_rolloverimg.htm").hover(function() {
            cta_rmi_hover(this)
        }, function() {
            cta_rmi_hover(this)
        });
        function cta_rmi_hover(e) {
            var t = $(e).attr("rl");
            $(e).attr("rl", $(e).css("background-image").replace(/^url\(["']?/, "").replace(/["']?\)$/, ""));
            $(e).css("background-image", 'url("' + t + '")')
        }}
    );
    $(document).ready(function() {
        LoadMaps(true);
        $('div[id*="_address_pin_"]').click(function() {
            moveToPin(this)
        });
        $(".single-map-dir-btn.htm").click(function() {
            $(this).wssCasuDirection({type: "single", mapId: $(this).attr("data-map-id")})
        });
        $(".multi-map-dir-btn, a.s2-dir-holder").live("click", function() {
            $(this).wssCasuDirection({type: "multi", mapId: $(this).attr("data-map-id"), dialogId: $(this).attr("data-dialog-id"), idx: $(this).attr("data-idx")})
        })
    });
    $(document).ready(function() {
        $("#header-layout").click(function() {
            $(location).attr("href", $("#sh_home_url").attr("href"))
        });
        $("#header-layout").mouseover(function() {
            $(this).css("cursor", "pointer")
        })
    });
    var utag_data = {page: "Contact Us", section: "7605859/1-2167694215/ISDE/chiro_1/d2/index.htm", cobrand: "", language: "en", heading: "", directory: "", mlr: "7605859_wss", search_page: "", search_refine: "", position_address: "", position_number: "", headdir_link: "", listing_link: "", listing_id: "", photo: "", video_pct: "", video_menu: "", link_name: "", link_attr: "", widget: "come-and-see-us-widget,form-widget,image-widget,text-widget"};
    if (!/[?&amp;]fb_xd_fragment/.test(window.location.search)) {
        try {
            utag.view(utag_data)
        } catch (e) {
        }
    }
    $(document).ready(function() {
        $("a").live("click", function() {
            uw_tracker(this)
        });
        $("input").click(function() {
            uw_tracker(this)
        });
        uw_detectClickForm()
    });
    $(document).ready(function() {
        $("#nav-one").dropmenu();
        resetEmailUs();
        resetSendToFriend();
        $("#submit_send_to_friend").click(function() {
            $("#send_to_friend_loaderCircle").show();
            setTimeout("sendSendToFriendForm()", 200)
        });
        $("#submit_email_us").click(function() {
            $("#email_us_loaderCircle").show();
            setTimeout("sendEmailUsForm()", 200)
        })
    });
   
    (function() {

        var po = document.createElement("script");
        po.type = "text/javascript";
        po.async = true;
        po.src = "https://apis.google.com/js/plusone.js";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(po, s)
    })();
    $(document).ready(function() {
        $("a[name=dummyLink]").click(function(e) {
            if (!e) {
                var e = window.event
            }
            e.cancelBubble = true;
            if (e.stopPropagation) {
                e.stopPropagation()
            }
            return false
        });
        $("a[name=external_links]").click(function(e) {
            if (!e) {
                var e = window.event
            }
            e.cancelBubble = true;
            if (e.stopPropagation) {
                e.stopPropagation()
            }
            return true
        });
        menu_init()
    });
    $(document).ready(function() {
        initForm("w_form_2")
    });
    $(document).ready(function() {
        initLegalForm()
    });
    $(window).load(function() {
        $(".anchor.htm").wssAnchor({highlight: true, scrollable: true})
    });



</script>

<?php get_header(); ?>
<?php /* Start loop */ ?>

<?php while (have_posts()) : the_post(); ?>


    <div class="body">
        <div id="head-wrapper">
            <?php // get_sidebar('firmoverview'); ?>
            <?php the_content(); ?>
        </div>



    <?php endwhile; // End the loop ?>


    <?php get_footer(); ?>
