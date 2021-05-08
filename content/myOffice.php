<?php
session_start();
include '../db.php';
include 'Header.php';

$header = new Header();
$header->view_Header();

$users_name=$_SESSION['user']['name'];
$users_login=$_SESSION['user']['login'];

if(!$_SESSION['user'])
{
	echo "../auhtor/sigin.php";
	
} else {
		$str_heros_players="SELECT * FROM `heros` JOIN `players_and_masters` ON heros.owner_id=players_and_masters.id WHERE players_and_masters.login='$users_login'";
		$run_heros_players=mysqli_query($connect,$str_heros_players);
		$infor_heros=mysqli_fetch_assoc($run_heros_players);
		

		echo"
			<div class=telo_office>
	<div class=ava>
		<div class=avatarka_guchi>$users_name,$infor_heros[name_hero]</div>
	</div>
	<div class=stat>
		<div class=characteristics>
		<div class=stats_hero_strong> <a>$infor_heros[strong]</a><br>сила</div>
		<div class=stats_hero_dexterity> <a>$infor_heros[dexterity]</a><br>ловкость</div>
		<div class=stats_hero_intelligence> <a>$infor_heros[intelligence]</a><br>интелект</div>
		<div class=stats_hero_wisdom> <a>$infor_heros[wisdom]</a><br>мудрость</div>
		<div class=stats_hero_endurance> <a>$infor_heros[endurance]</a><br>тело</div>
		<div class=stats_hero_charisma> <a>$infor_heros[charisma]</a><br>харизма</div>
		</div>
		<div class=count>$infor_heros[gold_count]-золото</div>
	</div>
	<div class=info>
		<div class=hp>
			<div class=h_P style=color:red; >$infor_heros[hp]</div>
			<div class=kb  style=color:blue;>$infor_heros[class_armor]</div>
			<div class=lvl style=color:white;>$infor_heros[lvl]</div>
			<div class=inspiration style=color:orange;></div>
		</div>
		<div class=stuff></div>
		<div class=magic_and_skill></div>
	</div>
</div>
<form method=POST action=vendor/exit.php>
	<input type=submit name=exit value=выйти </input>
</form>";
};      echo'</div>
			<div class="futer"></div>
		</div>
</body>
</html>';
?>