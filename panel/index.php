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
	      			<h1>Управление сайтом</h1>
					    <form class="form" style="margin-bottom:16px;" method="post">
								<h4>Оформление:</h4>
								<div class="form-check">
								  <label class="form-check-label">
								    <input class="form-check-input" type="radio" name="season" value="0" checked>
								    Лето
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input class="form-check-input" type="radio" name="season" value="1">
								    Зима
								  </label>
								</div>
								<h4>Техническое обслуживание:</h4>
								<div class="form-check">
								  <label class="form-check-label">
								    <input class="form-check-input" type="radio" name="maintenance" value="0">
								    Включить режим полного техобслуживания
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input class="form-check-input" type="radio" name="maintenance" value="1">
								    Включить режим ограниченного техобслуживания (только главная страница и посты)
								  </label>
								</div>
								<div class="form-check">
								  <label class="form-check-label">
								    <input class="form-check-input" type="radio" name="maintenance" value="2" checked>
								    Выключить режим техобслуживания
								  </label>
								</div>
								<em style='color:red !important;'>*Вы должны выбрать все опции, чтобы продолжить!</em>
						    <div style="margin-top:10px">
						      <button id="subButt" type="submit" class="btn" name="sub">Сохранить</button>
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