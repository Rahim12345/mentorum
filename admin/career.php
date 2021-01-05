<?php  
if(isset($_POST["career"]))
{
	$career_input=htmlspecialchars(trim($_POST["career_input"]));
	if(!empty($career_input))
	{
		if(strlen($career_input)<249)
		{
			$link_id=explode("=",$career_input);
			if(count($link_id)==2)
			{
				$link="https://www.youtube.com/embed/".$link_id[1];
				$save=$conn->prepare("INSERT INTO career(link,created_at,updated_at) VALUES (?,?,?)");
				$save->execute([$link,date("d/m/Y H:i:s"),date("d/m/Y H:i:s")]);
				?>
				<script type="text/javascript">
					alert("Xaricdə Mən üçün youtube video linki uğurla əlavə edildi");
				</script>
				<?php
				echo '<meta http-equiv="refresh" content="0;url=index.php?page=career">';
			}
			else
			{
				$error_career="Düzgün bir youtube linki daxil edin";
			}
		}
		else
		{
			$error_career="Link 249 simvoldan çox ola bilməz!";
		}
		include 'career_default.php';
	}
	else
	{
		include 'career_default.php';
	}
}
else
{
	include 'career_default.php';
}
?>