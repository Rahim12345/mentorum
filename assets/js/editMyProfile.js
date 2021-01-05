$(document).ready(function () {

    $("#editMyProfile").click(function (event) {

        //stop submit the form, we will post it manually.
        event.preventDefault();

        // Get form
        var form = $('#editProfileForm')[0];

        // Create an FormData object
        var data = new FormData(form);

        // If you want to add an extra field for the FormData
        data.append("userAgent", navigator.userAgent);

        // disabled the submit button
        $("#editMyProfile").prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "editMyprofile.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {

                if (data === "true") {
                    window.location.href = './index.php?page=edit';
                } else {
                    alert(data);
                }
                $("#editMyProfile").prop("disabled", false);

            },
            error: function (e) {

                alert("Xəta : ", e);
                $("#editMyProfile").prop("disabled", false);

            }
        });

    });

});