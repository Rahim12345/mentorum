<?php  
if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='think')
{
	$photos='';
	if(isset($_POST['think']))
	{
		$name 		    =htmlspecialchars(trim($_POST['name']));
		$area 		    =htmlspecialchars(trim($_POST['area']));
		$thinkcontent 	=htmlspecialchars(trim($_POST['thinkcontent']));
		if(empty($name))
		{
			$errorThink='Təsüratçının adını daxil edin';
		}
		else
		{
			if(mb_strlen($name)>35)
			{
				$errorThink='Təsüratçının adı maksimum 35 simvol ola bilər';
			}
			else
			{
				if(empty($area))
				{
					$errorThink='Təsüratçının peşəsini daxil edin';
				}
				else
				{
					if(mb_strlen($area)>25)
					{
						$errorThink='Təsüratçının peşəsi maksimum 25 simvol daxil edə bilərsiz';
					}
					else
					{
						if(empty($thinkcontent))
						{
							$errorThink='Təsüratı yazın';
						}
						else
						{
							if(mb_strlen($thinkcontent)>190)
							{
								$errorThink='Təsürat maksimum 190 simvol daxil edə bilərsiz';
							}
							else
							{
								include 'thinkFileControl.php';
							}
						}
					}
				}
			}
		}
		include 'think_default.php';
	}
	else
	{
		include 'think_default.php';
	}
}
else
{
	header("location:../");
}
?>