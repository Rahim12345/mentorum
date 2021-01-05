<?php
session_start();
include 'include/config.php';
if (isset($_POST['bookID'])) {

    $output  = '';
    $bookID  = $_POST['bookID'];

    if ($bookID == '') {
        $output = 'Bir şeylər səhv gedir';
    } else {
        $query = $conn->prepare("SELECT * FROM library WHERE id=?");
        $query->execute([$bookID]);
        $rows = $query->fetchall(PDO::FETCH_ASSOC);

        if (count($rows) != 0) {

            $counter = $rows[0]['download'] + 1;
            $update = $conn->prepare("UPDATE `library` SET `download`=? WHERE `id`=?");
            $update->execute([$counter, $bookID]);


            $query = $conn->prepare("SELECT * FROM library ORDER BY id DESC");
            $query->execute();
            $rows = $query->fetchall(PDO::FETCH_ASSOC);
            if (count($rows) != 0) {
                foreach ($rows as $row) {
                    $output .= '
                    <!-- Card -->
                    <div class="col-sm-3">
                        <!-- Card image -->
                        <img class="card-img-top" src="assets/ebooks/' . $row['image'] . '" title="' . $row['title'] . '" alt="Card image cap">
                        <span><a href="javascript:;" data-id="' . $row['id'] . '" class="badge badge-primary download" onclick="download();" style="padding: 8px;margin-top: 10px;margin-bottom:10px;">Endir <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a></span>
                        <i class="fa fa-arrow-circle-down btn" style="float: right;background-color:red;line-height:10px;color:white;margin-top:10px;border-top-left-radius: 0;border-bottom-left-radius: 0;"></i> <span id="' . $row['id'] . '" class="counter btn" style="float: right;background-color:blue;line-height:10px;color:white;margin-top:10px;border-top-right-radius: 0;border-bottom-right-radius: 0;">' . $row['download'] . '</span>
                    </div>
                    <!-- Card -->
                    
                    ';
                }
            } else {
            }
        } else {
            $output = 'Bir şeylər səhv gedir';
        }
    }
    echo $output;
} else {
    header("location:./");
}
