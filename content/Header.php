<?php 
class Header 
{
	public function view_Header ()
	{
		echo'
			<html>
				<head>
					<title>Мой кабинет</title>
					<!-- иконка -->
					<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
					<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
					<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
					<link rel="manifest" href="favicon/site.webmanifest">
					<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
					<meta name="msapplication-TileColor" content="#da532c">
					<meta name="theme-color" content="#ffffff">
					<meta name="msapplication-TileColor" content="#ffffff">
					<!-- иконка -->
					<meta charset="utf-8">
						<link rel="stylesheet" type="text/css" href="../style.css"></head>
						<body>
							<div class="bodyOffice">
								<div class="head">Geeks Haven</div>
								<div class="height_menu" >
									<div class="update_news">
										<a href="../index.php">новости</a>
									</div>
									<div class="ads">
										<a href="ads.php">объявления игр</a>
									</div>
									<div class="my_office">
										<a href="myOffice.php">МОЙ КАБИНЕТ</a>
									</div>
									<div class="mechanics">
										<a href="mechanics.php">механики</a>
									</div>
									<div class="world">
										<a href="world.php">о мире</a>
									</div>
									<div class="we">
										<a href="we.php">о нас</a>
									</div>
								</div>
								<div class="contentoffice">';
	}

}
?>