<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Новости Днд</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png"> 
	<meta name="msapplication-TileColor" content="#ffffff">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

		<div class="body">
			<div class="head">Geek's Haven</div>
	

			<div class="content">
				<div class="height_menu">
					<div class="update_news"><a href="index.php">НОВОСТИ</a></div>
					<div class="ads"><a href="content/ads.php">объявления игр</a></div>
					<div class="my_office"><a href="../auhtor/sigin.php">мой кабинет</a></div>
					<div class="mechanics"><a href="content/mechanics.php">механики</a></div>
					<div class="world"><a href="content/world.php">о мире</a></div>
					<div class="we"><a href="content/we.php">о нас</a></div>
				</div>
				<div class="gameorder">Здравствуйте, <?=$_SESSION['user']['name']?> добро пожаловать на Geek's Haven</div>

				<?php
					include 'db.php';
					/*тут мы выбираем и выводим из базы контент и сортируем по id (ORDER BY id DESC)-это с последнего введёного элемента */
					$str_out_news="SELECT * FROM `news` ORDER BY id DESC";
					/*тут мы делаем массив $run_out_news из данных контента $str_out_news*/
					$run_out_news=mysqli_query($connect,$str_out_news);


					/* часть пагинации */

					$int_out_news=mysqli_num_rows($run_out_news);/*общее кол во новостей*/
					$page_number=$_GET['page_number'];
					if ($page_number == NULL)/*тут у нас если нет номера страницы то мы его задаём*/
					{
						$page_number=0;
					}
					$news_in_tape=7;
					$sql_page_number=$page_number*$news_in_tape;/*тут переменая отвечает за то с какой строки мы будем выводить из базы данных */
					$str_out_news_pag="SELECT * FROM `news` ORDER BY `news`.`id`  DESC LIMIT $sql_page_number, $news_in_tape";/*вывод новостей с пагинацией*/
					$run_out_news_pag=mysqli_query($connect, $str_out_news_pag);

					/* часть пагинации */


						/*это мы проходим циклом и выводим объкты*/
						while ($out=mysqli_fetch_array($run_out_news_pag)) 
							{
							/*$id++;*/
								echo"<div class=new><div class=what>Что нового?$out[date]</div><div class=news_text><font size=5>$out[topic]</font><p>$out[text]</p></div></div>";/*это мы выводим объект с контентом*/
							}/*проблемма с текстом решена*/
				?>
			</div>
			<div class="futer">
				<?php
					/* пагинация */
					$float_count=$int_out_news%7;
					$int_count=floor($int_out_news/7);
					$p=1;
					if ($float_count>0) 
					{
						$int_count++;
					}
					for ($i=0; $i <$int_count ; $i++) { 
						echo"<a href=/?page_number=$i style=font-size:25px;>  	$p</a>";
						$p++;
					}
					/*пагинация*/
				?>
			</div>
		</div>
</body>
</html>