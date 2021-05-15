<?php
session_start();
?>
<html>
<head>
	<title>Новсти по Днд</title>
	<meta charset="utf-8">
	
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
					}				echo "</div>";

				?>
	</div>
	<div class="futer"></div>
	</div>
	
</div>

	
</div>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>