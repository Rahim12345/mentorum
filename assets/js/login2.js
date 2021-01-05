$(document).ready(function () {
    $("#loginBtn2").click(function (event) {
        var userAgent = navigator.userAgent;
        var email = $("#email2").val();
        var password = $("#password2").val();
        var id = $("#id2").attr("data-id");
        $.ajax({
            url: "login2.php",
            method: "POST",
            data: {
                userAgent: userAgent,
                email: email,
                password: password,
                id: id
            },
            cache: false,
            success: function (data) {
                if (data == "false") {
                    window.location.href = './pages/profile/'+id;
                } else if (data == "true") {
                    window.location.href = './admin/index.php';
                } else {
                    alert(data);
                }
            }
        });
    });
});