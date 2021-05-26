<?php
session_start();
?>
<!DOCTYPE html>
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
<link rel="stylesheet" type="text/css" href="../style.css">
<html>
	<head>
		<title>регистрация на Geek's Haven</title>
		
	</head>
	<body>

	</body>
</html>
<div class="header">Geek's Haven</div>
<div class="order_form">
<!-- action="index.php" -->
	<?php
	if ($_SESSION['user']) {
		echo "
	<form method=POST >	
	<span>Оформление заказа</span>
	<input type=text name=login placeholder='имя' >
	<input type=text name=time placeholder='колво часов игры'>
	<input type=date name=date placeholder=дата>
	<input type=text name=person placeholder='кол-во человек'>
	<input type=text name=place placeholder=место>
	<input type=text name=tell placeholder='номер телефона'>
	<input type=submit name=order value=заказать>
	</form>";
	}else
	{
		echo "сначала авторизуйтесь";
	}
	
	?>
	<form action="index.php">
	<a href="../index.php">на главную</a>
	</form>
	</form>
</div>
	<?php
	include '../db.php';
	$login=$_POST['login'];
	$time=$_POST['time'];
	$date=$_POST['date'];
	$person=$_POST['person'];
	$place=$_POST['place'];
	$tell=$_POST['tell'];
	$order=$_POST['order'];
	if ($order) {
		$str_order="INSERT INTO `order_game` (`login`, `time`, `date`, `place`, `person`, `tell`) 
		VALUES ('$login', '$time', '$date', '$place', '$person', '$tell');";
		$run_add_order=mysqli_query($connect,$str_order);
		print_r($str_order);
		if ($run_add_order) 
		{
			echo"спасибо за заказ";
			}
			else 
				{
				echo"укажите все правильно";
			 	}
		}

	?>