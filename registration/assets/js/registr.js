$(document).ready(function () {

    $("#registrBtn").click(function (event) {

        //stop submit the form, we will post it manually.
        event.preventDefault();

        // Get form
        var form = $('#registrForm')[0];

        // Create an FormData object
        var data = new FormData(form);

        // If you want to add an extra field for the FormData
        data.append("userAgent", navigator.userAgent);

        // disabled the submit button
        $("#registrBtn").prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "registration.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {

                if(data === "true")
                {
                    window.location.href = '../';
                }
                else
                {
                    alert(data);
                }
                $("#registrBtn").prop("disabled", false);

            },
            error: function (e) {

                alert("Xəta : ", e);
                $("#registrBtn").prop("disabled", false);

            }
        });

    });

});