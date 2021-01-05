<?php
session_start();
include 'include/config.php';
if (isset($_POST['userAgent'], $_POST['email'], $_POST['password'], $_POST['id'])) {

    $output         = '';
    $userAgent      = $_POST['userAgent'];
    $email          = htmlspecialchars(trim($_POST['email']));
    $password       = htmlspecialchars(trim($_POST['password']));
    $id             = htmlspecialchars(trim($_POST['id']));
    if ($email == '') {
        $output = 'Lütfən emailinizi daxil edin';
    } elseif ($password == '') {
        $output = 'Lütfən şifrənizi daxil edin';
    } else {
        $query = $conn->prepare("SELECT * FROM users WHERE email=?");
        $query->execute([$email]);
        $rows = $query->fetchall(PDO::FETCH_ASSOC);

        if (count($rows) != 0) {
            if ($password == $rows[0]['password'] && $rows[0]['status'] != '1') {
                $_SESSION['id']         = $rows[0]['id'];
                $_SESSION['status']     = 0;
                $output = 'false';
            } elseif ($password == $rows[0]['password'] && $rows[0]['status'] == '1') {
                $_SESSION['id']         = $rows[0]['id'];
                $_SESSION['status']     = 1;
                $output = 'true';
            } else {
                $output = 'Şifrə yanlışdır';
            }
        } else {
            $output = 'Belə bir email tapılmadı';
        }
    }
    echo $output;
} else {
    header("location:./");
}
