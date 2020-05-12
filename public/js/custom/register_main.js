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
                $('.btn-submit-register').attr("disabled", false);
                if (error.responseJSON) {
                    jQuery.each(error.responseJSON.errors, function (key, val) {
                        $('#error-register-' + key).html(val);
                        $('#' + key + '-register').addClass('input-error');
                    });
                }
            }
        });
    }

    modules.saveUser = function () {
        modules.resetError();
        let data = new FormData($('#register-normal')[0]);
        let submitAjax = $.ajax({
            type: 'POST',
            url: '/register/normal/store',
            data: data,
            processData: false,
            contentType: false
        });

        submitAjax.done(function (response) {
            if (response && response.data) {
                modules.resetError();
                modules.resetAfterSuccess();
                window.location.href = '/home'
            }
        });

        submitAjax.fail(function (error) {
            if (error && error.status == 422) {
                $('.btn-register-info-normal').attr("disabled", false);
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
        $(this).attr("disabled", true);
        Register.validateInfo();
    })


    $('.btn-register-info-normal').on('click', function () {
        $(this).attr("disabled", true);
        Register.saveUser();
    })
})