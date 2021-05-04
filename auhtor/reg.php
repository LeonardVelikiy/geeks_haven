<?php
session_start();
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../style.css">
<html>
	<head>
		<title>регистрация на Geek's Haven</title>
		
	</head>
	<body>

	</body>
</html>
<div class="header">Geek's Haven</div>
<div class="regist">
<form method="POST" ><!-- action="index.php" -->
	
	<span>Моя учётная Запись</span>
	<input type="text" name="login" placeholder="логин">
	<input type="password" name="pass" placeholder="пароль">
	<input type="text" name="name" placeholder="имя">
	<input type="text" name="fam" placeholder="фамилия">
	<input type="text" name="mail_cum" placeholder="Ел.почта">
	<input type="radio" name="gender" value="f" >Ж
	<input type="radio" name="gender" value="m">М
	<input type="submit" name="reg" value="регистрация">
	<form action="index.php">
	<a href="../index.php">на главную</a>
	</form>
	</form>
</div>
	<?php
	include '../db.php';


	$login=$_POST['login'];
	$pass=$_POST['pass'];
	$name=$_POST['name'];
	$fam=$_POST['fam'];
	$gender=$_POST['gender'];
	$reg=$_POST['reg'];
	$mail_cum=$_POST['mail_cum'];
	if ($reg) {
		$str_players="INSERT INTO `players_and_masters` (`login`, `pass`, `fam`, `name`, `gender`,  `mail`) 
			VALUES ('$login', '$pass', '$fam', '$name', '$gender','$mail_cum');";

		$run_add_players=mysqli_query($connect,$str_players);
		
		print_r($str_players);
		if ($run_add_players) 
		{
			$_SESSION['user']=[
				"name" =>$user['name'],
				"login" =>$user['login']
			];
			echo '<script>location.replace("../index.php");</script>'; exit;
			}
			else 
				{
				echo"ошибка";
			 	}
		}

	?>