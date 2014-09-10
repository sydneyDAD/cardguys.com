function uw_tracker(e) {
    if (!e) {
        return
    }
    var nn = e.nodeName;
    if (!(nn && nn.length)) {
        return
    }
    if (nn == "A") {
        uw_mlrUtag(e)
    } else {
        if (nn == "INPUT") {
            if (e.type == "button" || e.type == "submit") {
                uw_mlrUtag(e)
            }
        }
    }
}

function uw_mlr(e) {
    if (!e) {
        return
    }
    uw_mlrByStr(uw_getHook(e))
}

function uw_mlrByStr(o) {
    if (o && o.length) {
        utag.link({
            listing_link: utag_data.mlr + "|" + o + "_none"
        })
    }
}

function uw_utag(e) {
    if (!e) {
        return
    }
    uw_utagByStr(uw_getHook(e))
}

function uw_utagByStr(o) {
    if (o && o.length) {
        utag.link({
            link_name: o,
            link_attr1: "alt"
        })
    }
}

function uw_mlrUtag(e) {
    if (!e) {
        return
    }
    uw_mlrUtagByStr(uw_getHook(e))
}

function uw_mlrUtagByStr(o) {
    if (o && o.length) {
        utag.link({
            link_name: o,
            link_attr1: "alt",
            listing_link: utag_data.mlr + "|" + o + "_none"
        })
    }
}

function uw_getHook(e) {
    if (!e) {
        return
    }
    var o;
    o = $(e).attr("name");
    if (o && o.length) {
        return o
    } else {
        return ""
    }
}

function uw_firePageView() {
    try {
        utag.view(utag_data)
    } catch (e) {
    }
}

function uw_detectClickForm() {
    $('a[name$="_submit"]').each(function() {
        var n = $(this).attr("name");
        if (n && n.length) {
            if ("contact_submit" == n) {
                uw_mlrByStr("contact_start")
            } else {
                if ("appointment_submit" == n) {
                    uw_mlrByStr("appointment_start")
                }
            }
        }
    })
}

function lead_show_our_websites(url) {
    window.open(url)
}

function lead_print_page() {
    window.print()
}

function lead_bookmark_us(url, title) {
    var lbu_preview = "";
    if (window.location.pathname.indexOf("webrenderer/ws") > 0) {
        lbu_preview = " (To Builder: this command does not work in preview mode.)"
    }
    var browser = navigator.userAgent.toLowerCase();
    if (window.sidebar) {
        window.sidebar.addPanel(title, url, "")
    } else {
        if (window.external) {
            if (browser.indexOf("chrome") == -1) {
                window.external.AddFavorite(url, title)
            } else {
                if ($("html").attr("lang") == "fr") {
                    alert("S'il vous plaît appuyez sur CTRL+D (ou Commande+D pour Mac) pour marquer cette page." + lbu_preview)
                } else {
                    alert("Please press CTRL+D (or Command+D for Mac) to bookmark this page." + lbu_preview)
                }
            }
        } else {
            if (browser.indexOf("webkit") != -1) {
                if ($("html").attr("lang") == "fr") {
                    alert("S'il vous plaît appuyez sur CTRL+B (ou Commande+D sous Mac) pour marquer cette page." + lbu_preview)
                } else {
                    alert("Please press CTRL+B (or Command+D for Mac) to bookmark this page." + lbu_preview)
                }
            } else {
                if (window.opera && window.print) {
                    var elem = document.createElement("a");
                    elem.setAttribute("href", url);
                    elem.setAttribute("title", title);
                    elem.setAttribute("rel", "sidebar");
                    elem.click()
                }
            }
        }
    }
}

function lead_subscribe_newsletter() {
    var email = document.getElementById("lead_news_subscriber_id").value;
    if (email == null || email == "") {
        alert("subscriber email is required");
        return
    }
    var url = "mailto:merchantemail@merchantshop.com?subject=Subscribe to news letter&body=Email is : " + email;
    document.location = url
}

function newPopup(url) {
    popupWindow = window.open(url, "popUpWindow", "height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes")
}

function fbs_click(urlWeb, desc) {
    var u = urlWeb;
    var t = desc;
    window.open("http://www.facebook.com/sharer.php?u=" + encodeURIComponent(u) + "&t=" + encodeURIComponent(t), "sharer", "toolbar=0,status=0,width=450,height=450");
    return false
}

function twitter_click(tweetValue) {
    tweet = tweetValue;
    window.open("http://twitter.com/home?status=" + encodeURIComponent(tweet));
    return false
}

function enable(e) {
    $(e).removeAttr("disabled")
}

function disable(e) {
    $(e).attr("disabled", "disabled")
}

function clear(e) {
    $(e).val("")
}

function isRequired(e) {
    return $(e).hasClass("required")
}

function isError(response) {
    return $(response).find("code").text() != "OK"
}

function gatherText(response) {
    var str = "";
    $(response).find("message").each(function() {
        if (str.length > 0) {
            str += "<br/>"
        }
        str += $(this).text()
    });
    return str
}

function convertFormToXml(e) {
    var xmltmp = "<xmlFormInput>";
    $("#" + e + " input").each(function() {
        if (this.type != "button" && this.type != "reset" && !($(this).hasClass("unsent"))) {
            var value = ag_xmlEncode($(this).val()());
            var name = ag_xmlEncode($(this).attr("name"));
            xmltmp = xmltmp.concat('<field name="' + name + '" required="' + isRequired(this) + '" value="' + value + '" />')
        }
    });
    $("#" + e + " textarea").each(function() {
        var value = ag_xmlEncode($(this).val());
        var name = ag_xmlEncode($(this).attr("name"));
        xmltmp = xmltmp.concat('<field name="' + name + '" required="' + isRequired(this) + '" value="' + value + '" />')
    });
    return xmltmp.concat("</xmlFormInput>")
}

function ag_xmlEncode(e) {
    return e.replace(/\"/g, "&quot;").replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;")
}

function sendEmailUsForm() {
    var inputVal = payloadEmailUs();
    if (!inputVal) {
        errorEmailUs();
        activateEmailUs()
    } else {
        try {
            $.ajax({
                async: false,
                cache: false,
                url: "/form/ws/sendwebform/contactus",
                type: "POST",
                data: inputVal,
                dataType: "text/xml",
                scriptCharset: "utf-8",
                contentType: "application/x-www-form-urlencoded;charset=UTF-8",
                success: function(data, status, req) {
                    successEmailUs(req.responseXML)
                },
                error: function(req, status, error) {
                    successEmailUs(req.responseXML)
                }
            })
        } catch (ex) {
            errorEmailUs()
        } finally {
            activateEmailUs()
        }
    }
}

function sendSendToFriendForm() {
    var inputVal = payloadSendToFriend();
    if (!inputVal) {
        errorSendToFriend();
        activateSendToFriend()
    } else {
        try {
            $.ajax({
                async: false,
                cache: false,
                url: "/form/ws/sendwebform/contactus",
                data: inputVal,
                type: "POST",
                dataType: "text/xml",
                scriptCharset: "utf-8",
                contentType: "application/x-www-form-urlencoded;charset=UTF-8",
                success: function(data, status, req) {
                    successSendToFriend(req.responseXML)
                },
                error: function(req, status, error) {
                    successSendToFriend(req.responseXML)
                }
            })
        } catch (ex) {
            errorSendToFriend()
        } finally {
            activateSendToFriend()
        }
    }
}

function payloadEmailUs() {
    var src = $("#form_email_us input[name='merchant_xml_file']").val();
    var tmpStr;
    try {
        $.ajax({
            type: "GET",
            async: false,
            url: src,
            dataType: "text",
            success: function(data) {
                tmpStr = data
            }
        })
    } catch (ex) {
        tmpStr = ""
    }
    if (!tmpStr) {
        return ""
    } else {
        return "&merchantAddresses=" + encodeURIComponent(tmpStr) + "&xmlFormInput=" + encodeURIComponent(convertFormToXml("form_email_us"))
    }
}

function payloadSendToFriend() {
    var src = $("#form_send_to_friend input[name='merchant_xml_file']").val();
    var tmpStr;
    try {
        $.ajax({
            type: "GET",
            async: false,
            url: src,
            dataType: "text",
            success: function(data) {
                tmpStr = data
            }
        })
    } catch (ex) {
        tmpStr = ""
    }
    if (!tmpStr) {
        return ""
    } else {
        return "&merchantAddresses=" + encodeURIComponent(tmpStr) + "&xmlFormInput=" + encodeURIComponent(convertFormToXml("form_send_to_friend"))
    }
}

function resetEmailUs() {
    $("#form_email_us").clearForm();
    activateEmailUs();
    $("#email_us_id").hide()
}

function resetSendToFriend() {
    $("#form_send_to_friend").clearForm();
    activateSendToFriend();
    $("#dialog_send_to_friend").hide()
}

function activateEmailUs() {
    enable('#form_email_us input[name="name"]');
    enable('#form_email_us input[name="email"]');
    enable('#form_email_us textarea[name="comment"]');
    enable("#submit_email_us");
    $("#email_us_loaderCircle").hide()
}

function activateSendToFriend() {
    enable('#form_send_to_friend input[name="name"]');
    enable('#form_send_to_friend input[name="email"]');
    enable('#form_send_to_friend input[name="email_friend"]');
    enable("#submit_send_to_friend");
    $("#send_to_friend_loaderCircle").hide()
}

function deactivateEmailUs() {
    disable('#form_email_us input[name="name"]');
    disable('#form_email_us input[name="email"]');
    disable('#form_email_us textarea[name="comment"]');
    disable("#submit_email_us");
    $("#email_us_loaderCircle").show()
}

function deactivateSendToFriend() {
    disable('#form_send_to_friend input[name="name"]');
    disable('#form_send_to_friend input[name="email"]');
    disable('#form_send_to_friend input[name="email_friend"]');
    disable("#submit_send_to_friend");
    $("#send_to_friend_loaderCircle").show()
}

function successEmailUs(response) {
    var err = isError(response);
    var msg = gatherText(response);
    var tma = "";
    if ($(response).find("code").text() == "TOO_MANY_ATTEMPT") {
        tma = " (rsp code: 0001)"
    }
    if (msg == "") {
        if ($("html").attr("lang") == "fr") {
            msg = (err ? "Le service n'est pas disponible pour l'instant." + tma : "Le courriel été envoyé.")
        } else {
            msg = (err ? "Service unavailable. Please try again later." + tma : "Email sent.")
        }
    }
    feedbackEmailUs(msg, err)
}

function successSendToFriend(response) {
    var err = isError(response);
    var msg = gatherText(response);
    var tma = "";
    if ($(response).find("code").text() == "TOO_MANY_ATTEMPT") {
        tma = " (rsp code: 0001)"
    }
    if (msg == "") {
        if ($("html").attr("lang") == "fr") {
            msg = (err ? "Le service n'est pas disponible pour l'instant." + tma : "Le courriel été envoyé.")
        } else {
            msg = (err ? "Service unavailable. Please try again later." + tma : "Email sent.")
        }
    }
    feedbackSendToFriend(msg, err)
}

function errorEmailUs() {
    if ($("html").attr("lang") == "fr") {
        feedbackEmailUs("Le service n'est pas disponible pour l'instant.", true)
    } else {
        feedbackEmailUs("Service unavailable. Please try again later.", true)
    }
}

function errorSendToFriend() {
    if ($("html").attr("lang") == "fr") {
        feedbackSendToFriend("Le service n'est pas disponible pour l'instant.", true)
    } else {
        feedbackSendToFriend("Service unavailable. Please try again later.", true)
    }
}

function feedbackEmailUs(msg, err) {
    if (err) {
        $("#form_email_us_message").html('<p class="ssoSmallMsgBox msgRed">' + msg + "</p>")
    } else {
        $("#form_email_us_message").html('<p class="ssoSmallMsgBox msgGreen">' + msg + "</p>");
        $("#form_email_us").clearForm()
    }
}

function feedbackSendToFriend(msg, err) {
    if (err) {
        $("#dialog_send_to_friend_message").html('<p class="ssoSmallMsgBox msgRed">' + msg + "</p>")
    } else {
        $("#dialog_send_to_friend_message").html('<p class="ssoSmallMsgBox msgGreen">' + msg + "</p>");
        $("#form_send_to_friend").clearForm()
    }
}
(function($) {
    $.fn.dropmenu = function(custom) {
        var defaults = {
            openAnimation: "fadeIn",
            closeAnimation: "slide",
            openClick: false,
            openSpeed: 300,
            closeSpeed: 300,
            closeDelay: 100,
            onHide: function() {
            },
            onHidden: function() {
            },
            onShow: function() {
            },
            onShown: function() {
            }
        };
        var settings = $.extend({}, defaults, custom);
        var menu = this;
        var currentPage = 0;
        var delayTimer = "";
        init();

        function init() {
            var items = menu.find(":has(li,div) > a").append('<span class="arrow2"></span>');
            $.each(items, function(i, val) {
                if (items.eq(i).parent().is("li")) {
                    items.eq(i).next().addClass("submenu").parent().addClass("haschildren")
                } else {
                    items.eq(i).parent().find("ul").show()
                }
            });
            if (settings.openClick) {
                menu.find(".submenu").css("display", "none");
                menu.find(":has(li,div) > a").parent().bind("mouseleave", handleHover).bind("mouseenter", function() {
                    window.clearInterval(delayTimer)
                });
                menu.find("a span.arrow").bind("click", handleHover)
            } else {
                menu.find(":has(li,div) > a").bind("mouseenter", handleHover).parent().bind("mouseleave", handleHover).bind("mouseenter", function() {
                    window.clearInterval(delayTimer)
                })
            }
        }

        function handleHover(e) {
            if (e.type == "mouseenter" || e.type == "click") {
                window.clearInterval(delayTimer);
                var current_submenu = $(e.target).parent().find(".submenu:not(:animated):not(.open)");
                if (current_submenu.html() == null) {
                    current_submenu = $(e.target).parent().next(".submenu:not(:animated):not(.open)")
                }
                if (current_submenu.html() != null) {
                    settings.onShow.call(current_submenu);
                    closeAllMenus();
                    current_submenu.prev().addClass("selected");
                    current_submenu.css("z-index", "90");
                    current_submenu.stop().hide();
                    openMenu(current_submenu)
                }
            }
            if (e.type == "mouseleave" || e.type == "mouseout") {
                current_submenu = $(e.target).parents(".submenu");
                if (current_submenu.length != 1) {
                    var current_submenu = $(e.target).parent().parent().find(".submenu");
                    if (current_submenu.html() == null) {
                        var current_submenu = $(e.target).parent().find(".submenu");
                        if (current_submenu.html() == null) {
                            var current_submenu = $(e.target).parent().parent().parent().find(".submenu")
                        }
                    }
                }
                if (current_submenu.html() != null) {
                    if (settings.closeDelay == 0) {
                        current_submenu.parent().find("a").removeClass("selected");
                        closeMenu(current_submenu)
                    } else {
                        window.clearInterval(delayTimer);
                        delayTimer = setInterval(function() {
                            window.clearInterval(delayTimer);
                            closeMenu(current_submenu)
                        }, settings.closeDelay)
                    }
                }
            }
        }

        function openMenu(object) {
            switch (settings.openAnimation) {
                case "slide":
                    openSlideAnimation(object);
                    break;
                case "fade":
                    openFadeAnimation(object);
                    break;
                default:
                    openSizeAnimation(object);
                    break
            }
        }

        function openSlideAnimation(object) {
            object.addClass("open").slideDown(settings.openSpeed, function() {
                settings.onShown.call(this)
            })
        }

        function openFadeAnimation(object) {
            object.addClass("open").fadeIn(settings.openSpeed, function() {
                settings.onShown.call(this)
            })
        }

        function openSizeAnimation(object) {
            object.addClass("open").show(settings.openSpeed, function() {
                settings.onShown.call(this)
            })
        }

        function closeMenu(object) {
            settings.onHide.call(object);
            switch (settings.closeAnimation) {
                case "slide":
                    closeSlideAnimation(object);
                    break;
                case "fade":
                    closeFadeAnimation(object);
                    break;
                default:
                    closeSizeAnimation(object);
                    break
            }
        }

        function closeSlideAnimation(object) {
            object.slideUp(settings.closeSpeed, closeCallback)
        }

        function closeFadeAnimation(object) {
            object.fadeOut(settings.closeSpeed, function() {
                $(this).removeClass("open");
                $(this).prev().removeClass("selected")
            })
        }

        function closeSizeAnimation(object) {
            object.hide(settings.closeSpeed, function() {
                $(this).removeClass("open");
                $(this).prev().removeClass("selected")
            })
        }

        function closeAllMenus() {
            var submenus = menu.find(".submenu.open");
            $.each(submenus, function(i, val) {
                $(submenus[i]).css("z-index", "1");
                closeMenu($(submenus[i]))
            })
        }

        function closeCallback(object) {
            $(this).removeClass("open");
            if ($(this).prev().attr("class") == "selected") {
                settings.onHidden.call(this)
            }
            $(this).prev().removeClass("selected")
        }
        return this
    }
})(jQuery);
$.fn.clearForm = function() {
    return this.each(function() {
        $(":input", this).each(function() {
            var type = this.type,
                    tag = this.tagName.toLowerCase();
            if (type == "text" || type == "password" || tag == "textarea") {
                this.value = ""
            } else {
                if (type == "checkbox" || type == "radio") {
                    this.checked = false
                } else {
                    if (tag == "select") {
                        this.selectedIndex = -1
                    }
                }
            }
        })
    })
};

function menu_init() {
    var ms2_br = $("#main-menu-wrapper").attr("borderRadius");
    var ms2_bs = $("#main-menu-wrapper").attr("borderSize");
    var ms2_bc = $("#main-menu-wrapper").attr("borderColor");
    var ms2_fs = $("#main-menu-wrapper").attr("fontSize");
    if (!(typeof ms2_fs === "undefined") && ms2_fs.length && ms2_fs > 0) {
        $("#menu_s2 li").css("font-size", ms2_fs + "px")
    }
    $("#menu_s2 > li").each(function(idx) {
        if ($(this).has("ul").length) {
            $(this).css("width", ($(this).width() + 5) + "px")
        }
        if (!($(this).hasClass("current"))) {
            $(this).addClass("reg")
        }
        if (idx > 0) {
            $(this).css("margin-left", "-1px")
        }
    });
    if ($("#main-menu-wrapper").attr("halign") == "right") {
        $("#menu_s2").css("right", "0")
    } else {
        if ($("#main-menu-wrapper").attr("halign") == "center") {
            $("#menu_s2").css("left", Math.round(((960 - $("#menu_s2").width()) / 2)) + "px")
        }
    }
    if ($("#main-menu-wrapper").attr("valign") == "bottom") {
        var b;
        var mm_i = $("#header-layout").height();
        b = 42 - mm_i;
        if (!(typeof ms2_bs === "undefined") && ms2_bs.length && ms2_bs >= 0) {
            b += ms2_bs * 2 - 2
        }
        if (!(typeof ms2_fs === "undefined") && ms2_fs.length && ms2_fs > 0) {
            b += ms2_fs - 14
        }
        $("#main-menu-wrapper").css("bottom", b + "px")
    } else {
        if ($("#social-network-bare").length) {
            $("#main-menu-wrapper").css("top", "35px")
        }
    }
    var outter = "";
    var inner = "";
    if (!(typeof ms2_br === "undefined") && ms2_br.length && ms2_br > 0) {
        outter = ms2_br;
        if (!(typeof ms2_bs === "undefined") && ms2_bs.length && ms2_bs > 0) {
            inner = ms2_br - (ms2_bs) - 1
        } else {
            inner = outter
        }
        $("#menu_s2").css("border-radius", outter + "px");
        $("#menu_s2").css("-webkit-border-radius", outter + "px");
        $("#menu_s2").css("-moz-border-radius", outter + "px");
        $("#menu_s2 > li:first > a").css("border-top-left-radius", inner + "px");
        $("#menu_s2 > li:first > a").css("border-bottom-left-radius", inner + "px");
        $("#menu_s2 > li:first > a").css("-webkit-border-top-left-radius", inner + "px");
        $("#menu_s2 > li:first > a").css("-webkit-border-bottom-left-radius", inner + "px");
        $("#menu_s2 > li:first > a").css("-moz-border-radius-topleft", inner + "px");
        $("#menu_s2 > li:first > a").css("-moz-border-radius-bottomleft", inner + "px");
        $("#menu_s2 > li:last > a").css("border-top-right-radius", inner + "px");
        $("#menu_s2 > li:last > a").css("border-bottom-right-radius", inner + "px");
        $("#menu_s2 > li:last > a").css("-webkit-border-top-right-radius", inner + "px");
        $("#menu_s2 > li:last > a").css("-webkit-border-bottom-right-radius", inner + "px");
        $("#menu_s2 > li:last > a").css("-moz-border-radius-bottomright", inner + "px");
        $("#menu_s2 > li:last > a").css("-moz-border-radius-bottomright", inner + "px")
    }
    if (!(typeof ms2_bs === "undefined") && ms2_bs.length) {
        if (ms2_bs == 0) {
            $("#menu_s2").css("border", "none")
        } else {
            if (ms2_bs > 0) {
                if (!(typeof ms2_bc === "undefined") && ms2_bc.length) {
                    $("#menu_s2").css("border", ms2_bs + "px solid " + ms2_bc)
                } else {
                    $("#menu_s2").css("border", ms2_bs + "px")
                }
            }
        }
    }
    $("#main-menu-wrapper").css("visibility", "visible");
    $("ul.#menu_s2").each(function() {
        $(this).find("li").has("ul").each(function() {
            $(this).addClass("has-menu");
            var a = $(this).children("a");
            $(a).append('<span class="menus2-arrow">&nbsp;</span>')
        })
    });
    $("ul.#menu_s2 li").hover(function() {
        $(this).data("site-header-title", $("#site-header").attr("title"));
        $("#site-header").removeAttr("title");
        $("#header-layout").removeAttr("title");
        $(this).find("ul:first").stop(true, true).fadeIn("fast");
        $(this).addClass("hover")
    }, function() {
        $(this).find("ul").stop(true, true).fadeOut("fast");
        $(this).removeClass("hover");
        var tmp = $(this).data("site-header-title");
        $("#site-header").attr("title", tmp);
        $("#header-layout").attr("title", tmp)
    })
}
(function($, document, window) {
    var defaults = {
        transition: "elastic",
        speed: 300,
        width: false,
        initialWidth: "200",
        innerWidth: false,
        maxWidth: false,
        height: false,
        initialHeight: "250",
        innerHeight: false,
        maxHeight: false,
        scalePhotos: true,
        scrolling: true,
        inline: false,
        html: false,
        iframe: false,
        fastIframe: true,
        photo: false,
        href: false,
        title: false,
        rel: false,
        opacity: 0.5,
        preloading: true,
        current: "image {current} of {total}",
        previous: "previous",
        next: "next",
        close: "close",
        open: false,
        returnFocus: true,
        loop: true,
        slideshow: false,
        slideshowAuto: true,
        slideshowSpeed: 2500,
        slideshowStart: "start slideshow",
        slideshowStop: "stop slideshow",
        onOpen: false,
        onLoad: false,
        onComplete: false,
        onCleanup: false,
        onClosed: false,
        overlayClose: true,
        escKey: true,
        arrowKey: true
    }, colorbox = "colorbox",
            prefix = "cbox",
            event_open = prefix + "_open",
            event_load = prefix + "_load",
            event_complete = prefix + "_complete",
            event_cleanup = prefix + "_cleanup",
            event_closed = prefix + "_closed",
            event_purge = prefix + "_purge",
            isIE = $.browser.msie && !$.support.opacity,
            isIE6 = isIE && $.browser.version < 7,
            event_ie6 = prefix + "_IE6",
            $overlay, $box, $wrap, $content, $topBorder, $leftBorder, $rightBorder, $bottomBorder, $related, $window, $loaded, $loadingBay, $loadingOverlay, $title, $current, $slideshow, $next, $prev, $close, $groupControls, settings = {}, interfaceHeight, interfaceWidth, loadedHeight, loadedWidth, element, index, photo, open, active, closing = false,
            publicMethod, boxElement = prefix + "Element";

    function $div(id, cssText) {
        var div = document.createElement("div");
        div.id = id ? prefix + id : false;
        div.style.cssText = cssText || false;
        return $(div)
    }

    function setSize(size, dimension) {
        dimension = dimension === "x" ? $window.width() : $window.height();
        return (typeof size === "string") ? Math.round((/%/.test(size) ? (dimension / 100) * parseInt(size, 10) : parseInt(size, 10))) : size
    }

    function isImage(url) {
        return settings.photo || /\.(gif|png|jpg|jpeg|bmp)(?:\?([^#]*))?(?:#(\.*))?$/i.test(url)
    }

    function process(settings) {
        for (var i in settings) {
            if ($.isFunction(settings[i]) && i.substring(0, 2) !== "on") {
                settings[i] = settings[i].call(element)
            }
        }
        settings.rel = settings.rel || element.rel || "nofollow";
        settings.href = $.trim(settings.href || $(element).attr("href"));
        settings.title = settings.title || element.title
    }

    function trigger(event, callback) {
        if (callback) {
            callback.call(element)
        }
        $.event.trigger(event)
    }

    function slideshow() {
        var timeOut, className = prefix + "Slideshow_",
                click = "click." + prefix,
                start, stop, clear;
        if (settings.slideshow && $related[1]) {
            start = function() {
                $slideshow.text(settings.slideshowStop).unbind(click).bind(event_complete, function() {
                    if (index < $related.length - 1 || settings.loop) {
                        timeOut = setTimeout(publicMethod.next, settings.slideshowSpeed)
                    }
                }).bind(event_load, function() {
                    clearTimeout(timeOut)
                }).one(click + " " + event_cleanup, stop);
                $box.removeClass(className + "off").addClass(className + "on");
                timeOut = setTimeout(publicMethod.next, settings.slideshowSpeed)
            };
            stop = function() {
                clearTimeout(timeOut);
                $slideshow.text(settings.slideshowStart).unbind([event_complete, event_load, event_cleanup, click].join(" ")).one(click, start);
                $box.removeClass(className + "on").addClass(className + "off")
            };
            if (settings.slideshowAuto) {
                start()
            } else {
                stop()
            }
        }
    }

    function launch(elem) {
        if (!closing) {
            element = elem;
            process($.extend(settings, $.data(element, colorbox)));
            $related = $(element);
            index = 0;
            if (settings.rel !== "nofollow") {
                $related = $("." + boxElement).filter(function() {
                    var relRelated = $.data(this, colorbox).rel || this.rel;
                    return (relRelated === settings.rel)
                });
                index = $related.index(element);
                if (index === -1) {
                    $related = $related.add(element);
                    index = $related.length - 1
                }
            }
            if (!open) {
                open = active = true;
                $box.show();
                if (settings.returnFocus) {
                    try {
                        element.blur();
                        $(element).one(event_closed, function() {
                            try {
                                this.focus()
                            } catch (e) {
                            }
                        })
                    } catch (e) {
                    }
                }
                $overlay.css({
                    opacity: +settings.opacity,
                    cursor: settings.overlayClose ? "pointer" : "auto"
                }).show();
                settings.w = setSize(settings.initialWidth, "x");
                settings.h = setSize(settings.initialHeight, "y");
                publicMethod.position(0);
                if (isIE6) {
                    $window.bind("resize." + event_ie6 + " scroll." + event_ie6, function() {
                        $overlay.css({
                            width: $window.width(),
                            height: $window.height(),
                            top: $window.scrollTop(),
                            left: $window.scrollLeft()
                        })
                    }).trigger("resize." + event_ie6)
                }
                trigger(event_open, settings.onOpen);
                $groupControls.add($title).hide();
                $close.html(settings.close).show()
            }
            publicMethod.load(true)
        }
    }
    publicMethod = $.fn[colorbox] = $[colorbox] = function(options, callback) {
        var $this = this,
                autoOpen;
        if (!$this[0] && $this.selector) {
            return $this
        }
        options = options || {};
        if (callback) {
            options.onComplete = callback
        }
        if (!$this[0] || $this.selector === undefined) {
            $this = $("<a/>");
            options.open = true
        }
        $this.each(function() {
            $.data(this, colorbox, $.extend({}, $.data(this, colorbox) || defaults, options));
            $(this).addClass(boxElement)
        });
        autoOpen = options.open;
        if ($.isFunction(autoOpen)) {
            autoOpen = autoOpen.call($this)
        }
        if (autoOpen) {
            launch($this[0])
        }
        return $this
    };
    publicMethod.init = function() {
        $window = $(window);
        $box = $div().attr({
            id: colorbox,
            "class": isIE ? prefix + (isIE6 ? "IE6" : "IE") : ""
        });
        $overlay = $div("Overlay", isIE6 ? "position:absolute" : "").hide();
        $wrap = $div("Wrapper");
        $content = $div("Content").append($loaded = $div("LoadedContent", "width:0; height:0; overflow:hidden"), $loadingOverlay = $div("LoadingOverlay").add($div("LoadingGraphic")), $title = $div("Title"), $current = $div("Current"), $next = $div("Next"), $prev = $div("Previous"), $slideshow = $div("Slideshow").bind(event_open, slideshow), $close = $div("Close"));
        $wrap.append($div().append($div("TopLeft"), $topBorder = $div("TopCenter"), $div("TopRight")), $div(false, "clear:left").append($leftBorder = $div("MiddleLeft"), $content, $rightBorder = $div("MiddleRight")), $div(false, "clear:left").append($div("BottomLeft"), $bottomBorder = $div("BottomCenter"), $div("BottomRight"))).children().children().css({
            "float": "left"
        });
        $loadingBay = $div(false, "position:absolute; width:9999px; visibility:hidden; display:none");
        $("body").prepend($overlay, $box.append($wrap, $loadingBay));
        $content.children().hover(function() {
            $(this).addClass("hover")
        }, function() {
            $(this).removeClass("hover")
        }).addClass("hover");
        interfaceHeight = $topBorder.height() + $bottomBorder.height() + $content.outerHeight(true) - $content.height();
        interfaceWidth = $leftBorder.width() + $rightBorder.width() + $content.outerWidth(true) - $content.width();
        loadedHeight = $loaded.outerHeight(true);
        loadedWidth = $loaded.outerWidth(true);
        $box.css({
            "padding-bottom": interfaceHeight,
            "padding-right": interfaceWidth
        }).hide();
        $next.click(function() {
            publicMethod.next()
        });
        $prev.click(function() {
            publicMethod.prev()
        });
        $close.click(function() {
            publicMethod.close()
        });
        $groupControls = $next.add($prev).add($current).add($slideshow);
        $content.children().removeClass("hover");
        $("." + boxElement).live("click", function(e) {
            if (!((e.button !== 0 && typeof e.button !== "undefined") || e.ctrlKey || e.shiftKey || e.altKey)) {
                e.preventDefault();
                launch(this)
            }
        });
        $overlay.click(function() {
            if (settings.overlayClose) {
                publicMethod.close()
            }
        });
        $(document).bind("keydown", function(e) {
            if (open && settings.escKey && e.keyCode === 27) {
                e.preventDefault();
                publicMethod.close()
            }
            if (open && settings.arrowKey && !active && $related[1]) {
                if (e.keyCode === 37 && (index || settings.loop)) {
                    e.preventDefault();
                    $prev.click()
                } else {
                    if (e.keyCode === 39 && (index < $related.length - 1 || settings.loop)) {
                        e.preventDefault();
                        $next.click()
                    }
                }
            }
        })
    };
    publicMethod.remove = function() {
        $box.add($overlay).remove();
        $("." + boxElement).die("click").removeData(colorbox).removeClass(boxElement)
    };
    publicMethod.position = function(speed, loadedCallback) {
        var animate_speed, posTop = Math.max(document.documentElement.clientHeight - settings.h - loadedHeight - interfaceHeight, 0) / 2 + $window.scrollTop(),
                posLeft = Math.max($window.width() - settings.w - loadedWidth - interfaceWidth, 0) / 2 + $window.scrollLeft();
        animate_speed = ($box.width() === settings.w + loadedWidth && $box.height() === settings.h + loadedHeight) ? 0 : speed;
        $wrap[0].style.width = $wrap[0].style.height = "9999px";

        function modalDimensions(that) {
            $topBorder[0].style.width = $bottomBorder[0].style.width = $content[0].style.width = that.style.width;
            $loadingOverlay[0].style.height = $loadingOverlay[1].style.height = $content[0].style.height = $leftBorder[0].style.height = $rightBorder[0].style.height = that.style.height
        }
        $box.dequeue().animate({
            width: settings.w + loadedWidth,
            height: settings.h + loadedHeight,
            top: posTop,
            left: posLeft
        }, {
            duration: animate_speed,
            complete: function() {
                modalDimensions(this);
                active = false;
                $wrap[0].style.width = (settings.w + loadedWidth + interfaceWidth) + "px";
                $wrap[0].style.height = (settings.h + loadedHeight + interfaceHeight) + "px";
                if (loadedCallback) {
                    loadedCallback()
                }
            },
            step: function() {
                modalDimensions(this)
            }
        })
    };
    publicMethod.resize = function(options) {
        if (open) {
            options = options || {};
            if (options.width) {
                settings.w = setSize(options.width, "x") - loadedWidth - interfaceWidth
            }
            if (options.innerWidth) {
                settings.w = setSize(options.innerWidth, "x")
            }
            $loaded.css({
                width: settings.w
            });
            if (options.height) {
                settings.h = setSize(options.height, "y") - loadedHeight - interfaceHeight
            }
            if (options.innerHeight) {
                settings.h = setSize(options.innerHeight, "y")
            }
            if (!options.innerHeight && !options.height) {
                var $child = $loaded.wrapInner("<div style='overflow:auto'></div>").children();
                settings.h = $child.height();
                $child.replaceWith($child.children())
            }
            $loaded.css({
                height: settings.h
            });
            publicMethod.position(settings.transition === "none" ? 0 : settings.speed)
        }
    };
    publicMethod.prep = function(object) {
        if (!open) {
            return
        }
        var speed = settings.transition === "none" ? 0 : settings.speed;
        $window.unbind("resize." + prefix);
        $loaded.remove();
        $loaded = $div("LoadedContent").html(object);

        function getWidth() {
            settings.w = settings.w || $loaded.width();
            settings.w = settings.mw && settings.mw < settings.w ? settings.mw : settings.w;
            return settings.w
        }

        function getHeight() {
            settings.h = settings.h || $loaded.height();
            settings.h = settings.mh && settings.mh < settings.h ? settings.mh : settings.h;
            return settings.h
        }
        $loaded.hide().appendTo($loadingBay.show()).css({
            width: getWidth(),
            overflow: settings.scrolling ? "auto" : "hidden"
        }).css({
            height: getHeight()
        }).prependTo($content);
        $loadingBay.hide();
        $(photo).css({
            "float": "none"
        });
        if (isIE6) {
            $("select").not($box.find("select")).filter(function() {
                return this.style.visibility !== "hidden"
            }).css({
                visibility: "hidden"
            }).one(event_cleanup, function() {
                this.style.visibility = "inherit"
            })
        }

        function setPosition(s) {
            publicMethod.position(s, function() {
                var prev, prevSrc, next, nextSrc, total = $related.length,
                        iframe, complete;
                if (!open) {
                    return
                }
                complete = function() {
                    $loadingOverlay.hide();
                    trigger(event_complete, settings.onComplete)
                };
                if (isIE) {
                    if (photo) {
                        $loaded.fadeIn(100)
                    }
                }
                $title.html(settings.title).add($loaded).show();
                if (total > 1) {
                    if (typeof settings.current === "string") {
                        $current.html(settings.current.replace(/\{current\}/, index + 1).replace(/\{total\}/, total)).show()
                    }
                    $next[(settings.loop || index < total - 1) ? "show" : "hide"]().html(settings.next);
                    $prev[(settings.loop || index) ? "show" : "hide"]().html(settings.previous);
                    prev = index ? $related[index - 1] : $related[total - 1];
                    next = index < total - 1 ? $related[index + 1] : $related[0];
                    if (settings.slideshow) {
                        $slideshow.show()
                    }
                    if (settings.preloading) {
                        nextSrc = $.data(next, colorbox).href || next.href;
                        prevSrc = $.data(prev, colorbox).href || prev.href;
                        nextSrc = $.isFunction(nextSrc) ? nextSrc.call(next) : nextSrc;
                        prevSrc = $.isFunction(prevSrc) ? prevSrc.call(prev) : prevSrc;
                        if (isImage(nextSrc)) {
                            $("<img/>")[0].src = nextSrc
                        }
                        if (isImage(prevSrc)) {
                            $("<img/>")[0].src = prevSrc
                        }
                    }
                } else {
                    $groupControls.hide()
                }
                if (settings.iframe) {
                    iframe = $("<iframe frameborder=0/>").addClass(prefix + "Iframe")[0];
                    if (settings.fastIframe) {
                        complete()
                    } else {
                        $(iframe).load(complete)
                    }
                    iframe.name = prefix + (+new Date());
                    iframe.src = settings.href;
                    if (!settings.scrolling) {
                        iframe.scrolling = "no"
                    }
                    if (isIE) {
                        iframe.allowTransparency = "true"
                    }
                    $(iframe).appendTo($loaded).one(event_purge, function() {
                        iframe.src = "//about:blank"
                    })
                } else {
                    complete()
                }
                if (settings.transition === "fade") {
                    $box.fadeTo(speed, 1, function() {
                        $box[0].style.filter = ""
                    })
                } else {
                    $box[0].style.filter = ""
                }
                $window.bind("resize." + prefix, function() {
                    publicMethod.position(0)
                })
            })
        }
        if (settings.transition === "fade") {
            $box.fadeTo(speed, 0, function() {
                setPosition(0)
            })
        } else {
            setPosition(speed)
        }
    };
    publicMethod.load = function(launched) {
        var href, setResize, prep = publicMethod.prep;
        active = true;
        photo = false;
        element = $related[index];
        if (!launched) {
            process($.extend(settings, $.data(element, colorbox)))
        }
        trigger(event_purge);
        trigger(event_load, settings.onLoad);
        settings.h = settings.height ? setSize(settings.height, "y") - loadedHeight - interfaceHeight : settings.innerHeight && setSize(settings.innerHeight, "y");
        settings.w = settings.width ? setSize(settings.width, "x") - loadedWidth - interfaceWidth : settings.innerWidth && setSize(settings.innerWidth, "x");
        settings.mw = settings.w;
        settings.mh = settings.h;
        if (settings.maxWidth) {
            settings.mw = setSize(settings.maxWidth, "x") - loadedWidth - interfaceWidth;
            settings.mw = settings.w && settings.w < settings.mw ? settings.w : settings.mw
        }
        if (settings.maxHeight) {
            settings.mh = setSize(settings.maxHeight, "y") - loadedHeight - interfaceHeight;
            settings.mh = settings.h && settings.h < settings.mh ? settings.h : settings.mh
        }
        href = settings.href;
        $loadingOverlay.show();
        if (settings.inline) {
            $div().hide().insertBefore($(href)[0]).one(event_purge, function() {
                $(this).replaceWith($loaded.children())
            });
            prep($(href))
        } else {
            if (settings.iframe) {
                prep(" ")
            } else {
                if (settings.html) {
                    prep(settings.html)
                } else {
                    if (isImage(href)) {
                        $(photo = new Image()).addClass(prefix + "Photo").error(function() {
                            settings.title = false;
                            prep($div("Error").text("This image could not be loaded"))
                        }).load(function() {
                            var percent;
                            photo.onload = null;
                            if (settings.scalePhotos) {
                                setResize = function() {
                                    photo.height -= photo.height * percent;
                                    photo.width -= photo.width * percent
                                };
                                if (settings.mw && photo.width > settings.mw) {
                                    percent = (photo.width - settings.mw) / photo.width;
                                    setResize()
                                }
                                if (settings.mh && photo.height > settings.mh) {
                                    percent = (photo.height - settings.mh) / photo.height;
                                    setResize()
                                }
                            }
                            if (settings.h) {
                                photo.style.marginTop = Math.max(settings.h - photo.height, 0) / 2 + "px"
                            }
                            if ($related[1] && (index < $related.length - 1 || settings.loop)) {
                                photo.style.cursor = "pointer";
                                photo.onclick = function() {
                                    publicMethod.next()
                                }
                            }
                            if (isIE) {
                                photo.style.msInterpolationMode = "bicubic"
                            }
                            setTimeout(function() {
                                prep(photo)
                            }, 1)
                        });
                        setTimeout(function() {
                            photo.src = href
                        }, 1)
                    } else {
                        if (href) {
                            $loadingBay.load(href, function(data, status, xhr) {
                                prep(status === "error" ? $div("Error").text("Request unsuccessful: " + xhr.statusText) : $(this).contents())
                            })
                        }
                    }
                }
            }
        }
    };
    publicMethod.next = function() {
        if (!active) {
            index = index < $related.length - 1 ? index + 1 : 0;
            publicMethod.load()
        }
    };
    publicMethod.prev = function() {
        if (!active) {
            index = index ? index - 1 : $related.length - 1;
            publicMethod.load()
        }
    };
    publicMethod.close = function() {
        if (open && !closing) {
            closing = true;
            open = false;
            trigger(event_cleanup, settings.onCleanup);
            $window.unbind("." + prefix + " ." + event_ie6);
            $overlay.fadeTo(200, 0);
            $box.stop().fadeTo(300, 0, function() {
                $box.add($overlay).css({
                    opacity: 1,
                    cursor: "auto"
                }).hide();
                trigger(event_purge);
                $loaded.remove();
                setTimeout(function() {
                    closing = false;
                    trigger(event_closed, settings.onClosed)
                }, 1)
            })
        }
    };
    publicMethod.element = function() {
        return $(element)
    };
    publicMethod.settings = defaults;
    $(publicMethod.init)
}(jQuery, document, this));
var swfobject = function() {
    var D = "undefined",
            r = "object",
            S = "Shockwave Flash",
            W = "ShockwaveFlash.ShockwaveFlash",
            q = "application/x-shockwave-flash",
            R = "SWFObjectExprInst",
            x = "onreadystatechange",
            O = window,
            j = document,
            t = navigator,
            T = false,
            U = [h],
            o = [],
            N = [],
            I = [],
            l, Q, E, B, J = false,
            a = false,
            n, G, m = true,
            M = function() {
        var aa = typeof j.getElementById != D && typeof j.getElementsByTagName != D && typeof j.createElement != D,
                ah = t.userAgent.toLowerCase(),
                Y = t.platform.toLowerCase(),
                ae = Y ? /win/.test(Y) : /win/.test(ah),
                ac = Y ? /mac/.test(Y) : /mac/.test(ah),
                af = /webkit/.test(ah) ? parseFloat(ah.replace(/^.*webkit\/(\d+(\.\d+)?).*$/, "$1")) : false,
                X = !+"\v1",
                ag = [0, 0, 0],
                ab = null;
        if (typeof t.plugins != D && typeof t.plugins[S] == r) {
            ab = t.plugins[S].description;
            if (ab && !(typeof t.mimeTypes != D && t.mimeTypes[q] && !t.mimeTypes[q].enabledPlugin)) {
                T = true;
                X = false;
                ab = ab.replace(/^.*\s+(\S+\s+\S+$)/, "$1");
                ag[0] = parseInt(ab.replace(/^(.*)\..*$/, "$1"), 10);
                ag[1] = parseInt(ab.replace(/^.*\.(.*)\s.*$/, "$1"), 10);
                ag[2] = /[a-zA-Z]/.test(ab) ? parseInt(ab.replace(/^.*[a-zA-Z]+(.*)$/, "$1"), 10) : 0
            }
        } else {
            if (typeof O.ActiveXObject != D) {
                try {
                    var ad = new ActiveXObject(W);
                    if (ad) {
                        ab = ad.GetVariable("$version");
                        if (ab) {
                            X = true;
                            ab = ab.split(" ")[1].split(",");
                            ag = [parseInt(ab[0], 10), parseInt(ab[1], 10), parseInt(ab[2], 10)]
                        }
                    }
                } catch (Z) {
                }
            }
        }
        return {
            w3: aa,
            pv: ag,
            wk: af,
            ie: X,
            win: ae,
            mac: ac
        }
    }(),
            k = function() {
        if (!M.w3) {
            return
        }
        if ((typeof j.readyState != D && j.readyState == "complete") || (typeof j.readyState == D && (j.getElementsByTagName("body")[0] || j.body))) {
            f()
        }
        if (!J) {
            if (typeof j.addEventListener != D) {
                j.addEventListener("DOMContentLoaded", f, false)
            }
            if (M.ie && M.win) {
                j.attachEvent(x, function() {
                    if (j.readyState == "complete") {
                        j.detachEvent(x, arguments.callee);
                        f()
                    }
                });
                if (O == top) {
                    (function() {
                        if (J) {
                            return
                        }
                        try {
                            j.documentElement.doScroll("left")
                        } catch (X) {
                            setTimeout(arguments.callee, 0);
                            return
                        }
                        f()
                    })()
                }
            }
            if (M.wk) {
                (function() {
                    if (J) {
                        return
                    }
                    if (!/loaded|complete/.test(j.readyState)) {
                        setTimeout(arguments.callee, 0);
                        return
                    }
                    f()
                })()
            }
            s(f)
        }
    }();

    function f() {
        if (J) {
            return
        }
        try {
            var Z = j.getElementsByTagName("body")[0].appendChild(C("span"));
            Z.parentNode.removeChild(Z)
        } catch (aa) {
            return
        }
        J = true;
        var X = U.length;
        for (var Y = 0; Y < X; Y++) {
            U[Y]()
        }
    }

    function K(X) {
        if (J) {
            X()
        } else {
            U[U.length] = X
        }
    }

    function s(Y) {
        if (typeof O.addEventListener != D) {
            O.addEventListener("load", Y, false)
        } else {
            if (typeof j.addEventListener != D) {
                j.addEventListener("load", Y, false)
            } else {
                if (typeof O.attachEvent != D) {
                    i(O, "onload", Y)
                } else {
                    if (typeof O.onload == "function") {
                        var X = O.onload;
                        O.onload = function() {
                            X();
                            Y()
                        }
                    } else {
                        O.onload = Y
                    }
                }
            }
        }
    }

    function h() {
        if (T) {
            V()
        } else {
            H()
        }
    }

    function V() {
        var X = j.getElementsByTagName("body")[0];
        var aa = C(r);
        aa.setAttribute("type", q);
        var Z = X.appendChild(aa);
        if (Z) {
            var Y = 0;
            (function() {
                if (typeof Z.GetVariable != D) {
                    var ab = Z.GetVariable("$version");
                    if (ab) {
                        ab = ab.split(" ")[1].split(",");
                        M.pv = [parseInt(ab[0], 10), parseInt(ab[1], 10), parseInt(ab[2], 10)]
                    }
                } else {
                    if (Y < 10) {
                        Y++;
                        setTimeout(arguments.callee, 10);
                        return
                    }
                }
                X.removeChild(aa);
                Z = null;
                H()
            })()
        } else {
            H()
        }
    }

    function H() {
        var ag = o.length;
        if (ag > 0) {
            for (var af = 0; af < ag; af++) {
                var Y = o[af].id;
                var ab = o[af].callbackFn;
                var aa = {
                    success: false,
                    id: Y
                };
                if (M.pv[0] > 0) {
                    var ae = c(Y);
                    if (ae) {
                        if (F(o[af].swfVersion) && !(M.wk && M.wk < 312)) {
                            w(Y, true);
                            if (ab) {
                                aa.success = true;
                                aa.ref = z(Y);
                                ab(aa)
                            }
                        } else {
                            if (o[af].expressInstall && A()) {
                                var ai = {};
                                ai.data = o[af].expressInstall;
                                ai.width = ae.getAttribute("width") || "0";
                                ai.height = ae.getAttribute("height") || "0";
                                if (ae.getAttribute("class")) {
                                    ai.styleclass = ae.getAttribute("class")
                                }
                                if (ae.getAttribute("align")) {
                                    ai.align = ae.getAttribute("align")
                                }
                                var ah = {};
                                var X = ae.getElementsByTagName("param");
                                var ac = X.length;
                                for (var ad = 0; ad < ac; ad++) {
                                    if (X[ad].getAttribute("name").toLowerCase() != "movie") {
                                        ah[X[ad].getAttribute("name")] = X[ad].getAttribute("value")
                                    }
                                }
                                P(ai, ah, Y, ab)
                            } else {
                                p(ae);
                                if (ab) {
                                    ab(aa)
                                }
                            }
                        }
                    }
                } else {
                    w(Y, true);
                    if (ab) {
                        var Z = z(Y);
                        if (Z && typeof Z.SetVariable != D) {
                            aa.success = true;
                            aa.ref = Z
                        }
                        ab(aa)
                    }
                }
            }
        }
    }

    function z(aa) {
        var X = null;
        var Y = c(aa);
        if (Y && Y.nodeName == "OBJECT") {
            if (typeof Y.SetVariable != D) {
                X = Y
            } else {
                var Z = Y.getElementsByTagName(r)[0];
                if (Z) {
                    X = Z
                }
            }
        }
        return X
    }

    function A() {
        return !a && F("6.0.65") && (M.win || M.mac) && !(M.wk && M.wk < 312)
    }

    function P(aa, ab, X, Z) {
        a = true;
        E = Z || null;
        B = {
            success: false,
            id: X
        };
        var ae = c(X);
        if (ae) {
            if (ae.nodeName == "OBJECT") {
                l = g(ae);
                Q = null
            } else {
                l = ae;
                Q = X
            }
            aa.id = R;
            if (typeof aa.width == D || (!/%$/.test(aa.width) && parseInt(aa.width, 10) < 310)) {
                aa.width = "310"
            }
            if (typeof aa.height == D || (!/%$/.test(aa.height) && parseInt(aa.height, 10) < 137)) {
                aa.height = "137"
            }
            j.title = j.title.slice(0, 47) + " - Flash Player Installation";
            var ad = M.ie && M.win ? "ActiveX" : "PlugIn",
                    ac = "MMredirectURL=" + O.location.toString().replace(/&/g, "%26") + "&MMplayerType=" + ad + "&MMdoctitle=" + j.title;
            if (typeof ab.flashvars != D) {
                ab.flashvars += "&" + ac
            } else {
                ab.flashvars = ac
            }
            if (M.ie && M.win && ae.readyState != 4) {
                var Y = C("div");
                X += "SWFObjectNew";
                Y.setAttribute("id", X);
                ae.parentNode.insertBefore(Y, ae);
                ae.style.display = "none";
                (function() {
                    if (ae.readyState == 4) {
                        ae.parentNode.removeChild(ae)
                    } else {
                        setTimeout(arguments.callee, 10)
                    }
                })()
            }
            u(aa, ab, X)
        }
    }

    function p(Y) {
        if (M.ie && M.win && Y.readyState != 4) {
            var X = C("div");
            Y.parentNode.insertBefore(X, Y);
            X.parentNode.replaceChild(g(Y), X);
            Y.style.display = "none";
            (function() {
                if (Y.readyState == 4) {
                    Y.parentNode.removeChild(Y)
                } else {
                    setTimeout(arguments.callee, 10)
                }
            })()
        } else {
            Y.parentNode.replaceChild(g(Y), Y)
        }
    }

    function g(ab) {
        var aa = C("div");
        if (M.win && M.ie) {
            aa.innerHTML = ab.innerHTML
        } else {
            var Y = ab.getElementsByTagName(r)[0];
            if (Y) {
                var ad = Y.childNodes;
                if (ad) {
                    var X = ad.length;
                    for (var Z = 0; Z < X; Z++) {
                        if (!(ad[Z].nodeType == 1 && ad[Z].nodeName == "PARAM") && !(ad[Z].nodeType == 8)) {
                            aa.appendChild(ad[Z].cloneNode(true))
                        }
                    }
                }
            }
        }
        return aa
    }

    function u(ai, ag, Y) {
        var X, aa = c(Y);
        if (M.wk && M.wk < 312) {
            return X
        }
        if (aa) {
            if (typeof ai.id == D) {
                ai.id = Y
            }
            if (M.ie && M.win) {
                var ah = "";
                for (var ae in ai) {
                    if (ai[ae] != Object.prototype[ae]) {
                        if (ae.toLowerCase() == "data") {
                            ag.movie = ai[ae]
                        } else {
                            if (ae.toLowerCase() == "styleclass") {
                                ah += ' class="' + ai[ae] + '"'
                            } else {
                                if (ae.toLowerCase() != "classid") {
                                    ah += " " + ae + '="' + ai[ae] + '"'
                                }
                            }
                        }
                    }
                }
                var af = "";
                for (var ad in ag) {
                    if (ag[ad] != Object.prototype[ad]) {
                        af += '<param name="' + ad + '" value="' + ag[ad] + '" />'
                    }
                }
                aa.outerHTML = '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"' + ah + ">" + af + "</object>";
                N[N.length] = ai.id;
                X = c(ai.id)
            } else {
                var Z = C(r);
                Z.setAttribute("type", q);
                for (var ac in ai) {
                    if (ai[ac] != Object.prototype[ac]) {
                        if (ac.toLowerCase() == "styleclass") {
                            Z.setAttribute("class", ai[ac])
                        } else {
                            if (ac.toLowerCase() != "classid") {
                                Z.setAttribute(ac, ai[ac])
                            }
                        }
                    }
                }
                for (var ab in ag) {
                    if (ag[ab] != Object.prototype[ab] && ab.toLowerCase() != "movie") {
                        e(Z, ab, ag[ab])
                    }
                }
                aa.parentNode.replaceChild(Z, aa);
                X = Z
            }
        }
        return X
    }

    function e(Z, X, Y) {
        var aa = C("param");
        aa.setAttribute("name", X);
        aa.setAttribute("value", Y);
        Z.appendChild(aa)
    }

    function y(Y) {
        var X = c(Y);
        if (X && X.nodeName == "OBJECT") {
            if (M.ie && M.win) {
                X.style.display = "none";
                (function() {
                    if (X.readyState == 4) {
                        b(Y)
                    } else {
                        setTimeout(arguments.callee, 10)
                    }
                })()
            } else {
                X.parentNode.removeChild(X)
            }
        }
    }

    function b(Z) {
        var Y = c(Z);
        if (Y) {
            for (var X in Y) {
                if (typeof Y[X] == "function") {
                    Y[X] = null
                }
            }
            Y.parentNode.removeChild(Y)
        }
    }

    function c(Z) {
        var X = null;
        try {
            X = j.getElementById(Z)
        } catch (Y) {
        }
        return X
    }

    function C(X) {
        return j.createElement(X)
    }

    function i(Z, X, Y) {
        Z.attachEvent(X, Y);
        I[I.length] = [Z, X, Y]
    }

    function F(Z) {
        var Y = M.pv,
                X = Z.split(".");
        X[0] = parseInt(X[0], 10);
        X[1] = parseInt(X[1], 10) || 0;
        X[2] = parseInt(X[2], 10) || 0;
        return (Y[0] > X[0] || (Y[0] == X[0] && Y[1] > X[1]) || (Y[0] == X[0] && Y[1] == X[1] && Y[2] >= X[2])) ? true : false
    }

    function v(ac, Y, ad, ab) {
        if (M.ie && M.mac) {
            return
        }
        var aa = j.getElementsByTagName("head")[0];
        if (!aa) {
            return
        }
        var X = (ad && typeof ad == "string") ? ad : "screen";
        if (ab) {
            n = null;
            G = null
        }
        if (!n || G != X) {
            var Z = C("style");
            Z.setAttribute("type", "text/css");
            Z.setAttribute("media", X);
            n = aa.appendChild(Z);
            if (M.ie && M.win && typeof j.styleSheets != D && j.styleSheets.length > 0) {
                n = j.styleSheets[j.styleSheets.length - 1]
            }
            G = X
        }
        if (M.ie && M.win) {
            if (n && typeof n.addRule == r) {
                n.addRule(ac, Y)
            }
        } else {
            if (n && typeof j.createTextNode != D) {
                n.appendChild(j.createTextNode(ac + " {" + Y + "}"))
            }
        }
    }

    function w(Z, X) {
        if (!m) {
            return
        }
        var Y = X ? "visible" : "hidden";
        if (J && c(Z)) {
            c(Z).style.visibility = Y
        } else {
            v("#" + Z, "visibility:" + Y)
        }
    }

    function L(Y) {
        var Z = /[\\\"<>\.;]/;
        var X = Z.exec(Y) != null;
        return X && typeof encodeURIComponent != D ? encodeURIComponent(Y) : Y
    }
    var d = function() {
        if (M.ie && M.win) {
            window.attachEvent("onunload", function() {
                var ac = I.length;
                for (var ab = 0; ab < ac; ab++) {
                    I[ab][0].detachEvent(I[ab][1], I[ab][2])
                }
                var Z = N.length;
                for (var aa = 0; aa < Z; aa++) {
                    y(N[aa])
                }
                for (var Y in M) {
                    M[Y] = null
                }
                M = null;
                for (var X in swfobject) {
                    swfobject[X] = null
                }
                swfobject = null
            })
        }
    }();
    return {
        registerObject: function(ab, X, aa, Z) {
            if (M.w3 && ab && X) {
                var Y = {};
                Y.id = ab;
                Y.swfVersion = X;
                Y.expressInstall = aa;
                Y.callbackFn = Z;
                o[o.length] = Y;
                w(ab, false)
            } else {
                if (Z) {
                    Z({
                        success: false,
                        id: ab
                    })
                }
            }
        },
        getObjectById: function(X) {
            if (M.w3) {
                return z(X)
            }
        },
        embedSWF: function(ab, ah, ae, ag, Y, aa, Z, ad, af, ac) {
            var X = {
                success: false,
                id: ah
            };
            if (M.w3 && !(M.wk && M.wk < 312) && ab && ah && ae && ag && Y) {
                w(ah, false);
                K(function() {
                    ae += "";
                    ag += "";
                    var aj = {};
                    if (af && typeof af === r) {
                        for (var al in af) {
                            aj[al] = af[al]
                        }
                    }
                    aj.data = ab;
                    aj.width = ae;
                    aj.height = ag;
                    var am = {};
                    if (ad && typeof ad === r) {
                        for (var ak in ad) {
                            am[ak] = ad[ak]
                        }
                    }
                    if (Z && typeof Z === r) {
                        for (var ai in Z) {
                            if (typeof am.flashvars != D) {
                                am.flashvars += "&" + ai + "=" + Z[ai]
                            } else {
                                am.flashvars = ai + "=" + Z[ai]
                            }
                        }
                    }
                    if (F(Y)) {
                        var an = u(aj, am, ah);
                        if (aj.id == ah) {
                            w(ah, true)
                        }
                        X.success = true;
                        X.ref = an
                    } else {
                        if (aa && A()) {
                            aj.data = aa;
                            P(aj, am, ah, ac);
                            return
                        } else {
                            w(ah, true)
                        }
                    }
                    if (ac) {
                        ac(X)
                    }
                })
            } else {
                if (ac) {
                    ac(X)
                }
            }
        },
        switchOffAutoHideShow: function() {
            m = false
        },
        ua: M,
        getFlashPlayerVersion: function() {
            return {
                major: M.pv[0],
                minor: M.pv[1],
                release: M.pv[2]
            }
        },
        hasFlashPlayerVersion: F,
        createSWF: function(Z, Y, X) {
            if (M.w3) {
                return u(Z, Y, X)
            } else {
                return undefined
            }
        },
        showExpressInstall: function(Z, aa, X, Y) {
            if (M.w3 && A()) {
                P(Z, aa, X, Y)
            }
        },
        removeSWF: function(X) {
            if (M.w3) {
                y(X)
            }
        },
        createCSS: function(aa, Z, Y, X) {
            if (M.w3) {
                v(aa, Z, Y, X)
            }
        },
        addDomLoadEvent: K,
        addLoadEvent: s,
        getQueryParamValue: function(aa) {
            var Z = j.location.search || j.location.hash;
            if (Z) {
                if (/\?/.test(Z)) {
                    Z = Z.split("?")[1]
                }
                if (aa == null) {
                    return L(Z)
                }
                var Y = Z.split("&");
                for (var X = 0; X < Y.length; X++) {
                    if (Y[X].substring(0, Y[X].indexOf("=")) == aa) {
                        return L(Y[X].substring((Y[X].indexOf("=") + 1)))
                    }
                }
            }
            return ""
        },
        expressInstallCallback: function() {
            if (a) {
                var X = c(R);
                if (X && l) {
                    X.parentNode.replaceChild(l, X);
                    if (Q) {
                        w(Q, true);
                        if (M.ie && M.win) {
                            l.style.display = "block"
                        }
                    }
                    if (E) {
                        E(B)
                    }
                }
                a = false
            }
        }
    }
}();
(function($) {
    $.fn.dcAccordion = function(options) {
        var defaults = {
            position: "left",
            classParent: "sm-parent",
            classActive: "accordionActive",
            classArrow: "sm-arrow",
            classCount: "sm-count",
            classExpand: "sm-current-parent",
            autoClose: true,
            speed: 250
        };
        var options = $.extend(defaults, options);
        this.each(function(options) {
            var obj = this;
            $objLinks = $("li > a", obj);
            $objSub = $("li > ul", obj);
            $objArrow = $(".arrow-wrapper", obj);
            classActive = defaults.classActive;
            setUpAccordion();
            var currPage = $(".active > a", obj);
            $(currPage).addClass(classActive)




            resetAccordion();
            $(".side-menu .active:not(:last)").removeClass("active")





            $objLinks.click(function(e) {
                $activeLi = $(this).parent("li");
                $parentsLi = $activeLi.parents("li");
                $parentsUl = $activeLi.parents("ul");
                if ($(this).siblings("ul").length > 0) {
                    var w = $(this).parent("li").width();
                    var h = $(this).height();
                    var x = e.pageX - this.offsetLeft;
                    var y = e.pageY - this.offsetTop;
                    if (("left" == defaults.position && x > w - 30 && y > h - 10) || ("right" == defaults.position && x < 30 && y > h - 10)) {
                        e.preventDefault();

                        if ($("> ul", $activeLi).is(":visible")) {

                            $("ul", $activeLi).slideUp(defaults.speed, function() {
                                $(".side-menu a.last-item").removeClass("last-item");
                                $(".side-menu a:visible").last().addClass("last-item");
                                $("a", $activeLi).removeClass(classActive);
                                if ($(this).hasClass("root")) {

                                    $(this).addClass("root-close")
                                }
                            })
                        } else {
                            $(".side-menu a.last-item").removeClass("last-item");
                            $(this).siblings("ul").slideToggle(defaults.speed, function() {

                                $(".side-menu a:visible").last().addClass("last-item")
                            });
                            $("> a", $activeLi).addClass(classActive);
                            if ($(this).hasClass("root")) {
                                $(this).removeClass("root-close")
                            }
                        }
                    }
                }
            });

            function setUpAccordion() {
                $arrow = '<div class="arrow-wrapper"><span class="' + defaults.classArrow + '"></span></div>';
                var classParentLi = defaults.classParent + "-li";
                $objSub.show();
                $("li", obj).each(function() {
                    if ($("> ul", this).length > 0) {
                        $(this).addClass(classParentLi);
                        $("> a", this).addClass(defaults.classParent).append($arrow)
                    }
                });
                $objSub.hide()
            }

            function resetAccordion() {
                $objSub.hide();
                var $parentsLi = $("a." + classActive, obj).parents("li");
                $("> a", $parentsLi).addClass(classActive);
                $allActiveLi = $("a." + classActive, obj);
                $($allActiveLi).siblings("ul").show();
                $(".side-menu a.last-item").removeClass("last-item");
                $(".side-menu a:visible").last().addClass("last-item")

            }

        })
    }

})(jQuery);


$(document).ready(function() {
    $("#submit_legal_form").click(function() {
        setTimeout("sendLegalForm('legal_form')", 500)
    })
});

function sendLegalForm(e) {
    var xmlData = "&xmlFormInput=" + encodeURIComponent(convertFormToXml(e));
    try {
        $.ajax({
            async: false,
            cache: false,
            url: "/form/ws/sendwebform/legal",
            type: "POST",
            data: xmlData,
            dataType: "text/xml",
            success: function(data, status, req) {
                successLegalForm(req.responseXML, e)
            },
            error: function(req, status, error) {
                successLegalForm(req.responseXML, e)
            }
        })
    } catch (ex) {
        errorLegalForm(e)
    }
}

function successLegalForm(response, e) {
    var err = isError(response);
    var msg = gatherText(response);
    var tma = "";
    if ($(response).find("code").text() == "TOO_MANY_ATTEMPT") {
        tma = " (rsp code: 0001)"
    }
    if (msg == "") {
        if ($("html").attr("lang") == "fr") {
            msg = (err ? "Le service n'est pas disponible pour l'instant." + tma : "Le courriel été envoyé.")
        } else {
            msg = (err ? "Service unavailable. Please try again later." + tma : "Email sent.")
        }
    }
    feedbackLegalForm(msg, err, e)
}

function errorLegalForm(e) {
    if ($("html").attr("lang") == "fr") {
        feedbackLegalForm("Le service n'est pas disponible pour l'instant.", true, e)
    } else {
        feedbackLegalForm("Service unavailable. Please try again later.", true, e)
    }
}

function feedbackLegalForm(msg, err, e) {
    if (err) {
        $("#error_message").html('<span style="color:red;">' + msg + "</span>")
    } else {
        $("#error_message").html('<span style="color:green;">' + msg + "</span>");
        confirm('<span style="color:green;">' + msg + "</span>")
    }
}

function confirm(message) {
    $("#confirm").modal({
        closeHTML: "<a href='index.htm#' title='Close' class='modal-close'>x</a>",
        position: ["20%", ],
        overlayId: "confirm-overlay",
        containerId: "confirm-container",
        onShow: function(dialog) {
            var modal = this;
            $(".message", dialog.data[0]).append(message);
            $(".no", dialog.data[0]).click(function() {
                window.close()
            })
        }
    })
}

function convertFormToXml(e) {
    var xmltmp = "<xmlFormInput>";
    xmltmp = xmltmp.concat('<field name="lang" required="true" value="' + $("html").attr("lang") + '" />');
    $("#" + e + " input").each(function() {
        if (this.type == "radio" && !($(this).hasClass("unsent"))) {
            if (this.checked) {
                var value = yl_xmlEncode($(this).val());
                var name = yl_xmlEncode($(this).attr("name"));
                xmltmp = xmltmp.concat('<field name="' + name + '" required="' + isRequired(this) + '" value="' + value + '" />')
            }
        } else {
            if (this.type == "checkbox" && !($(this).hasClass("unsent"))) {
                if (this.checked) {
                    var value = "true"
                } else {
                    var value = "false"
                }
                var name = yl_xmlEncode($(this).attr("name"));
                xmltmp = xmltmp.concat('<field name="' + name + '" required="' + isRequired(this) + '" value="' + value + '" />')
            } else {
                if (this.type != "button" && this.type != "reset" && !($(this).hasClass("unsent"))) {
                    var value = yl_xmlEncode($(this).val());
                    var name = yl_xmlEncode($(this).attr("name"));
                    xmltmp = xmltmp.concat('<field name="' + name + '" required="' + isRequired(this) + '" value="' + value + '" />')
                }
            }
        }
    });
    $("#" + e + " textarea").each(function() {
        var value = yl_xmlEncode($(this).val());
        var name = yl_xmlEncode($(this).attr("name"));
        xmltmp = xmltmp.concat('<field name="' + name + '" required="' + isRequired(this) + '" value="' + value + '" />')
    });
    return xmltmp.concat("</xmlFormInput>")
}

function yl_xmlEncode(e) {
    return e.replace(/\"/g, "&quot;").replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;")
}

function isRequired(e) {
    return $(e).hasClass("required")
}

function isError(response) {
    return $(response).find("code").text() != "OK"
}

function gatherText(response) {
    var str = "";
    $(response).find("message").each(function() {
        if (str.length > 0) {
            str += "<br/>"
        }
        str += $(this).text()
    });
    return str
}

function initLegalForm() {
    $("#ypgFooterLegal").click(function() {
        var width = 1280;
        var height = 800;
        var left = (screen.width - width) / 2;
        var top = (screen.height - height) / 2;
        var params = "width=" + width + ", height=" + height;
        params += ", top=" + top + ", left=" + left;
        params += ", directories=no";
        params += ", location=no";
        params += ", menubar=no";
        params += ", resizable=no";
        params += ", scrollbars=yes";
        params += ", status=no";
        params += ", toolbar=no";
        legalWindow = window.open("/form/ypgLegalNotice.jsp", "legal", params);
        legalWindow.focus()
    })
}
;