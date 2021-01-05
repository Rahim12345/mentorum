<?php  
if(isset($_POST["interview"]))
{
	$interview_input=htmlspecialchars(trim($_POST["interview_input"]));
	if(!empty($interview_input))
	{
		if(strlen($interview_input)<249)
		{
            $link_id=explode("=",$interview_input);
			if(count($link_id)==2)
			{
				$link="https://www.youtube.com/embed/".$link_id[1];
				$save=$conn->prepare("INSERT INTO interview(link,created_at,updated_at) VALUES (?,?,?)");
				$save->execute([$link,date("d/m/Y H:i:s"),date("d/m/Y H:i:s")]);
				?>
				<script type="text/javascript">
					alert("Müsahibələr üçün youtube video linki uğurla əlavə olundu uğurla əlavə edildi");
				</script>
				<?php
				echo '<meta http-equiv="refresh" content="0;url=index.php?page=interview">';
			}
			else
			{
				$error_interview="Düzgün bir youtube linki daxil edin";
			}
		}
		else
		{
			$error_interview="Link 249 simvoldan çox ola bilməz!";
		}
        include 'interview_default.php';
	}
	else
	{
		include 'interview_default.php';
	}
}
else
{
	include 'interview_default.php';
}
?>