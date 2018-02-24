<?php
	require_once 'config.php';

	//gets user's data for stats
	$data=$conn->query("SELECT * FROM users WHERE Username='$_GET[name]'");
	$row=$data->fetch_array();

	if (isset($_GET['name']) and !empty($_GET['name']) and $row['Username']==$_GET['name']){
		//get user's tribe name
		$tribecode=$row['TribeCode'];
		$tdata=$conn->query("SELECT name FROM tribe WHERE code=$tribecode");
		$tribe=$tdata->fetch_array();
		$tribe=mb_convert_encoding($tribe['name'], "cp1252", "auto"); //converting to rus encoding
	}

	//privlevel to text
  if($row['PrivLevel']==1){
  	$role = "Игрок";
  } else if($row['PrivLevel']==2){
  	$role = "VIP";
  } else if($row['PrivLevel']==3){
  	$role = "Игрок";
  } else if($row['PrivLevel']==4){
  	$role = "Пиар-агент";
  } else if($row['PrivLevel']==5){
  	$role = "Helper";
  } else if($row['PrivLevel']==6){
  	$role = "MapCrew";
  } else if($row['PrivLevel']==7){
  	$role = "Модератор";
  } else if($row['PrivLevel']==8){
  	$role = "Супермодератор";
  } else if($row['PrivLevel']==9){
  	$role = "Администратор";
  } else if($row['PrivLevel']==10){
  	$role = "Менеджер";
  } else if($row['PrivLevel']==11){
  	$role = "Главный Аминистратор";
  } else if($row['PrivLevel']==12){
  	$role = "Основатель";
  }

  //gender
  if($row['Gender']==0){
  	$gender = "не указан";
  } else if($row['Gender']==1){
  	$gender = "женщина";
  } else if($row['Gender']==2){
  	$gender = "мужчина";
  }
?>
<!DOCTYPE html>
<html>
<?php include("includes/header.php"); ?>
 	<body>
 		<?php include("includes/maintenance.php"); ?>
		<?php include("includes/adm-nav.php"); ?>
    <div class="container">
	 		<div class="content">
	      <main id="main">
	      	<div class="head"></div>
					<?php include("includes/navigation.php"); ?>    		
	      		<div class="post">
	      			<?php if (!isset($_GET['name']) or $_GET['name']=="" or $row['Username']=="") { ?>
					    <form class="form">
					      <h1>Введите никнейм</h1>
								<?php if($row['Username']=="" and isset($_GET['name'])) echo "<h4 style='color:red'>Введите корректный никнейм игрока!</h4>" ?>
							  <div class="form-row align-items-center" style="margin-bottom:16px;">
							    <div class="col-auto">
							      <input type="text" class="form-control mb-2 mb-sm-0" name="name" placeholder="Никнейм" required autofocus>
							    </div>
							    <div class="col-auto">
							      <button id="subButt" type="submit" class="btn">Посмотреть статистику</button>
							    </div>
							  </div>
					    </form>
	      			<?php } if (isset($_GET['name']) and $_GET['name']!="" and $row['Username']!="") { ?>
							<h1>Статистика игрока <?=$row['Username'];?></h1>
							<img src="https://i.imgur.com/7fyZPKh.jpg" alt="usr img" class="pull-left img-responsive thumb margin10 img-thumbnail">
							<article style="color:#999">
							 	<p>
							 		 <font color='#616EB0'><?=$role;?></font><br/>
							 		 Пол: <?=$gender;?><br/>
							 		 <?php if($row['Marriage']!="") { ?>
							 		 Партнер: <font color='#616EB0'><?=$row['Marriage'];?></font><br/>
							 		 <?php } if ($tribe!="") { ?>
							     Племя: <font color='#A2A932'><?=$tribe?></font><br/>
							     <?php } ?>
							     <br/>
							     Уровень: <font color='#A2A932'><?=$row['ShamanLevel'];?></font><br/>
							     Очки за приключения: <font color='#039191'><?=$result=mb_substr($row['AventurePoints'], 3);?></font><br/>
							     <h3 style="margin:10px 10px">Шаман</h3>
							     Мышек спасено: <font color='#039191'><?=$row['ShamanSaves'];?></font> / <font color='#A2A932'><?=$row['HardModeSaves'];?></font> / <font color='#904B5C'><?=$row['DivineModeSaves'];?></font><br/>
							     Сыра собрано за шамана: <font color='#039191'><?=$row['ShamanCheeses'];?></font>
							     <h3 style="margin:10px 10px">Мышка</h3></font>
							     Сыра собрано первым: <font color='#039191'><?=$row['FirstCount'];?></font><br/>							     
							     Сыра собрано: <font color='#039191'><?=$row['CheeseCount'];?></font><br/>
							     Bootcamp: <font color='#039191'><?=$row['BootcampCount'];?></font>
							  </p>
							  <?php } ?>
							</article>
	          </div>
					<div class="foot"></div>
	      </main>
				<?php include("includes/footer.php"); ?>
	    </div>
    </div> <!-- /container -->
		<?php include("includes/scripts.php"); ?>
  </body>
</html>