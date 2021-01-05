<?php  
if(isset($_POST["keywords"]))
{
	$keywords_input=htmlspecialchars(trim($_POST["keywords_input"]));
	if(!empty($keywords_input))
	{
		if(strlen($keywords_input)<490)
		{
			$save=$conn->prepare("INSERT INTO keywords(keywords) VALUES (?)");
			$save->execute([$keywords_input]);
			?>
			<script type="text/javascript">
				alert("Keywords uğurla əlavə edildi");
			</script>
			<?php
			echo '<meta http-equiv="refresh" content="0;url=index.php?page=keywords">';
		}
		else
		{
			$error_keywords="Keywords 490 simvoldan çox ola bilməz!";
			include 'keywords_default.php';
		}
	}
	else
	{
		include 'keywords_default.php';
	}
}
else
{
	include 'keywords_default.php';
}
?>