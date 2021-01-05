$(document).ready(function () {
    $.ajax({
        url: "notification.php",
        method: "POST",
        success: function (data) {
            var getarray = jQuery.parseJSON(data);
            var counter = getarray.counter;
            var notification = getarray.notification;
            $('.notiCounter').html(counter);
            $('#notiIcon').html(notification);
        }
    });
});