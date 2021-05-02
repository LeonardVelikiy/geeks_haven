<pre>
<form method="POST">
	<link rel="stylesheet" type="text/css" href="style_test.css">
		<span>Регистрация</span>
		<input type="text" name="author" placeholder="автор">
		<input type="text" name="topic" placeholder="Тема">
		<input type="text" name="date" placeholder="дата публикации">
		<textarea name="text"></textarea>
		<input type="submit" name="public" value="публикация">
		<?php
		$connect=mysqli_connect("localhost","root","root","geeks_haven");

		$author=$_POST['author'];
		$topic=$_POST['topic'];
		$date=$_POST['date'];
		$text_news=$_POST['text'];
		$public=$_POST['public'];
		print_r($_POST);
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
			print_r($str_add_test);
		}

		$str_out_news="SELECT * FROM `news`";
		$run_out_news=mysqli_query($connect,$str_out_news);

		while ($out=mysqli_fetch_array($run_out_news)) 
		{
			$id++;
			/*echo "<div class=new >
			
			</div>";*/
			echo"<div class=new><div class=what>Что нового?$out[date]</div><div class=news_text>$out[topic]<p>$out[text]</p></div>
				</div>";
				/*ахаххахвхавхахвахвхахвх сосать СОСАТЬ я решил проблему ахахахахахахаххахахаахахахаххахаха */
		}/*проблемма с текстом решена*/
		 /*!!главная проблема!! когда ты в php вставил HTML  пробелы которые стоят в коде они считаются как за строчные элементы!!!!*/
		?>
</form></pre>