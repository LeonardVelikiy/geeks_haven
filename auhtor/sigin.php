<?php
session_start();


?>

<link rel=stylesheet type=text/css href=../style.css>


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

