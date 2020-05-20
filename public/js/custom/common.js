let Common = (function () {
    let modules = {};

    modules.optionDateTime = function () {
        $('.date-time').datepicker({
            format: 'yyyy-mm-dd',
            language: "vi",
            forceParse: true,
            useCurrent: false,
        });
    };

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {
    Common.optionDateTime();
})