$(document).ready(function () {
    $("#registrationBtn").click(function (event) {
        $('#login').attr('class', 'modal fade');
        $("#login").removeAttr('aria-modal');
        $('#login').attr('aria-hidden', 'true');
        $('#login').css({
            'display': 'none',
            'padding-right': ''
        });
        $('div.modal-backdrop').remove();
    });
});