<?php
$query = $conn->prepare('SELECT * FROM users WHERE id=?');
$query->execute([$_SESSION["id"]]);
$rows = $query->fetchall(PDO::FETCH_ASSOC);
$name       = $rows[0]["name"];
$email      = $rows[0]["email"];
$cv_error   = '';
if (isset($_POST["cv_send"])) {
    $name   = htmlspecialchars(trim($_POST["name"]));
    $email  = htmlspecialchars(trim($_POST["email"]));
    if (empty($name)) {
        $cv_error = 'Adınızı daxil edin';
    } elseif (mb_strlen($name) < 3 || mb_strlen($name) > 30) {
        $cv_error = 'Lütfən həyatdakı adınızı daxil edin';
    } elseif (empty($email)) {
        $cv_error = 'Emailinizi daxil edin';
    } elseif (strlen($email) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $cv_error = 'Doğru bir email daxil edin';
    } else {
        $newName            = '';
        if (isset($_FILES["fileName"])  && $_FILES["fileName"]["name"] != '') {
            $path           = "./assets/cv/";
            $random         = rand(1, 10000000);
            $random         = md5($random);
            $filetype        = $_FILES["fileName"]["type"];
            $AllowedExt     = array('application/msword', 'application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            $fileName       = $_FILES["fileName"]["name"];
            $newName        = $random . $fileName;
            $tmpFilePath    = $_FILES['fileName']['tmp_name'];
            if (!in_array($filetype, $AllowedExt)) {
                $cv_error   = "CV yalnız \"doc,docx,pdf\" formatlı ola bilər";
            } else {
                if ($_FILES["fileName"]["size"] > 5242880) {
                    $cv_error   = "CV niz 5MB - dan çox olmamalıdır";
                } else {
                    $file       = $path . $newName;

                    if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $file)) {
                        $save = $conn->prepare("INSERT INTO `cv`(`user_id`, `name`, `email`, `cv_url`, `ip`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?,?)");
                        $save->execute([$_SESSION["id"], $name, $email, $file, $adresseip, date('d.m.Y H:i:s'), date('d.m.Y H:i:s')]);

?>
                        <script type="text/javascript">
                            alert("CViniz uğurla göndərildi.Əməkdaşlarımız tezliklə CVinizə baxaraq emailinizə fikirlərini göndərəcəklər");
                        </script>
<?php
                        echo '<meta http-equiv="refresh" content="0;url=./pages/cvSend">';
                    } else {
                        $cv_error   = 'CV yüklənərkən xəta oldu! Bir daha cəhd edin';
                    }
                }
            }
        } else {
            $cv_error = 'CV daxil edin';
        }
    }
    include 'cv_send_default.php';
} else {
    include 'cv_send_default.php';
}
?>