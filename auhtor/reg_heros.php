<?php
session_start();
include '../db.php';

$login=$_SESSION['user']['login'];

$str_auth="SELECT * FROM `players_and_masters` WHERE `login` = '$login'";

$run_auth=mysqli_query($connect,$str_auth);

$out=mysqli_fetch_assoc($run_auth);

?>
<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="../style.css">
<html>
	<head>
		<title>регистрация Персонажа </title>
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
<div class="regist_heros">
<form method="POST" >
	<span>Мой персонаж</span>
	<input type="text" name="name_hero" placeholder='Имя героя'>
	<input type="text" name="class_hero" placeholder='класс'>
	<input type="text" name="lvl" placeholder='уровень'>
	<input type="text" name="strong" placeholder='сила'>
	<input type="text" name="dexterity" placeholder='ловкость'>
	<input type="text" name="endurance" placeholder='живучесть'>
	<input type="text" name="intelligence" placeholder='интелект'>
	<input type="text" name="wisdom" placeholder='мудрость'>
	<input type="text" name="charisma" placeholder='харизма'>
	<input type="submit" name="reg">
	<form action="index.php">
	<a href="../index.php">на главную</a>
	</form>
	</form>
</div>
	<?php
	

	$name_hero=$_POST['name_hero'];
	$class_hero=$_POST['class_hero'];
	$lvl=$_POST['lvl'];
	$strong=$_POST['strong'];
	$dexterity=$_POST['dexterity'];
	$endurance=$_POST['endurance'];
	$intelligence=$_POST['intelligence'];
	$wisdom=$_POST['wisdom'];
	$charisma=$_POST['charisma'];
	$gold=0;
	$class_armor=10;
	$hp=5;
	$magic='none';
	$skill='none';
	$reg=$_POST['reg'];
	$owner_id=$out['id'];

	if ($reg) {
		$str_players="INSERT INTO `character_applications` (`name_hero`, `class_hero`, `magic`, `skill`, `gold_count`, `class_armor`, `hp`, `lvl`, `strong`, `dexterity`, `endurance`, `intelligence`, `wisdom`, `charisma`, `owner_id`) 
					VALUES ('$name_hero', '$class_hero', '$magic', '$skill', '$gold', '$class_armor', '$hp', '$lvl', '$strong', '$dexterity', '$endurance', '$intelligence', '$wisdom', '$charisma', '$owner_id');";

		$run_add_players=mysqli_query($connect,$str_players);
		$user= mysqli_fetch_assoc($run_add_players);
		
		if ($run_add_players) 
		{
			echo '<script>location.replace("../index.php");</script>'; exit;
			}
			else 
				{
				echo"ошибка";
			 	}
		}

	?>