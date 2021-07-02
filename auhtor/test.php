<?session_start();
?>

<?php
	include '../db.php';
	$login=$_POST['login'];
	$pass=$_POST['pass'];
	
	$str_auth="SELECT * FROM `players_and_masters` WHERE `login` = '$login' AND `pass`= '$pass'";
	$run_auth=mysqli_query($connect,$str_auth);
	$check_users=mysqli_num_rows($run_auth);
	
		if ($check_users) 
		{
			$user= mysqli_fetch_assoc($run_auth);
			if ($user['role']==1) 
			{
				$_SESSION['user']=[
					"name" =>$user['name'],
					"login" =>$user['login'],
					"role" =>$user['role']
				];
				echo '<script>location.replace("../content/myOffice_admin.php");</script>'; exit;
			}else
			{
				$_SESSION['user']=[
					"name" =>$user['name'],
					"login" =>$user['login'],
					"role" =>$user['role']
				];
				echo '<script>location.replace("../content/myOffice.php");</script>'; exit;
			}
						
		}else
		{
			echo '<script>location.replace("../auhtor/sigin.php");</script>'; exit;
			unset($_SESSION);
		}

		

?>