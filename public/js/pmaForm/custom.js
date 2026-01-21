function switchContent(e) {
    var t = $(e).attr("data-id");
    $(this).addClass("act"),
        $(".act").removeClass("act"),
        $(".act_tab").removeClass("act_tab"),
        $("#" + t).addClass("act"),
        $("ul li a[data-id=" + t + "]").addClass("act_tab");
}
function scrollSection(e) {
    var t = $(e).attr("menu-id"),
        a = $("nav.main-navigation").innerHeight();
        $("nav.main-navigation a.active").removeClass("active"),
        $("nav.main-navigation a[menu-id=" + t + "]").addClass("active"),
        $("html, body").animate({ scrollTop: $("#" + t).offset().top - a }, 500);
}
function joinTelegramBtnAnimationTick() {
    $(".bt_join-telegram")
        .clearQueue()
        .stop()
        .css({ right: 0 })
        .animate({ right: "35" }, 75)
        .animate({ right: "-=60" }, 75)
        .animate({ right: "35" }, 75)
        .animate({ right: "-=60" }, 75)
        .animate({ right: "0" }, 75),
        setTimeout(joinTelegramBtnAnimationTick, 5e3);
}
function scroll_to_class(e, t) {
    var a = $(e).offset().top - t;
    $(window).scrollTop() != a &&  $("html, body").stop().animate({ scrollTop: a }, 0);
}
function bar_progress(e, t) {
    var a = e.data("number-of-steps"), i = e.data("now-value"), n = 0;
    "right" == t ? (n = i + 100 / a) : "left" == t && (n = i - 100 / a), e.attr("style", "width: " + n + "%;").data("now-value", n);
}
function validateEmail(e) {
    var t = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return t.test(e);
}
if (($(function () {
    (count = 0), (wordsArray = ["Trustless", "ICO", "Proven-ROI", "Marketplace", "Leverage", "Skin-in-the-game", "Earn-to-help", "Trade-secrecy", "Peer-to-Peer", "Trading-tools", "Token-value"]), (timeArray = [12e3, 5e3, 1e4, 1e4, 1e4, 1e4, 1e4, 1e4, 1e4, 1e4, 1e4]),
    setInterval(function () {
        count++,
        $(".act").fadeOut(400, function () {
            var e = wordsArray[count % wordsArray.length], t = "#home-" + e, a = "home-" + e;
            $(".act").removeClass("act"), $(".act_tab").removeClass("act_tab"), $(t).addClass("act"), $('ul li a[data-id="' + a + '"]').addClass("act_tab");
        });
    }, timeArray[count % timeArray.length]);
}), $(function () {
    $(".expand").on("click", function () {
        ($expand = $(this).find(">:first-child")), "+" == $expand.text() ? ($(".expand").find(">:first-child").text("+"), $expand.text("-")) : $expand.text("+");
    });
}), $(".trackClick, .social-links li a").on("click", function () {
        $(this).attr("title") ? (fbq("track", $(this).attr("title")), fbq("track", "CompleteRegistration"), gtag("event", "Click", {event_category: $(this).attr("title"), event_label: $(this).attr("href"), })) : (fbq("track", $(this).attr("href")), fbq("track", "CompleteRegistration"), gtag("event", "Click", {event_category: $(this).attr("title"), event_label: $(this).attr("title"), }));
    }), setTimeout(joinTelegramBtnAnimationTick, 5e3), $("i.bt_remove-tel").on("click", function (e) {
        e.preventDefault(), $(this).parent().fadeOut();
    }), $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    }), $(".roadmap-slider .swiper-container").length)) var swiper = new Swiper(".roadmap-slider .swiper-container", {pagination: ".roadmap-slider .swiper-pagination", nextButton: ".roadmap-slider .swiper-btn-next", prevButton: ".roadmap-slider .swiper-btn-prev", slidesPerView: 1, mousewheelControl: !1, paginationClickable: !0, loop: !1, centeredSlides: !0, paginationBulletRender: function (e, t, a) {
        return ('<div class="item ' + a + '"><span class="title">' + $(".roadmap-slider .swiper-slide").eq(t).find(".title").html() + '</span><span class="date">' + $(".roadmap-slider .swiper-slide").eq(t).find(".date").text() + '</span><span class="num">' + $(".roadmap-slider .swiper-slide").eq(t).find(".num").html() + "</span></div>");
    },
});
jQuery("#no_of_owners").on("change", function () {
        var e = $("#no_of_owners").val();
        1 == e ? ($("#email2").prop("disabled", !0), $("#both_present").prop("disabled", !0)) : ($("#email2").prop("disabled", !1), $("#both_present").prop("disabled", !1));
    }), jQuery("#both_present").on("change", function () {
            var e = jQuery("#both_present").val();
            1 == e ? (jQuery("#Second_Owner_Email").show(), jQuery("#email2").prop("disabled", !1)) : (jQuery("#Second_Owner_Email").hide(), jQuery("#email2").prop("disabled", !0));
        }), $(function () {
                var e = $("#both_present").val();
                1 == e ? ($("#Second_Owner_Email").show(), $("#email2").prop("disabled", !1)) : ($("#Second_Owner_Email").hide(), $("#email2").prop("disabled", !0)), $.backstretch("/images/bolldmax-bg.jpg"), $(".navbar.main-navigation").on("shown.bs.collapse", function () {
                    $.backstretch("resize");
                }),
                $(".navbar.main-navigation").on("hidden.bs.collapse", function () {
                    $.backstretch("resize");
                }),
                $(".f1 fieldset:first").fadeIn("slow"), $('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on("focus", function () {
                    $(this).removeClass("input-error");
                }),
                $(".f1 .btn-next").on("click", function () {
                    var e = $(this).parents("fieldset"), t = !0, a = $(this).parents(".f1").find(".f1-step.active"), i = $(this).parents(".f1").find(".f1-progress-line");
                    if ((e.find('input[type="text"]:enabled, input[type="email"]:enabled, input[type="password"]:enabled, textarea:enabled, select:enabled').each(function () {
                        "" == $(this).val() ? ($(this).addClass("input-error"), (t = !1)) : $(this).removeClass("input-error");
                    }), t)) {
                        var n = $("#no_of_owners").val(), r = $("#fname").val(), s = $("#lname").val(), o = $("#email").val();
                        1 == n ? ($("#step2").hide(), $("#email2").prop("disabled", !0), $("#both_present").prop("disabled", !0),  $(".f1").submit()) : 2 == n ? e.fadeOut(400, function () {
                            a.removeClass("active").addClass("activated").next().addClass("active"), bar_progress(i, "right"), $(this).next().fadeIn();
                        }) : "" != o && "" != r && "" != s && (validateEmail(o) ? ($("#step2").hide(), $("#email2").prop("disabled", !0), $("#both_present").prop("disabled", !0), $(".f1").submit()) : $("#email").addClass("input-error"));
                    }
                }),
                $(".f1 .btn-previous").on("click", function () {
                    var e = $(this).parents(".f1").find(".f1-step.active"), t = $(this).parents(".f1").find(".f1-progress-line");
                    $(this).parents("fieldset").fadeOut(400, function () {
                        e.removeClass("active").prev().removeClass("activated").addClass("active"),  bar_progress(t, "left"), $(this).prev().fadeIn(), scroll_to_class($(".f1"), 20);
                    });
                }),
                $(".f1").on("submit", function (e) {
                    $(this).find('input[type="text"]:enabled, input[type="email"]:enabled, input[type="password"]:enabled, textarea:enabled, select:enabled').each(function () {
                        var t = $("#no_of_owners").val();
                        "" == $(this).val() ? (e.preventDefault(), $(this).addClass("input-error"), 1 == t && ($("#both_present").removeClass("input-error"), $("#email2").removeClass("input-error"))) : $(this).removeClass("input-error");
                    });
                });
            });
