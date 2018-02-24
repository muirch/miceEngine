<?php
	require_once 'config.php';
	include("modules/base.php");

  $data=$conn->query("SELECT * FROM news WHERE id='$_GET[id]' ORDER BY id DESC LIMIT 5");
  $row=$data->fetch_array();

  if(isset($_POST['del']) and $_SESSION['admin']){
  	$data=$conn->query("DELETE FROM `news` WHERE id='$_GET[id]'");
  	header("Location: $siteLink");
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
							<h1><?=$row['title'];?></h1>
							<img src="https://i.imgur.com/7fyZPKh.jpg" alt="usr img" class="pull-left img-responsive thumb margin10 img-thumbnail">
							   <em><a href="stats?name=<?=$row['byName'];?>"><?=$row['byName'];?></a></em> <span style="color:#999;font-size:12px;">- <?=$row['date'];?></span>
							<article>
							 	<p>
							     <?=$row['news'];?>
							  </p>
							</article>
							<form method="post" style="margin-bottom:10px;"><button id="subButt" type="submit" class="btn" name="del">Удалить</button></form>
	          </div>
					<div class="foot"></div>
	      </main>
				<?php include("includes/footer.php"); ?>
	    </div>
    </div> <!-- /container -->
		<?php include("includes/scripts.php"); ?>
  </body>
</html>