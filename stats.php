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
  	$role = $lang["usrstts16"];
  } else if($row['PrivLevel']==2){
  	$role = $lang["usrstts17"];
  } else if($row['PrivLevel']==3){
  	$role = $lang["usrstts18"];
  } else if($row['PrivLevel']==4){
  	$role = $lang["usrstts19"];
  } else if($row['PrivLevel']==5){
  	$role = $lang["usrstts20"];
  } else if($row['PrivLevel']==6){
  	$role = $lang["usrstts21"];
  } else if($row['PrivLevel']==7){
  	$role = $lang["usrstts22"];
  } else if($row['PrivLeve']==8){
  	$role = $lang["usrstts23"];
  } else if($row['PrivLevel']==9){
  	$role = $lang["usrstts24"];
  } else if($row['PrivLevel']==10){
  	$role = $lang["usrstts25"];
  } else if($row['PrivLevel']==11){
  	$role = $lang["usrstts26"];
  } else if($row['PrivLevel']==12){
  	$role = $lang["usrstts27"];
  }

  //gender
  if($row['Gender']==0){
  	$gender = $lang["usrstts28"];
  } else if($row['Gender']==1){
  	$gender = $lang["usrstts27"];
  } else if($row['Gender']==2){
  	$gender = $lang["usrstts30"];
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
					      <h1><?=$lang['usrstts1']?></h1>
								<?php if($row['Username']=="" and isset($_GET['name'])) echo "<h4 style='color:red'>Введите корректный никнейм игрока!</h4>" ?>
							  <div class="form-row align-items-center" style="margin-bottom:16px;">
							    <div class="col-auto">
							      <input type="text" class="form-control mb-2 mb-sm-0" name="name" placeholder="<?=$lang['usrstts2']?>" required autofocus>
							    </div>
							    <div class="col-auto">
							      <button id="subButt" type="submit" class="btn"><?=$lang['usrstts3']?></button>
							    </div>
							  </div>
					    </form>
	      			<?php } if (isset($_GET['name']) and $_GET['name']!="" and $row['Username']!="") { ?>
							<h1><?=$lang["usrstts31"]?> <?=$row['Username'];?></h1>
							<img src="https://i.imgur.com/7fyZPKh.jpg" alt="usr img" class="pull-left img-responsive thumb margin10 img-thumbnail">
							<article style="color:#999">
							 	<p>
							 		 <font color='#616EB0'><?=$role;?></font><br/>
							 		 <?=$lang["usrstts4"];?>: <?=$gender;?><br/>
							 		 <?php if($row['Marriage']!="") { ?>
							 		 <?=$lang["usrstts5"];?>: <font color='#616EB0'><?=$row['Marriage'];?></font><br/>
							 		 <?php } if ($tribe!="") { ?>
							     <?=$lang["usrstts6"];?>: <font color='#A2A932'><?=$tribe?></font><br/>
							     <?php } ?>
							     <br/>
							     <?=$lang["usrstts7"];?>: <font color='#A2A932'><?=$row['ShamanLevel'];?></font><br/>
							     <?=$lang["usrstts8"];?>: <font color='#039191'><?=$result=mb_substr($row['AventurePoints'], 3);?></font><br/>
							     <h3 style="margin:10px 10px"><?=$lang["usrstts9"];?></h3>
							     <?=$lang["usrstts10"];?>: <font color='#039191'><?=$row['ShamanSaves'];?></font> / <font color='#A2A932'><?=$row['HardModeSaves'];?></font> / <font color='#904B5C'><?=$row['DivineModeSaves'];?></font><br/>
							     <?=$lang["usrstts11"];?>: <font color='#039191'><?=$row['ShamanCheeses'];?></font>
							     <h3 style="margin:10px 10px"><?=$lang["usrstts12"];?></h3></font>
							     <?=$lang["usrstts13"];?>: <font color='#039191'><?=$row['FirstCount'];?></font><br/>							     
							     <?=$lang["usrstts14"];?>: <font color='#039191'><?=$row['CheeseCount'];?></font><br/>
							     <?=$lang["usrstts15"];?>: <font color='#039191'><?=$row['BootcampCount'];?></font>
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