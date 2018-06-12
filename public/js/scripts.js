var w = window,
d = document,
e = d.documentElement,
g = d.getElementsByTagName('body')[0],
bodyWidth = w.innerWidth || e.clientWidth || g.clientWidth;

// -----------

var tabsParent;
var tabParent;
var attrForTabLink;
var activeTabRadio;
var nextTab;
var indexActiveTab;

// -----------

var popupName;
var popupBlock;

// -----------

var parentBlock;
var slidingBox;

// -----------

var thumbCenterCoord;
var tooltipCenterCoord;
var rightCoord;

// -----------

$(window).load(function() {

    getAdaptivePositionElements();
    // getTooltipPosition();
    // $(".thumbnails_1 .thumb-1").each(function() {
    //     thumbCenterCoord = $(this).outerWidth() / 2;
    //     tootipCenterCoord = $( this ).find(".tooltip").outerWidth() / 2;
    //     leftCoord = -(tootipCenterCoord - thumbCenterCoord);
    //     if($( this ).find(".tooltip").offset().left + $( this ).find(".tooltip").outerWidth() > $(window).width() ) {
    //         $( this ).find(".tooltip").attr("style", "left: unset; right: 0;");
    //     } else {
    //         $( this ).find(".tooltip").attr("style", "left: "+ leftCoord +"px");
    //     }
    // });

});

$(window).resize(function() {

    bodyWidth = w.innerWidth || e.clientWidth || g.clientWidth;
    
    getAdaptivePositionElements();
    // getTooltipPosition();
    // $(".thumbnails_1 .thumb-1").each(function() {
    //     thumbCenterCoord = $(this).outerWidth() / 2;
    //     tootipCenterCoord = $( this ).find(".tooltip").outerWidth() / 2;
    //     leftCoord = -(tootipCenterCoord - thumbCenterCoord);
    //     if($( this ).find(".tooltip").offset().left + $( this ).find(".tooltip").outerWidth() > $(window).width() ) {
    //         $( this ).find(".tooltip").attr("style", "left: unset; right: 0;");
    //     } else {
    //         $( this ).find(".tooltip").attr("style", "left: "+ leftCoord +"px");
    //     }
    // });

});

$(document).ready(function() {

    $(".tabs").each(function() {

        $(this).find(".tab-link").each(function() {

            if( $(this).hasClass("active") ) {

                indexActiveTab = $(this).index(".tab-link");

                $(this).click();

                return false;

            } else {

                indexActiveTab = 0;

            }

        });

        $(this).find(".tab-link").eq(indexActiveTab).click();
        $(this).find(".tab-link").eq(indexActiveTab).addClass("active");

    });


    $(".tab-link").click(function (e) {

        if( $(this).hasClass("active") ) {

            e.preventDefault();

        } else {

            tabsParent = $(this).closest(".tabs");
            attrForTabLink = $(this).attr("for");
            activeTabRadio = tabsParent.find(".radio-tab[id = '"+ attrForTabLink +"']");
            activeTabRadio.prop("checked", true);

            tabsParent.find(".tab-link").each(function () {
                
                if( $(this).hasClass("active") ) {

                    $(this).removeClass("active")

                }

            });

            $(this).addClass("active");

        }

    });

    // -------------------------

    $("input[type='tel']").mask("+7 (999) 999-99-99");

    // -------------------------------

    $(".show_popup").click(function(e) {

        e.preventDefault();

        popupName = $(this).attr("data-popup-name");
        popupBlock = $("[data-popup = '"+ popupName +"']");

        popupBlock.fadeIn(400);

    });

    $(this).keydown(function(eventObject){

        if (eventObject.which == 27) {

            if ( $(".popup_wrapp").is(":visible") ) {

                $(".popup_wrapp").fadeOut(300);

            }

        }

    });

    $(".close-popup").click(function() {

        popupBlock = $(this).closest(".popup_wrapp");

        popupBlock.fadeOut(300);

    });

    $(document).mouseup(function (e){

        var hide_element = $('.popup');

        if (!hide_element.is(e.target)

            && hide_element.has(e.target).length === 0) {

            hide_element.closest(".popup_wrapp").fadeOut(300);
        }

    });

    // -------------------------------

    $(".sliding_wrapp").each(function() {

        if( $(this).hasClass("active") ) {

            $(this).find(".sliding-box").css({
                "display" : "block"
            });

            $(this).find(".slide-btn").addClass("active");

        } else {

            $(this).find(".sliding-box").css({
                "display" : "none"
            });

            $(this).find(".slide-btn").removeClass("active");

        }

    });

    $(".sliding-header").click(function() {

        parentBlock = $(this).closest(".sliding_wrapp");

        slidingBox = parentBlock.find(".sliding-box");

        if( parentBlock.hasClass("active") ) {

            slidingBox.slideUp(500);
            parentBlock.removeClass("active");

        } else {

            slidingBox.slideDown(500);
            parentBlock.addClass("active");

        }

    });

    // ----------------------------

    $(function() {

        $(".respmenubtn").click(function() {

            if( $(".main-nav_wrapp").is(":hidden") ) {

                $(".main-nav_wrapp").fadeIn(300);

                $(this).addClass("active");

            } else {

                $(".main-nav_wrapp").fadeOut(300);

                $(this).removeClass("active");

            }

        });

        $(this).keydown(function(eventObject){

            if (eventObject.which == 27 &&
                $(".main-nav_wrapp").is(":visible") ) {

                    $(".main-nav_wrapp").fadeOut(300);

                    $(".respmenubtn").removeClass("active");

            }

        });

    });

    // --------------------

    $(".respsidebar_hide").click(function() {

        $("#respsidebar").animate({
            "left" : "-100%"
        }, 500);
        $("#respsidebar").removeClass("active");

    });

    $(".respsidebar_show").click(function() {

        $("#respsidebar").animate({
            "left" : 0
        }, 500);
        $("#respsidebar").addClass("active");

    });

    $(this).keydown(function(eventObject){

        if (eventObject.which == 27 &&
            $("#respsidebar").hasClass("active") ) {
                $("#respsidebar").animate({
                    "left" : "-100%"
                }, 500);
        }

    });

    // ------------------------

    $( ".thumb-1" ).bind({
      mouseenter: function() {
        thumbCenterCoord = $(this).outerWidth() / 2;
        tooltipCenterCoord = $( this ).find(".tooltip").outerWidth() / 2;
        rightCoord = tooltipCenterCoord - thumbCenterCoord;

        $( this ).find(".tooltip").attr("style", "opacity: 1; right: -"+ rightCoord +"px");

        if($( this ).find(".tooltip").offset().left < 0 ) {

            $( this ).find(".tooltip").attr("style", "opacity: 1; right: unset; left: 0;");

        } else if($( this ).find(".tooltip").offset().left + $( this ).find(".tooltip").outerWidth() > $(window).width() ) {

            $( this ).find(".tooltip").attr("style", "opacity: 1; right: 0;");

        }

      },
      mouseleave: function() {
        $( this ).find(".tooltip").attr("style", "opacity: 0; right: 10000px;");
      }
    });

});

function getAdaptivePositionElements() {

    var screenParam;
    var indexElem;

    $(".append-elem").each(function() {

        screenParam = parseInt( $(this).attr("data-min-screen") );

        indexElem = $(this).attr("data-append-desktop-elem");

        if( bodyWidth <= screenParam ) {

            $("[data-append-elem = '"+ indexElem +"']").append($(this).children());

        }

         if( bodyWidth > screenParam ) {

            $("[data-append-desktop-elem = '"+ indexElem +"']").append($("[data-append-elem = '"+ indexElem +"']").children());

        }

    });

}

function getTooltipPosition() {

    // var thumbCenterCoord;
    // var tootipCenterCoord;
    // var leftCoord;

    // $(".thumbnails_1 .thumb-1").each(function() {
    //     thumbCenterCoord = $(this).outerWidth() / 2;
    //     tootipCenterCoord = $( this ).find(".tooltip").outerWidth() / 2;
    //     leftCoord = -(tootipCenterCoord - thumbCenterCoord);
    //     if($( this ).find(".tooltip").offset().left + $( this ).find(".tooltip").outerWidth() > $(window).width() ) {
    //         $( this ).find(".tooltip").attr("style", "left: unset; right: 0;");
    //     } else {
    //         $( this ).find(".tooltip").attr("style", "left: "+ leftCoord +"px");
    //     }
    // });

}