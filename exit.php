<?php

if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='exit')

{

	session_destroy();

	header("location:../");

	ob_flush();

	die();

}

else

{

	header("location:./");

}

?>