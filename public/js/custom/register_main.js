var Register = (function () {
    var modules = {};
    modules.validateInfo = function () {
        modules.resetError();
        let data = new FormData($('#form-register')[0]);
        let submitAjax = $.ajax({
            type: 'POST',
            url: '/register/validateInfo',
            data: data,
            processData: false,
            contentType: false
        });

        submitAjax.done(function (response) {
            if (response && response.data) {
                $('#form-register').submit();
                modules.resetError();
                modules.resetAfterSuccess();
            }
        });

        submitAjax.fail(function (error) {
            if (error && error.status == 422) {
                if (error.responseJSON) {
                    jQuery.each(error.responseJSON.errors, function (key, val) {
                        $('#error-register-' + key).html(val);
                        $('#' + key + '-register').addClass('input-error');
                    });
                }
            }
        });
    }

    modules.resetError = function () {
        $('.span-error-register').text('');
        $('.input-register').removeClass('input-error');
    };

    modules.resetAfterSuccess = function () {
        $('.input-register').val('');
        $('.input-register').removeClass('input-error');
        $('#checkbox-show-pass').prop('checked', false);
    };

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    $('#checkbox-show-pass').on('change', function () {
        if ($(this).is(':checked')){
            $('#password-register').prop('type', 'text');
        } else {
            $('#password-register').prop('type', 'password');
        }
    });

    $('#label-show-pass').on('click', function () {
        $('#checkbox-show-pass').click();
    });

    $('.btn-submit-register').on('click', function () {
        Register.validateInfo();
    })
})