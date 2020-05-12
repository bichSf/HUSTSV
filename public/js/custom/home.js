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
})