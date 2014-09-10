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
        utag.link({listing_link: utag_data.mlr + "|" + o + "_none"})
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
        utag.link({link_name: o, link_attr1: "alt"})
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
        utag.link({link_name: o, link_attr1: "alt", listing_link: utag_data.mlr + "|" + o + "_none"})
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
        return""
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
            $.ajax({async: false, cache: false, url: "/form/ws/sendwebform/contactus", type: "POST", data: inputVal, dataType: "text/xml", scriptCharset: "utf-8", contentType: "application/x-www-form-urlencoded;charset=UTF-8", success: function(data, status, req) {
                    successEmailUs(req.responseXML)
                }, error: function(req, status, error) {
                    successEmailUs(req.responseXML)
                }})
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
            $.ajax({async: false, cache: false, url: "/form/ws/sendwebform/contactus", data: inputVal, type: "POST", dataType: "text/xml", scriptCharset: "utf-8", contentType: "application/x-www-form-urlencoded;charset=UTF-8", success: function(data, status, req) {
                    successSendToFriend(req.responseXML)
                }, error: function(req, status, error) {
                    successSendToFriend(req.responseXML)
                }})
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
        $.ajax({type: "GET", async: false, url: src, dataType: "text", success: function(data) {
                tmpStr = data
            }})
    } catch (ex) {
        tmpStr = ""
    }
    if (!tmpStr) {
        return""
    } else {
        return"&merchantAddresses=" + encodeURIComponent(tmpStr) + "&xmlFormInput=" + encodeURIComponent(convertFormToXml("form_email_us"))
    }
}
function payloadSendToFriend() {
    var src = $("#form_send_to_friend input[name='merchant_xml_file']").val();
    var tmpStr;
    try {
        $.ajax({type: "GET", async: false, url: src, dataType: "text", success: function(data) {
                tmpStr = data
            }})
    } catch (ex) {
        tmpStr = ""
    }
    if (!tmpStr) {
        return""
    } else {
        return"&merchantAddresses=" + encodeURIComponent(tmpStr) + "&xmlFormInput=" + encodeURIComponent(convertFormToXml("form_send_to_friend"))
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
        var defaults = {openAnimation: "fadeIn", closeAnimation: "slide", openClick: false, openSpeed: 300, closeSpeed: 300, closeDelay: 100, onHide: function() {
            }, onHidden: function() {
            }, onShow: function() {
            }, onShown: function() {
            }};
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
                case"slide":
                    openSlideAnimation(object);
                    break;
                case"fade":
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
                case"slide":
                    closeSlideAnimation(object);
                    break;
                case"fade":
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
            var type = this.type, tag = this.tagName.toLowerCase();
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
    var defaults = {transition: "elastic", speed: 300, width: false, initialWidth: "200", innerWidth: false, maxWidth: false, height: false, initialHeight: "250", innerHeight: false, maxHeight: false, scalePhotos: true, scrolling: true, inline: false, html: false, iframe: false, fastIframe: true, photo: false, href: false, title: false, rel: false, opacity: 0.5, preloading: true, current: "image {current} of {total}", previous: "previous", next: "next", close: "close", open: false, returnFocus: true, loop: true, slideshow: false, slideshowAuto: true, slideshowSpeed: 2500, slideshowStart: "start slideshow", slideshowStop: "stop slideshow", onOpen: false, onLoad: false, onComplete: false, onCleanup: false, onClosed: false, overlayClose: true, escKey: true, arrowKey: true}, colorbox = "colorbox", prefix = "cbox", event_open = prefix + "_open", event_load = prefix + "_load", event_complete = prefix + "_complete", event_cleanup = prefix + "_cleanup", event_closed = prefix + "_closed", event_purge = prefix + "_purge", isIE = $.browser.msie && !$.support.opacity, isIE6 = isIE && $.browser.version < 7, event_ie6 = prefix + "_IE6", $overlay, $box, $wrap, $content, $topBorder, $leftBorder, $rightBorder, $bottomBorder, $related, $window, $loaded, $loadingBay, $loadingOverlay, $title, $current, $slideshow, $next, $prev, $close, $groupControls, settings = {}, interfaceHeight, interfaceWidth, loadedHeight, loadedWidth, element, index, photo, open, active, closing = false, publicMethod, boxElement = prefix + "Element";
    function $div(id, cssText) {
        var div = document.createElement("div");
        div.id = id ? prefix + id : false;
        div.style.cssText = cssText || false;
        return $(div)
    }
    function setSize(size, dimension) {
        dimension = dimension === "x" ? $window.width() : $window.height();
        return(typeof size === "string") ? Math.round((/%/.test(size) ? (dimension / 100) * parseInt(size, 10) : parseInt(size, 10))) : size
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
        var timeOut, className = prefix + "Slideshow_", click = "click." + prefix, start, stop, clear;
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
                    return(relRelated === settings.rel)
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
                $overlay.css({opacity: +settings.opacity, cursor: settings.overlayClose ? "pointer" : "auto"}).show();
                settings.w = setSize(settings.initialWidth, "x");
                settings.h = setSize(settings.initialHeight, "y");
                publicMethod.position(0);
                if (isIE6) {
                    $window.bind("resize." + event_ie6 + " scroll." + event_ie6, function() {
                        $overlay.css({width: $window.width(), height: $window.height(), top: $window.scrollTop(), left: $window.scrollLeft()})
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
        var $this = this, autoOpen;
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
        $box = $div().attr({id: colorbox, "class": isIE ? prefix + (isIE6 ? "IE6" : "IE") : ""});
        $overlay = $div("Overlay", isIE6 ? "position:absolute" : "").hide();
        $wrap = $div("Wrapper");
        $content = $div("Content").append($loaded = $div("LoadedContent", "width:0; height:0; overflow:hidden"), $loadingOverlay = $div("LoadingOverlay").add($div("LoadingGraphic")), $title = $div("Title"), $current = $div("Current"), $next = $div("Next"), $prev = $div("Previous"), $slideshow = $div("Slideshow").bind(event_open, slideshow), $close = $div("Close"));
        $wrap.append($div().append($div("TopLeft"), $topBorder = $div("TopCenter"), $div("TopRight")), $div(false, "clear:left").append($leftBorder = $div("MiddleLeft"), $content, $rightBorder = $div("MiddleRight")), $div(false, "clear:left").append($div("BottomLeft"), $bottomBorder = $div("BottomCenter"), $div("BottomRight"))).children().children().css({"float": "left"});
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
        $box.css({"padding-bottom": interfaceHeight, "padding-right": interfaceWidth}).hide();
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
        var animate_speed, posTop = Math.max(document.documentElement.clientHeight - settings.h - loadedHeight - interfaceHeight, 0) / 2 + $window.scrollTop(), posLeft = Math.max($window.width() - settings.w - loadedWidth - interfaceWidth, 0) / 2 + $window.scrollLeft();
        animate_speed = ($box.width() === settings.w + loadedWidth && $box.height() === settings.h + loadedHeight) ? 0 : speed;
        $wrap[0].style.width = $wrap[0].style.height = "9999px";
        function modalDimensions(that) {
            $topBorder[0].style.width = $bottomBorder[0].style.width = $content[0].style.width = that.style.width;
            $loadingOverlay[0].style.height = $loadingOverlay[1].style.height = $content[0].style.height = $leftBorder[0].style.height = $rightBorder[0].style.height = that.style.height
        }
        $box.dequeue().animate({width: settings.w + loadedWidth, height: settings.h + loadedHeight, top: posTop, left: posLeft}, {duration: animate_speed, complete: function() {
                modalDimensions(this);
                active = false;
                $wrap[0].style.width = (settings.w + loadedWidth + interfaceWidth) + "px";
                $wrap[0].style.height = (settings.h + loadedHeight + interfaceHeight) + "px";
                if (loadedCallback) {
                    loadedCallback()
                }
            }, step: function() {
                modalDimensions(this)
            }})
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
            $loaded.css({width: settings.w});
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
            $loaded.css({height: settings.h});
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
        $loaded.hide().appendTo($loadingBay.show()).css({width: getWidth(), overflow: settings.scrolling ? "auto" : "hidden"}).css({height: getHeight()}).prependTo($content);
        $loadingBay.hide();
        $(photo).css({"float": "none"});
        if (isIE6) {
            $("select").not($box.find("select")).filter(function() {
                return this.style.visibility !== "hidden"
            }).css({visibility: "hidden"}).one(event_cleanup, function() {
                this.style.visibility = "inherit"
            })
        }
        function setPosition(s) {
            publicMethod.position(s, function() {
                var prev, prevSrc, next, nextSrc, total = $related.length, iframe, complete;
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
                $box.add($overlay).css({opacity: 1, cursor: "auto"}).hide();
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
    var D = "undefined", r = "object", S = "Shockwave Flash", W = "ShockwaveFlash.ShockwaveFlash", q = "application/x-shockwave-flash", R = "SWFObjectExprInst", x = "onreadystatechange", O = window, j = document, t = navigator, T = false, U = [h], o = [], N = [], I = [], l, Q, E, B, J = false, a = false, n, G, m = true, M = function() {
        var aa = typeof j.getElementById != D && typeof j.getElementsByTagName != D && typeof j.createElement != D, ah = t.userAgent.toLowerCase(), Y = t.platform.toLowerCase(), ae = Y ? /win/.test(Y) : /win/.test(ah), ac = Y ? /mac/.test(Y) : /mac/.test(ah), af = /webkit/.test(ah) ? parseFloat(ah.replace(/^.*webkit\/(\d+(\.\d+)?).*$/, "$1")) : false, X = !+"\v1", ag = [0, 0, 0], ab = null;
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
        return{w3: aa, pv: ag, wk: af, ie: X, win: ae, mac: ac}
    }(), k = function() {
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
                var aa = {success: false, id: Y};
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
        B = {success: false, id: X};
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
            var ad = M.ie && M.win ? "ActiveX" : "PlugIn", ac = "MMredirectURL=" + O.location.toString().replace(/&/g, "%26") + "&MMplayerType=" + ad + "&MMdoctitle=" + j.title;
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
        var Y = M.pv, X = Z.split(".");
        X[0] = parseInt(X[0], 10);
        X[1] = parseInt(X[1], 10) || 0;
        X[2] = parseInt(X[2], 10) || 0;
        return(Y[0] > X[0] || (Y[0] == X[0] && Y[1] > X[1]) || (Y[0] == X[0] && Y[1] == X[1] && Y[2] >= X[2])) ? true : false
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
                for (var ab = 0;
                        ab < ac; ab++) {
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
    return{registerObject: function(ab, X, aa, Z) {
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
                    Z({success: false, id: ab})
                }
            }
        }, getObjectById: function(X) {
            if (M.w3) {
                return z(X)
            }
        }, embedSWF: function(ab, ah, ae, ag, Y, aa, Z, ad, af, ac) {
            var X = {success: false, id: ah};
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
        }, switchOffAutoHideShow: function() {
            m = false
        }, ua: M, getFlashPlayerVersion: function() {
            return{major: M.pv[0], minor: M.pv[1], release: M.pv[2]}
        }, hasFlashPlayerVersion: F, createSWF: function(Z, Y, X) {
            if (M.w3) {
                return u(Z, Y, X)
            } else {
                return undefined
            }
        }, showExpressInstall: function(Z, aa, X, Y) {
            if (M.w3 && A()) {
                P(Z, aa, X, Y)
            }
        }, removeSWF: function(X) {
            if (M.w3) {
                y(X)
            }
        }, createCSS: function(aa, Z, Y, X) {
            if (M.w3) {
                v(aa, Z, Y, X)
            }
        }, addDomLoadEvent: K, addLoadEvent: s, getQueryParamValue: function(aa) {
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
            return""
        }, expressInstallCallback: function() {
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
        }}
}();
(function($) {
    $.fn.mask = function(label, delay) {
        $(this).each(function() {
            if (delay !== undefined && delay > 0) {
                var element = $(this);
                element.data("_mask_timeout", setTimeout(function() {
                    $.maskElement(element, label)
                }, delay))
            } else {
                $.maskElement($(this), label)
            }
        })
    };
    $.fn.unmask = function() {
        $(this).each(function() {
            $.unmaskElement($(this))
        })
    };
    $.fn.isMasked = function() {
        return this.hasClass("masked")
    };
    $.maskElement = function(element, label) {
        if (element.data("_mask_timeout") !== undefined) {
            clearTimeout(element.data("_mask_timeout"));
            element.removeData("_mask_timeout")
        }
        if (element.isMasked()) {
            $.unmaskElement(element)
        }
        if (element.css("position") == "static") {
            element.addClass("masked-relative")
        }
        element.addClass("masked");
        var maskDiv = $('<div class="loadmask"></div>');
        if (navigator.userAgent.toLowerCase().indexOf("msie") > -1) {
            maskDiv.height(element.height() + parseInt(element.css("padding-top")) + parseInt(element.css("padding-bottom")));
            maskDiv.width(element.width() + parseInt(element.css("padding-left")) + parseInt(element.css("padding-right")))
        }
        if (navigator.userAgent.toLowerCase().indexOf("msie 6") > -1) {
            element.find("select").addClass("masked-hidden")
        }
        element.append(maskDiv);
        if (label !== undefined) {
            var maskMsgDiv = $('<div class="loadmask-msg" style="display:none;"></div>');
            maskMsgDiv.append("<div>" + label + "</div>");
            element.append(maskMsgDiv);
            var winH = $(element).height();
            var winW = $(element).width();
            maskMsgDiv.css("top", Math.round(winH / 2 - (maskMsgDiv.height() - parseInt(maskMsgDiv.css("padding-top")) - parseInt(maskMsgDiv.css("padding-bottom"))) / 2) + "px");
            maskMsgDiv.css("left", Math.round(winW / 2 - (maskMsgDiv.width() - parseInt(maskMsgDiv.css("padding-left")) - parseInt(maskMsgDiv.css("padding-right"))) / 2) + "px");
            maskMsgDiv.show()
        }
    };
    $.unmaskElement = function(element) {
        if (element.data("_mask_timeout") !== undefined) {
            clearTimeout(element.data("_mask_timeout"));
            element.removeData("_mask_timeout")
        }
        element.find(".loadmask-msg,.loadmask").remove();
        element.removeClass("masked");
        element.removeClass("masked-relative");
        element.find("select").removeClass("masked-hidden")
    }
})(jQuery);
function activateWidgetForm(e) {
    $("#" + e).unmask()
}
function deactivateWidgetForm(e) {
    $("#" + e).mask("sending...")
}
function sendWidgetForm(e) {
    var inputVal = payloadWidgetForm(e);
    if (!inputVal) {
        errorWidgetForm(e)
    } else {
        deactivateWidgetForm(e);
        try {
            $.ajax({async: false, cache: false, url: "/form/ws/sendwebform/contactus", type: "POST", data: inputVal, dataType: "text/xml", scriptCharset: "utf-8", contentType: "application/x-www-form-urlencoded;charset=UTF-8", success: function(data, status, req) {
                    successWidgetForm(req.responseXML, e)
                }, error: function(req, status, error) {
                    successWidgetForm(req.responseXML, e)
                }})
        } catch (ex) {
            errorWidgetForm(e)
        } finally {
            activateWidgetForm(e)
        }
    }
}
function payloadWidgetForm(e) {
    var src = $("#" + e + " input[name='merchant_xml_file']").val();
    var tmpStr;
    try {
        $.ajax({type: "GET", async: false, url: src, dataType: "text", success: function(data) {
                tmpStr = data
            }})
    } catch (ex) {
        tmpStr = ""
    }
    if (!tmpStr) {
        return""
    } else {
        return"&merchantAddresses=" + encodeURIComponent(tmpStr) + "&xmlFormInput=" + encodeURIComponent(convertFormToXml(e))
    }
}
function resetWidgetForm(e) {
    if ($("#" + e + " .ulbtn-wrapper").length) {
        deleteFiles(e)
    }
    $("#" + e).clearForm();
    if ($("#" + e).isMasked()) {
        activateWidgetForm(e)
    }
    $("#" + e + "_message").html("");
    $("#" + e + "_message").hide()
}
function successWidgetForm(response, e) {
    var err = isError(response);
    var msg = gatherText(response);
    var tma = "";
    if (!err && $("#" + e + " .ulbtn-wrapper").length) {
        $("#" + e + " .ulbtn-wrapper").each(function() {
            hide_upload_file(e, this)
        })
    }
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
    feedbackWidgetForm(msg, err, e)
}
function errorWidgetForm(e) {
    if ($("html").attr("lang") == "fr") {
        feedbackWidgetForm("Le service n'est pas disponible pour l'instant.", true, e)
    } else {
        feedbackWidgetForm("Service unavailable. Please try again later.", true, e)
    }
}
function errorUploadForm(e) {
    if ($("html").attr("lang") == "fr") {
        feedbackWidgetForm("Téléchargement a échoué.Veuillez réessayer plus tard.", true, e)
    } else {
        feedbackWidgetForm("Upload Failed. Please try again later.", true, e)
    }
}
function errorSizeForm(e) {
    if ($("html").attr("lang") == "fr") {
        feedbackWidgetForm("Fichier non valide. La taille de fichier maximale est de 10M.", true, e)
    } else {
        feedbackWidgetForm("Invalid file. Maximum file size allowed is 10M.", true, e)
    }
}
function feedbackWidgetForm(msg, err, e) {
    if (err) {
        $("#" + e + "_message").html('<p class="ssoSmallMsgBox msgRed">' + msg + "</p>")
    } else {
        $("#" + e + "_message").html('<p class="ssoSmallMsgBox msgGreen">' + msg + "</p>");
        $("#" + e).clearForm()
    }
    $("#" + e + "_message").show()
}
function limitLength(Event, Object, MaxLen) {
    return(Object.value.length < MaxLen) || (Event.keyCode == 8 || Event.keyCode == 46 || (Event.keyCode >= 35 && Event.keyCode <= 40))
}
function synchronizeValue(elementSource, elementDestinationId) {
    var value = "";
    var type = elementSource.type;
    if (type == "select-one" && elementSource.selectedIndex != -1) {
        value = elementSource.options[elementSource.selectedIndex].value
    } else {
        if (type == "checkbox") {
            value = elementSource.checked ? "Yes" : "No"
        } else {
            if (type == "radio") {
                value = elementSource.value
            }
        }
    }
    elementDestination = document.getElementById(elementDestinationId);
    if (elementDestination) {
        document.getElementById(elementDestinationId).value = value
    }
}
function fw_ajaxFileUpload(frmId, id) {
    if ($.browser.msie) {
        var uptDiv = $("#" + id).parent()
    } else {
        var uptDiv = $("#" + id).parent().parent()
    }
    $("#" + id).ajaxStart(function() {
        hide_upload_btn(uptDiv)
    }).ajaxError(function() {
        show_upload_btn(uptDiv)
    });
    var fn = $("#" + id).val();
    $.ajaxFileUpload({url: "/form/ws/sendwebform/fileupload", secureuri: false, fileElementId: id, success: function(data, status, req) {
            var aa = data.documentElement.innerText;
            var code;
            var msg;
            if (aa == undefined) {
                code = $(data).find("response").find("code").text();
                msg = $(data).find("response").find("message").text()
            } else {
                code = aa.match("<code>(.*)</code>")[1];
                msg = aa.match("<message>(.*)</message>")[1]
            }
            $("#" + frmId).find(" .ulbtn-loader").hide();
            if (code.length && "OK" == code) {
                var d = $("<input/>");
                $(d).attr("type", "hidden");
                $(d).attr("id", $(uptDiv).attr("id") + "_aFile");
                $(d).attr("name", $("#" + id).attr("name"));
                if (isRequired($("#" + id))) {
                    $(d).addClass("required")
                }
                $(d).addClass("attached-file");
                $(d).attr("value", msg);
                $("#" + frmId).append(d);
                show_upload_file(uptDiv, fn)
            } else {
                show_upload_btn(uptDiv);
                errorUploadForm(frmId)
            }
        }, error: function(data, status, e) {
            show_upload_btn(uptDiv);
            errorUploadForm(frmId)
        }});
    return false
}
function deleteFile(frmId, uptDiv) {
    var id = $(uptDiv).attr("id");
    if ($("#" + frmId + " #" + id + "_aFile").length) {
        var inputVal = $("#" + frmId + " #" + id + "_aFile").val();
        try {
            $.ajax({async: false, cache: false, url: "/form/ws/sendwebform/deletefile", type: "POST", data: "file=" + encodeURIComponent(inputVal), dataType: "text/xml", scriptCharset: "utf-8", contentType: "application/x-www-form-urlencoded;charset=UTF-8", success: function(data, status, req) {
                }, error: function(req, status, error) {
                }})
        } catch (ex) {
        }
    }
    hide_upload_file(frmId, uptDiv)
}
function hide_upload_btn(e) {
    if ($.browser.msie || ($.browser.mozilla && $.browser.version < "1.9.2.99")) {
        $(e).find(".fileupload-ie").hide()
    } else {
        $(e).find("div.ulbtn").hide()
    }
    $(e).find(".ulbtn-uploaded").show()
}
function show_upload_btn(e) {
    $(e).find(".ulbtn-uploaded").hide();
    if ($.browser.msie || ($.browser.mozilla && $.browser.version < "1.9.2.99")) {
        $(e).find(".ulbtn").hide();
        $(e).find(".fileupload-ie").show()
    } else {
        $(e).find(".ulbtn").show();
        $(e).find(".fileupload-ie").hide()
    }
}
function deleteFiles(frmId) {
    $("#" + frmId + " div.ulbtn-wrapper").each(function() {
        deleteFile(frmId, this)
    })
}
function hide_upload_file(frmId, uptDiv) {
    $("#" + frmId + " #" + $(uptDiv).attr("id") + "_aFile").remove();
    show_upload_btn(uptDiv)
}
function show_upload_file(e, fn) {
    if ($.browser.mozilla) {
        $(e).find(".ulbtn-file-name").text(fn)
    } else {
        var t = fn.split("\\\\");
        $(e).find(".ulbtn-file-name").text(t[t.length - 1])
    }
    $(e).find(".ulbtn-uploaded").show()
}
function fw_client_val(e) {
    var out = true;
    if ($("#" + e).find(".ulbtn-wrapper").length) {
        $("#" + e).find(".ulbtn-wrapper").each(function() {
            if ($(this).has("input.required").length && !$("#" + e).find("#" + $(this).attr("id") + "_aFile").length) {
                if ($("html").attr("lang") == "fr") {
                    feedbackWidgetForm("Tous les champs obligatoires doivent être remplis.", true, e)
                } else {
                    feedbackWidgetForm("You must fill in all the required fields.", true, e)
                }
                out = false
            }
        })
    }
    return out
}
function initForm(id) {
    resetWidgetForm(id);
    $("#" + id + " .wss-form-submit-button,#" + id + " .wss-form-new-submit-button").click(function() {
        if (fw_client_val(id)) {
            sendWidgetForm(id)
        }
    });
    $("#" + id + "_reset").click(function() {
        resetWidgetForm(id)
    });
    $(window).unload(function() {
        if ($("#" + id + " .ulbtn-wrapper").length) {
            deleteFiles(id)
        }
    });
    $("#" + id + " .ulbtn").live("click", function() {
        if (!$(this).next(".ulbtn-uploaded").is(":visible")) {
            $(this).parent().find('input[id$="fw_fileupload"]').click()
        } else {
            $(this).parent().find(".ulbtn-cancel").hide()
        }
    });
    $("#" + id + " input.fileupload").live("change", function() {
        if (this.files[0].size > 10485760) {
            errorSizeForm(id);
            return
        }
        if ($(this).length) {
            $("#" + id + "_message").hide();
            fw_ajaxFileUpload(id, $(this).attr("id"))
        }
    });
    $("#" + id + " input.fileupload-ie").livequery("change", function() {
        if ($(this).length) {
            $("#" + id + "_message").hide();
            fw_ajaxFileUpload(id, $(this).attr("id"))
        }
    });
    $("#" + id + " .ulbtn-cancel").live("click", function() {
        deleteFile(id, $(this).parent().parent())
    })
}
jQuery.extend({createUploadIframe: function(id, uri) {
        var frameId = "jUploadFrame" + id;
        var iframeHtml = '<iframe id="' + frameId + '" name="' + frameId + '" style="position:absolute; top:-9999px; left:-9999px"';
        if (window.ActiveXObject) {
            if (typeof uri == "boolean") {
                iframeHtml += ' src="javascript:false"'
            } else {
                if (typeof uri == "string") {
                    iframeHtml += ' src="' + uri + '"'
                }
            }
        }
        iframeHtml += " />";
        jQuery(iframeHtml).appendTo(document.body);
        return jQuery("#" + frameId).get(0)
    }, createUploadForm: function(id, fileElementId, data) {
        var formId = "jUploadForm" + id;
        var fileId = "jUploadFile" + id;
        var form = jQuery('<form  action="" method="POST" name="' + formId + '" id="' + formId + '" enctype="multipart/form-data"></form>');
        if (data) {
            for (var i in data) {
                jQuery('<input type="hidden" name="' + i + '" value="' + data[i] + '" />').appendTo(form)
            }
        }
        var oldElement = jQuery("#" + fileElementId);
        var newElement = jQuery(oldElement).clone();
        jQuery(oldElement).attr("id", fileId);
        jQuery(oldElement).before(newElement);
        jQuery(oldElement).appendTo(form);
        jQuery(form).css("position", "absolute");
        jQuery(form).css("top", "-1200px");
        jQuery(form).css("left", "-1200px");
        jQuery(form).appendTo("body");
        return form
    }, ajaxFileUpload: function(s) {
        s = jQuery.extend({}, jQuery.ajaxSettings, s);
        var id = new Date().getTime();
        var form = jQuery.createUploadForm(id, s.fileElementId, (typeof (s.data) == "undefined" ? false : s.data));
        var io = jQuery.createUploadIframe(id, s.secureuri);
        var frameId = "jUploadFrame" + id;
        var formId = "jUploadForm" + id;
        if (s.global && !jQuery.active++) {
            jQuery.event.trigger("ajaxStart")
        }
        var requestDone = false;
        var xml = {};
        if (s.global) {
            jQuery.event.trigger("ajaxSend", [xml, s])
        }
        var uploadCallback = function(isTimeout) {
            var io = document.getElementById(frameId);
            try {
                if (io.contentWindow) {
                    xml.responseText = io.contentWindow.document.body ? io.contentWindow.document.body.innerHTML : null;
                    xml.responseXML = io.contentWindow.document.XMLDocument ? io.contentWindow.document.XMLDocument : io.contentWindow.document
                } else {
                    if (io.contentDocument) {
                        xml.responseText = io.contentDocument.document.body ? io.contentDocument.document.body.innerHTML : null;
                        xml.responseXML = io.contentDocument.document.XMLDocument ? io.contentDocument.document.XMLDocument : io.contentDocument.document
                    }
                }
            } catch (e) {
            }
            if (xml || isTimeout == "timeout") {
                requestDone = true;
                var status;
                try {
                    status = isTimeout != "timeout" ? "success" : "error";
                    if (status != "error") {
                        var data = jQuery.uploadHttpData(xml, s.dataType);
                        if (s.success) {
                            s.success(data, status)
                        }
                        if (s.global) {
                            jQuery.event.trigger("ajaxSuccess", [xml, s])
                        }
                    }
                } catch (e) {
                    status = "error";
                    alert("failed")
                }
                if (s.global) {
                    jQuery.event.trigger("ajaxComplete", [xml, s])
                }
                if (s.global && !--jQuery.active) {
                    jQuery.event.trigger("ajaxStop")
                }
                if (s.complete) {
                    s.complete(xml, status)
                }
                jQuery(io).unbind();
                setTimeout(function() {
                    try {
                        jQuery(io).remove();
                        jQuery(form).remove()
                    } catch (e) {
                        alert("Failed")
                    }
                }, 100);
                xml = null
            }
        };
        if (s.timeout > 0) {
            setTimeout(function() {
                if (!requestDone) {
                    uploadCallback("timeout")
                }
            }, s.timeout)
        }
        try {
            var form = jQuery("#" + formId);
            jQuery(form).attr("action", s.url);
            jQuery(form).attr("method", "POST");
            jQuery(form).attr("target", frameId);
            if (form.encoding) {
                jQuery(form).attr("encoding", "multipart/form-data")
            } else {
                jQuery(form).attr("enctype", "multipart/form-data")
            }
            jQuery(form).submit()
        } catch (e) {
        }
        jQuery("#" + frameId).load(uploadCallback);
        return{abort: function() {
            }}
    }, uploadHttpData: function(r, type) {
        var data = !type;
        data = type == "xml" || data ? r.responseXML : r.responseText;
        if (type == "script") {
            jQuery.globalEval(data)
        }
        if (type == "json") {
            eval("data = " + data)
        }
        if (type == "html") {
            jQuery("<div>").html(data).evalScripts()
        }
        return data
    }});
/* Copyright (c) 2010 Brandon Aaron (http://brandonaaron.net)
 * Dual licensed under the MIT (MIT_LICENSE.txt)
 * and GPL Version 2 (GPL_LICENSE.txt) licenses.
 *
 * Version: 1.1.1
 * Requires jQuery 1.3+
 * Docs: http://docs.jquery.com/Plugins/livequery
 */
(function($) {
    $.extend($.fn, {livequery: function(type, fn, fn2) {
            var self = this, q;
            if ($.isFunction(type)) {
                fn2 = fn, fn = type, type = undefined
            }
            $.each($.livequery.queries, function(i, query) {
                if (self.selector == query.selector && self.context == query.context && type == query.type && (!fn || fn.$lqguid == query.fn.$lqguid) && (!fn2 || fn2.$lqguid == query.fn2.$lqguid)) {
                    return(q = query) && false
                }
            });
            q = q || new $.livequery(this.selector, this.context, type, fn, fn2);
            q.stopped = false;
            q.run();
            return this
        }, expire: function(type, fn, fn2) {
            var self = this;
            if ($.isFunction(type)) {
                fn2 = fn, fn = type, type = undefined
            }
            $.each($.livequery.queries, function(i, query) {
                if (self.selector == query.selector && self.context == query.context && (!type || type == query.type) && (!fn || fn.$lqguid == query.fn.$lqguid) && (!fn2 || fn2.$lqguid == query.fn2.$lqguid) && !this.stopped) {
                    $.livequery.stop(query.id)
                }
            });
            return this
        }});
    $.livequery = function(selector, context, type, fn, fn2) {
        this.selector = selector;
        this.context = context;
        this.type = type;
        this.fn = fn;
        this.fn2 = fn2;
        this.elements = [];
        this.stopped = false;
        this.id = $.livequery.queries.push(this) - 1;
        fn.$lqguid = fn.$lqguid || $.livequery.guid++;
        if (fn2) {
            fn2.$lqguid = fn2.$lqguid || $.livequery.guid++
        }
        return this
    };
    $.livequery.prototype = {stop: function() {
            var query = this;
            if (this.type) {
                this.elements.unbind(this.type, this.fn)
            } else {
                if (this.fn2) {
                    this.elements.each(function(i, el) {
                        query.fn2.apply(el)
                    })
                }
            }
            this.elements = [];
            this.stopped = true
        }, run: function() {
            if (this.stopped) {
                return
            }
            var query = this;
            var oEls = this.elements, els = $(this.selector, this.context), nEls = els.not(oEls);
            this.elements = els;
            if (this.type) {
                nEls.bind(this.type, this.fn);
                if (oEls.length > 0) {
                    $.each(oEls, function(i, el) {
                        if ($.inArray(el, els) < 0) {
                            $.event.remove(el, query.type, query.fn)
                        }
                    })
                }
            } else {
                nEls.each(function() {
                    query.fn.apply(this)
                });
                if (this.fn2 && oEls.length > 0) {
                    $.each(oEls, function(i, el) {
                        if ($.inArray(el, els) < 0) {
                            query.fn2.apply(el)
                        }
                    })
                }
            }
        }};
    $.extend($.livequery, {guid: 0, queries: [], queue: [], running: false, timeout: null, checkQueue: function() {
            if ($.livequery.running && $.livequery.queue.length) {
                var length = $.livequery.queue.length;
                while (length--) {
                    $.livequery.queries[$.livequery.queue.shift()].run()
                }
            }
        }, pause: function() {
            $.livequery.running = false
        }, play: function() {
            $.livequery.running = true;
            $.livequery.run()
        }, registerPlugin: function() {
            $.each(arguments, function(i, n) {
                if (!$.fn[n]) {
                    return
                }
                var old = $.fn[n];
                $.fn[n] = function() {
                    var r = old.apply(this, arguments);
                    $.livequery.run();
                    return r
                }
            })
        }, run: function(id) {
            if (id != undefined) {
                if ($.inArray(id, $.livequery.queue) < 0) {
                    $.livequery.queue.push(id)
                }
            } else {
                $.each($.livequery.queries, function(id) {
                    if ($.inArray(id, $.livequery.queue) < 0) {
                        $.livequery.queue.push(id)
                    }
                })
            }
            if ($.livequery.timeout) {
                clearTimeout($.livequery.timeout)
            }
            $.livequery.timeout = setTimeout($.livequery.checkQueue, 20)
        }, stop: function(id) {
            if (id != undefined) {
                $.livequery.queries[id].stop()
            } else {
                $.each($.livequery.queries, function(id) {
                    $.livequery.queries[id].stop()
                })
            }
        }});
    $.livequery.registerPlugin("append", "prepend", "after", "before", "wrap", "attr", "removeAttr", "addClass", "removeClass", "toggleClass", "empty", "remove", "html");
    $(function() {
        $.livequery.play()
    })
})(jQuery);
var Hashtable = (function() {
    var p = "function";
    var n = (typeof Array.prototype.splice == p) ? function(s, r) {
        s.splice(r, 1)
    } : function(u, t) {
        var s, v, r;
        if (t === u.length - 1) {
            u.length = t
        } else {
            s = u.slice(t + 1);
            u.length = t;
            for (v = 0, r = s.length; v < r; ++v) {
                u[t + v] = s[v]
            }
        }
    };
    function a(t) {
        var r;
        if (typeof t == "string") {
            return t
        } else {
            if (typeof t.hashCode == p) {
                r = t.hashCode();
                return(typeof r == "string") ? r : a(r)
            } else {
                if (typeof t.toString == p) {
                    return t.toString()
                } else {
                    try {
                        return String(t)
                    } catch (s) {
                        return Object.prototype.toString.call(t)
                    }
                }
            }
        }
    }
    function g(r, s) {
        return r.equals(s)
    }
    function e(r, s) {
        return(typeof s.equals == p) ? s.equals(r) : (r === s)
    }
    function c(r) {
        return function(s) {
            if (s === null) {
                throw new Error("null is not a valid " + r)
            } else {
                if (typeof s == "undefined") {
                    throw new Error(r + " must not be undefined")
                }
            }
        }
    }
    var q = c("key"), l = c("value");
    function d(u, s, t, r) {
        this[0] = u;
        this.entries = [];
        this.addEntry(s, t);
        if (r !== null) {
            this.getEqualityFunction = function() {
                return r
            }
        }
    }
    var h = 0, j = 1, f = 2;
    function o(r) {
        return function(t) {
            var s = this.entries.length, v, u = this.getEqualityFunction(t);
            while (s--) {
                v = this.entries[s];
                if (u(t, v[0])) {
                    switch (r) {
                        case h:
                            return true;
                        case j:
                            return v;
                        case f:
                            return[s, v[1]]
                        }
                }
            }
            return false
        }
    }
    function k(r) {
        return function(u) {
            var v = u.length;
            for (var t = 0, s = this.entries.length; t < s; ++t) {
                u[v + t] = this.entries[t][r]
            }
        }
    }
    d.prototype = {getEqualityFunction: function(r) {
            return(typeof r.equals == p) ? g : e
        }, getEntryForKey: o(j), getEntryAndIndexForKey: o(f), removeEntryForKey: function(s) {
            var r = this.getEntryAndIndexForKey(s);
            if (r) {
                n(this.entries, r[0]);
                return r[1]
            }
            return null
        }, addEntry: function(r, s) {
            this.entries[this.entries.length] = [r, s]
        }, keys: k(0), values: k(1), getEntries: function(s) {
            var u = s.length;
            for (var t = 0, r = this.entries.length; t < r; ++t) {
                s[u + t] = this.entries[t].slice(0)
            }
        }, containsKey: o(h), containsValue: function(s) {
            var r = this.entries.length;
            while (r--) {
                if (s === this.entries[r][1]) {
                    return true
                }
            }
            return false
        }};
    function m(s, t) {
        var r = s.length, u;
        while (r--) {
            u = s[r];
            if (t === u[0]) {
                return r
            }
        }
        return null
    }
    function i(r, s) {
        var t = r[s];
        return(t && (t instanceof d)) ? t : null
    }
    function b(t, r) {
        var w = this;
        var v = [];
        var u = {};
        var x = (typeof t == p) ? t : a;
        var s = (typeof r == p) ? r : null;
        this.put = function(B, C) {
            q(B);
            l(C);
            var D = x(B), E, A, z = null;
            E = i(u, D);
            if (E) {
                A = E.getEntryForKey(B);
                if (A) {
                    z = A[1];
                    A[1] = C
                } else {
                    E.addEntry(B, C)
                }
            } else {
                E = new d(D, B, C, s);
                v[v.length] = E;
                u[D] = E
            }
            return z
        };
        this.get = function(A) {
            q(A);
            var B = x(A);
            var C = i(u, B);
            if (C) {
                var z = C.getEntryForKey(A);
                if (z) {
                    return z[1]
                }
            }
            return null
        };
        this.containsKey = function(A) {
            q(A);
            var z = x(A);
            var B = i(u, z);
            return B ? B.containsKey(A) : false
        };
        this.containsValue = function(A) {
            l(A);
            var z = v.length;
            while (z--) {
                if (v[z].containsValue(A)) {
                    return true
                }
            }
            return false
        };
        this.clear = function() {
            v.length = 0;
            u = {}
        };
        this.isEmpty = function() {
            return !v.length
        };
        var y = function(z) {
            return function() {
                var A = [], B = v.length;
                while (B--) {
                    v[B][z](A)
                }
                return A
            }
        };
        this.keys = y("keys");
        this.values = y("values");
        this.entries = y("getEntries");
        this.remove = function(B) {
            q(B);
            var C = x(B), z, A = null;
            var D = i(u, C);
            if (D) {
                A = D.removeEntryForKey(B);
                if (A !== null) {
                    if (!D.entries.length) {
                        z = m(v, C);
                        n(v, z);
                        delete u[C]
                    }
                }
            }
            return A
        };
        this.size = function() {
            var A = 0, z = v.length;
            while (z--) {
                A += v[z].entries.length
            }
            return A
        };
        this.each = function(C) {
            var z = w.entries(), A = z.length, B;
            while (A--) {
                B = z[A];
                C(B[0], B[1])
            }
        };
        this.putAll = function(H, C) {
            var B = H.entries();
            var E, F, D, z, A = B.length;
            var G = (typeof C == p);
            while (A--) {
                E = B[A];
                F = E[0];
                D = E[1];
                if (G && (z = w.get(F))) {
                    D = C(F, z, D)
                }
                w.put(F, D)
            }
        };
        this.clone = function() {
            var z = new b(t, r);
            z.putAll(w);
            return z
        }
    }
    return b
})();
new function(settings) {
    var $separator = settings.separator || "&";
    var $spaces = settings.spaces === false ? false : true;
    var $suffix = settings.suffix === false ? "" : "[]";
    var $prefix = settings.prefix === false ? false : true;
    var $hash = $prefix ? settings.hash === true ? "#" : "?" : "";
    var $numbers = settings.numbers === false ? false : true;
    jQuery.query = new function() {
        var is = function(o, t) {
            return o != undefined && o !== null && (!!t ? o.constructor == t : true)
        };
        var parse = function(path) {
            var m, rx = /\[([^[]*)\]/g, match = /^([^[]+)(\[.*\])?$/.exec(path), base = match[1], tokens = [];
            while (m = rx.exec(match[2])) {
                tokens.push(m[1])
            }
            return[base, tokens]
        };
        var set = function(target, tokens, value) {
            var o, token = tokens.shift();
            if (typeof target != "object") {
                target = null
            }
            if (token === "") {
                if (!target) {
                    target = []
                }
                if (is(target, Array)) {
                    target.push(tokens.length == 0 ? value : set(null, tokens.slice(0), value))
                } else {
                    if (is(target, Object)) {
                        var i = 0;
                        while (target[i++] != null) {
                        }
                        target[--i] = tokens.length == 0 ? value : set(target[i], tokens.slice(0), value)
                    } else {
                        target = [];
                        target.push(tokens.length == 0 ? value : set(null, tokens.slice(0), value))
                    }
                }
            } else {
                if (token && token.match(/^\s*[0-9]+\s*$/)) {
                    var index = parseInt(token, 10);
                    if (!target) {
                        target = []
                    }
                    target[index] = tokens.length == 0 ? value : set(target[index], tokens.slice(0), value)
                } else {
                    if (token) {
                        var index = token.replace(/^\s*|\s*$/g, "");
                        if (!target) {
                            target = {}
                        }
                        if (is(target, Array)) {
                            var temp = {};
                            for (var i = 0; i < target.length; ++i) {
                                temp[i] = target[i]
                            }
                            target = temp
                        }
                        target[index] = tokens.length == 0 ? value : set(target[index], tokens.slice(0), value)
                    } else {
                        return value
                    }
                }
            }
            return target
        };
        var queryObject = function(a) {
            var self = this;
            self.keys = {};
            if (a.queryObject) {
                jQuery.each(a.get(), function(key, val) {
                    self.SET(key, val)
                })
            } else {
                jQuery.each(arguments, function() {
                    var q = "" + this;
                    q = q.replace(/^[?#]/, "");
                    q = q.replace(/[;&]$/, "");
                    if ($spaces) {
                        q = q.replace(/[+]/g, " ")
                    }
                    jQuery.each(q.split(/[&;]/), function() {
                        var key = decodeURIComponent(this.split("=")[0] || "");
                        var val = decodeURIComponent(this.split("=")[1] || "");
                        if (!key) {
                            return
                        }
                        if ($numbers) {
                            if (/^[+-]?[0-9]+\.[0-9]*$/.test(val)) {
                                val = parseFloat(val)
                            } else {
                                if (/^[+-]?[0-9]+$/.test(val)) {
                                    val = parseInt(val, 10)
                                }
                            }
                        }
                        val = (!val && val !== 0) ? true : val;
                        if (val !== false && val !== true && typeof val != "number") {
                            val = val
                        }
                        self.SET(key, val)
                    })
                })
            }
            return self
        };
        queryObject.prototype = {queryObject: true, has: function(key, type) {
                var value = this.get(key);
                return is(value, type)
            }, GET: function(key) {
                if (!is(key)) {
                    return this.keys
                }
                var parsed = parse(key), base = parsed[0], tokens = parsed[1];
                var target = this.keys[base];
                while (target != null && tokens.length != 0) {
                    target = target[tokens.shift()]
                }
                return typeof target == "number" ? target : target || ""
            }, get: function(key) {
                var target = this.GET(key);
                if (is(target, Object)) {
                    return jQuery.extend(true, {}, target)
                } else {
                    if (is(target, Array)) {
                        return target.slice(0)
                    }
                }
                return target
            }, SET: function(key, val) {
                var value = !is(val) ? null : val;
                var parsed = parse(key), base = parsed[0], tokens = parsed[1];
                var target = this.keys[base];
                this.keys[base] = set(target, tokens.slice(0), value);
                return this
            }, set: function(key, val) {
                return this.copy().SET(key, val)
            }, REMOVE: function(key) {
                return this.SET(key, null).COMPACT()
            }, remove: function(key) {
                return this.copy().REMOVE(key)
            }, EMPTY: function() {
                var self = this;
                jQuery.each(self.keys, function(key, value) {
                    delete self.keys[key]
                });
                return self
            }, load: function(url) {
                var hash = url.replace(/^.*?[#](.+?)(?:\?.+)?$/, "$1");
                var search = url.replace(/^.*?[?](.+?)(?:#.+)?$/, "$1");
                return new queryObject(url.length == search.length ? "" : search, url.length == hash.length ? "" : hash)
            }, empty: function() {
                return this.copy().EMPTY()
            }, copy: function() {
                return new queryObject(this)
            }, COMPACT: function() {
                function build(orig) {
                    var obj = typeof orig == "object" ? is(orig, Array) ? [] : {} : orig;
                    if (typeof orig == "object") {
                        function add(o, key, value) {
                            if (is(o, Array)) {
                                o.push(value)
                            } else {
                                o[key] = value
                            }
                        }
                        jQuery.each(orig, function(key, value) {
                            if (!is(value)) {
                                return true
                            }
                            add(obj, key, build(value))
                        })
                    }
                    return obj
                }
                this.keys = build(this.keys);
                return this
            }, compact: function() {
                return this.copy().COMPACT()
            }, toString: function() {
                var i = 0, queryString = [], chunks = [], self = this;
                var encode = function(str) {
                    str = str + "";
                    if ($spaces) {
                        str = str.replace(/ /g, "+")
                    }
                    return encodeURIComponent(str)
                };
                var addFields = function(arr, key, value) {
                    if (!is(value) || value === false) {
                        return
                    }
                    var o = [encode(key)];
                    if (value !== true) {
                        o.push("=");
                        o.push(encode(value))
                    }
                    arr.push(o.join(""))
                };
                var build = function(obj, base) {
                    var newKey = function(key) {
                        return !base || base == "" ? [key].join("") : [base, "[", key, "]"].join("")
                    };
                    jQuery.each(obj, function(key, value) {
                        if (typeof value == "object") {
                            build(value, newKey(key))
                        } else {
                            addFields(chunks, newKey(key), value)
                        }
                    })
                };
                build(this.keys);
                if (chunks.length > 0) {
                    queryString.push($hash)
                }
                queryString.push(chunks.join($separator));
                return queryString.join("")
            }};
        return new queryObject(location.search, location.hash)
    }
}(jQuery.query || {});
if (jQuery) {
    (function() {
        $.extend($.fn, {contextMenu: function(o, callback) {
                if (o.menu == undefined) {
                    return false
                }
                if (o.inSpeed == undefined) {
                    o.inSpeed = 150
                }
                if (o.outSpeed == undefined) {
                    o.outSpeed = 75
                }
                if (o.inSpeed == 0) {
                    o.inSpeed = -1
                }
                if (o.outSpeed == 0) {
                    o.outSpeed = -1
                }
                $(this).each(function() {
                    var el = $(this);
                    var offset = $(el).offset();
                    $("#" + o.menu).addClass("contextMenu");
                    $(this).mousedown(function(e) {
                        var evt = e;
                        evt.stopPropagation();
                        $(this).mouseup(function(e) {
                            e.stopPropagation();
                            var srcElement = $(this);
                            $(this).unbind("mouseup");
                            if (evt.button == 2) {
                                $(".contextMenu").hide();
                                var menu = $("#" + o.menu);
                                if ($(el).hasClass("disabled")) {
                                    return false
                                }
                                var d = {}, x, y;
                                if (self.innerHeight) {
                                    d.pageYOffset = self.pageYOffset;
                                    d.pageXOffset = self.pageXOffset;
                                    d.innerHeight = self.innerHeight;
                                    d.innerWidth = self.innerWidth
                                } else {
                                    if (document.documentElement && document.documentElement.clientHeight) {
                                        d.pageYOffset = document.documentElement.scrollTop;
                                        d.pageXOffset = document.documentElement.scrollLeft;
                                        d.innerHeight = document.documentElement.clientHeight;
                                        d.innerWidth = document.documentElement.clientWidth
                                    } else {
                                        if (document.body) {
                                            d.pageYOffset = document.body.scrollTop;
                                            d.pageXOffset = document.body.scrollLeft;
                                            d.innerHeight = document.body.clientHeight;
                                            d.innerWidth = document.body.clientWidth
                                        }
                                    }
                                }
                                (e.pageX) ? x = e.pageX : x = e.clientX + d.scrollLeft;
                                (e.pageY) ? y = e.pageY : y = e.clientY + d.scrollTop;
                                $(document).unbind("click");
                                $(menu).css({top: y, left: x}).fadeIn(o.inSpeed);
                                $(menu).find("A").mouseover(function() {
                                    $(menu).find("LI.hover").removeClass("hover");
                                    $(this).parent().addClass("hover")
                                }).mouseout(function() {
                                    $(menu).find("LI.hover").removeClass("hover")
                                });
                                $(document).keypress(function(e) {
                                    switch (e.keyCode) {
                                        case 38:
                                            if ($(menu).find("LI.hover").size() == 0) {
                                                $(menu).find("LI:last").addClass("hover")
                                            } else {
                                                $(menu).find("LI.hover").removeClass("hover").prevAll("LI:not(.disabled)").eq(0).addClass("hover");
                                                if ($(menu).find("LI.hover").size() == 0) {
                                                    $(menu).find("LI:last").addClass("hover")
                                                }
                                            }
                                            break;
                                        case 40:
                                            if ($(menu).find("LI.hover").size() == 0) {
                                                $(menu).find("LI:first").addClass("hover")
                                            } else {
                                                $(menu).find("LI.hover").removeClass("hover").nextAll("LI:not(.disabled)").eq(0).addClass("hover");
                                                if ($(menu).find("LI.hover").size() == 0) {
                                                    $(menu).find("LI:first").addClass("hover")
                                                }
                                            }
                                            break;
                                        case 13:
                                            $(menu).find("LI.hover A").trigger("click");
                                            break;
                                        case 27:
                                            $(document).trigger("click");
                                            break
                                        }
                                });
                                $("#" + o.menu).find("A").unbind("click");
                                $("#" + o.menu).find("LI:not(.disabled) A").click(function() {
                                    $(document).unbind("click").unbind("keypress");
                                    $(".contextMenu").hide();
                                    if (callback) {
                                        callback($(this).attr("href").substr(1), $(srcElement), {x: x - offset.left, y: y - offset.top, docX: x, docY: y})
                                    }
                                    return false
                                });
                                setTimeout(function() {
                                    $(document).click(function() {
                                        $(document).unbind("click").unbind("keypress");
                                        $(menu).fadeOut(o.outSpeed);
                                        return false
                                    })
                                }, 0)
                            }
                        })
                    });
                    if ($.browser.mozilla) {
                        $("#" + o.menu).each(function() {
                            $(this).css({MozUserSelect: "none"})
                        })
                    } else {
                        if ($.browser.msie) {
                            $("#" + o.menu).each(function() {
                                $(this).bind("selectstart.disableTextSelect", function() {
                                    return false
                                })
                            })
                        } else {
                            $("#" + o.menu).each(function() {
                                $(this).bind("mousedown.disableTextSelect", function() {
                                    return false
                                })
                            })
                        }
                    }
                    $(el).add($("UL.contextMenu")).bind("contextmenu", function() {
                        return false
                    })
                });
                return $(this)
            }, disableContextMenuItems: function(o) {
                if (o == undefined) {
                    $(this).find("LI").addClass("disabled");
                    return($(this))
                }
                $(this).each(function() {
                    if (o != undefined) {
                        var d = o.split(",");
                        for (var i = 0; i < d.length; i++) {
                            $(this).find('A[href="' + d[i] + '"]').parent().addClass("disabled")
                        }
                    }
                });
                return($(this))
            }, enableContextMenuItems: function(o) {
                if (o == undefined) {
                    $(this).find("LI.disabled").removeClass("disabled");
                    return($(this))
                }
                $(this).each(function() {
                    if (o != undefined) {
                        var d = o.split(",");
                        for (var i = 0; i < d.length; i++) {
                            $(this).find('A[href="' + d[i] + '"]').parent().removeClass("disabled")
                        }
                    }
                });
                return($(this))
            }, disableContextMenu: function() {
                $(this).each(function() {
                    $(this).addClass("disabled")
                });
                return($(this))
            }, enableContextMenu: function() {
                $(this).each(function() {
                    $(this).removeClass("disabled")
                });
                return($(this))
            }, destroyContextMenu: function() {
                $(this).each(function() {
                    $(this).unbind("mousedown").unbind("mouseup")
                });
                return($(this))
            }})
    })(jQuery)
}
if (typeof console == "undefined") {
    var console = {};
    console.log = function(a) {
        return
    }
}
function KMDelegateOption(a, b) {
    this.RunDefaultHandler = a;
    this.ClientDelegateName = b;
    this.Clone = function(c, d) {
        this.RunDefaultHandler = c;
        if (jQuery.isArray(d)) {
            this.ClientDelegateName = d.slice()
        } else {
            this.ClientDelegateName = d
        }
    }
}
KMDirectionTurn = {};
KMDirectionTurn.UTurnPatterns = ["U-turn", "demi-tour"];
KMDirectionTurn.LeftTurnPatterns = ["Turn left", "Tourner à gauche"];
KMDirectionTurn.RightTurnPatterns = ["Turn right", "Tourner à droite"];
KMDirectionTurn.LeftRampPatterns = ["Bear left", "ramp left", "Prendre à gauche", "la gauche"];
KMDirectionTurn.RightRampPatterns = ["Bear right", "ramp right", "Prendre à droite", "la droite"];
KMDirectionTurn.StraightPatterns = ["Keep straight", "Continuer"];
KMDirectionTurn.DepartPatterns = ["Depart", "Départ"];
KMDirectionTurn.ArrivePatterns = ["Arrive", "Arrivée"];
KMDirectionTurn.IsTextMatchedToPattern = function(c, f) {
    if (jQuery.isArray(c) && !String.IsNullOrEmpty(f)) {
        for (var b = 0; b < c.length; b++) {
            var e = c[b];
            var d = new RegExp(e, "gi");
            var a = f.match(d);
            if (a != null && a.length > 0) {
                return true
            }
        }
    }
    return false
};
KMDirectionTurn.GetDirectionTurnType = function(a) {
    if (KMDirectionTurn.IsTextMatchedToPattern(KMDirectionTurn.UTurnPatterns, a)) {
        return KMDirectionTurnType.UTurn
    }
    if (KMDirectionTurn.IsTextMatchedToPattern(KMDirectionTurn.LeftTurnPatterns, a)) {
        return KMDirectionTurnType.LeftTurn
    }
    if (KMDirectionTurn.IsTextMatchedToPattern(KMDirectionTurn.RightTurnPatterns, a)) {
        return KMDirectionTurnType.RightTurn
    }
    if (KMDirectionTurn.IsTextMatchedToPattern(KMDirectionTurn.LeftRampPatterns, a)) {
        return KMDirectionTurnType.LeftRamp
    }
    if (KMDirectionTurn.IsTextMatchedToPattern(KMDirectionTurn.RightRampPatterns, a)) {
        return KMDirectionTurnType.RightRamp
    }
    if (KMDirectionTurn.IsTextMatchedToPattern(KMDirectionTurn.StraightPatterns, a)) {
        return KMDirectionTurnType.Straight
    }
    if (KMDirectionTurn.IsTextMatchedToPattern(KMDirectionTurn.DepartPatterns, a)) {
        return KMDirectionTurnType.Depart
    }
    if (KMDirectionTurn.IsTextMatchedToPattern(KMDirectionTurn.ArrivePatterns, a)) {
        return KMDirectionTurnType.Arrive
    }
    return KMDirectionTurnType.None
};
var KMDirectionTurnType = {None: 0, UTurn: 1, LeftTurn: 2, RightTurn: 3, LeftRamp: 4, RightRamp: 5, Straight: 6, Depart: 7, Arrive: 8};
String.IsNullOrEmpty = function(a) {
    if (a) {
        if (typeof (a) == "string") {
            if (a.length > 0) {
                return false
            }
        }
        if (a != null) {
            return false
        }
    }
    return true
};
String.prototype.Trim = function() {
    return this.replace(/^\s\s*/, "").replace(/\s\s*$/, "")
};
KMObject = {};
KMObject.Extend = function(c, a) {
    function b() {
    }
    b.prototype = a.prototype;
    c.prototype = new b();
    c.prototype.constructor = c;
    c.baseConstructor = a;
    c.superClass = a.prototype
};
function KMRouteSegment() {
    this.SegmentType = KMRouteSegmentType.Unknown;
    this.DestinationIndex = -1;
    this.IndexArray = [];
    this.LegArray = []
}
var KMRouteSegmentType = {Unknown: 0, Destination: 1, Leg: 2};
GetQueryStringVariable = function(a) {
    var c = window.location.search.substring(1);
    var d = c.split("&");
    for (var b = 0; b < d.length; b++) {
        var e = d[b].split("=");
        if (e[0] == a) {
            return e[1]
        }
    }
    return""
};
DebugPointArray = function(b) {
    if (jQuery.isArray(b)) {
        var a = "";
        for (var c = 0; c < b.length; c++) {
            a += b[c].Debug()
        }
        return a
    }
    return""
};
DebugArray = function(a) {
    if (jQuery.isArray(a)) {
        var b = "";
        for (var c = 0; c < a.length; c++) {
            b += "[" + a[c] + "]"
        }
        return b
    }
    return""
};
FloatEquals = function(o, n, k) {
    var d = false;
    var f = Math.floor(o);
    var e = Math.floor(n);
    if (f != e) {
        return false
    }
    var b = Math.pow(10, k);
    var c = Math.floor(o * b);
    var a = Math.floor(n * b);
    if (c == a) {
        return true
    }
    var h = String(o).length;
    var g = String(n).length;
    if (h >= g) {
        d = String(o).indexOf(String(n)) == 0
    } else {
        d = String(n).indexOf(String(o)) == 0
    }
    if (d) {
        return true
    }
    var q = ChopFloatToPrecision(o, k);
    var p = ChopFloatToPrecision(n, k);
    d = q == p;
    if (d) {
        return true
    }
    var m = parseFloat(o).toFixed(k);
    var l = parseFloat(n).toFixed(k);
    d = m == l;
    return d
};
GetFloatPrecision = function(a) {
    var b = new String(a);
    if (b.indexOf(".") > -1) {
        return b.length - b.indexOf(".") - 1
    } else {
        return 0
    }
};
ChopFloatToPrecision = function(b, d) {
    var c = GetFloatPrecision(b);
    if (c == 0 || c <= d) {
        return b
    }
    var e = new String(b);
    var a = e.length;
    var h = e.indexOf(".");
    var f = a - (c - d);
    var g = e.substr(0, f);
    return parseFloat(g)
};
AddressKindOfEquals = function(f, e) {
    if (String.IsNullOrEmpty(f) || String.IsNullOrEmpty(e)) {
        return false
    }
    var d = f.replace(/\,/gi, "").replace(/\./gi, "");
    var h = e.replace(/\,/gi, "").replace(/\./gi, "");
    if (String.IsNullOrEmpty(d) || String.IsNullOrEmpty(h)) {
        return false
    }
    var g = new RegExp(h, "gi");
    var c = d.match(g);
    if (c != null && c.length > 0) {
        return true
    }
    g = new RegExp(d, "gi");
    c = h.match(g);
    if (c != null && c.length > 0) {
        return true
    }
    return false
};
AddressIndexInArray = function(c, b) {
    if (jQuery.isArray(b)) {
        for (var d = 0; d < b.length; d++) {
            if (AddressKindOfEquals(c, b[d])) {
                return d
            }
        }
    }
    return -1
};
VEShapeLayer.prototype.ReferenceID = null;
VEShapeLayer.prototype.Group = null;
VEShapeLayer.prototype.GeocodeIndex = null;
VEShape.prototype.ReferenceID = null;
VEShape.prototype.ShapeLayerID = null;
VEShape.prototype.IsClustered = false;
VEShape.prototype.IsInMapView = false;
VEShape.prototype.Payload = null;
VEShape.prototype.Group = null;
VELatLongRectangle.prototype.Centre = null;
VELatLongRectangle.prototype.Zoom = null;
VEPixel.prototype.IntX = function() {
    return this.x.toFixed()
};
VEPixel.prototype.IntY = function() {
    return this.y.toFixed()
};
VEPixel.prototype.Debug = function() {
    return"(" + this.IntX() + "," + this.IntY() + ")"
};
VEPixel.prototype.IndexInArray = function(a) {
    if (jQuery.isArray(a)) {
        for (var c = 0; c < a.length - 1; c++) {
            var e = a[c];
            var b = a[c + 1];
            var f = false;
            var d = false;
            if (e.IntX() <= b.IntX()) {
                if (this.IntX() >= e.IntX() && this.IntX() <= b.IntX()) {
                    f = true
                }
            } else {
                if (this.IntX() >= b.IntX() && this.IntX() <= e.IntX()) {
                    f = true
                }
            }
            if (e.IntY() <= b.IntY()) {
                if (this.IntY() >= e.IntY() && this.IntY() <= b.IntY()) {
                    d = true
                }
            } else {
                if (this.IntY() >= b.IntY() && this.IntY() <= e.IntY()) {
                    d = true
                }
            }
            if (f && d) {
                return(c + 1)
            }
        }
    }
    return -1
};
VELatLong.prototype.Debug = function() {
    return"(" + this.Latitude + "," + this.Longitude + ")"
};
VELatLong.prototype.KindOfEquals = function(a, b) {
    if (b === undefined) {
        b = 6
    }
    if (FloatEquals(this.Latitude, a.Latitude, b) && FloatEquals(this.Longitude, a.Longitude, b)) {
        return true
    }
    if (FloatEquals(this.Latitude, a.Latitude, b - 1) && FloatEquals(this.Longitude, a.Longitude, b - 1)) {
        return true
    }
    return false
};
VELatLong.prototype.KindOfInArray = function(a) {
    if (jQuery.isArray(a)) {
        for (var b = 0; b < a.length; b++) {
            if (a[b].KindOfEquals(this)) {
                return b
            }
        }
    }
    return -1
};
VELatLongRectangle.prototype.Debug = function() {
    return"TopLeft: " + this.TopLeftLatLong.Debug() + ", BottomRight: " + this.BottomRightLatLong.Debug()
};
VEMap.prototype.GetShapeGuidFromPrimitiveID = function(a) {
    var d = a.replace(/[^_]/g, "").length;
    if (d == 3) {
        var c = a.lastIndexOf("_");
        var b = a.substring(0, c);
        return b
    }
    return a
};
VEMap.prototype.LatLongToPixelArray = function(b) {
    var c = [];
    for (var a = 0; a < b.length; a++) {
        c.push(this.LatLongToPixel(b[a], this.GetZoomLevel()))
    }
    return c
};
VEMap.prototype.PixelToLatLongArray = function(b) {
    var c = [];
    for (var a = 0; a < b.length; a++) {
        c.push(this.PixelToLatLong(b[a]))
    }
    return c
};
VERoute.prototype.GetLocations = function() {
    var a = [];
    if (this.RouteLegs != null) {
        for (var b = 0; b <= this.RouteLegs.length - 1; b++) {
            a.push(this.RouteLegs[b].StartLocation)
        }
        a.push(this.RouteLegs[this.RouteLegs.length - 1].EndLocation)
    }
    return a
};
VERoute.prototype.GetShapePointsOfAllLegs = function() {
    if (this.RouteLegs != null && this.ShapePoints != null) {
        var f = new Array(this.RouteLegs.length);
        for (i = 0; i <= this.RouteLegs.length - 1; i++) {
            f[i] = [];
            var d = this.RouteLegs[i];
            var e = d.StartLocation;
            var b = d.EndLocation;
            var a = 0;
            for (var c = 0; c < this.ShapePoints.length; c++) {
                if (e.KindOfEquals(this.ShapePoints[c])) {
                    a = 1
                }
                if (a == 1) {
                    f[i].push(this.ShapePoints[c])
                }
                if (b.KindOfEquals(this.ShapePoints[c])) {
                    a = 2;
                    f[i].push(this.ShapePoints[c])
                }
                if (a == 2) {
                    break
                }
            }
        }
        return f
    }
    return null
};
VERoute.prototype.GetShapePointsOfLeg = function(a) {
    if (this.RouteLegs != null && this.ShapePoints != null) {
        var b = this.GetShapePointsOfAllLegs();
        if (b != null) {
            if (a > 0 && a < b.length) {
                return b[a]
            }
        }
    }
    return null
};
VERoute.prototype.GetRouteSegmentArray = function(f) {
    if (this.RouteLegs == null || !jQuery.isArray(this.RouteLegs)) {
        return null
    }
    if (!jQuery.isArray(f)) {
        return null
    }
    var h = this.GetLocations();
    var c = [];
    for (var e = 0; e < f.length; e++) {
        var l = f[e];
        var g = l.KindOfInArray(h);
        c.push(g)
    }
    var m = [];
    var d = -1;
    var b = -1;
    for (var e = 0; e < c.length; e++) {
        b = d;
        d = c[e];
        if (e == 0) {
            var k = new KMRouteSegment();
            k.SegmentType = KMRouteSegmentType.Destination;
            k.DestinationIndex = e;
            k.IndexArray = null;
            k.LegArray = null;
            m.push(k)
        }
        if (e > 0) {
            if (d - b >= 1) {
                var a = new KMRouteSegment();
                a.SegmentType = KMRouteSegmentType.Leg;
                a.DestinationIndex = -1;
                a.IndexArray = [];
                a.LegArray = [];
                for (j = b; j <= d - 1; j++) {
                    a.IndexArray.push(j);
                    a.LegArray.push(this.RouteLegs[j])
                }
                m.push(a)
            }
            var k = new KMRouteSegment();
            k.SegmentType = KMRouteSegmentType.Destination;
            k.DestinationIndex = e;
            k.IndexArray = null;
            k.LegArray = null;
            m.push(k)
        }
    }
    return m
};
function KMCacheManager() {
    var d;
    var c = "divDataCache";
    function e() {
        if (!d && GetQueryStringVariable("state") != "clear") {
            try {
                d = new JSTONE(JSON)
            } catch (f) {
            }
        }
    }
    function b(f) {
        if (f != null && typeof (f) == "string") {
            f = f.replace(/'/gi, "");
            f = f.replace(/#/gi, "");
            f = f.replace(/\$/gi, "");
            f = f.replace(/%/gi, "");
            f = f.replace(/\^/gi, "");
            f = f.replace(/!/gi, "");
            f = f.replace(/</gi, "");
            f = f.replace(/>/gi, "");
            f = f.replace(/~/gi, "");
            f = f.replace(/"/gi, "");
            f = f.replace(/\//gi, "");
            f = f.replace(/\*/gi, "")
        }
        return f
    }
    function a(f) {
        if (f != null && typeof (f) == "string") {
            f = b(f);
            f = f.replace(/;/gi, "")
        }
        return f
    }
    this.Save = function(f, g) {
        e();
        if (d == undefined || d == null) {
            return""
        }
        d.write(f, g)
    };
    this.Retrieve = function(f) {
        e();
        if (d == undefined || d == null) {
            return""
        }
        return d.read(f)
    };
    this.SetClientCookie = function(h, l, g, n, k, m) {
        var f = new Array();
        if (h != null && l != null) {
            f.push(a(h) + "=" + a(l))
        }
        if (g != null) {
            f.push("expires=" + g)
        }
        if (n != null) {
            f.push("path=" + n)
        }
        if (k != null) {
            f.push("domain=" + k)
        }
        if (m != null && m) {
            f.push("secure")
        }
        document.cookie = f.join("; ")
    };
    this.GetClientCookie = function() {
        return b(document.cookie)
    };
    this.GetClientCookieByName = function(f) {
        var l = document.cookie.split(";");
        var m = f + "=";
        var k = null;
        for (var h = 0; h < l.length; h++) {
            var g = l[h];
            while (g.charAt(0) == " ") {
                g = g.substring(1, g.length)
            }
            if (g.indexOf(m) == 0) {
                k = g.substring(m.length, g.length)
            }
        }
        return k
    };
    this.SaveObjectToClientCache = function(h, k) {
        if (typeof k != "object") {
            return
        }
        if (String.IsNullOrEmpty(h)) {
            return
        }
        var g = JSON.stringify(k);
        if (jQuery("#" + c).length == 0) {
            var l = document.createElement("div");
            l.setAttribute("id", c);
            jQuery(l).css("display", "none");
            jQuery(l).appendTo("body")
        }
        if (jQuery("#" + h).length == 0) {
            var f = document.createElement("div");
            f.setAttribute("id", h);
            jQuery("#" + c).append(f)
        }
        jQuery("#" + h).text(g)
    };
    this.GetObjectFromClientCache = function(g) {
        if (String.IsNullOrEmpty(g)) {
            return null
        }
        if (jQuery("#" + g).length == 0) {
            return null
        }
        var f = jQuery("#" + g).text();
        var k = null;
        try {
            k = JSON.parse(f)
        } catch (h) {
            return null
        }
        return k
    }
}
function KMClusterManager(mapInstance, shapeLayerManager, shapeManager) {
    var _clusterManager = this;
    var _mapInstance = mapInstance;
    var _shapeLayerManager = shapeLayerManager;
    var _shapeManager = shapeManager;
    var _clusterShapeLayer = null;
    var _clusterMapDelegateOption = new KMDelegateOption(true, "");
    this.Debug = true;
    this.SetClusterShapeLayer = function(shapeLayer, image) {
        _clusterShapeLayer = shapeLayer;
        var options = new VEClusteringOptions();
        options.Callback = this.OnClusterMapHandler;
        if (!String.IsNullOrEmpty(image)) {
            var customIcon = new VECustomIconSpecification();
            customIcon.Image = image;
            options.Icon = customIcon
        }
        _clusterShapeLayer.SetClusteringConfiguration(VEClusteringType.Grid, options)
    };
    this.SetClusterShapeLayerByID = function(shapeLayerID, image) {
        var shapeLayer = _shapeLayerManager.GetShapeLayer(shapeLayerID);
        this.SetClusterShapeLayer(shapeLayer, image)
    };
    this.GetClusterShapes = function() {
        if (_clusterShapeLayer != null) {
            return _clusterShapeLayer.GetClusteredShapes(VEClusteringType.Grid)
        }
        return null
    };
    this.SetClusterMapDelegateOption = function(option) {
        _clusterMapDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName)
    };
    this.OnClusterMapHandler = function(clusters) {
        if (_clusterMapDelegateOption.RunDefaultHandler) {
            if (_clusterManager.Debug) {
                console.log("KMClusterManager.OnClusterMapHandler: Number of clusters: %s", clusters.length)
            }
        }
        if (jQuery.isArray(_clusterMapDelegateOption.ClientDelegateName)) {
            for (var i = 0; i < _clusterMapDelegateOption.ClientDelegateName.length; i++) {
                var delegate = _clusterMapDelegateOption.ClientDelegateName[i];
                if (!String.IsNullOrEmpty(delegate)) {
                    eval(delegate)(_clusterManager, clusters)
                }
            }
        } else {
            if (!String.IsNullOrEmpty(_clusterMapDelegateOption.ClientDelegateName)) {
                eval(_clusterMapDelegateOption.ClientDelegateName)(_clusterManager, clusters)
            }
        }
    }
}
function KMListManager(listParentDiv) {
    var _listParentDiv = listParentDiv;
    var _listItemMouseOverDelegateOption = new KMDelegateOption(true, "");
    var _listItemMouseOutDelegateOption = new KMDelegateOption(true, "");
    var _listItemMouseOverCSSClass = null;
    var _listItemMouseOutCSSClass = null;
    this.ItemCount = null;
    this.SetListItemMouseOverDelegate = function(option) {
        _listItemMouseOverDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName)
    };
    this.SetListItemMouseOutDelegate = function(option) {
        _listItemMouseOutDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName)
    };
    this.ListItemMouseOverCSSClass = function(cssClass) {
        _listItemMouseOverCSSClass = cssClass
    };
    this.ListItemMouseOutCSSClass = function(cssClass) {
        _listItemMouseOutCSSClass = cssClass
    };
    this.CreateList = function(veShapeLayer, listItemDataBoundDelegate) {
        this.ItemCount = veShapeLayer.GetShapeCount();
        if (_listParentDiv == null) {
            return
        }
        if (this.ItemCount == 0) {
            return
        }
        if (String.IsNullOrEmpty(listItemDataBoundDelegate)) {
            return
        }
        jQuery("#" + _listParentDiv).empty();
        for (var i = 0; i < this.ItemCount; i++) {
            var veShape = veShapeLayer.GetShapeByIndex(i);
            var itemDiv = jQuery(document.createElement("div"));
            var id = "div_" + veShape.ReferenceID;
            jQuery(itemDiv).attr("id", id);
            BindHoverEvents(itemDiv);
            jQuery("#" + _listParentDiv).append(itemDiv);
            eval(listItemDataBoundDelegate)(veShape, itemDiv)
        }
    };
    function GetShapeId(divElement) {
        var shapeId = null;
        if (divElement != null) {
            shapeId = divElement.id.replace("div_", "")
        }
        return shapeId
    }
    function ListItemMouseOver(e) {
        var target = e.currentTarget;
        var shapeId = GetShapeId(target);
        if (_listItemMouseOverCSSClass != null) {
            jQuery(target).addClass(_listItemMouseOverCSSClass)
        }
        if (!String.IsNullOrEmpty(_listItemMouseOverDelegateOption.ClientDelegateName)) {
            eval(_listItemMouseOverDelegateOption.ClientDelegateName)(e, shapeId)
        }
    }
    function ListItemMouseOut(e) {
        var target = e.currentTarget;
        var shapeId = GetShapeId(target);
        if (_listItemMouseOutCSSClass != null) {
            jQuery(target).addClass(_listItemMouseOutCSSClass)
        }
        if (!String.IsNullOrEmpty(_listItemMouseOutDelegateOption.ClientDelegateName)) {
            eval(_listItemMouseOutDelegateOption.ClientDelegateName)(e, shapeId)
        }
    }
    function BindHoverEvents(div) {
        jQuery(div).bind("mouseover", ListItemMouseOver);
        jQuery(div).bind("mouseout", ListItemMouseOut)
    }}
function KMMapManager() {
    var _mapManager = this;
    var _mapInstance;
    var _shapeLayerManager;
    var _shapeManager;
    var _clusterManager;
    var _resizeDelegateOption = new KMDelegateOption(true, "");
    var _changeMapStyleDelegateOption = new KMDelegateOption(true, "");
    var _changeViewDelegateOption = new KMDelegateOption(true, "");
    var _initModeDelegateOption = new KMDelegateOption(true, "");
    var _startPanDelegateOption = new KMDelegateOption(true, "");
    var _endPanDelegateOption = new KMDelegateOption(true, "");
    var _startZoomDelegateOption = new KMDelegateOption(true, "");
    var _endZoomDelegateOption = new KMDelegateOption(true, "");
    var _clickDelegateOption = new KMDelegateOption(true, "");
    var _doubleClickDelegateOption = new KMDelegateOption(true, "");
    var _mouseOverDelegateOption = new KMDelegateOption(true, "");
    var _mouseOutDelegateOption = new KMDelegateOption(true, "");
    var _obliqueEnterDelegateOption = new KMDelegateOption(true, "");
    var _obliqueLeaveDelegateOption = new KMDelegateOption(true, "");
    var _errorDelegateOption = new KMDelegateOption(true, "");
    this.MapInstance = null;
    this.MapDivName = null;
    this.MapElement = null;
    this.ShapeLayerManager = null;
    this.ShapeManager = null;
    this.ClusterManager = null;
    this.Debug = true;
    this.GetMap = function(divName, centerLatitude, centerLongitude, zoom, onLoadMap, enhancedRoad) {
        this.MapDivName = divName;
        this.MapElement = document.getElementById(this.MapDivName);
        _mapInstance = new VEMap(this.MapDivName);
        _mapInstance.SetCredentials("AlJDEjAOEuVn4uRC3A7qIuyf5BZFJ6t_gs-axzZGpF55fjHkG6eLsnlnZMMcKwkW");
        this.MapInstance = _mapInstance;
        _shapeLayerManager = new KMShapeLayerManager(this.MapInstance);
        this.ShapeLayerManager = _shapeLayerManager;
        _shapeManager = new KMShapeManager(this.MapInstance, this.ShapeLayerManager);
        this.ShapeManager = _shapeManager;
        _clusterManager = new KMClusterManager(this.MapInstance, this.ShapeLayerManager, this.ShapeManager);
        this.ClusterManager = _clusterManager;
        if (!String.IsNullOrEmpty(onLoadMap)) {
            _mapInstance.onLoadMap = onLoadMap
        }
        if (enhancedRoad === undefined) {
            enhancedRoad = true
        }
        var mapOptions = new VEMapOptions();
        mapOptions.DashboardColor = "black";
        mapOptions.UseEnhancedRoadStyle = true;
        mapOptions.EnableBirdseye = false;
        _mapInstance.LoadMap(new VELatLong(centerLatitude, centerLongitude), zoom, VEMapStyle.Road, false, VEMapMode.Mode2D, false, 0, mapOptions);
        _mapInstance.SetScaleBarDistanceUnit(VEDistanceUnit.Kilometers);
        _mapInstance.AttachEvent("onresize", this.OnResizeHandler);
        _mapInstance.AttachEvent("onchangemapstyle", this.OnChangeMapStyleHandler);
        _mapInstance.AttachEvent("onchangeview", this.OnChangeViewHandler);
        _mapInstance.AttachEvent("oninitmode", this.OnInitModeHandler);
        _mapInstance.AttachEvent("onstartpan", this.OnStartPanHandler);
        _mapInstance.AttachEvent("onendpan", this.OnEndPanHandler);
        _mapInstance.AttachEvent("onstartzoom", this.OnStartZoomHandler);
        _mapInstance.AttachEvent("onendzoom", this.OnEndZoomHandler);
        _mapInstance.AttachEvent("onclick", this.OnClickHandler);
        _mapInstance.AttachEvent("ondoubleclick", this.OnDoubleClickHandler);
        _mapInstance.AttachEvent("onmouseover", this.OnMouseOverHandler);
        _mapInstance.AttachEvent("onmouseout", this.OnMouseOutHandler);
        _mapInstance.AttachEvent("onobliqueenter", this.OnObliqueEnterHandler);
        _mapInstance.AttachEvent("onobliqueleave", this.OnObliqueLeaveHandler);
        _shapeManager.UpdateShapesInMapView()
    };
    this.AddControl = function(control) {
        if (control == null) {
            return
        }
        _mapInstance.AddControl(control)
    };
    this.DetachResizeHandler = function() {
        _mapInstance.DetachEvent("onresize", this.OnResizeHandler)
    };
    this.DetachChangeMapStyleHandler = function() {
        _mapInstance.DetachEvent("onchangemapstyle", this.OnChangeMapStyleHandler)
    };
    this.DetachChangeViewHandler = function() {
        _mapInstance.DetachEvent("onchangeview", this.OnChangeViewHandler)
    };
    this.DetachInitModeHandler = function() {
        _mapInstance.DetachEvent("oninitmode", this.OnInitModeHandler)
    };
    this.DetachStartPanHandler = function() {
        _mapInstance.DetachEvent("onstartpan", this.OnStartPanHandler)
    };
    this.DetachEndPanHandler = function() {
        _mapInstance.DetachEvent("onendpan", this.OnEndPanHandler)
    };
    this.DetachStartZoomHandler = function() {
        _mapInstance.DetachEvent("onstartzoom", this.OnStartZoomHandler)
    };
    this.DetachEndZoomHandler = function() {
        _mapInstance.DetachEvent("onendzoom", this.OnEndZoomHandler)
    };
    this.DetachClickHandler = function() {
        _mapInstance.DetachEvent("onclick", this.OnClickHandler)
    };
    this.DetachDoubleClickHandler = function() {
        _mapInstance.DetachEvent("ondoubleclick", this.OnDoubleClickHandler)
    };
    this.DetachMouseOverHandler = function() {
        _mapInstance.DetachEvent("onmouseover", this.OnMouseOverHandler)
    };
    this.DetachMouseOutHandler = function() {
        _mapInstance.DetachEvent("onmouseout", this.OnMouseOutHandler)
    };
    this.DetachObliqueEnterHandler = function() {
        _mapInstance.DetachEvent("onobliqueenter", this.OnObliqueEnterHandler)
    };
    this.DetachObliqueLeaveHandler = function() {
        _mapInstance.DetachEvent("onobliqueleave", this.OnObliqueLeaveHandler)
    };
    this.SetResizeDelegateOption = function(option) {
        _resizeDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName);
        _mapInstance.AttachEvent("onresize", this.OnResizeHandler)
    };
    this.SetChangeMapStyleDelegateOption = function(option) {
        _changeMapStyleDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName);
        _mapInstance.AttachEvent("onchangemapstyle", this.OnChangeMapStyleHandler)
    };
    this.SetChangeViewDelegateOption = function(option) {
        _changeViewDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName);
        _mapInstance.AttachEvent("onchangeview", this.OnChangeViewHandler)
    };
    this.SetInitModeDelegateOption = function(option) {
        _initModeDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName);
        _mapInstance.AttachEvent("oninitmode", this.OnInitModeHandler)
    };
    this.SetStartPanDelegateOption = function(option) {
        _startPanDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName);
        _mapInstance.AttachEvent("onstartpan", this.OnStartPanHandler)
    };
    this.SetEndPanDelegateOption = function(option) {
        _endPanDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName);
        _mapInstance.AttachEvent("onendpan", this.OnEndPanHandler)
    };
    this.SetStartZoomDelegateOption = function(option) {
        _startZoomDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName);
        _mapInstance.AttachEvent("onstartzoom", this.OnStartZoomHandler)
    };
    this.SetEndZoomDelegateOption = function(option) {
        _endZoomDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName);
        _mapInstance.AttachEvent("onendzoom", this.OnEndZoomHandler)
    };
    this.SetClickDelegateOption = function(option) {
        _clickDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName);
        _mapInstance.AttachEvent("onclick", this.OnClickHandler)
    };
    this.SetDoubleClickDelegateOption = function(option) {
        _doubleClickDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName);
        _mapInstance.AttachEvent("ondoubleclick", this.OnDoubleClickHandler)
    };
    this.SetMouseOverDelegateOption = function(option) {
        _mouseOverDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName);
        _mapInstance.AttachEvent("onmouseover", this.OnMouseOverHandler)
    };
    this.SetMouseOutDelegateOption = function(option) {
        _mouseOutDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName);
        _mapInstance.AttachEvent("onmouseout", this.OnMouseOutHandler)
    };
    this.SetObliqueEnterDelegateOption = function(option) {
        _obliqueEnterDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName);
        _mapInstance.AttachEvent("onobliqueenter", this.OnObliqueEnterHandler)
    };
    this.SetObliqueLeaveDelegateOption = function(option) {
        _obliqueLeaveDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName);
        _mapInstance.AttachEvent("onobliqueleave", this.OnObliqueLeaveHandler)
    };
    this.SetErrorDelegateOption = function(option) {
        _errorDelegateOption.Clone(option.RunDefaultHandler, option.ClientDelegateName);
        _mapInstance.AttachEvent("onerror", this.OnErrorHandler)
    };
    this.OnResizeHandler = function(e) {
        if (_resizeDelegateOption.RunDefaultHandler) {
            _shapeManager.UpdateShapesInMapView();
            if (_mapManager.Debug) {
                console.log("KMMapManager.OnResizeHandler: %s", _mapInstance.GetMapView().Debug())
            }
        }
        HandleClientDelegate(_resizeDelegateOption, e)
    };
    this.OnChangeMapStyleHandler = function(e) {
        if (_changeMapStyleDelegateOption.RunDefaultHandler) {
            if (_mapManager.Debug) {
                console.log("KMMapManager.OnChangeMapStyleHandler: %s", _mapInstance.GetMapView().Debug())
            }
        }
        HandleClientDelegate(_changeMapStyleDelegateOption, e)
    };
    this.OnChangeViewHandler = function(e) {
        if (_changeViewDelegateOption.RunDefaultHandler) {
            _shapeManager.UpdateShapesInMapView();
            if (_mapManager.Debug) {
                console.log("KMMapManager.OnChangeViewHandler: %s", _mapInstance.GetMapView().Debug())
            }
        }
        HandleClientDelegate(_changeViewDelegateOption, e)
    };
    this.OnInitModeHandler = function(e) {
        if (_initModeDelegateOption.RunDefaultHandler) {
            _shapeManager.UpdateShapesInMapView();
            if (_mapManager.Debug) {
                console.log("KMMapManager.OnInitModeHandler: %s", _mapInstance.GetMapView().Debug())
            }
        }
        HandleClientDelegate(_initModeDelegateOption, e)
    };
    this.OnStartPanHandler = function(e) {
        if (_startPanDelegateOption.RunDefaultHandler) {
            if (_mapManager.Debug) {
                console.log("KMMapManager.OnStartPanHandler: %s", _mapInstance.GetMapView().Debug())
            }
        }
        HandleClientDelegate(_startPanDelegateOption, e)
    };
    this.OnEndPanHandler = function(e) {
        if (_endPanDelegateOption.RunDefaultHandler) {
            if (_mapManager.Debug) {
                console.log("KMMapManager.OnEndPanHandler: %s", _mapInstance.GetMapView().Debug())
            }
        }
        HandleClientDelegate(_endPanDelegateOption, e)
    };
    this.OnStartZoomHandler = function(e) {
        if (_startZoomDelegateOption.RunDefaultHandler) {
            if (_mapManager.Debug) {
                console.log("KMMapManager.OnStartZoomHandler: %s", _mapInstance.GetMapView().Debug())
            }
        }
        HandleClientDelegate(_startZoomDelegateOption, e)
    };
    this.OnEndZoomHandler = function(e) {
        if (_endZoomDelegateOption.RunDefaultHandler) {
            if (_mapManager.Debug) {
                console.log("KMMapManager.OnEndZoomHandler: %s", _mapInstance.GetMapView().Debug())
            }
        }
        HandleClientDelegate(_endZoomDelegateOption, e)
    };
    this.OnClickHandler = function(e) {
        if (_clickDelegateOption.RunDefaultHandler) {
            if (_mapManager.Debug) {
                console.log("KMMapManager.OnClickHandler: %s => %s", e.eventName, e.elementID)
            }
        }
        HandleClientDelegate(_clickDelegateOption, e)
    };
    this.OnDoubleClickHandler = function(e) {
        if (_doubleClickDelegateOption.RunDefaultHandler) {
            var zoom = _mapInstance.GetZoomLevel();
            if (_mapManager.Debug) {
                console.log("KMMapManager.OnDoubleClickHandler: %s => %s", e.eventName, e.elementID)
            }
        }
        HandleClientDelegate(_doubleClickDelegateOption, e)
    };
    this.OnMouseOverHandler = function(e) {
        if (_mouseOverDelegateOption.RunDefaultHandler) {
            if (_mapManager.Debug) {
                console.log("KMMapManager.OnMouseOverHandler: %s => %s", e.eventName, e.elementID)
            }
        }
        HandleClientDelegate(_mouseOverDelegateOption, e)
    };
    this.OnMouseOutHandler = function(e) {
        if (_mouseOutDelegateOption.RunDefaultHandler) {
            if (_mapManager.Debug) {
                console.log("KMMapManager.OnMouseOutHandler: %s => %s", e.eventName, e.elementID)
            }
        }
        HandleClientDelegate(_mouseOutDelegateOption, e)
    };
    this.OnObliqueEnterHandler = function(e) {
        if (_obliqueEnterDelegateOption.RunDefaultHandler) {
            if (_mapManager.Debug) {
                console.log("KMMapManager.OnObliqueEnterHandler: %s", _mapInstance.GetMapView().Debug())
            }
        }
        HandleClientDelegate(_obliqueEnterDelegateOption, e)
    };
    this.OnObliqueLeaveHandler = function(e) {
        if (_obliqueLeaveDelegateOption.RunDefaultHandler) {
            if (_mapManager.Debug) {
                console.log("KMMapManager.OnObliqueLeaveHandler: %s", _mapInstance.GetMapView().Debug())
            }
        }
        HandleClientDelegate(_obliqueLeaveDelegateOption, e)
    };
    this.OnErrorHandler = function(e) {
        if (_errorDelegateOption.RunDefaultHandler) {
            if (_mapManager.Debug) {
                console.log("KMMapManager.OnErrorHandler: %s", e.error)
            }
        }
        HandleClientDelegate(_errorDelegateOption, e)
    };
    HandleClientDelegate = function(delegateOption, e) {
        if (jQuery.isArray(delegateOption.ClientDelegateName)) {
            for (var i = 0; i < delegateOption.ClientDelegateName.length; i++) {
                var delegate = delegateOption.ClientDelegateName[i];
                if (!String.IsNullOrEmpty(delegate)) {
                    eval(delegate)(_mapManager, e)
                }
            }
        } else {
            if (!String.IsNullOrEmpty(delegateOption.ClientDelegateName)) {
                eval(delegateOption.ClientDelegateName)(_mapManager, e)
            }
        }
    }
}
KMNavigationManager = {};
KMNavigationManager.GetCurrentViewURL = function(b) {
    if (b == null) {
        return null
    }
    var e = window.location.href.replace(window.location.search, "");
    var k = b.GetMapView();
    var h = k.TopLeftLatLong;
    var a = k.BottomRightLatLong;
    var d = b.GetCenter();
    var l = h.Latitude + ":" + h.Longitude + ":" + a.Latitude + ":" + a.Longitude;
    var g = d.Latitude + ":" + d.Longitude;
    var f = b.GetZoomLevel();
    jQuery.query.SET("mv", l);
    jQuery.query.SET("c", g);
    jQuery.query.SET("z", f);
    return e + jQuery.query.toString()
};
KMNavigationManager.GetMapViewFromQueryString = function() {
    var f = window.location.href;
    var a = jQuery.query.get("mv");
    var g = a.split(":");
    if (g == null || g.length != 4) {
        return null
    }
    var b = null;
    try {
        var e = new VELatLong(g[0], g[1]);
        var c = new VELatLong(g[2], g[3]);
        b = new VELatLongRectangle(e, c);
        b.Centre = KMNavigationManager.GetMapCenterFromQueryString();
        b.Zoom = KMNavigationManager.GetMapZoomFromQueryString()
    } catch (d) {
        console.log("KMNavigationManager.GetMapViewFromQueryString: %s", g.toString());
        return null
    }
    return b
};
KMNavigationManager.GetMapCenterFromQueryString = function() {
    var e = jQuery.query.get("c");
    var a = e.split(":");
    if (a == null || a.length != 2) {
        return null
    }
    var d = null;
    try {
        d = new VELatLong(a[0], a[1])
    } catch (b) {
        console.log("KMNavigationManager.GetMapCenterFromQueryString: %s", a.toString());
        return null
    }
    return d
};
KMNavigationManager.GetMapZoomFromQueryString = function() {
    return jQuery.query.get("z")
};
function KMShapeLayerManager(b) {
    var c = b;
    var a = new Hashtable();
    this.DefaultGroupName = "{9E2CA069-A266-4ff4-AAD7-C9CEDA52B47B}";
    this.Debug = true;
    this.AddShapeLayer = function(h, f, g, e) {
        if (this.GetShapeLayer(h) == null) {
            var d = new VEShapeLayer();
            d.ReferenceID = h;
            d.Group = !String.IsNullOrEmpty(f) ? f : this.DefaultGroupName;
            if (!String.IsNullOrEmpty(g)) {
                d.SetTitle(g)
            }
            if (!String.IsNullOrEmpty(e)) {
                d.SetDescription(e)
            }
            c.AddShapeLayer(d);
            a.put(h, d)
        }
    };
    this.GetShapeLayerCollection = function() {
        return a.values()
    };
    this.ShowShapeLayer = function(e) {
        var d = this.GetShapeLayer(e);
        if (d != null) {
            d.Show()
        }
    };
    this.HideShapeLayer = function(e) {
        var d = this.GetShapeLayer(e);
        if (d != null) {
            d.Hide()
        }
    };
    this.IsShapeLayerVisible = function(e) {
        var d = this.GetShapeLayer(e);
        if (d != null) {
            return d.IsVisible()
        }
        return false
    };
    this.GetShapeCount = function(e) {
        var d = this.GetShapeLayer(e);
        if (d != null) {
            return d.GetShapeCount()
        }
        return 0
    };
    this.GetShapeLayer = function(d) {
        return a.get(d)
    };
    this.DeleteShapeLayer = function(e) {
        var d = this.GetShapeLayer(e);
        if (d != null) {
            c.DeleteShapeLayer(d);
            a.remove(e)
        }
    };
    this.ClearShapeLayer = function(e) {
        var d = this.GetShapeLayer(e);
        if (d != null) {
            d.DeleteAllShapes()
        }
    };
    this.GetShapeLayersByGroup = function(f) {
        var e = [];
        for (var g in a.keys()) {
            var d = a.get(g);
            if (d != null && d.Group == f) {
                e.push(d)
            }
        }
        return e
    };
    this.DeleteShapeLayersByGroup = function(e) {
        var d = this.GetShapeLayersByGroup(e);
        if (d != null && d.length > 0) {
            for (var f in d) {
                this.DeleteShapeLayer(f)
            }
        }
    };
    this.ShowShapeLayersByGroup = function(e) {
        var d = this.GetShapeLayersByGroup(e);
        if (d != null && d.length > 0) {
            for (var f in d) {
                this.ShowShapeLayer(f)
            }
        }
    };
    this.HideShapeLayersByGroup = function(e) {
        var d = this.GetShapeLayersByGroup(e);
        if (d != null && d.length > 0) {
            for (var f in d) {
                this.HideShapeLayer(f)
            }
        }
    }
}
KMShapeLayerManager.CreateList = function(listParentDiv, veShapeList, listItemDataBoundDelegate) {
    if (listParentDiv == null) {
        return
    }
    jQuery("#" + listParentDiv).empty();
    if (veShapeList == null || veShapeList.length == 0) {
        return
    }
    if (String.IsNullOrEmpty(listItemDataBoundDelegate)) {
        return
    }
    for (var i = 0; i < veShapeList.length; i++) {
        var veShape = veShapeList[i];
        var itemDiv = jQuery(document.createElement("div"));
        var id = veShape.ReferenceID;
        jQuery(itemDiv).attr("id", id);
        jQuery("#" + listParentDiv).append(itemDiv);
        eval(listItemDataBoundDelegate)(veShape, itemDiv)
    }
};
function KMShapeManager(b, e) {
    var d = b;
    var a = e;
    var c = new Hashtable();
    this.DefaultShapeLayerID = "{B3A792C8-21D8-4a9b-87FF-1C6D0B6C4D2D}";
    this.Debug = true;
    this.AddShapes = function(g, f) {
        var l = a.GetShapeLayer(g);
        if (l != null) {
            var k = new Hashtable();
            if (jQuery.isArray(f)) {
                for (var h = 0; h < f.length; h++) {
                    if (!String.IsNullOrEmpty(f[h].ReferenceID)) {
                        k.put(f[h].ReferenceID, f[h])
                    }
                }
            } else {
                if (!String.IsNullOrEmpty(f.ReferenceID)) {
                    k.put(f.ReferenceID, f)
                }
            }
            c.put(g, k);
            l.AddShape(f)
        }
    };
    this.DeleteShapes = function(f) {
        var g = a.GetShapeLayer(f);
        if (g != null) {
            c.remove(f);
            g.DeleteAllShapes()
        }
    };
    this.DeleteShapesByGroup = function(g, m) {
        var l = a.GetShapeLayer(g);
        var k = c.get(shapeLaterID);
        if (l != null && k != null && !String.IsNUllOrEmpty(m)) {
            var f = this.GetShapesByGroup(g, m);
            for (var h = 0; h < f.length; h++) {
                k.remove(f[h].ReferenceID);
                l.DeleteShape(f[h])
            }
        }
    };
    this.GetShapeByElementID = function(f) {
        var g = null;
        if (f != null) {
            g = d.GetShapeByID(f)
        }
        return g
    };
    this.GetShapeByReferenceID = function(h, k) {
        var f = null;
        if (h != null && k != null) {
            var g = c.get(h);
            if (g != null) {
                f = g.get(k)
            }
        }
        return f
    };
    this.GetShapesByShapeLayerID = function(g) {
        var f = c.get(g);
        if (f != null) {
            return f.values()
        }
        return null
    };
    this.GetShapesByGroup = function(l, m) {
        var k = c.get(l);
        if (k != null && !String.IsNUllOrEmpty(m)) {
            var f = [];
            var g = k.values();
            for (var h = 0; h < g.length; h++) {
                if (g[h].Group == m) {
                    f.push(g[h])
                }
            }
            return f
        }
        return null
    };
    this.IsPointInMapView = function(f) {
        var g = d.GetMapView();
        var m = g.TopLeftLatLong;
        var o = g.BottomRightLatLong;
        var n = Math.min(m.Latitude, o.Latitude);
        var l = Math.max(m.Latitude, o.Latitude);
        var h = Math.min(m.Longitude, o.Longitude);
        var k = Math.max(m.Longitude, o.Longitude);
        if (f != null) {
            if (f.Latitude >= n && f.Latitude <= l && f.Longitude >= h && f.Longitude <= k) {
                return true
            }
        }
        return false
    };
    this.UpdateShapesInMapView = function() {
        var k = c.values();
        for (var l = 0; l < k.length; l++) {
            var g = k[l].values();
            for (var h = 0; h < g.length; h++) {
                var f = g[h];
                var m = f.GetPoints();
                f.IsInMapView = this.IsPointInMapView(m[0])
            }
        }
    }
}
function onGeocodeClick(address1) {
    setVal();
    address = address1;
    StartGeocoding(address)
}
function StartGeocoding(address) {
    map.Find(null, address, null, null, null, null, null, null, null, null, GeocodeCallback)
}
function GeocodeCallback(shapeLayer, findResults, places, moreResults, errorMsg) {
    var resHtml = "";
    if (places == null) {
        alert((errorMsg == null) ? "There were no results" : errorMsg);
        return
    }
    var place = places[0];
    var location = place.LatLong;
    var latitude = location.Latitude;
    var longitude = location.Longitude;
    lati = latitude;
    longi = longitude;
    var pin = new VEShape(VEShapeType.Pushpin, location);
    pin.SetCustomIcon("<div class='main-mh-pin main-mh-pin-3d'></div>");
    map.AddShape(pin)
}
function ShowTurnByTurn(route) {
    setVal();
    var turns = "";
    turns += "<h3>Distance:</strong> " + route.Distance.toFixed(1) + " km";
    if (g_ShowTravelTime) {
        turns += "<br/><strong>Time:</strong> " + GetTime(route.Time)
    }
    turns += "</h3>";
    turns += '<div><span style="display:inline-block;padding-right: 3px;" class="casu-from-pin"></span><span style="font-weight: bold;">' + jQuery("#txtStart_" + global_direction_ctr).val() + "</span></div>";
    var legs = route.RouteLegs;
    var leg = null;
    var turnNum = 0;
    turns += "<ol>";
    for (var i = 0; i < legs.length; i++) {
        leg = legs[i];
        var legNum = i + 1;
        var turn = null;
        var legDistance = null;
        var itineraryLength = leg.Itinerary.Items.length;
        for (var j = 0; j < leg.Itinerary.Items.length; j++) {
            var routeTurnID = g_RouteTurnIDTemplate.replace("{0}", i).replace("{1}", j);
            turnNum++;
            turn = leg.Itinerary.Items[j];
            var turnShape = turn.Shape;
            var position = turn.LatLong;
            var shapeIconHtml = "";
            var padding = (turnNum < 10) ? "&nbsp;" : "";
            shapeIconHtml = g_TurnIconHtmlTemplate.replace("{0}", padding + turnNum + padding);
            var shape = new VEShape(VEShapeType.Pushpin, turn.LatLong);
            shape.SetCustomIcon(shapeIconHtml);
            shape.SetZIndex(2003, 2000);
            shape.Hide();
            g_RouteShapeLayer.AddShape(shape);
            turns += "<li id='{0}' routeturntroup='1' shape_id='{1}'>".replace("{0}", routeTurnID).replace("{1}", shape.guid);
            turns += turn.Text;
            legDistance = turn.Distance;
            if (legDistance > 0) {
                turns += " (" + legDistance.toFixed(1) + " km";
                if (g_ShowTravelTime) {
                    if (turn.Time != null) {
                        turns += "; " + GetTime(turn.Time)
                    }
                }
                turns += ")"
            }
            turns += "</li>"
        }
    }
    turns += "</ol>";
    turns += '<div><span style="display:inline-block;padding-right: 3px;" class="casu-to-pin"></span><span style="font-weight: bold;">' + jQuery("#txtEnd_" + global_direction_ctr).val() + "</span></div>";
    jQuery("[routeturntroup=1]").live("mouseover", RouteTurn_OnMouseOver);
    jQuery("[routeturntroup=1]").live("mouseout", RouteTurn_OnMouseOut);
    jQuery("[routeturntroup=1]").live("click", RouteTurn_OnClick);
    SetDirections(turns);
    $("#directionsBox_" + global_direction_ctr).show();
    showDirections(global_direction_ctr)
}
function GetDirections() {
    setVal();
    g_RouteShapeLayer.DeleteAllShapes();
    g_DragPointShapeLayer.DeleteAllShapes();
    g_DestinationShapeLayer.DeleteAllShapes();
    g_PointArray = [];
    g_NumberOfGotRoute = 1;
    var locations = [];
    locations.push(jQuery("#txtStart_" + global_direction_ctr).val());
    dinfo = $("#direction_input_" + global_direction_ctr);
    if (dinfo) {
        flds = $(dinfo).val().split("`");
        if (flds[1] == "true") {
            locations.push(new VELatLong(parseFloat(flds[3]), parseFloat(flds[4])))
        } else {
            locations.push(flds[2])
        }
    }
    var options = GetRouteOptions();
    map.GetDirections(locations, options)
}
function OnGotRoute(route) {
    setVal();
    if (route.RouteLegs == null || route.RouteLegs.length == 0) {
        return
    }
    if (g_ShowTurnByTurn) {
        ShowTurnByTurn(route)
    }
    if (g_PointArray.length == 0) {
        g_PointArray.push(route.RouteLegs[0].StartLocation);
        g_PointArray.push(route.RouteLegs[0].EndLocation)
    }
    if (g_NumberOfGotRoute == 1) {
        map.SetMapView(route.ShapePoints)
    }
    g_NumberOfGotRoute++;
    var shape = new VEShape(VEShapeType.Polyline, route.ShapePoints);
    shape.ReferenceID = "Route";
    shape.SetLineColor(new VEColor(24, 93, 198, 0.6));
    shape.SetLineWidth(5);
    shape.HideIcon();
    shape.SetTitle(g_RouteTitle);
    shape.SetZIndex(1000, 2000);
    g_RouteShapeLayer.AddShape(shape);
    var startPoint = new VEShape(VEShapeType.Pushpin, route.RouteLegs[0].StartLocation);
    startPoint.ReferenceID = "0";
    startPoint.SetCustomIcon('<div class="casu-from-pin"></div>');
    startPoint.SetZIndex(2001, 2000);
    g_RouteShapeLayer.AddShape(startPoint);
    var numLegs = route.RouteLegs.length;
    if (numLegs > 1) {
        for (i = 1; i <= numLegs - 1; i++) {
            var wayPoint = new VEShape(VEShapeType.Pushpin, route.RouteLegs[i].StartLocation);
            wayPoint.ReferenceID = i;
            wayPoint.SetCustomIcon("<div class='casu-poi-via'></div>");
            wayPoint.SetZIndex(2001, 2000);
            g_RouteShapeLayer.AddShape(wayPoint);
            var primitiveID = wayPoint.Primitives[0].iid;
            jQuery("#" + primitiveID).contextMenu({menu: "myRouteContextMenu"}, function(action, el, pos) {
                RouteContextMenuAction(action, el, pos)
            })
        }
    }
    var endPoint = new VEShape(VEShapeType.Pushpin, route.RouteLegs[numLegs - 1].EndLocation);
    endPoint.ReferenceID = numLegs;
    endPoint.SetCustomIcon('<div class="casu-to-pin"></div>');
    endPoint.SetZIndex(2002, 2000);
    g_RouteShapeLayer.AddShape(endPoint);
    map.AttachEvent("onmouseover", HandleMouseOverRoute)
}
function HandleMouseOverRoute(e) {
    setValByMapElemId(e);
    if (e.elementID != null) {
        if (map.GetShapeByID(e.elementID).GetTitle().match(g_RouteTitle)) {
            map.DetachEvent("onmouseover", HandleMouseOverRoute);
            var x = e.mapX;
            var y = e.mapY;
            var LL = map.PixelToLatLong(new VEPixel(x, y));
            g_DragPoint = new VEShape(VEShapeType.Pushpin, LL);
            g_DragPoint.SetCustomIcon("<div class='casu-poi-via'></div>");
            g_DragPoint.SetZIndex(1000, 2000);
            g_DragPointShapeLayer.AddShape(g_DragPoint);
            map.AttachEvent("onmousemove", HandleMouseOverRouteMove)
        }
    }
}
function HandleMouseOverRouteMove(e) {
    setValByMapElemId(e);
    if (e.elementID != null) {
        if (map.GetShapeByID(e.elementID).GetTitle().match(g_RouteTitle)) {
            var x = e.mapX;
            var y = e.mapY;
            var LL = map.PixelToLatLong(new VEPixel(x, y));
            g_DragPoint.SetPoints(LL);
            map.AttachEvent("onmousedown", HandleMouseDown)
        }
    } else {
        map.DetachEvent("onmousedown", HandleMouseDown);
        map.DetachEvent("onmousemove", HandleMouseOverRouteMove);
        g_DragPointShapeLayer.DeleteAllShapes();
        map.AttachEvent("onmouseover", HandleMouseOverRoute)
    }
}
function HandleMouseDown(e) {
    setValByMapElemId(e);
    if (e.elementID != null && e.leftMouseButton) {
        map.DetachEvent("onmousemove", HandleMouseOverRouteMove);
        map.AttachEvent("onmousemove", HandleDragPointMove);
        map.AttachEvent("onmouseup", HandleMouseUp)
    }
}
function HandleDragPointMove(e) {
    setValByMapElemId(e);
    var x = e.mapX;
    var y = e.mapY;
    var LL = map.PixelToLatLong(new VEPixel(x, y));
    g_DragPoint.SetPoints(LL);
    return true
}
function HandleMouseUp(e) {
    setValByMapElemId(e);
    map.DetachEvent("onmousemove", HandleDragPointMove);
    map.DetachEvent("onmouseup", HandleMouseUp);
    if (e.leftMouseButton) {
        var x = e.mapX;
        var y = e.mapY;
        var LL = map.PixelToLatLong(new VEPixel(x, y));
        g_PointArray.splice(g_PointArray.length - 1, 0, LL);
        g_DragPoint = null;
        g_DragPointShapeLayer.DeleteAllShapes();
        Reroute()
    }
}
function Reroute() {
    setVal();
    g_RouteShapeLayer.DeleteAllShapes();
    var options = GetRouteOptions();
    map.GetDirections(g_PointArray, options)
}
function GetRouteOptions() {
    var options = new VERouteOptions();
    options.DrawRoute = false;
    options.DistanceUnit = VERouteDistanceUnit.Kilometer;
    options.SetBestMapView = false;
    options.RouteCallback = OnGotRoute;
    return options
}
function SetDirections(s) {
    var d = document.getElementById("directions_" + global_direction_ctr);
    d.innerHTML = s
}
function GetTime(time) {
    if (time == null) {
        return("")
    }
    if (time > 60) {
        var seconds = time % 60;
        var minutes = time - seconds;
        minutes = minutes / 60;
        if (minutes > 60) {
            var minLeft = minutes % 60;
            var hours = minutes - minLeft;
            hours = hours / 60;
            return(hours + " hour(s), " + minLeft + " minute(s), " + seconds + " second(s)")
        } else {
            return(minutes + " minutes, " + seconds + " seconds")
        }
    } else {
        return(time + " seconds")
    }
}
function RouteTurn_OnMouseOver(e) {
    setValByMapElemId(e);
    var id = e.srcElement.id;
    if (!String.IsNullOrEmpty(id)) {
        jQuery("#" + id).removeClass().addClass("RouteTurnHoverStyle");
        var shape_id = jQuery("#" + id).attr("shape_id");
        var shape = g_RouteShapeLayer.GetShapeByID(shape_id);
        if (shape != null) {
            shape.Show()
        }
    }
}
function RouteTurn_OnMouseOut(e) {
    setValByMapElemId(e);
    var id = e.srcElement.id;
    if (!String.IsNullOrEmpty(id)) {
        jQuery("#" + id).removeClass().addClass("RouteTurnStyle");
        var shape_id = jQuery("#" + id).attr("shape_id");
        var shape = g_RouteShapeLayer.GetShapeByID(shape_id);
        if (shape != null) {
            shape.Hide()
        }
    }
}
function RouteTurn_OnClick(e) {
    setValByMapElemId(e);
    var id = e.srcElement.id;
    if (!String.IsNullOrEmpty(id)) {
        var shape_id = jQuery("#" + id).attr("shape_id");
        var shape = g_RouteShapeLayer.GetShapeByID(shape_id);
        if (shape != null) {
            g_mapManager.MapInstance.SetCenter(shape.GetPoints()[0])
        }
    }
}
function MapContextMenuAction(action, el, pos) {
    if (action == "add_destination") {
        if (g_PointArray != null && g_PointArray.length > 0) {
            setVal();
            var shapeIconHtml = "<img src='../images/blue_dot.gif'>";
            var pixel = new VEPixel(pos.x + 5, pos.y + 5);
            var shape = new VEShape(VEShapeType.Pushpin, map.PixelToLatLong(pixel));
            shape.SetCustomIcon(shapeIconHtml);
            shape.SetZIndex(2004, 2000);
            shape.Hide();
            var LL = map.PixelToLatLong(pixel);
            g_PointArray.splice(g_PointArray.length - 1, 0, LL);
            g_DragPoint = null;
            g_DragPointShapeLayer.DeleteAllShapes();
            Reroute()
        }
    }
}
function RouteContextMenuAction(action, el, pos) {
    if (action == "delete_destination") {
        setVal();
        var primitiveID = jQuery(el).attr("id");
        var shape = map.GetShapeByID(primitiveID);
        if (shape != null) {
            if (g_PointArray != null && g_PointArray.length > 0) {
                if (shape.ReferenceID > 0 && shape.ReferenceID < g_PointArray.length - 1) {
                    g_PointArray.splice(shape.ReferenceID, 1);
                    g_RouteShapeLayer.DeleteShape(shape);
                    g_DragPoint = null;
                    g_DragPointShapeLayer.DeleteAllShapes();
                    Reroute()
                }
            }
        }
    }
}
function callGetDirections(ctr) {
    $("#directionsBox_" + global_direction_ctr).hide();
    global_direction_ctr = ctr;
    setVal();
    GetDirections()
}
function hideDirections(ctr) {
    global_direction_ctr = ctr;
    $("#directions_" + global_direction_ctr).slideUp(300)
}
function showDirections(ctr) {
    global_direction_ctr = ctr;
    $("#directions_" + global_direction_ctr).slideDown(300)
}
function setVal() {
    map = mapList[global_direction_ctr];
    g_RouteShapeLayer = routeShapeLayerList[global_direction_ctr];
    g_DragPointShapeLayer = dragPointShapeLayerList[global_direction_ctr];
    g_DestinationShapeLayer = destinationShapeLayerList[global_direction_ctr];
    g_RouteTitle = routeTitleList[global_direction_ctr]
}
function setValByMapElemId(e) {
    var i;
    for (i = 0; i < mapList.length; i++) {
        var k = mapList[i].GetShapeByID(e.elementID);
        if (mapList[i].GetShapeByID(e.elementID) != null) {
            global_direction_ctr = i;
            setVal();
            break
        }
    }
}
var g_debugMode = false;
var g_mapManager = null;
var g_mapManager = new KMMapManager();
var g_RouteShapeLayer = null;
var routeShapeLayerList = new Array();
var g_DragPointShapeLayer = null;
var dragPointShapeLayerList = new Array();
var g_DestinationShapeLayer = null;
var destinationShapeLayerList = new Array();
var g_PointArray = null;
var g_RouteTitle = "My_Route";
var routeTitleList = new Array();
var g_DragPoint;
var g_ShowTurnByTurn = true;
var g_ShowTravelTime = false;
var g_RouteTurnIDTemplate = "Route_Turn_{0}_{1}";
var g_TurnIconHtmlTemplate = "<div style=\"background-image: url('/images/turnpointPushpin.png');\" class='drivingDirectionsTurnIcon drivingDirectionsTurnListIcon'><div class='drivingDirectionsTurnIconText'>{0}</div></div>";
var g_NumberOfGotRoute = 0;
var map = null;
var mapList = new Array();
var mapOptions = null;
var pin = null;
var global_direction_ctr = 0;
function LoadMaps(isb) {
    var interval = setInterval(function() {
        if (eval("typeof VEMap") != "undefined") {
            clearInterval(interval);
            InitMaps(isb)
        }
    }, 250)
}
function InitMaps(isb) {
    $('div[id^="directionsBox"]').each(function() {
        $(this).hide()
    });
    $('div[id^="mapdiv"]').each(function() {
        id = $(this).attr("id");
        idx = id.substring(id.lastIndexOf("_") + 1, id.length);
        var style = $(this).attr("data-style");
        if (id.indexOf("multi") > 0) {
            InitMapMultiPins(id, idx, isb, style)
        } else {
            var lati = $(this).attr("data-lati");
            var longi = $(this).attr("data-longi");
            var zoom = $(this).attr("data-zoom");
            InitMap(id, idx, lati, longi, zoom, style)
        }
    })
}
function InitMap(mapDivId, indx, lati, longi, zoom, style) {
    g_mapManager.Debug = false;
    g_mapManager.GetMap(mapDivId, lati, longi, zoom, null);
    mapList[indx] = g_mapManager.MapInstance;
    pin = new VEShape(VEShapeType.Pushpin, new VELatLong(lati, longi));
    if ("legacy" == style) {
        pin.SetCustomIcon("<div class='main-mh-pin main-mh-pin-3d'></div>")
    } else {
        pin.SetCustomIcon("<div class='default-pin'></div>")
    }
    mapList[indx].AddShape(pin);
    routeShapeLayerList[indx] = new VEShapeLayer();
    mapList[indx].AddShapeLayer(routeShapeLayerList[indx]);
    dragPointShapeLayerList[indx] = new VEShapeLayer();
    mapList[indx].AddShapeLayer(dragPointShapeLayerList[indx]);
    destinationShapeLayerList[indx] = new VEShapeLayer();
    mapList[indx].AddShapeLayer(destinationShapeLayerList[indx]);
    routeTitleList[indx] = "My_Route_" + mapDivId;
    jQuery("#" + mapDivId).contextMenu({menu: mapDivId + "ContextMenu"}, function(action, el, pos) {
        MapContextMenuAction(action, el, pos)
    })
}
function casu_split(e) {
    if (e && e.length) {
        return e.split("`")
    }
    return""
}
function InitMapMultiPins(mapDivId, indx, isb, style) {
    latlonArray = new Array();
    var sumLat = 0;
    var sumLon = 0;
    multipins_clear(indx);
    var map = showAllPins(mapDivId);
    $("#" + mapDivId + "_form input").each(function(idx) {
        flds = casu_split($(this).val());
        var pin = new VEShape(VEShapeType.Pushpin, new VELatLong(flds[2], flds[3]));
        map.AddShape(pin);
        if (isb) {
            if ("legacy" == style) {
                pin.SetCustomIcon("<div class='main-mh-pin main-mh-pin-3d'><span>" + flds[0] + "</span></div>")
            } else {
                pin.SetCustomIcon("<div class='numbers-pin'><span>" + flds[0] + "</span></div>")
            }
            pin.SetTitle(flds[1])
        } else {
            pin.SetCustomIcon("<div class='main-mh-pin main-mh-pin-3d casu_multi_pin'><span></span></div>");
            if (flds[1].length) {
                pin.SetTitle(flds[1]);
                $(".customInfoBox-body").css("height", "15px")
            } else {
                $(".customInfoBox-body").css("height", "44px");
                pin.SetTitle(((flds[4]) ? flds[4] + "<br>" : "") + ((flds[5]) ? flds[5] + "<br>" : "") + ((flds[6]) ? flds[6] : "") + ((flds[7]) ? " (" + flds[7] + ") <br>" : "") + ((flds[8]) ? flds[8] : ""))
            }
        }
        var aId = "map_" + indx + "_address_pin_" + (idx + 1);
        if ($("#" + aId).length) {
            $("#" + aId).attr("pinId", pin.GetID());
            $("#" + aId).attr("mapIdx", indx)
        }
        var dlg = $("<div/>");
        var id = "dialog_" + pin.GetID();
        $(dlg).attr("id", id);
        $(dlg).attr("value", flds[1]);
        $(dlg).attr("style", "display:none; z-index:399;");
        $(dlg).html('<h3 class="wss-widget-text-bold"><br>' + (casu_getLang() == "fr" ? "Adresse" : "Address") + "</h3><p>" + ((flds[4]) ? flds[4] + "<br>" : "") + ((flds[5]) ? flds[5] + "<br>" : "") + ((flds[6]) ? flds[6] : "") + ((flds[7]) ? " (" + flds[7] + ") <br>" : "") + ((flds[8]) ? flds[8] : "") + ("new" == $("#" + mapDivId).attr("data-style") ? '<br><br><a class="multi-map-dir-btn" data-map-id="' + mapDivId + '" data-idx="' + flds[0] + '" data-dialog-id="' + id + '" >Directions</a>' : ""));
        var dinput = $("<input/>");
        $(dinput).attr("type", "hidden");
        $(dinput).attr("value", indx + "`direction_input_" + indx + "`" + flds[9] + "`" + flds[10] + "`" + flds[2] + "`" + flds[3]);
        $(dlg).append(dinput);
        $("body").append(dlg);
        map.AttachEvent("onclick", function(e) {
            if (e.elementID) {
                shape = map.GetShapeByID(e.elementID);
                if (shape) {
                    if (isb) {
                        openMapDialog(shape, e.elementID)
                    } else {
                        map.SetCenterAndZoom(shape.GetPoints()[0], 15);
                        populateDirectionBox("dialog_" + shape.GetID())
                    }
                }
            }
        })
    });
    routeShapeLayerList[indx] = new VEShapeLayer();
    map.AddShapeLayer(routeShapeLayerList[indx]);
    dragPointShapeLayerList[indx] = new VEShapeLayer();
    map.AddShapeLayer(dragPointShapeLayerList[indx]);
    destinationShapeLayerList[indx] = new VEShapeLayer();
    map.AddShapeLayer(destinationShapeLayerList[indx]);
    mapList[indx] = map;
    routeTitleList[indx] = "My_Route_" + mapDivId;
    jQuery("#" + mapDivId).contextMenu({menu: mapDivId + "ContextMenu"}, function(action, el, pos) {
        MapContextMenuAction(action, el, pos)
    })
}
function multipins_clear(indx) {
    $("#txtStart_" + indx).val("");
    $("#txtEnd_" + indx).val("")
}
function showAllPins(e) {
    var map;
    var ctr = 0;
    $("#" + e + "_form input").each(function(idx) {
        ctr++;
        flds = casu_split($(this).val());
        latlonArray[idx] = new VELatLong(flds[2], flds[3])
    });
    latlonCenter = new VELatLong(0, 0);
    map = new VEMap(e);
    map.SetCredentials("AlJDEjAOEuVn4uRC3A7qIuyf5BZFJ6t_gs-axzZGpF55fjHkG6eLsnlnZMMcKwkW");
    mapOptions = new VEMapOptions();
    mapOptions.DashboardColor = "black";
    mapOptions.UseEnhancedRoadStyle = true;
    mapOptions.EnableBirdseye = false;
    map.LoadMap(latlonCenter, 15, VEMapStyle.Road, false, VEMapMode.Mode2D, true, 0, mapOptions);
    map.SetMapView(latlonArray);
    map.ClearInfoBoxStyles();
    if (ctr == 1) {
        map.SetZoomLevel(14)
    } else {
        map.SetZoomLevel(map.GetZoomLevel() - 1)
    }
    return map
}
function moveToPin(e) {
    mapIdx = $(e).attr("mapIdx");
    pinId = $(e).attr("pinId");
    map = mapList[mapIdx];
    if (map) {
        shape = map.GetShapeByID(pinId);
        if (shape) {
            map.SetCenterAndZoom(shape.GetPoints()[0], 15)
        }
    }
    populateDirectionBox("dialog_" + pinId)
}
function openMapDialog(shape, eId) {
    t = $("#" + eId);
    if (shape && t) {
        x = $(t).offset().left - $(window).scrollLeft() + 20;
        y = $(t).offset().top - $(window).scrollTop() + 20;
        id = "dialog_" + shape.GetID();
        $("#" + id).dialog({autoOpen: false, resizable: false, title: $("#" + id).attr("value"), width: 220, position: [x, y]});
        populateDirectionBox(id);
        $("#" + id).dialog("open")
    }
}
function populateDirectionBox(dialogId) {
    t = $("#" + dialogId + " input").get(0);
    ta = casu_split($(t).val());
    $("#txtEnd_" + ta[0]).val(ta[3]);
    if ($("#direction_input_" + ta[0])) {
        $("#direction_input_" + ta[0]).remove()
    }
    dinput = $("<input/>");
    $(dinput).attr("id", "direction_input_" + ta[0]);
    $(dinput).attr("type", "hidden");
    $(dinput).attr("value", ta[0] + "`" + ta[2] + "`" + ta[3] + "`" + ta[4] + "`" + ta[5]);
    $("#directionsAddress_" + ta[0]).append(dinput)
}
function casu_getLang() {
    var lang = $("html").attr("lang");
    if (!lang || !lang.length > 0) {
        lang = "en"
    }
    return lang
}
/*
 * jQuery UI 1.8.10
 *
 * Copyright 2011, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI
 */
(function($, undefined) {
    $.ui = $.ui || {};
    if ($.ui.version) {
        return
    }
    $.extend($.ui, {version: "1.8.10", keyCode: {ALT: 18, BACKSPACE: 8, CAPS_LOCK: 20, COMMA: 188, COMMAND: 91, COMMAND_LEFT: 91, COMMAND_RIGHT: 93, CONTROL: 17, DELETE: 46, DOWN: 40, END: 35, ENTER: 13, ESCAPE: 27, HOME: 36, INSERT: 45, LEFT: 37, MENU: 93, NUMPAD_ADD: 107, NUMPAD_DECIMAL: 110, NUMPAD_DIVIDE: 111, NUMPAD_ENTER: 108, NUMPAD_MULTIPLY: 106, NUMPAD_SUBTRACT: 109, PAGE_DOWN: 34, PAGE_UP: 33, PERIOD: 190, RIGHT: 39, SHIFT: 16, SPACE: 32, TAB: 9, UP: 38, WINDOWS: 91}});
    $.fn.extend({_focus: $.fn.focus, focus: function(delay, fn) {
            return typeof delay === "number" ? this.each(function() {
                var elem = this;
                setTimeout(function() {
                    $(elem).focus();
                    if (fn) {
                        fn.call(elem)
                    }
                }, delay)
            }) : this._focus.apply(this, arguments)
        }, scrollParent: function() {
            var scrollParent;
            if (($.browser.msie && (/(static|relative)/).test(this.css("position"))) || (/absolute/).test(this.css("position"))) {
                scrollParent = this.parents().filter(function() {
                    return(/(relative|absolute|fixed)/).test($.curCSS(this, "position", 1)) && (/(auto|scroll)/).test($.curCSS(this, "overflow", 1) + $.curCSS(this, "overflow-y", 1) + $.curCSS(this, "overflow-x", 1))
                }).eq(0)
            } else {
                scrollParent = this.parents().filter(function() {
                    return(/(auto|scroll)/).test($.curCSS(this, "overflow", 1) + $.curCSS(this, "overflow-y", 1) + $.curCSS(this, "overflow-x", 1))
                }).eq(0)
            }
            return(/fixed/).test(this.css("position")) || !scrollParent.length ? $(document) : scrollParent
        }, zIndex: function(zIndex) {
            if (zIndex !== undefined) {
                return this.css("zIndex", zIndex)
            }
            if (this.length) {
                var elem = $(this[0]), position, value;
                while (elem.length && elem[0] !== document) {
                    position = elem.css("position");
                    if (position === "absolute" || position === "relative" || position === "fixed") {
                        value = parseInt(elem.css("zIndex"), 10);
                        if (!isNaN(value) && value !== 0) {
                            return value
                        }
                    }
                    elem = elem.parent()
                }
            }
            return 0
        }, disableSelection: function() {
            return this.bind(($.support.selectstart ? "selectstart" : "mousedown") + ".ui-disableSelection", function(event) {
                event.preventDefault()
            })
        }, enableSelection: function() {
            return this.unbind(".ui-disableSelection")
        }});
    $.each(["Width", "Height"], function(i, name) {
        var side = name === "Width" ? ["Left", "Right"] : ["Top", "Bottom"], type = name.toLowerCase(), orig = {innerWidth: $.fn.innerWidth, innerHeight: $.fn.innerHeight, outerWidth: $.fn.outerWidth, outerHeight: $.fn.outerHeight};
        function reduce(elem, size, border, margin) {
            $.each(side, function() {
                size -= parseFloat($.curCSS(elem, "padding" + this, true)) || 0;
                if (border) {
                    size -= parseFloat($.curCSS(elem, "border" + this + "Width", true)) || 0
                }
                if (margin) {
                    size -= parseFloat($.curCSS(elem, "margin" + this, true)) || 0
                }
            });
            return size
        }
        $.fn["inner" + name] = function(size) {
            if (size === undefined) {
                return orig["inner" + name].call(this)
            }
            return this.each(function() {
                $(this).css(type, reduce(this, size) + "px")
            })
        };
        $.fn["outer" + name] = function(size, margin) {
            if (typeof size !== "number") {
                return orig["outer" + name].call(this, size)
            }
            return this.each(function() {
                $(this).css(type, reduce(this, size, true, margin) + "px")
            })
        }
    });
    function visible(element) {
        return !$(element).parents().andSelf().filter(function() {
            return $.curCSS(this, "visibility") === "hidden" || $.expr.filters.hidden(this)
        }).length
    }
    $.extend($.expr[":"], {data: function(elem, i, match) {
            return !!$.data(elem, match[3])
        }, focusable: function(element) {
            var nodeName = element.nodeName.toLowerCase(), tabIndex = $.attr(element, "tabindex");
            if ("area" === nodeName) {
                var map = element.parentNode, mapName = map.name, img;
                if (!element.href || !mapName || map.nodeName.toLowerCase() !== "map") {
                    return false
                }
                img = $("img[usemap=#" + mapName + "]")[0];
                return !!img && visible(img)
            }
            return(/input|select|textarea|button|object/.test(nodeName) ? !element.disabled : "a" == nodeName ? element.href || !isNaN(tabIndex) : !isNaN(tabIndex)) && visible(element)
        }, tabbable: function(element) {
            var tabIndex = $.attr(element, "tabindex");
            return(isNaN(tabIndex) || tabIndex >= 0) && $(element).is(":focusable")
        }});
    $(function() {
        var body = document.body, div = body.appendChild(div = document.createElement("div"));
        $.extend(div.style, {minHeight: "100px", height: "auto", padding: 0, borderWidth: 0});
        $.support.minHeight = div.offsetHeight === 100;
        $.support.selectstart = "onselectstart" in div;
        body.removeChild(div).style.display = "none"
    });
    $.extend($.ui, {plugin: {add: function(module, option, set) {
                var proto = $.ui[module].prototype;
                for (var i in set) {
                    proto.plugins[i] = proto.plugins[i] || [];
                    proto.plugins[i].push([option, set[i]])
                }
            }, call: function(instance, name, args) {
                var set = instance.plugins[name];
                if (!set || !instance.element[0].parentNode) {
                    return
                }
                for (var i = 0; i < set.length; i++) {
                    if (instance.options[set[i][0]]) {
                        set[i][1].apply(instance.element, args)
                    }
                }
            }}, contains: function(a, b) {
            return document.compareDocumentPosition ? a.compareDocumentPosition(b) & 16 : a !== b && a.contains(b)
        }, hasScroll: function(el, a) {
            if ($(el).css("overflow") === "hidden") {
                return false
            }
            var scroll = (a && a === "left") ? "scrollLeft" : "scrollTop", has = false;
            if (el[scroll] > 0) {
                return true
            }
            el[scroll] = 1;
            has = (el[scroll] > 0);
            el[scroll] = 0;
            return has
        }, isOverAxis: function(x, reference, size) {
            return(x > reference) && (x < (reference + size))
        }, isOver: function(y, x, top, left, height, width) {
            return $.ui.isOverAxis(y, top, height) && $.ui.isOverAxis(x, left, width)
        }})
})(jQuery);
/*
 * jQuery UI Widget 1.8.10
 *
 * Copyright 2011, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Widget
 */
(function($, undefined) {
    if ($.cleanData) {
        var _cleanData = $.cleanData;
        $.cleanData = function(elems) {
            for (var i = 0, elem; (elem = elems[i]) != null; i++) {
                $(elem).triggerHandler("remove")
            }
            _cleanData(elems)
        }
    } else {
        var _remove = $.fn.remove;
        $.fn.remove = function(selector, keepData) {
            return this.each(function() {
                if (!keepData) {
                    if (!selector || $.filter(selector, [this]).length) {
                        $("*", this).add([this]).each(function() {
                            $(this).triggerHandler("remove")
                        })
                    }
                }
                return _remove.call($(this), selector, keepData)
            })
        }
    }
    $.widget = function(name, base, prototype) {
        var namespace = name.split(".")[0], fullName;
        name = name.split(".")[1];
        fullName = namespace + "-" + name;
        if (!prototype) {
            prototype = base;
            base = $.Widget
        }
        $.expr[":"][fullName] = function(elem) {
            return !!$.data(elem, name)
        };
        $[namespace] = $[namespace] || {};
        $[namespace][name] = function(options, element) {
            if (arguments.length) {
                this._createWidget(options, element)
            }
        };
        var basePrototype = new base();
        basePrototype.options = $.extend(true, {}, basePrototype.options);
        $[namespace][name].prototype = $.extend(true, basePrototype, {namespace: namespace, widgetName: name, widgetEventPrefix: $[namespace][name].prototype.widgetEventPrefix || name, widgetBaseClass: fullName}, prototype);
        $.widget.bridge(name, $[namespace][name])
    };
    $.widget.bridge = function(name, object) {
        $.fn[name] = function(options) {
            var isMethodCall = typeof options === "string", args = Array.prototype.slice.call(arguments, 1), returnValue = this;
            options = !isMethodCall && args.length ? $.extend.apply(null, [true, options].concat(args)) : options;
            if (isMethodCall && options.charAt(0) === "_") {
                return returnValue
            }
            if (isMethodCall) {
                this.each(function() {
                    var instance = $.data(this, name), methodValue = instance && $.isFunction(instance[options]) ? instance[options].apply(instance, args) : instance;
                    if (methodValue !== instance && methodValue !== undefined) {
                        returnValue = methodValue;
                        return false
                    }
                })
            } else {
                this.each(function() {
                    var instance = $.data(this, name);
                    if (instance) {
                        instance.option(options || {})._init()
                    } else {
                        $.data(this, name, new object(options, this))
                    }
                })
            }
            return returnValue
        }
    };
    $.Widget = function(options, element) {
        if (arguments.length) {
            this._createWidget(options, element)
        }
    };
    $.Widget.prototype = {widgetName: "widget", widgetEventPrefix: "", options: {disabled: false}, _createWidget: function(options, element) {
            $.data(element, this.widgetName, this);
            this.element = $(element);
            this.options = $.extend(true, {}, this.options, this._getCreateOptions(), options);
            var self = this;
            this.element.bind("remove." + this.widgetName, function() {
                self.destroy()
            });
            this._create();
            this._trigger("create");
            this._init()
        }, _getCreateOptions: function() {
            return $.metadata && $.metadata.get(this.element[0])[this.widgetName]
        }, _create: function() {
        }, _init: function() {
        }, destroy: function() {
            this.element.unbind("." + this.widgetName).removeData(this.widgetName);
            this.widget().unbind("." + this.widgetName).removeAttr("aria-disabled").removeClass(this.widgetBaseClass + "-disabled ui-state-disabled")
        }, widget: function() {
            return this.element
        }, option: function(key, value) {
            var options = key;
            if (arguments.length === 0) {
                return $.extend({}, this.options)
            }
            if (typeof key === "string") {
                if (value === undefined) {
                    return this.options[key]
                }
                options = {};
                options[key] = value
            }
            this._setOptions(options);
            return this
        }, _setOptions: function(options) {
            var self = this;
            $.each(options, function(key, value) {
                self._setOption(key, value)
            });
            return this
        }, _setOption: function(key, value) {
            this.options[key] = value;
            if (key === "disabled") {
                this.widget()[value ? "addClass" : "removeClass"](this.widgetBaseClass + "-disabled ui-state-disabled").attr("aria-disabled", value)
            }
            return this
        }, enable: function() {
            return this._setOption("disabled", false)
        }, disable: function() {
            return this._setOption("disabled", true)
        }, _trigger: function(type, event, data) {
            var callback = this.options[type];
            event = $.Event(event);
            event.type = (type === this.widgetEventPrefix ? type : this.widgetEventPrefix + type).toLowerCase();
            data = data || {};
            if (event.originalEvent) {
                for (var i = $.event.props.length, prop; i; ) {
                    prop = $.event.props[--i];
                    event[prop] = event.originalEvent[prop]
                }
            }
            this.element.trigger(event, data);
            return !($.isFunction(callback) && callback.call(this.element[0], event, data) === false || event.isDefaultPrevented())
        }}
})(jQuery);
(function($, undefined) {
    var uiDialogClasses = "ui-dialog ui-widget ui-widget-content ui-corner-all ", sizeRelatedOptions = {buttons: true, height: true, maxHeight: true, maxWidth: true, minHeight: true, minWidth: true, width: true}, resizableRelatedOptions = {maxHeight: true, maxWidth: true, minHeight: true, minWidth: true}, attrFn = $.attrFn || {val: true, css: true, html: true, text: true, data: true, width: true, height: true, offset: true, click: true};
    $.widget("ui.dialog", {options: {autoOpen: true, buttons: {}, closeOnEscape: true, closeText: "close", dialogClass: "", draggable: true, hide: null, height: "auto", maxHeight: false, maxWidth: false, minHeight: 150, minWidth: 150, modal: false, position: {my: "center", at: "center", collision: "fit", using: function(pos) {
                    var topOffset = $(this).css(pos).offset().top;
                    if (topOffset < 0) {
                        $(this).css("top", pos.top - topOffset)
                    }
                }}, resizable: true, show: null, stack: true, title: "", width: 300, zIndex: 1000}, _create: function() {
            this.originalTitle = this.element.attr("title");
            if (typeof this.originalTitle !== "string") {
                this.originalTitle = ""
            }
            this.options.title = this.options.title || this.originalTitle;
            var self = this, options = self.options, title = options.title || "&#160;", titleId = $.ui.dialog.getTitleId(self.element), uiDialog = (self.uiDialog = $("<div></div>")).appendTo(document.body).hide().addClass(uiDialogClasses + options.dialogClass).css({zIndex: options.zIndex}).attr("tabIndex", -1).css("outline", 0).keydown(function(event) {
                if (options.closeOnEscape && !event.isDefaultPrevented() && event.keyCode && event.keyCode === $.ui.keyCode.ESCAPE) {
                    self.close(event);
                    event.preventDefault()
                }
            }).attr({role: "dialog", "aria-labelledby": titleId}).mousedown(function(event) {
                self.moveToTop(false, event)
            }), uiDialogContent = self.element.show().removeAttr("title").addClass("ui-dialog-content ui-widget-content").appendTo(uiDialog), uiDialogTitlebar = (self.uiDialogTitlebar = $("<div></div>")).addClass("ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix").prependTo(uiDialog), uiDialogTitlebarClose = $('<a href="index.htm#"></a>').addClass("ui-dialog-titlebar-close ui-corner-all").attr("role", "button").hover(function() {
                uiDialogTitlebarClose.addClass("ui-state-hover")
            }, function() {
                uiDialogTitlebarClose.removeClass("ui-state-hover")
            }).focus(function() {
                uiDialogTitlebarClose.addClass("ui-state-focus")
            }).blur(function() {
                uiDialogTitlebarClose.removeClass("ui-state-focus")
            }).click(function(event) {
                self.close(event);
                return false
            }).appendTo(uiDialogTitlebar), uiDialogTitlebarCloseText = (self.uiDialogTitlebarCloseText = $("<span></span>")).addClass("ui-icon ui-icon-closethick").text(options.closeText).appendTo(uiDialogTitlebarClose), uiDialogTitle = $("<span></span>").addClass("ui-dialog-title").attr("id", titleId).html(title).prependTo(uiDialogTitlebar);
            if ($.isFunction(options.beforeclose) && !$.isFunction(options.beforeClose)) {
                options.beforeClose = options.beforeclose
            }
            uiDialogTitlebar.find("*").add(uiDialogTitlebar).disableSelection();
            if (options.draggable && $.fn.draggable) {
                self._makeDraggable()
            }
            if (options.resizable && $.fn.resizable) {
                self._makeResizable()
            }
            self._createButtons(options.buttons);
            self._isOpen = false;
            if ($.fn.bgiframe) {
                uiDialog.bgiframe()
            }
        }, _init: function() {
            if (this.options.autoOpen) {
                this.open()
            }
        }, destroy: function() {
            var self = this;
            if (self.overlay) {
                self.overlay.destroy()
            }
            self.uiDialog.hide();
            self.element.unbind(".dialog").removeData("dialog").removeClass("ui-dialog-content ui-widget-content").hide().appendTo("body");
            self.uiDialog.remove();
            if (self.originalTitle) {
                self.element.attr("title", self.originalTitle)
            }
            return self
        }, widget: function() {
            return this.uiDialog
        }, close: function(event) {
            var self = this, maxZ, thisZ;
            if (false === self._trigger("beforeClose", event)) {
                return
            }
            if (self.overlay) {
                self.overlay.destroy()
            }
            self.uiDialog.unbind("keypress.ui-dialog");
            self._isOpen = false;
            if (self.options.hide) {
                self.uiDialog.hide(self.options.hide, function() {
                    self._trigger("close", event)
                })
            } else {
                self.uiDialog.hide();
                self._trigger("close", event)
            }
            $.ui.dialog.overlay.resize();
            if (self.options.modal) {
                maxZ = 0;
                $(".ui-dialog").each(function() {
                    if (this !== self.uiDialog[0]) {
                        thisZ = $(this).css("z-index");
                        if (!isNaN(thisZ)) {
                            maxZ = Math.max(maxZ, thisZ)
                        }
                    }
                });
                $.ui.dialog.maxZ = maxZ
            }
            return self
        }, isOpen: function() {
            return this._isOpen
        }, moveToTop: function(force, event) {
            var self = this, options = self.options, saveScroll;
            if ((options.modal && !force) || (!options.stack && !options.modal)) {
                return self._trigger("focus", event)
            }
            if (options.zIndex > $.ui.dialog.maxZ) {
                $.ui.dialog.maxZ = options.zIndex
            }
            if (self.overlay) {
                $.ui.dialog.maxZ += 1;
                self.overlay.$el.css("z-index", $.ui.dialog.overlay.maxZ = $.ui.dialog.maxZ)
            }
            saveScroll = {scrollTop: self.element.scrollTop(), scrollLeft: self.element.scrollLeft()};
            $.ui.dialog.maxZ += 1;
            self.uiDialog.css("z-index", $.ui.dialog.maxZ);
            self.element.attr(saveScroll);
            self._trigger("focus", event);
            return self
        }, open: function() {
            if (this._isOpen) {
                return
            }
            var self = this, options = self.options, uiDialog = self.uiDialog;
            self.overlay = options.modal ? new $.ui.dialog.overlay(self) : null;
            self._size();
            self._position(options.position);
            uiDialog.show(options.show);
            self.moveToTop(true);
            if (options.modal) {
                uiDialog.bind("keydown.ui-dialog", function(event) {
                    if (event.keyCode !== $.ui.keyCode.TAB) {
                        return
                    }
                    var tabbables = $(":tabbable", this), first = tabbables.filter(":first"), last = tabbables.filter(":last");
                    if (event.target === last[0] && !event.shiftKey) {
                        first.focus(1);
                        return false
                    } else {
                        if (event.target === first[0] && event.shiftKey) {
                            last.focus(1);
                            return false
                        }
                    }
                })
            }
            $(self.element.find(":tabbable").get().concat(uiDialog.find(".ui-dialog-buttonpane :tabbable").get().concat(uiDialog.get()))).eq(0).focus();
            self._isOpen = true;
            self._trigger("open");
            return self
        }, _createButtons: function(buttons) {
            var self = this, hasButtons = false, uiDialogButtonPane = $("<div></div>").addClass("ui-dialog-buttonpane ui-widget-content ui-helper-clearfix"), uiButtonSet = $("<div></div>").addClass("ui-dialog-buttonset").appendTo(uiDialogButtonPane);
            self.uiDialog.find(".ui-dialog-buttonpane").remove();
            if (typeof buttons === "object" && buttons !== null) {
                $.each(buttons, function() {
                    return !(hasButtons = true)
                })
            }
            if (hasButtons) {
                $.each(buttons, function(name, props) {
                    props = $.isFunction(props) ? {click: props, text: name} : props;
                    var button = $('<button type="button"></button>').click(function() {
                        props.click.apply(self.element[0], arguments)
                    }).appendTo(uiButtonSet);
                    $.each(props, function(key, value) {
                        if (key === "click") {
                            return
                        }
                        if (key in attrFn) {
                            button[key](value)
                        } else {
                            button.attr(key, value)
                        }
                    });
                    if ($.fn.button) {
                        button.button()
                    }
                });
                uiDialogButtonPane.appendTo(self.uiDialog)
            }
        }, _makeDraggable: function() {
            var self = this, options = self.options, doc = $(document), heightBeforeDrag;
            function filteredUi(ui) {
                return{position: ui.position, offset: ui.offset}
            }
            self.uiDialog.draggable({cancel: ".ui-dialog-content, .ui-dialog-titlebar-close", handle: ".ui-dialog-titlebar", containment: "document", start: function(event, ui) {
                    heightBeforeDrag = options.height === "auto" ? "auto" : $(this).height();
                    $(this).height($(this).height()).addClass("ui-dialog-dragging");
                    self._trigger("dragStart", event, filteredUi(ui))
                }, drag: function(event, ui) {
                    self._trigger("drag", event, filteredUi(ui))
                }, stop: function(event, ui) {
                    options.position = [ui.position.left - doc.scrollLeft(), ui.position.top - doc.scrollTop()];
                    $(this).removeClass("ui-dialog-dragging").height(heightBeforeDrag);
                    self._trigger("dragStop", event, filteredUi(ui));
                    $.ui.dialog.overlay.resize()
                }})
        }, _makeResizable: function(handles) {
            handles = (handles === undefined ? this.options.resizable : handles);
            var self = this, options = self.options, position = self.uiDialog.css("position"), resizeHandles = (typeof handles === "string" ? handles : "n,e,s,w,se,sw,ne,nw");
            function filteredUi(ui) {
                return{originalPosition: ui.originalPosition, originalSize: ui.originalSize, position: ui.position, size: ui.size}
            }
            self.uiDialog.resizable({cancel: ".ui-dialog-content", containment: "document", alsoResize: self.element, maxWidth: options.maxWidth, maxHeight: options.maxHeight, minWidth: options.minWidth, minHeight: self._minHeight(), handles: resizeHandles, start: function(event, ui) {
                    $(this).addClass("ui-dialog-resizing");
                    self._trigger("resizeStart", event, filteredUi(ui))
                }, resize: function(event, ui) {
                    self._trigger("resize", event, filteredUi(ui))
                }, stop: function(event, ui) {
                    $(this).removeClass("ui-dialog-resizing");
                    options.height = $(this).height();
                    options.width = $(this).width();
                    self._trigger("resizeStop", event, filteredUi(ui));
                    $.ui.dialog.overlay.resize()
                }}).css("position", position).find(".ui-resizable-se").addClass("ui-icon ui-icon-grip-diagonal-se")
        }, _minHeight: function() {
            var options = this.options;
            if (options.height === "auto") {
                return options.minHeight
            } else {
                return Math.min(options.minHeight, options.height)
            }
        }, _position: function(position) {
            var myAt = [], offset = [0, 0], isVisible;
            if (position) {
                if (typeof position === "string" || (typeof position === "object" && "0" in position)) {
                    myAt = position.split ? position.split(" ") : [position[0], position[1]];
                    if (myAt.length === 1) {
                        myAt[1] = myAt[0]
                    }
                    $.each(["left", "top"], function(i, offsetPosition) {
                        if (+myAt[i] === myAt[i]) {
                            offset[i] = myAt[i];
                            myAt[i] = offsetPosition
                        }
                    });
                    position = {my: myAt.join(" "), at: myAt.join(" "), offset: offset.join(" ")}
                }
                position = $.extend({}, $.ui.dialog.prototype.options.position, position)
            } else {
                position = $.ui.dialog.prototype.options.position
            }
            isVisible = this.uiDialog.is(":visible");
            if (!isVisible) {
                this.uiDialog.show()
            }
            this.uiDialog.css({top: 0, left: 0}).position($.extend({of: window}, position));
            if (!isVisible) {
                this.uiDialog.hide()
            }
        }, _setOptions: function(options) {
            var self = this, resizableOptions = {}, resize = false;
            $.each(options, function(key, value) {
                self._setOption(key, value);
                if (key in sizeRelatedOptions) {
                    resize = true
                }
                if (key in resizableRelatedOptions) {
                    resizableOptions[key] = value
                }
            });
            if (resize) {
                this._size()
            }
            if (this.uiDialog.is(":data(resizable)")) {
                this.uiDialog.resizable("option", resizableOptions)
            }
        }, _setOption: function(key, value) {
            var self = this, uiDialog = self.uiDialog;
            switch (key) {
                case"beforeclose":
                    key = "beforeClose";
                    break;
                case"buttons":
                    self._createButtons(value);
                    break;
                case"closeText":
                    self.uiDialogTitlebarCloseText.text("" + value);
                    break;
                case"dialogClass":
                    uiDialog.removeClass(self.options.dialogClass).addClass(uiDialogClasses + value);
                    break;
                case"disabled":
                    if (value) {
                        uiDialog.addClass("ui-dialog-disabled")
                    } else {
                        uiDialog.removeClass("ui-dialog-disabled")
                    }
                    break;
                case"draggable":
                    var isDraggable = uiDialog.is(":data(draggable)");
                    if (isDraggable && !value) {
                        uiDialog.draggable("destroy")
                    }
                    if (!isDraggable && value) {
                        self._makeDraggable()
                    }
                    break;
                case"position":
                    self._position(value);
                    break;
                case"resizable":
                    var isResizable = uiDialog.is(":data(resizable)");
                    if (isResizable && !value) {
                        uiDialog.resizable("destroy")
                    }
                    if (isResizable && typeof value === "string") {
                        uiDialog.resizable("option", "handles", value)
                    }
                    if (!isResizable && value !== false) {
                        self._makeResizable(value)
                    }
                    break;
                case"title":
                    $(".ui-dialog-title", self.uiDialogTitlebar).html("" + (value || "&#160;"));
                    break
            }
            $.Widget.prototype._setOption.apply(self, arguments)
        }, _size: function() {
            var options = this.options, nonContentHeight, minContentHeight, isVisible = this.uiDialog.is(":visible");
            this.element.show().css({width: "auto", minHeight: 0, height: 0});
            if (options.minWidth > options.width) {
                options.width = options.minWidth
            }
            nonContentHeight = this.uiDialog.css({height: "auto", width: options.width}).height();
            minContentHeight = Math.max(0, options.minHeight - nonContentHeight);
            if (options.height === "auto") {
                if ($.support.minHeight) {
                    this.element.css({minHeight: minContentHeight, height: "auto"})
                } else {
                    this.uiDialog.show();
                    var autoHeight = this.element.css("height", "auto").height();
                    if (!isVisible) {
                        this.uiDialog.hide()
                    }
                    this.element.height(Math.max(autoHeight, minContentHeight))
                }
            } else {
                this.element.height(Math.max(options.height - nonContentHeight, 0))
            }
            if (this.uiDialog.is(":data(resizable)")) {
                this.uiDialog.resizable("option", "minHeight", this._minHeight())
            }
        }});
    $.extend($.ui.dialog, {version: "1.8.17", uuid: 0, maxZ: 0, getTitleId: function($el) {
            var id = $el.attr("id");
            if (!id) {
                this.uuid += 1;
                id = this.uuid
            }
            return"ui-dialog-title-" + id
        }, overlay: function(dialog) {
            this.$el = $.ui.dialog.overlay.create(dialog)
        }});
    $.extend($.ui.dialog.overlay, {instances: [], oldInstances: [], maxZ: 0, events: $.map("focus,mousedown,mouseup,keydown,keypress,click".split(","), function(event) {
            return event + ".dialog-overlay"
        }).join(" "), create: function(dialog) {
            if (this.instances.length === 0) {
                setTimeout(function() {
                    if ($.ui.dialog.overlay.instances.length) {
                        $(document).bind($.ui.dialog.overlay.events, function(event) {
                            if ($(event.target).zIndex() < $.ui.dialog.overlay.maxZ) {
                                return false
                            }
                        })
                    }
                }, 1);
                $(document).bind("keydown.dialog-overlay", function(event) {
                    if (dialog.options.closeOnEscape && !event.isDefaultPrevented() && event.keyCode && event.keyCode === $.ui.keyCode.ESCAPE) {
                        dialog.close(event);
                        event.preventDefault()
                    }
                });
                $(window).bind("resize.dialog-overlay", $.ui.dialog.overlay.resize)
            }
            var $el = (this.oldInstances.pop() || $("<div></div>").addClass("ui-widget-overlay")).appendTo(document.body).css({width: this.width(), height: this.height()});
            if ($.fn.bgiframe) {
                $el.bgiframe()
            }
            this.instances.push($el);
            return $el
        }, destroy: function($el) {
            var indexOf = $.inArray($el, this.instances);
            if (indexOf != -1) {
                this.oldInstances.push(this.instances.splice(indexOf, 1)[0])
            }
            if (this.instances.length === 0) {
                $([document, window]).unbind(".dialog-overlay")
            }
            $el.remove();
            var maxZ = 0;
            $.each(this.instances, function() {
                maxZ = Math.max(maxZ, this.css("z-index"))
            });
            this.maxZ = maxZ
        }, height: function() {
            var scrollHeight, offsetHeight;
            if ($.browser.msie && $.browser.version < 7) {
                scrollHeight = Math.max(document.documentElement.scrollHeight, document.body.scrollHeight);
                offsetHeight = Math.max(document.documentElement.offsetHeight, document.body.offsetHeight);
                if (scrollHeight < offsetHeight) {
                    return $(window).height() + "px"
                } else {
                    return scrollHeight + "px"
                }
            } else {
                return $(document).height() + "px"
            }
        }, width: function() {
            var scrollWidth, offsetWidth;
            if ($.browser.msie) {
                scrollWidth = Math.max(document.documentElement.scrollWidth, document.body.scrollWidth);
                offsetWidth = Math.max(document.documentElement.offsetWidth, document.body.offsetWidth);
                if (scrollWidth < offsetWidth) {
                    return $(window).width() + "px"
                } else {
                    return scrollWidth + "px"
                }
            } else {
                return $(document).width() + "px"
            }
        }, resize: function() {
            var $overlays = $([]);
            $.each($.ui.dialog.overlay.instances, function() {
                $overlays = $overlays.add(this)
            });
            $overlays.css({width: 0, height: 0}).css({width: $.ui.dialog.overlay.width(), height: $.ui.dialog.overlay.height()})
        }});
    $.extend($.ui.dialog.overlay.prototype, {destroy: function() {
            $.ui.dialog.overlay.destroy(this.$el)
        }})
}(jQuery));
(function($, undefined) {
    $.ui = $.ui || {};
    var horizontalPositions = /left|center|right/, verticalPositions = /top|center|bottom/, center = "center", support = {}, _position = $.fn.position, _offset = $.fn.offset;
    $.fn.position = function(options) {
        if (!options || !options.of) {
            return _position.apply(this, arguments)
        }
        options = $.extend({}, options);
        var target = $(options.of), targetElem = target[0], collision = (options.collision || "flip").split(" "), offset = options.offset ? options.offset.split(" ") : [0, 0], targetWidth, targetHeight, basePosition;
        if (targetElem.nodeType === 9) {
            targetWidth = target.width();
            targetHeight = target.height();
            basePosition = {top: 0, left: 0}
        } else {
            if (targetElem.setTimeout) {
                targetWidth = target.width();
                targetHeight = target.height();
                basePosition = {top: target.scrollTop(), left: target.scrollLeft()}
            } else {
                if (targetElem.preventDefault) {
                    options.at = "left top";
                    targetWidth = targetHeight = 0;
                    basePosition = {top: options.of.pageY, left: options.of.pageX}
                } else {
                    targetWidth = target.outerWidth();
                    targetHeight = target.outerHeight();
                    basePosition = target.offset()
                }
            }
        }
        $.each(["my", "at"], function() {
            var pos = (options[this] || "").split(" ");
            if (pos.length === 1) {
                pos = horizontalPositions.test(pos[0]) ? pos.concat([center]) : verticalPositions.test(pos[0]) ? [center].concat(pos) : [center, center]
            }
            pos[0] = horizontalPositions.test(pos[0]) ? pos[0] : center;
            pos[1] = verticalPositions.test(pos[1]) ? pos[1] : center;
            options[this] = pos
        });
        if (collision.length === 1) {
            collision[1] = collision[0]
        }
        offset[0] = parseInt(offset[0], 10) || 0;
        if (offset.length === 1) {
            offset[1] = offset[0]
        }
        offset[1] = parseInt(offset[1], 10) || 0;
        if (options.at[0] === "right") {
            basePosition.left += targetWidth
        } else {
            if (options.at[0] === center) {
                basePosition.left += targetWidth / 2
            }
        }
        if (options.at[1] === "bottom") {
            basePosition.top += targetHeight
        } else {
            if (options.at[1] === center) {
                basePosition.top += targetHeight / 2
            }
        }
        basePosition.left += offset[0];
        basePosition.top += offset[1];
        return this.each(function() {
            var elem = $(this), elemWidth = elem.outerWidth(), elemHeight = elem.outerHeight(), marginLeft = parseInt($.curCSS(this, "marginLeft", true)) || 0, marginTop = parseInt($.curCSS(this, "marginTop", true)) || 0, collisionWidth = elemWidth + marginLeft + (parseInt($.curCSS(this, "marginRight", true)) || 0), collisionHeight = elemHeight + marginTop + (parseInt($.curCSS(this, "marginBottom", true)) || 0), position = $.extend({}, basePosition), collisionPosition;
            if (options.my[0] === "right") {
                position.left -= elemWidth
            } else {
                if (options.my[0] === center) {
                    position.left -= elemWidth / 2
                }
            }
            if (options.my[1] === "bottom") {
                position.top -= elemHeight
            } else {
                if (options.my[1] === center) {
                    position.top -= elemHeight / 2
                }
            }
            if (!support.fractions) {
                position.left = Math.round(position.left);
                position.top = Math.round(position.top)
            }
            collisionPosition = {left: position.left - marginLeft, top: position.top - marginTop};
            $.each(["left", "top"], function(i, dir) {
                if ($.ui.position[collision[i]]) {
                    $.ui.position[collision[i]][dir](position, {targetWidth: targetWidth, targetHeight: targetHeight, elemWidth: elemWidth, elemHeight: elemHeight, collisionPosition: collisionPosition, collisionWidth: collisionWidth, collisionHeight: collisionHeight, offset: offset, my: options.my, at: options.at})
                }
            });
            if ($.fn.bgiframe) {
                elem.bgiframe()
            }
            elem.offset($.extend(position, {using: options.using}))
        })
    };
    $.ui.position = {fit: {left: function(position, data) {
                var win = $(window), over = data.collisionPosition.left + data.collisionWidth - win.width() - win.scrollLeft();
                position.left = over > 0 ? position.left - over : Math.max(position.left - data.collisionPosition.left, position.left)
            }, top: function(position, data) {
                var win = $(window), over = data.collisionPosition.top + data.collisionHeight - win.height() - win.scrollTop();
                position.top = over > 0 ? position.top - over : Math.max(position.top - data.collisionPosition.top, position.top)
            }}, flip: {left: function(position, data) {
                if (data.at[0] === center) {
                    return
                }
                var win = $(window), over = data.collisionPosition.left + data.collisionWidth - win.width() - win.scrollLeft(), myOffset = data.my[0] === "left" ? -data.elemWidth : data.my[0] === "right" ? data.elemWidth : 0, atOffset = data.at[0] === "left" ? data.targetWidth : -data.targetWidth, offset = -2 * data.offset[0];
                position.left += data.collisionPosition.left < 0 ? myOffset + atOffset + offset : over > 0 ? myOffset + atOffset + offset : 0
            }, top: function(position, data) {
                if (data.at[1] === center) {
                    return
                }
                var win = $(window), over = data.collisionPosition.top + data.collisionHeight - win.height() - win.scrollTop(), myOffset = data.my[1] === "top" ? -data.elemHeight : data.my[1] === "bottom" ? data.elemHeight : 0, atOffset = data.at[1] === "top" ? data.targetHeight : -data.targetHeight, offset = -2 * data.offset[1];
                position.top += data.collisionPosition.top < 0 ? myOffset + atOffset + offset : over > 0 ? myOffset + atOffset + offset : 0
            }}};
    if (!$.offset.setOffset) {
        $.offset.setOffset = function(elem, options) {
            if (/static/.test($.curCSS(elem, "position"))) {
                elem.style.position = "relative"
            }
            var curElem = $(elem), curOffset = curElem.offset(), curTop = parseInt($.curCSS(elem, "top", true), 10) || 0, curLeft = parseInt($.curCSS(elem, "left", true), 10) || 0, props = {top: (options.top - curOffset.top) + curTop, left: (options.left - curOffset.left) + curLeft};
            if ("using" in options) {
                options.using.call(elem, props)
            } else {
                curElem.css(props)
            }
        };
        $.fn.offset = function(options) {
            var elem = this[0];
            if (!elem || !elem.ownerDocument) {
                return null
            }
            if (options) {
                return this.each(function() {
                    $.offset.setOffset(this, options)
                })
            }
            return _offset.call(this)
        }
    }
    (function() {
        var body = document.getElementsByTagName("body")[0], div = document.createElement("div"), testElement, testElementParent, testElementStyle, offset, offsetTotal;
        testElement = document.createElement(body ? "div" : "body");
        testElementStyle = {visibility: "hidden", width: 0, height: 0, border: 0, margin: 0, background: "none"};
        if (body) {
            jQuery.extend(testElementStyle, {position: "absolute", left: "-1000px", top: "-1000px"})
        }
        for (var i in testElementStyle) {
            testElement.style[i] = testElementStyle[i]
        }
        testElement.appendChild(div);
        testElementParent = body || document.documentElement;
        testElementParent.insertBefore(testElement, testElementParent.firstChild);
        div.style.cssText = "position: absolute; left: 10.7432222px; top: 10.432325px; height: 30px; width: 201px;";
        offset = $(div).offset(function(_, offset) {
            return offset
        }).offset();
        testElement.innerHTML = "";
        testElementParent.removeChild(testElement);
        offsetTotal = offset.top + offset.left + (body ? 2000 : 0);
        support.fractions = offsetTotal > 21 && offsetTotal < 22
    })()
}(jQuery));
$(document).ready(function() {
    $("#submit_legal_form").click(function() {
        setTimeout("sendLegalForm('legal_form')", 500)
    })
});
function sendLegalForm(e) {
    var xmlData = "&xmlFormInput=" + encodeURIComponent(convertFormToXml(e));
    try {
        $.ajax({async: false, cache: false, url: "/form/ws/sendwebform/legal", type: "POST", data: xmlData, dataType: "text/xml", success: function(data, status, req) {
                successLegalForm(req.responseXML, e)
            }, error: function(req, status, error) {
                successLegalForm(req.responseXML, e)
            }})
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
    $("#confirm").modal({closeHTML: "<a href='index.htm#' title='Close' class='modal-close'>x</a>", position: ["20%", ], overlayId: "confirm-overlay", containerId: "confirm-container", onShow: function(dialog) {
            var modal = this;
            $(".message", dialog.data[0]).append(message);
            $(".no", dialog.data[0]).click(function() {
                window.close()
            })
        }})
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