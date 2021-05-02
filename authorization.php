
<link rel="stylesheet" type="text/css" href="style.css">
<form method="POST">
	<div class="wellCUM">
		<input type="text" name="login" placeholder="login">
		<input type="text" name="pass" placeholder="password">
		<input type="submit" name="enter" value="enter">
	</div>
</form>
<?php
	include 'db.php';
	$login=$_POST['login'];
	$pass=$_POST['pass'];
	$enter=$_POST['enter'];

	if ($enter)
	{
		$str_auth="SELECT * FROM `players_and_masters` WHERE `login` = '$login' AND `pass`= '$pass'";
		$run_auth=mysqli_query($connect,$str_auth);
		$check_users=mysqli_num_rows($run_auth);
		if ($check_users) 
		{
			echo "добро пожаловать";
		}

		else
		{
			echo "кто ты?";
		}

	}
	}
	
?>