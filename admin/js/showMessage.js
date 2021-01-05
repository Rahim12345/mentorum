$(document).ready(function () {
    $('body').on('click', '.notification', function () {
        var messageID = $(this).attr("message-id");
        $.ajax({
            url: "showMessage.php",
            method: "POST",
            data: {
                messageID: messageID
            },
            success: function (data) {
                var getarray = jQuery.parseJSON(data);
                var modal = getarray.modal;
                var counter = getarray.counter;
                var content = getarray.content;
                $('#messageContent').html(modal);
                $('.notiCounter').html(counter);
                $('#notiIcon').html(content);
            }
        });
    });
});