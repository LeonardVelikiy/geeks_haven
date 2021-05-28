<?php
session_start();
?>
<html>
<head>
	<title>Новсти по Днд</title>
	<meta charset="utf-8">
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<div class="bodyOffice">
			<div class="head">Geek's Haven</div>
			
				<div class="height_menu">
					<div class="update_news"><a href="../index.php">новости</a></div>
					<div class="ads"><a href="ads.php">объявления игр</a></div>
					<div class="my_office"><a href="myOffice_admin.php">мой кабинет</a></div>
					<div class="mechanics"><a href="mechanics.php">механики</a></div>
					<div class="world"><a href="world.php">о мире</a></div>
					<div class="we"><a href="we.php">о нас</a></div>
				</div>
				<div class="contentOffice_admin">	
					<div class="menu">
					<form>	
						<a href="?news=exists_news">Новости</a>
						<a href="?order=exists_order">Заказы</a>
						<a href="?players=exists_players">Игроки</a>
						<a href="?ads=exists_ads">Объявления</a>
						<a href="?stuff=stuff">Предметы</a>
						<a href="?heros=heros">Персонажи</a>
						<a href="?application=application">заявки на персов</a>
						<a href="?exit=admin">Выйти</a>
					</form>
					</div>
					<div class="infor">
						<?php
					include '../db.php';
					if ($_GET['exit']) 
						{
							unset($_SESSION['user']);
							echo '<script>location.replace("../index.php");</script>'; exit;
						}	
					if ($_GET['news'] or $_GET['news_edit']) 
						{
						echo "<div class=part1>";
						echo "
						<form method=POST>
							<span>Public News</span>
							<input type=text name=author placeholder=автор>
							<input type=text name=topic placeholder=Тема>
							<input type=date name=date placeholder=дата публикации>
							<textarea name=text></textarea>
							<div class=fon>
							<input type=submit name=public value=публикация class=knopca>
							</div>";

							$author=$_POST['author'];
							$topic=$_POST['topic'];
							$date=$_POST['date'];
							$text_news=$_POST['text'];
							$public=$_POST['public'];
							$exit=$_POST['exit'];
					if ($public) 
					{
						$str_add_test="INSERT INTO `news` (`topic`, `author`, `text`, `date`) 
						VALUES ('$topic', '$author', '$text_news', '$date');";

						$run_test=mysqli_query($connect,$str_add_test);

						if ($run_test) 
							{
								echo"успешно опубликованно";
							}else
								{
									echo"ошибка";
								}
					
					}
					echo "</div>";
					echo "<div class=part2>";
					
					if ($_GET['news']) 
					{
						$news=$_GET['news'];
						$str_del_user="DELETE FROM `news` WHERE id = $news";
						$run_del_user=mysqli_query($connect,$str_del_user);

						$str_out_news="SELECT * FROM `news`";
						$run_out_news=mysqli_query($connect,$str_out_news);
						
						echo "<table border=1 cellspacing=0 class=table-dark>
						<tr>
							<th>Автор
							<th>Тема
							<th>дата
							<th colspan=2>Действия
						</tr>";

								while ($out=mysqli_fetch_array($run_out_news)) 
								{
										$id++;
										echo"
									<tr>	
										<td>$out[author]
										<td>$out[topic]
										<td>$out[date]
										<td><a href=?news=$out[id]>Удалить</a>
										<td><a href=?news_edit=$out[id]>Изменить</a>
									</tr>";
								}
						echo "</table>";
							}elseif ($_GET['news_edit']) 
								{
										$news_edit=$_GET['news_edit'];
										if ($_POST['public1']) 
										{
										$str_edit_news="UPDATE `news` SET `author` = '$_POST[author]',`topic`='$_POST[topic]',`text` = '$_POST[text]',`date` = '$_POST[date]'  WHERE `news`.`id` = $news_edit;";
										$run_edit_news=mysqli_query($connect,$str_edit_news);
										}
										$str_out_news="SELECT * FROM `news` WHERE `news`.`id` = $news_edit";
										$run_out_news=mysqli_query($connect,$str_out_news);
										$out=mysqli_fetch_array($run_out_news);
										echo "
										<form method=POST>
										<span>Изменения Новостей</span>
										<input type=text name=author placeholder=автор value=$out[author] >
										<input type=text name=topic placeholder=Имя value= $out[topic]>
										<input type=date name=date placeholder=Пароль value=$out[date]>
										<textarea type=text name=text class='text_edit' placeholder=text>$out[text]</textarea>
										<input type=submit name=public1 value=Изменить class=knopca >
										<a href=?news=edit_complite >Убрать меню измений</a>
										</form>";

								}
								echo "</div>";	
					}
						
					if ($_GET['players'] or $_GET['players_edit']) 
					{	
						echo "<div class=part1>";
						echo "
							<form method=POST>
							<span>Добавление пользователей</span>
							<input type=text name=login placeholder=логин>
							<input type=password name=pass placeholder=пароль>
							<input type=text name=name placeholder=имя>
							<input type=text name=fam placeholder=фамилия>
							<input type=radio name=gender value=f>F
							<input type=radio name=gender value=m>M
							<input type=mail name=mail placeholder=почта>
							<div class=fon>
							<input type=submit name=reg class=knopca> 
							</div>
							</form>";
							$login=$_POST['login'];
							$pass=$_POST['pass'];
							$name=$_POST['name'];
							$fam=$_POST['fam'];
							$gender=$_POST['gender'];
							$mail=$_POST['mail'];
							$reg=$_POST['reg'];
								if ($reg) 
								{
									$str_reg_users="INSERT INTO `players_and_masters` (`login`, `pass`, `fam`, `name`, `gender`,`mail`) 
									VALUES ('$login', '$pass', '$fam', '$name', '$gender', '$mail');";
									$run_reg_users=mysqli_query($connect, $str_reg_users);
								}
					echo "</div>";
					echo "<div class=part2>";
					if ($_GET['players']) 
					{
							$players=$_GET['players'];
							$str_del_user="DELETE FROM `players_and_masters` WHERE id = $players ";
							$run_del_user=mysqli_query($connect,$str_del_user);

							$str_out_players="SELECT * FROM `players_and_masters`";
							$run_out_players=mysqli_query($connect,$str_out_players);
						 	echo "<table border=1 cellspacing=0 class=table-dark>
								<tr>
									<th>логин
									<th>пароль
									<th colspan=2>Действия
								</tr>
							";
								while ($out=mysqli_fetch_array($run_out_players)) 
								{
									$id++;
									echo"
								<tr>	
									<td>$out[login]
									<td>$out[pass]
									<td><a href=?players=$out[id]>Удалить</a>
									<td><a href=?players_edit=$out[id]>изменить</a>
								</tr>";
								}
								echo "</table>";
						}elseif ($_GET['players_edit']) 
							{
								$players_edit=$_GET['players_edit'];
								if ($_POST['edit']) 
								{
									$str_edit_news="UPDATE `players_and_masters` SET `login` = '$_POST[login]',`pass`='$_POST[pass]',`name` = '$_POST[name]',`fam` = '$_POST[fam]',`mail` = '$_POST[mail]', `gender` = '$_POST[gender]'  WHERE `players_and_masters`.`id` = $players_edit;";
									$run_edit_news=mysqli_query($connect,$str_edit_news);
								}
									$str_out_players="SELECT * FROM `players_and_masters` WHERE `players_and_masters`.`id` = $players_edit";
									$run_out_players=mysqli_query($connect,$str_out_players);
									$out=mysqli_fetch_array($run_out_players);
									echo "<form method=POST>
											<span>Изменения пользователей</span>
											<input type=text name=login placeholder=логин value=$out[login]>
											<input type=password name=pass placeholder=пароль value=$out[pass]> 
											<input type=text name=name placeholder=имя value=$out[name]>
											<input type=text name=fam placeholder=фамилия value=$out[fam]>
											<input type=mail name=mail placeholder=почта value=$out[mail]>
											<input type=radio name=gender value=m>М
											<input type=radio name=gender value=f>Ж
											<div class=fon>
											<input type=submit name=edit value=изменит class=knopca>
											</div>
											<a href=?players=edit_complite >Убрать меню измений</a>
										</form>";
											}
									echo "</div>";
									}
					if (!$_GET or $_GET['order']) 
					{
						$order=$_GET['order'];
						$str_del_user="DELETE FROM `order_game` WHERE id = $order";
						$run_del_user=mysqli_query($connect,$str_del_user);

						$str_out_order="SELECT * FROM `order_game`";
						$run_out_order=mysqli_query($connect,$str_out_order);

						echo "<table border=1 cellspacing=0 class=table-dark>
								<tr>
									<th>логин
									<th>часы
									<th>дата
									<th>место
									<th>кол-во людей
									<th>телефон заказчика
									<th >Действия
								</tr>
							";
								while ($out=mysqli_fetch_array($run_out_order)) 
								{
									$id++;
									echo"
								<tr>	
									<td>$out[login]
									<td>$out[time]
									<td>$out[date]
									<td>$out[place]
									<td>$out[person]
									<td>$out[tell]
									<td><a href=?order=$out[id]>Выполненить</a>
								
								</tr>";
								}echo "</table>";
					}
					if ($_GET['ads']) 
					{
						$str_out_ads="SELECT * FROM `ads`";
						$run_out_ads=mysqli_query($connect,$str_out_ads);

						echo "<table border=1 cellspacing=0 class=table-dark>
								<tr>
									<th>Герои
									<th>Кампания
									<th>Место
									<th>Кто играет
									<th>Действия
								</tr>
							";
								while ($out=mysqli_fetch_array($run_out_ads)) 
								{
									$id++;
									echo"
								<tr>	
									<td>$out[heros]
									<td>$out[campani]
									<td>$out[place]
									<td>$out[who]
									<td><a href=?ads_edit=$out[id]>Изменить</a>
								
								</tr>";
								}echo "</table>";
					}
					if ($_GET['ads_edit']) 
					{
						$ads_edit=$_GET['ads_edit'];
						if ($_POST['edit']) 
						{
							$str_edit_ads="UPDATE `ads` SET `heros`= '$_POST[heros]', `campani` = '$_POST[campani]', `place` = '$_POST[place]', `who` = '$_POST[who]' WHERE `id` = $ads_edit;";
							
							// var_dump($str_edit_ads);

							$run_edit_ads=mysqli_query($connect,$str_edit_ads);
							
						}
							$str_out_ads="SELECT * FROM `ads` WHERE `ads`.`id` = $ads_edit";
							$run_out_ads=mysqli_query($connect,$str_out_ads);
							$out=mysqli_fetch_array($run_out_ads);
							echo "<div class=part3>";
							echo "<form method=POST>
									<span>Изменения пользователей</span>
									<input type=text name='heros' placeholder='герои' value='$out[heros]'>
									<input type=text name='campani' placeholder='компания' value='$out[campani]'> 
									<input type=text name='place' placeholder='место' value='$out[place]'>
									<input type=text name='who' placeholder='у кого' value='$out[who]'>
									<div class=fon>
									<input type=submit name='edit' value='Изменить' class=knopca>
									</div>
									<a href=?ads=edit_complite >Убрать меню измений</a>
								</form>";
							echo "</div>";								
					}
					if ($_GET['stuff']) 
					{
						$stuff=$_GET['stuff'];
						$str_del_stuff="DELETE FROM `stuff` WHERE id_stuff = $stuff";
						$run_del_stuff=mysqli_query($connect,$str_del_stuff);

						$str_out_stuff="SELECT * FROM `stuff`";
						$run_out_stuff=mysqli_query($connect,$str_out_stuff);

						echo "<table border=1 cellspacing=0 class=table-dark>
									<tr>
										<th>название предмета
										<th>цена
										<th>редкость
										<th colspan=2>Действия
									</tr>
								";
									while ($out=mysqli_fetch_array($run_out_stuff)) 
									{
										$id++;
										echo"
									<tr>	
										<td>$out[name_stuff]
										<td>$out[price]
										<td>$out[rarity]
										<td><a href=?stuff=$out[id_stuff]>удалить</a>
										<td><a href=?stuff_moreinfor=$out[id_stuff]>подробнее</a>
									</tr>";
									}echo "</table>";
						}
					if ($_GET['stuff_moreinfor'])
					{
						$stuff_moreinfor=$_GET['stuff_moreinfor'];
						$str_infor_stuff="SELECT * FROM `stuff` WHERE id_stuff=$stuff_moreinfor";
						$run_infor_stuff=mysqli_query($connect,$str_infor_stuff);
						$out=mysqli_fetch_array($run_infor_stuff);
						echo"
							<div  style=background:url(../image/$out[sprite]);background-size:250px300px;background-position:center;background-repeat:no-repeat; class=desc_stuff1></div>
							<div class=desc_stuff2>
								<div class=name_stuff>Название:$out[name_stuff]</div>
								<div class=price_stuff>Цена: $out[price]</div>
								<div class=rarity_stuff>Редкость: $out[rarity]</div>
								<div class=specifications_stuff>Характ.: $out[specifications]</div>
								<div class=desk>Описание:$out[description]</div>
							</div>";

					}
					if ($_GET['heros'])
					{
						$heros=$_GET['heros'];
						$str_del_heros="DELETE FROM `heros` WHERE id_heros = $heros";

						$run_del_heros=mysqli_query($connect,$str_del_heros);

						$str_out_heros="SELECT * FROM `heros` JOIN players_and_masters ON owner_id=players_and_masters.id";
						$run_out_heros=mysqli_query($connect,$str_out_heros);

						echo "<table border=1 cellspacing=0 class=table-dark>
									<tr>
										<th>Перс
										<th>уровень
										<th>класс
										<th>состояние
										<th>расположен
										<th>владелец
										<th colspan=2>дейсвия
									</tr>
								";
									while ($out=mysqli_fetch_array($run_out_heros)) 
									{
										$id++;
										echo"
									<tr>	
										<td>$out[name_hero]
										<td>$out[lvl]
										<td>$out[class_hero]
										<td>$out[hp]-hp
										<td>-///-
										<td>$out[login]
										<td><a href=?heros=$out[id_heros]>удалить</a>
										<td><a href=?heros_moreinfor=$out[id]>подробнее</a>
									</tr>";
									}echo "</table>";
						}
					if ($_GET['application']or$_GET['hero_aprove']) 
					{
						// выборка по id героя из заявок, и добавление его в таблицу с полноценными героями
						$id_hero_aprove=$_GET['hero_aprove'];
						
						$str_aprove_hero="SELECT * FROM `character_applications` WHERE id_aplication = $id_hero_aprove";
						$run_aprove=mysqli_query($connect,$str_aprove_hero);

						$out_aprove=mysqli_fetch_array($run_aprove);
						// добавление героя
						$str_heros_aprove="INSERT INTO `heros` (`name_hero`, `class_hero`, `magic`, `skill`, `gold_count`, `class_armor`, `hp`, `lvl`, `strong`, `dexterity`, `endurance`, `intelligence`, `wisdom`, `charisma`, `owner_id`) 
										VALUES ('$out_aprove[name_hero]', '$out_aprove[class_hero]', '$out_aprovemagic]', '$out_aprove[skill]', '$out_aprove[gold_count]', '$out_aprove[class_armor]', '$out_aprove[hp]', '$out_aprove[lvl]', '$out_aprove[strong]', '$out_aprove[dexterity]', '$out_aprove[endurance]', '$out_aprove[intelligence]', '$out_aprove[wisdom]', '$out_aprove[charisma]', '$out_aprove[owner_id]');";
						$run_heros_aprove=mysqli_query($connect,$str_heros_aprove);
						
						//удаление из заявок  
						$heros_applications_del=$_GET['application'];
						
						$str_del_heros_applications="DELETE FROM `character_applications` WHERE id_aplication = $heros_applications_del";
						$run_del_heros_applications=mysqli_query($connect,$str_del_heros_applications);
						//выводв таблицу заявок на админке
						$str_out_heros_applications="SELECT * FROM `character_applications` JOIN players_and_masters ON owner_id=players_and_masters.id";
						$run_out_heros_applications=mysqli_query($connect,$str_out_heros_applications);

						echo "<table border=1 cellspacing=0 class=table-dark>
									<tr>
										<th>Перс
										<th>уровень
										<th>класс
										<th>состояние
										<th>расположен
										<th>владелец
										<th colspan=3 style=text-align:center;>дейсвия
									</tr>
								";
									while ($out=mysqli_fetch_array($run_out_heros_applications)) 
									{
										$id++;
										echo"
									<tr>	
										<td>$out[name_hero]
										<td style=text-align:center;>$out[lvl]
										<td>$out[class_hero]
										<td>$out[hp]-hp
										<td>-///-
										<td>$out[login]
										<td><a href=?application=$out[id_aplication]>удалить</a>
										<td><a href=?heros_moreinfor=$out[id_aplication]>подробнее</a>
										<td><a href=?hero_aprove=$out[id_aplication]>одобрить</a>
									</tr>";
									}echo "</table>";

									
									
	
						}	
						echo "</div>";	
				?>
	</div>
	<div class="futer"></div>
	</div>
	
</div>

	<!-- icogus tum tum tum.. -->
</div>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>