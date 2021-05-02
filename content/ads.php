<?php
session_start();


include '../db.php';
$str_out_ads="SELECT * FROM `ads`";
$run_out_ads=mysqli_query($connect,$str_out_ads);
$out=mysqli_fetch_array($run_out_ads);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Новсти по Днд</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta charset="utf-8">
</head>
<body>
		<div class="bodyads">
			<div class="head">Geek's Haven</div>
						<!-- или Глашатай крафтового издания Днд еще не решил -->

			<div class="contentads">
				<div class="height_menu">
					<div class="update_news"><a href="../index.php">новости</a></div>
					<div class="ads"><a href="ads.php">ОБЪЯВЛЕНИЕ ИГР</a></div>
					<div class="my_office"><a href="../auhtor/sigin.php">Кабинет Мастера</a></div>
					<div class="mechanics"><a href="mechanics.php">механики</a></div>
					<div class="world"><a href="world.php">о мире</a></div>
					<div class="we"><a href="we.php">о нас</a></div>
				</div>
				<div class="gameorder">Здравствуйте <?=$_SESSION['user']['name']?> не хотите ли заказать игру вне расписания?<a href="../auhtor/order.php">Заказать</a></div>
				<h1 class="ads_text">ИГРА С СЕЛЬСКИМИ</h1>
				<div class=" description_ads">
					Описание:Падение Сигансины глава три.<br>
					Где(у кого):У Мастера Паши.<br>
					Герои:Тихий чёрт<br>
				</div>
					<div class="time_ads_game"><script src="//megatimer.ru/get/5f49b7e980738dd3d44c6c5ab1acdc40.js"></script></div>
				<h1 class="ads_text">ИГРА С ПРОГРАММИСТАМИ</h1>
				<div class=" description_ads">
					Описание:<?=$out['campani']?>.<br>
					Где(у кого):<?=$out['place']?>.<br>
					Герои:<?=$out['heros']?><br>
				</div>	
					<div class="time_ads_game"><script src="//megatimer.ru/get/5f49b7e980738dd3d44c6c5ab1acdc40.js"></script></div>
				<h1 class="ads_text">ИГРА С ДИЗАЙНЕРАМИ</h1>
				<div class=" description_ads">
					Описание:-.<br>
					Где(у кого):-.<br>
					Герои:-.<br>
				</div>	
					<div class="time_ads_game"><script src="//megatimer.ru/get/5f49b7e980738dd3d44c6c5ab1acdc40.js"></script></div>
					
			</div>
			<div class="futer">
			</div>
		</div>

</body>
</html>