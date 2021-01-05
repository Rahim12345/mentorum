<?php 
$title          = '';
$content        = ''; 
if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='practice')
{
	$photos='';
	if(isset($_POST['practicePlus']))
	{
		$title 		= trim($_POST['title']);
        $content 	= '<pre>'.trim($_POST['content']).'</pre>';

        $content    = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $content)));
        $content    = trim(str_replace("<p>&nbsp;</p>", " ", $content));

        
        if(empty($title))
        {
            $errorPractice='Proqramın başlığı daxil edin';
        }
        elseif(mb_strlen($title)>99)
        {
            $errorPractice='Proqramın başlığı ən çox 99 simvol ola bilər';
        }
        elseif(empty($content))
        {
            $errorPractice='Proqramın mətnini daxil edin';
        }
        elseif(mb_strlen($content)>5000)
        {
            $errorPractice='Proqramın mətni ən çox 5000 simvol ola bilər';
        }
        else
        {
            include 'practiceFileControl.php';
        }
		include 'practice_default.php';
	}
	else
	{
		include 'practice_default.php';
	}
}
else
{
	header("location:../");
}
?>