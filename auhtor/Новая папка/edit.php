<link rel="stylesheet" type="text/css" href="main.css">
<?php
include '../db.php';
$edit_id=$_GET['edit_id'];
if ($_POST[public1]) 
{
	$str_edit_news="UPDATE `news` SET `author` = '$_POST[author]',`topic`='$_POST[topic]',`text` = '$_POST[text]',`date` = '$_POST[date]'  WHERE `news`.`id` = $edit_id;";
	$run_edit_news=mysqli_query($connect,$str_edit_news);
}
	$str_out_news="SELECT * FROM `news` WHERE `news`.`id` = $edit_id";
	$run_out_news=mysqli_query($connect,$str_out_news);
	$out=mysqli_fetch_array($run_out_news);
	print_r($out);
?>
<pre>
<form method="POST">
		<span>Публикация</span>
		<input type="text" name="author" placeholder="автор" value="<?php echo"$out[author]" ?>">
		<input type="text" name="topic" placeholder="Имя" value="<?php echo"$out[topic]" ?>">
		<textarea type="text"  class='text_edit' placeholder="text" value="<?php echo"$out[text]"?>"></textarea>
		<input type="date" name="date" placeholder="Пароль" value="<?php echo"$out[date]" ?>">
		<input type="submit" name="public1" value="public" >
		<a href="../test.php">Назад</a>
		</form>