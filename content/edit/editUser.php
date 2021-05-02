
<?php
include '../db.php';
$edit_id=$_GET['edit_id'];

if ($_POST[reg]) 
{
	$str_edit_news="UPDATE `players_and_masters` SET `login` = '$_POST[login]',`pass`='$_POST[pass]',`name` = '$_POST[name]',`fam` = '$_POST[fam]',`mail` = '$_POST[mail]', `gender` = '$_POST[gender]'  WHERE `players_and_masters`.`id` = $edit_id;";
	$run_edit_news=mysqli_query($connect,$str_edit_news);
}
	$str_out_players="SELECT * FROM `players_and_masters` WHERE `players_and_masters`.`id` = $edit_id";
	$run_out_players=mysqli_query($connect,$str_out_players);
	$out=mysqli_fetch_array($run_out_players);
?>

<pre>
<form method="POST">
	<span>Изменения пользователей</span>
	<input type="text" name="login" placeholder="логин" value="<?php echo"$out[login]" ?>">
	<input type="password" name="pass" placeholder="пароль" value="<?php echo"$out[pass]" ?>"> 
	<input type="text" name="name" placeholder="имя" value="<?php echo"$out[name]" ?>">
	<input type="text" name="fam" placeholder="фамилия" value="<?php echo"$out[fam]" ?>">
	<input type="mail" name="mail" placeholder="почта" value="<?php echo"$out[mail]" ?>">
	<input type="radio" name="gender" value="m">М
	<input type="radio" name="gender" value="f">Ж
	<input type="submit" name="reg">
	<a href="../myOffice.php">Назад</a>
	</form>
