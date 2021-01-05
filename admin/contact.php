<?php
if (isset($_GET['page']) && htmlspecialchars(trim($_GET['page'])) == 'contact') {
    if (isset($_POST['contactAdd'])) {
        $email         = htmlspecialchars(trim($_POST['email']));
        $phone         = htmlspecialchars(trim($_POST['phone']));
        if (empty($email)) {
            $errorContact = 'Email daxil edin';
        } else {
            if (mb_strlen($email) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorContact = 'Doğru bir email daxil edin';
            } else {
                if (empty($phone)) {
                    $errorContact = 'Əlaqə nömrəsi daxil edin';
                } else {
                    if (mb_strlen($phone) != 9) {
                        $errorContact = 'Doğru bir telefon nömrəsi daxil edin';
                    } else {
                        if (!preg_match('/^[0-9]{9}+$/', $phone)) {
                            $errorContact = 'Doğru bir telefon nömrəsi daxil edin';
                        } else {
                            $save = $conn->prepare("INSERT INTO contact(email,phone,created_at,updated_at) VALUES (?,?,?,?)");
                            $save->execute([$email, $phone, date("d.m.Y H:i:s"), date("d.m.Y H:i:s")]);
?>
                            <script type="text/javascript">
                                alert("Əlaqə məlumatları uğurla əlavə edildi");
                            </script>
<?php
                            echo '<meta http-equiv="refresh" content="0;url=index.php?page=contact">';
                        }
                    }
                }
            }
        }
        include 'contact_default.php';
    } else {
        include 'contact_default.php';
    }
} else {
    header("location:../");
}
?>