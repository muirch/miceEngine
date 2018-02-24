<?php
	ob_start();
	session_start();
	require_once '../config.php';
	checkAdminSession();
	
  $conn->query("UPDATE site SET season=$_POST[season],maintenance=$_POST[maintenance]");
?>
<!DOCTYPE html>
<html>
<?php include("../includes/header.php"); ?>
 <body>
		<?php include("../includes/adm-nav.php"); ?>
    <div class="container">
	 		<div class="content">
	      <main id="main">
	      	<div class="head"></div>
					<?php include("../includes/navigation.php"); ?>
	      		<div class="post">
	      			<h1><?=$lang["adm1"]?></h1>
					    <form class="form" style="margin-bottom:16px;" method="post">
								<h4><?=$lang["adm2"]?>:</h4>
								<div class="form-check">
								  <label class="form-check-label">
								    <input class="form-check-input" type="radio" name="season" value="0" checked>
								    <?=$lang["adm3"]?>
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input class="form-check-input" type="radio" name="season" value="1">
								    <?=$lang["adm4"]?>
								  </label>
								</div>
								<h4><?=$lang["adm5"]?>:</h4>
								<div class="form-check">
								  <label class="form-check-label">
								    <input class="form-check-input" type="radio" name="maintenance" value="0">
								    <?=$lang["adm6"]?>
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input class="form-check-input" type="radio" name="maintenance" value="1">
								    <?=$lang["adm7"]?>
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input class="form-check-input" type="radio" name="maintenance" value="2" checked>
								    <?=$lang["adm8"]?>
								  </label>
								</div>
								<em style='color:red !important;'>*<?=$lang["adm9"]?></em>
						    <div style="margin-top:10px">
						      <button id="subButt" type="submit" class="btn" name="sub"><?=$lang['gen2']?></button>
						    </div>
					    </form>
							</article>
	          </div>
					<div class="foot"></div>
	      </main>
				<?php include("../includes/footer.php"); ?>
	    </div>
    </div> <!-- /container -->
		<?php include("../includes/scripts.php"); ?>
  </body>
</html>