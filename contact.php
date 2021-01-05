<?php

$name               = '';

$email              = '';

$subject            = '';

$message            = '';

if (isset($_POST["sendMessage"])) {

    $name               = htmlspecialchars(trim($_POST["name"]));

    $email              = htmlspecialchars(trim($_POST["emaill"]));

    $subject            = htmlspecialchars(trim($_POST["subject"]));

    $message            = htmlspecialchars(trim($_POST["message"]));

    $errorSuccestion    = '';

    if (empty($name)) {

        $errorSuccestion = "Adınızı daxil edin";

    } elseif (mb_strlen($name) < 3 || mb_strlen($name) > 30) {

        $errorSuccestion = "Gündəlik həyatdakı adınızı daxil edin";

    } elseif (empty($email)) {

        $errorSuccestion = "Emailinizi daxil edin";

    } elseif (mb_strlen($name) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errorSuccestion = "Doğru bir email daxil edin";

    } elseif (mb_strlen($subject) < 4 || mb_strlen($subject) > 30) {

        $errorSuccestion = "Mövzu 4-30 simvol arası olmalıdır";

    } elseif (mb_strlen($message) < 30 || mb_strlen($subject) > 500) {

        $errorSuccestion = "Təklif 30-500 simvol arası olmalıdır";

    } else {

        $user_id = '';

        if (isset($_SESSION["id"])) {

            $user_id = $_SESSION["id"];

        }

        $save = $conn->prepare("INSERT INTO suggestions(`name`,`email`,`subject`,`message`,`ip`,`user_agent`,`user_id`,`created_at`,`updated_at`) VALUES (?,?,?,?,?,?,?,?,?)");

        $save->execute([$name, $email, $subject, $message, $adresseip, "", $user_id, date("d/m/Y H:i:s"), date("d/m/Y H:i:s")]);

?>

        <script type="text/javascript">

            alert("Təklifiniz uğurla əlavə olundu.Tezliklə əməkdaşlarımız Sizinlə əlaqə saxlayacaq");

        </script>

<?php

        echo '<meta http-equiv="refresh" content="0;url=./pages/contact">';

    }

    include 'contact_default.php';

} else {

    include 'contact_default.php';

}



?>