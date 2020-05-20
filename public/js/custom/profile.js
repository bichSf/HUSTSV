let $inputAvatarLeader = $('#input-avatar-leader'),
    $imageAvatarLeader = $('#image-avatar-leader'),
    $inputAvatarTeam = $('#input-avatar-team'),
    $imageAvatarTeam = $('#image-avatar-team');

const TYPE_IMAGES_ALLOW = ['image/jpg', 'image/png', 'image/jpeg'];

let Profile = (function () {
    let modules = {};

    modules.infoProfileTeam = function () {
        let dataTeam = new FormData($('#info-teams')[0]);
        dataTeam.append('_token', $('meta[name="csrf-token"]').attr('content'));
        let submitAjax = $.ajax({
            url: "/profile/team/store",
            type: "POST",
            data: dataTeam,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (res) {
            if (res.save == true) {
                window.location.href = '/home';
            } else {
                // alert('システムでの処理中にエラーが発生しました。\n' +
                //     '時間を開けて再度お試しください。');
                // window.location.reload();
            }
        });

        submitAjax.fail(function (response) {
            $('.btn-create-profile-team').attr("disabled", false);
            var messageList = response.responseJSON.errors;
            modules.resetError();
            modules.showMessageValidate(messageList);
        });
    };

    modules.infoProfileLeader = function () {
        let dataLeader = new FormData($('#info-leader')[0]);
        dataLeader.append('_token', $('meta[name="csrf-token"]').attr('content'));
        let submitAjax = $.ajax({
            url: "/profile/leader/store",
            type: "POST",
            data: dataLeader,
            processData: false,
            contentType: false,
        });

        submitAjax.done(function (res) {
            if (res.save == true) {
                $('.info-leader').css('display', 'none');
                $('.info-teams').css('display', 'block');
            } else {
                // alert('システムでの処理中にエラーが発生しました。\n' +
                //     '時間を開けて再度お試しください。');
                // window.location.reload();
            }
        });

        submitAjax.fail(function (response) {
            $('.btn-create-profile-leader').attr("disabled", false);
            var messageList = response.responseJSON.errors;
            modules.resetError();
            modules.showMessageValidate(messageList);
        });
    };

    modules.resetError = function () {
        $('.error-message').text('');
        $('.input-profile').removeClass('input-error');
    };

    modules.showMessageValidate = function (messageList) {
        $.each(messageList, function (key, value) {
            $('p.error-message[data-error=' + key + ']').text(value);
            $('input[name=' + key + ']').addClass('input-error');
            $('select[name=' + key + ']').addClass('input-error');
            $('textarea[name=' + key + ']').addClass('input-error');
            if (key == 'faculties' || key == 'class') {
                $('.faculties').text(value);
            }
            if (key == 'start_tenure' || key == 'end_tenure') {
                $('.tenure').text(value);
            }
        });
        $('html, body').animate({
            scrollTop: $(document).find('p.error-message[data-error=' + Object.keys(messageList)[0] + ']').offset().top - 300
        }, 0);
    };


    modules.setEventSelectImageMap = function ($imageMap, $inputImageMap) {
        $imageMap.on('click', function (event) {
            modules.prevent(event);
            $inputImageMap.trigger('click');
        });
        $imageMap.on('dragover', function (event) {
            modules.prevent(event);
        });
        $imageMap.on('dragleave', function (event) {
            modules.prevent(event);
        });
        $imageMap.on('drop', function (event) {
            modules.fileSelectHandler(event, true, $imageMap, $inputImageMap);
        });
        $inputImageMap.on('change', function (event) {
            modules.fileSelectHandler(event, false, $imageMap, $inputImageMap);
        });
    };

    modules.fileSelectHandler = function (event, isDrop, $imageAvatar, $inputAvatar) {
        modules.prevent(event);
        let files = event.target.files || event.originalEvent.dataTransfer.files;
        if (files.length === 0) {
            return
        }
        if (isDrop) {
            $inputAvatar.prop('files', files);
        }
        $imageAvatar.html('');
        $imageAvatar.append(modules.createImageMapPreview(URL.createObjectURL(files[0])));
        modules.checkValidateImageAdd($imageAvatar, $inputAvatar);
    };

    modules.createImageMapPreview = function (src) {
        let $container = $('<div>', {
                class: "dz-default dz-message"
            }),
            $img = $('<img>', {
                class: 'img-view-custom',
                src: src
            }).appendTo($container);
        return $container;
    };

    modules.checkValidateImageAdd = function($imageAvatar, $inputAvatar) {
        let file = $inputAvatar[0].files[0];
        if (!file.type || TYPE_IMAGES_ALLOW.indexOf(file.type) === -1) {
            modules.showMessageValidateImage('Định dạng hình ảnh được phép là jpg hoặc png.');
            $imageAvatar.html('<i class="fa fa-picture-o fa-3x" aria-hidden="true"></i>');
            checkImage = false;
        } else if (file.size > 5120000) {
            $imageAvatar.html('<i class="fa fa-picture-o fa-3x" aria-hidden="true"></i>');
            modules.showMessageValidateImage('Dung lượng ảnh vượt quá 5MB');
            checkImage = false;
        } else {
            checkImage = true;
        }
        if (checkImage) {
            modules.showMessageValidateImage('');
        }
    };

    modules.showMessageValidateImage = function(message) {
        if (message === '') {
            $('p[data-error=avatar]').text(message).show();
            $('p[data-error=avatar]').removeClass('image-error').show();
        } else {
            $('p[data-error=avatar]').text(message).show();
            $('p[data-error=avatar]').addClass('image-error').show();
        }
    };

    modules.checkValidate = function (messageList) {
        let listError = $(document).find('p.image-error');
        if (listError.length !== 0) {
            $('html, body').animate({
                scrollTop: (
                    $(document).find('p.image-error').offset().top - 300
                )
            }, 300);
            return false
        } else {
            $('html, body').animate({
                scrollTop: (
                    $(document).find('p.error-message[data-error=' + Object.keys(messageList)[0] + ']').offset().top - 300
                )
            }, 300);
        }
        return true;
    };

    modules.prevent = function (event) {
        event.preventDefault();
        event.stopPropagation()
    };

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    Profile.setEventSelectImageMap($imageAvatarLeader, $inputAvatarLeader);
    Profile.setEventSelectImageMap($imageAvatarTeam, $inputAvatarTeam);

    $('.btn-create-profile-leader').on('click', function () {
        $(this).attr("disabled", true);
        Profile.infoProfileLeader();
    });

    $('.btn-create-profile-team').on('click', function () {
        $(this).attr("disabled", true);
        Profile.infoProfileTeam();
    });

    $('.btn-edit-team').on('click', function () {
        $(this).attr("disabled", true);
        Profile.infoProfileTeam();
        Profile.infoProfileLeader();
    });

})