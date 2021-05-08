<?php session_start();

$exit=$_POST['exit'];
	if ($exit) 
		{
			session_unset();
			header('Location: ../../index.php');
		}
?>
