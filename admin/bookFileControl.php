<?php  
if(isset($_FILES["fileName"]) && $_FILES["fileName"]["name"][0]!='')
{
	$filetypes		=$_FILES["fileName"]["type"];//massiv
	$fileN=0;//daxil faylların sayı
	$imgN=0;//daxil edilən şəkillərin sayı
	$AllowedImg =  array('image/jpeg','image/png');
	foreach($filetypes as $filetype)
	{
		$fileN++;
		if(in_array($filetype, $AllowedImg))
		{
			$imgN++;
		}
	}
	if($fileN!=$imgN)
	{
		$errorEbook="Yalnız şəkil faylları əlavə edə bilərsiniz.";
	}
	else
	{
		if($imgN>1)
		{
			$errorEbook="Maksimum şəkil sayı 1";
		}
		else
		{
			include 'ebookFileControl.php';
		}
	}
}
else
{
	$errorEbook="Ən azı bir şəkil seçin.";
}
?>