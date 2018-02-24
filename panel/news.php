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
	      			<h1>Опубликовать новость</h1>
							<?php 

							if (isset($_POST['sub']) and isset($_GET['error'])) echo "<h4 style='color:red !important'>пишов нахуй!</h4>";
							elseif (isset($_POST['sub']) and isset($_GET['suc'])) echo "<div class='alert alert-info' role='alert'>
								<h4 class='alert-heading'>Опубликовано!</h4>
								<p>Пост с текстом ".$_POST['text']." был успешно опубликован!</p>
								<hr>
								Вы можете <a href=''>перейти</a> на страницу с постом для взаимодействия с ним.
							</div>";
							
							?>
					    <form class="form" style="margin-bottom:16px;" method="post">
							  <div class="form-group">
							    <label for="postTitle">Заголовок записи</label>
							    <input name="title" class="form-control" id="postTitle" placeholder="Hello World!">
							  </div>
							  <div class="form-group">
							    <label for="postText">Текст записи</label>
							    <textarea name="text" class="form-control" id="postText" rows="3"></textarea>
							  </div>
						    <div style="margin-top:10px">
						      <button id="subButt" type="submit" class="btn" name="sub">Опубликовать</button>
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