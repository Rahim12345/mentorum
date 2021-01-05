$(document).ready(function () {
    $("#loginBtn").click(function (event) {
        var userAgent = navigator.userAgent;
        var email = $("#email").val();
        var password = $("#password").val();
        $.ajax({
            url: "login.php",
            method: "POST",
            data: {
                userAgent: userAgent,
                email: email,
                password: password
            },
            cache: false,
            success: function (data) {
                if (data === "false") {
                    window.location.href = './';
                } else if (data === "true") {
                    window.location.href = './admin/index.php';
                } else {
                    alert(data);
                }
            }
        });
    });
});