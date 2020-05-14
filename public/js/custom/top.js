let Login = (function () {
    let modules = {};

    modules.sendDataLogin = function () {
        let data = new FormData($('#user-login')[0]);
        data.append('_token', $('meta[name="csrf-token"]').attr('content'));
        let submitAjax = $.ajax({
            url: "/login/login",
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (res) {
            if (res.login == true) {
               window.location.href = '/home';
            } else {
                alert('システムでの処理中にエラーが発生しました。\n' +
                    '時間を開けて再度お試しください。');
                window.location.reload();
            }
        });

        submitAjax.fail(function (response) {
            $('.btn-login').attr("disabled", false);
            var messageList = response.responseJSON.errors;
            modules.resetError();
            modules.showMessageValidate(messageList);
        });
    };

    modules.resetError = function () {
        $('.error-message').text('');
        $('.input-login').removeClass('input-error');
    };

    modules.showMessageValidate = function (messageList) {
        $.each(messageList, function (key, value) {
            $('p.error-message[data-error=' + key + ']').text(value);
            $('input[name=' + key + ']').addClass('input-error');
        });
        $('html, body').animate({
            scrollTop: $(document).find('p.error-message[data-error=' + Object.keys(messageList)[0] + ']').offset().top - 300
        }, 0);
    };

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    $('.site-navigation .menu-item').removeClass('menu-item-active');
    switch (window.location.pathname) {
        case '/':
            $('#menu-item-top a').addClass('menu-item-active');
            break;
        case '/team':
            $('#menu-item-team a').addClass('menu-item-active');
            break;
        case '/faculties':
            $('#menu-item-faculties a').addClass('menu-item-active');
            break;
        case '/contact':
            $('#menu-item-contact a').addClass('menu-item-active');
            break;
    }

    $('#checkbox-show-pass').on('change', function () {
        if ($(this).is(':checked')){
            $('#password-login').prop('type', 'text');
        } else {
            $('#password-login').prop('type', 'password');
        }
    });

    $('#label-show-pass').on('click', function () {
        $('#checkbox-show-pass').click();
    });

    $('.btn-login').on('click', function () {
        $(this).attr("disabled", true);
        Login.sendDataLogin();
    })
})