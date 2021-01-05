<?php
date_default_timezone_set('Asia/Baku');
$servername = "localhost";
$username = "root";
$password = "";
$database = "mentordb";
// create connection
try {
    $conn = new PDO ("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed :" . $e -> getMessage();
}
?>