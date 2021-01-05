<?php

session_start();

include './include/config.php';

if(isset($_POST["nameEdit"],$_POST["passwordEdit"],$_POST["profisionEdit"],$_POST["phoneEdit"],

        $_POST["addressEdit"],$_POST["practiceEdit"],$_POST["aboutEdit"],$_POST["twEdit"],

        $_POST["fbEdit"],$_POST["instaEdit"],$_POST["inEdit"]))

{

    $output         = '';

    $userAgent      = htmlspecialchars(trim($_POST['userAgent']));

    $name           = htmlspecialchars(trim($_POST['nameEdit']));

    $password       = htmlspecialchars(trim($_POST['passwordEdit']));

    $profision      = htmlspecialchars(trim($_POST['profisionEdit']));

    $phone          = htmlspecialchars(trim($_POST['phoneEdit']));

    $address        = htmlspecialchars(trim($_POST['addressEdit']));

    $practice       = htmlspecialchars(trim($_POST['practiceEdit']));

    $aboutt         = htmlspecialchars(trim($_POST['aboutEdit']));

    $twEdit         = htmlspecialchars(trim($_POST['twEdit']));

    $fbEdit         = htmlspecialchars(trim($_POST['fbEdit']));

    $instaEdit      = htmlspecialchars(trim($_POST['instaEdit']));

    $inEdit         = htmlspecialchars(trim($_POST['inEdit']));



    if($name=='')

    {

        $output = 'Adınızı daxil edin';

    }

    elseif(mb_strlen($name)<3 || mb_strlen($name)>30)

    {

        $output = 'Lütfən həyatdakı adınızı daxil edin';

    }

    elseif(!preg_match("/^\p{L}[\p{L} _.-]+$/u", $name))

    {

        $output = 'Adınızda yalnız hərflər və boşluqlar ola bilər';

    }

    elseif($password == '')

    {

        $output = 'Lütfən şifrənizi daxil edin';

    }

    elseif(strlen($password) > 50 || strlen($password) < 8)

    {

        $output = 'Şifrə 8 - 50 simvoldan ibarət olmalıdır';

    }

    elseif(mb_strlen($profision)>50)

    {

        $output = 'İxtisasınız maksimum 50 simvoldan ibarət ola bilər';

    }

    elseif(strlen($phone)>10)

    {

        $output = 'Telefon nömrəsi 10 simvoldan ibarət olmalıdır';

    }

    elseif(mb_strlen($address)>50)

    {

        $output = 'Ünvan maksimum 50 simvoldan ibarət ola bilər';

    }

    elseif(mb_strlen($practice)>200)

    {

        $output = 'İş təcrübəsi maksimum 200 simvoldan ibarət ola bilər';

    }

    elseif(mb_strlen($aboutt)>200)

    {

        $output = 'Haqqınızda maksimum 200 simvoldan ibarət ola bilər';

    }

    elseif(mb_strlen($twEdit)>245)

    {

        $output = 'Düzgün bir twitter linki daxil edin';

    }

    elseif(mb_strlen($fbEdit)>245)

    {

        $output = 'Düzgün bir facebook linki daxil edin';

    }

    elseif(mb_strlen($instaEdit)>245)

    {

        $output = 'Düzgün bir instagram linki daxil edin';

    }

    elseif(mb_strlen($inEdit)>245)

    {

        $output = 'Düzgün bir Linkedin linki daxil edin';

    }

    else

    {

        $newName            = '';

        if(isset($_FILES["imgInp"])  && $_FILES["imgInp"]["name"]!='')

        {

            $path           = "./assets/profiles/";

            $path2          = "./assets/profiles600/";

            $random         = rand(1,10000000);

            $random         = md5($random);

            $filetype		= $_FILES["imgInp"]["type"];

            $AllowedImg     = array('image/jpeg','image/png');

            $fileName       = $_FILES["imgInp"]["name"];

            $newName        = $random.$fileName;

            $tmpFilePath    = $_FILES['imgInp']['tmp_name'];

            if(!in_array($filetype, $AllowedImg))

            {

                $output = "Profil üçün yalnız \"jpeg,png\" formatlı şəkil seçə bilərsiniz";

            }

            else

            {

                include './registration/php-image-resize.php';

                $image      = new SimpleImage($tmpFilePath);

                $image->resize(234,234);

                $file       = $path.$newName;

                $image->save($file);



                $image2     = new SimpleImage($tmpFilePath);

                $image2->resize(600,600);

                $file2      = $path2.$newName;

                $image2->save($file2);

                

                $update=$conn->prepare("UPDATE `users` SET `name`=?,`password`=?,`profision`=?,`address`=?,`phone`=?,`practice`=?,`image`=?,`twitter`=?,`facebook`=?,`instagram`=?,`linkedin`=?,`updated_at`=? WHERE `id`=?");

                $update->execute([$name,$password,$profision,$address,$phone,$practice,$newName,$twEdit,$fbEdit,$instaEdit,$inEdit,date("d.m.Y H:i:s"),$_SESSION['id']]);



                $output = 'true';

            }

        }

        else

        {

            $update=$conn->prepare("UPDATE `users` SET `name`=?,`password`=?,`profision`=?,`address`=?,`phone`=?,`practice`=?,`twitter`=?,`facebook`=?,`instagram`=?,`linkedin`=?,`updated_at`=? WHERE `id`=?");

            $update->execute([$name,$password,$profision,$address,$phone,$practice,$twEdit,$fbEdit,$instaEdit,$inEdit,date("d.m.Y H:i:s"),$_SESSION['id']]);

            

            $output = 'true';

        }        

    }

    echo $output;

}

else

{

    header("location:./");

}

