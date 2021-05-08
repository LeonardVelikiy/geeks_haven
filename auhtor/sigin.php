<?php
session_start();

?>

<link rel=stylesheet type=text/css href=../style.css>
<div class="sigin">

<?php if(!$_SESSION['user']){
	echo"<form method=POST action=test.php>
	<label>Логин</label>
	<input type=text name=login>
		<label>Пароль</label>
	<input type=password name=pass>
	<input type=submit name=enter></input>
</form>
<div class=ilP>
	<a>Хотите вернуться?</a><br> 
	<a href=../index.php style=text-decoration:underline; color: gray;>На главную</a><br>
	<a>Оставить </a><a href=reg.php style=text-decoration:underline; color: gray;> учётную запис?</a><br>
	<a href=?exit=acc style=text-decoration:underline; color: gray;>Выйти из аккаунта</a>
</div>
</div>";
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

