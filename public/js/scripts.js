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

    getSelectWidth();

});

$(window).resize(function() {

    bodyWidth = w.innerWidth || e.clientWidth || g.clientWidth;
    
    getAdaptivePositionElements();

    getSelectWidth();

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
    $(".date_input").mask("99.99.9999");

    // -------------------------------

    $(".show_popup").click(function(e) {

        e.preventDefault();

        popupName = $(this).attr("data-popup-name");
        popupBlock = $("[data-popup = '"+ popupName +"']");

        popupBlock.fadeIn(400);

        getSelectWidth();

    });

    $(this).keydown(function(eventObject){

        if (eventObject.which == 27) {

            if ( $(".popup_wrapp").is(":visible") ) {
                $("form input").not('[name="type"]').val('')
                $("form textarea").val('')
                $(".popup_wrapp").fadeOut(300);

            }

        }

    });

    $(".close-popup, .popup_bg").click(function() {

        popupBlock = $(this).closest(".popup_wrapp");
        $("form input").not('[name="type"]').val('')
        $("form textarea").val('')
        popupBlock.fadeOut(300);

    });

    $(document).mouseup(function (e){

        var hide_element = $('.popup');

        if (!hide_element.is(e.target)
            && hide_element.has(e.target).length === 0
            && hide_element.closest(".popup_7_wrapp").length == 0 ) {
                // $("form input").not('[name="type"]').val('')
                // $("form textarea").val('')
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

    // ------------------------

    $(".sliding_block").each(function() {

        $(this).css({"height" : 0});

    });

    $(".slide_btn").click(function(e) {

        e.preventDefault();

        var parentBlock = $(this).closest(".table_wrapp");

        var slideBlock = parentBlock.find(".sliding_block");

        var slideBlockHeight = slideBlock.find(".inner_wrapp").height();

        if( slideBlock.height() > 0 ) {

             slideBlock.animate({
                "height" : 0
            }, 700);

            parentBlock.removeClass("active");

        } else {

            slideBlock.animate({
                "height" : slideBlockHeight + "px"
            }, 700);

            parentBlock.addClass("active");

            setTimeout(function() {

                slideBlock.css({"height" : "auto"});

            }, 900);

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

function getSelectWidth() {

    $("select").each(function() {

        parentBlock = $(this).closest(".select_wrapp");

        parentBlock.find(".select2-container").css({
            "width" : parentBlock.width() + "px"
        });

    });

}