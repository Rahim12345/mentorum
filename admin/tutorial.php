<?php  
if(isset($_POST["tutorial"]))
{
	$tutorial_input=htmlspecialchars(trim($_POST["tutorial_input"]));
	if(!empty($tutorial_input))
	{
		if(strlen($tutorial_input)<249)
		{
            $link_id=explode("=",$tutorial_input);
			if(count($link_id)==2)
			{
				$link="https://www.youtube.com/embed/".$link_id[1];
				$save=$conn->prepare("INSERT INTO tutorial(link,created_at,updated_at) VALUES (?,?,?)");
				$save->execute([$link,date("d/m/Y H:i:s"),date("d/m/Y H:i:s")]);
				?>
				<script type="text/javascript">
					alert("Onlayn dərslər üçün youtube video linki uğurla əlavə olundu uğurla əlavə edildi");
				</script>
				<?php
				echo '<meta http-equiv="refresh" content="0;url=index.php?page=tutorial">';
			}
			else
			{
				$error_tutorial="Düzgün bir youtube linki daxil edin";
			}
		}
		else
		{
			$error_tutorial="Link 249 simvoldan çox ola bilməz!";
		}
        include 'tutorial_default.php';
	}
	else
	{
		include 'tutorial_default.php';
	}
}
else
{
	include 'tutorial_default.php';
}
?>