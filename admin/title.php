<?php  
if(isset($_POST["title"]))
{
	$title_input=htmlspecialchars(trim($_POST["title_input"]));
	if(!empty($title_input))
	{
		if(mb_strlen($title_input)<20)
		{
			$save=$conn->prepare("INSERT INTO title(title) VALUES (?)");
			$save->execute([$title_input]);
			?>
			<script type="text/javascript">
				alert("Title uğurla əlavə edildi");
			</script>
			<?php
			echo '<meta http-equiv="refresh" content="0;url=index.php?page=title">';
		}
		else
		{
			$errorTitle="Title 20 simvoldan çox ola bilməz!";
			include 'title_default.php';
		}
	}
	else
	{
		include 'title_default.php';
	}
}
else
{
	include 'title_default.php';
}
?>