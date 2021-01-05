<?php
if (isset($_GET['page']) && htmlspecialchars(trim($_GET['page'])) == 'removeTutorial' && !empty($_GET['page']) && is_numeric($_GET["id"]) && ceil($_GET["id"]) - $_GET["id"] == 0 && $_GET["id"] > 0) {
    $page = htmlspecialchars(trim($_GET['page']));
    $id = htmlspecialchars(trim($_GET["id"]));
    $query = $conn->prepare("SELECT * FROM tutorial WHERE id=?");
    $query->execute([$id]);
    $rows = $query->fetchall(PDO::FETCH_ASSOC);
    $count = count($rows);
    if ($count != 0) {
        $remove = $conn->prepare("DELETE FROM `tutorial` WHERE id=?");
        $remove->execute([$id]);
        header("location:./index.php?page=tutorial");
    } else {
        include '404.php';
    }
} else {
    include '404.php';
}
