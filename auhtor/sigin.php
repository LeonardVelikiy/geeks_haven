<?php
session_start();


?>

<link rel=stylesheet type=text/css href=../style.css>
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

<?php if(!$_SESSION['user']){
	echo"
	<div class=sigin>
	<form method=POST action=test.php>
	<label>Логин</label>
	<input type=text name=login>
	<label>Пароль</label>
	<input type=password name=pass>
	<input type=submit name=enter value=вход></input>
</form>
<div class=ilP>
	<a>Хотите вернуться?</a><br> 
	<a href=../index.php style=text-decoration:underline; color: gray;>На главную</a><br>
	<a>Оставить </a><a href=reg.php style=text-decoration:underline; color: gray;> учётную запись?</a><br>
	<a href=?exit=acc style=text-decoration:underline; color: gray;>Выйти из аккаунта</a>
</div>
</div>";
}else
{
	$role=$_SESSION['user']['role'];
	
	if ($role==1)
	{
		echo '<script>location.replace("../content/myOffice_admin.php");</script>'; exit;
	}elseif($role==0)
		{
			echo '<script>location.replace("../content/myOffice.php");</script>'; exit;
		}else
		{
			
		}


}
	?>
<?php
$enter=$_POST['enter'];
	if ($_GET['exit']) 
	{
		unset($_SESSION['user']);
		echo '<script>location.replace("../index.php");</script>'; exit;
	}

?>

