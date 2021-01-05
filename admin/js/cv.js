$(document).ready(function () {
    $('.cv').on('click', function () {
        var cvID = $(this).attr("cv-id");
        $.ajax({
            url: "cvUpdate.php",
            method: "POST",
            data: {
                cvID: cvID
            },
            success: function (data) {
                location.reload();
            }
        });
    });
});