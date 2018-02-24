<?php
	ob_start();
	session_start();
	require_once '../config.php';
	checkAdminSession();
	selectData(); 

	if (isset($_POST['sub']) and $_POST['title']!="" and $_POST['text']!="") {
		$conn->query("INSERT INTO `news`(`id`, `title`, `news`, `date`, `image`, `byName`) VALUES ('','$_POST[title]','$_POST[text]','$now','','$userRow[Username]')");
		header('Location: '.$siteLink.'/panel/news.php?suc');
	} elseif (isset($_POST['sub']) and $_POST['title']=="" or isset($_POST['sub']) and $_POST['text']=="") {
		header('Location: '.$siteLink.'/panel/news.php?error');
	};
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
	      			<h1><?=$lang["adm10"]?></h1>
							<?php 

							if (isset($_GET['error'])) echo "<h4 style='color:red !important'>".$lang["admer1"]."</h4>";
							elseif (isset($_GET['suc'])) echo "<h4 style='color:green !important'>".$lang["admsuc1"]."</h4>";
							
							?>
					    <form class="form" style="margin-bottom:16px;" method="post">
							  <div class="form-group">
							    <label for="postTitle"><?=$lang["adm11"]?></label>
							    <input name="title" class="form-control" id="postTitle" placeholder="Hello World!">
							  </div>
							  <div class="form-group">
							    <label for="postText"><?=$lang["adm12"]?></label>
							    <textarea name="text" class="form-control" id="postText" rows="3"></textarea>
							  </div>
						    <div style="margin-top:10px">
						      <button id="subButt" type="submit" class="btn" name="sub"><?=$lang["adm13"]?></button>
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