<?php
include '../include/config.php';

$array = [];
$countNoti = '';
$messages = '';
$output = '';
$queryNew = $conn->prepare("SELECT id FROM suggestions WHERE read_unread=?");
$queryNew->execute([0]);
$rowsNew = $queryNew->fetchall(PDO::FETCH_ASSOC);
$new = count($rowsNew);

$query = $conn->prepare("SELECT * FROM suggestions ORDER BY id DESC");
$query->execute();
$rows = $query->fetchall(PDO::FETCH_ASSOC);
$total = count($rows);

$output .= '
        <h6 class="dropdown-header">
        Bildiriş mərkəzi
        </h6>
        ';


if ($total != 0) {
    foreach ($rows as $row) {
        if ($row["read_unread"] == 0) {
            $output .= '
            <a class="dropdown-item d-flex align-items-center notification" message-id="' . $row["id"] . '" href="javascript:;" data-toggle="modal" data-target="#showMessage">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">' . $row["created_at"] . ' <i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                <span class="font-weight-bold">' . $row["name"] . '</span>
            </div>
            </a>
            ';
        } else {
            $output .= '
            <a class="dropdown-item d-flex align-items-center notification" message-id="' . $row["id"] . '" href="javascript:;" data-toggle="modal" data-target="#showMessage">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">' . $row["created_at"] . ' <i class="fa fa-eye" aria-hidden="true"></i></div>
                <span class="font-weight-bold">' . $row["name"] . '</span>
            </div>
            </a>
            ';
        }
    }
} else {
    $output .= '
    <a class="dropdown-item d-flex align-items-center notification" href="#">
    <div class="mr-3">
        <div class="icon-circle bg-primary">
        <i class="fas fa-file-alt text-white"></i>
        </div>
    </div>
    <div>
        <div class="small text-gray-500"></div>
        <span class="font-weight-bold">Hələ də bildirişiniz yoxdur</span>
    </div>
    </a>
    ';
}

$array = ['counter' => $new, 'notification' => $output];
echo json_encode($array);
