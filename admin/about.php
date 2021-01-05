<?php  
if(isset($_POST["about"]))
{
	$about_short	    = htmlspecialchars(trim($_POST["about_short"]));
	$about_title 		= htmlspecialchars(trim($_POST["about_title"]));
	$about_content		= trim($_POST["about_content"]);
	
	if(!empty($about_short))
	{
		if(mb_strlen($about_short)<245)
		{
			if(!empty($about_title))
			{
                if(mb_strlen($about_title)<79)
                {
                    if(!empty($about_content))
                    {
                        if(mb_strlen($about_title)<1490)
                        {
                            $save=$conn->prepare("INSERT INTO about(about_short,about_title,about_content,created_at,updated_at) VALUES (?,?,?,?,?)");
							$save->execute([$about_short,$about_title,$about_content,date('d.m.Y H:i:s'),date('d.m.Y H:i:s')]);
							?>
							<script type="text/javascript">
								alert("Məlumatlar uğurla əlavə edildi");
							</script>
							<?php
							echo '<meta http-equiv="refresh" content="0;url=index.php?page=about">';
                        }
                        else
                        {
                            $error_about="Haqqınızda əsəs mətnin uzunluğu maksimum 1490 simvol ola bilər";
                        }
                    }
                    else
                    {
                        $error_about="Haqqınızda əsəs mətn daxil edin";
                    }
                }
                else
                {
                    $error_about="Haqqınızda əsəs mətn üçün başlıq maksimum 79 simvol ola bilər";
                }
			}
			else
			{
				$error_about="Haqqınızda əsəs mətn üçün başlıq daxil edin";
			}
		}
		else
		{
			$error_about="Haqqınızda qısa məlumat maksimum 245 simvol ola bilər";
		}
	}
	else
	{
		$error_about="Haqqınızda qısa məlumat daxil edin";
	}
	include 'about_default.php';
}
else
{
	include 'about_default.php';
}
?>