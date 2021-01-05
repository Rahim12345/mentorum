<?php  
if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='bannerPlus')
{
	$photos='';
	if(isset($_POST['bannerPlus']))
	{
		$title 		=htmlspecialchars(trim($_POST['title']));
		$Subtitle 	=htmlspecialchars(trim($_POST['Subtitle']));
		if(empty($title))
		{
			$errorBanner='Başlıq daxil edin';
		}
		else
		{
			if(mb_strlen($title)>35)
			{
				$errorBanner='Başlıq üçün maksimum 35 simvol daxil edə bilərsiz';
			}
			else
			{
				if(empty($Subtitle))
				{
					$errorBanner='Başlıq 2 daxil edin';
				}
				else
				{
					if(mb_strlen($Subtitle)>110)
					{
						$errorBanner='Başlıq 2 üçün maksimum 35 simvol daxil edə bilərsiz';
					}
					else
					{
						include 'bannerFileControl.php';
					}
				}
			}
		}
		include 'bannerPlus_def.php';
	}
	else
	{
		include 'bannerPlus_def.php';
	}
}
else
{
	header("location:../");
}
?>