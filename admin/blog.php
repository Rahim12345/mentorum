<?php 
$who            = '';
$title          = '';
$content        = ''; 
if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='blog')
{
	$photos='';
	if(isset($_POST['blogPlus']))
	{
		$who 		= htmlspecialchars(trim($_POST['who']));
		$title 		= htmlspecialchars(trim($_POST['title']));
        $content 	= trim($_POST['content']);
        
        $listID     = [];
        $queryCheck = $conn->prepare('SELECT id FROM users WHERE status!=?');
        $queryCheck->execute([3]);
        $rowsCheck  = $queryCheck->fetchall(PDO::FETCH_ASSOC);

        foreach($rowsCheck as $rowcheck)
        {
            $listID[]=$rowcheck["id"];
        }


        if(empty($who) || !in_array($who,$listID))
        {
            $errorBlog='Paylaşan adamı daxil edin';
        }
        elseif(empty($title))
        {
            $errorBlog='Başlıq daxil edin';
        }
        elseif(mb_strlen($title)>99)
        {
            $errorBlog='Başlıq ən çox 99 simvol ola bilər';
        }
        elseif(empty($content))
        {
            $errorBlog='Blog daxil edin';
        }
        elseif(mb_strlen($content)>5000)
        {
            $errorBlog='Blog ən çox 5000 simvol ola bilər';
        }
        else
        {
            include 'blogFileControl.php';
            // $errorBlog=$who."-".$title."-".$content;
        }
		include 'blog_default.php';
	}
	else
	{
		include 'blog_default.php';
	}
}
else
{
	header("location:../");
}
?>