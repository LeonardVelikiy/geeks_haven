<?session_start();
?>

<?php
	include '../db.php';
	$login=$_POST['login'];
	$pass=$_POST['pass'];
	
	$str_auth="SELECT * FROM `players_and_masters` WHERE `login` = '$login' AND `pass`= '$pass'";
	$run_auth=mysqli_query($connect,$str_auth);
	$check_users=mysqli_num_rows($run_auth);
	/*$players=mysqli_fetch_array($run_auth);*/
	$check_users=mysqli_num_rows($run_auth);
		if ($check_users) 
		{
			$user= mysqli_fetch_assoc($run_auth);
			if ($user['role']==1) {
				echo '<script>location.replace("../content/myOffice.php");</script>'; exit;
				$_SESSION['user']=[
					"name" =>$user['name'],
					"login" =>$user['login']
				];
			}else
			{
				$_SESSION['user']=[
					"name" =>$user['name'],
					"login" =>$user['login']
				];
				echo '<script>location.replace("../index.php");</script>'; exit;
			}
						
		}else
		{
			echo '<script>location.replace("../auhtor/sigin.php");</script>'; exit;
			unset($_SESSION);
		}

		

?>