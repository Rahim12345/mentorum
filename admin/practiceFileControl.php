<?php
$newName            = '';
if (isset($_FILES["fileName"])  && $_FILES["fileName"]["name"] != '') {
    $path           = "../assets/practiceMini/";
    $path2          = "../assets/practiceSingle/";
    $random         = rand(1, 10000000);
    $random         = md5($random);
    $filetype        = $_FILES["fileName"]["type"];
    $AllowedImg     = array('image/jpeg', 'image/png');
    $fileName       = $_FILES["fileName"]["name"];
    $newName        = $random . $fileName;
    $tmpFilePath    = $_FILES['fileName']['tmp_name'];
    if (!in_array($filetype, $AllowedImg)) {
        $errorPractice = "Blog üçün yalnız \"jpeg,png\" formatlı şəkil seçə bilərsiniz";
    } else {
        include 'php-image-resize.php';
        $image      = new SimpleImage($tmpFilePath);
        $image->resize(780, 520);
        $file       = $path . $newName;
        $image->save($file);

        $image2     = new SimpleImage($tmpFilePath);
        $image2->resize(900, 500);
        $file2      = $path2 . $newName;
        $image2->save($file2);
        include 'sef.php';
        $slug = seo($title);
        $slug = date("Y") . "-" . date("m") . "-" . date("d") . "-" . date("H") . "-" . date("i") . "-" . date("s") . "-" . $slug;
        $save = $conn->prepare("INSERT INTO practice(`title`, `slug`, `content`, `image_url`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?)");
        $save->execute([$title, $slug, $content, $newName, date("d.m.Y H:i:s"), date("d.m.Y H:i:s")]);

?>
        <script type="text/javascript">
            alert("Təcrübə proqramı uğurla paylaşıldı");
        </script>
        echo '<meta http-equiv="refresh" content="0;url=./index.php?page=practice">';
<?php
    }
} else {
    $errorPractice = "Təcrübə proqramı üçün şəkil daxil edin";
}

?>