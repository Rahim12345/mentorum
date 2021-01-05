<?php
session_start();
include '../include/config.php';
if(isset($_POST["name"],$_POST["name"],$_POST["email"],
        $_POST["password"],$_POST["status"],$_POST["profision"],$_POST["phone"],
        $_POST["address"],$_POST["practice"],$_POST["aboutt"]))
{
    $output = '';
    $userAgent = htmlspecialchars(trim($_POST['userAgent']));
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $status = htmlspecialchars(trim($_POST['status']));
    $profision = htmlspecialchars(trim($_POST['profision']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $address = htmlspecialchars(trim($_POST['address']));
    $practice = htmlspecialchars(trim($_POST['practice']));
    $aboutt = htmlspecialchars(trim($_POST['aboutt']));

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
    elseif($email == '')
    {
        $output = 'Lütfən emailinizi daxil edin';
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $output = 'Doğru bir email daxil edin';
    }
    elseif($password == '')
    {
        $output = 'Lütfən şifrənizi daxil edin';
    }
    elseif(strlen($password) > 50 || strlen($password) < 8)
    {
        $output = 'Şifrə 8 - 50 simvoldan ibarət olmalıdır';
    }
    elseif($status == '')
    {
        $output = 'Status seçin';
    }
    elseif (!in_array($status, [2, 3])) 
    {
        $output = 'Hackmi etmək istiyirsən';
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
    else
    {
        $query = $conn->prepare("SELECT * FROM users WHERE email=?");
        $query->execute([$email]);
        $rows = $query->fetchall(PDO::FETCH_ASSOC);
        if (count($rows) != 0)
        {
            $output = 'Bu emaillə artıq qeydiyyatdan keçilib';
        }
        else
        {
            $newName            = '';
            if(isset($_FILES["wizardPicture"])  && $_FILES["wizardPicture"]["name"]!='')
            {
                $path           = "../assets/profiles/";
                $path2          = "../assets/profiles600/";
                $random         = rand(1,10000000);
                $random         = md5($random);
                $filetype		= $_FILES["wizardPicture"]["type"];
                $AllowedImg     = array('image/jpeg','image/png');
                $fileName       = $_FILES["wizardPicture"]["name"];
                $newName        = $random.$fileName;
                $tmpFilePath    = $_FILES['wizardPicture']['tmp_name'];
                if(!in_array($filetype, $AllowedImg))
                {
                    $output = "Profil üçün yalnız \"jpeg,png\" formatlı şəkil seçə bilərsiniz";
                }
                else
                {
                    include 'php-image-resize.php';
                    $image      = new SimpleImage($tmpFilePath);
                    $image->resize(234,234);
                    $file       = $path.$newName;
                    $image->save($file);

                    $image2     = new SimpleImage($tmpFilePath);
                    $image2->resize(600,600);
                    $file2      = $path2.$newName;
                    $image2->save($file2);
                    
                    $save=$conn->prepare("INSERT INTO users(`name`, `email`, `password`, `status`, `profision`, `phone`, `address`, `practice`, `aboutt`, `image`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
                    $save->execute([$name,$email,$password,$status,$profision,$phone,$address,$practice,$aboutt,$newName,date("d.m.Y H:i:s"),date("d.m.Y H:i:s")]);
                    
                    $query = $conn->prepare("SELECT * FROM users WHERE email=?");
                    $query->execute([$email]);
                    $rows = $query->fetchall(PDO::FETCH_ASSOC);
                    if (count($rows) == 0) {
                        $output = 'Registrasiya olunarkən bir şeylər səhv getdi bir daha cəhd edin';
                    } else {
                        $_SESSION['id'] = $rows[0]['id'];
                        $output = 'true';
                    }
                }
            }
            else
            {
                $save=$conn->prepare("INSERT INTO users(`name`, `email`, `password`, `status`, `profision`, `phone`, `address`, `practice`, `aboutt`, `image`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
                $save->execute([$name,$email,$password,$status,$profision,$phone,$address,$practice,$aboutt,$newName,date("d.m.Y H:i:s"),date("d.m.Y H:i:s")]);
                
                $query = $conn->prepare("SELECT * FROM users WHERE email=?");
                $query->execute([$email]);
                $rows = $query->fetchall(PDO::FETCH_ASSOC);
                if (count($rows) == 0) {
                    $output = 'Registrasiya olunarkən bir şeylər səhv getdi bir daha cəhd edin';
                } else {
                    $_SESSION['id'] = $rows[0]['id'];
                    $output = 'true';
                }
            }
        }        
    }
    echo $output;
}
else
{
    header("location:index.php");
}
?>
