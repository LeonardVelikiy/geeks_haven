<?php 
class Header 
{
	public function view_Header ()
	{
		echo'
			<html>
				<head>
					<title>Новости по Днд</title>
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