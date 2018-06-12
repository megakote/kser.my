$(document).ready(function () {

    $("form.form").submit(function(e) {
        let form_data = $(this).serialize(); //собераем все данные из формы
        $.ajax({
            type: "POST", //Метод отправки
            url: "/api/form", //путь до php фаила отправителя
            data: form_data,
            success: function() {
                if ( $(".popup_wrapp").is(":visible") ) {
                    $(".popup_wrapp").fadeOut(300);
                }
            }
        });
        e.preventDefault();
        return false;
    });

});