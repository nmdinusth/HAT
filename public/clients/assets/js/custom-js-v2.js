$(document).ready(function () {
    $('#show-register').click(function () {
        $('#login-form').addClass('hidden');
        $('#register-form').removeClass('hidden');
    });

    $('#show-login').click(function () {
        $('#register-form').addClass('hidden');
        $('#login-form').removeClass('hidden');
    });
});
