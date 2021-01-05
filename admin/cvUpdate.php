<?php  
if(isset($_POST["cvID"]))
{
    include '../include/config.php';
    $cvID 	=	htmlspecialchars(trim($_POST["cvID"]));
    $update = $conn->prepare("UPDATE `cv` SET `read_unread`=?,updated_at=? WHERE `id`=?");
    $update->execute([1,date("d.m.Y H:i:s"),$cvID]);
}
else
{
    header("location:./");
}
?>