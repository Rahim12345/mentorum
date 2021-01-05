$(document).ready(function () {
    $("#registrBtn").click(function (event) {
        var userAgent = navigator.userAgent;
        var username = $("#username").val();
        var email = $("#email2").val();
        var password = $("#password2").val();
        var confirm_password = $("#confirm_password").val();
        var birthdate = $("#birthdate").val();
        var status = $("#status").val();
        $.ajax({
            url: "registration.php",
            method: "POST",
            data: {
                userAgent: userAgent,
                username: username,
                email: email,
                password: password,
                confirm_password: confirm_password,
                birthdate: birthdate,
                status: status
            },
            cache: false,
            success: function (data) {
                if (data === "true") {
                    window.location.href = './';
                } else {
                    alert(data);
                }
            }
        });
    });
});