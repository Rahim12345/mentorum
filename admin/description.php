<?php  
if(isset($_POST["description"]))
{
	$description_input=htmlspecialchars(trim($_POST["description_input"]));
	if(!empty($description_input))
	{
		if(strlen($description_input)<490)
		{
			$save=$conn->prepare("INSERT INTO descriptions(description) VALUES (?)");
			$save->execute([$description_input]);
			?>
			<script type="text/javascript">
				alert("Description uğurla əlavə edildi");
			</script>
			<?php
			echo '<meta http-equiv="refresh" content="0;url=index.php?page=description">';
		}
		else
		{
			$error_description="Description 490 simvoldan çox ola bilməz!";
			include 'description_default.php';
		}
	}
	else
	{
		include 'description_default.php';
	}
}
else
{
	include 'description_default.php';
}
?>