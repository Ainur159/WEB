<?php
	session_start();
	
	if($_SESSION['user']) 
	{
		session_destroy();
		header("Location: http://second/index.php", false, 301);
		exit();
	}
?>