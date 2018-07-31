$(document).ready(function () {

    $("form.form").submit(function(e) {

        e.preventDefault();
        $(this).addClass("tested");
        if (validateForm($(this).attr("id"))) {

            let form_data = $(this).serialize(); //собераем все данные из формы
            $.ajax({
                type: "POST",
                url: "/api/form",
                data: form_data,
                beforeSend: function(){

                },
                success: function(data) {
                    clearForms()
                    if ( $(".popup_wrapp").is(":visible") ) {
                        $(".popup_wrapp").fadeOut(300);
                    }
                    if (data.success) {

                        $('#responsePopup').show()
                        $('#responseText').html("Заявка зарегистрирована под номером №" + data.success + ". Сотрудник компании свяжется с Вами в течении 5-10 минут. Спасибо за Ваше обращение!")
                    } else if (data.error) {
                        $('#responsePopup').show()
                        $('#responseText').html(data.error)
                    }

                }
            });
        } else {
            return false;
        }
    });

    $("form#addOrder").submit(function(e) {
        $(this).addClass("tested");
        if (validateForm($(this).attr("id"))) {

            let form_data = $(this).serialize(); //собераем все данные из формы
            $.ajax({
                type: "POST",
                url: "/api/form/order",
                data: form_data,
                beforeSend: function(){

                },
                success: function(data) {
                    clearForms()
                    if ( $(".popup_wrapp").is(":visible") ) {
                        $(".popup_wrapp").fadeOut(300);
                    }
                    if (data.success) {
                        $('#responsePopup').show()
                        $('#responseText').html("Заявка зарегистрирована под номером №" + data.success + ". Сотрудник компании свяжется с Вами в течении 5-10 минут. Спасибо за Ваше обращение!")
                    } else if (data.error) {
                        $('#responsePopup').show()
                        $('#responseText').html(data.error)
                    }
                }
            });
            e.preventDefault();
            return false;
        }
    });

    $("form#addFeedback").submit(function(e) {
        $(this).addClass("tested");
        if (validateForm($(this).attr("id"))) {

            let form_data = $(this).serialize(); //собераем все данные из формы
            $.ajax({
                type: "POST",
                url: "/api/form/feedback",
                data: form_data,
                beforeSend: function(){
                },
                success: function(data) {
                    clearForms()
                    $("input[name='stars']").val('');
                    if ( $(".popup_wrapp").is(":visible") ) {
                        $(".popup_wrapp").fadeOut(300);
                    }
                    if (data.success) {0

                        $('#responsePopup').show()
                        $('#responseText').html("Заявка на размещение отзыва зарегистрирована под номером №" + data.success + ". После обработки модератором отзыв появится на сайте. Спасибо за Ваше обращение!")
                    } else if (data.error) {
                        $('#responsePopup').show()
                        $('#responseText').html(data.error)
                    }
                }
            });
            e.preventDefault();
            return false;
        }
    });

    $('#WorkStatusBtn').on('click', function () {
        let id = $('#WorkStatusId').val()
        //
        // if ($(this).closest("form").hasClass('checked')) {
        //
        // }
        $.ajax({
            type: "POST",
            url: "/api/work-status",
            data: {
                id: id
            },
            success: function(data) {
                if ( !data.error ) {
                    window.location.replace("?order_id=" + id);
                } else {
                    $('#WorkStatusError').text(data.error)
                }
            }
        });
        e.preventDefault();
        return false;
    })


    $("#review_rat li").on('click', function () {
        $("input[name='stars']").val($(this).data('index') + 1);
    })


    // $("#advanced_filter_btn").on('click', function () {
    //     $("#AdvancedSearch").toggle();
    //     return false;
    // })

    $("body").on('click', '.mCSB_container', function (event) {
        if ( $(event.target).hasClass('mCSB_container') ) {
            clearForms()
        }
    })

    $('select[name="office"]').on('change', function () {
        var addr = $(this).data('adress')
        $('textarea[name="address"]').val(addr)
    })

    // $('#AdvancedSearch select').on('change', function () {
    //     $('#AdvancedSearch').submit();
    // })


    var parentBlock;
    var checkedInput;
    var checkedInputId;
    var parentRadioWrapp;
    var cityVal;
    var cityName;

    $("#city_btn").click(function(e) {

        e.preventDefault();

        parentBlock = $(this).closest("form");

        checkedInput = parentBlock.find("input").filter(":checked");

        checkedInputId = checkedInput.attr("id");

        parentRadioWrapp = checkedInput.closest(".radiobutton");

        cityVal = parentRadioWrapp.find("label[for = '"+ checkedInputId +"']").text();

        $.cookie('city', cityVal, {
            expires: 7,
            path: '/'
        });

        cityName = $.cookie('city');

        $("#city_val").text(cityName);

        $(this).closest(".popup_wrapp").fadeOut(300);

    });


    // if(cityName != false) {
    //
    //     $("#city_val").text($.cookie('city'));
    //
    // }
});

$(window).on('load', function () {
    $('.sort_wrapp').show();
    $('.sort_wrapp + .scroll_x').show();
    if (!$.cookie('city')){
        $.ajax({
            type: "POST",
            url: "/api/whoiam",
            success: function(data) {
                if (data.city)  {
                    $.cookie('city', data.city);
                    $("#city_val").text($.cookie('city'));
                } else {
                    $.cookie('city', 'Москва');
                    $("#city_val").text('Москва');
                }
            }
        });
    } else {
        $("#city_val").text($.cookie('city'));
    }

    // $("#AdvancedSearch").hide();
});


function clearForms() {
    $("form input").not('[name="type"]').not('[name="description"]').val('')
    $("form textarea").val('')
    $("form").removeClass('tested')

}