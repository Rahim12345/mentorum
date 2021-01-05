<?php  
if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='ebook')
{
	$photos='';
	$books='';
	if(isset($_POST['book']))
	{
		$title 		=htmlspecialchars(trim($_POST['title']));
		if(empty($title))
		{
			$errorEbook='Başlıq daxil edin';
		}
		else
		{
			if(mb_strlen($title)>95)
			{
				$errorEbook='Başlıq üçün maksimum 95 simvol daxil edə bilərsiz';
			}
			else
			{
				include 'bookFileControl.php';
			}
		}
		include 'ebook_default.php';
	}
	else
	{
		include 'ebook_default.php';
	}
}
else
{
	header("location:../");
}
?>