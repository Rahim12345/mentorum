<?php  
if(isset($_POST["messageID"]))
{
    $modal          = '';
    $counter        = '';
    $content        = '';
    $array          = [];
    include '../include/config.php';
    $messageID 	=	htmlspecialchars(trim($_POST["messageID"]));
    if(!empty($messageID) && is_numeric($messageID) && ceil($messageID)-$messageID==0 && $messageID>0)
	{
        //Mesajın məzmunun ekrana çıxardım
        $query4Message=$conn->prepare("SELECT * FROM suggestions WHERE id=?");
		$query4Message->execute([$messageID]);
		$rows4Message=$query4Message->fetchall(PDO::FETCH_ASSOC);
        $count4Message=count($rows4Message);
        if($count4Message!=0)
        {
            $update = $conn->prepare("UPDATE `suggestions` SET `read_unread`=? WHERE `id`=?");
            $update->execute([1, $messageID]);

            $modal .='
            <table class="table">
				<tr>
					<td>Kimdən</td>
					<td>'.$rows4Message[0]["name"].'</td>
				</tr>
				<tr>
					<td>Əlaqə</td>
					<td>'.$rows4Message[0]["email"].'</td>
				</tr>
				<tr>
					<td>Mövzu</td>
					<td>'.$rows4Message[0]["subject"].'</td>
                </tr>
                <tr>
					<td>Təklif</td>
					<td>'.$rows4Message[0]["message"].'</td>
				</tr>
				<tr>
					<td>Vaxt</td>
					<td>'.$rows4Message[0]["created_at"].'</td>
				</tr>
			</table>
            ';

        // Oxunmamış mesajları saydım
        $query=$conn->prepare("SELECT * FROM suggestions WHERE read_unread=?");
		$query->execute([0]);
		$rows=$query->fetchall(PDO::FETCH_ASSOC);
        $counter=count($rows);
        
        //Bildiriş pəncərəsini yenilədim
        $query4Message=$conn->prepare("SELECT * FROM suggestions WHERE id>? ORDER BY id DESC");
		$query4Message->execute([0]);
		$rows4Message=$query4Message->fetchall(PDO::FETCH_ASSOC);
        $total=count($rows4Message);
        $content .= '
        <h6 class="dropdown-header">
        Bildiriş mərkəzi
        </h6>
        ';
            if ($total != 0) {
                foreach ($rows4Message as $row4Message) {
                    if ($row4Message["read_unread"] == 0) {
                        $content .= '
                        <a class="dropdown-item d-flex align-items-center notification" message-id="' . $row4Message["id"] . '" href="javascript:;" data-toggle="modal" data-target="#showMessage">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">' . $row4Message["created_at"] . ' <i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                            <span class="font-weight-bold">' . $row4Message["name"] . '</span>
                        </div>
                        </a>
                        ';
                    } else {
                        $content .= '
                        <a class="dropdown-item d-flex align-items-center notification" message-id="' . $row4Message["id"] . '" href="javascript:;" data-toggle="modal" data-target="#showMessage">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">' . $row4Message["created_at"] . ' <i class="fa fa-eye" aria-hidden="true"></i></div>
                            <span class="font-weight-bold">' . $row4Message["name"] . '</span>
                        </div>
                        </a>
                        ';
                    }
                }
            }

            $array=['modal' => $modal,'counter' => $counter,'content' => $content];
            echo json_encode($array);

            // echo $modal;
        }
    }
    else
    {
        header("location:./");
    }

}
else
{
    header("location:./");
}
?>