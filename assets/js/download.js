$(function download() {
    $(".download").click(function (e) {
        var bookID = $(this).attr("data-id");
        var counter = $("span#" + bookID).html();
        counter = parseInt(counter) + 1;
        $.ajax({
            url: "download.php",
            method: "POST",
            data: {
                bookID: bookID
            },
            cache: false,
            success: function (data) {
                $("span#" + bookID).html(counter);
            }
        });
    });
});