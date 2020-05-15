var ResetPassword = (function ($) {
    let modules = {};

    modules.showMessageValidate = function (messageList) {
        $.each(messageList, function (key, value) {
            $('p.error-message[data-error=' + key + ']').text(value);
            $('input[name=' + key + ']').addClass('input-error');
        });
    };

    modules.clearErrorMessages = function () {
        $('body').find('.input-error').removeClass('input-error');
        $('.error-message').html('');
    };

    modules.submitEmailForgotPass = function () {
        let data = new FormData($('#email-reset')[0]);
        data.append('_token', $('meta[name="csrf-token"]').attr('content'));
        let submitAjax = $.ajax({
            url: "/pass-reminder/send-mail-reset-password",
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (res) {
            if (res.status == true) {
                $('.email-forgot-pass').text(res.data.email);
                $('.forgot-pw-step1').css('display', 'none');
                $('.forgot-pw-step2').css('display', 'block');
            } else {
                alert('システムでの処理中にエラーが発生しました。\n' +
                    '時間を開けて再度お試しください。');
                window.location.reload();
            }
        });

        submitAjax.fail(function (response) {
            $('#submit-gmail-forgot-pass').attr("disabled", false);
            var messageList = response.responseJSON.errors;
            modules.clearErrorMessages();
            modules.showMessageValidate(messageList);
        });
    };

    modules.submitChangePass = function () {
        let data = new FormData($('#reset-password')[0]);
        data.append('_token', $('meta[name="csrf-token"]').attr('content'));
        let submitAjax = $.ajax({
            url: "/pass-reminder/reset-password",
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (res) {
            if (res.save == true) {
                $('.forgot-pw-step3').css('display', 'none');
                $('.forgot-pw-step4').css('display', 'block');
            } else {
                alert('システムでの処理中にエラーが発生しました。\n' +
                    '時間を開けて再度お試しください。');
                window.location.reload();
            }
        });

        submitAjax.fail(function (response) {
            $('.btn-reset-password').attr("disabled", false);
            var messageList = response.responseJSON.errors;
            modules.clearErrorMessages();
            modules.showMessageValidate(messageList);
        });
    };

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    $('#submit-gmail-forgot-pass').on('click', function () {
        $(this).attr("disabled", true);
        ResetPassword.submitEmailForgotPass();
    });

    $('#btn-change-pass').on('click', function () {
        $(this).attr("disabled", true);
        ResetPassword.submitChangePass();
    });

    $('.btn-reset-password').on('click', function () {
        $(this).attr("disabled", true);
        ResetPassword.submitChangePass();
    });
});
