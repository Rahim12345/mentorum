<?php  
if(isset($_SESSION["id"]) && isset($_GET['page']) && isset($_GET['id']))
{
	$page 	= htmlspecialchars(trim($_GET['page']));
	$id 	= htmlspecialchars(trim($_GET["id"]));
	if($page=='remove_tag')
	{
		if(is_numeric($id) && ceil($id)-$id==0 && $id>0)
		{
			$query 	= $conn->prepare("SELECT * FROM `tags` WHERE `id`=?");
			$query->execute([$id]);
			$rows   = $query->fetchall(PDO::FETCH_ASSOC);
			$count 	= count($rows);
			if($count!=0)
			{
				$remove=$conn->prepare("DELETE FROM `tags` WHERE id=?");
				$remove->execute([$id]);
				header("location:index.php?page=tags");
			}
		}
		else
		{
			include '404.php';
		}
	}
	else
	{
		header("location:../");
	}

}
else
{
	header("location:../");
}
?>