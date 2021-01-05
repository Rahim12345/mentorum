<?php 
if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='exit')
{
	session_destroy();
	header("location:../");
	die();
}
else
{
	header("location:../");
}
?>