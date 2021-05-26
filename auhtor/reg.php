<?php
session_start();
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../style.css">
<html>
	<head>
		<title>регистрация на Geek's Haven</title>
		<!-- иконка -->
		<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
		<link rel="manifest" href="../favicon/site.webmanifest">
		<link rel="mask-icon" href="../favicon/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">
		<meta name="msapplication-TileColor" content="#ffffff">
		<!-- иконка -->
	</head>
	<body>

	</body>
</html>
<div class="header">Geek's Haven</div>
<div class="regist">
<form method="POST" >
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
			$user=mysqli_fetch_assoc($run_add_players);
			$_SESSION['user']=[
                "name" =>$user['name'],
                "login" =>$user['login'],
                "role" =>$user['role']
            ];
			print_r($user);
			// echo '<script>location.replace("../index.php");</script>'; exit;
			}
			else 
				{
				echo"ошибка";
			 	}
		}

	?>