<?php  
if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='shortcut_icon')
{
	$photos='';
	if(isset($_POST['shortcut_icon']))
	{
		if(isset($_FILES["fileName"]) && $_FILES["fileName"]["name"][0]!='')
		{
			$filetypes		= $_FILES["fileName"]["type"];//massiv
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
				$errorShortcut_icon="Yalnız şəkil faylları əlavə edə bilərsiniz.";
			}
			else
			{
				if($imgN>1)
				{
					$errorShortcut_icon="Yalnız bir şəkil daxil edə bilərsiniz!";
				}
				else
				{
					include 'php-image-resize.php';
					$fileNames=$_FILES["fileName"]["name"];
					$random=rand(1,10000000);
					$random=md5($random);
					for($i=0;$i<count($fileNames);$i++)
					{
						$tmpFilePath = $_FILES['fileName']['tmp_name'][$i];
						if($i!=count($fileNames)-1)
						{
							$photos.=$random.$fileNames[$i].',';
						}
						else
						{
							$photos.=$random.$fileNames[$i];
						}
						$image = new SimpleImage($tmpFilePath);
						$image->resize(32,32);
						$filePathA = "../assets/logo/" .$random.$fileNames[$i];
						$image->save($filePathA);
					}
					$save=$conn->prepare("INSERT INTO shortcut_icon(url) VALUES (?)");
		          	$save->execute([$photos]);
		          	?>
		<script type="text/javascript">
		alert("shortcut icon uğurla əlavə edildi");
		</script>
		          	<?php
		          	echo '<meta http-equiv="refresh" content="0;url=index.php?page=shortcut_icon">';
				}
			}
		}
		else
		{
			$errorShortcut_icon="Lütfən şəkil seçin!";
		}
		include 'shortcut_icon_default.php';
	}
	else
	{
		include 'shortcut_icon_default.php';
	}
}
else
{
	header("location:../");
}
?>