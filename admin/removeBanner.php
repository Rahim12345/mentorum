<?php  
if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='removeBanner' && !empty($_GET['page']) && is_numeric($_GET["id"]) && ceil($_GET["id"])-$_GET["id"]==0 && $_GET["id"]>0)
{
	$page=htmlspecialchars(trim($_GET['page']));
	$id=htmlspecialchars(trim($_GET["id"]));
	$query4BannerRemove=$conn->prepare("SELECT * FROM banner WHERE id=?");
	$query4BannerRemove->execute([$id]);
	$rows4BannerRemove=$query4BannerRemove->fetchall(PDO::FETCH_ASSOC);
	$count4BannerRemove=count($rows4BannerRemove);
	if($count4BannerRemove!=0)
	{
		$remove=$conn->prepare("DELETE FROM `banner` WHERE id=?");
		$remove->execute([$id]);
		header("location:./index.php?page=existBanner");
	}
	else
	{
		include '404.php';
	}
}
else
{
	include '404.php';
}
?>