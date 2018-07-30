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

    $("body, html").scrollTop(0);

    getAdaptivePositionElements();

    getSelectWidth();

});

$(window).resize(function() {

    bodyWidth = w.innerWidth || e.clientWidth || g.clientWidth;
    
    getAdaptivePositionElements();

    getSelectWidth();

});

$(document).ready(function() {

    // $(".tabs").each(function() {
    //
    //     $(this).find(".tab-link").each(function() {
    //
    //         if( $(this).hasClass("active") ) {
    //
    //             indexActiveTab = $(this).index(".tab-link");
    //
    //             $(this).click();
    //
    //             return false;
    //
    //         } else {
    //
    //             indexActiveTab = 0;
    //
    //         }
    //
    //     });
    //
    //     $(this).find(".tab-link").eq(indexActiveTab).click();
    //     $(this).find(".tab-link").eq(indexActiveTab).addClass("active");
    //
    // });
    $(".sect-4 .tab-link:first-child").addClass("active");
    $(".sect-4 #tab_1").prop('checked', true);
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

    // $("input[type='tel']").mask("+7 (999) 999-99-99");
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

        popupBlock.fadeOut(300);

    });

    $(document).mouseup(function (e){

        var hide_element = $('.popup');

        if (!hide_element.is(e.target)
            && hide_element.has(e.target).length === 0
            && hide_element.closest(".popup_7_wrapp").length == 0 ) {
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

        if( !$(this).closest(".thumbnails_1").hasClass("no-tooltip") ) {

            thumbCenterCoord = $(this).outerWidth() / 2;
            tooltipCenterCoord = $( this ).find(".tooltip").outerWidth() / 2;
            rightCoord = tooltipCenterCoord - thumbCenterCoord;

            $( this ).find(".tooltip").attr("style", "opacity: 1; right: -"+ rightCoord +"px");

            if($( this ).find(".tooltip").offset().left < 0 ) {

                $( this ).find(".tooltip").attr("style", "opacity: 1; right: unset; left: 0;");

            } else if($( this ).find(".tooltip").offset().left + $( this ).find(".tooltip").outerWidth() > $(window).width() ) {

                $( this ).find(".tooltip").attr("style", "opacity: 1; right: 0;");

            }

        }

      },
      mouseleave: function() {
        if( !$(this).closest(".thumbnails_1").hasClass("no-tooltip") ) {
            $( this ).find(".tooltip").attr("style", "opacity: 0; right: 10000px;");
        }
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
            $(this).text('Подробнее');

        } else {

            slideBlock.animate({
                "height" : slideBlockHeight + "px"
            }, 700);

            parentBlock.addClass("active");

            setTimeout(function() {

                slideBlock.css({"height" : "auto"});

            }, 900);

            $(this).text('Свернуть');
        }

    });

    // --------------

    $("#user_links").click(function(e) {

        e.preventDefault();

        parentBlock = $(this).closest(".user-menu_wrapp");
        var usersMenu = parentBlock.find(".users-menu");

        if( usersMenu.is(":hidden") ) {
            usersMenu.slideDown(300);
            $(this).addClass("active");
        } else {
            usersMenu.slideUp(300);
            $(this).removeClass("active");
        }

    });

    $(this).keydown(function(eventObject){

        if (eventObject.which == 27 &&
            $(".users-menu").is(":visible") ) {
                $(".users-menu").slideUp(300);
                $(".users-menu").closest(".user-menu_wrapp").find(".grey-pill").removeClass("active");
        }

    });

    $(document).mouseup(function (e){

        var hide_element = $('.users-menu');

        if (!hide_element.is(e.target)
            && hide_element.has(e.target).length === 0 ) {
                $(".users-menu").slideUp(300);
                hide_element.closest(".user-menu_wrapp").find(".grey-pill").removeClass("active");           
        }

    });

    $(".sertificate").click(function(e) {
        e.preventDefault();
        var imgPath = $(this).attr("href");
        popupName = $(this).attr("data-popup-name");
        popupBlock = $(".sertificate_popup").filter("[data-popup = '"+ popupName +"']");
        popupBlock.fadeIn(300);
        popupBlock.find(".popup_image").attr('src', imgPath);
    });

    $(document).mouseup(function (e){

        var hide_element = $('.popup_image');

        if (!hide_element.is(e.target)
            && hide_element.has(e.target).length === 0 ) {
                hide_element.closest(".popup_wrapp").fadeOut(300);;         
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


$(document).ready(function() {

    // ------------------------------
    // ------ Email Validator -------
    // ------------------------------

    var form_id;

    $(".error-block").slideUp(30);

    setTimeout(function() {
        $(".error-block").css({"opacity" : 1});
    }, 300);

    // $("form").submit(function(e) {
    //
    //     e.preventDefault();
    //
    //     form_id = $(this).attr("id");
    //
    //     $(this).addClass("tested");
    //
    //     //   processform.php   -   это название PHP файла с обработчиком отправки формы (может быть любой)
    //
    //     ajaxFormRequest(form_id, 'processform.php');
    //
    // });

    $("input").keyup(function(e) {

        parentBlock = $(this).closest("form");

        form_id = parentBlock.attr("id");

        if(parentBlock.hasClass('tested')) {

            if($(this).attr('type') == 'text') {

                validateName(form_id);

            } else if($(this).attr('type') == 'email') {

                validateEmail(form_id);

            } else if($(this).attr('type') == 'tel') {

                validateTel(form_id);

            } else if( $(this).attr('type') == '' && $(this).hasClass("contact_input") ) {

                validateContactInp(form_id);

            }

        }

    });

    $("textarea").keyup(function(e) {

        parentBlock = $(this).closest("form");

        form_id = parentBlock.attr("id");

        if(parentBlock.hasClass('tested')) {
            validateMsg(form_id)
        }

    });

});

function validateName(form_id) {
    var activeInput = $("#" + form_id + " input[type='text']");
    var name = activeInput.val(),
        patt =  /^[а-яА-Яa-zA-Z\s\.]{2,30}$/;
    if (patt.test(name)  || 
        ( activeInput.val() == 0 && !activeInput.hasClass("important") ) ) {
        activeInput.removeClass('error_input');

        if(activeInput.next(".error-block").is(":visible")) {

            activeInput.next(".error-block").slideUp(300);

        }

        activeInput.removeClass('error_input');
        return true;
    }

    if( activeInput.hasClass("important")  || activeInput.val().length == 0 ) {

        activeInput.addClass('error_input');

        activeInput.next(".error-block").slideDown(300);

    }

    return false;
}

function validateEmail(form_id) {
    var activeInput = $("#" + form_id + " input[type='email']");
    var email = activeInput.val(),
        emailPattern = /^[a-zA-Z0-9._\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,4}$/;
    if (emailPattern.test(email) || 
        ( activeInput.val() == 0 && !activeInput.hasClass("important") ) ) {
        activeInput.removeClass('error_input');

        if(activeInput.next(".error-block").is(":visible")) {

            activeInput.next(".error-block").slideUp(300);

        }

        activeInput.removeClass('error_input');

        return true;
    }

    if( activeInput.hasClass("important") || activeInput.val().length > 0 ) {

        activeInput.addClass('error_input');

        activeInput.next(".error-block").slideDown(300);

    }

    return false;
}

function validateTel(form_id) {
    var activeInput = $("#" + form_id + " input[type='tel']");
    var tel = activeInput.val(),
        telpatt = /^[а-яА-Яa-zA-Z0-9- _()+.]{10,99}$/;
    if (telpatt.test(tel) || 
        ( activeInput.val() == 0 && !activeInput.hasClass("important") ) ) {
        activeInput.removeClass('error_input');

        if(activeInput.next(".error-block").is(":visible")) {

            activeInput.next(".error-block").slideUp(300);

        }

        return true;

    }

    if( activeInput.hasClass("important") || activeInput.val().length > 0 ) {

        activeInput.addClass('error_input');

        activeInput.next(".error-block").slideDown(300);

    }

    return false;
}

function validateMsg(form_id) {

    var activeInput = $("#" + form_id + " textarea");
    var msg = activeInput.val();

    if (msg.length > 3 || 
        ( activeInput.val() == 0 && !activeInput.hasClass("important") ) ) {
        activeInput.removeClass('error_input');

        if(activeInput.next(".error-block").is(":visible")) {

            activeInput.next(".error-block").slideUp(300);

        }
        return true;
    }

    if( activeInput.hasClass("important") || activeInput.val().length > 0 ) {

        activeInput.addClass('error_input');

        activeInput.next(".error-block").slideDown(300);

    }

    return false;
}

function validateContactInp(form_id) {

    var activeInput = $("#" + form_id + " input.contact_input");
    var email;
    var tel;

    if(activeInput.val().indexOf("@") != -1 ) {

        email = activeInput.val(),
        emailPattern = /^[a-zA-Z0-9._\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,4}$/;

        if (emailPattern.test(email) || 
            ( activeInput.val() == 0 && !activeInput.hasClass("important") ) ) {

            activeInput.removeClass('error_input');
            activeInput.closest(".input_wrapp").find(".er_1").slideUp(300);
            activeInput.closest(".input_wrapp").find(".er_2").slideUp(300);

            activeInput.removeClass('error_input');

            return true;
        }

        if( activeInput.hasClass("important") || activeInput.val().length > 0 ) {

            activeInput.addClass('error_input');
            activeInput.closest(".input_wrapp").find(".er_2").slideDown(300);
            activeInput.closest(".input_wrapp").find(".er_1").slideUp(300);

        }

        return false;

    } else {        

        tel = activeInput.val(),
        telpatt = /^\D*(?:\d\D*){10,}$/;

        if (telpatt.test(tel) || 
            ( activeInput.val() == 0 && !activeInput.hasClass("important") ) ) {

            activeInput.removeClass('error_input');
            activeInput.closest(".input_wrapp").find(".er_1").slideUp(300);
            activeInput.closest(".input_wrapp").find(".er_2").slideUp(300);

            return true;

        }

        if( activeInput.hasClass("important") || activeInput.val().length > 0 ) {

            activeInput.addClass('error_input');
            activeInput.closest(".input_wrapp").find(".er_1").slideDown(300);
            activeInput.closest(".input_wrapp").find(".er_2").slideUp(300);

        }

        return false;

    }

}

function validateForm(form_id) {
    var a, c, d, e;

    if( $("#" + form_id).find("input[type='email']").length > 0 ) {
        a = validateEmail(form_id);
    } else {
        a = true;
    }

    if( $("#" + form_id).find("input[type='text']").length > 0 ) {
        c = validateName(form_id);
    } else {
        c = true;
    }

    if( $("#" + form_id).find("input[type='tel']").length > 0 ) {
        d = validateTel(form_id);
    } else {
        d = true;
    }

    if( $("#" + form_id).find("textarea").length > 0 ) {
        e = validateMsg(form_id);
    } else {
        e = true;
    }

    if( $("#" + form_id).find("input.contact_input").length > 0 ) {
        e = validateContactInp(form_id);
    } else {
        e = true;
    }
console.log(a)
console.log(c)
console.log(d)
console.log(e)
console.log(a && c && d && e)
console.log('------------------')
    return a && c && d && e;
}

function ajaxFormRequest(form_id, url) {

    if (validateForm(form_id)) {
        $.ajax({
            url: url,
            type: "POST",
            dataType: "html",
            data: $("#" + form_id).serialize(),
            beforeSend: function () {

            },
            success: function (response) {
                $("#" + form_id).trigger("reset");
                $("#" + form_id).find(".error-block").slideUp(300);

            },
            error: function () {
                
            }
        });
    } else { return false; }
}