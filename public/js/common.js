$(document).ready(function () {

    $("form.form").submit(function(e) {
        let form_data = $(this).serialize(); //собераем все данные из формы
        $.ajax({
            type: "POST",
            url: "/api/form",
            data: form_data,
            success: function(data) {
                if (data.success) {

                } else if (data.error) {

                }
                if ( $(".popup_wrapp").is(":visible") ) {
                    $(".popup_wrapp").fadeOut(300);
                }
            }
        });
        e.preventDefault();
        return false;
    });

    $('#WorkStatusBtn').on('click', function () {
        let id = $('#WorkStatusId').val()
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

});